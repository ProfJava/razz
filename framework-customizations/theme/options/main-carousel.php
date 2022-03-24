<?php
if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'main_carousel_settings' => array(
		'title'   => esc_html__( 'Carousel Settings', 'razz' ),
		'type'    => 'tab',
		'options' => array(
			'main_carousel_box' => array(
				'title'   => esc_html__( 'Carousel Settings', 'razz' ),
				'type'    => 'tab',
				'options' => array(
					'carousel_switch' => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'picker'  => array(
							'query_type' => array(
								'label'        => esc_html__( 'Show Carousel', 'razz' ),
								'type'         => 'switch',
								'left-choice'  => array(
									'value' => 'on',
									'label' => esc_html__( 'on', 'razz' ),
								),
								'right-choice' => array(
									'value' => 'off',
									'label' => esc_html__( 'off', 'razz' ),
								),
								'value'        => 'on'
							)
						),
						'choices' => array(
							'on' => array(
								'carousel_control' => array(
									'type'    => 'multi-picker',
									'label'   => false,
									'picker'  => array(
										// '<custom-key>' => option
										'query_type' => array(
											'label'   => esc_html__( 'Query Based On : ', 'razz' ),
											'type'    => 'radio',
											'value'   => 'trend',
											'choices' => array(
												'trend'    => esc_html__( 'Popular posts ( Top Commented )', 'razz' ),
												'likes'    => esc_html__( 'Most liked posts', 'razz' ),
												'views'    => esc_html__( 'Most viewed posts', 'razz' ),
												'category' => esc_html__( 'Selected categories', 'razz' ),
												'tag'      => esc_html__( 'Selected tags', 'razz' ),
												'author'   => esc_html__( 'Selected author', 'razz' ),
											),
											'inline'  => false
										)
									),
									'choices' => array(
										'category' => array(
											'cat_select' => array(
												'type'       => 'multi-select',
												'label'      => esc_html__( 'Select Categories', 'razz' ),
												'population' => 'taxonomy',
												'source'     => 'category'
											)
										),
										'tag'      => array(
											'tag_select' => array(
												'type'       => 'multi-select',
												'label'      => esc_html__( 'Select Tags', 'razz' ),
												'population' => 'taxonomy',
												'source'     => 'post_tag'
											)
										),
										'author'   => array(
											'author_select' => array(
												'type'        => 'select',
												'label'       => esc_html__( 'Select author', 'razz' ),
												'choices'     => razz_users(),
												'no-validate' => false,
											)
										)
									)
								),
								'posts_count'      => array(
									'type'       => 'slider',
									'value'      => 5,
									'properties' => array(
										'min'  => 2,
										'max'  => 15,
										'step' => 1, // Set slider step. Always > 0. Could be fractional.
									),
									'label'      => esc_html__( 'Slides Count', 'razz' )
								),
								'exclude'          => array(
									'type'        => 'multi-select',
									'label'       => esc_html__( 'Exclude Posts', 'razz' ),
									'population'  => 'posts',
									'source'      => 'post',
									'prepopulate' => 10,
									'limit'       => 200,
								)
							)
						),

					)
				)
			)
		)
	)
);
