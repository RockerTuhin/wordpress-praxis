<?php
	add_shortcode('title_section','title_section_fun');
	function title_section_fun($attr)
	{
		$res = shortcode_atts(array(
			'section_title' => '',
			'section_description' => '',
		),$attr);
		extract($res);
		ob_start();
		?>
		<div class="section-header text-center">
        	<h2><?php  echo esc_html($section_title);?></h2>
        	<p><?php  echo esc_html($section_description);?></p>
        </div>
        <?php
        return ob_get_clean();
	}

	add_action( 'vc_before_init', 'title_section_addon' );
	function title_section_addon() {
	 vc_map( array(
		  "name" => __( "Section Title", "praxis" ),
		  "base" => "title_section",
		  "category" => __( "Praxis", "praxis"),
		  "params" => array(
				 array(
				  	"type" => "textfield",
				  	"heading" => __( "Section Title", "praxis" ),
				  	"param_name" => "section_title",
				  	"value" => __( "Default param value", "praxis" ),
				  	"description" => __( "Description for Section Title param.", "my-text-domain" )
				 ),
				 array(
				  	"type" => "textarea",
				  	"heading" => __( "Section Description", "praxis" ),
				  	"param_name" => "section_description",
				  	"value" => __( "Default param value", "praxis" ),
				  	"description" => __( "Description for Section Description param.", "my-text-domain" )
				 ),
	  		)
	 ) );
	}
?>
