<?php
/**
 * Plugin Name: Affiliates 301
 * Description: Use 301 instead of 302.
 * Version: 1.0.0
 * Author: itthinx
 * Author URI: http://www.itthinx.com
 */
class Affiliates_301 {
  public static function init() {
    add_filter( 'affiliates_parse_request_affiliate_id', array( __CLASS__, 'setup' );
  }
  public static function setup( $qvar, $id ) {
    add_filter( 'wp_redirect_status', array( __CLASS__, 'wp_redirect_status' ) );
    return $id;
  }
  public static function wp_redirect_status( $location, $status ) {
    return 301;
  }
}
add_action( 'init', array( 'Affiliates_301', 'init' ) );
