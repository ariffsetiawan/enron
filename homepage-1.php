<?php
/*
Template Name: Homepage 1
*/
get_header(); 

if ( function_exists( 'ot_get_option' ) ) {
		  $post_category_slider = ot_get_option( 'post_category_slider' );	  
		  $number_post_slider = ot_get_option( 'number_post_slider' );
		  $background_image_slider = ot_get_option( 'background_image_slider' );
			
		}
		
		if($number_post_slider!=""){
			$number_post_slider=$number_post_slider;
		}else {
			$number_post_slider=5;
		}
		
		if($post_category_slider){
		
			
			
			query_posts( array( 'cat' => $post_category_slider, 'posts_per_page' => $number_post_slider ) );
			?>
				<div class="slider-section slider-with-background">
				  <div class="container">
					<div class="slider-wrap" style="opacity: 1; display: block;height: 310px;">
          
				<?php
			while ( have_posts() ) : the_post();
				?>
				
				<div class="slide-item clearfix">
					<div class="slide-image">
					 <?php
					  if ( has_post_thumbnail() ) { 
						  the_post_thumbnail();
						}  
					  ?>
					</div>

					<div class="slide-text">
					  <h2 class="slide-title"><span class="color"><?php the_title();?></span></h2>
					  <h3 class="slide-subtitle"><?php the_excerpt(); ?></h3>
					  <a href="<?php the_permalink(); ?>" class="btn btn-black btn-bold"><?php _e( 'Read More', 'enron' ); ?> <i class="icon-chevron-right"></i></a>
					</div>
				  </div>
				  
				  
				<?php
						
			endwhile;
			?>
				
					</div>
					
					<!-- This is dummy image you can change with whatever image -->
					<?php 
					if($background_image_slider){
					?>
					<div class="slider-background" data-stretch="<?php echo $background_image_slider['background-image']; ?>"></div>
					<?php
					} else{
					?>
					<div class="slider-background" data-stretch="<?php echo get_template_directory_uri(); ?>/images/1437836_74084088.jpg"></div>
					<?php
					}
					
					?>
					
					
					
				  </div>
				</div><!-- .slider-section -->
				<?php
			// Reset Query
			wp_reset_query();
		} else {
			
			$sticky = get_option('sticky_posts');
			rsort($sticky);
			$sticky = array_slice($sticky, 0, $number_post_slider);
			query_posts( array( 'post__in' => $sticky, 'caller_get_posts' => 1 ) );
			?>
				<div class="slider-section slider-with-background">
				  <div class="container">
					<div class="slider-wrap" style="opacity: 1; display: block;height: 310px;">
          
        
				<?php
			while ( have_posts() ) : the_post();
				?>
				
				<div class="slide-item clearfix">
					<div class="slide-image">
					 <?php
					  if ( has_post_thumbnail() ) { 
						  the_post_thumbnail();
						}  
					  ?>
					</div>

					<div class="slide-text">
					  <h2 class="slide-title"><span class="color"><?php the_title();?></span></h2>
					  <h3 class="slide-subtitle"><?php the_excerpt(); ?></h3>
					  <a href="<?php the_permalink(); ?>" class="btn btn-black btn-bold"><?php _e( 'Read More', 'enron' ); ?> <i class="icon-chevron-right"></i></a>
					</div>
				  </div>
				  
								  
				<?php
				
				
				
			endwhile;
			?>
				
				</div>

					<!-- This is dummy image you can change with whatever image -->
					<?php 
					if($background_image_slider){
					?>
					<div class="slider-background" data-stretch="<?php echo $background_image_slider['background-image']; ?>"></div>
					<?php
					} else{
					?>
					<div class="slider-background" data-stretch="<?php echo get_template_directory_uri(); ?>/images/1437836_74084088.jpg"></div>
					<?php
					}
					
					?>
				  </div>
				</div><!-- .slider-section -->
				<?php
			// Reset Query
			wp_reset_query();

		}

