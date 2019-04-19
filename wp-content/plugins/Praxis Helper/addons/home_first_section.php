<?php
	add_shortcode('home_first_section','home_first_section_fun');
	function home_first_section_fun($attr)
	{
		$res = shortcode_atts(array(
			'home_first' => '',
		),$attr);
		extract($res);
		ob_start();
		?>
		<!-- Start Hero section -->
        <section class="owl-carousel hero-slider">
        	<?php
        	$home = vc_param_group_parse_atts($home_first);
        	foreach($home as $item):
        		$img = wp_get_attachment_image_url($item['image']); 
        	?>
            <div class="single-slider">
            	<img src="<?php echo esc_attr($img);?>" alt="">
            	<div class="overlay"></div>
                <div class="container">
                    <div class="slider-text">
                    	<h1><?php echo esc_html($item['title']);?></h1>
                    	<h4><?php echo esc_html($item['subtitle']);?></h4>
                    	<div class="slider-btn-group">
                    		<a href="#" class="t-btn"><?php echo esc_html($item['text1']);?></a>
                    		<a href="#" class="t-btn t-btn-red"><?php echo esc_html($item['text2']);?></a>
                    	</div>
                    </div>
                </div>
            </div><!-- .single-slider -->
            <?php endforeach; ?>
        </section>
        <!-- End Hero section -->
        <?php
        return ob_get_clean();
	}

	add_action( 'vc_before_init', 'home_first_section_addon' );
	function home_first_section_addon() {
	 vc_map( array(
		  "name" => __( "Home First", "praxis" ),
		  "base" => "home_first_section",
		  "category" => __( "Praxis", "praxis"),
		  "params" => array(
		  	  // params group
			  array(
				  'type' => 'param_group',
				  'param_name' => 'home_first',
					  // Note params is mapped inside param-group:
					  'params' => array(
						  array(
							  'type' => 'textfield',
							  'heading' => 'Title',
							  'param_name' => 'title',
						  ),
						  array(
							  'type' => 'textfield',
							  'heading' => 'Subtitle',
							  'param_name' => 'subtitle',
						  ),
						  array(
							  'type' => 'textfield',
							  'heading' => 'Button 1 text',
							  'param_name' => 'text1',
						  ),
						  array(
							  'type' => 'textfield',
							  'heading' => 'Button 2 text',
							  'param_name' => 'text2',
						  ),
						  array(
							  'type' => 'attach_image',
							  'heading' => 'Image',
							  'param_name' => 'image',
						  ),
					  )
				)

	  		)
	 ) );
	}
?>

