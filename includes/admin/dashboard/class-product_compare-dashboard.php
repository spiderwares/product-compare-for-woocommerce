<?php
/**
 * JThemes Dashboard Class
 *
 * Handles the admin dashboard setup and related functionalities.
 *
 * @package JThemes
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Product_Compare_Dashboard' ) ) {

	/**
	 * Class Product_Compare_Dashboard
	 *
	 * Initializes the admin dashboard for JThemes.
	 */
	class Product_Compare_Dashboard {

		/**
		 * Constructor for Product_Compare_Dashboard class.
		 * Initializes the event handler.
		 */
		public function __construct() {
			$this->events_handler();
		}

		/**
		 * Initialize hooks for admin functionality.
		 */
		private function events_handler() {
			add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
			add_action( 'admin_menu', [ $this, 'admin_menu' ] );
		}

		/**
		 * Enqueue admin-specific styles for the dashboard.
		 */
		public function enqueue_scripts() {
			// Enqueue the JThemes dashboard CSS.
			wp_enqueue_style(
				'jthemes-dashboard',
				PCWC_URL . '/assets/css/admin-styles.css',
				[],
				PCWC_VERSION 
			);

			wp_enqueue_style( 'wp-color-picker' );

			wp_enqueue_script(
				'pcwc-admin-js',
				PCWC_URL . '/assets/js/pcwc-admin.js',
				array( 'jquery', 'wp-color-picker' ), // Dependencies
				PCWC_VERSION,
				true // Load in footer
			);
		}

		/**
		 * Add JThemes menu and submenu to the WordPress admin menu.
		 */
		public function admin_menu() {

			add_menu_page(
				'JThemes',
				'JThemes',
				'manage_options',
				'jthemes',
				[ $this, 'dashboard_callback' ], 
				'data:image/svg+xml;base64,' . base64_encode( file_get_contents( PCWC_PATH . '/assets/img/jthemes.svg' ) ),
				26
			);

			// Add a submenu page under the main JThemes menu.
			add_submenu_page( 
                'jthemes',
                esc_html__( 'JThemes General', 'size-chart-for-woocommerce' ), 
                esc_html__( 'About', 'size-chart-for-woocommerce' ), 
                'manage_options', 
                'jthemes', 
            );

			add_submenu_page( 
                'jthemes', 
                esc_html__( 'Product Compare', 'size-chart-for-woocommerce' ), 
                esc_html__( 'Product Compare', 'size-chart-for-woocommerce' ), 
                'manage_options', 
                'product_compare', 
                [ $this, 'admin_menu_content' ] 
            );
		}

		/**
		 * Callback function for rendering the dashboard content.
		 */
		public function dashboard_callback() {
			$active_tab = isset( $_GET['tab'] ) ? sanitize_key( $_GET['tab'] ) : 'general';
			// Include the about page view file.
			require_once PCWC_PATH . 'includes/admin/dashboard/about.php';
		}

		/**
         * Display content for the Product Compare settings page.
         */
        public function admin_menu_content() {
            // Get the active tab (default to 'general')
			require_once PCWC_PATH . 'includes/admin/dashboard/about.php';
            $active_tab = isset( $_GET['tab'] ) ? sanitize_key( $_GET['tab'] ) : 'general';

            // Include the view file for the Product Compare settings page
            require_once PCWC_PATH . 'includes/admin/settings/views/product-compare-menu.php';
        }
	}

	// Instantiate the Product_Compare_Dashboard class.
	new Product_Compare_Dashboard();
}
