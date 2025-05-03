<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit;
endif;

/**
 * Class PCWC_Genral
 * Handles general settings and product icons display for the Product Compare for WooCommerce plugin.
 */
if ( ! class_exists( 'PCWC_Genral' ) ) :

    class PCWC_Genral {

        /**
         * Theme Button Class options.
         *
         * @var array
         */
        private  $theme_button_class;

        /**
         * Compare General settings options.
         *
         * @var array
         */
        private $compare_general;


        /**
         * Constructor to initialize class properties and add action hooks.
         */
        public function __construct() {
            global $wpdb;
            $this->compare_general       = get_option( 'pcwc_compare_general' );
            $this->theme_button_class   = $this->get_theme_button_class();
            $this->event_handler();
        }

        public function event_handler(){
            $enable             = isset( $this->compare_general['enable'] ) && 'yes' === $this->compare_general['enable'];
            $single_position    = isset($this->compare_general['single_position']) ? $this->compare_general['single_position'] : 'woocommerce_product_thumbnails-0';
            $shop_position      = isset($this->compare_general['shop_position']) ? $this->compare_general['shop_position'] : 'woocommerce_before_shop_loop_item-10';
            $single_hook        = ! empty( $single_position ) ? explode( '-', $single_position ) : array();
            $shop_hook          = ! empty( $shop_position ) ? explode( '-', $shop_position ) : array();
            
        
            // If no icons are enabled, stop execution
            if ( ! $enable ) :
                return;
            endif;

            if ( is_array( $single_hook ) ) :
                $single_priority    = isset( $single_hook[1] ) ? $single_hook[1] : 10;
                $single_hookname    = isset( $single_hook[0] ) ? $single_hook[0] : 'disable';
                
                if($single_hookname == 'woocommerce_product_thumbnails' ):
                    add_action( $single_hookname, array( $this, 'display_icons_on_product_image' ), $single_priority );
                else:
                    add_action( $single_hookname, array( $this, 'product_compare_buttons' ), $single_priority );
                endif;
            endif;

            
            if ( is_array( $shop_hook ) ) :
                $shop_priority      = isset( $shop_hook[1] ) ? $shop_hook[1] : 10;
                $shop_hookname      = isset( $shop_hook[0] ) ? $shop_hook[0] : 'disable';
                
                if( $shop_hookname == 'woocommerce_before_shop_loop_item' ):
                    add_action( $shop_hookname, array( $this, 'display_icons_on_product_image' ), $shop_priority );
                else:
                    add_action( $shop_hookname, array( $this, 'product_compare_buttons' ), $shop_priority );
                endif;
            endif;
        }

        /**
         * Retrieves the theme's button class, which can be filtered.
         *
         * @return string The button class.
         */
        private function get_theme_button_class() {
            return apply_filters( 'pcwc_theme_button_class', 'button woocommerce-button' );
        }

        /**
         * Display icons (Compare, Wishlist, Quick View) on product images.
         */
        public function display_icons_on_product_image() {
            global $product, $wp_query;
        
            // Check if the product exists
            if ( ! $product ) :
                return;
            endif;
        
            // Check if this is the main single product (not a related product)
            $is_main_product        = is_product() && isset( $wp_query->queried_object_id ) && $wp_query->queried_object_id === $product->get_id();
            $is_in_loop             = wc_get_loop_prop('name') ? true : false;
            $icon_position_loop     = isset( $this->compare_general['icon_position_shop'] ) ? $this->compare_general['icon_position_shop'] : 'top-right';
            $icon_position_single   = isset( $this->compare_general['icon_position_single'] ) ? $this->compare_general['icon_position_single'] : 'top-right';
            $display_type           = isset( $this->compare_general['icon_display_type'] ) ? $this->compare_general['icon_display_type'] : 'fixed';
        
            // Set class based on location
            if ( $is_main_product ) :
                $container_class = 'pcwc-single-product-icons';  // Main product page
                $icon_position   = $icon_position_single;
            else :
                $container_class = 'pcwc-loop-product-icons';  // Related products / Loop
                $icon_position   = $icon_position_loop .' '. $display_type;
            endif;
            // Get the product ID
            $product_id = $product->get_id();
        
            echo '<div class="pcwc-product-icons-container ' . esc_attr( $container_class . ' ' . $icon_position ) . '">';
            // Display Compare icon if enabled.
            echo '<div class="pcwc-compare-icon pcwc-compare-button" data-product_id="' . esc_attr( $product_id ) . '">' . $this->get_compare_icon() . '</div>';        
            echo '</div>';
        }

        /**
         * Get the compare icon SVG or custom image.
         *
         * @return string HTML markup for the compare icon.
         */
        public function get_compare_icon() {
            // Check if the image URL is provided and valid
            return '
                <svg class="ct-icon" height="18" width="18" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                    <path d="M7.5 6c-.1.5-.2 1-.3 1.4 0 .6-.1 1.3-.3 2-.2.7-.5 1.4-1 1.9-.5.6-1.3.9-2.2.9H0v-1.4h3.7c.6 0 .9-.2 1.2-.5.3-.3.5-.7.7-1.3.1-.5.2-1 .3-1.6v-.3c0-.5.1-1 .3-1.5.2-.7.5-1.4 1-1.9.5-.6 1.3-.9 2.2-.9h3l-1.6-1.6 1-1L15 3.5l-3.3 3.3-1-1 1.6-1.6h-3c-.6 0-.9.2-1.2.5-.2.3-.5.7-.6 1.3zM4.9 4.7c.2-.4.4-.9.7-1.3-.5-.4-1.1-.6-1.9-.6H0v1.4h3.7c.6 0 1 .2 1.2.5zm5.8 4.5 1.6 1.6h-3c-.6 0-.9-.2-1.2-.5-.2.4-.4.9-.6 1.3.5.4 1.1.6 1.8.6h3l-1.6 1.6 1 1 3.3-3.3-3.3-3.3-1 1z"/>
                </svg>';
        }


        /**
         * Display the product compare button
         */
        public function product_compare_buttons() {
            global $product;
            $product_id         = $product->get_id();
            $compare_text       = isset( $this->compare_general['compare_btn_text'] ) ? $this->compare_general['compare_btn_text'] : esc_html__( 'Compare', 'product-compare-for-woo' );
            $compare_products   = isset( $_COOKIE['pcwc_compare_products'] ) ? json_decode( sanitize_text_field( wp_unslash( $_COOKIE['pcwc_compare_products'] ) ), true ) : []; 
            $compare_text       = in_array( $product_id, $compare_products ) ? esc_html__( 'Added to compare', 'product-compare-for-woo' ) : $compare_text;
            $loader_img         = esc_url( admin_url( 'images/spinner.gif' ) );
            $button_class       = 'pcwc-compare-button ' . esc_attr( $this->theme_button_class );
        
            $html = sprintf(
                '<div class="pcwc-compare-button-wrapper">
                    <button type="button" class="%s" data-product_id="%d">%s</button>
                    <img class="pcwc-loader" style="display: none;" src="%s" alt="Loading...">
                </div>',
                esc_attr($button_class),
                esc_attr($product_id),
                esc_html($compare_text),
                $loader_img
            );

            echo wp_kses_post( $html );
        }


    }

    // Initialize the class.
    new PCWC_Genral();

endif;