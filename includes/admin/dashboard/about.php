<?php
// Ensure that the script is being accessed within WordPress
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;
?>

<div class="pcwc_admin_page pcwc_welcome_page wrap pcwc_admin_settings_page">

    <div class="card">
    <!-- Display the plugin title and version -->
        <h1 class="title">
            <?php 
            // Output the plugin title, version, and premium label (if applicable).
            echo esc_html__( 'Product Compare For WooCommerce', 'product-compare-for-woo' ) . ' ' . esc_html( PCWC_VERSION ) ; 
            ?>
        </h1>

        <!-- Plugin description and external links -->
        <div class="pcwc_settings_page_desc about-text">
            <p>
                <?php 
                // Translators: %s is replaced with a five-star rating HTML.
                printf( 
                    esc_html__( 'Thank you for choosing our plugin! If you’re happy with its performance, we’d be grateful if you could give us a five-star %s rating. Your support helps us improve and deliver even better features.', 'product-compare-for-woo' ), 
                    '<span style="color:#ff0000">&#9733;&#9733;&#9733;&#9733;&#9733;</span>' 
                );
                ?>
                <br/>
                <!-- Add links to reviews, changelog, and discussion pages -->
                <a href="<?php echo esc_url( PCWC_REVIEWS ); ?>" target="_blank"><?php esc_html_e( 'Reviews', 'product-compare-for-woo' ); ?></a> |
                <a href="<?php echo esc_url( PCWC_CHANGELOG ); ?>" target="_blank"><?php esc_html_e( 'Changelog', 'product-compare-for-woo' ); ?></a> |
                <a href="<?php echo esc_url( PCWC_DISCUSSION ); ?>" target="_blank"><?php esc_html_e( 'Discussion', 'product-compare-for-woo' ); ?></a>
            </p>
        </div>
    </div>
</div>
