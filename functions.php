<?php
/**
 * Enron functions and definitions
 *
 * @package Enron
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'enron_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function enron_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Enron, use a find and replace
	 * to change 'enron' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'enron', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	
	
/**
 * This will hide the settings & documentation pages.
 */
add_filter( 'ot_show_pages', '__return_false' );
 
/**
 * Set theme mode true
 */
add_filter( 'ot_theme_mode', '__return_true' );

/** 
* Hide layout option from option tree
*/
add_filter( 'ot_show_new_layout', '__return_false' );

/**
 * Required: include OptionTree.
 */
include_once( 'option-tree/ot-loader.php' );
/**
 * Theme Options
*/
include_once( 'option-tree/assets/theme-mode/theme-options.php' );


require_once ("widget.php");

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'enron' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link', 'gallery' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'enron_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );
	
	add_theme_support( 'post-thumbnails' );
	
	
	
	
	
	$args = array(
                  'description' => 'Portfolio Post Type',
                  'show_ui' => true,
                  'menu_position' => 4,
                  'exclude_from_search' => true,
                  'labels' => array(
                                    'name'=> 'Portfolios',
                                    'singular_name' => 'Portfolios',
                                    'add_new' => 'Add New Portfolio',
                                    'add_new_item' => 'Add New Portfolio',
                                    'edit' => 'Edit Portfolios',
                                    'edit_item' => 'Edit Portfolio',
                                    'new-item' => 'New Portfolio',
                                    'view' => 'View Portfolios',
                                    'view_item' => 'View Portfolio',
                                    'search_items' => 'Search Portfolios',
                                    'not_found' => 'No Portfolios Found',
                                    'not_found_in_trash' => 'No Portfolios Found in Trash',
                                    'parent' => 'Parent Portfolio'
                                   ),
                 'public' => true,
                 'capability_type' => 'post',
                 'hierarchical' => false,
                 'rewrite' => true,
                 'supports' => array('title', 'editor', 'thumbnail', 'comments')
                 );
    register_post_type( 'portfolio' , $args );
	
	$args2 = array(
                  'description' => 'Client Post Type',
                  'show_ui' => true,
                  'menu_position' => 4,
                  'exclude_from_search' => true,
                  'labels' => array(
                                    'name'=> 'Clients',
                                    'singular_name' => 'Client',
                                    'add_new' => 'Add New Client',
                                    'add_new_item' => 'Add New Client',
                                    'edit' => 'Edit Client',
                                    'edit_item' => 'Edit Client',
                                    'new-item' => 'New Client',
                                    'view' => 'View Client',
                                    'view_item' => 'View Client',
                                    'search_items' => 'Search Client',
                                    'not_found' => 'No Client Found',
                                    'not_found_in_trash' => 'No Client Found in Trash',
                                    'parent' => 'Parent Client'
                                   ),
                 'public' => true,
                 'capability_type' => 'post',
                 'hierarchical' => false,
                 'rewrite' => true,
                 'supports' => array('title', 'editor', 'thumbnail', 'comments','custom-fields')
                 );
    register_post_type( 'client' , $args2 );
	
	$args3 = array(
                  'description' => 'Testimonial Post Type',
                  'show_ui' => true,
                  'menu_position' => 4,
                  'exclude_from_search' => true,
                  'labels' => array(
                                    'name'=> 'Testimonials',
                                    'singular_name' => 'Testimonial',
                                    'add_new' => 'Add New Testimonial',
                                    'add_new_item' => 'Add New Testimonial',
                                    'edit' => 'Edit Testimonial',
                                    'edit_item' => 'Edit Testimonial',
                                    'new-item' => 'New Testimonial',
                                    'view' => 'View Testimonial',
                                    'view_item' => 'View Testimonial',
                                    'search_items' => 'Search Testimonial',
                                    'not_found' => 'No Testimonial Found',
                                    'not_found_in_trash' => 'No Testimonial Found in Trash',
                                    'parent' => 'Parent Testimonial'
                                   ),
                 'public' => true,
                 'capability_type' => 'post',
                 'hierarchical' => false,
                 'rewrite' => true,
                 'supports' => array('title', 'editor', 'thumbnail', 'comments','custom-fields')
                 );
    register_post_type( 'testimonial' , $args3 );
	
	
	$args4 = array(
                  'description' => 'Team Post Type',
                  'show_ui' => true,
                  'menu_position' => 4,
                  'exclude_from_search' => true,
                  'labels' => array(
                                    'name'=> 'Team Members',
                                    'singular_name' => 'Team Member',
                                    'add_new' => 'Add New Team Member',
                                    'add_new_item' => 'Add New Team',
                                    'edit' => 'Edit Team Member',
                                    'edit_item' => 'Edit Team Member',
                                    'new-item' => 'New Team Member',
                                    'view' => 'View Team Member',
                                    'view_item' => 'View Team Member',
                                    'search_items' => 'Search Team Member',
                                    'not_found' => 'No Team Member Found',
                                    'not_found_in_trash' => 'No Team Member Found in Trash',
                                    'parent' => 'Parent Team Member'
                                   ),
                 'public' => true,
                 'capability_type' => 'post',
                 'hierarchical' => false,
                 'rewrite' => true,
                 'supports' => array('title', 'editor', 'thumbnail', 'comments')
                 );
    register_post_type( 'team' , $args4 );
	
	$args5 = array(
                  'description' => 'Price Post Type',
                  'show_ui' => true,
                  'menu_position' => 4,
                  'exclude_from_search' => true,
                  'labels' => array(
                                    'name'=> 'Price Packages',
                                    'singular_name' => 'Price Package',
                                    'add_new' => 'Add New Price Package',
                                    'add_new_item' => 'Add New Price Package',
                                    'edit' => 'Edit Price Package',
                                    'edit_item' => 'Edit Price Package',
                                    'new-item' => 'New Price Package',
                                    'view' => 'View Price Package',
                                    'view_item' => 'View Price Package',
                                    'search_items' => 'Search Price Package',
                                    'not_found' => 'No Team Price Package',
                                    'not_found_in_trash' => 'No Price Package Found in Trash',
                                    'parent' => 'Parent Price Package'
                                   ),
                 'public' => true,
                 'capability_type' => 'post',
                 'hierarchical' => false,
                 'rewrite' => true,
                 'supports' => array('title', 'editor', 'thumbnail', 'comments')
                 );
    register_post_type( 'price' , $args5 );
	
	register_taxonomy('portfolio_category',
                    'portfolio',
                     array (
                           'labels' => array (
                                              'name' => 'Portfolio Categories',
                                              'singular_name' => 'Portfolio Categories',
                                              'search_items' => 'Search Portfolio Categories',
                                              'popular_items' => 'Popular Portfolio Categories',
                                              'all_items' => 'All Portfolio Categories',
                                              'parent_item' => 'Parent Portfolio Category',
                                              'parent_item_colon' => 'Parent Portfolio Category:',
                                              'edit_item' => 'Edit Portfolio Category',
                                              'update_item' => 'Update Portfolio Category',
                                              'add_new_item' => 'Add New Portfolio Category',
                                              'new_item_name' => 'New Portfolio Category',
                                            ),
                            'hierarchical' =>true,
                            'show_ui' => true,
                            'show_tagcloud' => true,
                            'rewrite' => false,
                            'public'=>true
                            )
                     );		

	register_taxonomy('team_category',
                    'team',
                     array (
                           'labels' => array (
                                              'name' => 'Team Categories',
                                              'singular_name' => 'Team Categories',
                                              'search_items' => 'Search Team Categories',
                                              'popular_items' => 'Popular Team Categories',
                                              'all_items' => 'All Team Categories',
                                              'parent_item' => 'Parent Team Category',
                                              'parent_item_colon' => 'Parent Team Category:',
                                              'edit_item' => 'Edit Team Category',
                                              'update_item' => 'Update Team Category',
                                              'add_new_item' => 'Add New Team Category',
                                              'new_item_name' => 'New Team Category',
                                            ),
                            'hierarchical' =>true,
                            'show_ui' => true,
                            'show_tagcloud' => true,
                            'rewrite' => false,
                            'public'=>true
                            )
                     );			 					
}
endif; // enron_setup
add_action( 'after_setup_theme', 'enron_setup' );



