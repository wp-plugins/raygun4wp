<?php
/*
Plugin Name: Raygun4WP
Plugin URI: http://github.com/mindscapehq/raygun4wordpress
Description: Exceptional error, exception and 404 tracking with Raygun.io for your Wordpress site. This service lets you monitor your site's health with beautiful graphs and comprehensive reports, so you are always aware of any points of failure. Daily digests are emailed to you, so an overview is available at a glance- no effort required. This plugin has a simple one-minute, no-code-required installation.
Version: 1.5.2.0
Author: Mindscape
Author URI: http://raygun.io
License: MIT
*/

$multisite_support_enabled = false;

if (version_compare(PHP_VERSION, '5.3.3', '<'))
{
  function rg4wp_warn_php()
  {
    echo '<div class=\'updated fade\'><p><strong>Raygun4WP:</strong> Your server\'s PHP version is below 5.3.3. Raygun4WP requires at least this version to run; please update PHP to at least 5.3, or contact your administrator.</p></div>';
  }

  add_action('admin_notices', 'rg4wp_warn_php');
  return;
}
else if (is_multisite() && !$multisite_support_enabled)
{
  function rg4wp_warn_multisite()
  {
    echo '<div class=\'updated fade\'><p><strong>Raygun4WP:</strong> This plugin is not guaranteed to work on Multisite installations with certain environments. Please contact <a href="http://raygun.io/contact">Raygun</a> for more information.</p></div>';
  }

  add_action('admin_notices', 'rg4wp_warn_multisite');
}
else
{
  require dirname(__FILE__) . '/main.php';
}