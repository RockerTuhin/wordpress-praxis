<?php
	add_shortcode('hours_works_section','hours_works_section_fun');
	function hours_works_section_fun($attr)
	{
		$res = shortcode_atts(array(
			'hours_works' => '',
		),$attr);
		extract($res);
		ob_start();
		?>
		<!-- Start fun-factor -->
		<div class="section">
			<div class="overlay"></div>
      	    <div class="container">
        		<div class="fun-factor">
        			<?php
	            	$hours_work = vc_param_group_parse_atts($hours_works);
	            	foreach($hours_work as $item):
	            	?>
        			<div class="single-factor">
        				<h3 class="counter"><?php echo esc_html($item['amount']) ?></h3>
        				<h4><?php echo esc_html($item['name']) ?></h4>
        			</div>
        			<?php endforeach; ?>
        		</div><!-- .fun-factor -->
        	</div>
        </div>
        <!-- End fun-factor -->
        <?php
        return ob_get_clean();
	}

	add_action( 'vc_before_init', 'hours_works_section_addon' );
	function hours_works_section_addon() {
	 vc_map( array(
		  "name" => __( "Hours Works", "praxis" ),
		  "base" => "hours_works_section",
		  "category" => __( "Praxis", "praxis"),
		  "params" => array(
		  	  // params group
			  array(
				  'type' => 'param_group',
				  'param_name' => 'hours_works',
					  // Note params is mapped inside param-group:
					  'params' => array(
						  array(
							  'type' => 'textfield',
							  'heading' => 'Amount',
							  'param_name' => 'amount',
						  ),
						  array(
							  'type' => 'textfield',
							  'heading' => 'Name',
							  'param_name' => 'name',
						  ),
					  )
				)

	  		)
	 ) );
	}
?>
