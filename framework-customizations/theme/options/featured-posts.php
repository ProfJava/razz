<?php
if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'featured_settings' => array(
		'title'   => esc_html__( 'Featured Posts', 'razz' ),
		'type'    => 'tab',
		'options' => array(
			'top_posts' => array(
				'title'   => esc_html__( 'Posts Below Carousel', 'razz' ),
				'type'    => 'tab',
				'options' => array(
					'top_posts_switch' => array(
						'type'         => 'multi-picker',
						'label'        => false,
						'picker'       => array(
							'control' => array(
								'type'         => 'switch',
								'value'        => 'off',
								'desc'         => esc_html__( 'Enable or disable this featured posts box', 'razz' ),
								'label'        => esc_html__( 'Show featured posts', 'razz' ),
								'left-choice'  => array(
									'value' => 'off',
									'label' => esc_html__( 'off', 'razz' ),
								),
								'right-choice' => array(
									'value' => 'on',
									'label' => esc_html__( 'on', 'razz' ),
								),
							)
						),
						'choices'      => array(
							'on' => array(
								'top_featured_title' => array(
									'type'    => 'text',
									'label'   => esc_html__( 'Title', 'razz' ),
									'desc'   => esc_html__( 'HTML Not allowed', 'razz' ),
								),
								'top_posts_query' => array(
									'type'    => 'multi-picker',
									'label'   => false,
									'picker'  => array(
										'type' => array(
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
										),
									),
								),
								'posts_count'     => array(
									'type'       => 'slider',
									'value'      => 10,
									'properties' => array(
										'min'  => 7,
										'max'  => 40,
										'step' => 1,
									),
									'label'      => esc_html__( 'Posts count', 'razz' ),
								),
								'visible_mobile'  => array(
									'type'         => 'switch',
									'value'        => 'on',
									'label'        => esc_html__( 'Show on Mobile Devices', 'razz' ),
									'left-choice'  => array(
										'value' => 'off',
										'label' => esc_html__( 'no', 'razz' ),
									),
									'right-choice' => array(
										'value' => 'on',
										'label' => esc_html__( 'yes', 'razz' ),
									),
								)
							)
						),
						'show_borders' => false
					)
				)
			)
		)
	)
);