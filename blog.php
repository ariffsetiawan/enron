<?php
/*
Template Name: Blog
*/
get_header(); 

query_posts('post_type=post&post_status=publish&posts_per_page=10&paged='. get_query_var('paged'));

?>


		<div class="content-section">
			  <div class="container">
			  
				<div class="page-title call-to-action section-bordered">
				  <div class="row">
					<h2 class="call-action-title span8"><?php _e( 'Our Blog', 'enron' ); ?></h2>
				  </div>
				</div><!-- .call-to-action -->

				<div class="row">
				  <div class="span9 entry-post-list">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php enron_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; wp_reset_query();?>
		
		<!--<div class="pagination">
              <a href="#" class="prev">Previous</a>
              <a href="#">1</a>
              <a href="#">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              <a href="#">5</a>
              <a href="#" class="next">Next</a>
            </div>-->
          </div><!-- .entry-post-list -->

          <?php get_sidebar(); ?>
        </div><!-- .row -->

      </div>
    </div><!-- .content-section -->


<?php get_footer(); ?>
