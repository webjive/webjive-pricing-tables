jQuery(document).ready(function($) {
    
    function createMobileTierCards() {
        $('.webjive-pricing-table-wrapper').each(function() {
            var $wrapper = $(this);
            var $table = $wrapper.find('.webjive-pricing-table');
            var $mobileContainer = $wrapper.find('.mobile-tier-cards');
            
            // Skip if already processed
            if ($mobileContainer.children().length > 0) {
                return;
            }
            
            var columnCount = parseInt($wrapper.data('columns')) || 3;
            var $rows = $table.find('tbody tr');
            var $headerRow = $rows.first();
            var $featureRows = $rows.slice(1);
            
            // Get header cells (skip first cell if it's the feature label header)
            var $headerCells = $headerRow.find('td');
            var showLabels = $wrapper.data('show-labels') === 'on';
            var hasFeatureLabelColumn = showLabels && $headerCells.first().hasClass('feature-label-header');
            var startIndex = hasFeatureLabelColumn ? 1 : 0;
            
            // Create a card for each column
            for (var colIndex = 0; colIndex < columnCount; colIndex++) {
                var $card = $('<div class="tier-card"></div>');
                
                // Card header with tier name and pricing
                var headerHTML = $headerCells.eq(colIndex + startIndex).html();
                var $cardHeader = $('<div class="tier-card-header"></div>').html(headerHTML);
                $card.append($cardHeader);
                
                // Card body with features
                var $cardBody = $('<div class="tier-card-body"></div>');
                
                $featureRows.each(function() {
                    var $row = $(this);
                    var $cells = $row.find('td');
                    
                    var featureLabel = hasFeatureLabelColumn ? 
                        $cells.first().text().trim() : 
                        'Feature ' + ($cells.index() + 1);
                    
                    var featureValue = $cells.eq(colIndex + startIndex).html();
                    
                    var $featureRow = $('<div class="tier-feature-row"></div>');
                    var $label = $('<div class="tier-feature-label"></div>').text(featureLabel);
                    var $value = $('<div class="tier-feature-value"></div>').html(featureValue);
                    
                    $featureRow.append($label).append($value);
                    $cardBody.append($featureRow);
                });
                
                $card.append($cardBody);
                $mobileContainer.append($card);
            }
        });
    }
    
    // Run on page load
    createMobileTierCards();
    
    // Re-run after DIVI visual builder updates
    if (typeof window.ET_Builder !== 'undefined') {
        $(window).on('et_fb_init', function() {
            setTimeout(createMobileTierCards, 500);
        });
    }
});
