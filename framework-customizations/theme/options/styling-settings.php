<?php
if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'styling_settings' => array(
		'title'   => esc_html__( 'Styling', 'razz' ),
		'type'    => 'tab',
		'options' => array(
			'colors_box' => array(
				'title'   => esc_html__( 'General', 'razz' ),
				'type'    => 'tab',
				'options' => array(
					'accent_color'             => array(
						'type'     => 'color-picker',
						'label'    => esc_html__( 'Accent Color', 'razz' ),
						'value'    => '#acbfd7'
					),
					'scroll_color'             => array(
						'type'     => 'color-picker',
						'label'    => esc_html__( 'Scroll to top Color', 'razz' ),
						'value'    => '#ffffff'
					),
					'favicon'                  => array(
						'type'        => 'upload',
						'label'       => esc_html__( 'Website Favicon', 'razz' ),
						'images_only' => true
					),
					'apple57'                  => array(
						'type'        => 'upload',
						'label'       => esc_html__( 'Apple icon : 57px X 57px', 'razz' ),
						'desc'        => esc_html__( 'Select image with height: 57px and width:57px for apple devices', 'razz' ),
						'images_only' => true
					),
					'apple72'                  => array(
						'type'        => 'upload',
						'label'       => esc_html__( 'Apple icon : 72px X 72px', 'razz' ),
						'desc'        => esc_html__( 'Select image with height: 72px and width:72px for apple devices', 'razz' ),
						'images_only' => true
					),
					'apple114'                 => array(
						'type'        => 'upload',
						'label'       => esc_html__( 'Apple icon : 114px X 114px', 'razz' ),
						'desc'        => esc_html__( 'Select image with height: 114px and width:114px for apple devices', 'razz' ),
						'images_only' => true
					)
				)
			),
			'body_box'   => array(
				'title'   => esc_html__( 'Body', 'razz' ),
				'type'    => 'tab',
				'options' => array(
					'body_background' => array(
						'type'         => 'multi-picker',
						'label'        => false,
						'picker'       => array(
							// '<custom-key>' => option
							'control' => array(
								'label'        => esc_html__( 'Body Background', 'razz' ),
								'type'         => 'switch', // or 'short-select'
								'inline'       => true,
								'value'        => 'off',
								'left-choice'  => array(
									'value' => 'off',
									'label' => esc_html__( 'Off', 'razz' ),
								),
								'right-choice' => array(
									'value' => 'background',
									'label' => esc_html__( 'Background', 'razz' ),
								),
							)
						),
						'choices'      => array(
							'background' => array(
								'color_select' => array(
									'type'     => 'color-picker',
									'palettes' => array(
										'#ba4e4e',
										'#0ce9ed',
										'#1082bb',
										'#9610bb',
										'#ebbb2d',
										'#941940'
									),
									'label'    => esc_html__( 'Background Color', 'razz' ),
									'value'    => '#f8f8f8'
								),
								'image_select' => array(
									'type'        => 'upload',
									'label'       => esc_html__( 'Background image', 'razz' ),
									'images_only' => true
								),
								'bg_repeat'    => array(
									'type'    => 'select',
									'value'   => 'choice-3',
									'label'   => esc_html__( 'Background Repeat', 'razz' ),
									'choices' => array(
										''          => '',
										'no-repeat' => esc_html__( 'No Repeat', 'razz' ),
										'repeat'    => esc_html__( 'Repeat', 'razz' ),
										'repeat-x'  => esc_html__( 'Repeat X', 'razz' ),
										'repeat-y'  => esc_html__( 'Repeat Y', 'razz' )
									)
								),
								'bg_size'      => array(
									'type'    => 'select',
									'value'   => 'choice-3',
									'label'   => esc_html__( 'Background Size', 'razz' ),
									'choices' => array(
										''        => esc_html__( 'None', 'razz' ),
										'cover'   => esc_html__( 'Cover', 'razz' ),
										'contain' => esc_html__( 'contain', 'razz' )

									)
								),
								'bg_attach'    => array(
									'type'    => 'select',
									'value'   => 'choice-3',
									'label'   => esc_html__( 'Background Attachment', 'razz' ),
									'choices' => array(
										''       => esc_html__( 'None', 'razz' ),
										'fixed'  => esc_html__( 'Fixed', 'razz' ),
										'scroll' => esc_html__( 'Scroll', 'razz' ),
										'local'  => esc_html__( 'Local', 'razz' )
									)
								),
								'bg_position'  => array(
									'type'    => 'select',
									'value'   => 'choice-3',
									'label'   => esc_html__( 'Background Position', 'razz' ),
									'choices' => array(
										''              => esc_html__( 'None', 'razz' ),
										'left top'      => esc_html__( 'Left top', 'razz' ),
										'left center'   => esc_html__( 'Left center', 'razz' ),
										'left bottom'   => esc_html__( 'Left bottom', 'razz' ),
										'right top'     => esc_html__( 'Right top', 'razz' ),
										'right center'  => esc_html__( 'Right center', 'razz' ),
										'right bottom'  => esc_html__( 'Right bottom', 'razz' ),
										'center top'    => esc_html__( 'Center top', 'razz' ),
										'center center' => esc_html__( 'Center center', 'razz' ),
										'center bottom' => esc_html__( 'Center bottom', 'razz' )
									)
								)
							)
						),
						'show_borders' => false
					)
				)
			),
		)
	)
);
