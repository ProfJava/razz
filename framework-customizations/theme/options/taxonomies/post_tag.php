<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

if ( razz_get_setting( 'tag_separate' ) ) {
	$options['banners'] = array(
		'title'   => esc_html__( 'Tag Posts Layout', 'razz' ),
		'type'    => 'box',
		'options' => array(
			'tag_posts_layout' => array(
				'type'    => 'radio',
				'value'   => 'blog',
				'label'   => esc_html__( 'Posts Style', 'razz' ),
				'desc'    => esc_html__( 'Choose the style of posts for this category', 'razz' ),
				'choices' => array(
					'blog'      => esc_html__( 'Classic Blog', 'razz' ),
					'blog-grid' => esc_html__( '1st full post then 2 column grid layout', 'razz' ),
					'grid'      => esc_html__( 'Grid layout', 'razz' ),
					'list'      => esc_html__( 'List layout', 'razz' ),
					'blog-list' => esc_html__( '1st full post then list layout', 'razz' )
				)
			)
		)
	);
}

$options['body_box'] = array(
	'title'   => esc_html__( 'Tag Background', 'razz' ),
	'type'    => 'box',
	'options' => array(
		'body_background' => array(
			'type'    => 'multi-picker',
			'label'   => false,
			'picker'  => array(
				'control' => array(
					'label'        => esc_html__( 'Tag Background', 'razz' ),
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
);