//Adding the Open Graph in the Language Attributes
function add_opengraph_doctype( $output ) {
		return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
	}
add_filter('language_attributes', 'add_opengraph_doctype');

//Lets add Open Graph Meta Info

function insert_fb_in_head() {
	global $post;
	
	if ( function_exists( 'ot_get_option' ) ) {
	$og_facebook_id = ot_get_option( 'og_facebook_id' );
	$og_default_image = ot_get_option( 'og_default_image' );
	
	}
	
	
	if ( !is_singular()) //if it is not a post or a page
		return;
        echo '<meta property="fb:admins" content="'.$og_facebook_id.'"/>';
        echo '<meta property="og:title" content="' . get_the_title() . '"/>';
        echo '<meta property="og:type" content="article"/>';
        echo '<meta property="og:url" content="' . get_permalink() . '"/>';
        echo '<meta property="og:site_name" content="'.get_bloginfo('name').'"/>';
	if(!has_post_thumbnail( $post->ID )) { //the post does not have featured image, use a default image
		$default_image=$og_default_image; //replace this with a default image on your server or an image in your media library
		echo '<meta property="og:image" content="' . $default_image . '"/>';
	}
	else{
		$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
		echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
	}
	echo "
";
}
add_action( 'wp_head', 'insert_fb_in_head', 5 );


