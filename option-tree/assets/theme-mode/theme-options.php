<?php
/**
 * Initialize the custom theme options.
 */
add_action( 'admin_init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'sidebar'       => ''
    ),
    'sections'        => array( 
      array(
        'id'          => 'general',
        'title'       => 'General Settings'
      ),
      array(
        'id'          => 'frontpage',
        'title'       => 'Frontpage Settings'
      ),
      array(
        'id'          => 'social_media',
        'title'       => 'Social Media Settings'
      ),
      array(
        'id'          => 'footer',
        'title'       => 'Footer Settings'
      ),
      array(
        'id'          => 'portfolio',
        'title'       => 'Portfolio Settings'
      ),
      array(
        'id'          => 'about_page',
        'title'       => 'About Page Settings'
      ),
      array(
        'id'          => 'contact_page',
        'title'       => 'Contact Page Settings'
      ),
      array(
        'id'          => 'price_page',
        'title'       => 'Price Page Settings'
      ),
      array(
        'id'          => 'services_page',
        'title'       => 'Services Page Settings'
      ),
      array(
        'id'          => 'homepage_settings',
        'title'       => 'Homepage Settings'
      )
    ),
    'settings'        => array( 
      array(
        'id'          => 'custom_logo',
        'label'       => 'Custom Logo',
        'desc'        => 'Upload a logo for your theme, or specify an image URL directly.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'custom_favicon',
        'label'       => 'Custom Favicon',
        'desc'        => 'Upload a 16px x 16px ico image that will represent your website\'s favicon.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'global_color',
        'label'       => 'Globar Color',
        'desc'        => 'Change your custom global color for your theme.',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'homepage_slogan',
        'label'       => 'Homepage Slogan',
        'desc'        => 'Text slogan for your homepage.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'frontpage',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'homepage_button_text',
        'label'       => 'Homepage Button Text',
        'desc'        => 'Your homepage button text',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'frontpage',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'homepage_button_link',
        'label'       => 'Homepage Button Link',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'frontpage',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'post_category_slider',
        'label'       => 'Featured Category',
        'desc'        => 'Select post category that will be displayed in slider.',
        'std'         => '',
        'type'        => 'category-select',
        'section'     => 'frontpage',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'number_post_slider',
        'label'       => 'Number of Featured Posts',
        'desc'        => 'Number of posts in slider.',
        'std'         => '',
        'type'        => 'numeric-slider',
        'section'     => 'frontpage',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'portfolio_homepage',
        'label'       => 'Featured Portfolios',
        'desc'        => '',
        'std'         => '',
        'type'        => 'custom-post-type-checkbox',
        'section'     => 'frontpage',
        'rows'        => '',
        'post_type'   => 'portfolio',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'facebook_url',
        'label'       => 'Facebook',
        'desc'        => 'Your facebook link',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'twitter_url',
        'label'       => 'Twitter',
        'desc'        => 'Your twitter link',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'dribbble_url',
        'label'       => 'Dribbble',
        'desc'        => 'Your Dribbble link',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'vimeo_url',
        'label'       => 'Vimeo',
        'desc'        => 'Your Vimeo link',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'youtube_url',
        'label'       => 'Youtube',
        'desc'        => 'Your Youtube link',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'og_facebook_id',
        'label'       => 'Open Graph Facebook User ID',
        'desc'        => 'Add your USER ID. You can find your Facebook user ID by going to this URL: http://graph.facebook.com/yourusername.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'og_default_image',
        'label'       => 'Open Graph Default Image',
        'desc'        => 'Add your default image for facebook open graph.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'social_media',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'share_button',
        'label'       => 'Share Button',
        'desc'        => 'enable/disable share button.',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'social_media',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'credit_text',
        'label'       => 'Credit Text',
        'desc'        => 'Your credit text',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'number_portfolio',
        'label'       => 'Number of Portfolios',
        'desc'        => 'Number of portfolios will be displayed in portfolio page.',
        'std'         => '',
        'type'        => 'numeric-slider',
        'section'     => 'portfolio',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'about_page_displayed',
        'label'       => 'Page to be displayed',
        'desc'        => 'Select page to be displayed as service page, price page, career page, and team page.',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'about_page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array( 
          array(
            'value'       => 'about_introduction',
            'label'       => 'Introduction',
            'src'         => ''
          ),
          array(
            'value'       => 'about_services',
            'label'       => 'Services',
            'src'         => ''
          ),
          array(
            'value'       => 'about_price',
            'label'       => 'Price',
            'src'         => ''
          ),
          array(
            'value'       => 'about_careers',
            'label'       => 'Careers',
            'src'         => ''
          ),
          array(
            'value'       => 'about_team',
            'label'       => 'Team',
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'introduction_page',
        'label'       => 'Introduction Page',
        'desc'        => 'Choose your introduction page.',
        'std'         => '',
        'type'        => 'page-select',
        'section'     => 'about_page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'service_page',
        'label'       => 'Service Page',
        'desc'        => 'Choose your service page.',
        'std'         => '',
        'type'        => 'page-select',
        'section'     => 'about_page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'price_page',
        'label'       => 'Price Page',
        'desc'        => 'Choose your price page.',
        'std'         => '',
        'type'        => 'page-select',
        'section'     => 'about_page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'careers_page',
        'label'       => 'Careers Page',
        'desc'        => 'Choose your careers page.',
        'std'         => '',
        'type'        => 'page-select',
        'section'     => 'about_page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'team_page',
        'label'       => 'Team Page',
        'desc'        => 'Choose your team page.',
        'std'         => '',
        'type'        => 'page-select',
        'section'     => 'about_page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'address',
        'label'       => 'Address',
        'desc'        => 'Your Address',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'contact_page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'longitude',
        'label'       => 'Longitude',
        'desc'        => 'Your location\'s longitude.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'contact_page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'latitude',
        'label'       => 'Latitude',
        'desc'        => 'Your location\'s latitude.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'contact_page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'custom_price_item',
        'label'       => 'Custom Price Item',
        'desc'        => 'Custom Item for your price package.',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'price_page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'service_page_item',
        'label'       => 'Service Page Item',
        'desc'        => 'Custom Item for your service content.',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'services_page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'background_image_slider',
        'label'       => 'Background Image Slider',
        'desc'        => 'Add background image slider for Homepage 1.',
        'std'         => '',
        'type'        => 'background',
        'section'     => 'homepage_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      )
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}