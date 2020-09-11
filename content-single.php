<?php
/**
 * @package Enron
 */
?>

<div class="entry-post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
              <h2 class="entry-title"><?php the_title(); ?></h2>

              <ul class="entry-meta">
                <li class="entry-date">
                  <i class="icon-calendar"></i> <?php enron_posted_on(); ?>
                </li>
                <li class="entry-author">
                  <i class="icon-edit"></i> <?php the_author_posts_link(); ?>
                </li>
                <li class="entry-author">
                  <i class="icon-bubble"></i> <a href="<?php comments_link(); ?>"><?php comments_number( __( 'no comments', 'enron' ), __( 'one comment', 'enron' ), __( '% comments', 'enron' ) );  ?></a>
                </li>
				
				<?php 
				if(has_tag()){
				?>
                <li>
                  <i class="icon-tags"></i> <?php the_tags(''); ?>
                </li>
				
				<?php } ?>
				
				<li><?php edit_post_link(); ?></li>

              </ul>

              
			  <?php			  
			 
			$postId=get_the_ID();
				
				
			  
				$format = get_post_format();
				if ( $format=='gallery' ) {
				?>
				
				<div class="entry-media">
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
				
				
				<?php	
				} else if($format=='video'){
				?>
				
				<div class="entry-media">
                <div class="media-video">
		
				<?php
					$video_src= get_post_custom_values('video_embed_src');
					//echo $video_src[0];
					?>
               
                </div>
              </div>
				
				<?php
				} else if($format=='image'){
				?>
				
				<div class="entry-media">
                <div class="entry-image">
                  <a href="#">
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
              </div>
				
				<?php
				} else {
					if ( has_post_thumbnail() ) { 
					  the_post_thumbnail();
					}  
				}
				
				
				
			  
			  ?>
			  
			  
			  
              <div class="entry-content">
               <?php the_content();?> 
			   
			   
			   <?php 
			   
			   if ( function_exists( 'ot_get_option' ) ) {
				$share_button = ot_get_option( 'share_button' );
				
				
				}
				if($share_button=="on"){
				
				?>
			   
			   <br>
			   
			   <!-- AddThis Button BEGIN -->
			<div class="addthis_toolbox addthis_default_style ">
			<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
			<a class="addthis_button_tweet"></a>
			<a class="addthis_button_pinterest_pinit" pi:pinit:layout="horizontal"></a>
			<a class="addthis_counter addthis_pill_style"></a>
			</div>
			<script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
			<script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js"></script>
			<!-- AddThis Button END -->
			   
			   <?php
			   
			   }
					wp_link_pages( array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'enron' ),
						'after'  => '</div>',
					) );
				?>
				
				
              </div>
            </div><!-- .entry-post -->


