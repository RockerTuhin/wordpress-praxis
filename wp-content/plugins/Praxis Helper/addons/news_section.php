<?php
	add_shortcode('news_section','news_section_fun');
	function news_section_fun($attr)
	{
		$res = shortcode_atts(array(
			'post_count' => '',
		),$attr);
		extract($res);
		ob_start();
		?>
		<section class="home-blog section">
        	<div class="container">
        		<div class="row">
        			<?php
        				$query = new WP_Query(array(
        					'post_type' => 'post',
        					'posts_per_page' => esc_attr($post_count),
        				));
        				while($query->have_posts()):$query->the_post();
        			?>
        			<div class="col-lg-6">
        				<article class="post">
                            <header class="entry-header">
                                <a href="" class="post-thumbnail"><?php the_post_thumbnail(); ?></a>
                            </header>
                            <div class="post-body">
                                <div class="post-details-wrap">
                                    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <div class="byline">
                                        <span class="home-posted-on"><?php the_time('d M Y'); ?></span>
                                    </div>
                                </div><!-- .post-details-wrap -->
                                <div class="entry-content">
                                    <p><?php echo wp_trim_words(get_the_content(),13,' '); ?></p>
                                    <a href="<?php the_permalink(); ?>" class="h-readmore-btn"><?php esc_html_e('READ MORE','praxis') ?></a>
                                </div>
                            </div><!-- .post-body -->
                        </article>
        			</div><!-- .col -->
        		<?php endwhile;?>
        		</div>
        	</div>
        </section>
        <?php
        return ob_get_clean();
	}

	add_action( 'vc_before_init', 'news_section_addon' );
	function news_section_addon() {
	 vc_map( array(
		  "name" => __( "Section News", "praxis" ),
		  "base" => "news_section",
		  "category" => __( "Praxis", "praxis"),
		  "params" => array(
				 array(
				  	"type" => "textfield",
				  	"heading" => __( "Post Count", "praxis" ),
				  	"param_name" => "post_count",
				 ),
			
	  		)
	 ) );
	}
?>
