<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Enron
 */

get_header(); ?>

	<div class="content-section">
			  <div class="container">
			<div class="row">
			<div class="error-404 not-found span9">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'enron' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'enron' ); ?></p>

					

				</div><!-- .page-content -->
				
			</div><!-- .error-404 -->
<?php get_sidebar(); ?>
		</div>
		</div>
    </div><!-- .content-section -->

<?php get_footer(); ?>