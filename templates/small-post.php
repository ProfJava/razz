<div <?php post_class( 'small-post' ) ?> itemscope itemtype="http://schema.org/Article">
	<?php if ( function_exists( 'the_post_thumbnail' ) && has_post_thumbnail() ): ?>
		<div class="post-image">
			<a rel="bookmark" href="<?php the_permalink(); ?>"
			   title="<?php the_title_attribute(); ?>">
				<span class="overlay"></span>
				<?php the_post_thumbnail( 'razz_small_post' ); ?>
			</a>
		</div>
	<?php endif; ?>
	<div class="post-content">
		<?php the_title( sprintf( '<h3 class="post-title h5" itemprop="name headline"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
		<?php get_template_part( 'content', 'meta' ); ?>
	</div>
</div>