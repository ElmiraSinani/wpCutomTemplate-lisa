<?php

add_post_type_support( 'testimonial', 'liza' );

// function: post_type BEGIN
function testimonial_post_type(){
    
    $labels = array(
                    'name' => __( 'Testimonial'), 
                    'singular_name' => __('Testimonial'),
                    /*'rewrite' => array(
                            'slug' => __( 'testimonial' ) 
                    ),*/
                    'add_new' => __('Add Item', 'testimonial'), 
                    'edit_item' => __('Edit Testimonial Item'),
                    'new_item' => __('New Testimonial Item'), 
                    'view_item' => __('View Testimonial'),
                    'search_items' => __('Search Testimonial'), 
                    'not_found' =>  __('No Testimonial Items Found'),
                    'not_found_in_trash' => __('No Testimonial Items Found In Trash'),
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
                    'rewrite' => array('slug' => 'testimonial'),
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
                  'taxonomies' => array('testimonial_category')
             );
    
    register_post_type(__( 'testimonial' ), $args);        
} 

// function: testimonial_messages BEGIN
function testimonial_messages($messages)
{
    $messages[__( 'testimonial' )] = 
            array(
                    0 => '', 
                    1 => sprintf(('Testimonial Updated. <a href="%s">View testimonial</a>'), esc_url(get_permalink($post_ID))),
                    2 => __('Custom Field Updated.'),
                    3 => __('Custom Field Deleted.'),
                    4 => __('Testimonial Updated.'),
                    5 => isset($_GET['revision']) ? sprintf( __('Testimonial Restored To Revision From %s'), wp_post_revision_title((int)$_GET['revision'], false)) : false,
                    6 => sprintf(__('Testimonial Published. <a href="%s">View Testimonial</a>'), esc_url(get_permalink($post_ID))),
                    7 => __('Testimonial Saved.'),
                    8 => sprintf(__('Testimonial Submitted. <a target="_blank" href="%s">Preview Testimonial</a>'), esc_url( add_query_arg('preview', 'true', get_permalink($post_ID)))),
                    9 => sprintf(__('Testimonial Scheduled For: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Testimonial</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
                    10 => sprintf(__('Testimonial Draft Updated. <a target="_blank" href="%s">Preview Testimonial</a>'), esc_url( add_query_arg('preview', 'true', get_permalink($post_ID)))),
            );
    return $messages;

} // function: testimonial_messages END

// function: testimonial_category BEGIN
function testimonial_category()
{
    register_taxonomy(
            __( "testimonial_category" ),
            array(__( "testimonial" )),
            array(
                    "hierarchical" => true,
                    "label" => __( "Category" ),
                    "singular_label" => __( "Category" ),
                    'show_ui'           => true,
                    'show_admin_column' => true,
                    /*"rewrite" => array(
                            'slug' => 'testimonial_category',
                            'hierarchical' => true
                    )*/
            )
    );
} // function: testimonial_category END

add_action( 'init', 'testimonial_post_type' );
add_action( 'init', 'testimonial_category', 0 );
add_filter( 'post_updated_messages', 'testimonial_messages' );

