<form role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
	<input type="text" name="s" value="<?php echo get_search_query(); ?>"
	       placeholder="<?php echo esc_attr_x( 'Search and hit enter', 'search placeholder', 'razz' ) ?>"
	       title="<?php echo esc_attr_x( 'Search', 'search text field title', 'razz' ); ?>">
	<button type="submit"><i class="fa fa-search"></i></button>
</form>