<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'PCWC' ) ) :

    /**
     * Main PCWC Class
     *
     * @class PCWC
     * @version 1.0.0
     */
    final class PCWC {

        /**
         * The single instance of the class.
         *
         * @var PCWC
         */
        protected static $instance = null;

        /**
         * Constructor for the class.
         */
        public function __construct() {
            $this->event_handler();
            $this->includes();
        }

        /**
         * Initialize hooks and filters.
         */
        private function event_handler() {
            // Register plugin activation hook
            register_activation_hook( PCWC_FILE, array( __CLASS__, 'install' ) );

            // Hook to install the plugin after plugins are loaded
            add_action( 'plugins_loaded', array( $this, 'pcwc_init' ), 11 );
            add_action( 'plugins_loaded', array( $this, 'includes' ), 11 );
        }

        /**
         * Main PCWC Instance.
         *
         * Ensures only one instance of PCWC is loaded or can be loaded.
         *
         * @static
         * @return PCWC - Main instance.
         */
        public static function instance() {
            if ( is_null( self::$instance ) ) :
                self::$instance = new self();
                do_action( 'pcwc_plugin_loaded' );
            endif;
            return self::$instance;
        }

        /**
         * Display admin notice if WooCommerce is not active.
         */
        public function woocommerce_missing_notice() {
            ?>
            <div class="notice notice-error">
                <p><?php esc_html_e( 'Product Compare For WooCommerce requires WooCommerce plugin to be installed and active.', 'product-compare-for-woo' ); ?></p>
            </div>
            <?php
        }

        /**
         * Display admin notice if Essential Kit For WooCommerce is active.
         */
        public function essential_kit_active_notice() {
            ?>
            <div class="notice notice-error">
                <p><?php esc_html_e( 'Product Compare For WooCommerce plugin is already included in Essential Kit For WooCommerce plugin. Please deactivate the Product Compare plugin to avoid conflicts.', 'product-compare-for-woo' ); ?></p>
            </div>
            <?php
        }

        /**
         * Initialize plugin.
         */
        public function pcwc_init() {
            if ( ! function_exists( 'WC' ) ) :
                // WooCommerce not active.
                add_action( 'admin_notices', array( $this, 'woocommerce_missing_notice' ) );
            elseif ( class_exists( 'EKWC' ) ) :
                // Essential Kit For WooCommerce is active.
                add_action( 'admin_notices', array( $this, 'essential_kit_active_notice' ) );
            else :
                do_action( 'pcwc_init' );
            endif;
        }


        /**
         * Include required files.
         */
        public function includes() {
            require_once PCWC_PATH . 'includes/public/class-pcwc-compare-ajax-handler.php';
            if( is_admin() ) :
                $this->includes_admin();
            else :
                $this->includes_public();
            endif;
        }

        /**
         * Include Admin required files.
         */
        public function includes_admin() {
            require_once PCWC_PATH . 'includes/class-pcwc-install.php';
            require_once PCWC_PATH . 'includes/admin/dashboard/class-product_compare-dashboard.php';
            require_once PCWC_PATH . 'includes/admin/settings/class-pcwc-admin-menu.php';
        }

        /**
         * Include Public required files.
         */
        public function includes_public(){
            require_once PCWC_PATH . 'includes/public/class-pcwc-compare-frontend.php';
            require_once PCWC_PATH . 'includes/public/class-pcwc-general.php';
        }

        /**
         * Install the plugin tables.
         */
        public static function install() {
            self::default_data();
        }

        /**
         * Execute function on plugin activation
         */
        public static function default_data() {

            $defaultOptions = require_once PCWC_PATH . '/includes/static/pcwc-default-options.php';
            foreach ( $defaultOptions as $optionKey => $option ) :
                $existingOption = get_option( $optionKey );
                if ( ! $existingOption ) :
                    update_option( $optionKey, $option );
                endif;
            endforeach;
            
        }

    }
endif;