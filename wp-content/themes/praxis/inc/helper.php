<?php
function praxis_nav_menu()
{
	wp_nav_menu(array(
		'theme_location' => 'primary',
		 'menu_class' => 'primary-nav-list',
	));
}
//FOR SHOWING METABOX OPTION BANNER
function praxis_metabox_banner()
{
	$page_meta = get_post_meta(get_the_ID(),'_pagetitle',true);
	$page_banner = isset($page_meta['banner']) ? $page_meta['banner'] : array();
	$page_banner_switcher = isset($page_meta['banner_switcher']) ? $page_meta['banner_switcher'] : array();
	$image = wp_get_attachment_image_url($page_banner,'full');
	if($page_banner_switcher == true):
	?>
	<section class="other-hero" style="background-image: url(<?php echo esc_url($image); ?>);">
            <div class="other-hero-overlay"></div>
            <div class="container">
                <div class="other-hero-text">
                    <h1><?php esc_html(the_title()); ?></h1>
                    <ul class="breadcrumb">
                        <li><a href="<?php echo home_url('/') ?>">Home</a></li>
                        <li><?php esc_html(the_title()); ?></li>
                    </ul>
                </div>
            </div>
    </section>
	<?php
	endif;
}
?>