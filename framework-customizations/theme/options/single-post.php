<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}


$options = array(
	'single' => array(
		'title'   => esc_html__( 'Post Settings', 'razz' ),
		'type'    => 'tab',
		'options' => array(
			'single-box'  => array(
				'title'   => esc_html__( 'Post Settings', 'razz' ),
				'type'    => 'tab',
				'options' => array(
					'single_sidebar'  => array(
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
					'date_meta'       => array(
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
					'categories_meta' => array(
						'type'         => 'switch',
						'value'        => 'on',
						'label'        => esc_html__( 'Categories meta', 'razz' ),
						'right-choice' => array(
							'value' => 'on',
							'label' => esc_html__( 'Show', 'razz' )
						),
						'left-choice'  => array(
							'value' => 'off',
							'label' => esc_html__( 'Hide', 'razz' )
						),
					),
					'tags_meta'       => array(
						'type'         => 'switch',
						'value'        => 'on',
						'label'        => esc_html__( 'Tags meta', 'razz' ),
						'right-choice' => array(
							'value' => 'on',
							'label' => esc_html__( 'Show', 'razz' )
						),
						'left-choice'  => array(
							'value' => 'off',
							'label' => esc_html__( 'Hide', 'razz' )
						),
					),
					'views_meta'      => array(
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
					'like_meta'       => array(
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
					'author_name'     => array(
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
					'author_bio_box'  => array(
						'type'         => 'switch',
						'value'        => 'on',
						'label'        => esc_html__( 'Author bio', 'razz' ),
						'right-choice' => array(
							'value' => 'on',
							'label' => esc_html__( 'Show', 'razz' )
						),
						'left-choice'  => array(
							'value' => 'off',
							'label' => esc_html__( 'Hide', 'razz' )
						),
					),
					'nxt_prv_posts'   => array(
						'type'         => 'switch',
						'value'        => 'on',
						'label'        => esc_html__( 'Next and prev posts', 'razz' ),
						'right-choice' => array(
							'value' => 'on',
							'label' => esc_html__( 'Show', 'razz' )
						),
						'left-choice'  => array(
							'value' => 'off',
							'label' => esc_html__( 'Hide', 'razz' )
						),
					),
					'share_posts'     => array(
						'type'         => 'switch',
						'value'        => 'on',
						'label'        => esc_html__( 'Share buttons on posts', 'razz' ),
						'right-choice' => array(
							'value' => 'on',
							'label' => esc_html__( 'Show', 'razz' )
						),
						'left-choice'  => array(
							'value' => 'off',
							'label' => esc_html__( 'Hide', 'razz' )
						),
					),
					'share_pages'     => array(
						'type'         => 'switch',
						'value'        => 'on',
						'label'        => esc_html__( 'Share buttons on pages', 'razz' ),
						'right-choice' => array(
							'value' => 'on',
							'label' => esc_html__( 'Show', 'razz' )
						),
						'left-choice'  => array(
							'value' => 'off',
							'label' => esc_html__( 'Hide', 'razz' )
						),
					),
					'comments_system' => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'picker'  => array(
							'control' => array(
								'type'    => 'radio',
								'label'   => esc_html__( 'Comments system', 'razz' ),
								'value'   => 'traditional',
								'choices' => array( // Note: Avoid bool or int keys http://bit.ly/1cQgVzk
									'traditional' => esc_html__( 'Default Comments', 'razz' ),
									'disqus'      => esc_html__( 'Disqus Comments', 'razz' ),
									'facebook'    => esc_html__( 'Facebook Comments', 'razz' ),
								),
							)
						),
						'choices' => array(
							'disqus'   => array(
								'id' => array(
									'type'  => 'text',
									'label' => esc_html__( 'Disqus short name', 'razz' ),
									'desc'  => esc_attr__( 'Create a disqus account and get the short name here ', 'razz' ) . '<a target="_blank" href="https://disqus.com/profile/signup">' . esc_html__( 'DISQUS', 'razz' ) . '</a>'
								)
							),
							'facebook' => array(
								'app_id' => array(
									'type'  => 'text',
									'label' => esc_html__( 'Facebook App ID', 'razz' ),
									'help'  => esc_html__( 'Optional', 'razz' ),
									'desc'  => esc_html__( 'Create a facebook application and get the app id to be able to moderate the comments', 'razz' ) . ' <a target="_blank" href="https://developers.facebook.com/apps/">' . esc_html__( ' Facebook Apps', 'razz' ) . '</a>'
								),
								'count'  => array(
									'type'       => 'slider',
									'value'      => 6,
									'properties' => array(
										'min'  => 5,
										'max'  => 30,
										'step' => 1,
									),
									'label'      => esc_html__( 'Visible comments count', 'razz' ),
								),
								'lang'   => array(
									'type'    => 'select',
									'value'   => 'en_US',
									'label'   => esc_html__( 'Language', 'razz' ),
									'choices' => array(
										'en_US' => esc_html__( 'English (US)', 'razz' ),
										'ar_AR' => esc_html__( 'Arabic', 'razz' ),
										'da_DK' => esc_html__( 'Danish', 'razz' ),
										'de_DE' => esc_html__( 'German', 'razz' ),
										'en_GB' => esc_html__( 'English (UK)', 'razz' ),
										'el_GR' => esc_html__( 'Greek', 'razz' ),
										'es_MX' => esc_html__( 'Spanish (Mexico)', 'razz' ),
										'es_ES' => esc_html__( 'Spanish', 'razz' ),
										'fr_FR' => esc_html__( 'French', 'razz' ),
										'fa_IR' => esc_html__( 'Persian', 'razz' ),
										'hi_IN' => esc_html__( 'Hindi', 'razz' ),
										'id_ID' => esc_html__( 'Indonesian', 'razz' ),
										'is_IS' => esc_html__( 'Icelandic', 'razz' ),
										'it_IT' => esc_html__( 'Italian', 'razz' ),
										'ja_JP' => esc_html__( 'Japanese', 'razz' ),
										'ka_GE' => esc_html__( 'Georgian', 'razz' ),
										'ko_KR' => esc_html__( 'Korean', 'razz' ),
										'la_VA' => esc_html__( 'Latin', 'razz' ),
										'ms_MY' => esc_html__( 'Malay', 'razz' ),
										'nb_NO' => esc_html__( 'Norwegian', 'razz' ),
										'ne_NP' => esc_html__( 'Nepali', 'razz' ),
										'nl_NL' => esc_html__( 'Dutch', 'razz' ),
										'pl_PL' => esc_html__( 'Polish', 'razz' ),
										'pt_BR' => esc_html__( 'Portuguese (Brazil)', 'razz' ),
										'pt_PT' => esc_html__( 'Portuguese (Portugal)', 'razz' ),
										'ro_RO' => esc_html__( 'Romanian', 'razz' ),
										'ru_RU' => esc_html__( 'Russian', 'razz' ),
										'sl_SI' => esc_html__( 'Slovenian', 'razz' ),
										'so_SO' => esc_html__( 'Somali', 'razz' ),
										'sq_AL' => esc_html__( 'Albanian', 'razz' ),
										'sr_RS' => esc_html__( 'Serbian', 'razz' ),
										'sv_SE' => esc_html__( 'Swedish', 'razz' ),
										'tl_PH' => esc_html__( 'Filipino', 'razz' ),
										'tr_TR' => esc_html__( 'Turkish', 'razz' ),
										'uk_UA' => esc_html__( 'Ukrainian', 'razz' ),
										'ur_PK' => esc_html__( 'Urdu', 'razz' ),
										'vi_VN' => esc_html__( 'Vietnamese', 'razz' ),
										'zh_CN' => esc_html__( 'Simplified Chinese (China)', 'razz' ),
										'zh_TW' => esc_html__( 'Traditional Chinese (Taiwan)', 'razz' ),
										'zh_HK' => esc_html__( 'Traditional Chinese (Hong Kong)', 'razz' )
									)
								)
							)
						)
					),
				)
			),
			'share_box'   => array(
				'title'   => esc_html__( 'Share icons', 'razz' ),
				'type'    => 'tab',
				'options' => array(
					'share_facebook'  => array(
						'type'         => 'switch',
						'value'        => 'on',
						'label'        => esc_html__( 'Share on Facebook', 'razz' ),
						'right-choice' => array(
							'value' => 'on',
							'label' => esc_html__( 'show', 'razz' )

						),
						'left-choice'  => array(
							'value' => 'off',
							'label' => esc_html__( 'hide', 'razz' )
						)
					),
					'share_twitter'   => array(
						'type'         => 'switch',
						'value'        => 'on',
						'label'        => esc_html__( 'Share on Twitter', 'razz' ),
						'right-choice' => array(
							'value' => 'on',
							'label' => esc_html__( 'show', 'razz' )

						),
						'left-choice'  => array(
							'value' => 'off',
							'label' => esc_html__( 'hide', 'razz' )
						)
					),
					'share_pinterest' => array(
						'type'         => 'switch',
						'value'        => 'on',
						'label'        => esc_html__( 'Share on Pinterest', 'razz' ),
						'right-choice' => array(
							'value' => 'on',
							'label' => esc_html__( 'show', 'razz' )

						),
						'left-choice'  => array(
							'value' => 'off',
							'label' => esc_html__( 'hide', 'razz' )
						)
					),
					'share_google'    => array(
						'type'         => 'switch',
						'value'        => 'on',
						'label'        => esc_html__( 'Share on Google Plus', 'razz' ),
						'right-choice' => array(
							'value' => 'on',
							'label' => esc_html__( 'show', 'razz' )

						),
						'left-choice'  => array(
							'value' => 'off',
							'label' => esc_html__( 'hide', 'razz' )
						)
					),
					'share_linked'    => array(
						'type'         => 'switch',
						'value'        => 'on',
						'label'        => esc_html__( 'Share on Linked in', 'razz' ),
						'right-choice' => array(
							'value' => 'on',
							'label' => esc_html__( 'show', 'razz' )

						),
						'left-choice'  => array(
							'value' => 'off',
							'label' => esc_html__( 'hide', 'razz' )
						)
					),
					'share_stumble'   => array(
						'type'         => 'switch',
						'value'        => 'on',
						'label'        => esc_html__( 'Share on Stumbleupon', 'razz' ),
						'right-choice' => array(
							'value' => 'on',
							'label' => esc_html__( 'show', 'razz' )

						),
						'left-choice'  => array(
							'value' => 'off',
							'label' => esc_html__( 'hide', 'razz' )
						)
					)
				)
			),
			'related_box' => array(
				'title'   => esc_html__( 'Related Posts', 'razz' ),
				'type'    => 'tab',
				'options' => array(
					'related_posts_box' => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'picker'  => array(
							'control' => array(
								'type'         => 'switch',
								'label'        => esc_html__( 'Related Posts', 'razz' ),
								'value'        => 'on',
								'left-choice'  => array(
									'value' => 'off',
									'label' => esc_html__( 'Hide', 'razz' ),
								),
								'right-choice' => array(
									'value' => 'on',
									'label' => esc_html__( 'Show', 'razz' ),
								),
							)
						),
						'choices' => array(
							'on' => array(
								'related_title' => array(
									'type'  => 'text',
									'value' => esc_html__( 'Related Posts', 'razz' ),
									'label' => esc_html__( 'Title', 'razz' ),
								),
								'related_count' => array(
									'type'       => 'slider',
									'value'      => 4,
									'properties' => array(
										'min'  => 1,
										'max'  => 12,
										'step' => 1
									),
									'label'      => esc_html__( 'Number of posts', 'razz' ),
								),
								'query'         => array(
									'type'    => 'radio',
									'value'   => 'category',
									'label'   => esc_html__( 'Query based on', 'razz' ),
									'choices' => array(
										'tag'      => esc_html__( 'Tags', 'razz' ),
										'category' => esc_html__( 'Categories', 'razz' ),
										'author'   => esc_html__( 'Author', 'razz' ),
									),
									'inline'  => true
								)
							)
						)
					)
				)
			)
		)
	)
);