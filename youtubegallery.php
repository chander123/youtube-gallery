<?php
/*
Plugin Name: Youtube Gallery
Plugin URI: http://www.flashpatric.com
Description: Display a gallery of youtube videos. Requires Artiss YouTube Embed to be installed: http://www.artiss.co.uk/youtube-embed
Version: 1.0
Author: Patric Lanhed
Author URI: http://www.flashpatric.com
*/

/**
* Youtube Gallery
*
* Main code - include various functions
*
* @package	youtube-gallery
* @since	2.0
*
* @uses		youtube_gallery				Action the shortcode parameters
*
* @param    string		$paras			Shortcode parameters
* @param	string		$content		Shortcode content
* @return   string						YouTube embed code
*/

//[youtube_gallery]
function youtube_gallery( $paras = '', $content = '' ){
	$ids = split("\n", strip_tags($content));
	$videos = '';
	extract( shortcode_atts( array( 'style' => '', 'class' => '', 'rel' => '', 'target' => '', 'width' => '', 'height' => '', 'alt' => '', 'version' => '', 'nolink' => '' ), $paras ) );
	foreach ($ids as $key => $id) {
		if ($id != "") {
			$videos .= '<div class="flow-grid-item youtube-gallery-item">';
			$videos .= '<div style="position:relative;">';
			$videos .= '<h4>'.do_shortcode( aye_video_name_shortcode('',$id) ).'</h4>';
			$videos .= '<div class="play-icon"><a href="'.do_shortcode( aye_generate_shorturl_code( $id ) ).'"><img src="'.plugins_url().'/youtube-gallery/images/youtube_button_colour.png" width="20" height="20"></a></div>';
			$videos .= do_shortcode(aye_generate_thumbnail_code( $id, $style, $class, $rel, $target, 306, 230, $alt, 'hq', $nolink ) );
			$videos .= '</div>';
			$videos .= '</div>';
		}
	}
	return $videos;
}
add_shortcode( 'youtube-gallery', 'youtube_gallery' );

?>