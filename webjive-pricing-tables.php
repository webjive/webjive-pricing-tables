<?php
/*
Plugin Name: WebJIVE Pricing Tables
Plugin URI: https://www.web-jive.com
Description: Create and manage unlimited responsive pricing tables with shortcodes
Version: 1.2.0
Author: WebJIVE
Author URI: https://www.web-jive.com
License: GPL2
Text Domain: webjive-pricing-tables
*/

if (!defined('ABSPATH')) exit;

define('WJPT_VERSION', '1.2.0');
define('WJPT_PATH', plugin_dir_path(__FILE__));
define('WJPT_URL', plugin_dir_url(__FILE__));

class WebJIVE_Pricing_Tables {
    
    public function __construct() {
        // Register custom post type
        add_action('init', array($this, 'register_post_type'));
        
        // Admin menu
        add_action('admin_menu', array($this, 'add_admin_menu'));
        
        // Enqueue admin assets
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_assets'));
        
        // Enqueue frontend assets
        add_action('wp_enqueue_scripts', array($this, 'enqueue_frontend_assets'));
        
        // Register shortcode
        add_shortcode('webjive', array($this, 'render_shortcode'));
        
        // Add meta boxes
        add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
        
        // Save post meta
        add_action('save_post_pricing_table', array($this, 'save_table_meta'));
        
        // Customize columns in admin list
        add_filter('manage_pricing_table_posts_columns', array($this, 'set_custom_columns'));
        add_action('manage_pricing_table_posts_custom_column', array($this, 'custom_column_content'), 10, 2);
    }
    
    public function register_post_type() {
        $labels = array(
            'name'               => 'Pricing Tables',
            'singular_name'      => 'Pricing Table',
            'menu_name'          => 'Pricing Tables',
            'add_new'            => 'Add New Table',
            'add_new_item'       => 'Add New Pricing Table',
            'edit_item'          => 'Edit Pricing Table',
            'new_item'           => 'New Pricing Table',
            'view_item'          => 'View Pricing Table',
            'search_items'       => 'Search Pricing Tables',
            'not_found'          => 'No pricing tables found',
            'not_found_in_trash' => 'No pricing tables found in trash',
        );
        
        $args = array(
            'labels'              => $labels,
            'public'              => false,
            'show_ui'             => true,
            'show_in_menu'        => false, // We'll add custom menu
            'capability_type'     => 'post',
            'hierarchical'        => false,
            'supports'            => array('title'),
            'has_archive'         => false,
            'rewrite'             => false,
            'query_var'           => false,
            'can_export'          => true,
            'menu_icon'           => 'dashicons-editor-table',
        );
        
        register_post_type('pricing_table', $args);
    }
    
    public function add_admin_menu() {
        add_menu_page(
            'Pricing Tables',
            'Pricing Tables',
            'edit_posts',
            'edit.php?post_type=pricing_table',
            '',
            'dashicons-editor-table',
            30
        );
    }
    
    public function add_meta_boxes() {
        add_meta_box(
            'pricing_table_shortcode',
            'Shortcode',
            array($this, 'shortcode_meta_box'),
            'pricing_table',
            'side',
            'high'
        );
        
        add_meta_box(
            'pricing_table_settings',
            'Table Settings',
            array($this, 'settings_meta_box'),
            'pricing_table',
            'normal',
            'high'
        );
        
        add_meta_box(
            'pricing_table_columns',
            'Column Headers',
            array($this, 'columns_meta_box'),
            'pricing_table',
            'normal',
            'high'
        );
        
        add_meta_box(
            'pricing_table_features',
            'Features',
            array($this, 'features_meta_box'),
            'pricing_table',
            'normal',
            'high'
        );
        
        add_meta_box(
            'pricing_table_styling',
            'Styling Options',
            array($this, 'styling_meta_box'),
            'pricing_table',
            'normal',
            'default'
        );
    }
    
