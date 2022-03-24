<?php
/**
 * footer widgets area
 */
if ( ! is_active_sidebar( 'footer1' ) and ! is_active_sidebar( 'footer2' ) and ! is_active_sidebar( 'footer3' ) ) {
	return;
}
?>
<div class="footer-widgets">
	<div class="container">
		<div class="row">
			<?php if ( is_active_sidebar( 'footer1' ) ): ?>
				<div <?php razz_active_widgets(); ?> id="footer-sidebar-1">
					<?php dynamic_sidebar( 'footer1' ); ?>
				</div>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'footer2' ) ): ?>
				<div <?php razz_active_widgets(); ?> id="footer-sidebar-2">
					<?php dynamic_sidebar( 'footer2' ); ?>
				</div>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'footer3' ) ): ?>
				<div <?php razz_active_widgets(); ?> id="footer-sidebar-3">
					<?php dynamic_sidebar( 'footer3' ); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>