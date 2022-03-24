<div class="blog-grid">
	<div class="row">
		<?php
		$i = 0;
		while ( have_posts() ): the_post(); ?>
			<?php if ( $i == 0 ) { ?>
				<div class="col-md-12">
					<?php get_template_part( 'templates/blog', 'post' ); ?>
				</div>
			<?php } else { ?>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<?php get_template_part( 'templates/mini', 'blog-post' ); ?>
				</div>
				<?php if ( $i % 2 == 0 ) { ?>
					<div class="clearfix"></div>
				<?php } ?>
				<?php
			}
			$i ++;
		endwhile; ?>
	</div>
</div>
