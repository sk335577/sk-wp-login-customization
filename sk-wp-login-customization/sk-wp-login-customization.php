<?php

/*
  Plugin Name: SK WP Login Customization
  Plugin URI:
  Description: This plugin is used to customize login screen for wordpress admin.You can change wordpress logo on wordpress admin login page or you can also add a background image on the wordpress admin login page.
  Version: 1.2
  Author: Sandeep Kumar
  Author URI: http://www.sktechblog.com
  License: GPLv2
 */

if (!defined('ABSPATH')) {
    //check wordpress environment
    die('You can only enter through doors.');
}

/**
 * define plugin setting constants 
 */
define('SK_WLL_NAME', 'SK WP Login Customization');
define('SK_WLL_COMMERCIAL_NAME', 'SK WP Login Customization 1.2');
define('SK_WLL_SLUG', 'sk-wll');
define('SK_WLL_NAME_DIRECTORY_TMP', 'sk-wll-tmp-uploads');
define('SK_WLL_VERSION', '1.2');
define('SK_WLL_DIRECTORY_NAME', basename(dirname(__FILE__)));

define('SK_WLL_FILE_PATH', (__FILE__));
define('SK_WLL_DIRECTORY_PATH', dirname(__FILE__));
define('SK_WLL_DIRNAME', basename(SK_WLL_DIRECTORY_PATH));
define('SK_WLL_URL', plugins_url() . '/' . SK_WLL_DIRNAME);
define('SK_WLL_LIBRARIES_PATH', SK_WLL_DIRECTORY_PATH . '/lib');
define('SK_WLL_INCLUDES_PATH', SK_WLL_DIRECTORY_PATH . '/inc');
define('SK_WLL_CLASSES_PATH', SK_WLL_DIRECTORY_PATH . '/classes');
define('SK_WLL_VIEWS_PATH', SK_WLL_DIRECTORY_PATH . '/views');
define('SK_WLL_PLUGIN_DIRECTORY_URL', plugins_url() . '/' . SK_WLL_DIRECTORY_NAME);
define('SK_WLL_PLUGIN_ASSETS_URL', plugins_url() . '/' . SK_WLL_DIRECTORY_NAME . '/assets');
define('SK_WLL_URL_LIB', SK_WLL_PLUGIN_DIRECTORY_URL . '/libs');
define('SK_WLL_URL_CSS', SK_WLL_PLUGIN_ASSETS_URL . '/css');
define('SK_WLL_URL_IMAGES', SK_WLL_PLUGIN_ASSETS_URL . '/img');
define('SK_WLL_NO_IMG_URL', SK_WLL_PLUGIN_ASSETS_URL . '/img/noPhoto.jpg');
define('SK_WLL_URL_JS', SK_WLL_PLUGIN_ASSETS_URL . '/js');

//now inlcude some required  files
if (file_exists(ABSPATH . 'wp-includes/pluggable.php')) {
    require_once( ABSPATH . 'wp-includes/pluggable.php' );
}
if (file_exists(ABSPATH . 'wp-includes/user.php')) {
    require_once( ABSPATH . 'wp-includes/user.php' );
}
if (!function_exists('wp_handle_upload')) {
    require_once( ABSPATH . 'wp-admin/includes/file.php' );
}


require_once SK_WLL_CLASSES_PATH . '/SkWllCommon.php';
require_once SK_WLL_CLASSES_PATH . '/SkWllCore.php';

//ready ,set , lets go
$sk_wll_init = new SkWllCore();
//ready ,set , lets go

