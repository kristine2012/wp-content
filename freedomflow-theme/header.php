<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php wp_head(); ?>
    <title>Freedom Flow</title>
  </head>
  <body <?php body_class(); ?> >
<!-- NAVBAR -->
    <header class="header">
      <div class="container">
        <div class="row">
          <div class="col-lg-2">
            <h1 class=" site-logo">
              <a class="site-logo-link" href="<?php echo home_url(); ?>/">
                <span class="site-title"><?php bloginfo( 'name' ); ?></span>
                <?php
                  // display custom logo if available
                  $custom_logo_id = get_theme_mod( 'custom_logo' );
                  if($custom_logo_id):
                    $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                    echo $image[0];
                  endif;
                ?>
              </a>
              <p class="menu-trigger float-right mt-4 h6">Menu</p> 
            </h1>
            <!-- <div class="menu-trigger">Menu</div> -->
          </div>
          
          <div class="col-lg-10 float-right">
            <?php
              wp_nav_menu(
                array(
                'theme_location' => 'top-menu',
              //  'menu' => 'Top Bar',
                'menu_class' => 'top-bar'
                )
              );
            ?>
            
          
          </div>
        </div>
      </div>

    </header>

















