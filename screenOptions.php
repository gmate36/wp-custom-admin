<?php
function mytheme_remove_help_tabs()
{
    if (current_user_can('content_manager')) {
        $screen = get_current_screen();
        $screen->remove_help_tabs();
    }
}

add_filter('screen_options_show_screen', '__return_false');
