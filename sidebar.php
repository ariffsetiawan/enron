<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Enron
 */
?>
		
	<div class="sidebar span3">
           
			<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
			
			<div class="widget widget-search">			
			<h4 class="widget-title"><?php _e( 'Search', 'enron' ); ?></h4>
              <div class="searchwidget">
                <?php get_search_form(); ?>
              </div>
            </div>

			<div id="archives" class="widget">
				<h4 class="widget-title"><?php _e( 'Archives', 'enron' ); ?></h4>
				<ul>
					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
				</ul>
			</div>

			<div id="meta" class="widget">
				<h4 class="widget-title"><?php _e( 'Meta', 'enron' ); ?></h4>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</div>

		<?php endif; // end sidebar widget area ?>
		
            
              

                        
    </div><!-- .sidebar -->
