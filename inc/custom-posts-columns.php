<?php

// We register the column 'ID' and 'Thumbnail'. Required.
add_filter('manage_form-post_posts_columns', function ($columns) {
    $my_columns = [
        'status' => 'Share status'
    ];

    return array_slice($columns, 0, 2) + $my_columns + $columns;
});

function is_status($status_now = '', $class = false)
{
    if ($class === false) {
        if ($status_now === 'closed' || $status_now === 'not-share') {
            $html = '<select><option value="share">share</option>
                    <option selected value="not-share">not share</option></select> <span> This form is Apply status</span>';
        } elseif ($status_now === 'share') {
            $html = '<select><option selected value="share">share</option>
                    <option value="not-share">not share</option></select> <span> This form is SHARE now status</span>';
        } elseif ($status_now === 'saved') {
            $html = '<h4>This form is still being edited - the status SAVE DRAFT</h4>';
        }
        return $html;
    } elseif ($class === true) {
        if ($status_now === 'closed') {
            $html = 'closed';
        } elseif ($status_now === 'not-share') {
            $html = 'not-share';
        } elseif ($status_now === 'share') {
            $html = 'share';
        } elseif ($status_now === 'saved') {
            $html = 'saved';
        }
        return $html;
    }

    return 'error - not class true or false';
}

// We display content for each of the columns registered by us. Required.
add_action('manage_form-post_posts_custom_column', function ($column_name) {
    if ($column_name === 'status') {
        $post_id = get_the_ID();
        $status = get_field('status_post', $post_id);
//        dd($status)
        ?>
        <p class="select_share_status_js <?= is_status($status, true) ?>">
            <input type="hidden" name="post_id" value="<?= get_the_ID() ?>">
            <?= is_status($status, false) ?>
        </p>
        <?php
    }
});