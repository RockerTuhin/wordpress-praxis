<?php
	add_shortcode('instagram_section','instagram_section_fun');
	function instagram_section_fun($attr)
	{
		$res = shortcode_atts(array(
			'image' => '',
		),$attr);
		extract($res);
		ob_start();
		?>
		
		<!-- Start Instagram Section -->
        <section class="instagram-wrap section">
            <div class="container">
                <div class="instagram">
                	<?php $img = wp_get_attachment_image_url($image);?>
                    <a href="<?php echo esc_attr($img); ?>" data-source="http://500px.com/photo/32736307" title="">
                        <img src="<?php echo esc_attr($img); ?>" alt="">
                    </a>

                </div>
            </div>
        </section>
        <!-- End Instagram Section -->
        <?php
        return ob_get_clean();
	}

	add_action( 'vc_before_init', 'instagram_section_addon' );
	function instagram_section_addon() {
	 vc_map( array(
		  "name" => __( "Instagram", "praxis" ),
		  "base" => "instagram_section",
		  "category" => __( "Praxis", "praxis"),
		  "params" => array(
				 array(
				  	"type" => "attach_image",
				  	"heading" => __( "Image", "praxis" ),
				  	"param_name" => "image",
				 ),
			
	  		)
	 ) );
	}
?>
