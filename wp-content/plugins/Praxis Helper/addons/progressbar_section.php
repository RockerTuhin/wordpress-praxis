<?php
	add_shortcode('progressbar_section','progressbar_section_fun');
	function progressbar_section_fun($attr)
	{
		$res = shortcode_atts(array(
			'progressbar_title' => '',
			'progressbar_percent' => '',
		),$attr);
		extract($res);
		ob_start();
		?>
		<div class="progressbar-wrapper">
            <div class="single-rogressbar">
                <h4 class="progress-bar-title"><?php  echo esc_html($progressbar_title);?></h4>
                <div class="progressbar">
                    <div class="inner-progress wow fadeInLeft" data-progress="<?php  echo esc_html($progressbar_percent);?>" data-wow-duration="2s" data-wow-delay="0.1s" style="width: <?php  echo esc_html($progressbar_percent);?>; visibility: visible; animation-duration: 2s; animation-delay: 0.1s; animation-name: fadeInLeft;"></div>
                </div>
            </div><!-- .single-rogressbar -->
        </div>
                            
        <?php
        return ob_get_clean();
	}

	add_action( 'vc_before_init', 'progressbar_section_addon' );
	function progressbar_section_addon() {
	 vc_map( array(
		  "name" => __( "Progressbar Title", "praxis" ),
		  "base" => "progressbar_section",
		  "category" => __( "Praxis", "praxis"),
		  "params" => array(
				 array(
				  	"type" => "textfield",
				  	"heading" => __( "Progressbar Title", "praxis" ),
				  	"param_name" => "progressbar_title",
				 ),
				 array(
				  	"type" => "textfield",
				  	"heading" => __( "Progressbar %", "praxis" ),
				  	"param_name" => "progressbar_percent",
				  	"description" => __( "Example: 50%", "praxis" ),
				 ),
	  		)
	 ) );
	}
?>
