<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package sparkly
 */
?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php _e( 'No Images Yet :(', 'sparkly' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<p><?php printf( __( 'Ready to upload your first image? <a href="%1$s">Get started here</a>', 'sparkly' ), esc_url( admin_url( 'media-new.php' ) ) ); ?></p>
	</div><!-- .page-content -->
</section><!-- .no-results -->