function enron_comment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP);

?>

 <li class="comment" <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
                  <div class="comment-entry">
                    <div class="comment-author">
                      <?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, 47 ); ?>
                    </div>
                    <div class="comment-content">
                      <div class="commenter-name">
                        <?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
                      </div>
                      <div class="comment-text entry-content">
                        <p><?php comment_text() ?></p>
                      </div>
                      <div class="comment-meta">
                        <!--<span class="timedate">August 18 2012 at 20:19</span> - <a class="comment-reply-link" href="#">Reply</a>-->
						<span class="timedate"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
						<?php
							/* translators: 1: date, 2: time */
							printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a>
							</span>
							<?php 
							
							edit_comment_link(__('(Edit)'),'  ','' );
							echo " - ";
							comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'])));
							
						?>
                      </div>
                    </div>
                  </div>
                  
                </li>
		
<?php
        }


add_action('wp_insert_post', 'mk_set_default_custom_fields');

 
function mk_set_default_custom_fields($post_id)
{

		
		   if ( $_GET['post_type'] == 'post') {
		 
				add_post_meta($post_id, 'video_embed_src', '', true);
				
				
			}
		
	
	return true;
 
    
}

add_action('admin_init','remove_custom_meta_boxes');
function remove_custom_meta_boxes() {
remove_meta_box('postcustom','testimonial','normal');
remove_meta_box('postcustom','client','normal');
remove_meta_box('postcustom','team','normal');
remove_meta_box('postcustom','price','normal');
}


function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

add_filter( 'template_include', 'include_template_function', 1 );

function include_template_function( $template_path ) {
    if ( get_post_type() == 'portfolio' ) {
        if ( is_single() ) {
            // checks if the file exists in the theme first,
            // otherwise serve the file from the plugin
            if ( $theme_file = locate_template( array ( 'single-portfolio.php' ) ) ) {
                $template_path = $theme_file;
            } else {
                $template_path = plugin_dir_path( __FILE__ ) . '/single-portfolio.php';
            }
        }
    }
    return $template_path;
}

function template_body_class() {
	

	if ( is_page( 'homepage-1' ) ) {		
		$classvalue = 'homepage-template-3';

	} elseif ( is_page( 'homepage-2' ) ) {	
		$classvalue = 'homepage-template-2';

	} elseif ( is_page( 'homepage-3' ) ) { 
		$classvalue = 'homepage-template-1';

	}
	return $classvalue;
}


add_action("admin_init", "price_meta_box");   
 
 
function price_meta_box(){  
    add_meta_box("priceInfo-meta", "Price Options", "price_meta_options", "price", "side", "low");  
}  
   
 
function price_meta_options(){  
        global $post;  
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
        $custom = get_post_custom($post->ID);  
        $price = $custom["price"][0];  
        $pricecolor= $custom["priceColor"][0];
		$highlight= $custom["priceHighlight"][0];
		$buynow= $custom["buyNowLink"][0]; 	
?>  
    <label>Price :</label>
	<br/><input name="price" value="<?php echo $price; ?>" />  
	<br/><label>Color :</label>
	<br/><input name="priceColor" value="<?php echo $pricecolor; ?>" />  
	<br/><label>Highlight :</label>
	<select name="priceHighlight">
		<option value="No" <?php if($highlight=='No') echo "selected";?>>No</option>  
		<option value="Yes" <?php if($highlight=='Yes') echo "selected";?>>Yes</option>
	</select>	
		<br/>
	<label>Buy Now Link :</label><input name="buyNowLink" value="<?php echo $buynow; ?>" />  
	
<?php  
if ( function_exists( 'ot_get_option' ) ) {
	$customPriceItem = ot_get_option( 'custom_price_item' );

	if($customPriceItem){
		foreach($customPriceItem as $priceItem){
			
			$priceItemTitle=str_replace(' ','_',$priceItem['title']);
			$priceItemValue=$custom[$priceItemTitle][0];
			?>
			<br/><label><?php echo $priceItem['title'];?> :</label>
			<br/><input name="<?php echo $priceItemTitle;?>" value="<?php echo $priceItemValue; ?>" />  
			<?php
		}
	}	
}


    }
	

