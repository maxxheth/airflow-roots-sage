<?php
/**
 * Plugin Name: SSL Development Fix
 * Description: Disables SSL verification in development environment to support self-signed certificates.
 * Version: 1.0.0
 * Author: Antigravity
 */

if (defined('WP_ENV') && WP_ENV === 'development') {
    // Disable SSL verification for all HTTP requests
    add_filter('https_ssl_verify', '__return_false', 99);
    add_filter('https_local_ssl_verify', '__return_false', 99);

    // Ensure WordPress core and plugins don't fail on self-signed certs
    add_filter('http_request_args', function ($args) {
        $args['sslverify'] = false;
        return $args;
    }, 99);
}
