<?php
/**
 * Creating an AJAX post from the submit form
 * ---------------------------------------------------------------------------------------------------------------------
 */


add_action('wp_ajax_post_apply', 'post_apply_callback');
add_action('wp_ajax_nopriv_post_apply', 'post_apply_callback');

function post_apply_callback()
{
    global $user_ID;

    if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || empty($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        wp_die('This is not ajax request!');
    }


    $submit_value = $_POST['submit_value'];
    $post_var = $_POST['var'];
    $post_token_uri = generateRandomString(15);
    $value_1 = $_POST['name-1'];
    $value_2 = $_POST['name-2'];
    $value_3 = $_POST['name-3'];
    $value_4 = $_POST['name-4'];
    $value_5 = $_POST['name-5'];
    $value_6 = $_POST['name-6'];
    $value_7 = $_POST['name-7'];
    $value_8 = $_POST['name-8'];
    $value_9 = $_POST['name-9'];
    $value_10 = $_POST['name-10'];

    if ($submit_value === 'Save Draft')
        $status = 'saved';
    elseif ($submit_value === 'Apply')
        $status = 'closed';

    if ($post_var != 'false') {
        $is_create = false;
        $post_id = $post_var;
        $post_token_uri = get_field('token', $post_id);
    } else {
        $is_create = true;
        $post_id = wp_insert_post(wp_slash(array( //If the post is successfully created, it gets $post_id.
            'post_title' => $value_1 .' - '. $value_2,
            'post_name' => $post_token_uri,
            'post_status' => 'publish', //https://misha.blog/wordpress/post-statuses.html
            'post_content' => '', //text cotent to this post
            'post_date' => date('Y-m-d H:i:s'),
            'post_type' => 'form-post', //here use your message type || enter the default "post"
            'post_author' => $user_ID,
            'ping_status' => get_option('default_ping_status'),
            'post_parent' => 0,
            'menu_order' => 0,
            'to_ping' => '',
            'pinged' => '',
            'post_password' => '',
            'post_excerpt' => '', // excerpt text
            'post_category' => array(0)
        )));
    }

    $post_is_create_uri = get_permalink($post_id);


    $review_custom_fields = array( // this fields for update or create custom fields ACF - key is a selector
        'name-1' => $value_1,
        'name-2' => $value_2,
        'name-3' => $value_3,
        'name-4' => $value_4,
        'name-5' => $value_5,
        'name-6' => $value_6,
        'name-7' => $value_7,
        'name-8' => $value_8,
        'name-9' => $value_9,
        'name-10' => $value_10,
        'status_post' => $status,
        'token' => $post_token_uri,
    );

    foreach ($review_custom_fields as $selector => $value) { //update or create custom fields ACF - key is a selector
        update_field($selector, $value, $post_id); // Need $post_id to update its custom fields of the currently created post
    }

    if ($is_create) {
        $url = $post_is_create_uri . '?token=' . $post_token_uri;
        wp_send_json_success(['url' => $url]);
        exit;
    }

    wp_send_json_success([
        'url' => false,
        '$submit_value' => $submit_value,
        '$post_var' => $post_var,
        '$post_token_uri' => $post_token_uri,
        '$status' => $status,
        '$is_create' => $is_create,
        '$post_id' => $post_id,
        '$post_is_create_uri' => $post_is_create_uri,
        '$review_custom_fields' => $review_custom_fields,
    ]);

    wp_die();
}
