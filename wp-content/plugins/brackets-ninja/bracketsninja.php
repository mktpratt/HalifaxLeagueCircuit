<?php
/*
 * Plugin Name: Brackets Ninja - Brackets for leagues, tournaments, and championships
 * Plugin URI: http://bracketsninja.com
 * Description: Create <strong>beautiful brackets</strong> for leagues, tournaments, and championships, and easily add them to your Wordpress website. No prior knowledge require. Just a simple integration with Brackets Ninja.
 * Version: 1.0.0
 * Author: Common Ninja
 * Author URI: http://commoninja.com/
 * License: GPLv2 or later
 */

/*
 * Shortcode to diplay Brackets Ninja bracket in a website.
 * 
 *	   The list of arguments is below:
 *     'bracketid' 	(string) 	- Bracket GUID
 *     'height' 	(int) 		- Bracket height
 */
 
function bracketsninja_shortcode( $atts ) {
	extract( shortcode_atts( array(
		'bracketid' => 'f4a1a75319584cceabf9bb2833325518',
		'height'	=> '500'
	), $atts ) );

	$siteUrl = "http";
	
	if ($_SERVER["HTTPS"] == "on") {$siteUrl .= "s";}
		$siteUrl .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$siteUrl .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$siteUrl .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	
	$html = "<div id=\"BracketsNinja_$bracketid\"></div>
	<script type=\"text/javascript\">
	(function() {
		var pn = document.createElement('script'); pn.type = 'text/javascript';
		pn.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'bracketsninja.com/api/bracket/$bracketid?bnurl=' + window.location.href + '&height=$height';
		var s = document.getElementsByTagName('head')[0].appendChild(pn);
	})();
	</script>";

	return $html;
}

add_shortcode( 'bracketsninja', 'bracketsninja_shortcode' );


/*
 * Brackets Ninja tinyMCE button registration
 */
 
function bracketsninja_register_button( $buttons ) {
   array_push( $buttons, "|", "bracketsninja" );
   return $buttons;
}

function bracketsninja_add_plugin( $plugin_array ) {
   $plugin_array['bracketsninja'] = plugins_url() . '/brackets-ninja/js/bracketsninja.js';
   return $plugin_array;
}

function bracketsninja_add_button() {

   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
      return;
   }

   if ( get_user_option('rich_editing') == 'true' ) {
      add_filter( 'mce_external_plugins', 'bracketsninja_add_plugin' );
      add_filter( 'mce_buttons', 'bracketsninja_register_button' );
   }

}

add_action('init', 'bracketsninja_add_button');

?>