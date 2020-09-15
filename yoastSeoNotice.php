<?php
add_action('admin_init', function () {
    if (class_exists('Yoast_Notification_Center')) {
        $yoast_nc = Yoast_Notification_Center::get();
        remove_action('admin_notices', array($yoast_nc, 'display_notifications'));
        remove_action('all_admin_notices', array($yoast_nc, 'display_notifications'));
    }
});

function my_remove_yoast_cols($columns)
{
    if (current_user_can('content_manager')) {
        unset($columns['wpseo-score']);
        unset($columns['wpseo-title']);
        unset($columns['wpseo-metadesc']);
        unset($columns['wpseo-focuskw']);
        unset($columns['wpseo-filter']);
        unset($columns['wpseo-score-readability']);
        unset($columns['wpseo-links']);
        unset($columns['wpseo-linked']);
        return $columns;
    }
    return $columns;
}

add_filter('manage_edit-post_columns', 'my_remove_yoast_cols');
add_filter('manage_edit-page_columns', 'my_remove_yoast_cols');


function my_remove_yoast_posts_filters()
{
    global $wpseo_meta_columns;

    if ($wpseo_meta_columns && current_user_can('content_manager')) {
        remove_action('restrict_manage_posts', array($wpseo_meta_columns, 'posts_filter_dropdown'));
        remove_action('restrict_manage_posts', array($wpseo_meta_columns, 'posts_filter_dropdown_readability'));
    }
}

add_action('admin_init', 'my_remove_yoast_posts_filters', 20);
