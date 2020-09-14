<?php
add_action('admin_init', function () {
    if (class_exists('Yoast_Notification_Center')) {
        $yoast_nc = Yoast_Notification_Center::get();
        remove_action('admin_notices', array($yoast_nc, 'display_notifications'));
        remove_action('all_admin_notices', array($yoast_nc, 'display_notifications'));
    }
});
