<?php

add_post_type_support( 'closeup', 'liza' );

// function: post_type BEGIN
function closeup_post_type(){
    
    $labels = array(
                    'name' => __( 'Close Up'), 
                    'singular_name' => __('Close Up'),
                    /*'rewrite' => array(
                            'slug' => __( 'closeup' ) 
                    ),*/
                    'add_new' => __('Add Item', 'closeup'), 
                    'edit_item' => __('Edit Close Up Item'),
                    'new_item' => __('New Close Up Item'), 
                    'view_item' => __('View Close Up'),
                    'search_items' => __('Search Close Up'), 
                    'not_found' =>  __('No Close Up Items Found'),
                    'not_found_in_trash' => __('No Close Up Items Found In Trash'),
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
                    'rewrite' => array('slug' => 'closeup'),
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
                  'taxonomies' => array('closeup_category')
             );
    
    register_post_type(__( 'closeup' ), $args);        
} 

// function: closeup_messages BEGIN
function closeup_messages($messages)
{
    $messages[__( 'closeup' )] = 
            array(
                    0 => '', 
                    1 => sprintf(('Close Up Updated. <a href="%s">View closeup</a>'), esc_url(get_permalink($post_ID))),
                    2 => __('Custom Field Updated.'),
                    3 => __('Custom Field Deleted.'),
                    4 => __('Close Up Updated.'),
                    5 => isset($_GET['revision']) ? sprintf( __('Close Up Restored To Revision From %s'), wp_post_revision_title((int)$_GET['revision'], false)) : false,
                    6 => sprintf(__('Close Up Published. <a href="%s">View Portfolio</a>'), esc_url(get_permalink($post_ID))),
                    7 => __('Close Up Saved.'),
                    8 => sprintf(__('Close Up Submitted. <a target="_blank" href="%s">Preview Close Up</a>'), esc_url( add_query_arg('preview', 'true', get_permalink($post_ID)))),
                    9 => sprintf(__('Close Up Scheduled For: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Close Up</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
                    10 => sprintf(__('Close Up Draft Updated. <a target="_blank" href="%s">Preview Close Up</a>'), esc_url( add_query_arg('preview', 'true', get_permalink($post_ID)))),
            );
    return $messages;

} // function: closeup_messages END

// function: closeup_category BEGIN
function closeup_category()
{
    register_taxonomy(
            __( "closeup_category" ),
            array(__( "closeup" )),
            array(
                    "hierarchical" => true,
                    "label" => __( "Category" ),
                    "singular_label" => __( "Category" ),
                    'show_ui'           => true,
                    'show_admin_column' => true,
                    /*"rewrite" => array(
                            'slug' => 'closeup_category',
                            'hierarchical' => true
                    )*/
            )
    );
} // function: closeup_category END

add_action( 'init', 'closeup_post_type' );
add_action( 'init', 'closeup_category', 0 );
add_filter( 'post_updated_messages', 'closeup_messages' );