?>


          
	
	<div class="content-section">
      <div class="container">
	  <?php
		if ( function_exists( 'ot_get_option' ) ) {
		  $slogan = ot_get_option( 'homepage_slogan' );
		  
		  ?>
		   <div class="hero-unit-section section-bordered">
			  <h2><?php echo $slogan;?></h2>
			</div><!-- .hero-unit-section -->
		  <?php
		}

		
       
		if ( function_exists( 'ot_get_option' ) ) {
			  $portfolio = ot_get_option( 'portfolio_homepage' );			  
			  
		}
		
		if($portfolio){
		?>	  
        <div class="portfolio-section section-bordered">
          <h3 class="section-title"><?php _e( 'Featured Works', 'enron' ); ?></h3>

          <div class="module-item-rounded portfolio-list portfolio-carousel row">
	
		  <?php
		  
		  foreach ( $portfolio as $p ){
		  
		  $postData=get_post($p);
		  
		  ?>
            <div class="item-rounded-item span3">
              <div class="item-rounded-image">
                <a href="<?php echo get_permalink( $p ); ?>">
                  <?php echo get_the_post_thumbnail( $p ); ?>
                  <span class="item-rounded-icon">
                    <i class="icon-magnifier"></i>
                  </span>
                </a>
              </div>

              <h3 class="item-rounded-title">
                <a href="<?php echo get_permalink( $p ); ?>"><?php echo $postData->post_title;?></a>
              </h3>
              <p class="item-rounded-meta">
                <?php echo get_the_term_list( $p, 'portfolio_category', "" ); ?>
              </p>
            </div>
			<?php } ?>
            
          </div><!-- .portfolio-list -->
        </div><!-- .portfolio-section -->
		
		<?php } ?>

        <div class="blog-section section-bordered without-border">
          <h3 class="section-title">&nbsp;</h3>
          
          <div class="blog-list blog-carousel row">
            <?php
			if(is_active_sidebar('homepage-1')){
			dynamic_sidebar('homepage-1');
			}
			if(is_active_sidebar('homepage-2')){
			dynamic_sidebar('homepage-2');
			}
			if(is_active_sidebar('homepage-3')){
			dynamic_sidebar('homepage-3');
			}
			if(is_active_sidebar('homepage-4')){
			dynamic_sidebar('homepage-4');
			}
						
		

		  
			$args = array( 'posts_per_page' => 10 );
			$lastposts = get_posts( $args );
			foreach ( $lastposts as $post ) :
			  setup_postdata( $post ); 
			  
			  $format = get_post_format();
				if ( $format=='gallery' ) {
				?>
			<div class="blog-item span3">
              <div class="blog-item-header">
                <a href="#">
                  <span class="blog-item-icon"><i class="icon-images"></i></span>
                  <h3 class="blog-item-title"><?php the_title(); ?></h3>
                </a>
              </div>
              <div class="blog-item-media">
                <div class="media-slider">
				
				<?php
				$args=array (
						'post_parent' => $postId,	
						'post_type' => 'attachment',
						'post_mime_type' => 'image'
					);
					$images =get_children($args);
					
					

					if ( empty($images) ) {
						// no attachments here
					} else {
						foreach ( $images as $attachment_id => $attachment ) {
							echo wp_get_attachment_image( $attachment_id, 'full' );
						}
					}
				?>
                  
                </div>
              </div>
				<div class="blog-item-content">
                <?php the_excerpt(); ?>
              </div>
            </div>
				
				<?php	
				} else if($format=="video"){
					?>
					<div class="blog-item span3">
					  <div class="blog-item-header">
						<a href="#">
						  <span class="blog-item-icon"><i class="icon-film"></i></span>
						  <h3 class="blog-item-title"><?php the_title(); ?></h3>
						</a>
					  </div>
					  <div class="blog-item-media">
						<div class="media-video">
						  <?php
							$video_src= get_post_custom_values('video_embed_src');
							echo $video_src[0];
							?>
						</div>
					  </div>
					  <div class="blog-item-content">
						<?php the_excerpt(); ?>
					  </div>
					</div>
					<?php
				}else if($format=="image"){
					?> 
					
					 <div class="blog-item span3">
					  <div class="blog-item-header">
						<a href="#">
						  <span class="blog-item-icon"><i class="icon-image"></i></span>
						  <h3 class="blog-item-title"><?php the_title(); ?></h3>
						</a>
					  </div>
					  <div class="blog-item-media">
						<?php
						if ( has_post_thumbnail() ) { 
						  the_post_thumbnail();
						}  
						?>
					  </div>
					  <div class="blog-item-content">
						<?php the_excerpt(); ?>
					  </div>
					</div>
					<?php } else {
			  
			  ?>
				
				<div class="blog-item span3">
				  <div class="blog-item-header">
					<a href="<?php the_permalink(); ?>">
					  <span class="blog-item-icon"><i class="icon-edit"></i></span>
					  <h3 class="blog-item-title"><?php the_title(); ?></h3>
					</a>
				  </div>
				  <div class="blog-item-media">
						<?php
						if ( has_post_thumbnail() ) { 
						  the_post_thumbnail();
						}  
						?>
					  </div>
				  <div class="blog-item-content">
					<?php the_excerpt(); ?>
				  </div>
				</div>
					
				<?php 
				}
				endforeach; 
				wp_reset_postdata(); 
		  
		  ?>

          </div><!-- .blog-carousel -->
        </div><!-- .blog-section -->

      </div>
    </div><!-- .content-section -->
	
<?php get_footer(); ?>