<div <?php post_class( 'list-post' ); ?> itemscope itemtype="http://schema.org/Article">
	<?php if ( function_exists( 'the_post_thumbnail' ) && has_post_thumbnail() ){ ?>
		<div class="post-image">
			<a rel="bookmark" href="<?php the_permalink(); ?>"
			   title="<?php the_title_attribute(); ?>">
				<?php the_post_thumbnail( 'razz_big_post', array( 'class' => 'img-responsive' ) ); ?>

			</a>
		</div>
	<?php } ?>
	<div class="post-text">
		<div class="post-content">
			<?php the_title( sprintf( '<h3 class="post-title h4" itemprop="name headline"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
			<?php get_template_part( 'content', 'meta' ); ?>
			<p><?php razz_excerpt(); ?></p>

		</div>
		<?php do_action('razz_read_more'); ?>
	</div>
	<div class="clearfix"></div>
</div>