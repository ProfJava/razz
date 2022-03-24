<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}


$options = array(
	'banners' => array(
		'title'   => esc_html__( 'Advertisements', 'razz' ),
		'type'    => 'tab',
		'options' => array(
			'banners-box1' => array(
				'title'   => esc_html__( 'Header Banner', 'razz' ),
				'type'    => 'tab',
				'options' => array(
					'banner_box1' => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'picker'  => array(
							'gadget' => array(
								'label'   => esc_html__( 'AD Type', 'razz' ),
								'type'    => 'radio',
								'choices' => array(
									'image' => esc_html__( 'Image AD', 'razz' ),
									'code'  => esc_html__( 'Custom Code', 'razz' ),
									'off'   => esc_html__( 'Off', 'razz' ),
								),
								'inline'  => true,
								'value'   => 'off'
							)
						),
						'choices' => array(
							'image' => array(
								'img'    => array(
									'type'        => 'upload',
									'label'       => esc_html__( 'Image banner', 'razz' ),
									'images_only' => true
								),
								'url'    => array(
									'type'  => 'text',
									'label' => esc_html__( 'Banner url', 'razz' ),
								),
								'alt'    => array(
									'type'  => 'text',
									'label' => esc_html__( 'Alternative Text For The image', 'razz' ),
								),
								'tab'    => array(
									'type'  => 'checkbox',
									'value' => true,
									'label' => esc_html__( 'Open url in new tab', 'razz' )
								),
								'follow' => array(
									'type'  => 'checkbox',
									'value' => false,
									'label' => esc_html__( 'No follow', 'razz' )
								),
							),
							'code'  => array(
								'code_block' => array(
									'type'  => 'textarea',
									'label' => esc_html__( 'Custom Ad Code', 'razz' ),
									'desc'  => esc_html__( 'Supports: HTML, Javascript, Text and Shortcodes.', 'razz' )
								)
							)
						)
					)
				)
			),
			'banners-box2' => array(
				'title'   => esc_html__( 'Footer Banner', 'razz' ),
				'type'    => 'tab',
				'options' => array(
					'banner_box2' => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'picker'  => array(
							'gadget' => array(
								'label'   => esc_html__( 'AD Type', 'razz' ),
								'type'    => 'radio',
								'choices' => array(
									'image' => esc_html__( 'Image AD', 'razz' ),
									'code'  => esc_html__( 'Custom Code', 'razz' ),
									'off'   => esc_html__( 'Off', 'razz' ),
								),
								'inline'  => true,
								'value'   => 'off'
							)
						),
						'choices' => array(
							'image' => array(
								'img'    => array(
									'type'        => 'upload',
									'label'       => esc_html__( 'Image banner', 'razz' ),
									'images_only' => true
								),
								'url'    => array(
									'type'  => 'text',
									'label' => esc_html__( 'Banner url', 'razz' ),
								),
								'alt'    => array(
									'type'  => 'text',
									'label' => esc_html__( 'Alternative Text For The image', 'razz' ),
								),
								'tab'    => array(
									'type'  => 'checkbox',
									'value' => true,
									'label' => esc_html__( 'Open url in new tab', 'razz' )
								),
								'follow' => array(
									'type'  => 'checkbox',
									'value' => false,
									'label' => esc_html__( 'No follow', 'razz' )
								),
							),
							'code'  => array(
								'code_block' => array(
									'type'  => 'textarea',
									'label' => esc_html__( 'Custom Ad Code', 'razz' ),
									'desc'  => esc_html__( 'Supports: HTML, Javascript, Text and Shortcodes.', 'razz' )
								)
							)
						)
					)
				)
			),
			'banners-box3' => array(
				'title'   => esc_html__( 'Above article Banner', 'razz' ),
				'type'    => 'tab',
				'options' => array(
					'banner_box3' => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'picker'  => array(
							'gadget' => array(
								'label'   => esc_html__( 'AD Type', 'razz' ),
								'type'    => 'radio',
								'choices' => array(
									'image' => esc_html__( 'Image AD', 'razz' ),
									'code'  => esc_html__( 'Custom Code', 'razz' ),
									'off'   => esc_html__( 'Off', 'razz' ),
								),
								'inline'  => true,
								'value'   => 'off'
							)
						),
						'choices' => array(
							'image' => array(
								'img'    => array(
									'type'        => 'upload',
									'label'       => esc_html__( 'Image banner', 'razz' ),
									'images_only' => true
								),
								'url'    => array(
									'type'  => 'text',
									'label' => esc_html__( 'Banner url', 'razz' ),
								),
								'alt'    => array(
									'type'  => 'text',
									'label' => esc_html__( 'Alternative Text For The image', 'razz' ),
								),
								'tab'    => array(
									'type'  => 'checkbox',
									'value' => true,
									'label' => esc_html__( 'Open url in new tab', 'razz' )
								),
								'follow' => array(
									'type'  => 'checkbox',
									'value' => false,
									'label' => esc_html__( 'No follow', 'razz' )
								),
							),
							'code'  => array(
								'code_block' => array(
									'type'  => 'textarea',
									'label' => esc_html__( 'Custom Ad Code', 'razz' ),
									'desc'  => esc_html__( 'Supports: HTML, Javascript, Text and Shortcodes.', 'razz' )
								)
							)
						)
					)
				)
			),
			'banners-box4' => array(
				'title'   => esc_html__( 'Below Article Banner', 'razz' ),
				'type'    => 'tab',
				'options' => array(
					'banner_box4' => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'picker'  => array(
							'gadget' => array(
								'label'   => esc_html__( 'AD Type', 'razz' ),
								'type'    => 'radio',
								'choices' => array(
									'image' => esc_html__( 'Image AD', 'razz' ),
									'code'  => esc_html__( 'Custom Code', 'razz' ),
									'off'   => esc_html__( 'Off', 'razz' ),
								),
								'inline'  => true,
								'value'   => 'off'
							)
						),
						'choices' => array(
							'image' => array(
								'img'    => array(
									'type'        => 'upload',
									'label'       => esc_html__( 'Image banner', 'razz' ),
									'images_only' => true
								),
								'url'    => array(
									'type'  => 'text',
									'label' => esc_html__( 'Banner url', 'razz' ),
								),
								'alt'    => array(
									'type'  => 'text',
									'label' => esc_html__( 'Alternative Text For The image', 'razz' ),
								),
								'tab'    => array(
									'type'  => 'checkbox',
									'value' => true,
									'label' => esc_html__( 'Open url in new tab', 'razz' )
								),
								'follow' => array(
									'type'  => 'checkbox',
									'value' => false,
									'label' => esc_html__( 'No follow', 'razz' )
								),
							),
							'code'  => array(
								'code_block' => array(
									'type'  => 'textarea',
									'label' => esc_html__( 'Custom Ad Code', 'razz' ),
									'desc'  => esc_html__( 'Supports: HTML, Javascript, Text and Shortcodes.', 'razz' )
								)
							)
						)
					)
				)
			)
		)
	)
);