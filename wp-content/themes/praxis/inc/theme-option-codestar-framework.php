<?php

define( 'CS_ACTIVE_FRAMEWORK',   true  ); // default true
define( 'CS_ACTIVE_METABOX',     true ); // default true
define( 'CS_ACTIVE_TAXONOMY',    false ); // default true
define( 'CS_ACTIVE_SHORTCODE',   false ); // default true
define( 'CS_ACTIVE_CUSTOMIZE',   false ); // default true
define( 'CS_ACTIVE_LIGHT_THEME',  false  ); // default false

//SETTINGS OF CODESTAR FRAMEWORK 
add_filter('cs_framework_settings','praxis_theme_options_setting');
function praxis_theme_options_setting()
{
	$settings = array(
		'menu_title' => 'Theme Options',
		'menu_slug' => 'theme-options',
		'menu_type' => 'menu',
		'framework_title' => 'Praxis Theme Options',
	);
	return $settings;
}

//CODESTAR FRAMEWORK ER DEFAULT OPTION GULAKE OVERRIDE KORAR JONNO EI HOOK
add_filter('cs_framework_options','praxis_theme_options');
function praxis_theme_options($options)
{
	$options = array();
	$options[] = array(
		'name' => 'praxis-header',
		'title' => esc_html__('Praxis Header','praxis'),
		'icon' => 'fa fa-bars',
		'fields' => array(
			array(
				'id' => 'title_switcher',
				'type' => 'switcher',
				'title' => esc_html__('Site Title ON/OFF','praxis'),
			),
			array(
				'id' => 'site_title',
				'type' => 'text',
				'title' => esc_html__('Site Title','praxis'),
				'dependency' => array('title_switcher','==','true'),
			),
			array(
				'id' => 'logo_switcher',
				'type' => 'switcher',
				'title' => esc_html__('Logo ON/OFF','praxis'),
			),
			array(
				'id' => 'logo',
				'type' => 'image',
				'title' => esc_html__('Upload Logo','praxis'),
				'dependency' => array('logo_switcher','==','true'),
			)
		)
	);
	$options[] = array(
		'name' => 'praxis-footer',
		'title' => esc_html__('Praxis Footer','praxis'),
		'icon' => 'fa fa-bars',
		'fields' => array(
			array(
				'id' => 'footer_column_number',
				'type' => 'select',
				'title' => esc_html__('Select Number of Column in Footer','praxis'),
				'options' => array(
					'1' => 'Column 1',
					'2' => 'Column 2',
					'3' => 'Column 3',
					'4' => 'Column 4',
				),
				'default' => 4,
			),
			array(
				'id' => 'copyright_switcher',
				'type' => 'switcher',
				'title' => esc_html__('Copyright ON/OFF','praxis'),
				'default' => true,
			),
			array(
				'id' => 'footer_copyright',
				'type' => 'textarea',
				'title' => esc_html__('Footer Copyright','praxis'),
				'dependency' => array('copyright_switcher','==','true'),
				'default' => 'Copyright @ 2016 - All Right Reserved',
			),
			array(
				'id' => 'footer_bg_color',
				'type' => 'color_picker',
				'title' => esc_html__('Footer Background Color','praxis'),
				'default' => '#252525',
			),
			array(
				'id' => 'footer_copyright_text_color',
				'type' => 'color_picker',
				'title' => esc_html__('Footer Copyright Text Color','praxis'),
				'default' => '#252525',
			),
		)
	);

	return $options;
}
?>