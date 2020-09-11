<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Enron
 */

get_header(); ?>

	<div class="content-section">
			  <div class="container">
			  
				<div class="page-title call-to-action section-bordered">
				  <div class="row">
					<h2 class="call-action-title span8"><?php _e( 'Our Blog', 'enron' ); ?></h2>
					<?php
						$next_post = get_next_post();
						$prev_post = get_previous_post();
						?>
					<div class="page-navigation float-right">
					<?php 
						if (!empty( $prev_post )){ ?>
						<a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="link"><i class="icon-chevron-left"></i></a>
						<?php } ?>
						<a href="#" class="link"><i class="icon-chevron-up"></i></a>
						<?php 
						if (!empty( $next_post )){ ?>
						<a href="<?php echo get_permalink( $next_post->ID ); ?>" class="link"><i class="icon-chevron-right"></i></a>
						<?php } ?>
					</div>
				  </div>
				</div><!-- .call-to-action -->

				<div class="row">
				  <div class="span9 entry-post-list">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php enron_post_nav(); ?>
			
			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>
			
		<?php endwhile; // end of the loop. ?>

          </div><!-- .entry-post-list -->

          <?php get_sidebar(); ?>
        </div><!-- .row -->

      </div>
    </div><!-- .content-section -->
	
<?php get_footer(); ?>