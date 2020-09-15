<?php
function add_roles_on_plugin_activation()
{
    $manager = get_role('editor');
    add_filter('show_admin_bar', '__return_false');

    $caps = [
        'delete_published_pages',
        'delete_private_pages',
        'delete_pages',
        'delete_others_pages',
        'edit_pages',
        'edit_others_pages',
        'edit_published_pages',
        'publish_pages',
        'read_private_pages',
        'edit_private_pages',
        'unfiltered_html'
    ];

    foreach ($caps as $cap) {
        $manager->remove_cap($cap);
    }

    add_role('content_manager', 'Контент менеджер', $manager->capabilities);
}

function remove_roles_on_plugin_activation()
{
    remove_role('content_manager');
}
