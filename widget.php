<?php
class Testimonial extends WP_Widget {
 
    function Testimonial() {      
        $widget_ops = array( 'classname' => 'testimonial_widget', 'description' => 'Show your clients testimonials' );
                $this->WP_Widget( 'testimonial_widget', 'Enron - Testimonials', $widget_ops);
    }
 
    function form($instance) {
	
		$instance = wp_parse_args( (array) $instance, array('title' => 'Testimonials', 'number' => 2) );
	 
		$title = esc_attr($instance['title']);
		$number = absint($instance['number']);
		
		?>
				<p>
					<label for="<?php echo $this->get_field_id('title'); ?>">
					   Title:
					</label>
						<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
				</p>	
	 
				<p>
					<label for="<?php echo $this->get_field_id('number'); ?>">
					   Number of Testimonials:
					</label>
						<input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" />
				</p>
	 
	 
		<?php
    }
 
    function update($new_instance, $old_instance) {
		
		$instance=$old_instance;
	 
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number']=$new_instance['number'];
		return $instance;
		
		
    }
 
    function widget($args, $instance) {
	
		extract($args);
 
		$title = apply_filters('widget_title', $instance['title']);
		if ( empty($title) ) $title = false;
		$number = absint( $instance['number'] );
		
		query_posts('post_type=testimonial&posts_per_page='.$number);
		
		?>
		
		<div class="widget-testimony widget span3">
		<?php
     
		if($title){
			echo $before_title;
			echo $title; 
			echo $after_title;
		}
		
	
		while ( have_posts() ) : the_post();
		$custom = get_post_custom(); 		
		?>
		 <div class="testimony-item">
              <div class="testimony-text">
                <div class="testimony-text-inner">
                 <?php echo the_content();?>
                </div>
              </div>
              <div class="testimony-author">
                <a href="<?php the_permalink(); ?>"><b><?php //the_title();?><?php echo $custom['testimonial_name'][0];?> - <?php echo $custom['testimonial_company'][0];?></b></a>
              </div>
            </div>
			<div style="clear:both;height:10px;"></div>
		<?php
		endwhile;
		?>
		</div><!-- .widget-testimony -->
		
		<?php
		
    }
 
}
 
 
add_action( 'widgets_init', 'testimonial_load_widgets' );
function testimonial_load_widgets() {
    register_widget('Testimonial');
}

class Video extends WP_Widget {
 
    function Video() {      
        $widget_ops = array( 'classname' => 'video_widget', 'description' => 'Show your featured video' );
                $this->WP_Widget( 'video_widget', 'Enron - Video Embed', $widget_ops);
    }
 
    function form($instance) {
	
		$instance = wp_parse_args( (array) $instance, array('title' => 'Video', 'source' => '') );
	 
		$title = esc_attr($instance['title']);
		$source = $instance['source'];
		
		?>
				<p>
					<label for="<?php echo $this->get_field_id('title'); ?>">
					   Title:
					</label>
						<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
				</p>	
	 
				<p>
					<label for="<?php echo $this->get_field_id('source'); ?>">
					   Embed Source:
					</label>
						<textarea class="widefat" id="<?php echo $this->get_field_id('source'); ?>" name="<?php echo $this->get_field_name('source'); ?>"><?php echo $source; ?></textarea>
				</p>
	 
	 
		<?php
    }
 
    function update($new_instance, $old_instance) {
		
		$instance=$old_instance;
	 
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['source']=$new_instance['source'];
		return $instance;
		
		
    }
 
    function widget($args, $instance) {
	
		extract($args);
 
		$title = apply_filters('widget_title', $instance['title']);
		if ( empty($title) ) $title = false;
		$source = $instance['source'];
		
		
		?>
		
		<div class="widget span3">
		<?php
     
		if($title){
			echo $before_title;
			echo $title; 
			echo $after_title;
		}	
				
		echo $source;
		
		?>
		</div><!-- .widget-testimony -->
		
		<?php
		
    }
 
}
 
 
add_action( 'widgets_init', 'video_load_widgets' );
function video_load_widgets() {
    register_widget('Video');
}

class Accordion extends WP_Widget {
 
    function Accordion() {      
        $widget_ops = array( 'classname' => 'accordion_widget', 'description' => 'Show your accordion content' );
                $this->WP_Widget( 'accordion_widget', 'Enron - Accordion', $widget_ops);
    }
 
