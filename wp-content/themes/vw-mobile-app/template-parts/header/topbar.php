<?php
/**
 * The template part for header
 *
 * @package VW Mobile App 
 * @subpackage vw_mobile_app
 * @since VW Mobile App 1.0
 */
?>

<div id="header">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-4">
        <div class="logo">
          <?php if( has_custom_logo() ){ vw_mobile_app_the_custom_logo();
            }else{ ?>
            <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?>
            <p class="site-description"><?php echo esc_html($description); ?></p>
          <?php endif; } ?>
        </div>
      </div>
      <div class="col-lg-8 col-md-8">
        <div class="nav">
          <?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
        </div>
      </div>
    </div>
  </div>
</div>