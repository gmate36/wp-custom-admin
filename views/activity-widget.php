<?php
$posts = get_posts(
    [
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 20,
        'orderby' => 'date',
        'order' => 'DESC',
    ]);

global $post;
?>

<?php if ($posts) : ?>
    <p class="activity__title">Недавно опубликованные</p>
    <?php foreach ($posts as $post):
        setup_postdata($post); ?>
        <div class="activity__item">
            <div class="activity__item-wrap">
        <span class="activity__date">
            <?= get_the_date('d.m.y') ?>,&nbsp;<?= get_the_time() ?>
        </span>
                <span class="activity__link">
                <a href="<?= get_edit_post_link() ?>"><?= get_the_title() ?></a>
        </span>
            </div>
        </div>
    <?php endforeach;
    wp_reset_postdata(); ?>
<?php else: ?>
    <p class="activity__title">Нет опубликованных статей</p>
<?php endif; ?>
