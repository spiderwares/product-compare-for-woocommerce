<?php
// Prevent direct access to the file.
defined( 'ABSPATH' ) || exit; // Ensures the script is only accessible via WordPress.

/**
 * Retrieve the advanced comparison fields from the PCWC_Compare_Admin_Settings class.
 *
 * @var array $fields Array of settings fields for advanced comparison features.
 */
$fields = PCWC_Compare_Admin_Settings::compare_advance_field();

/**
 * Fetch the saved advanced comparison settings from the WordPress options table.
 *
 * @var array|bool $options Retrieved settings or false if not set.
 */
$options = get_option( 'pcwc_compare_advance', true );

/**
 * Load the settings form template for the advanced comparison features.
 *
 * This template allows users to configure additional comparison options.
 */
wc_get_template(
    'fields/setting-forms.php',
    array(
        'title'   => 'Advanced Features',
        'metaKey' => 'pcwc_compare_advance',
        'fields'  => $fields, 
        'options' => $options,
    ),
    'product-compare-for-woocommerce/fields/', 
    PCWC_TEMPLATE_PATH 
);
?>
