<?php
/**
 * Plugin Name: Dashang Payment API 
 * Description: API for Dashang payment.
 * Author: Donghua Lau 
 * Author URI: http://www.dashangcloud.com/
 * Version: 1.0.0
 * Plugin URI: https://github.com/Coding110
 */

/**
 * Version number for our API
 *
 * @var string
 */
define( 'DSPAY_API_VERSION', '1.0.0' );

include_once( dirname( __FILE__ ) . '/payhelper.php' );
include_once( dirname( __FILE__ ) . '/managerhelper.php' );
include_once( dirname( __FILE__ ) . '/dashhelper.php' );
/**
 * Register our rewrite rules for the API
 */
function dspay_api_init() {
	dspay_api_register_rewrites();

	global $wp;
	$wp->add_query_var( 'dspay_route' );
}
add_action( 'init', 'dspay_api_init' );

function dspay_api_register_rewrites() {
	add_rewrite_rule( '^' . dspay_get_url_prefix() . '/?$','index.php?dspay_route=/','top' );
	add_rewrite_rule( '^' . dspay_get_url_prefix() . '(.*)?','index.php?dspay_route=$matches[1]','top' );
}

/**
 * Get the URL prefix for any API resource.
 *
 * @return string Prefix.
 */
function dspay_get_url_prefix() {
	return apply_filters( 'dspay_url_prefix', 'sh' );
}

/**
 * Determine if the rewrite rules should be flushed.
 */
function dspay_api_maybe_flush_rewrites() {
    $version = get_option( 'dspay_api_plugin_version', null );

    if ( empty( $version ) ||  $version !== DSPAY_API_VERSION ) {
        flush_rewrite_rules();
        update_option( 'dspay_api_plugin_version', DSPAY_API_VERSION );
    }

}
add_action( 'init', 'dspay_api_maybe_flush_rewrites', 999 );

/**
 *	Load the router
 *	e.g.: 
 *		1).$home_url/sh/7b646c8d
 *		2).$home_url/sh/alipay/return
 *		3).$home_url/sh/alipay/notify
 *		4).$home_url/sh/mng/{handle}
 *
 */
function dspay_api_loaded() {
	if ( empty( $GLOBALS['wp']->query_vars['dspay_route'] ) )
		return;

	$args = explode('/', $GLOBALS['wp']->query_vars['dspay_route']);
	//var_dump($args);
	if(count($args) == 2){
		// Dashang payment
		$len = strlen($args[1]);
		if($len >= 6 && $len <= 12){ 
			rewarding();
		}else{
			echo "Some error 3\n";
		}
	}else if(count($args) == 3){
		if($args[1] == "alipay"){	
			if($args[2] == "notify"){
				echo "Alipay callback notify: ".$args[2]."\n";
				alipay_notify();
			}else if($args[2] == "return"){
				echo "Alipay callback return : ".$args[2]."\n";
				alipay_return();
			}else{
				echo "Some error 2\n";
			}
		}else if($args[1] == "mng"){	
			if($args[2] == "test"){
				manager_test();
			}else if($args[2] == "addsite"){
				add_dash_site(get_current_user_id(), $_POST['site']);
			}else if($args[2] == "gencode"){
				$dskey = generate_dash_key(get_current_user_id(),$_POST['site'], $_POST['fee']);
				generate_dash_code(get_current_user_id(), $dskey, $_POST['fee']);
			//}else if($args[2] == ""){
			}else{
				echo "Some error 4\n";
			}
		}else{
			// Error
			echo "Some error 1\n";
		}
	}else{
		// Error
		echo "Some error 0\n";
	}

	// Finish off our request
	die();
}
add_action( 'template_redirect', 'dspay_api_loaded', -100 );

/**
 * Register routes and flush the rewrite rules on activation.
 */
function dspay_api_activation( $network_wide ) {
	if ( function_exists( 'is_multisite' ) && is_multisite() && $network_wide ) {
		$mu_blogs = wp_get_sites();

		foreach ( $mu_blogs as $mu_blog ) {
			switch_to_blog( $mu_blog['blog_id'] );

			dspay_api_register_rewrites();
			update_option( 'dspay_api_plugin_version', null );
		}

		restore_current_blog();
	} else {
		dspay_api_register_rewrites();
		update_option( 'dspay_api_plugin_version', null );
	}

	dash_tables_init();
}
register_activation_hook( __FILE__, 'dspay_api_activation' );

/**
 * Flush the rewrite rules on deactivation
 */
function dspay_api_deactivation( $network_wide ) {
	if ( function_exists( 'is_multisite' ) && is_multisite() && $network_wide ) {

		$mu_blogs = wp_get_sites();

		foreach ( $mu_blogs as $mu_blog ) {
			switch_to_blog( $mu_blog['blog_id'] );
			delete_option( 'dspay_api_plugin_version' );
		}

		restore_current_blog();
	} else {
		delete_option( 'dspay_api_plugin_version' );
	}
}
register_deactivation_hook( __FILE__, 'dspay_api_deactivation' );


/**
 * Check for errors when using cookie-based authentication
 *
 * WordPress' built-in cookie authentication is always active for logged in
 * users. However, the API has to check nonces for each request to ensure users
 * are not vulnerable to CSRF.
 *
 * @param WP_Error|mixed $result Error from another authentication handler, null if we should handle it, or another value if not
 * @return WP_Error|mixed|boolean
 */
function dspay_cookie_check_errors( $result ) {
	if ( ! empty( $result ) ) {
		return $result;
	}

	global $wp_json_auth_cookie;

	// Are we using cookie authentication?
	// (If we get an auth error, but we're still logged in, another
	// authentication must have been used.)
	if ( $wp_json_auth_cookie !== true && is_user_logged_in() ) {
		return $result;
	}

	// Do we have a nonce?
	$nonce = null;
	if ( isset( $_REQUEST['_wp_json_nonce'] ) ) {
		$nonce = $_REQUEST['_wp_json_nonce'];
	} elseif ( isset( $_SERVER['HTTP_X_WP_NONCE'] ) ) {
		$nonce = $_SERVER['HTTP_X_WP_NONCE'];
	}

	if ( $nonce === null ) {
		// No nonce at all, so act as if it's an unauthenticated request
		wp_set_current_user( 0 );
		return true;
	}

	// Check the nonce
	$result = wp_verify_nonce( $nonce, 'wp_json' );
	if ( ! $result ) {
		return new WP_Error( 'json_cookie_invalid_nonce', __( 'Cookie nonce is invalid' ), array( 'status' => 403 ) );
	}

	return true;
}
add_filter( 'json_authentication_errors', 'dspay_cookie_check_errors', 100 );

/**
 * Collect cookie authentication status
 *
 * Collects errors from {@see wp_validate_auth_cookie} for use by
 * {@see dspay_cookie_check_errors}.
 *
 * @param mixed
 */
function dspay_cookie_collect_status() {
	global $wp_json_auth_cookie;

	$status_type = current_action();

	if ( $status_type !== 'auth_cookie_valid' ) {
		$wp_json_auth_cookie = substr( $status_type, 12 );
		return;
	}

	$wp_json_auth_cookie = true;
}
add_action( 'auth_cookie_malformed',    'dspay_cookie_collect_status' );
add_action( 'auth_cookie_expired',      'dspay_cookie_collect_status' );
add_action( 'auth_cookie_bad_username', 'dspay_cookie_collect_status' );
add_action( 'auth_cookie_bad_hash',     'dspay_cookie_collect_status' );
add_action( 'auth_cookie_valid',        'dspay_cookie_collect_status' );

