<?php
/*
Plugin Name: SideOffer
Plugin URI: http://www.heavydigital.net/plugins/sideoffer/?utm_source=wpadmin-plugins&utm_medium=plugin&utm_campaign=SideOffer
Description: <a href="http://www.heavydigital.net/plugins/sideoffer/?utm_source=wpadmin-plugins&utm_medium=plugin&utm_campaign=SideOffer" target="_blank">SideOffer</a> is a pop-out content slider, designed to increase conversions by allowing you to present your users with highly visible calls to action. You could collect emails for your newsletter, offer a free download or make your contact form persistant. Features include an easy and interactive setup, custom graphics (PSD Source included) and the integration of a "sideoffer" class, allowing users to trigger the slider via anchor link.
Version: 1.0.3
Author: Heavy Digital
Author URI: http://www.HeavyDigital.net/?utm_source=wpadmin-plugins&utm_medium=plugin&utm_campaign=SideOffer
*/

// Defaults
define( 'HD_PUGIN_NAME', 'SideOffer');
define( 'HD_PLUGIN_DIRECTORY', 'sideoffer');
define( 'HD_CURRENT_VERSION', '1.0.3' );

// Admin Page
require_once('sideoffer-options.php');

// create custom plugin settings menu
add_action( 'admin_menu', 'hd_create_menu' );

//call register settings function
add_action( 'admin_init', 'hd_register_settings' );

register_activation_hook(__FILE__, 'hd_activate');
register_deactivation_hook(__FILE__, 'hd_deactivate');
register_uninstall_hook(__FILE__, 'hd_uninstall');

// activating the default values
function hd_activate() {
	// Set Default Values
	add_option('hd_sideoffer_mode','setup');
	add_option('hd_sideoffer_title','<h2>Sign Up Today!</h2>');
	add_option('hd_sideoffer_content',"Create your SideOffer content and place it here.\n\nYou can use text, HTML and [shortcodes]\n\nThis plugin is a great companion to Contact Form 7!");
	add_option('hd_sideoffer_bg',plugins_url( 'images/sideoffer-bg.png',  __FILE__ ));
	add_option('hd_sideoffer_color_text','#ffffff');
	add_option('hd_sideoffer_side','right');
	add_option('hd_sideoffer_top','120');
	add_option('hd_sideoffer_in','-510');
	add_option('hd_sideoffer_out','-50');
	add_option('hd_sideoffer_width','600');
	add_option('hd_sideoffer_height','600');
}

// deactivating
function hd_deactivate() {

}

// uninstalling
function hd_uninstall() {
	# delete all data stored
	delete_option('hd_sideoffer_mode');
	delete_option('hd_sideoffer_title');
	delete_option('hd_sideoffer_content');
	delete_option('hd_sideoffer_bg');
	delete_option('hd_sideoffer_color_text');
	delete_option('hd_sideoffer_side');
	delete_option('hd_sideoffer_top');
	delete_option('hd_sideoffer_in');
	delete_option('hd_sideoffer_out');
	delete_option('hd_sideoffer_width');
	delete_option('hd_sideoffer_height');
}

function hd_create_menu() {

	// create new top-level menu
	add_menu_page( 
	HD_PUGIN_NAME,
	HD_PUGIN_NAME,
	'manage_options',
	'sideoffer',
	'sideoffer_options',
	plugins_url('/images/icon-hd.png', __FILE__));
	
	add_submenu_page( 
	'sideoffer',
	HD_PUGIN_NAME,
	HD_PUGIN_NAME,
	'manage_options',
	'sideoffer',
	'sideoffer_options'
	);

}

// Add settings link on plugin page
add_filter("plugin_action_links_".plugin_basename(__FILE__), 'hd_sideoffer_settings_link' );
function hd_sideoffer_settings_link($links) { 
  $settings_link = '<a href="admin.php?page=sideoffer">Settings</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
}

