<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Praxis
 */

get_header();
?>
<section class="home-blog section">
	<div class="container">
		<div class="section-header text-center">
			<h2>LATEST NEWS</h2>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit</p>
		</div>
		<div class="row">
			<?php
			$query = new WP_Query(array(
				'post_type' => 'post',
			));
			while($query->have_posts()):$query->the_post();
			?>
			<div class="col-lg-6">
				<article class="post">
					<header class="entry-header">
						<a href="<?php the_permalink(); ?>" class="post-thumbnail"><?php the_post_thumbnail(); ?></a>
					</header>
					<div class="post-body">
						<div class="post-details-wrap">
							<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title();?> </a></h2>
							<div class="byline">
								<span class="home-posted-on">10 Jan 2017<?php the_time('d M Y') ?></span>
							</div>
						</div><!-- .post-details-wrap -->
						<div class="entry-content">
							<p><?php echo wp_trim_words(get_the_content(),13,' ') ?></p>
							<a href="<?php the_permalink(); ?>" class="h-readmore-btn"><?php esc_html_e('READ MORE') ?></a>
						</div>
					</div><!-- .post-body -->
				</article>
			</div><!-- .col -->

			<?php endwhile;?>

			<div class="col-lg-12 text-center">
				<!--<button class="t-btn blog-loadmore"> Load More</button>-->
				<!-- <nav class="post-navigation">
					<div class="nav-previous">
						<a href="#" class="meta-nav"></a>
					</div>
					<div class="nav-all-post">
						<a class="active-post" href="#">1</a>
						<a href="#">2</a>
						<a href="#">3</a>
					</div>
					<div class="nav-next">
						<a href="#" class="meta-nav"></a>
					</div>
				</nav> -->
				<?php
				$pagination = get_the_posts_pagination( array(
					'mid_size' => 2,
					'prev_text' => __( 'Prev', 'praxis' ),
					'next_text' => __( 'Next', 'textdomain' ),
				) );?>
	<!-- <nav class="navigation pagination" role="navigation">
		<h2 class="screen-reader-text">Posts navigation</h2>
		<div class="nav-links">
			<a class="prev page-numbers" href="http://localhost/wordpress-praxis/index.php/page/2/">Newer</a>
			<a class="page-numbers" href="http://localhost/wordpress-praxis/">1</a>
			<a class="page-numbers" href="http://localhost/wordpress-praxis/index.php/page/2/">2</a>
			<span aria-current="page" class="page-numbers current">3</span>
		</div>
	</nav>
	<nav class="post-navigation">
		<div class="nav-previous">
			<a href="http://localhost/wordpress-praxis/index.php/page/2/" class="meta-nav"></a>
		</div>
		<div class="nav-all-post">
			<a class="active-post" href="#">1</a>
			<a href="#">2</a>
			<a href="#">3</a>
		</div>
		<div class="nav-next">
			<a href="#" class="meta-nav"></a>
		</div>
	</nav> -->
	<?php
				$pagination = str_replace('navigation pagination','post-navigation', $pagination);
				$pagination = str_replace('nav-links','nav-all-post', $pagination);
				$pagination = str_replace('current','active-post', $pagination);
				$pagination = str_replace('span','a', $pagination);
				//$pagination = str_replace('<a class="prev page-numbers" href="http://localhost/wordpress-praxis/index.php/page/2/">','<div class="nav-previous"><a href="#" class="meta-nav">', $pagination);
				//$pagination = str_replace('</a>','</a></div>', $pagination);
				//$pagination = str_replace('<a class="prev page-numbers"','', $pagination);
				//$pagination = str_replace('prev','nav-previous', $pagination);
				//$pagination = str_replace('next','nav-next', $pagination);
				
				echo $pagination;
				?>
			</div>
		</div>
	</div>
</section>












	<!-- <div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		// if ( have_posts() ) :

		// 	if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php //single_post_title(); ?></h1>
				</header>
				<?php
		// 	endif;

		// 	/* Start the Loop */
		// 	while ( have_posts() ) :
		// 		the_post();

				
		// 		 * Include the Post-Type-specific template for the content.
		// 		 * If you want to override this in a child theme, then include a file
		// 		 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 
		// 		get_template_part( 'template-parts/content', get_post_type() );

		// 	endwhile;

		// 	the_posts_navigation();

		// else :

		// 	get_template_part( 'template-parts/content', 'none' );

		// endif;
		?>

		</main> #main -->
	<!-- </div> --><!-- #primary -->

<?php
//get_sidebar();
get_footer();
