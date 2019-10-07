<?php

add_post_type_support( 'contacts', 'liza' );

// function: post_type BEGIN
function contacts_post_type(){
    
    $labels = array(
                    'name' => __( 'Contacts'), 
                    'singular_name' => __('Contacts'),
                    /*'rewrite' => array(
                            'slug' => __( 'contacts' ) 
                    ),*/
                    'add_new' => __('Add Item', 'contacts'), 
                    'edit_item' => __('Edit Contacts Item'),
                    'new_item' => __('New Contacts Item'), 
                    'view_item' => __('View Contacts'),
                    'search_items' => __('Search Contacts'), 
                    'not_found' =>  __('No Contacts Items Found'),
                    'not_found_in_trash' => __('No Contacts Items Found In Trash'),
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
                    'rewrite' => array('slug' => 'contacts'),
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
                  array( 'post_tag', 'contacts_category')
             );
    
    register_post_type(__( 'contacts' ), $args);        
} 

// function: contacts_messages BEGIN
function contacts_messages($messages)
{
    $messages[__( 'contacts' )] = 
            array(
                    0 => '', 
                    1 => sprintf(('Contacts Updated. <a href="%s">View contacts</a>'), esc_url(get_permalink($post_ID))),
                    2 => __('Custom Field Updated.'),
                    3 => __('Custom Field Deleted.'),
                    4 => __('Contacts Updated.'),
                    5 => isset($_GET['revision']) ? sprintf( __('Contacts Restored To Revision From %s'), wp_post_revision_title((int)$_GET['revision'], false)) : false,
                    6 => sprintf(__('Contacts Published. <a href="%s">View Portfolio</a>'), esc_url(get_permalink($post_ID))),
                    7 => __('Contacts Saved.'),
                    8 => sprintf(__('Contacts Submitted. <a target="_blank" href="%s">Preview Contacts</a>'), esc_url( add_query_arg('preview', 'true', get_permalink($post_ID)))),
                    9 => sprintf(__('Contacts Scheduled For: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Contacts</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
                    10 => sprintf(__('Contacts Draft Updated. <a target="_blank" href="%s">Preview Contacts</a>'), esc_url( add_query_arg('preview', 'true', get_permalink($post_ID)))),
            );
    return $messages;

} // function: contacts_messages END

// function: contacts_category BEGIN
function contacts_category()
{
    register_taxonomy(
            __( "contacts_category" ),
            array(__( "contacts" )),
            array(
                    "hierarchical" => true,
                    "label" => __( "Category" ),
                    "singular_label" => __( "Category" ),
                    'show_ui'           => true,
                    'show_admin_column' => true,
                    "rewrite" => array(
                            'slug' => 'contacts_category',
                            'hierarchical' => true
                    )
            )
    );
} // function: contacts_category END

add_action( 'init', 'contacts_post_type' );
add_action( 'init', 'contacts_category', 0 );
add_filter( 'post_updated_messages', 'contacts_messages' );

