<div class="post-box error-page post-outline">
	<div class="error-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
			<h5 class="text-center">
				<?php esc_html_e( 'Ready to publish your first post? ', 'razz' ); ?>
				<a href="<?php echo esc_url( admin_url( 'post-new.php' ) ) ?>">
					<?php esc_html_e( 'Get started here.', 'razz' ); ?>
				</a>
			</h5>
		<?php elseif ( is_search() ) : ?>
			<h5 class="text-center"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'razz' ); ?></h5>
			<?php get_search_form(); ?>
		<?php else : ?>
			<h5 class="text-center"><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'razz' ); ?></h5>
			<?php get_search_form(); ?>
		<?php endif; ?>
	</div>
</div>