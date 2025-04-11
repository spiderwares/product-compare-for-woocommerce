<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

$btn_bg_color           = isset( $compare_style['compare_button_bg_color'] ) ? $compare_style['compare_button_bg_color'] : '#274c4f'; 
$btn_text_color         = isset( $compare_style['compare_button_text_color'] ) ? $compare_style['compare_button_text_color'] : '#ffffff'; 
$btn_bg_hover_color     = isset( $compare_style['compare_button_bg_hover_color'] ) ? $compare_style['compare_button_bg_hover_color'] : '#1e3a3d'; 
$btn_text_hover_color   = isset( $compare_style['compare_button_text_hover_color'] ) ? $compare_style['compare_button_text_hover_color'] : '#ffffff';

$style1_btn_bg          = isset( $compare_style['style_1_button_color'] ) ? $compare_style['style_1_button_color'] : '#000000';
$style1_btn_text        = isset( $compare_style['style_1_button_text_color'] ) ? $compare_style['style_1_button_text_color'] : '#ffffff'; ?>
        

.pcwc-comparison-table.pcwc-vertical-table.style-1 .pcwc-compare-add-to-cart a,
.pcwc-comparison-table.pcwc-horizontal-table.compare-table .pcwc-compare-add-to-cart a{
    background-color: <?php echo esc_attr($style1_btn_bg); ?>;
    color: <?php echo esc_attr($style1_btn_text); ?>;
}

.pcwc-compare-button,
.pcwc-product-icons-container .pcwc-compare-icon.pcwc-compare-button{
    background-color: <?php echo esc_attr($btn_bg_color); ?>;
    color: <?php echo esc_attr($btn_text_color); ?>;
}

.pcwc-product-icons-container .pcwc-compare-icon.pcwc-compare-button svg{
    color: <?php echo esc_attr($btn_text_color); ?>;
    fill: <?php echo esc_attr($btn_text_color); ?>;
}

.pcwc-compare-button:hover,
.pcwc-product-icons-container .pcwc-compare-icon.pcwc-compare-button:hover{
    background-color: <?php echo esc_attr($btn_bg_hover_color); ?>;
    color: <?php echo esc_attr($btn_text_hover_color); ?>;
}

.pcwc-product-icons-container .pcwc-compare-icon.pcwc-compare-button:hover svg{
    color: <?php echo esc_attr($btn_text_hover_color); ?>;
    fill: <?php echo esc_attr($btn_text_hover_color); ?>;
}