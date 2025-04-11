<?php 

if ( ! defined( 'ABSPATH' ) ) exit;

return apply_filters( 'pcwc_get_default_options',
    array(
        'pcwc_compare_general'  => array(
            'enable'                => 'yes',
            'compare_btn_text'      => 'Compare',
            'remove_btn_text'       => 'Remove',
            'open_auto_lightbox'    => 'yes',
            'single_position'       => 'woocommerce_product_thumbnails-0',
            'icon_position_single'  => 'top-right',
            'shop_position'         => 'woocommerce_before_shop_loop_item-10',
            'icon_display_type'     => 'fixed',
            'icon_position_shop'    => 'top-right',
        ),

        'pcwc_compare_table'    => array(
            'compare_table_title'   => 'Product Comparison',
            'show_image'            => 'yes',
            'show_title'            => 'yes',
            'show_price'            => 'yes',
            'show_rating'           => 'yes',
            'show_description'      => 'yes',
            'show_sku'              => 'yes',
            'show_availability'     => 'yes',
            'show_weight'           => 'yes',
            'show_dimensions'       => 'yes',
            'show_add_to_cart'      => 'yes',
            'pcwc_attr_color'       => 'no',
            'pcwc_attr_size'        => 'no',
        ),

        'pcwc_compare_style'    => array(
            'compare_button_bg_color'           => '#274c4f',
            'compare_button_text_color'         => '#ffffff',
            'compare_button_bg_hover_color'     => '#1e3a3d',
            'compare_button_text_hover_color'   => '#ffffff',
            'product_compare_style'             => 'compare-table',
            'comparison_table_layout'           => 'vertical',
            'style_1_button_color'              => '#0a0202',
            'style_1_button_text_color'         => '#ffffff',
        ),

        'pcwc_compare_premium'  => array(
            'hide_similarities'                         => 'no',
            'highlight_differences'                     => 'no',
            'related_product_compare'                   => 'no',
            'shareable_comparison_table_url'            => 'no',
            'enable_sticky_bar_of_product_comparison'   => 'no',
        ),
    )
);
