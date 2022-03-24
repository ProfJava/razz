<?php
if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'custom_code' => array(
		'title'   => esc_html__( 'Advanced', 'razz' ),
		'type'    => 'tab',
		'options' => array(
			'custom_code_box' => array(
				'title'   => esc_html__( 'Advanced', 'razz' ),
				'type'    => 'tab',
				'options' => array(
					'warn'         => array(
						'type'  => 'html',
						'label' => esc_html__( 'Warning', 'razz' ),
						'html'  => __( '<b>This section is for advanced users only, use the following fields with caution.</b>', 'razz' )
					),
					'views_key'    => array(
						'type'  => 'text',
						'value' => 'bbioon_post_views',
						'label' => esc_html__( 'Post Views Meta key', 'razz' ),
						'desc'  => esc_html__( 'use this field to change the default meta key that theme saves the post views count in. if you use another theme you can write here you old meta key and the post views count will restore your old theme count. (Leave it blank for default value: bbioon_post_views)', 'razz' ),
					),
					'css'          => array(
						'type'  => 'textarea',
						'attr'  => array( 'placeholder' => "body{\n background-color: #f5f5f5; \n}" ),
						'label' => esc_html__( 'Custom css (General)', 'razz' ),
					),
					'css_min_480'  => array(
						'type'  => 'textarea',
						'attr'  => array( 'placeholder' => "body{\n background-color: #f5f5f5; \n}" ),
						'label' => esc_html__( 'Custom css (Min-width : 480px)', 'razz' ),
					),
					'css_min_768'  => array(
						'type'  => 'textarea',
						'attr'  => array( 'placeholder' => "body{\n background-color: #f5f5f5; \n}" ),
						'label' => esc_html__( 'Custom css (Min-width : 768px)', 'razz' ),
					),
					'css_max_768'  => array(
						'type'  => 'textarea',
						'attr'  => array( 'placeholder' => "body{\n background-color: #f5f5f5; \n}" ),
						'label' => esc_html__( 'Custom css (Max-width : 768px)', 'razz' ),
					),
					'css_min_992'  => array(
						'type'  => 'textarea',
						'attr'  => array( 'placeholder' => "body{\n background-color: #f5f5f5; \n}" ),
						'label' => esc_html__( 'Custom css (Min-width : 992px)', 'razz' ),
					),
					'css_max_992'  => array(
						'type'  => 'textarea',
						'attr'  => array( 'placeholder' => "body{\n background-color: #f5f5f5; \n}" ),
						'label' => esc_html__( 'Custom css (Max-width : 992px)', 'razz' ),
					),
					'css_min_1200' => array(
						'type'  => 'textarea',
						'attr'  => array( 'placeholder' => "body{\n background-color: #f5f5f5; \n}" ),
						'label' => esc_html__( 'Custom css (Min-width : 1200px)', 'razz' ),
					),
					'css_max_1200' => array(
						'type'  => 'textarea',
						'attr'  => array( 'placeholder' => "body{\n background-color: #f5f5f5; \n}" ),
						'label' => esc_html__( 'Custom css (Max-width : 1200px)', 'razz' ),
					),
					'js'           => array(
						'type'  => 'textarea',
						'attr'  => array( 'placeholder' => "jQuery(document).ready(function ($) {\n\n});" ),
						'label' => esc_html__( 'Custom javascript in head tag', 'razz' ),
					),
					'footer_js'    => array(
						'type'  => 'textarea',
						'attr'  => array( 'placeholder' => "jQuery(document).ready(function ($) {\n\n});" ),
						'label' => esc_html__( 'Custom javascript in footer tag', 'razz' ),
					)
				)
			)
		)
	)
);