<?php
/**
 * Plugin Name: Affiliates 301
 * Description: Use 301 instead of 302 when redirecting affiliate links.
 * Version: 1.0.0
 * Author: itthinx
 * Author URI: http://www.itthinx.com
 */

/**
 * Recognizes affiliate link hit and registers a filter to use 301 instead
 * of 302.
 */
class Affiliates_301 {
	
	/**
	 * Register filter that sets up redirect filter when due.
	 */
	public static function init() {
		add_filter( 'affiliates_parse_request_affiliate_id', array( __CLASS__, 'affiliates_parse_request_affiliate_id' ), 10, 2 );
	}

	/**
	 * Registers the filter on redirect status.
	 * 
	 * @param string $qvar
	 * @param int $id
	 * @return affiliate id
	 */
	public static function affiliates_parse_request_affiliate_id( $qvar, $id ) {
		add_filter( 'wp_redirect_status', array( __CLASS__, 'wp_redirect_status' ), 10, 2 );
		return $id;
	}

	/**
	 * Changes redirect status to 301.
	 * 
	 * @param string $location
	 * @param int $status
	 * @return int 301 status code
	 */
	public static function wp_redirect_status( $location, $status ) {
		return 301;
	}
}
add_action( 'init', array( 'Affiliates_301', 'init' ) );
