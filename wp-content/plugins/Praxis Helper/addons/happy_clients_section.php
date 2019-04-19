<?php
	add_shortcode('happy_clients_section','happy_clients_section_fun');
	function happy_clients_section_fun($attr)
	{
		$res = shortcode_atts(array(
			'happy_client' => '',
		),$attr);
		extract($res);
		ob_start();
		?>
		<!-- Start Client Section -->
        <section class="client-wrap section">
        	<div class="container">
        		<div class="owl-carousel clients">
        			<?php
	            	$happy_clients = vc_param_group_parse_atts($happy_client);
	            	foreach($happy_clients as $item):
	            	$img = wp_get_attachment_image_url($item['image']); 
	            	?>
        			<a href="#"><img src="<?php echo esc_attr($img);?>" alt=""></a>
        			<?php endforeach; ?>
        		</div>
        	</div>
        </section>
        <!-- End Client Section -->
        <?php
        return ob_get_clean();
	}

	add_action( 'vc_before_init', 'happy_clients_section_addon' );
	function happy_clients_section_addon() {
	 vc_map( array(
		  "name" => __( "Happy Clients", "praxis" ),
		  "base" => "happy_clients_section",
		  "category" => __( "Praxis", "praxis"),
		  "params" => array(
		  	  // params group
			  array(
				  'type' => 'param_group',
				  'param_name' => 'happy_client',
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