    function form($instance) {
	
		$instance = wp_parse_args( (array) $instance, array('title' => 'Accordion', 'show_icon' => 'yes', 'content_title_1' => '', 'content_1', 'content_title_2' => '', 'content_2', 'content_title_3' => '', 'content_3', 'content_title_4' => '', 'content_4', 'content_title_5' => '', 'content_5', ) );
	 
		$title = esc_attr($instance['title']);
		$show_icon = $instance['show_icon'];
		$content_title_1 = $instance['content_title_1'];
		$content_title_2 = $instance['content_title_2'];
		$content_title_3 = $instance['content_title_3'];
		$content_title_4 = $instance['content_title_4'];
		$content_title_5 = $instance['content_title_5'];
		$content_1 = $instance['content_1'];
		$content_2 = $instance['content_2'];
		$content_3 = $instance['content_3'];
		$content_4 = $instance['content_4'];
		$content_5 = $instance['content_5'];
		
		?>
				<p>
					<label for="<?php echo $this->get_field_id('title'); ?>">
					   Title:
					</label>
						<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
				</p>	
				<p>
					<label for="<?php echo $this->get_field_id('show_icon'); ?>">
					   Show Icon:
					</label>
						<select id="<?php echo $this->get_field_id('show_icon'); ?>" name="<?php echo $this->get_field_name('show_icon'); ?>">
							<option value="yes" <?php if($show_icon=='yes') echo "selected";?>>Yes</option>
							<option value="no" <?php if($show_icon=='no') echo "selected";?>>No</option>
						</select>	
				</p>	
				<p>
					<label for="<?php echo $this->get_field_id('content_title_1'); ?>">
					   Content Title 1:
					</label>
						<input class="widefat" id="<?php echo $this->get_field_id('content_title_1'); ?>" name="<?php echo $this->get_field_name('content_title_1'); ?>" type="text" value="<?php echo $content_title_1; ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('content_title_2'); ?>">
					   Content Title 2:
					</label>
						<input class="widefat" id="<?php echo $this->get_field_id('content_title_2'); ?>" name="<?php echo $this->get_field_name('content_title_2'); ?>" type="text" value="<?php echo $content_title_2; ?>" />
				</p>				
				<p>
					<label for="<?php echo $this->get_field_id('content_title_3'); ?>">
					   Content Title 3:
					</label>
						<input class="widefat" id="<?php echo $this->get_field_id('content_title_3'); ?>" name="<?php echo $this->get_field_name('content_title_3'); ?>" type="text" value="<?php echo $content_title_3; ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('content_title_4'); ?>">
					   Content Title 4:
					</label>
						<input class="widefat" id="<?php echo $this->get_field_id('content_title_4'); ?>" name="<?php echo $this->get_field_name('content_title_4'); ?>" type="text" value="<?php echo $content_title_4; ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('content_title_5'); ?>">
					   Content Title 5:
					</label>
						<input class="widefat" id="<?php echo $this->get_field_id('content_title_5'); ?>" name="<?php echo $this->get_field_name('content_title_5'); ?>" type="text" value="<?php echo $content_title_5; ?>" />
				</p>
				
				<p>
					<label for="<?php echo $this->get_field_id('content_1'); ?>">
					   Content 1:
					</label>
						<textarea class="widefat" id="<?php echo $this->get_field_id('content_1'); ?>" name="<?php echo $this->get_field_name('content_1'); ?>"><?php echo $content_1; ?></textarea>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('content_2'); ?>">
					   Content 2:
					</label>
						<textarea class="widefat" id="<?php echo $this->get_field_id('content_2'); ?>" name="<?php echo $this->get_field_name('content_2'); ?>"><?php echo $content_2; ?></textarea>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('content_3'); ?>">
					   Content 3:
					</label>
						<textarea class="widefat" id="<?php echo $this->get_field_id('content_3'); ?>" name="<?php echo $this->get_field_name('content_3'); ?>"><?php echo $content_3; ?></textarea>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('content_4'); ?>">
					   Content 4:
					</label>
						<textarea class="widefat" id="<?php echo $this->get_field_id('content_4'); ?>" name="<?php echo $this->get_field_name('content_4'); ?>"><?php echo $content_4; ?></textarea>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('content_5'); ?>">
					   Content 4:
					</label>
						<textarea class="widefat" id="<?php echo $this->get_field_id('content_5'); ?>" name="<?php echo $this->get_field_name('content_5'); ?>"><?php echo $content_5; ?></textarea>
				</p>
	 
		<?php
    }
 
