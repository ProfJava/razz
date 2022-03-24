<?php
/**
 * @param $username --> instagram username
 *
 * @return mixed|WP_Error
 */
function razz_scrape_instagram( $username ) {
	$transient_name = 'razz-instagram-';
	$username       = trim( strtolower( $username ) );

	if ( false === ( $instagram = get_transient( $transient_name . sanitize_title_with_dashes( $username ) ) ) ) {

		switch ( substr( $username, 0, 1 ) ) {
			case '#':
				$url = 'https://instagram.com/explore/tags/' . str_replace( '#', '', $username );
				break;

			default:
				$url = 'https://instagram.com/' . str_replace( '@', '', $username );
				break;
		}

		$remote = wp_remote_get( $url );

		if ( is_wp_error( $remote ) ) {
			return new WP_Error( 'site_down', esc_html__( 'Unable to communicate with Instagram.', 'razz' ) );
		}

		if ( 200 !== wp_remote_retrieve_response_code( $remote ) ) {
			return new WP_Error( 'invalid_response', esc_html__( 'Instagram did not return a 200.', 'razz' ) );
		}

		$shards      = explode( 'window._sharedData = ', $remote['body'] );
		$insta_json  = explode( ';</script>', $shards[1] );
		$insta_array = json_decode( $insta_json[0], true );

		if ( ! $insta_array ) {
			return new WP_Error( 'bad_json', esc_html__( 'Instagram has returned invalid data.', 'razz' ) );
		}

		if ( isset( $insta_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'] ) ) {
			$images = $insta_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'];
		} elseif ( isset( $insta_array['entry_data']['TagPage'][0]['graphql']['hashtag']['edge_hashtag_to_media']['edges'] ) ) {
			$images = $insta_array['entry_data']['TagPage'][0]['graphql']['hashtag']['edge_hashtag_to_media']['edges'];
		} else {
			return new WP_Error( 'bad_json_2', esc_html__( 'Instagram has returned invalid data.', 'razz' ) );
		}

		if ( ! is_array( $images ) ) {
			return new WP_Error( 'bad_array', esc_html__( 'Instagram has returned invalid data.', 'razz' ) );
		}

		$instagram = array();

		foreach ( $images as $image ) {
			// Note: keep hashtag support different until these JSON changes stabalise
			// these are mostly the same again now
			switch ( substr( $username, 0, 1 ) ) {
				case '#':
					if ( true === $image['node']['is_video'] ) {
						$type = 'video';
					} else {
						$type = 'image';
					}

					$caption = __( 'Instagram Image', 'razz' );
					if ( ! empty( $image['node']['edge_media_to_caption']['edges'][0]['node']['text'] ) ) {
						$caption = $image['node']['edge_media_to_caption']['edges'][0]['node']['text'];
					}

					$instagram[] = array(
						'description' => $caption,
						'link'        => trailingslashit( '//instagram.com/p/' . $image['node']['shortcode'] ),
						'time'        => $image['node']['taken_at_timestamp'],
						'comments'    => $image['node']['edge_media_to_comment']['count'],
						'likes'       => $image['node']['edge_liked_by']['count'],
						'thumbnail'   => preg_replace( '/^https?\:/i', '', $image['node']['thumbnail_resources'][0]['src'] ),
						'small'       => preg_replace( '/^https?\:/i', '', $image['node']['thumbnail_resources'][2]['src'] ),
						'large'       => preg_replace( '/^https?\:/i', '', $image['node']['thumbnail_resources'][4]['src'] ),
						'original'    => preg_replace( '/^https?\:/i', '', $image['node']['display_url'] ),
						'type'        => $type,
					);
					break;
				default:
					if ( true === $image['is_video'] ) {
						$type = 'video';
					} else {
						$type = 'image';
					}

					$caption = __( 'Instagram Image', 'razz' );
					if ( ! empty( $image['caption'] ) ) {
						$caption = $image['caption'];
					}

					$instagram[] = array(
						'description' => $caption,
						'link'        => trailingslashit( '//instagram.com/p/' . $image['code'] ),
						'time'        => $image['date'],
						'comments'    => $image['comments']['count'],
						'likes'       => $image['likes']['count'],
						'thumbnail'   => preg_replace( '/^https?\:/i', '', $image['thumbnail_resources'][0]['src'] ),
						'small'       => preg_replace( '/^https?\:/i', '', $image['thumbnail_resources'][2]['src'] ),
						'large'       => preg_replace( '/^https?\:/i', '', $image['thumbnail_resources'][4]['src'] ),
						'original'    => preg_replace( '/^https?\:/i', '', $image['display_src'] ),
						'type'        => $type,
					);

					break;
			}
		} // End foreach().

		// do not set an empty transient - should help catch private or empty accounts.
		if ( ! empty( $instagram ) ) {
			$instagram = serialize( $instagram );
			set_transient( $transient_name . sanitize_title_with_dashes( $username ), $instagram, apply_filters( 'null_instagram_cache_time', HOUR_IN_SECONDS * 2 ) );
		}
	}
	if ( ! empty( $instagram ) ) {
		return unserialize( $instagram );
	} else {
		return new WP_Error( 'no_images', esc_html__( 'Instagram did not return any images.', 'razz' ) );
	}
}

/**
 * Display instagram content returned by wink_scrape_instagram()
 *
 * @param $username
 * @param int $photos_count
 *
 * @return array|mixed|WP_Error
 */
if ( ! function_exists( 'razz_instagram_photos_views' ) ) {
	function razz_instagram_photos_views( $username, $photos_count = 6 ) {
		if ( $username ) { // username must be available
			$instagram_media = razz_scrape_instagram( $username ); //photos array data from instagram
			if ( is_wp_error( $instagram_media ) ) {
				//print the error message
				echo '<div class="insta-error">' . wp_kses_post( $instagram_media->get_error_message() ) . '</div>';
			} else {
				$instagram_media = array_slice( $instagram_media, 0, $photos_count ); //limit photos count
				foreach ( $instagram_media as $photo ) {
					//display instagram photo html
					?>
                    <div class="razz-instagram-photo instagram-item">
                        <img src="<?php echo esc_url( $photo['small'] ); ?>"
                             alt="<?php echo esc_attr( $photo['description'] ) ?>"
                             class="img-responsive">
                        <a href="<?php echo esc_url( $photo['link'] ) ?>"
                           title="<?php esc_attr_e( 'Go to the post', 'razz' ); ?>"
                           class="to-insta-photo" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        <a href="<?php echo esc_url( $photo['original'] ) ?>"
                           title="<?php echo esc_attr( $photo['description'] ) ?>"
                           class="razz-insta-gallery"><i class="fa fa-arrows-alt" aria-hidden="true"></i></a>
                    </div>
					<?php
				}
			}
		}
	}
}