// Register settings
function hd_register_settings() {
	register_setting( 'hd-sideoffer-settings', 'hd_sideoffer_mode' );
	register_setting( 'hd-sideoffer-settings', 'hd_sideoffer_title' );
	register_setting( 'hd-sideoffer-settings', 'hd_sideoffer_content' );
	register_setting( 'hd-sideoffer-settings', 'hd_sideoffer_bg');
	register_setting( 'hd-sideoffer-settings', 'hd_sideoffer_color_text');
	register_setting( 'hd-sideoffer-settings', 'hd_sideoffer_side' );
	register_setting( 'hd-sideoffer-settings', 'hd_sideoffer_top' );
	register_setting( 'hd-sideoffer-settings', 'hd_sideoffer_in' );
	register_setting( 'hd-sideoffer-settings', 'hd_sideoffer_out' );
	register_setting( 'hd-sideoffer-settings', 'hd_sideoffer_width');
	register_setting( 'hd-sideoffer-settings', 'hd_sideoffer_height');
}

/* Enqueue Admin Scripts */
add_action('admin_print_scripts', 'hd_sideoffer_admin_scripts');
function hd_sideoffer_admin_scripts() {
	wp_enqueue_script('jquery');
  	wp_enqueue_script( 'farbtastic' );
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
}


add_action('admin_print_styles', 'hd_sideoffer_admin_styles');
function hd_sideoffer_admin_styles() {
	wp_enqueue_style( 'farbtastic' );
	wp_enqueue_style('thickbox');
}

add_action('admin_head-toplevel_page_sideoffer','hd_sideoffer_css');
/* End Enqueue Admin Scripts */

/*** SideOffer Offer Code ***/
if (get_option('hd_sideoffer_mode')!="setup") add_action('wp_footer','hd_sideoffer',100);
add_action('admin_head-toplevel_page_sideoffer','hd_sideoffer');
function hd_sideoffer() {
	?>
    <!-- SideOffer -->
	<script type="text/javascript">
	jQuery(document).ready(function($) {
		/* SideOffer Sidebar Functionality */
		$("#sideoffer").toggle(
			function() { $(this).animate({ "right": "<?php echo get_option('hd_sideoffer_out'); ?>px" }, "slow"); },
			function() { $(this).animate({ "right": "<?php echo get_option('hd_sideoffer_in'); ?>px" }, "slow"); }
		);
		
		/* SideOffer .hd-sideoffer click function */
		$(".sideoffer").click(function(){ $("#sideoffer").click(); });
		/* SideOffer aLlow clicks on content box */
		$("#sideoffer .box").click(function(event){ event.stopPropagation(); });
	});
	</script>
	<div id="sideoffer">
	<div class="box">
	<?php echo get_option('hd_sideoffer_title'); ?>
    <?php echo do_shortcode(get_option('hd_sideoffer_content')); ?>
	</div><!-- End .box  -->
	</div><!-- End #sideoffer -->
    <!-- End SideOffer -->
    <?php
}

/*** SideOffer JS  ***
Enqueue JavaScript (jQuery)
Since 1.0.2
***/
add_action('wp_head','hd_sideoffer_js',100);
function hd_sideoffer_js() {
	wp_enqueue_script('jquery');
}

/*** SideOffer CSS ***/
// Enqueue CSS	
add_action('wp_head','hd_sideoffer_css',100);
function hd_sideoffer_css() {
	?>
    <!-- SideOffer [HD] CSS -->
	<style type="text/css">
	#sideoffer { 
		background: url('<?php echo get_option('hd_sideoffer_bg'); ?>') top left no-repeat; 
		width:<?php echo get_option('hd_sideoffer_width'); ?>px;
		height:<?php echo get_option('hd_sideoffer_height'); ?>px; 
		position:fixed; 
		top:<?php echo get_option('hd_sideoffer_top'); ?>px; 
		<?php echo "right"; //get_option('hd_sideoffer_side'); ?>: <?php echo get_option('hd_sideoffer_in'); ?>px; 
		text-transform: none; 
		z-index:99999; 
	}
	#sideoffer .box { position: absolute; right:0; width: 78%; padding: 15px 10px; color: <?php echo get_option('hd_sideoffer_color_text'); ?>; }
	#sideoffer p { margin-bottom: 5px !important; }
	</style>
    <!-- End SideOffer [HD] CSS -->
    <?php
}
