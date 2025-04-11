jQuery(function($) {

    class PCWCCompare {

        constructor() {
            this.eventHandlers();
        }

        eventHandlers() {
            $(document.body).on('click', '.pcwc-compare-button', this.handleCompareButtonClick.bind(this));
            $(document.body).on('click', '.pcwc-compare-modal-close', this.closeComparePopup.bind(this));
            $(document.body).on('click', '.pcwc-remove-compare', this.handleRemoveCompareButtonClick.bind(this));
            $(document.body).on('click', '.pcwc-filter-btn', this.CompareFilterProduct.bind(this));
            $(document.body).on('click', '.pcwc-reset-btn', this.ResetFilterProduct.bind(this));
            $(document.body).on('change', '.pcwc-check', this.toggleFilterButton.bind(this));
        }

        handleCompareButtonClick(e) {
            e.preventDefault();
            var __this =  $(e.currentTarget),
                loader = __this.closest('.pcwc-compare-button-wrapper').find('.pcwc-loader').show();
                
            loader.addClass('show');
                
            $('.pcwc-sticky-compare').hide();

            var productId       =  __this.data('product_id'),
                compareProducts =  this.getCookie('pcwc_compare_products'),
                productIds      =  compareProducts ? JSON.parse(compareProducts) : [];

            if (!productIds.includes(productId)) {
                productIds.push(productId);
            }

            this.setCookie('pcwc_compare_products', JSON.stringify(productIds), 30);
            !__this.hasClass('pcwc-compare-icon') && __this.text('Added to compare');
            this.loadCompareProductData(productIds);
            loader.removeClass('show');
        }

        // Function to get a cookie by name
        getCookie(name) {
            let value = `; ${document.cookie}`;
            let parts = value.split(`; ${name}=`);
            if (parts.length === 2) return parts.pop().split(';').shift();
            return '';
        }

        // Function to set a cookie
        setCookie(name, value, days) {
            const expires = new Date();
            expires.setTime(expires.getTime() + (days * 24 * 60 * 60 * 1000)); // Set expiry date to 30 days
            document.cookie = `${name}=${value}; expires=${expires.toUTCString()}; path=/`;
        }

        // Function to load compare product data
        loadCompareProductData(productIds) {
            $.ajax({
                type: 'POST',
                url: pcwc_vars.ajax_url,
                data: {
                    action: 'pcwc_get_compare_products',
                    product_ids: productIds,
                    pcwc_nonce: pcwc_vars.pcwc_nonce
                },
                beforeSend: () => {
                  $('body').addClass('pcwc-loading');
                },
                success: (response) => {
                    if (response.success) {
                        $('.pcwc-compare-modal[data-lightbox="yes"]').fadeIn(300, function() {
                            $('.compare-table-container').html(response.data.html);
                            $('.pcwc-compare-modal').addClass('show');
                            $('body').addClass('overflow-hidden');
                        });
                    } else {
                        console.log('Error loading product data.');
                        $('.pcwc-compare-modal').removeClass('show');
                        $('body').removeClass('overflow-hidden');
                        $('.pcwc-compare-modal').hide();
                    }
                },
                error: (xhr, status, error) => {
                    console.error('AJAX Error:', error);
                },
                complete: () => {
                    $('body').removeClass('pcwc-loading');
                }
            });
        }

        closeComparePopup() {
            $('.pcwc-compare-modal').removeClass('show');
            $('.pcwc-compare-modal').hide();
            $('body').removeClass('overflow-hidden');
        }


        // Remove data from the cookie
        handleRemoveCompareButtonClick(e) {
            const productId = $(e.currentTarget).data('product_id'); 
            let compareProducts = this.getCookie('pcwc_compare_products');
            // change button text when we remove
            if ( !$('.pcwc-compare-button[data-product_id=' + productId + ']' ).hasClass( 'pcwc-compare-icon' ) ) {
                $( '.pcwc-compare-button[data-product_id=' + productId + ']' ).text( 'Compare'  );
            }
            let productIds = compareProducts ? JSON.parse(compareProducts) : [];
            productIds = productIds.filter(id => id !== productId);
            this.setCookie('pcwc_compare_products', JSON.stringify(productIds), 30); // Expire in 30 days
            this.loadCompareProductData(productIds);
        }
        
        CompareFilterProduct(e) {
            var container = jQuery(e.currentTarget).closest(".pcwc-compare-container");
            container.find(".pcwc-vertical-table thead th, .pcwc-vertical-table tbody td").not(":first-child").hide();
            container.find(".pcwc-check").each(function () {
                var columnIndex = jQuery(this).closest("th").index(); 
                if (jQuery(this).is(":checked")) {
                    container.find(".pcwc-vertical-table thead th:nth-child(" + (columnIndex + 1) + "), .pcwc-vertical-table tbody td:nth-child(" + (columnIndex + 1) + ")").show();
                }
            });
        }

        ResetFilterProduct(e){
            var $container = jQuery(e.currentTarget).closest(".pcwc-compare-container");
            $container.find(".pcwc-comparison-table thead th, .pcwc-comparison-table tbody td").show();        
            $container.find(".pcwc-check").prop("checked", false);
            this.toggleFilterButton(e);
        }

        toggleFilterButton(e) {
            var container = $(e.currentTarget).closest(".pcwc-compare-container");
            var anyChecked = container.find(".pcwc-check:checked").length > 1;
            container.find(".pcwc-filter-btn").prop("disabled", !anyChecked);
        }

    }

    new PCWCCompare();

});