    function update($new_instance, $old_instance) {
		
		$instance=$old_instance;
	 
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['show_icon'] = $new_instance['show_icon'];
		$instance['content_title_1']=$new_instance['content_title_1'];
		$instance['content_title_2']=$new_instance['content_title_2'];
		$instance['content_title_3']=$new_instance['content_title_3'];
		$instance['content_title_4']=$new_instance['content_title_4'];
		$instance['content_title_5']=$new_instance['content_title_5'];
		$instance['content_1']=$new_instance['content_1'];
		$instance['content_2']=$new_instance['content_2'];
		$instance['content_3']=$new_instance['content_3'];
		$instance['content_4']=$new_instance['content_4'];
		$instance['content_5']=$new_instance['content_5'];
		return $instance;
		
		
    }
 
    function widget($args, $instance) {
	
		extract($args);
 
		$title = apply_filters('widget_title', $instance['title']);
		if ( empty($title) ) $title = false;
		$show_icon = $instance['show_icon'];
		$content_title_1 = $instance['content_title_1'];
		$content_title_2 = $instance['content_title_2'];
		$content_title_3 = $instance['content_title_3'];
		$content_title_4 = $instance['content_title_4'];
		$content_title_5 = $instance['content_title_5'];
		$content_1 = $instance['content_1'];
		$content_2 = $instance['content_2'];
		$content_3 = $instance['content_3'];
		$content_4 = $instance['content_4'];
		$content_5 = $instance['content_5'];
		
		
		?>
		
		<div class="widget widget-accordion span3">
              <?php if($title) { ?>
			  <h4 class="widget-title"><?php echo $title;?></h4>
			  
			  <?php } ?>
			  
			  
			  <?php if($content_title_1) { ?>
              <div class="accordion-header">
			  <?php if($show_icon=='yes') { ?>
			  <span class="icon"></span> 
			  <?php } ?>
			  
			  <?php echo $content_title_1;?></div>
              <div class="accordion-panel">
                <p><?php echo $content_1;?></p>
              </div>
			  <?php } ?>
              <?php if($content_title_2) { ?>
              <div class="accordion-header"> 
			  <?php if($show_icon=='yes') { ?>
			  <span class="icon"></span> 
			  <?php } ?> <?php echo $content_title_2;?></div>
              <div class="accordion-panel">
                <p><?php echo $content_2;?></p>
              </div>
			  <?php } ?>
				<?php if($content_title_3) { ?>
              <div class="accordion-header">
			    <?php if($show_icon=='yes') { ?>
			  <span class="icon"></span> 
			  <?php } ?> <?php echo $content_title_3;?></div>
              <div class="accordion-panel">
                <p><?php echo $content_3;?></p>
              </div>
			  <?php } ?>
			  <?php if($content_title_4) { ?>
              <div class="accordion-header"> 
			  <?php if($show_icon=='yes') { ?>
			  <span class="icon"></span> 
			  <?php } ?> <?php echo $content_title_4;?></div>
              <div class="accordion-panel">
                <p><?php echo $content_4;?></p>
              </div>
			  <?php } ?>
			  <?php if($content_title_5) { ?>
              <div class="accordion-header"> 
			   <?php if($show_icon=='yes') { ?>
			  <span class="icon"></span> 
			  <?php } ?> <?php echo $content_title_5;?></div>
              <div class="accordion-panel">
                <p><?php echo $content_5;?></p>
              </div>
			  <?php } ?>
            </div><!-- .widget-accordion -->
		
		<?php
		
    }
 
}
 
 
add_action( 'widgets_init', 'accordion_load_widgets' );
function accordion_load_widgets() {
    register_widget('Accordion');
}



class Clients extends WP_Widget {
 
    function Clients() {      
        $widget_ops = array( 'classname' => 'clients_widget', 'description' => 'Show your clients' );
                $this->WP_Widget( 'clients_widget', 'Enron - Clients', $widget_ops);
    }
 
    function form($instance) {
	
		$instance = wp_parse_args( (array) $instance, array('title' => 'Clients', 'number' => 4) );
	 
		$title = esc_attr($instance['title']);
		$number = absint($instance['number']);
		
		?>
				<p>
					<label for="<?php echo $this->get_field_id('title'); ?>">
					   Title:
					</label>
						<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
				</p>	
	 
				<p>
					<label for="<?php echo $this->get_field_id('number'); ?>">
					   Number of Clients:
					</label>
						<input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" />
				</p>
	 
	 
		<?php
    }
 
