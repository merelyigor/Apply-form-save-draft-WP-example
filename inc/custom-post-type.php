<?php
/**
 * Register your own custom post types
 * ---------------------------------------------------------------------------------------------------------------------
 */


/************** ------- registration Apply form ------- **************/
add_action('init', function () {

    $labels = array(
        'name' => 'Apply form',
        'singular_name' => 'the form',
        'add_new' => 'Add form',
        'add_new_item' => 'Add new form',
        'edit_item' => 'Edit form',
        'new_item' => 'New form',
        'all_items' => 'All form',
        'view_item' => 'View form to site',
        'search_items' => 'Find form',
        'not_found' => 'forms not found.',
        'not_found_in_trash' => 'There are no forms in the basket',
        'menu_name' => 'forms Apply',
        'insert_into_item' => 'Paste into the record',
        'uploaded_to_this_item' => 'Uploaded for this entry',
        'featured_image' => 'Thumbnail recording',
        'set_featured_image' => 'Set thumbnail entry',
        'remove_featured_image' => 'Delete record thumbnail',
        'use_featured_image' => 'Use as a thumbnail entry',
        'filter_items_list' => 'Filter list of records',
        'items_list_navigation' => 'Navigation navigation',
        'items_list' => 'list of records',
        'attributes' => 'Categories',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-list-view',
        'menu_position' => 19,
        'supports' => array('title', 'editor', 'revisions'),
//        'taxonomies' => array('category'),
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'exclude_from_search' => false

    );

    register_post_type('form-post', $args);
    flush_rewrite_rules();


});