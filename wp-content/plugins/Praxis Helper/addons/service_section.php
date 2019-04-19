<?php
	add_shortcode('service_section','service_section_fun');
	function service_section_fun($attr)
	{
		$res = shortcode_atts(array(
			'service' => '',
		),$attr);
		extract($res);
		ob_start();
		?>
		<section class="service section">
            <div class="container">
                <div class="row flex">
                	<?php
	            	$services = vc_param_group_parse_atts($service);
	            	foreach($services as $item):
	            	?>
                    <div class="col-md-4 col-sm-6">
                        <div class="single-service">
                            <i class="<?php echo esc_attr($item['service_section_icon']); ?>" style="position: absolute;left: 0;top: 0;height: 100%;width: 85px;display: flex;justify-content: center;align-items: center;background-color: #00ccff;color: #fff;font-size: 35px;"></i>
                            <h3><?php echo esc_html($item['service_section_title']); ?></h3>
                            <p><?php echo esc_html($item['service_section_desc']); ?></p>
                        </div>
                    </div><!-- .col --> 
                <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php
        return ob_get_clean();
	}

	add_action( 'vc_before_init', 'service_section_addon' );
	function service_section_addon() {
	 vc_map( array(
		  "name" => __( "Service Section", "praxis" ),
		  "base" => "service_section",
		  "category" => __( "Praxis", "praxis"),
		  "params" => array(
		  		// params group
			  	array(
				    'type' => 'param_group',
				    'param_name' => 'service',
					// Note params is mapped inside param-group:
					  'params' => array(
						  array(
							  'type' => 'textfield',
							  'heading' => __( "Service Title", "praxis" ),
							  'param_name' => "service_section_title",
						  ),
						  array(
							  'type' => 'textfield',
							  'heading' => __( "Service Description", "praxis" ),
							  'param_name' =>  "service_section_desc",
						  ),
						  array(
						  	"type" => "iconpicker",
						  	"heading" => __( "Service Icon", "praxis" ),
						  	"param_name" => "service_section_icon",
						  ),
					  )
				),
	  		)
	 ) );
	}
?>
