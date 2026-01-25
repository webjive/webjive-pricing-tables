jQuery(document).ready(function($) {
    
    // Initialize color pickers
    $('.wjpt-color-picker').wpColorPicker();
    
    // Handle column count changes
    $('.wjpt-columns-select').on('change', function() {
        var columnCount = parseInt($(this).val());
        
        $('.column-header-field').each(function() {
            var columnNum = parseInt($(this).data('column'));
            if (columnNum <= columnCount) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
    
    // Trigger on page load
    $('.wjpt-columns-select').trigger('change');
    
    // Handle show labels checkbox
    $('#wjpt_show_labels').on('change', function() {
        if ($(this).is(':checked')) {
            $('.wjpt-feature-header-row').show();
        } else {
            $('.wjpt-feature-header-row').hide();
        }
    });
    
    // Make shortcode input easily selectable
    $('input[readonly][value*="[webjive"]').on('click', function() {
        $(this).select();
        
        // Try to copy to clipboard
        try {
            document.execCommand('copy');
            var $this = $(this);
            var originalBg = $this.css('background-color');
            $this.css('background-color', '#d4edda');
            setTimeout(function() {
                $this.css('background-color', originalBg);
            }, 500);
        } catch(err) {
            // Ignore copy errors
        }
    });
});
