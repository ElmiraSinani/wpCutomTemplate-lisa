<!DOCTYPE html>
<html <?php language_attributes(); ?>>

    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />

        <?php if (is_search()) { ?>
            <meta name="robots" content="noindex, nofollow" /> 
        <?php } ?>

        <title>
            <?php
            if (function_exists('is_tag') && is_tag()) {
                single_tag_title("Tag Archive for &quot;");
                echo '&quot; - ';
            } elseif (is_archive()) {
                wp_title('');
                echo ' Archive - ';
            } elseif (is_search()) {
                echo 'Search for &quot;' . wp_specialchars($s) . '&quot; - ';
            } elseif (!(is_404()) && (is_single()) || (is_page())) {
                wp_title('');
                echo ' - ';
            } elseif (is_404()) {
                echo 'Not Found - ';
            }
            if (is_home()) {
                bloginfo('name');
                echo ' - ';
                bloginfo('description');
            } else {
                bloginfo('name');
            }
            if ($paged > 1) {
                echo ' - page ' . $paged;
            }
            ?>
        </title>

        <link rel="shortcut icon" href="/favicon.ico">

        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

<?php if (is_singular()) wp_enqueue_script('comment-reply'); ?>

<?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>

    <div id="page-wrap">   
        
        <div class="header"  <?php if (is_user_logged_in()) {echo "style='top:32px;' ";} ?> >
            <div class="logo">&nbsp;</div>
            <div class="top_menu">
            <?php
                if (has_nav_menu('primary-nav')) {
                    wp_nav_menu(array(
                        'menu' => 'primary-nav',
                        'theme_location' => 'primary-nav',
                        //'depth' => 3,
                        'container' => false,
                        'menu_class' => 'nav-header',
                        'fallback_cb' => 'wp_page_menu',
                        'walker' => new lis_top_menu( is_front_page() ? 'local-menu' : '' ))
                    );
                }
            ?>
            </div>
            <ul class="social_block">
                <li ><a class="icon_in" href="#">IN</a></li>
                <li ><a class="icon_fb" href="#">FB</a></li>
                <li ><a class="icon_tw" href="#">TW</a></li>
            </ul>
        </div>
           