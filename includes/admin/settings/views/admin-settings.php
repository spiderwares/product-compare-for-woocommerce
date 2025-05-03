<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

// Check if the class PCWC_Compare_Admin_Settings does not exist to avoid redeclaration.
if( ! class_exists( 'PCWC_Compare_Admin_Settings' ) ):

    /**
     * Class PCWC_Compare_Admin_Settings
     * This class contains methods to define and return the various fields for the product comparison settings.
     */
    class PCWC_Compare_Admin_Settings {

        /**
         * Define and return general fields for the product comparison settings.
         * 
         * @return array $fields The general fields for the comparison settings.
         */
        public static function general_field() {
            $fields = array(

                'enable' => array(
                    'title'      => esc_html__( 'Enable Product Compare', 'product-compare-for-woo' ),
                    'field_type' => 'pcwcswitch',
                    'default'    => 'yes',
                    'name'       => 'pcwc_compare_general[enable]',
                    'desc'       => esc_html__( 'Enable Product Compare For WooCommerce.', 'product-compare-for-woo' ),
                ),

                'compare_btn_text' => array(
                    'title'      => esc_html__( 'Compare Button Text', 'product-compare-for-woo' ),
                    'field_type' => 'pcwctext',
                    'name'       => 'pcwc_compare_general[compare_btn_text]',
                    'default'    => esc_html__( 'Compare Product', 'product-compare-for-woo' ),
                ),
                'remove_btn_text' => array(
                    'title'      => esc_html__( 'Button Remove Text', 'product-compare-for-woo' ),
                    'field_type' => 'pcwctext',
                    'name'       => 'pcwc_compare_general[remove_btn_text]',
                    'default'    => esc_html__( 'Remove', 'product-compare-for-woo' )
                ),
                'open_auto_lightbox' => array(
                    'title'      => esc_html__( 'Open Automatically Lightbox', 'product-compare-for-woo' ),
                    'field_type' => 'pcwcswitch',
                    'default'    => 'no',
                    'name'       => 'pcwc_compare_general[open_auto_lightbox]',
                    'desc'       => 'Automatically open the lightbox when clicking on the compare button.'
                ),


                'single_page_setting' => array(
                    'title'      => esc_html__( 'Single Page Setting', 'product-compare-for-woo' ),
                    'field_type' => 'pcwctitle',
                    'default'    => '',
                ),
                'single_position' => array(
                    'title'      => esc_html__( 'Display Position On Single Page', 'product-compare-for-woo' ),
                    'field_type' => 'pcwcselect',
                    'default'    => 'woocommerce_product_thumbnails-0',
                    'name'       => 'pcwc_compare_general[single_position]',
                    'options'    => array(
                        'disable-0'                                     => esc_html__('Disable Button/Icon', 'product-compare-for-woo' ), 
                        'woocommerce_product_thumbnails-0'              => esc_html__( 'Over The Image', 'product-compare-for-woo' ),
                        'woocommerce_before_single_product_summary-0'   => esc_html__( 'Top of Product Page', 'product-compare-for-woo' ), 
                        'woocommerce_single_product_summary-0'          => esc_html__( 'Before Product Title', 'product-compare-for-woo' ), 
                        'woocommerce_single_product_summary-6'          => esc_html__( 'After Product Title', 'product-compare-for-woo' ), 
                        'woocommerce_before_add_to_cart_form-10'        => esc_html__( 'After Short Description', 'product-compare-for-woo' ), 
                        'woocommerce_before_add_to_cart_quantity-10'    => esc_html__( 'Before Quantity Input Field', 'product-compare-for-woo' ), 
                        'woocommerce_after_add_to_cart_quantity-10'     => esc_html__( 'After Quantity Input Field', 'product-compare-for-woo' ), 
                        'woocommerce_before_add_to_cart_button-10'      => esc_html__( 'Before Add to Cart Button', 'product-compare-for-woo' ), 
                        'woocommerce_after_add_to_cart_button-10'       => esc_html__( 'After Add to Cart Button', 'product-compare-for-woo' ), 
                        'woocommerce_product_meta_end-10'               => esc_html__( 'After Product Meta Information', 'product-compare-for-woo' ), 
                    ),
                    'data_hide'  => '.single_position_option',
                    'desc'       => esc_html__( 'Choose how Button/Icon Position on single page.', 'product-compare-for-woo' ),
                ),
                'icon_position_single' => array(
                    'title'      => esc_html__( 'Icon Position in Single Page', 'product-compare-for-woo' ),
                    'field_type' => 'pcwcselect',
                    'default'    => 'top-right',
                    'name'       => 'pcwc_compare_general[icon_position_single]',
                    'options'    => array(
                        'top-left'     => esc_html__( 'Top Left', 'product-compare-for-woo' ),
                        'top-right'    => esc_html__( 'Top Right', 'product-compare-for-woo' ),
                        'bottom-left'  => esc_html__( 'Bottom Left', 'product-compare-for-woo' ),
                        'bottom-right' => esc_html__( 'Bottom Right', 'product-compare-for-woo' ),
                    ),
                    'style'      => 'single_position.woocommerce_product_thumbnails-0',
                    'extra_class'=> 'single_position_option woocommerce_product_thumbnails-0',
                    'desc'       => esc_html__( 'Choose the position of icons on the single product page.', 'product-compare-for-woo' ),
                ),



                'shop_archive_page_setting' => array(
                    'title'      => esc_html__( 'Shop / Archive Page Setting', 'product-compare-for-woo' ),
                    'field_type' => 'pcwctitle',
                    'default'    => '',
                ),
                'shop_position' => array(
                    'title'      => esc_html__( 'Display Position On Shop Page', 'product-compare-for-woo' ),
                    'field_type' => 'pcwcselect',
                    'default'    => 'woocommerce_before_shop_loop_item-10',
                    'name'       => 'pcwc_compare_general[shop_position]',
                    'options'    => array(
                        'disable-0'                                 => esc_html__( 'Disable Button/Icon', 'product-compare-for-woo' ),
                        'woocommerce_before_shop_loop_item-10'      => esc_html__( 'Over The Image', 'product-compare-for-woo' ),
                        'woocommerce_shop_loop_item_title-10'       => esc_html__( 'After Featured Image/Before Title', 'product-compare-for-woo' ),
                        'woocommerce_after_shop_loop_item_title-0'  => esc_html__( 'After Title', 'product-compare-for-woo' ),
                        'woocommerce_after_shop_loop_item-1'        => esc_html__( 'Before Add to Cart', 'product-compare-for-woo' ),
                        'woocommerce_after_shop_loop_item-20'       => esc_html__( 'After Add to Cart', 'product-compare-for-woo' ),
                    ),
                    'data_hide'  => '.shop_position_option',
                    'desc'       => esc_html__( 'Choose how Button/Icon Position on single and archive page.', 'product-compare-for-woo' ),
                ),
                'icon_display_type' => array(
                    'title'      => esc_html__( 'Icon Display Type', 'product-compare-for-woo' ),
                    'field_type' => 'pcwcselect',
                    'default'    => 'fixed',
                    'name'       => 'pcwc_compare_general[icon_display_type]',
                    'options'    => array(
                        'fixed' => esc_html__( 'Fixed', 'product-compare-for-woo' ),
                        'hover' => esc_html__( 'On Hover', 'product-compare-for-woo' ),
                    ),
                    'style'      => 'shop_position.woocommerce_before_shop_loop_item-10',
                    'extra_class'=> 'shop_position_option woocommerce_before_shop_loop_item-10',
                    'desc'       => esc_html__( 'Choose how icons should appear on product images.', 'product-compare-for-woo' ),
                ),
                'icon_position_shop' => array(
                    'title'      => esc_html__( 'Icon Position in Shop', 'product-compare-for-woo' ),
                    'field_type' => 'pcwcselect',
                    'default'    => 'top-right',
                    'name'       => 'pcwc_compare_general[icon_position_shop]',
                    'options'    => array(
                        'top-left'     => esc_html__( 'Top Left', 'product-compare-for-woo' ),
                        'top-right'    => esc_html__( 'Top Right', 'product-compare-for-woo' ),
                    ),
                    'style'      => 'shop_position.woocommerce_before_shop_loop_item-10',
                    'extra_class'=> 'shop_position_option woocommerce_before_shop_loop_item-10',
                    'desc'       => esc_html__( 'Choose the position of icons in product loops (shop, category pages).', 'product-compare-for-woo' ),
                ),

            );
            
            // Allow other plugins to modify the general fields.
            return $fields = apply_filters( 'pcwc_compare_general_fields', $fields );
        
        }

        /**
         * Define and return fields for the product comparison table.
         * 
         * @return array $fields The fields for the comparison table settings.
         */
        public static function table_field() {

            // Fetch all attribute taxonomies from WooCommerce.
            $attributes = wc_get_attribute_taxonomies();
        
            $fields = array(
                'compare_table_title' => array(
                    'title'      => esc_html__( 'Table Title', 'product-compare-for-woo' ),
                    'field_type' => 'pcwctext',
                    'name'       => 'pcwc_compare_table[compare_table_title]',
                    'default'    => esc_html__( 'Product Comparison', 'product-compare-for-woo' ),
                ),
                'show_image' => array(
                    'title'      => esc_html__( 'Show Image', 'product-compare-for-woo' ),
                    'field_type' => 'pcwcswitch',
                    'default'    => 'yes',
                    'name'       => 'pcwc_compare_table[show_image]',
                    'desc'       => 'Enable or disable the display image on compare table.'
                ),
                'show_title' => array(
                    'title'      => esc_html__( 'Show Title', 'product-compare-for-woo' ),
                    'field_type' => 'pcwcswitch',
                    'default'    => 'yes',
                    'name'       => 'pcwc_compare_table[show_title]',
                    'desc'       => 'Enable or disable the product title in the compare table.'
                ),
                'show_price' => array(
                    'title'      => esc_html__( 'Show Price', 'product-compare-for-woo' ),
                    'field_type' => 'pcwcswitch',
                    'default'    => 'yes',
                    'name'       => 'pcwc_compare_table[show_price]',
                    'desc'       => 'Enable or disable the product price in the compare table.'
                ),
                'show_rating' => array(
                    'title'      => esc_html__( 'Show Rating', 'product-compare-for-woo' ),
                    'field_type' => 'pcwcswitch',
                    'default'    => 'yes',
                    'name'       => 'pcwc_compare_table[show_rating]',
                    'desc'       => 'Enable or disable the product rating in the compare table.'
                ),
                'show_description' => array(
                    'title'      => esc_html__( 'Show Description', 'product-compare-for-woo' ),
                    'field_type' => 'pcwcswitch',
                    'default'    => 'yes',
                    'name'       => 'pcwc_compare_table[show_description]',
                    'desc'       => 'Enable or disable the product description in the compare table.'
                ),
                'show_sku' => array(
                    'title'      => esc_html__( 'Show SKU', 'product-compare-for-woo' ),
                    'field_type' => 'pcwcswitch',
                    'default'    => 'yes',
                    'name'       => 'pcwc_compare_table[show_sku]',
                    'desc'       => 'Enable or disable the product SKU in the compare table.'
                ),
                'show_availability' => array(
                    'title'      => esc_html__( 'Show Availability', 'product-compare-for-woo' ),
                    'field_type' => 'pcwcswitch',
                    'default'    => 'yes',
                    'name'       => 'pcwc_compare_table[show_availability]',
                    'desc'       => 'Enable or disable product stock availability in the compare table.'
                ),
                'show_weight' => array(
                    'title'      => esc_html__( 'Show Weight', 'product-compare-for-woo' ),
                    'field_type' => 'pcwcswitch',
                    'default'    => 'yes',
                    'name'       => 'pcwc_compare_table[show_weight]',
                    'desc'       => 'Enable or disable the product weight in the compare table.'
                ),
                'show_dimensions' => array(
                    'title'      => esc_html__( 'Show Dimensions', 'product-compare-for-woo' ),
                    'field_type' => 'pcwcswitch',
                    'default'    => 'yes',
                    'name'       => 'pcwc_compare_table[show_dimensions]',
                    'desc'       => 'Enable or disable product dimensions in the compare table.'
                ),
                'show_add_to_cart' => array(
                    'title'      => esc_html__( 'Show Add to Cart', 'product-compare-for-woo' ),
                    'field_type' => 'pcwcswitch',
                    'default'    => 'yes',
                    'name'       => 'pcwc_compare_table[show_add_to_cart]',
                    'desc'       => 'Enable or disable the Add to Cart button in the compare table.'
                ),
        
            );
        
            // Loop through attributes and add fields for each one.
            if ( ! empty( $attributes ) ) :
                foreach ( $attributes as $attribute ) :
                    $attribute_slug = $attribute->attribute_name;
                    $fields['pcwc_attr_'.$attribute_slug ] = array(
                        // Translators: %s is replaced with the attribute label.
                        'title'      => sprintf( esc_html__( 'Show %s', 'product-compare-for-woo' ), wc_attribute_label( $attribute_slug ) ),
                        'field_type' => 'pcwcswitch',
                        'default'    => 'no',
                        'name'       => 'pcwc_compare_table[pcwc_attr_'.$attribute_slug.']',
                        // Translators: %s is replaced with the attribute label.
                        'desc'       => sprintf( esc_html__( 'Enable or disable the attribute %s in the compare table.', 'product-compare-for-woo' ), wc_attribute_label( $attribute_slug ) ),
                    );
                endforeach;
            endif;      
            
            // Add a field for enabling the Pro version for additional features.
            $fields['product_meta'] = array(
                'title'      => esc_html__( 'Add Product Meta', 'product-compare-for-woo' ),
                'field_type' => 'pcwcbuypro',
                'pro_link'   => PCWC_PRO_VERSION_URL,
                'button_text'=> esc_html__( 'Buy Pro', 'product-compare-for-woo' ),
                'description'=> esc_html__( 'Get the Pro version to enable the Add Product Meta.', 'product-compare-for-woo' ),
                'default'    => 'no',
            );
            
            // Allow other plugins to modify the table fields.
            return $fields = apply_filters( 'pcwc_product_compare_table_fields', $fields );
        }

        /**
         * Define and return style fields for the product comparison settings.
         * 
         * @return array $fields The style fields for the comparison settings.
         */
        public static function style_field() {
            $fields = array(
                'compare_button_bg_color' => array(
                    'title'       => esc_html__( 'Compare Button/Icon Background Color', 'product-compare-for-woo' ),
                    'field_type'  => 'pcwccolor',
                    'default'     => '#274c4f',
                    'name'        => 'pcwc_compare_style[compare_button_bg_color]',
                    'desc'        => esc_html__( 'Select the background color for the Compare button/icon.', 'product-compare-for-woo' ),
                ),
                'compare_button_text_color' => array(
                    'title'       => esc_html__( 'Compare Button/Icon Text Color', 'product-compare-for-woo' ),
                    'field_type'  => 'pcwccolor',
                    'default'     => '#ffffff',
                    'name'        => 'pcwc_compare_style[compare_button_text_color]',
                    'desc'        => esc_html__( 'Select the text color for the Compare button/icon.', 'product-compare-for-woo' ),
                ),
                'compare_button_bg_hover_color' => array(
                    'title'       => esc_html__( 'Compare Button/Icon Hover Background Color', 'product-compare-for-woo' ),
                    'field_type'  => 'pcwccolor',
                    'default'     => '#1e3a3d',
                    'name'        => 'pcwc_compare_style[compare_button_bg_hover_color]',
                    'desc'        => esc_html__( 'Select the background color for the Compare button/Icon on hover.', 'product-compare-for-woo' ),
                ),
                'compare_button_text_hover_color' => array(
                    'title'       => esc_html__( 'Compare Button/Icon Hover Text Color', 'product-compare-for-woo' ),
                    'field_type'  => 'pcwccolor',
                    'default'     => '#ffffff',
                    'name'        => 'pcwc_compare_style[compare_button_text_hover_color]',
                    'desc'        => esc_html__( 'Select the text color for the Compare button/icon on hover.', 'product-compare-for-woo' ),
                ),

                
                'product_compare_style' => array(
                    'title'         => esc_html__( 'Product Compare Style', 'product-compare-for-woo' ),
                    'field_type'    => 'pcwcselect',
                    'name'          => 'pcwc_compare_style[product_compare_style]',
                    'default'       => 'compare-table',
                    'options'       => array(
                        'compare-table' => esc_html__( 'Style 1', 'product-compare-for-woo' ),
                        'buy-pro-2'     => esc_html__( 'Buy Pro For Style 2', 'product-compare-for-woo' ),
                        'buy-pro-3'     => esc_html__( 'Buy Pro For Style 3', 'product-compare-for-woo' ),
                        'buy-pro-4'     => esc_html__( 'Buy Pro For Style 4', 'product-compare-for-woo' ),
                        'buy-pro-5'     => esc_html__( 'Buy Pro For Style 5', 'product-compare-for-woo' ),
                        'buy-pro-6'     => esc_html__( 'Buy Pro For Style 6', 'product-compare-for-woo' ),
                    ),
                    'data_hide'         => '.compare_style_option',
                    'disabled_options'  => array( 'buy-pro-2', 'buy-pro-3', 'buy-pro-4', 'buy-pro-5', 'buy-pro-6' ),
                ),
                'comparison_table_layout' => array(
                    'title'         => esc_html__( 'Comparison Table Layout', 'product-compare-for-woo' ),
                    'field_type'    => 'pcwcbuypro',
                    'pro_link'      => PCWC_PRO_VERSION_URL,
                    'button_text'   => esc_html__( 'Buy Pro', 'product-compare-for-woo' ),
                    'description'   => esc_html__( 'Get the Pro version to enable the Comparison Table Layout feature.', 'product-compare-for-woo' ),
                    'default'       => 'no',
                ),
                'style_1_button_color' => array(
                    'title'         => esc_html__( 'Add To Cart Button Background Color', 'product-compare-for-woo' ),
                    'field_type'    => 'pcwccolor',
                    'name'          => 'pcwc_compare_style[style_1_button_color]',
                    'default'       => '#000000',
                    'desc'          => esc_html__( 'Choose a color for the Add to Cart button.', 'product-compare-for-woo' ),
                    'style'         => 'product_compare_style.compare-table',
                    'extra_class'   => 'compare_style_option compare-table',
                ),
                'style_1_button_text_color' => array(
                    'title'         => esc_html__( 'Add To Cart Button Text Color', 'product-compare-for-woo' ),
                    'field_type'    => 'pcwccolor',
                    'name'          => 'pcwc_compare_style[style_1_button_text_color]',
                    'default'       => '#ffffff',
                    'desc'          => esc_html__( 'Choose a text color for the Add to Cart button.', 'product-compare-for-woo' ),
                    'style'         => 'product_compare_style.compare-table',
                    'extra_class'   => 'compare_style_option compare-table',
                ),
                'enable_more_style_option' => array(
                    'title'         => esc_html__( 'Enable More Style option', 'product-compare-for-woo' ),
                    'field_type'    => 'pcwcbuypro',
                    'pro_link'      => PCWC_PRO_VERSION_URL,
                    'button_text'   => esc_html__( 'Buy Pro', 'product-compare-for-woo' ),
                    'description'   => esc_html__( 'Get the Pro version to enable the Enable More Style option.', 'product-compare-for-woo' ),
                    'default'       => 'no',
                ),
            );
            
            // Allow other plugins to modify the style fields.
            return $fields = apply_filters( 'pcwc_product_compare_style_fields', $fields );
        
        }

        /**
         * Define and return advanced fields for the product comparison settings.
         * 
         * @return array $fields The advanced fields for the comparison settings.
         */
        public static function compare_premium_field() {

            $fields = array(
            
                'hide_similarities' => array(
                    'title'       => esc_html__( 'Hide Similarities', 'product-compare-for-woo' ),
                    'field_type' => 'pcwcbuypro',
                    'pro_link'   => PCWC_PRO_VERSION_URL,
                    'button_text'=> esc_html__( 'Buy Pro', 'product-compare-for-woo' ),
                    'description'=> esc_html__( 'Get the Pro version to enable the Hide Similarities feature.', 'product-compare-for-woo' ),
                    'default'    => 'no',
                ),
            
                'highlight_differences' => array(
                    'title'       => esc_html__( 'Highlight Differences', 'product-compare-for-woo' ),
                    'field_type' => 'pcwcbuypro',
                    'pro_link'   => PCWC_PRO_VERSION_URL,
                    'button_text'=> esc_html__( 'Buy Pro', 'product-compare-for-woo' ),
                    'description'=> esc_html__( 'Get the Pro version to enable the Highlight Differences feature.', 'product-compare-for-woo' ),
                    'default'    => 'no',
                ),
            
                'related_product_compare' => array(
                    'title'       => esc_html__( 'Related Product Compare', 'product-compare-for-woo' ),
                    'field_type' => 'pcwcbuypro',
                    'pro_link'   => PCWC_PRO_VERSION_URL,
                    'button_text'=> esc_html__( 'Buy Pro', 'product-compare-for-woo' ),
                    'description'=> esc_html__( 'Get the Pro version to enable the Related Product Compare feature.', 'product-compare-for-woo' ),
                    'default'    => 'no',
                ),
            
                'shareable_comparison_table_url' => array(
                    'title'       => esc_html__( 'Shareable Comparison Table URL', 'product-compare-for-woo' ),
                    'field_type' => 'pcwcbuypro',
                    'pro_link'   => PCWC_PRO_VERSION_URL,
                    'button_text'=> esc_html__( 'Buy Pro', 'product-compare-for-woo' ),
                    'description'=> esc_html__( 'Get the Pro version to enable the Shareable Comparison Table URL feature.', 'product-compare-for-woo' ),
                    'default'    => 'no',
                ),
            
                'enable_sticky_bar_of_product_comparison' => array(
                    'title'       => esc_html__( 'Enable Sticky Bar of Product Comparison', 'product-compare-for-woo' ),
                    'field_type' => 'pcwcbuypro',
                    'pro_link'   => PCWC_PRO_VERSION_URL,
                    'button_text'=> esc_html__( 'Buy Pro', 'product-compare-for-woo' ),
                    'description'=> esc_html__( 'Get the Pro version to enable the Enable Sticky Bar of Product Comparison feature.', 'product-compare-for-woo' ),
                    'default'    => 'no',
                ),
        
            );
            
            // Allow other plugins to modify the advanced fields.
            return $fields = apply_filters( 'pcwc_product_compare_premium_fields', $fields );
        
        }

    }

endif;