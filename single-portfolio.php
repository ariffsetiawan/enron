<?php
/**
 * The Template for displaying all single portfolio posts.
 *
 * @package Enron
 */

get_header(); ?>

	<div class="content-section">
			  <div class="container">
			  
				<div class="page-title call-to-action section-bordered">
						<div class="row">
						<h2 class="call-action-title span8"><?php _e( 'Our Works', 'enron' ); ?></h2>
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
					 
				
				<div class="portfolio-details" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				  <h2 class="details-title"><?php the_title(); ?></h2>			  
				  

				  <div class="portfolio-slider-wrapper">
					<div class="portfolio-slider">
					<?php
					$postId=get_the_ID();
					
					$args=array (
						'post_parent' => $postId,	
						'post_type' => 'attachment',
						'post_mime_type' => 'image'
					);
					$images =get_children($args);
					
					

					if ( empty($images) ) {
						// no attachments here
						the_post_thumbnail();
					} else {
						foreach ( $images as $attachment_id => $attachment ) {
							echo wp_get_attachment_image( $attachment_id, 'full' );
						}
					}
					
					
					?>	
					  
					</div>
				  </div><!-- .portfolio-slider-wrapper -->

				  <div class="detail-list row">
					<div class="widget widget-text span3">
					  <h4 class="widget-title"><?php _e( 'About Project', 'enron' ); ?></h4>
					  <?php 
					  $postData=get_post();
	
					  
						echo apply_filters('the_content',$postData->post_content);
						?> 
					</div><!-- .widget-text -->
					<?php
					if(is_active_sidebar('portfolio-1')){
					dynamic_sidebar('portfolio-1');
					}
					if(is_active_sidebar('portfolio-2')){
					dynamic_sidebar('portfolio-2');
					}
								
					?>  
					
					<?php $site= get_post_custom_values('projLink'); 
						
					 
					?>

					<div class="span3 go-to-site">
					  <a href="<?php echo $site[0];?>" class="btn btn-orange btn-bold float-right"><?php _e( 'See Project', 'enron' ); ?> <i class="icon-chevron-right"></i></a>
					</div>
					
				  </div><!-- .detail-list -->
				</div><!-- .portfolio-details -->

      </div>
    </div><!-- .content-section -->
	
<?php get_footer(); ?>