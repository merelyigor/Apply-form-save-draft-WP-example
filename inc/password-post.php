<?php


add_filter('post_password_expires', function ($exp) {
    return time() + 2 * DAY_IN_SECONDS;
}, 10, 1);


add_filter('the_password_form', function () {
    ob_start(); ?>
    <form action="<?= esc_url(site_url('wp-login.php?action=postpass', 'login_post')) ?>" method="post">
        <input name="post_password" type="password" size="20" placeholder="<?= google_translate('Введите пароль', 'ru', 'en') ?>" maxlength="20"/>
        <input type="submit" name="Submit" value="<?= google_translate('Разблокировать', 'ru', 'en') ?>"/>
    </form>
    <?php
    return ob_get_clean();
});


//add_filter('the_excerpt', function ($excerpt) {
//    if (post_password_required())
//        $excerpt = '<em>[Запись заблокирована. Для получения пароля обратитесь к администратору.]</em>';
//    return $excerpt; // если запись не защищена, будет выводиться стандартная цитата
//});


/**
 * How to completely hide all password-protected posts from the site
 *
 * Minor modification for SQL query receiving posts
 * ---------------------------------------------------------------------------------------------------------------------
 */
function true_exclude_pass_posts($where)
{
    global $wpdb;
    return $where .= " AND {$wpdb->posts}.post_password = '' ";
}

/**
 * Using this filter, we will determine on which pages it will hide protected posts.
 * ---------------------------------------------------------------------------------------------------------------------
 */
add_action('pre_get_posts', function ($query) {
    if (is_front_page() || is_single()) {
        add_filter('posts_where', 'true_exclude_pass_posts');
    }
//    elseif (!is_page(12)) {
//        add_filter('posts_where', 'true_exclude_pass_posts');
//    }
});