<?php
	add_shortcode('team_section','team_section_fun');
	function team_section_fun($attr)
	{
		$res = shortcode_atts(array(
			'team_section_title' => '',
			'team_section_position' => '',
			'team_section_image' => '',
			'team_facebook_url' => '',
			'team_twitter_url' => '',
			'team_instagram_url' => '',
			'team_behance_url' => '',
		),$attr);
		extract($res);
		ob_start();
		?>
			<div class="team-member">
				<?php
					$img = wp_get_attachment_url( $team_section_image );
				?>
				<img src="<?php  echo esc_url($img);?>" alt="MICHAEL DJONSON">
				<div class="member-social-icon">
					<a href="<?php  echo esc_url($team_facebook_url);?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
					<a href="<?php  echo esc_url($team_twitter_url);?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
					<a href="<?php  echo esc_url($team_instagram_url);?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
					<a href="<?php  echo esc_url($team_behance_url);?>"><i class="fa fa-behance" aria-hidden="true"></i></a>
				</div>
				<div class="member-details">
					<h3><?php  echo esc_html($team_section_title);?></h3>
					<h4><?php  echo esc_html($team_section_position);?></h4>
				</div>
			</div>
        <?php
        return ob_get_clean();
	}

	add_action( 'vc_before_init', 'team_section_addon' );
	function team_section_addon() {
	 vc_map( array(
		  "name" => __( "Team", "praxis" ),
		  "base" => "team_section",
		  "category" => __( "Praxis", "praxis"),
		  "params" => array(
				 array(
				  	"type" => "textfield",
				  	"heading" => __( "Team Title", "praxis" ),
				  	"param_name" => "team_section_title",
				 ),
				 array(
				  	"type" => "textfield",
				  	"heading" => __( "Team Position", "praxis" ),
				  	"param_name" => "team_section_position",
				 ),
				 array(
				  	"type" => "attach_image",
				  	"heading" => __( "Team Image", "praxis" ),
				  	"param_name" => "team_section_image",
				 ),
				 array(
				  	"type" => "textfield",
				  	"heading" => __( "Facebook URL", "praxis" ),
				  	"param_name" => "team_facebook_url",
				 ),
				 array(
				  	"type" => "textfield",
				  	"heading" => __( "Twitter URL", "praxis" ),
				  	"param_name" => "team_twitter_url",
				 ),
				 array(
				  	"type" => "textfield",
				  	"heading" => __( "Instagram URL", "praxis" ),
				  	"param_name" => "team_instagram_url",
				 ),
				 array(
				  	"type" => "textfield",
				  	"heading" => __( "Behance URL", "praxis" ),
				  	"param_name" => "team_behance_url",
				 ),

	  		)
	 ) );
	}
?>
