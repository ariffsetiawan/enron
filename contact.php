<?php
/*
Template Name: Contact
*/
get_header(); 

 if ( function_exists( 'ot_get_option' ) ) {
			  $latitude = ot_get_option( 'latitude' );
			  
			 
			  }
			  
			  if ( function_exists( 'ot_get_option' ) ) {
			  $longitude = ot_get_option( 'longitude' );
			  
			 
			  }
			  
			  if ( function_exists( 'ot_get_option' ) ) {
			  $address = ot_get_option( 'address' );
			  
			 
			  }
			 
?>


	<div class="content-section">
		<div class="container">

        <div class="page-title call-to-action section-bordered without-border">
          <div class="row">
            <h2 class="call-action-title span8"><?php the_title();?></h2>
          </div>
        </div><!-- .call-to-contact -->
        
        <div class="map-section">
          <div class="google-maps" data-latitude="<?php echo $latitude;?>" data-longitude="<?php echo $longitude;?>" data-marker-icon="<?php echo get_template_directory_uri(); ?>/images/map-marker.png"></div>
        </div>

        <div class="contact-details row">
          <div class="contact-address widget span3">
            <h4 class="widget-title"><?php _e( 'Contact Info', 'enron' ); ?></h4>

            <address>
              <?php echo $address;?>
            </address>
          </div><!-- .contact-address -->

          <div class="contact-form span9">
            <form action="">
              <div class="form-row">
                <div class="col1 input-wrapper">
                  <label for="" style="color: #6F6F6F;left: 12px;position: absolute;top: 8px;display: block;margin-bottom: 5px;"><?php _e( 'Name', 'enron' ); ?></label>
                  <input type="text">
                  <i class="icon-3d-glasses"></i>
                </div>

                <div class="col2 input-wrapper">
                  <label for="" style="color: #6F6F6F;left: 12px;position: absolute;top: 8px;display: block;margin-bottom: 5px;"><?php _e( 'Email', 'enron' ); ?></label>
                  <input type="text">
                  <i class="icon-envelope"></i>
                </div>
              </div>

              <div class="form-row">
                <div class="col1 input-wrapper">
                  <label for="" style="color: #6F6F6F;left: 12px;position: absolute;top: 8px;display: block;margin-bottom: 5px;"><?php _e( 'Subject', 'enron' ); ?></label>
                  <input type="text">
                  <i class="icon-bubble"></i>
                </div>

                <div class="col2 input-wrapper">
                  <label for="" style="color: #6F6F6F;left: 12px;position: absolute;top: 8px;display: block;margin-bottom: 5px;"><?php _e( 'Phone', 'enron' ); ?></label>
                  <input type="text">
                  <i class="icon-phone"></i>
                </div>
              </div>

              <div class="form-row">
                <div class="input-wrapper">
                  <label for="" style="color: #6F6F6F;left: 12px;position: absolute;top: 8px;display: block;margin-bottom: 5px;"><?php _e( 'Message', 'enron' ); ?></label>
                  <textarea name="" id="" cols="30" rows="10"></textarea>
                  <i class="icon-edit"></i>
                </div>
              </div>

              <button type="submit" class="btn btn-orange btn-bold"><?php _e( 'Send Email', 'enron' ); ?> <i class="icon-chevron-right"></i></button>
            </form>
          </div><!-- .contact-form -->
        </div><!-- .contact-details -->

      </div>
    </div><!-- .content-section -->
	
<?php get_footer(); ?>