    function update($new_instance, $old_instance) {
		
		$instance=$old_instance;
	 
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number']=$new_instance['number'];
		return $instance;
		
		
    }
 
    function widget($args, $instance) {
	
		extract($args);
 
		$title = apply_filters('widget_title', $instance['title']);
		if ( empty($title) ) $title = false;
		$number = absint( $instance['number'] );
		
		query_posts('post_type=client&posts_per_page='.$number);
		
		?>
		<div class="widget-client widget span3">
		<?php
     
		if($title){
			echo $before_title;
			echo $title; 
			echo $after_title;
		}
		
		?>
		<div class="client-list">
		<?php
		while ( have_posts() ) : the_post();
				
		?>
              <div class="client-item">
                <div class="item-inner"><?php the_post_thumbnail();?></div>
              </div>           
		<?php
		endwhile;
		?>
		  </div>
		</div><!-- .widget-client -->
		<?php
		
    }
 
}
 
 
add_action( 'widgets_init', 'clients_load_widgets' );
function clients_load_widgets() {
    register_widget('Clients');
}

class Contact_Form extends WP_Widget {
 
    function Contact_Form() {      
        $widget_ops = array( 'classname' => 'contact_form_widget', 'description' => 'Contact Form Widget' );
                $this->WP_Widget( 'contact_form_widget', 'Enron - Contact Form', $widget_ops);
    }
 
    function form($instance) {
	
		$instance = wp_parse_args( (array) $instance, array('title' => 'Contact Form', 'email' => '') );
	 
		$title = esc_attr($instance['title']);
		$email = $instance['email'];
		
		?>
				<p>
					<label for="<?php echo $this->get_field_id('title'); ?>">
					   Title:
					</label>
						<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
				</p>	
	 
				<p>
					<label for="<?php echo $this->get_field_id('email'); ?>">
					   Email Admin:
					</label>
						<input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo $email; ?>" />
				</p>
	 
	 
		<?php
    }
 
    function update($new_instance, $old_instance) {
		
		$instance=$old_instance;
	 
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['email']=$new_instance['email'];
		return $instance;
		
		
    }
 
    function widget($args, $instance) {
	
		if(isset($_POST['submitted'])) {
			if(trim($_POST['contactName']) === '') {
				$nameError = 'Please enter your name.';
				$hasError = true;
			} else {
				$name = trim($_POST['contactName']);
			}

			if(trim($_POST['email']) === '')  {
				$emailError = 'Please enter your email address.';
				$hasError = true;
			} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
				$emailError = 'You entered an invalid email address.';
				$hasError = true;
			} else {
				$email = trim($_POST['email']);
			}

			if(trim($_POST['comments']) === '') {
				$commentError = 'Please enter a message.';
				$hasError = true;
			} else {
				if(function_exists('stripslashes')) {
					$comments = stripslashes(trim($_POST['comments']));
				} else {
					$comments = trim($_POST['comments']);
				}
			}

			if(!isset($hasError)) {
				$emailTo=$instance['email'];	
				//$emailTo = get_option('tz_email');
				if (!isset($emailTo) || ($emailTo == '') ){
					$emailTo = get_option('admin_email');
				}
				$subject = '[Enron Message] From '.$name;
				$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
				$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
				
				//echo $emailTo." ".$subject." ".$body." ".$headers;

				wp_mail($emailTo, $subject, $body, $headers);
				$emailSent = true;
			}

		}
	
		extract($args);
 
		$title = apply_filters('widget_title', $instance['title']);
		if ( empty($title) ) $title = false;
				
		
		
		?>
		<div class="widget-contact widget span3">
		<?php if($title){ ?>
		<h4 class="widget-title"><?php echo $title;?></h4>
		<?php } 
			
		 if(isset($emailSent) && $emailSent == true) { ?>
							<div class="thanks">
								<p>Thanks, your email was sent successfully.</p>
							</div>
						<?php } else { ?>
							<?php if(isset($hasError) || isset($captchaError)) { ?>
								<p class="error">Sorry, an error occured.<p>
							<?php } 
							}
		