add_action('save_post', 'save_price_detail'); 
   
function save_price_detail(){  
    global $post;  
     
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){ 
        return $post_id;
    }else{
        update_post_meta($post->ID, "price", $_POST["price"]); 
        update_post_meta($post->ID, "priceColor", $_POST["priceColor"]); 
        update_post_meta($post->ID, "priceHighlight", $_POST["priceHighlight"]); 
        update_post_meta($post->ID, "buyNowLink", $_POST["buyNowLink"]); 
		
		if ( function_exists( 'ot_get_option' ) ) {
			$customPriceItem = ot_get_option( 'custom_price_item' );

			if($customPriceItem){
				foreach($customPriceItem as $priceItem){
					$priceItemTitle=str_replace(' ','_',$priceItem['title']);
					 update_post_meta($post->ID, $priceItemTitle, $_POST[$priceItemTitle]);
				}
			}	
		}
    } 
}	


add_action("admin_init", "team_meta_box"); 
 
 
function team_meta_box(){  
    add_meta_box("teamInfo-meta", "Team Options", "team_meta_options", "team", "side", "low");  
}  
   
 
function team_meta_options(){  
        global $post;  
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
        $custom = get_post_custom($post->ID);  
        $link = $custom["teamLink"][0];  
        $email = $custom["teamEmail"][0];  
?>  
    <label>Website</label><br><input name="teamLink" value="<?php echo $link; ?>" />  
	<label>Email</label><br><input name="teamEmail" value="<?php echo $email; ?>" />  
<?php  
    }
	

add_action('save_post', 'save_team_link'); 
   
function save_team_link(){  
    global $post;  
     
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){ 
        return $post_id;
    }else{
        update_post_meta($post->ID, "teamLink", $_POST["teamLink"]); 
        update_post_meta($post->ID, "teamEmail", $_POST["teamEmail"]); 
    } 
}	

add_action("admin_init", "testimonial_meta_box"); 
 
 
function testimonial_meta_box(){  
    add_meta_box("testimonial-meta", "Testimonial Options", "testimonial_meta_options", "testimonial", "side", "low");  
}  
   
 
function testimonial_meta_options(){  
        global $post;  
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
        $custom = get_post_custom($post->ID);  
        $name = $custom["testimonial_name"][0];  
        $company = $custom["testimonial_company"][0];  
?>  
    <label>Name</label><br><input name="testimonial_name" value="<?php echo $name; ?>" />  
	<label>Company</label><br><input name="testimonial_company" value="<?php echo $company; ?>" />  
<?php  
    }
	

add_action('save_post', 'save_testimonial_options'); 
   
function save_testimonial_options(){  
    global $post;  
     
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){ 
        return $post_id;
    }else{
        update_post_meta($post->ID, "testimonial_name", $_POST["testimonial_name"]); 
        update_post_meta($post->ID, "testimonial_company", $_POST["testimonial_company"]); 
    } 
}	



add_action("admin_init", "portfolio_meta_box");   
 
 
function portfolio_meta_box(){  
    add_meta_box("projInfo-meta", "Project Options", "portfolio_meta_options", "portfolio", "side", "low");  
}  
   
 
function portfolio_meta_options(){  
        global $post;  
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
        $custom = get_post_custom($post->ID);  
        $link = $custom["projLink"][0];  
?>  
    <label>Link:</label><input name="projLink" value="<?php echo $link; ?>" />  
<?php  
    }
	

add_action('save_post', 'save_project_link'); 
   
function save_project_link(){  
    global $post;  
     
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){ 
        return $post_id;
    }else{
        update_post_meta($post->ID, "projLink", $_POST["projLink"]); 
    } 
}	
	

