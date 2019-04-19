<?php
	add_shortcode('instagram_feeds_section','instagram_feeds_section_fun');
	function instagram_feeds_section_fun($attr)
	{
		$res = shortcode_atts(array(
			'instagram_feeds' => '',
		),$attr);
		extract($res);
		ob_start();
		?>
		<!-- Start Instagram Section -->
        <section class="instagram-wrap section">
            <div class="container">
                <div class="instagram">
                	<?php
                	$instagram = vc_param_group_parse_atts($instagram_feeds);
                	foreach($instagram as $item):
                		$img = wp_get_attachment_image_url($item['image']); 
                	?>
                    <a href="<?php echo esc_attr($img); ?>" >
                        <img src="<?php echo esc_attr($img); ?>" alt="">
                    </a>
                	<?php endforeach; ?>
                </div>
            </div>
        </section>
        <!-- End Instagram Section -->
        <?php
        return ob_get_clean();
	}

	add_action( 'vc_before_init', 'instagram_feeds_section_addon' );
	function instagram_feeds_section_addon() {
	 vc_map( array(
		  "name" => __( "Instagram Feeds", "praxis" ),
		  "base" => "instagram_feeds_section",
		  "category" => __( "Praxis", "praxis"),
		  "params" => array(
		  	  // params group
			  array(
				  'type' => 'param_group',
				  'param_name' => 'instagram_feeds',
					  // Note params is mapped inside param-group:
					  'params' => array(
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
