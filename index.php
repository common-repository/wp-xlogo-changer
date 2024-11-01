<?php 
/**
* Plugin Name: WP xLogo Changer
* Plugin URI: http://nexxoz.com/
* Description: Changes the logo on wp-login page.
* Version: 1.0.0
* Author: Nexxoz
* Author URI: http://nexxoz.com/
* Twitter: nexxoz
* Text Domain: wp-xlogo-changer
* License: GPLv2 or later
*/
if (!defined('ABSPATH'))
    exit;

include 'inc/dashboard.php';

add_action( 'admin_menu', 'wp_xlogo_menu' );
add_action('admin_enqueue_scripts', 'wp_xlogo_admin_style_script');
add_action( 'login_enqueue_scripts', 'wp_xlogo_login_logo' );

function wp_xlogo_menu() {
	add_options_page( 
		'WP xLogo Changer',
		'WP xLogo Changer',
		'manage_options',
		'wp_xlogo_changer_dashboard',
		'wp_xlogo_page'
	);
}

function wp_xlogo_admin_style_script() {
		wp_enqueue_script('media-upload');
	    wp_enqueue_script('thickbox');
	    wp_enqueue_style('thickbox');

	    wp_enqueue_style('my-admin-theme', plugins_url('inc/wp-xlogo-login.css', __FILE__));
		wp_enqueue_script('my_stylesheet', plugins_url('inc/wp-xlogo-login.js', __FILE__));
	}


function wp_xlogo_login_logo() { ?>
    <style type="text/css">
        .login h1 a {
            background-image: url('<?php echo esc_html(get_option( 'wp_xlogo_image' )); ?>');
            -webkit-background-size: <?php echo esc_html(get_option( 'wp_xlogo_image' )); ?>px;
    		background-size: <?php echo esc_html(get_option( 'wp_xlogo_bsize' )); ?>px;
    		height: <?php echo esc_html(get_option( 'wp_xlogo_height' )); ?>px;
    		width: <?php echo esc_html(get_option( 'wp_xlogo_width' )); ?>px;
        }
    </style>
<?php }
?>