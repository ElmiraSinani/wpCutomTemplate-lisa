<?php

add_post_type_support( 'press', 'liza' );

// function: post_type BEGIN
function press_post_type(){
    
    $labels = array(
                    'name' => __( 'Press'), 
                    'singular_name' => __('Press'),
                    /*'rewrite' => array(
                            'slug' => __( 'press' ) 
                    ),*/
                    'add_new' => __('Add Item', 'press'), 
                    'edit_item' => __('Edit Press Item'),
                    'new_item' => __('New Press Item'), 
                    'view_item' => __('View Press'),
                    'search_items' => __('Search Press'), 
                    'not_found' =>  __('No Press Items Found'),
                    'not_found_in_trash' => __('No Press Items Found In Trash'),
                    'parent_item_colon' => ''
                );
    $args = array(
                    'labels' => $labels,
                    'public' => true,
                    'publicly_queryable' => true,
                    'show_ui' => true,
                    'query_var' => true,
                    'capability_type' => 'post',
                    'hierarchical' => false,
                    'menu_position' => null,
                    'rewrite' => array('slug' => 'press'),
                    'has_archive' => true,
                    'supports' => array(
                            'comments',
                            'title',
                            'editor',
                            'thumbnail',
                            'excerpt',
                            'custom-fields',
                            'page-attributes'
                    ),
                  'taxonomies' => array('press_category')
             );
    
    register_post_type(__( 'press' ), $args);        
} 

// function: press_messages BEGIN
function press_messages($messages)
{
    $messages[__( 'press' )] = 
            array(
                    0 => '', 
                    1 => sprintf(('Press Updated. <a href="%s">View press</a>'), esc_url(get_permalink($post_ID))),
                    2 => __('Custom Field Updated.'),
                    3 => __('Custom Field Deleted.'),
                    4 => __('Press Updated.'),
                    5 => isset($_GET['revision']) ? sprintf( __('Press Restored To Revision From %s'), wp_post_revision_title((int)$_GET['revision'], false)) : false,
                    6 => sprintf(__('Press Published. <a href="%s">View Portfolio</a>'), esc_url(get_permalink($post_ID))),
                    7 => __('Press Saved.'),
                    8 => sprintf(__('Press Submitted. <a target="_blank" href="%s">Preview Press</a>'), esc_url( add_query_arg('preview', 'true', get_permalink($post_ID)))),
                    9 => sprintf(__('Press Scheduled For: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Press</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
                    10 => sprintf(__('Press Draft Updated. <a target="_blank" href="%s">Preview Press</a>'), esc_url( add_query_arg('preview', 'true', get_permalink($post_ID)))),
            );
    return $messages;

} // function: press_messages END

// function: press_category BEGIN
function press_category()
{
    register_taxonomy(
            __( "press_category" ),
            array(__( "press" )),
            array(
                    "hierarchical" => true,
                    "label" => __( "Category" ),
                    "singular_label" => __( "Category" ),
                    'show_ui'           => true,
                    'show_admin_column' => true,
                    /*"rewrite" => array(
                            'slug' => 'press_category',
                            'hierarchical' => true
                    )*/
            )
    );
} // function: press_category END

add_action( 'init', 'press_post_type' );
add_action( 'init', 'press_category', 0 );
add_filter( 'post_updated_messages', 'press_messages' );

