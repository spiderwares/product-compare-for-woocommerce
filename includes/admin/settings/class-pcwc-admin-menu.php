<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'PCWC_Admin_Menu' ) ) :

    /**
     * Main PCWC_Admin_Menu Class
     *
     * @class PCWC_Admin_Menu
     * @version     
     */
    final class PCWC_Admin_Menu {

        /**
         * The single instance of the class.
         *
         * @var PCWC_Admin_Menu
         */
        protected static $instance = null;

        /**
         * Constructor for the class.
         * Initializes the event handler (hooks and actions).
         */
        public function __construct() {
            $this->event_handler();
        }

        /**
         * Initialize hooks and filters for the admin menu.
         * This includes the settings registration and filter actions.
         */
        private function event_handler() {
            // Add admin init action to register settings
            add_action( 'admin_init', [ $this, 'register_settings' ] );
        }

        /**
         * Register plugin settings.
         * This is used to register all the settings that will be stored in the options table.
         */
        public function register_settings() {
            // Settings keys to register
            $settings = [
                'pcwc_compare_general',
                'pcwc_compare_table',
                'pcwc_compare_style',
                'pcwc_compare_premium',
            ];

            foreach ( $settings as $setting ) :
                // phpcs:ignore WordPressVIPMinimum.Functions.RestrictedFunctions.register_setting_register_setting
                // Dynamic option name. Safe because sanitize_callback is properly defined.
                register_setting( $setting, $setting, [ 'sanitize_callback' => [ $this, 'sanitize_input' ] ] );
            endforeach;
        }

        /**
         * Generic sanitization function for all settings.
         *
         * @param mixed $input The input value to sanitize.
         * @return mixed Sanitized input value.
         */
        public function sanitize_input( $input ) {

            if ( is_array( $input ) ) :
                $sanitized = [];
                foreach ( $input as $key => $value ) :
                    // Handle multi-dimensional arrays
                    if ( is_array( $value ) ) :
                        $sanitized[ $key ] = array_map( function( $sub_value ) {
                            return is_array( $sub_value ) ? array_map( 'sanitize_text_field', $sub_value ) : sanitize_text_field( $sub_value );
                        }, $value );
                    else :
                        $sanitized[ $key ] = sanitize_text_field( $value );
                    endif;
                endforeach;
                return $sanitized;
            endif;

            return sanitize_text_field( $input );
        }

    }

    // Instantiate the PCWC_Admin_Menu class
    new PCWC_Admin_Menu();

endif;