    public function shortcode_meta_box($post) {
        ?>
        <div style="padding: 10px; background: #f0f0f1; border-radius: 4px;">
            <p><strong>Use this shortcode to display this table:</strong></p>
            <input type="text" 
                   value='[webjive table="<?php echo $post->ID; ?>"]' 
                   readonly 
                   onclick="this.select();" 
                   style="width: 100%; padding: 8px; font-family: monospace; font-size: 14px;">
            <p style="margin-top: 10px; font-size: 12px; color: #666;">
                Click to select, then copy and paste into any page or post.
            </p>
        </div>
        <?php
    }
    
    public function settings_meta_box($post) {
        wp_nonce_field('pricing_table_meta_box', 'pricing_table_nonce');
        
        $columns = get_post_meta($post->ID, '_wjpt_columns', true) ?: '3';
        $show_labels = get_post_meta($post->ID, '_wjpt_show_labels', true) !== 'no';
        $header_valign = get_post_meta($post->ID, '_wjpt_header_valign', true) ?: 'middle';
        $feature_header_text = get_post_meta($post->ID, '_wjpt_feature_header_text', true) ?: 'Features';
        ?>
        <table class="form-table">
            <tr>
                <th><label for="wjpt_columns">Number of Columns</label></th>
                <td>
                    <select name="wjpt_columns" id="wjpt_columns" class="wjpt-columns-select">
                        <option value="2" <?php selected($columns, '2'); ?>>2 Columns</option>
                        <option value="3" <?php selected($columns, '3'); ?>>3 Columns</option>
                        <option value="4" <?php selected($columns, '4'); ?>>4 Columns</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th><label for="wjpt_show_labels">Show Feature Labels</label></th>
                <td>
                    <label>
                        <input type="checkbox" 
                               name="wjpt_show_labels" 
                               id="wjpt_show_labels" 
                               value="yes" 
                               <?php checked($show_labels, true); ?>>
                        Display feature names in first column
                    </label>
                </td>
            </tr>
            <tr class="wjpt-feature-header-row" style="<?php echo $show_labels ? '' : 'display:none;'; ?>">
                <th><label for="wjpt_feature_header_text">Feature Column Header</label></th>
                <td>
                    <div style="max-width: 400px;">
                        <?php
                        wp_editor($feature_header_text, 'wjpt_feature_header_text', array(
                            'textarea_name' => 'wjpt_feature_header_text',
                            'textarea_rows' => 4,
                            'media_buttons' => false,
                            'teeny'         => false,
                            'tinymce'       => array(
                                'toolbar1' => 'formatselect',
                                'toolbar2' => '',
                                'block_formats' => 'Paragraph=p;Heading 1=h1;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6',
                            ),
                            'quicktags'     => false,
                        ));
                        ?>
                        <p class="description">Text for the feature label column header (default: "Features")</p>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label for="wjpt_header_valign">Header Vertical Alignment</label></th>
                <td>
                    <select name="wjpt_header_valign" id="wjpt_header_valign">
                        <option value="top" <?php selected($header_valign, 'top'); ?>>Top</option>
                        <option value="middle" <?php selected($header_valign, 'middle'); ?>>Middle</option>
                        <option value="bottom" <?php selected($header_valign, 'bottom'); ?>>Bottom</option>
                    </select>
                    <p class="description">Vertical alignment for column header content</p>
                </td>
            </tr>
        </table>
        <?php
    }
    
    public function columns_meta_box($post) {
        $columns = get_post_meta($post->ID, '_wjpt_columns', true) ?: '3';
        ?>
        <div id="column-headers-container">
            <?php for ($i = 1; $i <= 4; $i++): 
                $header = get_post_meta($post->ID, "_wjpt_col{$i}_header", true);
                $display = $i <= $columns ? 'block' : 'none';
            ?>
                <div class="column-header-field" data-column="<?php echo $i; ?>" style="display: <?php echo $display; ?>; margin-bottom: 20px;">
                    <h3>Column <?php echo $i; ?> Header</h3>
                    <?php
                    wp_editor($header, "wjpt_col{$i}_header", array(
                        'textarea_name' => "wjpt_col{$i}_header",
                        'textarea_rows' => 8,
                        'media_buttons' => false,
                        'teeny'         => false,
                        'tinymce'       => array(
                            'toolbar1' => 'formatselect',
                            'toolbar2' => '',
                            'block_formats' => 'Paragraph=p;Heading 1=h1;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6',
                        ),
                        'quicktags'     => false,
                    ));
                    ?>
                    <p class="description">Use the dropdown to select heading level (H1-H6) or paragraph text.</p>
                </div>
            <?php endfor; ?>
        </div>
        <?php
    }
    
