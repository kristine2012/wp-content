<!-- cutomizing header start -->
<?php
/*customize-register to create new Cutomizer panels, settings, controls*/
function mytheme_customize_register( $wp_customize ) {
   /*All our sections, settings, and controls will be added here*/
   // Background Colour
   $wp_customize->add_setting( 'freedomflow-background-colour' , array(
       'default'   => '#FEF4F3',
       'transport' => 'refresh',
   ) );
   $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'freedomflow-background-colour-control', array(
    'label'      => __( 'Background Colour', 'freedomflow-theme' ),
    'description' => 'Change the background Colour',
    'section'    => 'colors',
    'settings'   => 'freedomflow-background-colour',
   ) ) );
   // Header and Footer background Colour
    $wp_customize->add_setting( 'freedomflow-header-footer-colour' , array(
        'default'   => '#e0a7b3',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'freedomflow-header-footer-colour-control', array(
      'label'      => __( 'Header and Footer Background Colour', 'freedomflow-theme' ),
     'description' => 'Change the Header and Footer Background Colour',
      'section'    => 'colors',
      'settings'   => 'freedomflow-header-footer-colour',
    ) ) );
   // Footer Message
   $wp_customize->add_section( 'freedomflow-footer-section' , array(
       'title'      => __( 'Footer Text', 'freedomflow-theme' ),
       'priority'   => 30,
   ));
   $wp_customize->add_setting( 'freedomflow-footer-section-message' , array(
       'default'   => 'Copyright © 2020 – Design by Isabella Whitfield',
       'transport' => 'refresh',
   ) );
   $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'freedomflow-footer-section-control', array(
     'label'      => __( 'Footer Text', 'freedomflow-theme' ),
     'section'    => 'freedomflow-footer-section',
     'settings'   => 'freedomflow-footer-section-message',
   ) ) );
   // Site Title Text
  //  $wp_customize->add_section( 'buySomeThyme-title-text' , array(
  //      'title'      => __( 'Site Title Text', 'buySomeThyme-theme' ),
  //      'priority'   => 30,
  //  ));
  //  $wp_customize->add_setting( 'buySomeThyme-title-text' , array(
  //      'default'   => 'Buy Some Thyme',
  //      'transport' => 'refresh',
  //  ) );
  //  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'buySomeThyme-title-text-control', array(
  //    'label'      => __( 'Site Title Text', 'buySomeThyme-theme' ),
  //    'section'    => 'buySomeThyme-title-text',
  //    'settings'   => 'buySomeThyme-title-text',
  //  ) ) );
   }
 add_action( 'customize_register', 'mytheme_customize_register' );
//Hook2: wp_head to output custom-generated CSS
 function mytheme_customize_css()
 {
   ?>
     <style type="text/css">
       body {
         background-color: <?php echo get_theme_mod('freedomflow-background-colour','#FEF4F3'); ?>!important;
       }
       .footer, .header {
         background-color: <?php echo get_theme_mod('freedomflow-header-footer-colour', '#e0a7b3'); ?>!important ;
       }
   </style>
 <?php
 }
 add_action( 'wp_head', 'mytheme_customize_css');