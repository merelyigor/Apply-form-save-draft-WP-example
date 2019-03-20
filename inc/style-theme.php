<?php
/**
 * connection function (styles / scripts) on all pages
 * ---------------------------------------------------------------------------------------------------------------------
 */

add_action('wp_enqueue_scripts', function () {
    //подключаем внутренний стиль темы
    wp_enqueue_style('style.css', get_template_directory_uri() . '/style.css', array(), time());//тут подключен шлавный стиль темы
    //подключаем внешние стили из интернета без https://
//	wp_enqueue_style('название стилей', '//site.com/styles/built.css');
    //подключаем скрипты в footer
    wp_enqueue_script('vendor.js', get_template_directory_uri() . '/js/vendor.js', array(), '1.0', true);
    wp_enqueue_script('ajax-post-create.js', get_template_directory_uri() . '/js/ajax-post-create.js', array(), '1.0', true);
    wp_enqueue_script('my-custom.js', get_template_directory_uri() . '/js/my-custom.js', array(), '1.0', true);
    wp_enqueue_script('main.js', get_template_directory_uri() . '/js/main.js', array(), '1.0', true);
    //подключаем скрипты в head
//	wp_enqueue_script('название скрипта.js', get_template_directory_uri() . '/js/main.head.js', array(), '1.0');
    //подключаем внешние скрипты из интернета в head без https://
//	wp_enqueue_script('site.js', '//site.com/site.js', array(), '1.0');
    //подключаем внешние скрипты из интернета в footer без https://
//    wp_enqueue_script('site.js', '//site.com/site.js', array(), '1.0', true);
    wp_localize_script('ajax-post-create.js', 'admin_ajax',
        array(
            'url' => admin_url('admin-ajax.php')
        )
    );
});


add_action('admin_enqueue_scripts', function () {
    wp_enqueue_script('vendor-admin.js', get_template_directory_uri() . '/js/vendor.js', array(), '1.0', true);
    wp_enqueue_script('my-wp-admin.js', get_template_directory_uri() . '/js/my-wp-admin.js', array(), '1.0', true);
    wp_localize_script('my-wp-admin.js', 'admin_ajax',
        array(
            'url' => admin_url('admin-ajax.php')
        )
    );
}, 99);
