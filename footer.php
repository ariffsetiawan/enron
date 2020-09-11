<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Enron
 */
?>

	
	
<div class="footer-widgets">
      <div class="container">
        <div class="row">
          <?php
			if(is_active_sidebar('footer-1')){
			dynamic_sidebar('footer-1');
			}
			if(is_active_sidebar('footer-2')){
			dynamic_sidebar('footer-2');
			}
			
			if(is_active_sidebar('footer-3')){
			dynamic_sidebar('footer-3');
			}
			
			if(is_active_sidebar('footer-4')){
			dynamic_sidebar('footer-4');
			}
			
			
			?>          
        </div>
      </div>
    </div><!-- .footer-widgets -->	

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	
	<div class="footer-section">
      <div class="container">
        <div class="row">
          <div class="copyrights span6">       
			<?php if ( function_exists( 'ot_get_option' ) ) {
			  $credit_text = ot_get_option( 'credit_text' );
			  if($credit_text)
			  echo $credit_text;
			  }
			  ?>
          </div>
        
          <div class="social-links span6">
		  <?php 
			if ( function_exists( 'ot_get_option' ) ) {
			  $vimeo = ot_get_option( 'vimeo_url' );
			  if($vimeo)
			  echo "<a href='".$vimeo."' target='_blank'><i class='icon-vimeo'></i></a>";
			  }
			  
			  if ( function_exists( 'ot_get_option' ) ) {
			  $youtube = ot_get_option( 'youtube_url' );
			  if($youtube)
			  echo "<a href='".$youtube."' target='_blank'><i class='icon-youtube'></i></a>";
			  }
			  
			  if ( function_exists( 'ot_get_option' ) ) {
			  $skype = ot_get_option( 'skype_url' );
			  if($skype)
			  echo "<a href='".$skype."' target='_blank'><i class='icon-skype'></i></a>";
			  }
			  
			  if ( function_exists( 'ot_get_option' ) ) {
			  $facebook = ot_get_option( 'facebook_url' );
			  if($facebook)
			  echo "<a href='".$facebook."' target='_blank'><i class='icon-facebook'></i></a>";
			  }
			  
			  if ( function_exists( 'ot_get_option' ) ) {
			  $twitter = ot_get_option( 'twitter_url' );
			  if($twitter)
			  echo "<a href='".$twitter."' target='_blank'><i class='icon-twitter'></i></a>";
			  }
			  
			  if ( function_exists( 'ot_get_option' ) ) {
			  $dribbble = ot_get_option( 'dribbble_url' );
			  if($dribbble)
			  echo "<a href='".$dribbble."' target='_blank'><i class='icon-dribbble'></i></a>";
			  }
			  
			  
			?>
            
            
          </div>
        
          <a href="#" class="back-to-top-link"></a>
        </div>
      </div>
    </div><!-- .footer-section -->
</div><!-- #page -->

 </div><!-- .main-container -->
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/plugins.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>

<?php wp_footer(); ?>

</body>
</html>

