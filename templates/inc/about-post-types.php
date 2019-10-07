<?php

add_post_type_support( 'about', 'liza' );

// function: post_type BEGIN
function about_post_type(){
    
    $labels = array(
                    'name' => __( 'About'), 
                    'singular_name' => __('About'),
                    /*'rewrite' => array(
                            'slug' => __( 'about' ) 
                    ),*/
                    'add_new' => __('Add Item', 'about'), 
                    'edit_item' => __('Edit About Item'),
                    'new_item' => __('New About Item'), 
                    'view_item' => __('View About'),
                    'search_items' => __('Search About'), 
                    'not_found' =>  __('No About Items Found'),
                    'not_found_in_trash' => __('No About Items Found In Trash'),
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
                    'rewrite' => array('slug' => 'about'),
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
                  'taxonomies' => array('about_category')
             );
    
    register_post_type(__( 'about' ), $args);        
} 

// function: about_messages BEGIN
function about_messages($messages)
{
    $messages[__( 'about' )] = 
            array(
                    0 => '', 
                    1 => sprintf(('About Updated. <a href="%s">View about</a>'), esc_url(get_permalink($post_ID))),
                    2 => __('Custom Field Updated.'),
                    3 => __('Custom Field Deleted.'),
                    4 => __('About Updated.'),
                    5 => isset($_GET['revision']) ? sprintf( __('About Restored To Revision From %s'), wp_post_revision_title((int)$_GET['revision'], false)) : false,
                    6 => sprintf(__('About Published. <a href="%s">View Portfolio</a>'), esc_url(get_permalink($post_ID))),
                    7 => __('About Saved.'),
                    8 => sprintf(__('About Submitted. <a target="_blank" href="%s">Preview About</a>'), esc_url( add_query_arg('preview', 'true', get_permalink($post_ID)))),
                    9 => sprintf(__('About Scheduled For: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview About</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
                    10 => sprintf(__('About Draft Updated. <a target="_blank" href="%s">Preview About</a>'), esc_url( add_query_arg('preview', 'true', get_permalink($post_ID)))),
            );
    return $messages;

} // function: about_messages END

// function: about_category BEGIN
function about_category()
{
    register_taxonomy(
            __( "about_category" ),
            array(__( "about" )),
            array(
                    "hierarchical" => true,
                    "label" => __( "Category" ),
                    "singular_label" => __( "Category" ),
                    'show_ui'           => true,
                    'show_admin_column' => true,
                    /*"rewrite" => array(
                            'slug' => 'about_category',
                            'hierarchical' => true
                    )*/
            )
    );
} // function: about_category END

add_action( 'init', 'about_post_type' );
add_action( 'init', 'about_category', 0 );
add_filter( 'post_updated_messages', 'about_messages' );

