<?php
// Prevent direct access to the file. Only allow execution within WordPress.
defined( 'ABSPATH' ) || exit;

/**
 * Retrieve the settings fields for the compare table from the PCWC_Compare_Admin_Settings class.
 *
 * @var array $fields Array of settings fields for configuring the comparison table.
 */
$fields = PCWC_Compare_Admin_Settings::table_field();

/**
 * Get the saved settings for the comparison table from the WordPress options table.
 *
 * @var array|bool $options Retrieved settings array or false if not set.
 */
$options = get_option( 'pcwc_compare_table', true );

/**
 * Load the settings form template for the comparison table.
 *
 * This template enables users to configure how the product comparison table appears and behaves.
 */
wc_get_template(
    'fields/setting-forms.php',
    array(
        'title'   => 'Compare Table',
        'metaKey' => 'pcwc_compare_table',
        'fields'  => $fields,
        'options' => $options, 
    ),
    'product-compare-for-woocommerce/fields/',
    PCWC_TEMPLATE_PATH
);