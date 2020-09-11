<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Enron
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>
<?php
			if ( function_exists( 'ot_get_option' ) ) {
			  $favicon = ot_get_option( 'custom_favicon' );
			  
			  ?>
			   <link rel="shortcut icon" href="<?php echo $favicon;?>">
			  <?php
			} 

			?>

<link rel='stylesheet' id='enron-style-css'  href='<?php echo get_template_directory_uri(); ?>/layouts/grid.css' type='text/css' media='all' />
<link rel='stylesheet' id='enron-style-css'  href='<?php echo get_template_directory_uri(); ?>/layouts/style.css' type='text/css' media='all' />

<?php include_once( 'color.php' ); 

$templateclass=template_body_class();
?>

</head>



<body <?php body_class($templateclass); ?>>
<div id="page" class="hfeed site main-container">


    <div class="header-section-wrapper">
      <div class="header-section container">
        <div class="row">
          
          <div class="branding span5">
            <h1 class="logo">
			<?php
			if ( function_exists( 'ot_get_option' ) ) {
			  $logo = ot_get_option( 'custom_logo' );
			  
			  ?>
			   <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo $logo;?>" alt=""></a>
			  <?php
			} else {
			?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt=""></a>
			<?php
			}

			?>
              
            </h1>
          </div><!-- .branding -->
		  
		  <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
          
          <button class="mobile-menu">
            <div></div>
            <div></div>
            <div></div>
          </button>
        </div>
      </div><!-- .header-section -->
    </div><!-- .header-section-wrapper -->

	