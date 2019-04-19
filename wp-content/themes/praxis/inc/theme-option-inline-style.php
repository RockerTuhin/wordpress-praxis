<?php
//Source of this code segment = https://codex.wordpress.org/Function_Reference/wp_add_inline_style

function my_styles_method() {
	wp_enqueue_style(
		'custom-style',
		get_template_directory_uri() . 'assets/css/custom_script.css'
	);
        if(function_exists('cs_get_option'))
        {
                $footer_bg_color = cs_get_option('footer_bg_color'); //E.g. #FF0000
                $footer_copyright_text_color = cs_get_option('footer_copyright_text_color'); //E.g. #FF0000
        }
        $custom_css = "
                .myCopyrightColor{
                        color: {$footer_copyright_text_color};
                }
                .myFooterBackgroundColor{
                        background: {$footer_bg_color};
                }
                ";
        wp_add_inline_style( 'custom-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'my_styles_method' );
?>