		?>
		<form class="contact-form" action="" id="contactForm" method="post">
              <div class="form-row">
                <label for="">Name</label>
                <input type="text" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="required requiredField" />
								<?php if($nameError != '') { ?>
									<span class="error"><?php echo $nameError;?></span>
								<?php } ?>
              </div>
              <div class="form-row">
                <label for="">Email</label>
               <input type="text" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="required requiredField email" />
								<?php if($emailError != '') { ?>
									<span class="error"><?php echo $emailError;?></span>
								<?php } ?>
              </div>
              <div class="form-row">
                <label for="">Message</label>
				<textarea name="comments" id="commentsText" rows="4" cols="30" class="required requiredField"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
								<?php if($commentError != '') { ?>
									<span class="error"><?php echo $commentError;?></span>
								<?php } ?>
              </div>
              <button type="submit" class="submit">Send <i class="icon-chevron-right"></i></button>
			  <input type="hidden" name="submitted" id="submitted" value="true" />
            </form>
		</div><!-- .widget-contact -->	
		<?php
		
    }
 
}


 
add_action( 'widgets_init', 'contact_form_load_widgets' );
function contact_form_load_widgets() {
    register_widget('Contact_Form');
}


class Twitter extends WP_Widget {
 
    function Twitter() {      
        $widget_ops = array( 'classname' => 'twitter_widget', 'description' => 'Show your lastest tweets' );
                $this->WP_Widget( 'twitter_widget', 'Enron - Latest Tweets', $widget_ops);
    }
 
    function form($instance) {
	
		$instance = wp_parse_args( (array) $instance, array('title' => 'Latest Tweets', 'number' => 5, 'username'=>'') );
	 
		$title = esc_attr($instance['title']);
		$username = esc_attr($instance['username']);
		$number = absint($instance['number']);
		
		?>
				<p>
					<label for="<?php echo $this->get_field_id('title'); ?>">
					   Title:
					</label>
						<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
				</p>	
				<p>
					<label for="<?php echo $this->get_field_id('username'); ?>">
					   Username:
					</label>
						<input class="widefat" id="<?php echo $this->get_field_id('username'); ?>" name="<?php echo $this->get_field_name('username'); ?>" type="text" value="<?php echo $username; ?>" />
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('number'); ?>">
					   Number of Tweets:
					</label>
						<input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" />
				</p>
	 
	 
		<?php
    }
 
    function update($new_instance, $old_instance) {
		
		$instance=$old_instance;
	 
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['username'] = strip_tags($new_instance['username']);
		$instance['number']=$new_instance['number'];
		return $instance;
		
		
    }
 
    function widget($args, $instance) {
	
		extract($args);
 
		$title = apply_filters('widget_title', $instance['title']);
		if ( empty($title) ) $title = false;
		$username = $instance['username'];
		$number = absint( $instance['number'] );
						
		?>
		 <div class="widget-twitter widget span3">
			<?php if($title) { ?>
            <h4 class="widget-title"><?php echo $title;?></h4>
			<?php } 
			
			if($username){
				
				include_once("twitteroauth/twitteroauth.php"); //Path to twitteroauth library
				 
				$twitteruser = $username;
				$notweets = $number;
				$consumerkey = "dl7D8n6WJBkUuJaffdcuYzvJ1";
				$consumersecret = "bxPoldS3SE4NlXpX4mBH6FifTy4QAlOpROV7th2dumA8UuYVrJ";
				$accesstoken = "68435566-YL3S3QFN5W7ziUSJpXheBINrIT2saxpsYHaMJn4yn";
				$accesstokensecret = "MeUY7fj6e7rCprjgxD6AuBcXgcbMEelLZuvgplz4amK8a";
				 
				function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
				  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
				  return $connection;
				}
				 
				$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
				 
				$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);
				 
			
			?>
				<ul class="tweet-list">
				<?php if ( $tweets == "" ) : ?>
					<li><?php _e( 'No items', 'enron' ); ?></li>
				<?php else : ?>
				
						<?php foreach ( $tweets as $item ) : ?>
							<li>
							<div class="tweet-content">
								
									<?php echo $item->text; ?>
								
							</div>
							</li>
						<?php endforeach; ?>
				<?php endif; ?>
				  
				</ul>
				<?php } ?>
			</div><!-- .widget-twitter -->
		<?php
			
		
		
    }
 
}
 
 
add_action( 'widgets_init', 'twitter_load_widgets' );
function twitter_load_widgets() {
    register_widget('Twitter');
}
?>