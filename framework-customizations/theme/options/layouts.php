<?php
if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'layouts' => array(
		'title'   => esc_html__( 'Blog Settings', 'razz' ),
		'type'    => 'tab',
		'options' => array(
			'layout_settings'      => array(
				'title'   => esc_html__( 'General', 'razz' ),
				'type'    => 'tab',
				'options' => array(

					'sticky_nav'     => array(
						'type'         => 'switch',
						'value'        => 'off',
						'label'        => esc_html__( 'Sticky Navbar', 'razz' ),
						'help'         => esc_html__( 'Working on Desktop only', 'razz' ),
						'left-choice'  => array(
							'value' => 'off',
							'label' => esc_html__( 'off', 'razz' ),
						),
						'right-choice' => array(
							'value' => 'on',
							'label' => esc_html__( 'on', 'razz' ),
						),
					),
					'sticky_sidebar' => array(
						'type'         => 'switch',
						'value'        => 'on',
						'label'        => esc_html__( 'Sticky Sidebar', 'razz' ),
						'help'         => esc_html__( 'Working on Desktop only', 'razz' ),
						'left-choice'  => array(
							'value' => 'off',
							'label' => esc_html__( 'off', 'razz' ),
						),
						'right-choice' => array(
							'value' => 'on',
							'label' => esc_html__( 'on', 'razz' ),
						),
					),

					'blog_time'      => array(
						'type'         => 'switch',
						'value'        => 'ago',
						'label'        => esc_html__( 'Time format', 'razz' ),
						'left-choice'  => array(
							'value' => 'traditional',
							'label' => esc_html__( 'Traditional', 'razz' ),
						),
						'right-choice' => array(
							'value' => 'ago',
							'label' => esc_html__( 'Time ago', 'razz' ),
						),
					),
					'code_highlight' => array(
						'type'         => 'switch',
						'value'        => 'on',
						'label'        => esc_html__( 'Code highlighting system', 'razz' ),
						'left-choice'  => array(
							'value' => 'off',
							'label' => esc_html__( 'off', 'razz' ),
						),
						'right-choice' => array(
							'value' => 'on',
							'label' => esc_html__( 'on', 'razz' ),
						),
					),
//					'retina_support' => array(
//						'type'         => 'switch',
//						'value'        => 'on',
//						'label'        => esc_html__( 'Retina Support', 'razz' ),
//						'left-choice'  => array(
//							'value' => 'off',
//							'label' => esc_html__( 'Off', 'razz' ),
//						),
//						'right-choice' => array(
//							'value' => 'on',
//							'label' => esc_html__( 'On', 'razz' ),
//						),
//					),
					'scroll_top'     => array(
						'type'         => 'switch',
						'value'        => 'on',
						'label'        => esc_html__( 'Scroll to top button', 'razz' ),
						'left-choice'  => array(
							'value' => 'off',
							'label' => esc_html__( 'hide', 'razz' ),
						),
						'right-choice' => array(
							'value' => 'on',
							'label' => esc_html__( 'show', 'razz' )
						)
					),
					'read_more'      => array(
						'type'         => 'switch',
						'value'        => 'on',
						'label'        => esc_html__( 'Read On button', 'razz' ),
						'left-choice'  => array(
							'value' => 'off',
							'label' => esc_html__( 'hide', 'razz' ),
						),
						'right-choice' => array(
							'value' => 'on',
							'label' => esc_html__( 'show', 'razz' ),
						),
					)
				)
			),
			'site'                 => array(
				'title'   => esc_html__( 'Posts Settings', 'razz' ),
				'type'    => 'tab',
				'options' => array(
					'post_excerpt'        => array(
						'type'       => 'slider',
						'value'      => 40,
						'properties' => array(
							'min'  => 0,
							'max'  => 500,
							'step' => 5, // Set slider step. Always > 0. Could be fractional.
						),
						'label'      => esc_html__( 'Post excerpt length', 'razz' )
					),
					'pagination_style'    => array(
						'type'         => 'switch',
						'value'        => 'number',
						'label'        => esc_html__( 'Pagination Style', 'razz' ),
						'left-choice'  => array(
							'value' => 'text',
							'label' => esc_html__( 'Next & Prev', 'razz' ),
						),
						'right-choice' => array(
							'value' => 'number',
							'label' => esc_html__( 'Numbers (1,2,3)', 'razz' ),
						)
					),
					'general_date_meta'   => array(
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
						)
					),
					'general_views_meta'  => array(
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
						)
					),
					'general_like_meta'   => array(
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
						)
					)
				)
			),
			'home_layout_box'      => array(
				'title'   => esc_html__( 'Home', 'razz' ),
				'type'    => 'tab',
				'options' => array(
					'home_sidebar'     => array(
						'type'    => 'radio',
						'value'   => 'right_sidebar',
						'label'   => esc_html__( 'Sidebar Position', 'razz' ),
						'choices' => array( // Note: Avoid bool or int keys http://bit.ly/1cQgVzk
							'right_sidebar' => esc_html__( 'Right', 'razz' ),
							'left_sidebar'  => esc_html__( 'left', 'razz' ),
							'none'          => esc_html__( 'Hide Sidebar', 'razz' ),
						),
						// Display choices inline instead of list
						'inline'  => true,
					),
					'home_posts_style' => array(
						'type'    => 'radio',
						'value'   => 'blog',
						'label'   => esc_html__( 'Posts Style', 'razz' ),
						'desc'    => esc_html__( 'Choose the style of posts for home page', 'razz' ),
						'choices' => array(
							'blog'      => esc_html__( 'Classic Blog', 'razz' ),
							'blog-grid' => esc_html__( '1st full post then 2 column grid layout', 'razz' ),
							'grid'      => esc_html__( 'Grid layout', 'razz' ),
							'list'      => esc_html__( 'List layout', 'razz' ),
							'blog-list' => esc_html__( '1st full post then list layout', 'razz' ),
						),
					)
				)
			),
			'archive_page_layout'  => array(
				'title'   => esc_html__( 'Archive', 'razz' ),
				'type'    => 'tab',
				'options' => array(
					'archive_page_description' => array(
						'type'         => 'switch',
						'value'        => 'show',
						'label'        => esc_html__( 'Archive Description', 'razz' ),
						'right-choice' => array(
							'value' => 'show',
							'label' => esc_html__( 'Show', 'razz' )
						),
						'left-choice'  => array(
							'value' => 'hide',
							'label' => esc_html__( 'Hide', 'razz' )
						),
					),
					'archive_layout'           => array(
						'type'    => 'radio',
						'value'   => 'right_sidebar',
						'label'   => esc_html__( 'Sidebar Position', 'razz' ),
						'choices' => array( // Note: Avoid bool or int keys http://bit.ly/1cQgVzk
							'right_sidebar' => esc_html__( 'Right', 'razz' ),
							'left_sidebar'  => esc_html__( 'left', 'razz' ),
							'none'          => esc_html__( 'Hide Sidebar', 'razz' ),
						),
						// Display choices inline instead of list
						'inline'  => true,
					),
					'archive_posts_style'      => array(
						'type'    => 'radio',
						'value'   => 'blog',
						'label'   => esc_html__( 'Posts Style', 'razz' ),
						'desc'    => esc_html__( 'Choose the style of posts for archive page', 'razz' ),
						'choices' => array(
							'blog'      => esc_html__( 'Classic Blog', 'razz' ),
							'blog-grid' => esc_html__( '1st full post then 2 column grid layout', 'razz' ),
							'grid'      => esc_html__( 'Grid layout', 'razz' ),
							'list'      => esc_html__( 'List layout', 'razz' ),
							'blog-list' => esc_html__( '1st full post then list layout', 'razz' ),
						),
					),
				)
			),
			'category_page_layout' => array(
				'title'   => esc_html__( 'Category', 'razz' ),
				'type'    => 'tab',
				'options' => array(
					'category_page_description' => array(
						'type'         => 'switch',
						'value'        => 'show',
						'label'        => esc_html__( 'Category Description', 'razz' ),
						'right-choice' => array(
							'value' => 'show',
							'label' => esc_html__( 'Show', 'razz' )
						),
						'left-choice'  => array(
							'value' => 'hide',
							'label' => esc_html__( 'Hide', 'razz' )
						),
					),
					'category_layout'           => array(
						'type'    => 'radio',
						'value'   => 'right_sidebar',
						'label'   => esc_html__( 'Sidebar Position', 'razz' ),
						'choices' => array( // Note: Avoid bool or int keys http://bit.ly/1cQgVzk
							'right_sidebar' => esc_html__( 'Right', 'razz' ),
							'left_sidebar'  => esc_html__( 'left', 'razz' ),
							'none'          => esc_html__( 'Hide Sidebar', 'razz' ),
						),
						// Display choices inline instead of list
						'inline'  => true,
					),
					'category_posts_style'      => array(
						'type'    => 'radio',
						'value'   => 'blog',
						'label'   => esc_html__( 'Posts Style', 'razz' ),
						'desc'    => esc_html__( 'Choose the style of posts for Category page', 'razz' ),
						'choices' => array(
							'blog'      => esc_html__( 'Classic Blog', 'razz' ),
							'blog-grid' => esc_html__( '1st full post then 2 column grid layout', 'razz' ),
							'grid'      => esc_html__( 'Grid layout', 'razz' ),
							'list'      => esc_html__( 'List layout', 'razz' ),
							'blog-list' => esc_html__( '1st full post then list layout', 'razz' ),
						),
					),
					'category_separate'         => array(
						'type'  => 'checkbox',
						'value' => false,
						'label' => esc_html__( 'Separate Layout', 'razz' ),
						'desc'  => esc_html__( 'Control each category posts layout separately, if checked go to category edit page to set the posts style for each category', 'razz' )
					)
				)
			),
			'tag_page_layout'      => array(
				'title'   => esc_html__( 'Tag', 'razz' ),
				'type'    => 'tab',
				'options' => array(
					'tags_page_description' => array(
						'type'         => 'switch',
						'value'        => 'show',
						'label'        => esc_html__( 'Tag Description', 'razz' ),
						'right-choice' => array(
							'value' => 'show',
							'label' => esc_html__( 'Show', 'razz' )
						),
						'left-choice'  => array(
							'value' => 'hide',
							'label' => esc_html__( 'Hide', 'razz' )
						),
					),
					'tags_layout'           => array(
						'type'    => 'radio',
						'value'   => 'right_sidebar',
						'label'   => esc_html__( 'Sidebar Position', 'razz' ),
						'choices' => array( // Note: Avoid bool or int keys http://bit.ly/1cQgVzk
							'right_sidebar' => esc_html__( 'Right', 'razz' ),
							'left_sidebar'  => esc_html__( 'left', 'razz' ),
							'none'          => esc_html__( 'Hide Sidebar', 'razz' ),
						),
						// Display choices inline instead of list
						'inline'  => true,
					),
					'tags_posts_style'      => array(
						'type'    => 'radio',
						'value'   => 'blog',
						'label'   => esc_html__( 'Posts Style', 'razz' ),
						'desc'    => esc_html__( 'Choose the style of posts for Tag page', 'razz' ),
						'choices' => array(
							'blog'      => esc_html__( 'Classic Blog', 'razz' ),
							'blog-grid' => esc_html__( '1st full post then 2 column grid layout', 'razz' ),
							'grid'      => esc_html__( 'Grid layout', 'razz' ),
							'list'      => esc_html__( 'List layout', 'razz' ),
							'blog-list' => esc_html__( '1st full post then list layout', 'razz' ),
						),
					),
					'tag_separate'          => array(
						'type'  => 'checkbox',
						'value' => false,
						'label' => esc_html__( 'Separate Layout', 'razz' ),
						'desc'  => esc_html__( 'Control each tag posts layout separately, if checked go to tag edit page to set the posts style for each tag', 'razz' )
					)
				)
			),
			'author_page_layout'   => array(
				'title'   => esc_html__( 'Author', 'razz' ),
				'type'    => 'tab',
				'options' => array(
					'author_bio'         => array(
						'type'         => 'switch',
						'value'        => 'show',
						'label'        => esc_html__( 'Author Bio', 'razz' ),
						'right-choice' => array(
							'value' => 'show',
							'label' => esc_html__( 'Show', 'razz' )
						),
						'left-choice'  => array(
							'value' => 'hide',
							'label' => esc_html__( 'Hide', 'razz' )
						),
					),
					'author_layout'      => array(
						'type'    => 'radio',
						'value'   => 'right_sidebar',
						'label'   => esc_html__( 'Sidebar Position', 'razz' ),
						'choices' => array( // Note: Avoid bool or int keys http://bit.ly/1cQgVzk
							'right_sidebar' => esc_html__( 'Right', 'razz' ),
							'left_sidebar'  => esc_html__( 'left', 'razz' ),
							'none'          => esc_html__( 'Hide Sidebar', 'razz' ),
						),
						// Display choices inline instead of list
						'inline'  => true,
					),
					'author_posts_style' => array(
						'type'    => 'radio',
						'value'   => 'blog',
						'label'   => esc_html__( 'Posts Style', 'razz' ),
						'desc'    => esc_html__( 'Choose the style of posts for author page', 'razz' ),
						'choices' => array(
							'blog'      => esc_html__( 'Classic Blog', 'razz' ),
							'blog-grid' => esc_html__( '1st full post then 2 column grid layout', 'razz' ),
							'grid'      => esc_html__( 'Grid layout', 'razz' ),
							'list'      => esc_html__( 'List layout', 'razz' ),
							'blog-list' => esc_html__( '1st full post then list layout', 'razz' ),
						),
					)
				)
			),
			'search_page_layout'   => array(
				'title'   => esc_html__( 'Search', 'razz' ),
				'type'    => 'tab',
				'options' => array(
					'search_exclude'     => array(
						'type'         => 'switch',
						'value'        => 'no',
						'label'        => esc_html__( 'Exclude Pages from results', 'razz' ),
						'right-choice' => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'razz' )
						),
						'left-choice'  => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'razz' )
						),
					),
					'search_layout'      => array(
						'type'    => 'radio',
						'value'   => 'right_sidebar',
						'label'   => esc_html__( 'Sidebar Position', 'razz' ),
						'choices' => array( // Note: Avoid bool or int keys http://bit.ly/1cQgVzk
							'right_sidebar' => esc_html__( 'Right', 'razz' ),
							'left_sidebar'  => esc_html__( 'left', 'razz' ),
							'none'          => esc_html__( 'Hide Sidebar', 'razz' ),
						),
						// Display choices inline instead of list
						'inline'  => true,
					),
					'search_posts_style' => array(
						'type'    => 'radio',
						'value'   => 'blog',
						'label'   => esc_html__( 'Posts Style', 'razz' ),
						'desc'    => esc_html__( 'Choose the style of posts for search page', 'razz' ),
						'choices' => array(
							'blog'      => esc_html__( 'Classic Blog', 'razz' ),
							'blog-grid' => esc_html__( '1st full post then 2 column grid layout', 'razz' ),
							'grid'      => esc_html__( 'Grid layout', 'razz' ),
							'list'      => esc_html__( 'List layout', 'razz' ),
							'blog-list' => esc_html__( '1st full post then list layout', 'razz' ),
						),
					)
				)
			),
			'error_page_layout'    => array(
				'title'   => esc_html__( 'Error 404 Page', 'razz' ),
				'type'    => 'tab',
				'options' => array(
					'error_logo_style' => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'desc'    => false,
						'value'   => array(
							'control' => 'text',
							'text'    => array(
								'error_text' => '404!'
							)
						),
						'picker'  => array(
							'control' => array(
								'type'         => 'switch',
								'value'        => 'text',
								'label'        => esc_html__( 'Logo type', 'razz' ),
								'left-choice'  => array(
									'value' => 'logo',
									'label' => esc_html__( 'Image', 'razz' ),
								),
								'right-choice' => array(
									'value' => 'text',
									'label' => esc_html__( 'Text', 'razz' ),
								),
							)
						),
						'choices' => array(
							'logo' => array(
								'error_image' => array(
									'type'        => 'upload',
									'label'       => esc_html__( 'Error logo', 'razz' ),
									'images_only' => true
								)
							),
							'text' => array(
								'error_text' => array(
									'type'  => 'text',
									'label' => esc_html__( 'Error text', 'razz' ),
								)
							),
						)
					),
					'error_message'    => array(
						'type'  => 'textarea',
						'value' => esc_html__( 'Sorry!.. the page you are trying to reach may be deleted or moved.', 'razz' ),
						'label' => esc_html__( 'Error Message', 'razz' )
					),
					'error_search'     => array(
						'type'         => 'switch',
						'value'        => 'on',
						'label'        => esc_html__( 'Search form', 'razz' ),
						'left-choice'  => array(
							'value' => 'off',
							'label' => esc_html__( 'Hide', 'razz' ),
						),
						'right-choice' => array(
							'value' => 'on',
							'label' => esc_html__( 'Show', 'razz' ),
						),
					),
					'error_sidebar'    => array(
						'type'    => 'radio',
						'value'   => 'right_sidebar',
						'label'   => esc_html__( 'Sidebar Position', 'razz' ),
						'choices' => array( // Note: Avoid bool or int keys http://bit.ly/1cQgVzk
							'right_sidebar' => esc_html__( 'Right', 'razz' ),
							'left_sidebar'  => esc_html__( 'left', 'razz' ),
							'none'          => esc_html__( 'Hide Sidebar', 'razz' ),
						),
						// Display choices inline instead of list
						'inline'  => true,
					),
				)
			)
		)
	)

);
