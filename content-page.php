<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Enron
 */
?>

<div class="page-title call-to-action section-bordered without-border" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				  <div class="row">
					<h2 class="call-action-title span8"><?php the_title(); ?></h2>					
					
				  </div>
				</div><!-- .call-to-action -->

			
				


	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'shape' ), 'after' => '</div>' ) ); ?>
		<?php edit_post_link( __( 'Edit', 'shape' ), '<span class="edit-link">', '</span>' ); ?>
	</div><!-- .entry-content -->
<!-- #post-<?php the_ID(); ?> -->


