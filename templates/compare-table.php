<?php
// Prevent direct access to the file.
defined( 'ABSPATH' ) || exit; ?>

<div class="pcwc-compare-container">
    <div class="pcwc-controls">
        <h2 class="pcwc-subHeading"><?php echo esc_html( $table_title ); ?></h2>
        <div class="pcwc-filter-reset">
            <div class="pcwc_filter_btn_wrapper">
                <?php echo apply_filters( 'pcwc_compare_after_filter_btn', '' ); ?>
            </div>
        </div>
    </div>
    <div class="pcwc-copy-wrapper"><?php echo wp_kses_post( apply_filters('pcwc_after_compare_title', '', $products ) ); ?></div>
    <div class="pcwc-table-container">
    <div class="pcwc-scrollable-table">
    <?php ob_start(); ?>
        <table class="pcwc-comparison-table pcwc-vertical-table style-1">
            <thead>
                <tr>
                    <td class="pcwc-info"></td>
                    <?php foreach ($products as $product) : ?>
                        <th>
                            <div class="pcwc-compare-product">
                            <input type="checkbox" class="pcwc-check" />
                            <?php if ( isset($pcwc_compare_table['show_image'] ) && $pcwc_compare_table['show_image'] === 'yes' ) : ?>
                                <img class="pcwc-compare-img" src="<?php echo esc_url($product['image']); ?>" alt="<?php echo esc_attr($product['title']); ?>">
                            <?php endif; ?>
                            <?php if( isset($pcwc_compare_table['show_title'] ) && $pcwc_compare_table['show_title'] === 'yes' ): ?>
                                <h3 class="pcwc-name"><?php echo esc_html($product['title']); ?></h3>
                            <?php endif; ?>
                            </div>
                        </th>
                    <?php endforeach; ?>
                </tr>
            </thead>

            <tbody>
                <?php if( isset($pcwc_compare_table['show_price']) && $pcwc_compare_table['show_price'] === 'yes' ): ?>
                    <tr>
                        <td class="pcwc-info"><i class="fas fa-long-arrow-alt-right"></i><?php esc_html_e( 'Price', 'product-compare-for-woo' ); ?></td>
                        <?php foreach ($products as $product) : ?>
                            <td><?php echo wp_kses_post($product['price']); ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endif; ?>

                <?php if( isset($pcwc_compare_table['show_rating'] ) && $pcwc_compare_table['show_rating'] === 'yes' ): ?>
                    <tr>
                        <td class="pcwc-info"><i class="fas fa-long-arrow-alt-right"></i><?php esc_html_e( 'Rating', 'product-compare-for-woo' ); ?></td>
                        <?php foreach ($products as $product) : ?>
                            <td class="pcwc-rate"><?php echo wp_kses_post($product['rating']); ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endif; ?>

                <?php if( isset($pcwc_compare_table['show_description'] ) && $pcwc_compare_table['show_description'] === 'yes' ): ?>
                    <tr>
                        <td class="pcwc-info"><i class="fas fa-long-arrow-alt-right"></i><?php esc_html_e( 'Description', 'product-compare-for-woo' ); ?></td>
                        <?php foreach ($products as $product) : ?>
                            <td><p class="pcwc-description"><?php echo esc_html($product['description']); ?></p></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endif; ?>


                <?php if( isset($pcwc_compare_table['show_sku'] ) && $pcwc_compare_table['show_sku'] === 'yes' ): ?>
                    <tr>
                        <td class="pcwc-info"><i class="fas fa-long-arrow-alt-right"></i><?php esc_html_e( 'SKU', 'product-compare-for-woo' ); ?></td>
                        <?php foreach ($products as $product) : ?>
                            <td><?php echo esc_html($product['sku']); ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endif; ?>


                <?php if( isset($pcwc_compare_table['show_availability'] ) && $pcwc_compare_table['show_availability'] === 'yes' ): ?>
                    <tr>
                        <td class="pcwc-info"><i class="fas fa-long-arrow-alt-right"></i><?php esc_html_e( 'Availability', 'product-compare-for-woo' ); ?></td>
                        <?php foreach ($products as $product) : ?>
                            <td><?php echo esc_html($product['availability']); ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endif; ?>


                <?php if( isset($pcwc_compare_table['show_weight'] ) && $pcwc_compare_table['show_weight'] === 'yes' ): ?>
                    <tr>
                        <td class="pcwc-info"><i class="fas fa-long-arrow-alt-right"></i><?php esc_html_e( 'Weight', 'product-compare-for-woo' ); ?></td>
                        <?php foreach ($products as $product) : ?>
                            <td><?php echo esc_html($product['weight']); ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endif; ?>


                <?php if( isset($pcwc_compare_table['show_dimensions'] ) && $pcwc_compare_table['show_dimensions'] === 'yes' ): ?>
                    <tr>
                        <td class="pcwc-info"><i class="fas fa-long-arrow-alt-right"></i><?php esc_html_e( 'Dimensions', 'product-compare-for-woo' ); ?></td>
                        <?php foreach ($products as $product) : ?>
                            <td><?php echo esc_html($product['dimensions']); ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endif; ?>


                <?php if ( ! empty( $products ) && isset( $products[0]['attr'] ) && is_array( $products[0]['attr'] ) ) : ?>
                    <?php foreach ($products[0]['attr'] as $attr_key => $attr_data) : ?>
                        <tr>
                            <td class="pcwc-info">
                                <i class="fas fa-long-arrow-alt-right"></i> 
                                <?php echo esc_html($attr_data['name'] ); ?>
                            </td>
                            <?php foreach ($products as $product) : ?>
                                <td>
                                <?php if ( isset( $product['attr'][$attr_key]['value'] ) && ! empty( $product['attr'][$attr_key]['value'] ) ) :
                                    echo esc_html( $product['attr'][$attr_key]['value'] );
                                endif; ?>
                                </td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>

                <?php echo wp_kses_post( apply_filters( 'pcwc_custom_meta_rows', '', $products ) ); ?>

                <?php if( isset($pcwc_compare_table['show_add_to_cart'] ) && $pcwc_compare_table['show_add_to_cart'] === 'yes' ): ?>
                    <tr>
                        <td class="pcwc-info"><i class="fas fa-long-arrow-alt-right"></i><?php esc_html_e( 'Add To Cart', 'product-compare-for-woo' ); ?></td>
                        <?php foreach ($products as $product) : ?>
                            <td  class="pcwc-compare-add-to-cart"><?php echo wp_kses_post( $product['add_to_cart'] ); ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endif; ?>

                <tr class="pcwc-remove">
                    <td class="pcwc-info"></td>
                    <?php $remove_text = isset($pcwc_compare_general['remove_btn_text']) && $pcwc_compare_general['remove_btn_text'] ? $pcwc_compare_general['remove_btn_text'] : 'Remove'; ?>
                    <?php foreach ($products as $product) : ?>
                        <td>
                            <button class="pcwc-remove-compare" data-product_id="<?php echo esc_attr($product['id']); ?>"><?php echo esc_html($remove_text); ?></button>
                        </td>
                    <?php endforeach; ?>
                </tr>
            </tbody>
        </table>
        <?php $table_html = ob_get_clean(); ?>
        <?php $table_html = apply_filters('pcwc_comparison_table_html', $table_html, $products, $pcwc_compare_general, $pcwc_compare_style, $pcwc_compare_table); ?>
        <?php echo wp_kses_post($table_html); ?>
    </div>
    </div>
</div>