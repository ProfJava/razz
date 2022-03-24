<div class="share-box">
	<ul class="share-icons">
		<?php
		$title         = strip_tags( get_the_title() );
		$encoded_title = str_replace( ' ', '+', $title );
		$url           = get_the_permalink();
		?>
		<?php if ( 'on' === razz_get_setting( 'share_twitter' ) or ! function_exists( 'fw_get_db_settings_option' ) ): ?>
			<!-- twitter -->
			<li>
				<a class="twitter"
				   href="https://twitter.com/share?text=<?php echo esc_attr( $encoded_title ); ?>&amp;url=<?php echo esc_url( $url ); ?>"
				   onclick="window.open(this.href, 'twitter-share', 'width=550,height=235');return false;">
					<i class="fa fa-twitter"></i>
				</a>
			</li>
		<?php endif; ?>
		<?php if ( 'on' === razz_get_setting( 'share_facebook' ) or ! function_exists( 'fw_get_db_settings_option' ) ): ?>
			<!-- facebook -->
			<li>
				<a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url( $url ); ?>"
				   onclick="window.open(this.href, 'facebook-share','width=580,height=296');return false;">
					<i class="fa fa-facebook"></i>
				</a>
			</li>
		<?php endif; ?>
		<?php if ( 'on' === razz_get_setting( 'share_google' ) or ! function_exists( 'fw_get_db_settings_option' ) ): ?>
			<!-- google plus -->
			<li>
				<a class="google-plus" href="https://plus.google.com/share?url=<?php echo esc_url( $url ); ?>"
				   onclick="window.open(this.href, 'google-plus-share', 'width=490,height=530');return false;">
					<i class="fa fa-google-plus"></i>
				</a>
			</li>
		<?php endif; ?>
		<?php if ( 'on' === razz_get_setting( 'share_pinterest' ) or ! function_exists( 'fw_get_db_settings_option' ) ): ?>
			<!-- pinterest -->
			<li>
				<a class="pinterest"
				   href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());">
					<i class="fa fa-pinterest"></i>
				</a>
			</li>
		<?php endif; ?>
		<?php if ( 'on' === razz_get_setting( 'share_linked' ) or ! function_exists( 'fw_get_db_settings_option' ) ): ?>
			<!-- linkedin -->
			<li>
				<a class="linkedin"
				   href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo esc_url( $url ); ?>"
				   onclick="window.open(this.href, 'linkedin-share', 'width=550,height=480'); return false;">
					<i class="fa fa-linkedin"></i>
				</a>
			</li>
		<?php endif; ?>
		<?php if ( 'on' === razz_get_setting( 'share_stumble' ) or ! function_exists( 'fw_get_db_settings_option' ) ): ?>
			<li>
				<a class="stumbleupon" href="http://www.stumbleupon.com/submit?url=<?php echo esc_url( get_permalink() ); ?>&amp;title=<?php echo esc_attr( $encoded_title ); ?>"
				   onclick="javascript:void window.open(this.href,'Stumbleupon-share', 'width=640,height=680');return false;">
					<i class="fa fa-stumbleupon"></i>
				</a>
			</li>
		<?php endif; ?>
	</ul>
</div>
