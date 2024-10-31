<?php
/**
 * Main file of the plugin
 *
 * @package prevent-user-name-and-email-leakage.
 * @version 1.0.0
 * @license GPLv2
 */

/*
Plugin Name: Prevent user name and email leakage
Plugin URI: https://wordpress.org/plugins/prevent-user-name-and-email-leakage/
Description: Prevent user name and email leakage.
Author: calmPress
Version: 1.0.0
Author URI: http://calmpress.ptg
Text Domain: prevent-user-name-and-email-leakage
Domain Path: /languages
*/

namespace calmpress\plugins\prevent_username_leakage;

if ( ! defined( 'ABSPATH' ) ) {
	die( '403' );
}

use calmpress\integration\prevent_username_leakage as integration;

// register translation.
load_plugin_textdomain( 'prevent-user-name-and-email-leakage' );

/**
 * The current version of the plugin.
 *
 * @var string
 */
const VERSION = '1.0.0';

// Shortcut for using the integration namespace in strings.
const INTEGRATION_NAMESPACE = 'calmpress\integration\prevent_username_leakage';

require_once __DIR__ . '/integration/prevent-username-leakage/functions.php';

// Prevent author=id canonical redirects.
add_filter( 'redirect_canonical', INTEGRATION_NAMESPACE . '\redirect_canonical', 10, 2 );

// Prevent user name enumeration via the rest api.
add_filter( 'rest_prepare_user', INTEGRATION_NAMESPACE . '\rest_prepare_user', 10, 3 );

// Prevent user and password authentication failures on login from revealing
// users and emails.
add_filter( 'authenticate', INTEGRATION_NAMESPACE . '\authenticate', 21, 3 );

// Prevent user and password detection failures while reseting passwords from
// revealing users and emails.
add_action( 'lost_password', INTEGRATION_NAMESPACE . '\lost_password' );
