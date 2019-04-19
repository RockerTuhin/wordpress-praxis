<?php
	add_shortcode('testimonial_section','testimonial_section_fun');
	function testimonial_section_fun($attr)
	{
		$res = shortcode_atts(array(
			'testimonial' => '',
		),$attr);
		extract($res);
		ob_start();
		?>
		<!-- Start Testimonial Section -->
        <section class="testimonial-wrap">
            <div class="container">
                <div class="testimonial owl-carousel">
                	<?php
	            	$testimonials = vc_param_group_parse_atts($testimonial);
	            	foreach($testimonials as $item):
	            		$img = wp_get_attachment_image_url($item['image']); 
	            	?>
                    <div class="single-testimonial">
                        <div class="testimonial-img">
                            <img src="<?php echo esc_attr($img);?>" alt="">
                            <h3><?php echo esc_html($item['name']);?></h3>
                        </div>
                        <div class="testimonial-text">“<?php echo $item['content'];?>”</div>
                    </div><!-- .single-testimonial -->
                	<?php endforeach; ?>
                </div>
            </div>
        </section>
        <!-- End Testimonial Section -->
        <?php
        return ob_get_clean();
	}

	add_action( 'vc_before_init', 'testimonial_section_addon' );
	function testimonial_section_addon() {
	 vc_map( array(
		  "name" => __( "Testimonial", "praxis" ),
		  "base" => "testimonial_section",
		  "category" => __( "Praxis", "praxis"),
		  "params" => array(
		  	  // params group
			  array(
				  'type' => 'param_group',
				  'param_name' => 'testimonial',
					  // Note params is mapped inside param-group:
					  'params' => array(
						  array(
							  'type' => 'textfield',
							  'heading' => 'Name',
							  'param_name' => 'name',
						  ),
						  array(
							  'type' => 'textarea',
							  'heading' => 'Content',
							  'param_name' => 'content',
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