add_filter("manage_edit-portfolio_columns", "portfolio_edit_columns");
 
function portfolio_edit_columns($columns){
   $columns = array(
                    "cb" => "<input type=\"checkbox\" />",
                    "photo" => __("Image"),
                    "title" => __("Portfolio"),
                    "portfolio_category" => __("Portfolio Category"),
                    "date" => __("Date")
                   );
 
   return $columns;
}
 
add_action("manage_portfolio_posts_custom_column",  "portfolio_custom_columns");
 
function portfolio_custom_columns($column){
  global $post;
  switch ($column){
                 case "photo":
                     if(has_post_thumbnail()) the_post_thumbnail(array(50,50));
                 break;
                 case "portfolio_category":
                     echo get_the_term_list($post->ID, 'portfolio_category', '', ', ','');
                 break;
   }
}

 

  // add_action( 'restrict_manage_posts','portfolio_type_filter_list' );
   //add_filter( 'parse_query','perform_filtering' );
 
function portfolio_type_filter_list() {
   global $typenow, $wp_query;
   if ($typenow=='portfolio') {
      wp_dropdown_categories(array(
                                   'show_option_all' => 'Show All Portfolio Category',
                                   'taxonomy' => 'portfolio_category',
                                   'name' => 'portfolio_category',
                                   'orderby' => 'name',
                                   'selected' =>( isset( $wp_query->query['portfolio_category'] ) ? $wp_query->query['portfolio_category'] : '' ),
                                   'hierarchical' => false,
                                   'depth' => 3,
                                   'show_count' => false,
                                   'hide_empty' => true,
                            ));
 
   }
}
 
function perform_filtering( $query ){
   $qv = &$query->query_vars;
   if (( $qv['portfolio_category'] ) && is_numeric( $qv['portfolio_category'] ) ) {
      $term = get_term_by( 'id', $qv['portfolio_category'], 'portfolio_category' );
      $qv['portfolio_category'] = $term->slug;
   }
}

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function enron_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'enron' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer 1', 'enron' ),
		'id'            => 'footer-1',
		'before_widget' => '<div id="%1$s" class="widget span3 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer 2', 'enron' ),
		'id'            => 'footer-2',
		'before_widget' => '<div id="%1$s" class="widget span3 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer 3', 'enron' ),
		'id'            => 'footer-3',
		'before_widget' => '<div id="%1$s" class="widget span3 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer 4', 'enron' ),
		'id'            => 'footer-4',
		'before_widget' => '<div id="%1$s" class="widget span3 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Homepage 1', 'enron' ),
		'id'            => 'homepage-1',
		'before_widget' => '<div id="%1$s" class="widget span3 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Homepage 2', 'enron' ),
		'id'            => 'homepage-2',
		'before_widget' => '<div id="%1$s" class="widget span3 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Homepage 3', 'enron' ),
		'id'            => 'homepage-3',
		'before_widget' => '<div id="%1$s" class="widget span3 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Homepage 4', 'enron' ),
		'id'            => 'homepage-4',
		'before_widget' => '<div id="%1$s" class="widget span3 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Portfolio 1', 'enron' ),
		'id'            => 'portfolio-1',
		'before_widget' => '<div id="%1$s" class="widget span3 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Portfolio 2', 'enron' ),
		'id'            => 'portfolio-2',
		'before_widget' => '<div id="%1$s" class="widget span3 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Widget Page 1', 'enron' ),
		'id'            => 'singlepage-1',
		'before_widget' => '<div id="%1$s" class="widget span3 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Widget Page 2', 'enron' ),
		'id'            => 'singlepage-2',
		'before_widget' => '<div id="%1$s" class="widget span3 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Widget Page 3', 'enron' ),
		'id'            => 'singlepage-3',
		'before_widget' => '<div id="%1$s" class="widget span3 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Widget Page 4', 'enron' ),
		'id'            => 'singlepage-4',
		'before_widget' => '<div id="%1$s" class="widget span3 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
	
}
add_action( 'widgets_init', 'enron_widgets_init' );




/**
 * Enqueue scripts and styles.
 */
function enron_scripts() {
	wp_enqueue_style( 'enron-style', get_stylesheet_uri() );

	wp_enqueue_script( 'enron-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'enron-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'enron_scripts' );


/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
