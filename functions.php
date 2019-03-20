<?php
/**
 * Theme features
 * ---------------------------------------------------------------------------------------------------------------------
 */
function dd($var_dump, $die = false)
{
    echo '<pre style="color: #850085">';
    var_dump($var_dump);
    echo '</pre>';
    if ($die) {
        wp_die();
    }

}

/************** ------- File attachment function ------- **************/
include_once 'inc/ajax-post-create.php';
include_once 'inc/ajax-post-edit.php';
include_once 'inc/custom-posts-columns.php';
include_once 'inc/custom-post-type.php';
include_once 'inc/custom-paginations.php';
include_once 'inc/password-post.php';
include_once 'inc/rus-translit.php';
include_once 'inc/style-theme.php';
include_once 'inc/validator.php';

/**
 * Дополнение файла function
 * ---------------------------------------------------------------------------------------------------------------------
 */

function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyz', ceil($length/strlen($x)) )),1,$length);
}

function google_translate($text, $lang_input, $lang_uotput)
{
    $query_data = array(
        'client' => 'x',
        'q' => $text,
        'sl' => $lang_input,
        'tl' => $lang_uotput
    );
    $filename = 'http://translate.google.ru/translate_a/t';
    $options = array(
        'http' => array(
            'user_agent' => 'Mozilla/5.0 (Windows NT 6.0; rv:26.0) Gecko/20100101 Firefox/26.0',
            'method' => 'POST',
            'header' => 'Content-type: application/x-www-form-urlencoded',
            'content' => http_build_query($query_data)
        )
    );
    $context = stream_context_create($options);
    $response = file_get_contents($filename, false, $context);
    return json_decode($response);
}