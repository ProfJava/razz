<?php
if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'header_settings' => array(
		'title'   => esc_html__( 'Header Settings', 'razz' ),
		'type'    => 'tab',
		'options' => array(
			'style'    => array(
				'title'   => esc_html__( 'Header Settings', 'razz' ),
				'type'    => 'tab',
				'options' => array(
					'social_header'  => array(
						'type'         => 'switch',
						'value'        => 'on',
						'label'        => esc_html__( 'Show social icons in header', 'razz' ),
						'desc'         => esc_html__( 'Must add social links in social media tab', 'razz' ),
						'right-choice' => array(
							'value' => 'on',
							'label' => esc_html__( 'Show', 'razz' )
						),
						'left-choice'  => array(
							'value' => 'off',
							'label' => esc_html__( 'Hide', 'razz' )
						),
					),
					'search_header'  => array(
						'type'         => 'switch',
						'value'        => 'on',
						'label'        => esc_html__( 'Show search bar in header', 'razz' ),
						'right-choice' => array(
							'value' => 'on',
							'label' => esc_html__( 'Show', 'razz' )
						),
						'left-choice'  => array(
							'value' => 'off',
							'label' => esc_html__( 'Hide', 'razz' )
						),
					),
					'header_spacing' => array(
						'type'          => 'multi',
						'label'         => false,
						'inner-options' => array(
							'padding_top'    => array(
								'label' => esc_html__( 'Padding top', 'razz' ),
								'desc'  => esc_html__( 'Enter numbers only, Value will be in pixels. (70 = 70px)', 'razz' ),
								'attr'  => array(
									'placeholder' => esc_html__( '70', 'razz' ),
								),
								'type'  => 'text'
							),
							'padding_bottom' => array(
								'label' => esc_html__( 'Padding bottom', 'razz' ),
								'desc'  => esc_html__( 'Enter numbers only, Value will be in pixels. (70 = 70px)', 'razz' ),
								'attr'  => array(
									'placeholder' => esc_html__( '70', 'razz' ),
								),
								'type'  => 'text'
							)
						)
					)
				)
			),
			'logo_box' => array(
				'title'   => esc_html__( 'Logo Settings', 'razz' ),
				'type'    => 'tab',
				'options' => array(
					'site_logo'       => array(
						'type'         => 'multi-picker',
						'label'        => false,
						'picker'       => array(
							'gadget' => array(
								'label'   => esc_html__( 'Site Logo', 'razz' ),
								'type'    => 'radio', // or 'short-select'
								'inline'  => true,
								'choices' => array(
									'tagline' => esc_html__( 'Site title and tag line', 'razz' ),
									'logo'    => esc_html__( 'Upload logo', 'razz' )
								)
							)
						),
						'choices'      => array(
							'logo'    => array(
								'logo_select'   => array(
									'type'        => 'upload',
									'label'       => esc_html__( 'Upload logo', 'razz' ),
									'desc'        => esc_html__( 'Recommended size (MAX) : 250px x 70px', 'razz' ),
									'images_only' => true
								),
								'retina_select' => array(
									'type'        => 'upload',
									'label'       => esc_html__( 'Logo Image (Retina Version @2x)', 'razz' ),
									'desc'        => esc_html__( 'Choose an image file for the retina version of the logo. It should be double the size of main logo.', 'razz' ),
									'images_only' => true
								),
								'center_logo'   => array(
									'type'  => 'checkbox',
									'value' => true,
									'label' => esc_html__( 'Center logo', 'razz' )
								)
							),
							'tagline' => array(
								'center_text'     => array(
									'type'  => 'checkbox',
									'value' => true,
									'label' => esc_html__( 'Center site title text', 'razz' )
								),
								'tagline_display' => array(
									'type'         => 'switch',
									'value'        => 'off',
									'label'        => esc_html__( 'Tag line Display', 'razz' ),
									'right-choice' => array(
										'value' => 'on',
										'label' => esc_html__( 'Show', 'razz' )
									),
									'left-choice'  => array(
										'value' => 'off',
										'label' => esc_html__( 'Hide', 'razz' )
									)
								),
							)
						),
						'show_borders' => false
					),
					'logo_margin_top' => array(
						'label' => esc_html__( 'Logo margin top', 'razz' ),
						'type'  => 'text',
						'desc'  => esc_html__( 'Enter numbers only, Value will be in pixels. (10 = 10px)', 'razz' )
					)
				)
			)
		)
	)
);
