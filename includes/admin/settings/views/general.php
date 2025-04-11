<?php
// Prevent direct access to the file.
defined( 'ABSPATH' ) || exit; // Ensures the script is only accessible within WordPress.

/**
 * Retrieve the general comparison settings fields from the PCWC_Compare_Admin_Settings class.
 *
 * @var array $fields Array of settings fields for general comparison features.
 */
$fields = PCWC_Compare_Admin_Settings::general_field();

/**
 * Fetch the saved general comparison settings from the WordPress options table.
 *
 * @var array|bool $options Retrieved settings array or false if not set.
 */
$options = get_option( 'pcwc_compare_general', true ); // Fixed typo from 'pcwc_compare_general' to 'pcwc_compare_general'

/**
 * Load the settings form template for the general comparison settings.
 *
 * This template allows users to configure basic comparison options.
 */
wc_get_template(
    'fields/setting-forms.php',
    array(
        'title'   => 'General Settings',
        'metaKey' => 'pcwc_compare_general',
        'fields'  => $fields,
        'options' => $options,
    ),
    'product-compare-for-woocommerce/fields/',
    PCWC_TEMPLATE_PATH
);