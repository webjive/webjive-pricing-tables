<?php
/**
 * DIVI 5 Module Integration
 * 
 * This file handles the registration and integration of the WebJIVE Pricing Tables
 * module with DIVI 5's visual builder.
 */

if (!defined('ABSPATH')) exit;

class WebJIVE_Pricing_Tables_DIVI5 {
    
    public function __construct() {
        // Register the DIVI 5 module
        add_action('divi_extensions_init', array($this, 'register_module'));
        
        // Register REST API endpoint for table data
        add_action('rest_api_init', array($this, 'register_rest_routes'));
        
        // Enqueue module assets
        add_action('wp_enqueue_scripts', array($this, 'enqueue_module_assets'));
        
        // Add dynamic options provider
        add_filter('divi_module_options_dynamic', array($this, 'provide_table_options'), 10, 2);
    }
    
    /**
     * Register the DIVI 5 module
     */
    public function register_module() {
        if (!function_exists('et_builder_register_module')) {
            return;
        }
        
        // Register the module with DIVI
        et_builder_register_module(array(
            'name' => 'WebJIVE Pricing Table',
            'slug' => 'webjive_pricing_table',
            'module_path' => WJPT_PATH . 'divi-module/build/module.js',
        ));
    }
    
    /**
     * Register REST API routes for table data
     */
    public function register_rest_routes() {
        register_rest_route('webjive-pricing-tables/v1', '/table/(?P<id>\d+)', array(
            'methods' => 'GET',
            'callback' => array($this, 'get_table_data'),
            'permission_callback' => '__return_true',
            'args' => array(
                'id' => array(
                    'validate_callback' => function($param) {
                        return is_numeric($param);
                    }
                ),
            ),
        ));
        
        register_rest_route('webjive-pricing-tables/v1', '/tables', array(
            'methods' => 'GET',
            'callback' => array($this, 'get_all_tables'),
            'permission_callback' => '__return_true',
        ));
    }
    
    /**
     * Get table data for REST API
     */
    public function get_table_data($request) {
        $table_id = $request->get_param('id');
        $post = get_post($table_id);
        
        if (!$post || $post->post_type !== 'pricing_table') {
            return new WP_Error('not_found', 'Pricing table not found', array('status' => 404));
        }
        
        return array(
            'id' => $table_id,
            'title' => $post->post_title,
            'columns' => get_post_meta($table_id, '_wjpt_columns', true) ?: '3',
            'html' => do_shortcode('[webjive table="' . $table_id . '"]'),
        );
    }
    
    /**
     * Get all tables for REST API
     */
    public function get_all_tables() {
        $tables = get_posts(array(
            'post_type' => 'pricing_table',
            'posts_per_page' => -1,
            'post_status' => 'publish',
            'orderby' => 'title',
            'order' => 'ASC',
        ));
        
        $result = array();
        foreach ($tables as $table) {
            $result[] = array(
                'value' => $table->ID,
                'label' => $table->post_title,
            );
        }
        
        return $result;
    }
    
    /**
     * Provide dynamic table options for the module
     */
    public function provide_table_options($options, $option_key) {
        if ($option_key === 'pricingTables') {
            $tables = get_posts(array(
                'post_type' => 'pricing_table',
                'posts_per_page' => -1,
                'post_status' => 'publish',
                'orderby' => 'title',
                'order' => 'ASC',
            ));
            
            $result = array(
                '0' => '-- Select a Table --',
            );
            
            foreach ($tables as $table) {
                $result[$table->ID] = $table->post_title;
            }
            
            return $result;
        }
        
        return $options;
    }
    
    /**
     * Enqueue module assets
     */
    public function enqueue_module_assets() {
        // Only load in visual builder or if DIVI is active
        if (!function_exists('et_fb_is_enabled') || !et_fb_is_enabled()) {
            return;
        }
        
        // Register the module script
        wp_enqueue_script(
            'wjpt-divi-module',
            WJPT_URL . 'divi-module/build/module.js',
            array('react', 'react-dom'),
            WJPT_VERSION,
            true
        );
        
        // Add inline script for shortcode rendering
        wp_add_inline_script('wjpt-divi-module', '
            window.wpApiSettings = window.wpApiSettings || {};
            window.wpApiSettings.pricingTableShortcode = function(tableId) {
                return fetch("/wp-json/webjive-pricing-tables/v1/table/" + tableId)
                    .then(response => response.json())
                    .then(data => data.html)
                    .catch(() => "");
            };
        ', 'before');
    }
}

// Initialize DIVI 5 integration if DIVI is active
if (defined('ET_BUILDER_VERSION')) {
    new WebJIVE_Pricing_Tables_DIVI5();
}
