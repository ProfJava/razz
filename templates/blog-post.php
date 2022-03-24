<div <?php post_class( 'blog-post' ); ?> itemscope itemtype="http://schema.org/Article">

	<?php if ( function_exists( 'the_post_thumbnail' ) && has_post_thumbnail() ): ?>
		<div class="post-image">
			<a rel="bookmark" href="<?php the_permalink(); ?>"
			   title="<?php the_title_attribute(); ?>">
				<?php the_post_thumbnail( 'razz_blog_post', array( 'class' => 'img-responsive' ) ); ?>

			</a>
		</div>
	<?php endif; ?>
    <div class="post-header">
		<?php the_title( sprintf( '<h3 class="post-title" itemprop="name headline"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
		<?php get_template_part( 'content', 'meta' ); ?>
    </div>
	<div class="post-text">
		<p><?php razz_excerpt(); ?></p>
		<?php do_action('razz_read_more'); ?>
	</div>
</div>