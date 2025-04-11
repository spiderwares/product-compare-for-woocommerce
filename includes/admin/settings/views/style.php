<?php
// Prevent direct access to the file.
defined( 'ABSPATH' ) || exit; // Ensures script execution only within WordPress.

/**
 * Retrieve the style-related settings fields from the PCWC_Compare_Admin_Settings class.
 *
 * @var array $fields Array of settings fields for comparison style customization.
 */
$fields = PCWC_Compare_Admin_Settings::style_field();

/**
 * Fetch the saved style settings for the comparison feature from the WordPress options table.
 *
 * @var array|bool $options Retrieved settings array or false if not set.
 */
$options = get_option( 'pcwc_compare_style', true );

/**
 * Load the settings form template for style-related customization.
 *
 * This template enables users to configure styling options for the comparison feature.
 */
wc_get_template(
    'fields/setting-forms.php',
    array(
        'title'   => 'Style Settings', 
        'metaKey' => 'pcwc_compare_style',
        'fields'  => $fields,
        'options' => $options,
    ),
    'product-compare-for-woocommerce/fields/',
    PCWC_TEMPLATE_PATH
);