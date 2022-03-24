<div class="blog-grid">
	<?php while ( have_posts() ): the_post();
		get_template_part( 'templates/blog', 'post' );
	endwhile; ?>
</div>
