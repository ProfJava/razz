<div class="blog-grid">
	<?php
	$i = 0;
	while ( have_posts() ): the_post();
		if ( $i == 0 ) {
			get_template_part( 'templates/blog', 'post' );
		} else {
			get_template_part( 'templates/list', 'post' );
		}
		$i ++;
	endwhile; ?>
</div>
