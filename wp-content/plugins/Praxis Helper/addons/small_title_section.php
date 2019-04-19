<?php
	add_shortcode('small_title_section','small_title_section_fun');
	function small_title_section_fun($attr)
	{
		$res = shortcode_atts(array(
			'small_section_title' => '',
		),$attr);
		extract($res);
		ob_start();
		?>
		<h3 class="about-section-title"><?php  echo esc_html($small_section_title);?></h3>
        <?php
        return ob_get_clean();
	}

	add_action( 'vc_before_init', 'small_title_section_addon' );
	function small_title_section_addon() {
	 vc_map( array(
		  "name" => __( "Small Title", "praxis" ),
		  "base" => "small_title_section",
		  "category" => __( "Praxis", "praxis"),
		  "params" => array(
				 array(
				  	"type" => "textfield",
				  	"heading" => __( "Small Title", "praxis" ),
				  	"param_name" => "small_section_title",
				  	"value" => __( "Default param value", "praxis" ),
				  	"description" => __( "Description for Small Section Title param.", "praxis" )
				 ),
	  		)
	 ) );
	}
?>
