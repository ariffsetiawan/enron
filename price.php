<?php
/*
Template Name: Pricing
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
			<li class="selected"><a href="<?php echo get_permalink($price_page);?>"><?php _e( 'Prices', 'enron' ); ?></a></li>
			<?php
			}
			
			if($about[3]){
			?>
			<li><a href="<?php echo get_permalink($team_page);?>"><?php _e( 'Our Team', 'enron' ); ?></a></li>
			<?php
			}
			
			if($about[4]){
			?>
			<li><a href="<?php echo get_permalink($careers_page);?>"><?php _e( 'Careers', 'enron' ); ?></a></li>
			<?php
			}
		     ?>
            
          </ul><!-- .tab-nav -->
           <?php
			if($price_page){
			?>
          <div class="tab-pane">
		 
            <?php $postData=get_post($price_page);
	
					  
						echo $postData->post_content;?>
          </div>
		  <?php
			}
			
		     ?>
		  
        </div><!-- .section-tabbed -->
		
		<div class="section-pricing">
          <div class="pricing-table">
            <div class="price-attribute">
              <ul class="price-attr-list">
			  <?php
			  if ( function_exists( 'ot_get_option' ) ) {
					$customPriceItem = ot_get_option( 'custom_price_item' );

					if($customPriceItem){
						foreach($customPriceItem as $priceItem){
							
							?>
							<li><div class="attr-inner"><?php echo $priceItem['title'];?></div></li>
							
							<?php
						}
					}	
				}
				
				?>
                
               
              </ul>
            </div>

            <div class="price-columns clearfix">
			 <?php 
		  
			  query_posts('post_type=price');
			  
			 
				while ( have_posts() ) : the_post();
				
				
				$custom = get_post_custom(); 
				?>
              <div class="price-grid <?php if($custom['priceHighlight'][0]=="Yes") echo "highlight";?>">
                <div class="price-header" style="background:<?php echo $custom['priceColor'][0];?>;">
                  <div class="price-header-title"><?php the_title();?></div>
                  <div class="price-header-price"><small><?php echo $custom['price'][0];?></small></div>
                </div>
                <div class="price-body">
                  <ul class="price-attr-list">
				  <?php  
				  
				 
					if ( function_exists( 'ot_get_option' ) ) {
						$customPriceItem = ot_get_option( 'custom_price_item' );
						
						if($customPriceItem){
							foreach($customPriceItem as $priceItem){
							
								$priceItemTitle=str_replace(' ','_',$priceItem['title']);
								$priceItemValue=$custom[$priceItemTitle][0];
								$priceItemValue=strtolower($priceItemValue);
								
								if($priceItemValue=="yes"){
								?>
								<li class="list-yes"><div class="attr-inner"><i class="icon-checkmark"></i></div></li>
								<?php
								}else if($priceItemValue=="no"){
								?>
								<li class="list-no"><div class="attr-inner"><i class="icon-cancel"></i></div></li>
								<?php
								}else{
								?>
								<li><div class="attr-inner"><?php echo $priceItemValue;?></div></li>
								
								<?php
								}
								
							}
						}	
					}
					?>
                    
                    <li class="cta-button">
                      <div class="attr-inner">
                        <a href="<?php echo $custom['buyNowLink'][0];?>" class="btn btn-bold btn-bold btn-block" style="background:<?php echo $custom['priceColor'][0];?>;color:#fff;"><?php _e( 'Buy Now', 'enron' ); ?><i class="icon-chevron-right"></i></a>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
				<?php
							
				endwhile;
				?>  
              

            </div>
          </div><!-- .pricing-table -->
        </div><!-- .section-pricing -->
		
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