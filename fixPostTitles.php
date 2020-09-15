<?php
add_filter('post_type_labels_post', 'rename_posts_labels');
function rename_posts_labels($labels)
{
    if (current_user_can('content_manager')) {
        // заменять автоматически не пойдет например заменили: Запись = Статья, а в тесте получится так "Просмотреть статья"

        /* оригинал
            stdClass Object (
                'name'                  => 'Записи',
                'singular_name'         => 'Запись',
                'add_new'               => 'Добавить новую',
                'add_new_item'          => 'Добавить запись',
                'edit_item'             => 'Редактировать запись',
                'new_item'              => 'Новая запись',
                'view_item'             => 'Просмотреть запись',
                'search_items'          => 'Поиск записей',
                'not_found'             => 'Записей не найдено.',
                'not_found_in_trash'    => 'Записей в корзине не найдено.',
                'parent_item_colon'     => '',
                'all_items'             => 'Все записи',
                'archives'              => 'Архивы записей',
                'insert_into_item'      => 'Вставить в запись',
                'uploaded_to_this_item' => 'Загруженные для этой записи',
                'featured_image'        => 'Миниатюра записи',
                'set_featured_image'    => 'Задать миниатюру',
                'remove_featured_image' => 'Удалить миниатюру',
                'use_featured_image'    => 'Использовать как миниатюру',
                'filter_items_list'     => 'Фильтровать список записей',
                'items_list_navigation' => 'Навигация по списку записей',
                'items_list'            => 'Список записей',
                'menu_name'             => 'Записи',
                'name_admin_bar'        => 'Запись',
            )
        */

        $new = array(
            'name' => 'Статьи',
            'singular_name' => 'Статья',
            'add_new' => 'Добавить статью',
            'add_new_item' => 'Добавить статью',
            'edit_item' => 'Редактировать статью',
            'new_item' => 'Новая статья',
            'view_item' => 'Просмотреть статью',
            'search_items' => 'Поиск статей',
            'not_found' => 'Статей не найдено.',
            'not_found_in_trash' => 'Статей в корзине не найдено.',
            'parent_item_colon' => '',
            'all_items' => 'Все статьи',
            'archives' => 'Архивы статей',
            'insert_into_item' => 'Вставить в статью',
            'uploaded_to_this_item' => 'Загруженные для этой статьи',
            'featured_image' => 'Миниатюра статьи',
            'filter_items_list' => 'Фильтровать список статей',
            'items_list_navigation' => 'Навигация по списку статей',
            'items_list' => 'Список статей',
            'menu_name' => 'Статьи',
            'name_admin_bar' => 'Статью', // пункте "добавить"
        );
        return (object)array_merge((array)$labels, $new);
    }
    return $labels;
}

function replace_admin_menu_icons_css()
{
    $imgPath = MY_PLUGIN_PlACE . '/img/newspaper-solid.svg';
    ?>
    <style lang="css">
        #adminmenu .dashicons-admin-post:before {
            content: url(<?php echo $imgPath ?>) !important;
        }
    </style>
    <?php
}

add_action('admin_head', 'replace_admin_menu_icons_css');

