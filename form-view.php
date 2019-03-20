<?php
/**
 * Template Name: form view
 */

get_header();
the_post(); ?>

<?= '<br>form view' ?>
<?php

echo '<br><br><br>';
the_title();
echo '<br><br><br>';
the_content();
echo '<br><br><br>';

if (!post_password_required()) {
    echo '<br><br><br>';


    /***********------ episcopate -------**************/
    $my_query = new WP_Query(array(
        'post_type' => 'form-post',
        'posts_per_page' => 20,
        'publish' => true,
        'orderby' => 'title',
        'order' => 'asc',
        'meta_key' => 'status_post',
        'meta_value' => 'share',
        'paged' => get_query_var('paged') ? get_query_var('paged') : 1
    ));


    while ($my_query->have_posts()) {
        $my_query->the_post();

        $arr['arguments']['get_check_post_permission'] = $_GET['token'];
        $arr['arguments']['post_id'] = get_the_ID();
        $arr['arguments']['post_token_uri'] = get_field('token');
        $arr['arguments']['status'] = get_field('status_post');
        $arr['arguments']['post_is_create_uri'] = get_permalink() . '?token=' . $arr['arguments']['post_token_uri'];

        $arr['fields']['name_1'] = get_field('name-1');
        $arr['fields']['name_2'] = get_field('name-2');
        $arr['fields']['name_3'] = get_field('name-3');
        $arr['fields']['name_4'] = get_field('name-4');
        $arr['fields']['name_5'] = get_field('name-5');
        $arr['fields']['name_6'] = get_field('name-6');
        $arr['fields']['name_7'] = get_field('name-7');
        $arr['fields']['name_8'] = get_field('name-8');
        $arr['fields']['name_9'] = get_field('name-9');
        $arr['fields']['name_10'] = get_field('name-10');

        ?>
        <div>
            ------------------------------------------------------------------------------------
            <h3><?php the_title(); ?></h3>
            <?php
            foreach ($arr['fields'] as $field) {
                ?>
                <p><?= $field; ?></p>
                <?php
            }
            ?>
            ------------------------------------------------------------------------------------
        </div>


        <?php
    }

    /***********------ PAGINATION -------**************/
    $GLOBALS['wp_query']->max_num_pages = $my_query->max_num_pages;

    custom_pagenavi();

    wp_reset_query();


    echo '<br><br><br>';
} else {
    echo '<br><br><br>';
    echo google_translate('Защита не снята', 'ru', 'en');
    echo '<br><br><br>';
}


?>


<?php get_footer();
