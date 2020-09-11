<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Enron
 */

get_header(); ?>


	<div class="content-section">
			  <div class="container">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'enron' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'search' ); ?>

			<?php endwhile; ?>

			<?php enron_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

	 <?php get_sidebar(); ?>
       
      </div>
    </div><!-- .content-section -->
<?php get_footer(); ?>
