<?php
	add_shortcode('works_section','works_section_fun');
	function works_section_fun($attr)
	{
		$res = shortcode_atts(array(
			'post_count' => '',
			'has_masonry' => '',
			'has_gutter' => '',
		),$attr);
		extract($res);
		ob_start();
		?>
		<!-- Start Portfolio Section -->
        <section class="portfolio-wrap section">
            <div class="container">
                <div class="portfolio-filter text-center">
                    <ul>
                      <li class="active"><a href="#" data-filter="*">ALL</a></li>

                      <?php $allWorks = get_terms('work_category',array('hide_empty' => true));
                      foreach($allWorks as $Category):

                      echo '<li><a href="#" data-filter=".'.$Category->slug.'">'.$Category->name.'</a></li>';
                      
                      endforeach; ?>
                    </ul>
                </div><!-- .portfolio-filter-area -->
                <?php
                $evenClass= 'portfolio-even';
                if($has_masonry):
                	$evenClass = '';
            	endif;
            	$gutterClass= '';
                if($has_gutter):
                	$gutterClass = 'gutter-less';
            	endif;
                ?>
                <div class="portfolio  <?php echo $evenClass;?> <?php echo $gutterClass;?>">
                    <div class="grid-sizer"></div>

                    <?php 
                    $query = new WP_Query(array(
                    	'post_type' => 'work',
                    	'posts_per_page' => $post_count,
                    ));
                    while($query->have_posts()):$query->the_post();

                    	$singleWork = get_the_terms(get_the_ID(), 'work_category');
                    	$workSlugsArray = array();
                    	foreach($singleWork as $single):
                    		$workSlugsArray[] = $single->slug;
                    	endforeach;

                    	$allSlugs = join(', ', $workSlugsArray);
                    ?>

                    <div class="portfolio-item <?php echo $allSlugs;?>">
                      <a href="#" class="inner-portfolio">
                        <?php the_post_thumbnail(); ?>
                        <div class="portfolio-hover text-center">
                         	<h3><?php echo $allSlugs;?></h3>
                         	<h4><?php the_title(); ?></h4>
                        </div><!-- .portfolio-hover -->
                      </a>
                    </div><!-- .portfolio-item -->

                	<?php endwhile; ?>

              </div><!-- .portfolio -->
            </div><!-- .container -->
        </section>
        <!-- End Portfolio Section -->
        <?php
        return ob_get_clean();
	}

	add_action( 'vc_before_init', 'works_section_addon' );
	function works_section_addon() {
	 vc_map( array(
		  "name" => __( "Section Works", "praxis" ),
		  "base" => "works_section",
		  "category" => __( "Praxis", "praxis"),
		  "params" => array(
				 array(
				  	"type" => "textfield",
				  	"heading" => __( "Post Count", "praxis" ),
				  	"param_name" => "post_count",
				 ),
				 array(
				  	"type" => "checkbox",
				  	"heading" => __( "Masonry View", "praxis" ),
				  	"param_name" => "has_masonry",
				  	"description" => __( "Check the box to display masonry view", "praxis" ),
				 ),
				 array(
				  	"type" => "checkbox",
				  	"heading" => __( "Gutter Less", "praxis" ),
				  	"param_name" => "has_gutter",
				  	"description" => __( "Check the box to display gutter less view", "praxis" ),
				 ),
			
	  		)
	 ) );
	}
?>
