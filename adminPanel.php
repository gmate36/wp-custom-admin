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
        $wp_admin_bar->remove_node('site-name');
    }
}


function removeAdminMenuItems()
{
    if (current_user_can('content_manager')) {
        remove_menu_page('edit.php?post_type=page');
        remove_menu_page('themes.php');
        remove_menu_page('users.php');
        remove_menu_page('tools.php');
        remove_menu_page('profile.php');
        remove_menu_page('options-general.php');
        add_menu_page(
            '',
            'Выйти из кабинета',
            'edit_posts',
            '/log-out',
            'page_callback_function',
            'dashicons-exit'
        );
    }
    return;
}

function page_callback_function()
{
    echo '<a class="logout-button" href="' . wp_logout_url() . '">Выйти из личного кабинета</a> ';
}

function wpse_141446_admin_bar_logout($wp_admin_bar)
{
    if (is_user_logged_in()) {
        $wp_admin_bar->add_menu(
            array(
                'id' => 'my-log-out',
                'parent' => 'top-secondary',
                'title' => __('Log out'),
                'href' => wp_logout_url(),
            )
        );
    }
}

add_action('admin_bar_menu', 'wpse_141446_admin_bar_logout', 100);

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
