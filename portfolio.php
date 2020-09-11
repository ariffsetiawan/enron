<?php
/*
Template Name: Portfolios
*/
get_header();

$pageid=get_the_ID();

//print_r($pageid);

if ( function_exists( 'ot_get_option' ) ) {
		  $number_portfolio = ot_get_option( 'number_portfolio' );	  
		  
		}
		

if($number_portfolio){
query_posts('post_type=portfolio&posts_per_page='.$number_portfolio);
} else {
query_posts('post_type=portfolio&posts_per_page=8');
}
	

 
 
?>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.3.2.min.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/filterable.js" type="text/javascript" charset="utf-8"></script>
	<div class="content-section">
		<div class="container">

        <div class="page-title call-to-action section-bordered">
          <div class="row">
            <h2 class="call-action-title span8"><?php _e( 'Our Works', 'enron' ); ?></h2>
            <div class="call-action-button span4" id="portfolio-filter">
             
			  <?php 
			  
			  $terms=get_terms('portfolio_category'); 
			  //print_r($terms);
			  
			  if ( !empty( $terms ) && !is_wp_error( $terms ) ) {
			  ?>
			  <a href="#all" class="btn btn-white btn-bold float-right btn-uppercase"><?php _e( 'All', 'enron' ); ?> <i class="icon-chevron-right"></i></a>
			  <?php
					
					foreach ($terms as $term) {
						$i++;
						
						
						?>
						<a href="#<?php echo $term->slug;?>" rel="<?php echo $term->slug;?>" class="btn btn-white btn-bold float-right btn-uppercase"><?php echo $term->name;?><i class="icon-chevron-right"></i></a>
						
						<?php
					}
					
				}
			  ?>
			  
            </div>
          </div>
        </div><!-- .call-to-contact -->

        <div class="portfolio-section section-bordered without-border">
          <div class="module-item-rounded portfolio-list row" id="portfolio-list">
            
			<?php
				while ( have_posts() ) : the_post();
				$termlist=get_the_terms( $post->ID, 'portfolio_category'); 
				?>
				
				<div class="item-rounded-item span3 <?php 
					if($termlist){
						foreach ($termlist as $term) {
						echo $term->slug." ";
						}
					}		
				?>">
				  <div class="item-rounded-image">
					<a href="<?php the_permalink(); ?>">
					<?php
					  if ( has_post_thumbnail() ) { 
						  the_post_thumbnail();
						}  
					  ?>
						  <span class="item-rounded-icon">
						<i class="icon-magnifier"></i>
					  </span>
					</a>
				  </div>
				  
					 
					<h3 class="item-rounded-title">
					<a href="<?php the_permalink(); ?>"><?php the_title();?></a>
				  </h3>
				  
				
					<p class="item-rounded-meta"> <?php 
	
					
					
					$i=0;
					if($termlist){
						foreach ($termlist as $term) {
							$i++;
							
							if($i==1){
							?>
							<a href="#<?php echo $term->slug;?>" rel="<?php echo $term->slug;?>"><?php echo $term->name;?></a>
							
							<?php
							}else{
							?>
							/ <a href="#<?php echo $term->slug;?>" rel="<?php echo $term->slug;?>"><?php echo $term->name;?></a>
							
							<?php
							}
							
						}
					}
							
						
					  ?>
					</p>
					
					
				  
				  
				</div>
				  
				<?php
						
			endwhile;
			?>            

              

           
          </div><!-- .portfolio-list -->
        </div><!-- .portfolio-section -->

      </div>
    </div><!-- .content-section -->
	
<?php get_footer(); ?>