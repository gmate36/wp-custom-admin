<?php
function wporg_remove_all_dashboard_metaboxes()
{
    if (current_user_can('content_manager')) {
        remove_action('welcome_panel', 'wp_welcome_panel');
        // Remove the rest of the dashboard widgets
        remove_meta_box('dashboard_primary', 'dashboard', 'side');
        remove_meta_box('health_check_status', 'dashboard', 'normal');
        remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
        remove_meta_box('dashboard_activity', 'dashboard', 'normal');
    }
}

add_action('wp_dashboard_setup', 'wporg_remove_all_dashboard_metaboxes');

add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');

function my_custom_dashboard_widgets()
{
    if (current_user_can('content_manager')) {
        wp_add_dashboard_widget('custom_help_widget', 'Активность', 'custom_dashboard_help');
    }
}

function custom_dashboard_help()
{
    if (current_user_can('content_manager')) {
        include 'views/activity-widget.php';
    }
}


function activityWidgetScripts()
{
    if (current_user_can('content_manager')) {
        wp_enqueue_style('custom-widget-styles', plugins_url('/css/widget.css', __FILE__));
    }
}