    public function features_meta_box($post) {
        $features = get_post_meta($post->ID, '_wjpt_features', true) ?: '';
        ?>
        <p class="description" style="margin-bottom: 15px;">
            <strong>Format:</strong> One feature per line. Use pipe (|) to separate label from values.<br>
            <strong>Example:</strong> Bandwidth | Unmetered | Unmetered | Unmetered
        </p>
        <textarea name="wjpt_features" 
                  id="wjpt_features" 
                  rows="15" 
                  style="width: 100%; font-family: monospace; font-size: 13px;"><?php echo esc_textarea($features); ?></textarea>
        
        <div style="margin-top: 15px; padding: 15px; background: #f0f0f1; border-radius: 4px;">
            <strong>Quick Reference:</strong><br>
            ✅ Use for "Yes" | ❌ Use for "No" | ⭐ Featured | 💎 Premium | 🚀 Fast
        </div>
        <?php
    }
    
    public function styling_meta_box($post) {
        $header_bg = get_post_meta($post->ID, '_wjpt_header_bg', true) ?: '#EA6B2D';
        $header_text = get_post_meta($post->ID, '_wjpt_header_text', true) ?: '#ffffff';
        $alternate_rows = get_post_meta($post->ID, '_wjpt_alternate_rows', true) !== 'no';
        $even_row_bg = get_post_meta($post->ID, '_wjpt_even_row_bg', true) ?: '#F5F5F5';
        $feature_label_bg = get_post_meta($post->ID, '_wjpt_feature_label_bg', true) ?: '#F5F5F5';
        ?>
        <table class="form-table">
            <tr>
                <th><label for="wjpt_header_bg">Header Background Color</label></th>
                <td>
                    <input type="text" 
                           name="wjpt_header_bg" 
                           id="wjpt_header_bg" 
                           value="<?php echo esc_attr($header_bg); ?>" 
                           class="wjpt-color-picker">
                </td>
            </tr>
            <tr>
                <th><label for="wjpt_header_text">Header Text Color</label></th>
                <td>
                    <input type="text" 
                           name="wjpt_header_text" 
                           id="wjpt_header_text" 
                           value="<?php echo esc_attr($header_text); ?>" 
                           class="wjpt-color-picker">
                </td>
            </tr>
            <tr>
                <th><label for="wjpt_alternate_rows">Alternate Row Colors</label></th>
                <td>
                    <label>
                        <input type="checkbox" 
                               name="wjpt_alternate_rows" 
                               id="wjpt_alternate_rows" 
                               value="yes" 
                               <?php checked($alternate_rows, true); ?>>
                        Enable zebra striping
                    </label>
                </td>
            </tr>
            <tr>
                <th><label for="wjpt_even_row_bg">Even Row Background</label></th>
                <td>
                    <input type="text" 
                           name="wjpt_even_row_bg" 
                           id="wjpt_even_row_bg" 
                           value="<?php echo esc_attr($even_row_bg); ?>" 
                           class="wjpt-color-picker">
                </td>
            </tr>
            <tr>
                <th><label for="wjpt_feature_label_bg">Feature Label Background</label></th>
                <td>
                    <input type="text" 
                           name="wjpt_feature_label_bg" 
                           id="wjpt_feature_label_bg" 
                           value="<?php echo esc_attr($feature_label_bg); ?>" 
                           class="wjpt-color-picker">
                </td>
            </tr>
        </table>
        <?php
    }
    
    public function save_table_meta($post_id) {
        // Check nonce
        if (!isset($_POST['pricing_table_nonce']) || !wp_verify_nonce($_POST['pricing_table_nonce'], 'pricing_table_meta_box')) {
            return;
        }
        
        // Check autosave
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }
        
