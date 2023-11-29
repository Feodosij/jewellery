<?php

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

    // WooCommerce Support
    function modist_add_woocommerce_support() {
        add_theme_support( 'woocommerce' );
    }

    add_action( 'after_setup_theme', 'modist_add_woocommerce_support' );
}