<?php

add_post_type_support( 'process', 'liza' );

// function: post_type BEGIN
function process_post_type(){
    
    $labels = array(
                    'name' => __( 'Process'), 
                    'singular_name' => __('Process'),
                    /*'rewrite' => array(
                            'slug' => __( 'process' ) 
                    ),*/
                    'add_new' => __('Add Item', 'process'), 
                    'edit_item' => __('Edit Process Item'),
                    'new_item' => __('New Process Item'), 
                    'view_item' => __('View Process'),
                    'search_items' => __('Search Process'), 
                    'not_found' =>  __('No Process Items Found'),
                    'not_found_in_trash' => __('No Process Items Found In Trash'),
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
                    'rewrite' => array('slug' => 'process'),
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
                  'taxonomies' => array('process_category')
             );
    
    register_post_type(__( 'process' ), $args);        
} 

// function: process_messages BEGIN
function process_messages($messages)
{
    $messages[__( 'process' )] = 
            array(
                    0 => '', 
                    1 => sprintf(('Process Updated. <a href="%s">View process</a>'), esc_url(get_permalink($post_ID))),
                    2 => __('Custom Field Updated.'),
                    3 => __('Custom Field Deleted.'),
                    4 => __('Process Updated.'),
                    5 => isset($_GET['revision']) ? sprintf( __('Process Restored To Revision From %s'), wp_post_revision_title((int)$_GET['revision'], false)) : false,
                    6 => sprintf(__('Process Published. <a href="%s">View Process</a>'), esc_url(get_permalink($post_ID))),
                    7 => __('Process Saved.'),
                    8 => sprintf(__('Process Submitted. <a target="_blank" href="%s">Preview Process</a>'), esc_url( add_query_arg('preview', 'true', get_permalink($post_ID)))),
                    9 => sprintf(__('Process Scheduled For: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Process</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
                    10 => sprintf(__('Process Draft Updated. <a target="_blank" href="%s">Preview Process</a>'), esc_url( add_query_arg('preview', 'true', get_permalink($post_ID)))),
            );
    return $messages;

} // function: process_messages END

// function: process_category BEGIN
function process_category()
{
    register_taxonomy(
            __( "process_category" ),
            array(__( "process" )),
            array(
                    "hierarchical" => true,
                    "label" => __( "Category" ),
                    "singular_label" => __( "Category" ),
                    'show_ui'           => true,
                    'show_admin_column' => true,
                    /*"rewrite" => array(
                            'slug' => 'process_category',
                            'hierarchical' => true
                    )*/
            )
    );
} // function: process_category END

add_action( 'init', 'process_post_type' );
add_action( 'init', 'process_category', 0 );
add_filter( 'post_updated_messages', 'process_messages' );

