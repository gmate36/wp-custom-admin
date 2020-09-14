<?php
function remove_wp_logo($wp_admin_bar)
{
    if (current_user_can('content_manager')) {
        $wp_admin_bar->remove_node('wp-logo');
        $wp_admin_bar->remove_node('comments');
        $wp_admin_bar->remove_node('new-content');
        $wp_admin_bar->remove_node('wpseo-menu');
        $wp_admin_bar->remove_node('my-account');
        $wp_admin_bar->remove_node('bar-archive');

    }
}


function removeAdminMenuItems()
{
    if (current_user_can('content_manager')) {
        remove_menu_page('index.php');
        remove_menu_page('edit.php?post_type=page');
        remove_menu_page('themes.php');
        remove_menu_page('users.php');
        remove_menu_page('tools.php');
        remove_menu_page('profile.php');
        remove_menu_page('options-general.php');
    }
    return;

}

function customAdminScripts()
{
    if (current_user_can('content_manager')) {
        wp_enqueue_script('custom-admin-scripts', plugins_url('/js/init.js', __FILE__), array('jquery'), null, true);
        wp_enqueue_style('custom-admin-styles', plugins_url('/css/init.css', __FILE__));
    }
}

function removeUpdateNotice()
{
    if (current_user_can('content_manager')) {
        remove_action('admin_notices', 'update_nag', 3);
        remove_action('admin_notices', 'maintenance_nag', 10);
    }
}


function my_footer_shh()
{
    remove_filter('update_footer', 'core_update_footer');
}

add_action('admin_menu', 'my_footer_shh');

add_filter('admin_footer_text', '__return_empty_string', 11);

add_filter('show_admin_bar', '__return_false');
