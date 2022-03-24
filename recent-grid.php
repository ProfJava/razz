<div class="blog-grid">
	<div class="row">
		<?php
		$i = 1;
		while ( have_posts() ) {
			the_post(); ?>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<?php get_template_part( 'templates/mini', 'blog-post' ); ?>
			</div>
			<?php if ( $i % 2 == 0 ) { ?>
				<div class="clearfix"></div>
				<?php
			}
			$i ++;
		} ?>
	</div>
</div>
