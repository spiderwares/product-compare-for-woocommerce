<?php 
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
<div class="pcwc_admin_page pcwc_admin_settings_page wrap">

    <!-- Navigation tabs for plugin settings -->
    <div class="pcwc_admin_settings_page_nav">
        <h2 class="nav-tab-wrapper">
            <?php $nonce = wp_create_nonce( 'pcwc_admin_nonce' ); ?>
            <!-- General settings tab -->
            <a href="<?php echo esc_url( add_query_arg( '_wpnonce', $nonce, admin_url( 'admin.php?page=product_compare&tab=general' ) ) ); ?>" 
                class="<?php echo esc_attr( $active_tab === 'general' ? 'nav-tab nav-tab-active' : 'nav-tab' ); ?>">
                <img src="<?php echo esc_url( PCWC_URL . 'assets/img/setting.svg'); ?>" />
                <?php esc_html_e( 'General', 'product-compare-for-woo' ); ?>
            </a>

            <!-- Table settings tab -->
            <a href="<?php echo esc_url( add_query_arg( '_wpnonce', $nonce, admin_url( 'admin.php?page=product_compare&tab=table' ) ) ); ?>" 
                class="<?php echo esc_attr( $active_tab === 'table' ? 'nav-tab nav-tab-active' : 'nav-tab' ); ?>">
                <img src="<?php echo esc_url( PCWC_URL . 'assets/img/table.svg'); ?>" />
                <?php esc_html_e( 'Compare Table', 'product-compare-for-woo' ); ?>
            </a>

            <!-- Style settings tab -->
            <a href="<?php echo esc_url( add_query_arg( '_wpnonce', $nonce, admin_url( 'admin.php?page=product_compare&tab=style' ) ) ); ?>" 
                class="<?php echo esc_attr( $active_tab === 'style' ? 'nav-tab nav-tab-active' : 'nav-tab' ); ?>">
                <img src="<?php echo esc_url( PCWC_URL . 'assets/img/style.svg'); ?>" />
                <?php esc_html_e( 'Style', 'product-compare-for-woo' ); ?>
            </a>

            <!-- Premium version tab, visible only if not in the premium version -->
            <?php if ( ! defined( 'PCWC_PREMIUM' ) ) : ?>
                <a href="<?php echo esc_url( add_query_arg( '_wpnonce', $nonce, admin_url( 'admin.php?page=product_compare&tab=premium' ) ) ); ?>" 
                    class="<?php echo esc_attr( $active_tab === 'premium' ? 'nav-tab nav-tab-active' : 'nav-tab' ); ?>" 
                   style="color: #c9356e;">
                    <img src="<?php echo esc_url( PCWC_URL . 'assets/img/setting.svg'); ?>" />
                    <?php esc_html_e( 'Premium Features', 'product-compare-for-woo' ); ?>
                </a>
            <?php endif; ?>
        </h2>
    </div>

    <!-- Content area for the active settings tab -->
    <div class="pcwc_admin_settings_page_content">
        <?php
        require_once PCWC_PATH . 'includes/admin/settings/views/admin-settings.php';
        // Load the content for the currently active tab dynamically.
        require_once PCWC_PATH . 'includes/admin/settings/views/' . $active_tab . '.php';
        ?>
    </div>
</div>
