<?php
/**
 * Changing custom fields in the post
 * ---------------------------------------------------------------------------------------------------------------------
 */


add_action('wp_ajax_post_edit_form', 'post_edit_form_callback');

function post_edit_form_callback()
{

    if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || empty($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        wp_die('This is not ajax request!');
    }

    $option_var = $_POST['option-var'];
    $post_id = $_POST['post-id'];
    $update_field = update_field('status_post', $option_var, $post_id);

    wp_send_json_success([
        'option_var' => $option_var,
        'post_id' => $post_id,
        'update_field' => $update_field
    ]);

    wp_die();
}
