<?php

//CODESTAR FRAMEWORK ER METABOX ER DEFAULT OPTION GULAKE OVERRIDE KORAR JONNO EI HOOK
add_filter('cs_metabox_options','praxis_metabox_options');

function praxis_metabox_options($options)
{
	$options = array();
	$options[] = array(
		'id' => '_pagetitle',
		'title' => esc_html__('Inner Page Title Options','praxis'),
		'post_type' => 'page', //or post or CPT or array('post','page')
		'context' => 'normal',
		'priority' => 'default',
		'sections' => array(
			//BEGIN SECTION
			array(
				'name' => 'Title breadcrumb',
				'icon' => 'fa fa-wifi',
				'fields' => array(
					
					array(
						'id' => 'banner_switcher',
						'title' => esc_html__('Banner ON/OFF','praxis'),
						'type' => 'switcher',
					),
					array(
						'id' => 'banner',
						'type' => 'image',
						'title' => esc_html__('Banner Upload','praxis'),
						'dependency' => array('banner_switcher','==','true'),
					),
				)
			)
		)
	);
	return $options;
}

?>