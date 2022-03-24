<div class="list-grid">
	<?php
	while ( have_posts() ):the_post();
		get_template_part( 'templates/list', 'post' );
	endwhile;
	?>
</div>