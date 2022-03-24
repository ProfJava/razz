<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}


$options = array(
	'social' => array(
		'title'   => esc_html__( 'Social media', 'razz' ),
		'type'    => 'tab',
		'options' => array(
			'social-box' => array(
				'title'   => esc_html__( 'Social media urls', 'razz' ),
				'type'    => 'tab',
				'options' => array(
					'social_icon' => array(
						'type'            => 'addable-box',
						'attr'            => array( 'class' => 'box-width' ),
						'label'           => esc_html__( 'Social media links', 'razz' ),
						'box-options'     => array(
							'title' => array(
								'type'  => 'text',
								'label' => esc_html__( 'Title', 'razz' ),
							),
							'url'   => array(
								'type'  => 'text',
								'label' => esc_html__( 'Url', 'razz' ),
							),
							'icon'  => array(
								'type'  => 'icon',
								'attr'  => array( 'class' => 'custom-class', 'data-foo' => 'bar' ),
								'label' => esc_html__( 'Social network icon', 'razz' ),
							),
							'tab'   => array(
								'type'  => 'checkbox',
								'value' => true,
								'label' => esc_html__( 'Open url in new tab', 'razz' )
							)
						),
						'template'        => '<i class="{{- icon }}"></i> {{- title }}', // box title
						'add-button-text' => esc_html__( 'Add social media button', 'razz' ),
						'sortable'        => true,
					)
				)
			)
		)
	)
);