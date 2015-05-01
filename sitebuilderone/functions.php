<?php
// drop in your custom code here ...

// addded from
// https://github.com/anantshri/wp-security/blob/master/theme_functions/functions.php


// remove unnecessary header information
function remove_header_info() {
    remove_action('wp_head', 'feed_links_extra', 3);
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'start_post_rel_link');
    remove_action('wp_head', 'index_rel_link');
    remove_action('wp_head', 'parent_post_rel_link', 10, 0);
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head',10,0); // for WordPress >= 3.0
}
add_action('init', 'remove_header_info');

// remove various feeds
function fb_disable_feed() {
wp_die( __('No feed available,please visit our <a href="'. get_bloginfo('url') .'">homepage</a>!') );
}
add_action('do_feed', 'fb_disable_feed', 1);
add_action('do_feed_rdf', 'fb_disable_feed', 1);
add_action('do_feed_rss', 'fb_disable_feed', 1);
#add_action('do_feed_rss2', 'fb_disable_feed', 1);
add_action('do_feed_atom', 'fb_disable_feed', 1);
add_action('do_feed_rss2_comments', 'fb_disable_feed', 1);
add_action('do_feed_atom_comments', 'fb_disable_feed', 1);


//remove xpingback header
function remove_x_pingback($headers) {
    unset($headers['X-Pingback']);
    return $headers;
}
add_filter('wp_headers', 'remove_x_pingback');

// https://github.com/newinsites/Wordpress-Starter/blob/master/wp-content/themes/starter/functions.php

/** remove admin dashboard widgets */
define('ADMIN_REMOVE_ALL_DASHBOARD',		false);
define('ADMIN_REMOVE_QUICK_PRESS',			true);
define('ADMIN_REMOVE_INCOMING_LINKS',		true);
define('ADMIN_REMOVE_RECENT_COMMENTS',		true);
define('ADMIN_REMOVE_DASHBOARD_PLUGINS', 	true);
define('ADMIN_REMOVE_RECENT_DRAFTS',		true);
define('ADMIN_REMOVE_PRIMARY',				true);
define('ADMIN_REMOVE_SECONDARY',			true);
define('ADMIN_REMOVE_RIGHT_NOW',			true);


?>
