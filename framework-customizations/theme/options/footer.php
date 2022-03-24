<?php
if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'footer_layout' => array(
		'title'   => esc_html__( 'Footer Settings', 'razz' ),
		'type'    => 'tab',
		'options' => array(
			'footer_box' => array(
				'title'   => esc_html__( 'Footer Settings', 'razz' ),
				'type'    => 'tab',
				'options' => array(
					'footer_instagram'    => array(
						'type'         => 'multi-picker',
						'label'        => false,
						'picker'       => array(
							'control' => array(
								'label'        => esc_html__( 'Footer Instagram', 'razz' ),
								'type'         => 'switch', // or 'short-select'
								'inline'       => true,
								'value'        => 'off',
								'left-choice'  => array(
									'value' => 'off',
									'label' => esc_html__( 'Off', 'razz' ),
								),
								'right-choice' => array(
									'value' => 'on',
									'label' => esc_html__( 'On', 'razz' ),
								),
							)
						),
						'choices'      => array(
							'on' => array(
								'insta_user' => array(
									'type'  => 'text',
									'label' => esc_html__( 'Instagram user or hash-tag', 'razz' ),
									'desc'  => esc_html__( 'Must be entered correctly to run the instagram carousel.', 'razz' )
								),
								'limit'      => array(
									'type'       => 'slider',
									'value'      => 10,
									'properties' => array(
										'min'  => 6,
										'max'  => 50,
										'step' => 1
									),
									'label'      => esc_html__( 'Pictures count', 'razz' )
								)
							)
						),
						'show_borders' => false
					),
					'footer_widgets'      => array(
						'type'         => 'switch',
						'value'        => 'off',
						'label'        => esc_html__( 'Footer Widgets', 'razz' ),
						'right-choice' => array(
							'value' => 'on',
							'label' => esc_html__( 'Show', 'razz' )
						),
						'left-choice'  => array(
							'value' => 'off',
							'label' => esc_html__( 'Hide', 'razz' )
						),
					),
					'footer_rights_block' => array(
						'type'    => 'radio',
						'value'   => 'social',
						'label'   => esc_html__( 'Footer rights block', 'razz' ),
						'choices' => array(
							'navbar' => esc_html__( 'Footer Menu', 'razz' ),
							'social' => esc_html__( 'Social icons', 'razz' ),
							'off'    => esc_html__( 'Off', 'razz' )
						),
						'inline'  => true
					),
					'footer_rights'       => array(
						'type'          => 'textarea',
						'value'         => esc_html__( 'All rights reserved to', 'razz' ) . ' ' . esc_html( get_bloginfo( 'name' ) ),
						'label'         => esc_html__( 'Footer Copyrights', 'razz' ),
						'size'          => 'large',
						'editor_height' => 200
					)
				)
			)
		)
	)
);