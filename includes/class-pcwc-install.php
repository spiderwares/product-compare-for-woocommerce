<?php

/**
 * Installation related functions and actions.
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'PCWC_install' ) ) :

    /**
     * PCWC_install Class
     *
     * Handles installation processes like creating database tables,
     * setting up roles, and creating necessary pages on plugin activation.
     */
    class PCWC_install {

        /**
         * Hook into WordPress actions and filters.
         */
        public static function init() {
            add_filter( 'plugin_action_links_' . PCWC_BASENAME, array( __CLASS__, 'plugin_action_links' ) );
        }

        /**
         * Install plugin.
         *
         * Creates tables, roles, and necessary pages on plugin activation.
         */
        public static function install() {
            if ( ! is_blog_installed() ) :
                return;
            endif;
            
        }

        /**
         * Add plugin action links.
         *
         * @param array $links Array of action links.
         * @return array Modified array of action links.
         */
        public static function plugin_action_links( $links ) {
            $action_links = array(
                'settings' => sprintf(
                    '<a href="%s" aria-label="%s">%s</a>',
                    admin_url( 'admin.php?page=product_compare' ),
                    esc_attr__( 'Product Compare Settings', 'product-compare-for-woo' ),
                    esc_html__( 'Settings', 'product-compare-for-woo' )
                ),
            );
            return array_merge( $action_links, $links );
        }

    }

    // Initialize the installation process
    PCWC_install::init();

endif;
