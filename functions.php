<?php
/*
Plugin Name: Создание ролей и кастомной админки
Description: Плагин добавляет роль контент менеджера с соответствующими правами, а так же изменяет стили и наполнение стандартной админки
Plugin URI:
Author: Startted
Author URI:
Version: 1.0
*/
define('MY_PLUGIN_NAME', plugin_basename(__DIR__));
define('MY_PLUGIN_PlACE', plugins_url(MY_PLUGIN_NAME));

/* register roles */
register_activation_hook(__FILE__, 'add_roles_on_plugin_activation');
register_deactivation_hook(__FILE__, 'remove_roles_on_plugin_activation');

/* admin panel customization */
require dirname(__DIR__) . '/' . MY_PLUGIN_NAME . '/adminPanel.php';
require dirname(__DIR__) . '/' . MY_PLUGIN_NAME . '/screenOptions.php';
require dirname(__DIR__) . '/' . MY_PLUGIN_NAME . '/yoastSeoNotice.php';
require dirname(__DIR__) . '/' . MY_PLUGIN_NAME . '/fixPostTitles.php';

add_action('admin_bar_menu', 'remove_wp_logo', 999);

/* styles && scripts */
add_action('admin_head', 'customAdminScripts');

add_action('admin_head', 'removeUpdateNotice');

add_action('admin_menu', 'removeAdminMenuItems');

