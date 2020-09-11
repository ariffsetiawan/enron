<?php
/*
Template Name: Careers
*/
get_header(); 

if ( function_exists( 'ot_get_option' ) ) {
			  $about = ot_get_option( 'about_page_displayed' );
			  $intro_page=ot_get_option( 'introduction_page');
			  $service_page=ot_get_option( 'service_page');
			  $price_page=ot_get_option( 'price_page');
			  $careers_page=ot_get_option( 'careers_page');
			  $team_page=ot_get_option( 'team_page');
			  
			  }

?>



	<div class="content-section">
			<div class="container">
      
        <div class="page-title call-to-action section-bordered without-border">
          <div class="row">
            <h2 class="call-action-title span8"><?php the_title();?></h2>
          </div>
        </div><!-- .call-to-action -->
		
		
			<?php 
			  
			  if($about) {
			 
			  
			  
			  ?>

			  
			  
        <div class="section-tabbed section-bordered">
          <ul class="tab-nav">
           <?php
			if($about[0]){
			?>
			<li><a href="<?php echo get_permalink($intro_page);?>"><?php _e( 'Introduction', 'enron' ); ?></a></li>
			<?php
			}
			
			if($about[1]){
			?>
			<li><a href="<?php echo get_permalink($service_page);?>"><?php _e( 'Our Services', 'enron' ); ?></a></li>
			<?php
			}
			
			if($about[2]){
			?>
			<li><a href="<?php echo get_permalink($price_page);?>"><?php _e( 'Prices', 'enron' ); ?></a></li>
			<?php
			}
			
			if($about[3]){
			?>
			<li><a href="<?php echo get_permalink($team_page);?>"><?php _e( 'Our Team', 'enron' ); ?></a></li>
			<?php
			}
			
			if($about[4]){
			?>
			<li class="selected"><a href="<?php echo get_permalink($careers_page);?>"><?php _e( 'Careers', 'enron' ); ?></a></li>
			<?php
			}
		     ?>
            
          </ul><!-- .tab-nav -->
           <?php
			if($careers_page){
			?>
          <div class="tab-pane">
		 
            <?php $postData=get_post($careers_page);
	
					  
						echo $postData->post_content;?>
          </div>
		  <?php
			}
			
		     ?>
		  
        </div><!-- .section-tabbed -->
		
		 <?php 
		 
		 }
			  
			  ?>

        <div class="section-intro section-bordered without-border">
          <div class="widget-list row">
            <?php
			if(is_active_sidebar('singlepage-1')){
			dynamic_sidebar('singlepage-1');
			}
			if(is_active_sidebar('singlepage-2')){
			dynamic_sidebar('singlepage-2');
			}
			
			if(is_active_sidebar('singlepage-3')){
			dynamic_sidebar('singlepage-3');
			}
			
			if(is_active_sidebar('singlepage-4')){
			dynamic_sidebar('singlepage-4');
			}
			
			
			?>    
          </div><!-- .widget-list -->
        </div><!-- .section-intro -->

      </div>
    </div><!-- .content-section -->
	
<?php get_footer(); ?>