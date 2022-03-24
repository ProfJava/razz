<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'customizations' => array(
		'title'   => esc_html__( 'Page Customizations', 'razz' ),
		'type'    => 'box',
		'options' => array(
			'meta-visibilty' => array(
				'type'    => 'tab',
				'title'   => esc_html__( 'Page Options', 'razz' ),
				'options' => array(
					'post_cover'     => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'picker'  => array(
							'control' => array(
								'type'         => 'switch',
								'value'        => 'off',
								'label'        => esc_html__( 'Page Cover', 'razz' ),
								'left-choice'  => array(
									'value' => 'off',
									'label' => esc_html__( 'Hide', 'razz' )
								),
								'right-choice' => array(
									'value' => 'on',
									'label' => esc_html__( 'Show', 'razz' )
								)
							)
						),
						'choices' => array(
							'on' => array(
								'photo' => array(
									'type'        => 'upload',
									'label'       => esc_html__( 'Upload Cover Photo', 'razz' ),
									'help'        => esc_html__( 'Minimum recommended size 1200px X 350px', 'razz' ),
									'desc'        => esc_html__( 'Upload cover photo with high resolution (1200px X 500px recommended as a minimum size) to display it as a background for the post title and meta', 'razz' ),
									'images_only' => true
								)
							)
						)
					),
					'single_sidebar' => array(
						'type'    => 'radio',
						'value'   => '',
						'label'   => esc_html__( 'Sidebar Position', 'razz' ),
						'desc'    => esc_html__( 'This option will override the sidebar position selected in theme options page for this post only.', 'razz' ),
						'choices' => array(
							''      => esc_html__( 'Do not Change', 'razz' ),
							'right' => esc_html__( 'Right Sidebar', 'razz' ),
							'left'  => esc_html__( 'Left Sidebar', 'razz' ),
							'none'  => esc_html__( 'Hide Sidebar', 'razz' )
						),
						'inline'  => true
					),
					'post_thumb'     => array(
						'type'         => 'switch',
						'value'        => 'on',
						'label'        => esc_html__( 'Featured image visibility', 'razz' ),
						'left-choice'  => array(
							'value' => 'off',
							'label' => esc_html__( 'Hide', 'razz' )
						),
						'right-choice' => array(
							'value' => 'on',
							'label' => esc_html__( 'Show', 'razz' )
						)
					),
					'top_banner'     => array(
						'type'         => 'switch',
						'value'        => 'on',
						'label'        => esc_html__( 'Top page banner', 'razz' ),
						'left-choice'  => array(
							'value' => 'off',
							'label' => esc_html__( 'Hide', 'razz' )
						),
						'right-choice' => array(
							'value' => 'on',
							'label' => esc_html__( 'Show', 'razz' )
						)
					),
					'bottom_banner'  => array(
						'type'         => 'switch',
						'value'        => 'on',
						'label'        => esc_html__( 'Bottom page banner', 'razz' ),
						'left-choice'  => array(
							'value' => 'off',
							'label' => esc_html__( 'Hide', 'razz' )
						),
						'right-choice' => array(
							'value' => 'on',
							'label' => esc_html__( 'Show', 'razz' )
						)
					),
					'date_meta'      => array(
						'type'         => 'switch',
						'value'        => 'on',
						'label'        => esc_html__( 'Date Meta', 'razz' ),
						'right-choice' => array(
							'value' => 'on',
							'label' => esc_html__( 'Show', 'razz' )
						),
						'left-choice'  => array(
							'value' => 'off',
							'label' => esc_html__( 'Hide', 'razz' )
						),
					),
					'views_meta'     => array(
						'type'         => 'switch',
						'value'        => 'on',
						'label'        => esc_html__( 'Views meta', 'razz' ),
						'right-choice' => array(
							'value' => 'on',
							'label' => esc_html__( 'Show', 'razz' )
						),
						'left-choice'  => array(
							'value' => 'off',
							'label' => esc_html__( 'Hide', 'razz' )
						),
					),
					'like_meta'      => array(
						'type'         => 'switch',
						'value'        => 'on',
						'label'        => esc_html__( 'Like meta', 'razz' ),
						'right-choice' => array(
							'value' => 'on',
							'label' => esc_html__( 'Show', 'razz' )
						),
						'left-choice'  => array(
							'value' => 'off',
							'label' => esc_html__( 'Hide', 'razz' )
						),
					),
					'author_name'    => array(
						'type'         => 'switch',
						'value'        => 'on',
						'label'        => esc_html__( 'Author name', 'razz' ),
						'right-choice' => array(
							'value' => 'on',
							'label' => esc_html__( 'Show', 'razz' )
						),
						'left-choice'  => array(
							'value' => 'off',
							'label' => esc_html__( 'Hide', 'razz' )
						),
					),
					'author_bio'     => array(
						'type'         => 'switch',
						'value'        => 'on',
						'label'        => esc_html__( 'Author Bio Box', 'razz' ),
						'right-choice' => array(
							'value' => 'on',
							'label' => esc_html__( 'Show', 'razz' )
						),
						'left-choice'  => array(
							'value' => 'off',
							'label' => esc_html__( 'Hide', 'razz' )
						),
					),
					'share_posts'    => array(
						'type'         => 'switch',
						'value'        => 'on',
						'label'        => esc_html__( 'Share buttons', 'razz' ),
						'right-choice' => array(
							'value' => 'on',
							'label' => esc_html__( 'Show', 'razz' )
						),
						'left-choice'  => array(
							'value' => 'off',
							'label' => esc_html__( 'Hide', 'razz' )
						),
					)
				)
			),
			'body_box'       => array(
				'title'   => esc_html__( 'Page Background', 'razz' ),
				'type'    => 'tab',
				'options' => array(
					'body_background' => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'picker'  => array(
							'control' => array(
								'label'        => esc_html__( 'Page Background', 'razz' ),
								'type'         => 'switch',
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
						'choices' => array(
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
									'value'    => '#f5f5f5'
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
						)
					)
				)
			)
		)
	)
);