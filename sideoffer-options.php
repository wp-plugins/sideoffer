<?php // SideOffer Options Page

add_action( 'admin_notices', 'hd_sideoffer_admin_pagehook' );
function hd_sideoffer_admin_pagehook() {
	global $hook_suffix;
    if ( $hook_suffix == 'toplevel_page_sideoffer' ) {
		if ($_REQUEST['settings-updated']==true) 
			echo '<div id="message" class="updated"><p>Settings Updated.</p></div>'; 
	}
	
	if (get_option('hd_sideoffer_mode')=="setup") echo '<div id="message" class="updated"><p><strong>SideOffer</strong> is active but not live. <a href="admin.php?page=sideoffer">Click Here</a> for configuration options. </p></div>';
		
} 

function sideoffer_options() { 
?>
<script language="JavaScript">
jQuery(document).ready(function($) {

	/* Image Upload Functions */
	$('#upload_image_button').click(function() {
		uploadID = $('#hd_sideoffer_bg');
		widthID = $('#hd_sideoffer_width');
		heightID = $('#hd_sideoffer_height');
		inID = $('#hd_sideoffer_in');
		tb_show('', 'media-upload.php?type=image&TB_iframe=true');
		return false;
	});

	window.send_to_editor = function(html) {
		
		imgurl = $('img',html).attr('src');
		imgw = $('img',html).attr('width');
		imgh = $('img',html).attr('height');
		imgside = '-'+Math.round(imgw*0.833);
		
		uploadID.val(imgurl);
		widthID.val(imgw);
		heightID.val(imgh);
		inID.val(imgside); /* Defaults to 5/6ths body size */
		
		/* Update SideOffer Position */
		$('#sideoffer').css('background','url("'+imgurl+'") no-repeat top center');
		$('#sideoffer').css('right',imgside);
		$('#sideoffer').css('width',imgw);
		$('#sideoffer').css('height',imgh);
		
		tb_remove();
	}
	
	/* Color Picker */
    $('#hd_colorpicker').farbtastic("#hd_sideoffer_color_text");
	
	/* Real Time Positioning */
	$('#hd_sideoffer_top').bind("change keyup input",function() {
		$('#sideoffer').css('right',$('#hd_sideoffer_out').val()+'px');
		$('#sideoffer').css('top',$(this).val()+'px');
	});
	
	$('#hd_sideoffer_in').bind("change keyup input",function() {
		$('#sideoffer').css('right',$(this).val()+'px');
	});
	
	$('#hd_sideoffer_out').bind("change keyup input",function() {
		$('#sideoffer').css('right',$(this).val()+'px');
	});
	
});
</script>

<div class="wrap">

<h2><?php echo HD_PUGIN_NAME; ?></h2>

<form method="post" action="options.php">
    <?php settings_fields( 'hd-sideoffer-settings' ); ?>
      
    <div id="poststuff" class="metabox-holder has-right-sidebar">
    
    	<!-- Sidebar -->
        <div class="inner-sidebar" style="position:relative">
        <div id="side-sortables" class="meta-box-sortabless ui-sortable" style="position:absolute;">
        
        	<style>
			a.hd_icon {
				padding: 4px;
				display: block;
				padding-left: 25px;
				background-repeat: no-repeat;
				background-position: 5px 50%;
				text-decoration: none;
				border: none;
			}
			
			a.hd_logo { background-image: url(<?php echo plugins_url( 'images/icon-hd.png',  __FILE__ ); ?>); }
			a.hd_email { background-image: url(<?php echo plugins_url( 'images/icon-email.png',  __FILE__ ); ?>); }
			a.hd_paypal { background-image: url(<?php echo plugins_url( 'images/icon-paypal.png',  __FILE__ ); ?>); }
			a.hd_trac { background-image: url(<?php echo plugins_url( 'images/icon-trac.png',  __FILE__ ); ?>); }
			a.hd_wordpress { background-image: url(<?php echo plugins_url( 'images/icon-wordpress.png',  __FILE__ ); ?>); }
			</style>

            <div id="hd_about" class="postbox">
                <h3 class="hndle"><span>About <?php echo HD_PUGIN_NAME; ?></span></h3>
                <div class="inside">
                		<a href="http://www.HeavyDigital.net/plugins/sideoffer/?utm_source=wpadmin-options&utm_medium=plugin&utm_campaign=SideOffer" target="_blank" class="hd_icon hd_logo">SideOffer Homepage</a>
				<a href="http://wordpress.org/support/plugin/sideoffer" target="_blank" class="hd_icon hd_wordpress">Support Forum</a>
                        <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=VA3ZX5ZPCYHXY" target="_blank" class="hd_icon hd_paypal">Support This Plugin</a>
                </div>
            </div>
            
            <div id="hd_heavydigital" class="postbox">
                <h3 class="hndle"><span>Heavy Digital</span></h3>
                <div class="inside" style="text-align:center">
                		A Product of
                        <br/>
                		<a href="http://www.HeavyDigital.net/?utm_source=wpadmin-options&utm_medium=plugin&utm_campaign=SideOffer" target="_blank">
                        <img src="<?php echo plugins_url( 'images/logo-heavydigital-200x75.png',  __FILE__ ); ?>" class="noborder aligncenter" title="Heavy Digital"/>
                        </a>
                </div>
            </div>
        </div>
        </div>
		
        <!-- Content -->								
        <div class="has-sidebar">
            <div id="post-body-content" class="has-sidebar-content">
            <div class="meta-box-sortabless ui-sortable">
            
            	<div id="hd_setup" class="postbox">
                <h3 class="hndle"><span><?php echo HD_PUGIN_NAME; ?> Mode</span></h3>
                <div class="inside">
                    <table class="form-table">
                    <tr valign="top">
                    <th scope="row">Mode</th>
                    <td>
                    <select id="hd_sideoffer_mode" name="hd_sideoffer_mode">
                    <option value="setup"<?php if (get_option('hd_sideoffer_mode')=="setup") echo ' selected="selected"'; ?>>Setup</option>
                    <option value="live"<?php if (get_option('hd_sideoffer_mode')=="live") echo ' selected="selected"'; ?>>Live</option>
                    </select>
                    <p class="description">Use <strong>Setup Mode</strong> to upload and configure your SideOffer. Once you are ready, select <strong>Live</strong> to make it active on your site</p>
                    </td>
                    </tr>
                    </table>                   
                </div>
				</div>
                
				<div id="hd_content" class="postbox">
                <h3 class="hndle"><span><?php echo HD_PUGIN_NAME; ?> Content</span></h3>
                <div class="inside">
                    <table class="form-table">
                    <th scope="row">Offer Title</th>
                    <td><input type="text" name="hd_sideoffer_title" value="<?php echo esc_attr(get_option('hd_sideoffer_title')); ?>" class="regular-text" style="width:50%" /></td>
                    </tr>							
                    
                    <tr valign="top">
                    <th scope="row">Offer Content</th>
                    <td>
                    <textarea name="hd_sideoffer_content" style="width:100%;min-height:300px;"><?php echo esc_textarea(get_option('hd_sideoffer_content')); ?></textarea>
					<p class="description">Create your SideOffer content and place it here. You can use text, HTML and [shortcodes]. This plugin is a great companion to Contact Form 7!</p>
                    </td>
                    </tr>
                    </table>                   
                </div>
				</div>
                
                <div id="hd_appearance" class="postbox">
                <h3 class="hndle"><span><?php echo HD_PUGIN_NAME; ?> Appearance</span></h3>
                <div class="inside">
                    <table class="form-table">
                    <tr valign="top">
                    <th scope="row">Background Image</th>
                    <td>
                        <input type="input" name="hd_sideoffer_bg" id="hd_sideoffer_bg" value="<?php echo esc_attr(get_option('hd_sideoffer_bg')); ?>" class="regular-text" style="width:50%" readonly="readonly" />
                        <input id="upload_image_button" type="button" value="Select Image" />
                         <p class="description">Upload your <?php echo HD_PUGIN_NAME; ?> image, or select one from the media library. Be sure to select the correct size and click <em>Insert Into Post</em>.</p>
                         <p class="description"><strong>PSD Template can be downloaded <a href="<?php echo plugins_url( 'images/PSD/sideoffer-bg.zip',  __FILE__ ); ?>">here</a></strong></p>
                        <p class="description"></p>
                        <input type="hidden" name="hd_sideoffer_width" id="hd_sideoffer_width" value="<?php echo esc_attr(get_option('hd_sideoffer_width')); ?>" />
                        <input type="hidden" name="hd_sideoffer_height" id="hd_sideoffer_height" value="<?php echo esc_attr(get_option('hd_sideoffer_height')); ?>" />
                    </td>
                    </tr>
                    <tr valign="top">
                    <th scope="row">Text Color</th>
                    <td>
                    	<div id="hd_colorpicker"></div>
                      	<input type="text" id="hd_sideoffer_color_text" name="hd_sideoffer_color_text" value="<?php echo esc_attr(get_option('hd_sideoffer_color_text')); ?>" />
                      	<p class="description">Select the color of your SideOffer text</p>
                    </td>
                  </tr>
                    </table>     
                </div>
				</div>
                
                <div id="hd_placement" class="postbox">
                <h3 class="hndle"><span><?php echo HD_PUGIN_NAME; ?> Placement</span></h3>
                <div class="inside">
                    <table class="form-table">
                    <!--
                    <tr valign="top">
                    <th scope="row">Side</th>
                    <td>
                    <select id="hd_sideoffer_side" name="hd_sideoffer_side">
                    <option value="left"<?php if (get_option('hd_sideoffer_side')=="left") echo ' selected="selected"'; ?>>Left</option>
                    <option value="right"<?php if (get_option('hd_sideoffer_side')=="right") echo ' selected="selected"'; ?>>Right</option>
                    </select>
                    <p class="description">Select the side of the screen to align the SideOffer to</p>
                    </td>
                    </tr>
                    -->
                    <tr valign="top">
                    <th scope="row">Top</th>
                    <td>
                        <input type="input" name="hd_sideoffer_top" id="hd_sideoffer_top" value="<?php echo esc_attr(get_option('hd_sideoffer_top')); ?>" class="regular-text" style="width:40px" />
                        <p class="description">How far from the top of the screen? (pixels)</p>
                    </td>
                    </tr>
                    
                    <tr valign="top">
                    <th scope="row">In</th>
                    <td>
                        <input type="input" name="hd_sideoffer_in" id="hd_sideoffer_in" value="<?php echo esc_attr(get_option('hd_sideoffer_in')); ?>" class="regular-text" style="width:40px" />
                        <p class="description">Horizontal pixel position for slidedeck (in position)</p>
                    </td>
                    </tr>                
                    
                    <tr valign="top">
                    <th scope="row">Out</th>
                    <td>
                        <input type="input" name="hd_sideoffer_out" id="hd_sideoffer_out" value="<?php echo esc_attr(get_option('hd_sideoffer_out')); ?>" class="regular-text" style="width:40px" /> 
                        <p class="description">Horizontal pixel position for slidedeck (out position)</p>
                    </td>
                    </tr>
                    </table>             
                </div>
				</div>
							
            </div>
            </div>
				
                    <p class="submit"><input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" /></p>		
		</div>			
        </div>

	</div>
    
</form>
<?php } ?>
