<?php
/*
Plugin Name: No Follow All External Links
Version: 1.5
Plugin URI: http://riseofweb.com
Description: No Follow all external links. The nofollow is added last thing before page load.  This effects all code (theme and content). Unless class 'follow' is declared.
Author: Daniel Chase
Author URI: http://riseofweb.com
*/
$currentSite = explode("//",get_bloginfo('url'));
$currentSite = str_replace('www.','',$currentSite[1]);
	
function findAllNoFollow($buffer) {
    return preg_replace_callback('/<a[^>]+/i', 'replaceAllLinks', $buffer);
}

function replaceAllLinks($theLink) {
	global $currentSite;
	$link = $theLink[0];
	if( (!preg_match("/(.*)?class=\S.*?follow.*\S/i",$link)) && (!preg_match("/(.*)?rel=\S.*?nofollow/i", $link)) ){
		$link = preg_replace("%(href=\S(?!(.*)$currentSite)(ftp:|http:|https:|\/\/))%i", 'rel="nofollow" $1', $link);
	}
    return $link;
}

function noFollowAll(){
	ob_start();
	ob_start('findAllNoFollow');
}
add_action('template_redirect', 'noFollowAll');
?>