<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Praxis
 */

?>

<!DOCTYPE doctype html>
<html class="no-js" <?php language_attributes(); ?>>
    <head>
        <!-- Meta Tags -->
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta content="ie=edge" http-equiv="x-ua-compatible"/>
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta content="Pressionate" name="author"/>
        <meta content="" name="description"/>
        <meta content="" name="keywords"/>
        
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
	<!-- Start Preloader -->
	<div id="preloader">
	 	<div id="status">
	    	<div class="spinner">
		     	<div class="rect1"></div>
		     	<div class="rect2"></div>
		     	<div class="rect3"></div>
		     	<div class="rect4"></div>
		     	<div class="rect5"></div>
	    	</div>
	 	</div>
	</div>
	<!-- End Preloader -->

    <!-- Start Site Header -->
    <header class="site-header">
        <div class="container header-wrap">
            <div class="site-branding">
            <!-- For Image Logo -->
                <a href="index.html" class="custom-logo-link">
                <?php
                    if(function_exists('cs_get_option')){
                        $title = cs_get_option('site_title'); 
                        $image = cs_get_option('logo');
                        $title_show = cs_get_option('title_switcher');
                        $logo_show = cs_get_option('logo_switcher');
                        $img = wp_get_attachment_image_src($image,'full');
                    }
                ?>
                <?php if($logo_show == true): ?>
                <img src="<?php echo esc_url($img[0]); ?>" alt="" class="custom-logo">
                <?php endif; ?>
                
                <?php if($title_show == true): ?>
                <h2><?php echo esc_html($title);?></h2>
                <?php endif; ?>
            </a>
            <!-- For Site Title -->
            <!-- <span class="site-title">
                <a href="index.html">Buildm</a>
            </span> -->
            </div>
            <nav class="primary-nav">
            	<?php praxis_nav_menu();?>
                <!-- <ul class="primary-nav-list">
                    <li class="menu-item menu-item-has-children current-menu-item"><a href="index.html">HOME</a>
                        <ul>
                            <li class="menu-item"><a href="home-1.html">HOME 1</a></li>
                        </ul>
                    </li>
                    <li class="menu-item"><a href="about.html">ABOUT</a></li>
                    <li class="menu-item menu-item-has-children"><a href="#">PORTFOLIO</a>
                        <ul>
                            <li class="menu-item"><a href="portfolio-masonry.html">PORTFOLIO MASONRY</a></li>
                            <li class="menu-item"><a href="portfolio-masonry-gutter-less.html">PORTFOLIO MASONRY - GUTTER LESS</a></li>
                            <li class="menu-item"><a href="portfolio-even-grid.html">PORTFOLIO EVEN GRID</a></li>
                            <li class="menu-item"><a href="portfolio-even-grid-gutter-less.html">PORTFOLIO EVEN GRID-GUTTER LESS</a></li>
                            <li class="menu-item"><a href="portfolio-details.html">PROJECTS DETAILS</a></li>
                        </ul>
                    </li>
                    <li class="menu-item menu-item-has-children"><a href="blog.html">BLOG</a>
                        <ul>
                            <li class="menu-item"><a href="blog-details.html">BLOG DETAILS</a></li>
                        </ul>
                    </li>
                    <li class="menu-item"><a href="contact.html">CONTACT</a></li>
                </ul> -->
            </nav>
        </div><!-- .header-wrap -->
    </header>
    <!-- End Site Header -->
