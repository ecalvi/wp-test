<?php
/**
 * The template part for displaying Post
 *
 * @package VW Mobile App
 * @subpackage vw-mobile-app
 * @since VW Mobile App 1.0
 */
?>
<div class="col-lg-4 col-md-4">
	<div id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
	    <div class="post-main-box">
	      	<div class="box-image">
	          	<?php 
		            if(has_post_thumbnail()) { 
		              the_post_thumbnail(); 
		            }
	          	?>
	        </div>
	        <h3 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h3>      
	        <div class="new-text">
	          	<p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_mobile_app_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_mobile_app_excerpt_number','30')))); ?></p>
	        </div>
	        <a class="content-bttn" href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small" title="<?php esc_attr_e( 'READ MORE','vw-mobile-app' ); ?>"><?php esc_html_e('READ MORE','vw-mobile-app'); ?></a>
	    </div>
	    <div class="clearfix"></div>
  	</div>
</div>