        // Check permissions
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }
        
        // Save text fields
        $text_fields = array(
            'wjpt_columns',
            'wjpt_header_valign',
            'wjpt_feature_header_text',
            'wjpt_col1_header',
            'wjpt_col2_header',
            'wjpt_col3_header',
            'wjpt_col4_header',
            'wjpt_features',
            'wjpt_header_bg',
            'wjpt_header_text',
            'wjpt_even_row_bg',
            'wjpt_feature_label_bg',
        );
        
        foreach ($text_fields as $field) {
            $meta_key = '_' . $field;
            if (isset($_POST[$field])) {
                update_post_meta($post_id, $meta_key, wp_kses_post($_POST[$field]));
            }
        }
        
        // Save checkboxes (these need special handling)
        $checkbox_fields = array(
            'wjpt_show_labels',
            'wjpt_alternate_rows',
        );
        
        foreach ($checkbox_fields as $field) {
            $meta_key = '_' . $field;
            if (isset($_POST[$field]) && $_POST[$field] === 'yes') {
                update_post_meta($post_id, $meta_key, 'yes');
            } else {
                update_post_meta($post_id, $meta_key, 'no');
            }
        }
    }
    
    public function set_custom_columns($columns) {
        $new_columns = array();
        $new_columns['cb'] = $columns['cb'];
        $new_columns['title'] = 'Table Name';
        $new_columns['shortcode'] = 'Shortcode';
        $new_columns['columns'] = 'Columns';
        $new_columns['date'] = 'Date';
        return $new_columns;
    }
    
    public function custom_column_content($column, $post_id) {
        switch ($column) {
            case 'shortcode':
                echo '<code>[webjive table="' . $post_id . '"]</code>';
                break;
            case 'columns':
                $cols = get_post_meta($post_id, '_wjpt_columns', true) ?: '3';
                echo $cols . ' columns';
                break;
        }
    }
    
    public function enqueue_admin_assets($hook) {
        global $post_type;
        
        if ($post_type !== 'pricing_table') {
            return;
        }
        
        // Color picker
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('wp-color-picker');
        
        // Custom admin JS
        wp_enqueue_script(
            'wjpt-admin',
            WJPT_URL . 'assets/admin.js',
            array('jquery', 'wp-color-picker'),
            WJPT_VERSION,
            true
        );
        
        // Custom admin CSS
        wp_enqueue_style(
            'wjpt-admin',
            WJPT_URL . 'assets/admin.css',
            array(),
            WJPT_VERSION
        );
    }
    
    public function enqueue_frontend_assets() {
        wp_enqueue_style(
            'wjpt-frontend',
            WJPT_URL . 'assets/frontend.css',
            array(),
            WJPT_VERSION
        );
        
        wp_enqueue_script(
            'wjpt-frontend',
            WJPT_URL . 'assets/frontend.js',
            array('jquery'),
            WJPT_VERSION,
            true
        );
    }
    
    public function render_shortcode($atts) {
        $atts = shortcode_atts(array(
            'table' => '',
        ), $atts);
        
        $table_id = intval($atts['table']);
        
        if (!$table_id) {
            return '<p style="color: red;">Error: Please specify a table ID. Example: [webjive table="1"]</p>';
        }
        
        $post = get_post($table_id);
        
        if (!$post || $post->post_type !== 'pricing_table') {
            return '<p style="color: red;">Error: Pricing table not found.</p>';
        }
        
        // Get table settings
        $columns = get_post_meta($table_id, '_wjpt_columns', true) ?: '3';
        $show_labels = get_post_meta($table_id, '_wjpt_show_labels', true) !== 'no';
        $header_valign = get_post_meta($table_id, '_wjpt_header_valign', true) ?: 'middle';
        $feature_header_text = get_post_meta($table_id, '_wjpt_feature_header_text', true) ?: 'Features';
        $features_data = get_post_meta($table_id, '_wjpt_features', true) ?: '';
        
        // Get styling
        $header_bg = get_post_meta($table_id, '_wjpt_header_bg', true) ?: '#EA6B2D';
        $header_text = get_post_meta($table_id, '_wjpt_header_text', true) ?: '#ffffff';
        $alternate_rows = get_post_meta($table_id, '_wjpt_alternate_rows', true) !== 'no';
        $even_row_bg = get_post_meta($table_id, '_wjpt_even_row_bg', true) ?: '#F5F5F5';
        $feature_label_bg = get_post_meta($table_id, '_wjpt_feature_label_bg', true) ?: '#F5F5F5';
        
        // Parse features
        $features = array();
        if (!empty($features_data)) {
            $lines = explode("\n", $features_data);
            foreach ($lines as $line) {
                $line = trim($line);
                if (empty($line)) continue;
                
                $parts = array_map('trim', explode('|', $line));
                if (count($parts) >= 2) {
                    $features[] = $parts;
                }
            }
        }
        
        // Generate styles
        $style_id = 'wjpt-' . $table_id;
        $darker_bg = $this->adjust_brightness($header_bg, -20);
        
        ob_start();
        ?>
        <style>
        .<?php echo $style_id; ?> .pricing-table-header {
            background: linear-gradient(135deg, <?php echo esc_attr($header_bg); ?> 0%, <?php echo esc_attr($darker_bg); ?> 100%) !important;
            color: <?php echo esc_attr($header_text); ?> !important;
        }
        .<?php echo $style_id; ?> .pricing-table-header td {
            vertical-align: <?php echo esc_attr($header_valign); ?> !important;
        }
        .<?php echo $style_id; ?> .feature-label {
            background-color: <?php echo esc_attr($feature_label_bg); ?>;
        }
        <?php if ($alternate_rows): ?>
        .<?php echo $style_id; ?> .even-row {
            background-color: <?php echo esc_attr($even_row_bg); ?>;
        }
        <?php endif; ?>
        </style>
        
        <div class="webjive-pricing-table-wrapper <?php echo esc_attr($style_id); ?>" 
             data-columns="<?php echo esc_attr($columns); ?>" 
             data-show-labels="<?php echo $show_labels ? 'on' : 'off'; ?>">
            
            <table class="webjive-pricing-table">
                <tbody>
                    <tr class="pricing-table-header">
                        <td class="feature-label-header">
                            <?php if ($show_labels): ?>
                                <?php echo wp_kses_post($feature_header_text); ?>
                            <?php endif; ?>
                        </td>
                        
                        <?php for ($i = 1; $i <= $columns; $i++): 
                            $header = get_post_meta($table_id, "_wjpt_col{$i}_header", true);
                        ?>
                            <td class="pricing-header-col"><?php echo wp_kses_post($header); ?></td>
                        <?php endfor; ?>
                    </tr>
                    
                    <?php foreach ($features as $index => $feature): 
                        $row_class = ($alternate_rows && $index % 2 === 0) ? 'even-row' : 'odd-row';
                    ?>
                        <tr class="<?php echo esc_attr($row_class); ?>">
                            <td class="feature-label"><strong><?php echo esc_html($feature[0]); ?></strong></td>
                            
                            <?php for ($i = 1; $i <= $columns; $i++): 
                                $value_index = $i;
                                $value = isset($feature[$value_index]) ? $feature[$value_index] : '';
                            ?>
                                <td class="feature-value"><?php echo wp_kses_post($value); ?></td>
                            <?php endfor; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            
            <div class="mobile-tier-cards"></div>
        </div>
        <?php
        return ob_get_clean();
    }
    
    private function adjust_brightness($hex, $steps) {
        $steps = max(-255, min(255, $steps));
        $hex = str_replace('#', '', $hex);
        
        if (strlen($hex) == 3) {
            $hex = str_repeat(substr($hex, 0, 1), 2) . str_repeat(substr($hex, 1, 1), 2) . str_repeat(substr($hex, 2, 1), 2);
        }
        
        $color_parts = str_split($hex, 2);
        $return = '#';
        
        foreach ($color_parts as $color) {
            $color = hexdec($color);
            $color = max(0, min(255, $color + $steps));
            $return .= str_pad(dechex($color), 2, '0', STR_PAD_LEFT);
        }
        
        return $return;
    }
}

new WebJIVE_Pricing_Tables();
