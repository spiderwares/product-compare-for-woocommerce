<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly.
endif;

// Check if the class is not already defined.
if ( ! class_exists( 'PCWC_Compare_Frontend' ) ) :

    /**
     * PCWC_Compare_Frontend Class
     *
     * Handles the functionality of the product comparison feature on the frontend.
     */
    class PCWC_Compare_Frontend {

        private $compare_general;
        private $theme_button_class;

        /**
         * Constructor to initialize properties and set up event handlers.
         */
        public function __construct() {
            $this->compare_general       = get_option( 'pcwc_compare_general' ); // Retrieve comparison settings.
            $this->theme_button_class   = $this->get_theme_button_class(); // Get the theme button class.
            $this->event_handler(); // Initialize the event handlers.
        }

        /**
         * Event handler to manage display of the compare button and assets.
         */
        public function event_handler() {
            add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_frontend_assets' ) );
            add_action( 'wp_footer', array( $this, 'add_compare_table' ) );
            add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_dynamic_compare_styles' ) );
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
         * Adds the compare table to the footer of the page.
         */
        public function add_compare_table() {
            // Check if the lightbox should open automatically.
            $lightbox = isset( $this->compare_general['open_auto_lightbox'] ) ? $this->compare_general['open_auto_lightbox'] : 'no';
            $compare_table = '<div id="pcwc-compare-modal" class="pcwc-compare-modal" data-lightbox="' . esc_attr( $lightbox ) . '">
                                <div class="pcwc-compare-modal-content">
                                    <span class="pcwc-compare-modal-close">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.29289 5.29289C5.68342 4.90237 6.31658 4.90237 6.70711 5.29289L12 10.5858L17.2929 5.29289C17.6834 4.90237 18.3166 4.90237 18.7071 5.29289C19.0976 5.68342 19.0976 6.31658 18.7071 6.70711L13.4142 12L18.7071 17.2929C19.0976 17.6834 19.0976 18.3166 18.7071 18.7071C18.3166 19.0976 17.6834 19.0976 17.2929 18.7071L12 13.4142L6.70711 18.7071C6.31658 19.0976 5.68342 19.0976 5.29289 18.7071C4.90237 18.3166 4.90237 17.6834 5.29289 17.2929L10.5858 12L5.29289 6.70711C4.90237 6.31658 4.90237 5.68342 5.29289 5.29289Z" fill="#0F1729"/>
                                        </svg>
                                    </span>
                                <div class="compare-table-container"></div>
                                </div>
                            </div>';

            // Output the compare table HTML.
            echo $compare_table;
        }

        /**
         * Enqueues the necessary frontend assets (JavaScript and CSS).
         */
        public function enqueue_frontend_assets() {
            wp_enqueue_script( 
                'pcwc-compare-js', 
                PCWC_URL . 'assets/js/pcwc-compare.js', 
                array( 'jquery' ), 
                PCWC_VERSION, 
                true 
            );

            wp_enqueue_style( 
                'pcwc-frontend-style', 
                PCWC_URL . 'assets/css/pcwc-frontend-style.css', 
                array(), 
                PCWC_VERSION 
            );

            wp_localize_script( 'pcwc-compare-js', 'pcwc_vars', array(
                'pcwc_nonce'    => wp_create_nonce( 'pcwc_nonce' ),
                'ajax_url'      => admin_url( 'admin-ajax.php' ),
                'cookie_name'   => 'pcwc_compare_products',
            ) );
        }


        /**
         * Enqueue Dynamic Styles
         */
        public function enqueue_dynamic_compare_styles() {
            // Generate the dynamic styles
            $styles = $this->generate_dynamic_compare_styles();
            if ( ! empty( $styles ) ) :
                $handle = 'pcwc-dynamic-compare';
                if ( ! wp_style_is( $handle, 'registered' ) ) :
                    wp_register_style( $handle, false, array(), PCWC_VERSION );
                    wp_enqueue_style( $handle ); 
                endif;

                // Add the inline CSS without <style> tags
                wp_add_inline_style( 'pcwc-dynamic-compare', $styles );
            endif;
        }

        /**
         * Generate Dynamic Compare Styles based on settings
         *
         * @return string
         */
        public function generate_dynamic_compare_styles() { 
            $compare_style = get_option( 'pcwc_compare_style', array() );

            ob_start();
            wc_get_template( 
                'compare-dynamic-style.php', 
                array( 
                    'compare_style'  => $compare_style,
                ),
                'product-compare-for-woocommerce/',
                PCWC_TEMPLATE_PATH
            );
            $output = ob_get_clean();

            return apply_filters( 'pcwc_dynamic_compare_styles', $output, $compare_style );
        }
        
    }

    // Initialize the class.
    new PCWC_Compare_Frontend();

endif;