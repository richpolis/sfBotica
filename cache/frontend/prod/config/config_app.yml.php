<?php
// auto-generated by sfDefineEnvironmentConfigHandler
// date: 2013/08/17 12:50:48
sfConfig::add(array(
  'app_sfImageTransformPlugin_default_adapter' => 'GD',
  'app_sfImageTransformPlugin_default_image' => array (
  'mime_type' => 'image/png',
  'filename' => 'Untitled.png',
  'width' => 100,
  'height' => 100,
  'color' => '#000000',
),
  'app_sfImageTransformPlugin_font_dir' => '/usr/share/fonts/truetype/msttcorefonts',
  'app_sfImageTransformPlugin_mime_type' => array (
  'auto_detect' => false,
  'library' => 'gd_mime_type',
),
  'app_sf_admin_dash_web_dir' => '/sfAdminDashPlugin',
  'app_sf_admin_dash_image_dir' => '/sfAdminDashPlugin/images/icons/',
  'app_sf_admin_dash_default_image' => 'config.png',
  'app_sf_admin_dash_resize_mode' => 'thumbnail',
  'app_sf_admin_dash_logout' => true,
  'app_sf_admin_dash_site' => 'Backend Botica',
  'app_sf_admin_dash_include_path' => true,
  'app_sf_admin_dash_include_jquery_no_conflict' => false,
  'app_sf_admin_dash_login_route' => '@sf_guard_signin',
  'app_sf_admin_dash_logout_route' => '@sf_guard_signout',
));
