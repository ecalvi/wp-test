<?php
/**
 * VW Mobile App Theme Customizer
 *
 * @package VW Mobile App
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_mobile_app_custom_controls() {

    load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_mobile_app_custom_controls' );

function vw_mobile_app_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . 'inc/customize-homepage/class-customize-homepage.php' );

	//add home page setting pannel
	$wp_customize->add_panel( 'vw_mobile_app_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'VW Settings', 'vw-mobile-app' ),
	    'description' => __( 'Description of what this panel does.', 'vw-mobile-app' ),
	) );

	$wp_customize->add_section( 'vw_mobile_app_left_right', array(
    	'title'      => __( 'General Settings', 'vw-mobile-app' ),
		'priority'   => 30,
		'panel' => 'vw_mobile_app_panel_id'
	) );

	$wp_customize->add_setting('vw_mobile_app_width_option',array(
        'default' => __('Full Width','vw-mobile-app'),
        'sanitize_callback' => 'vw_mobile_app_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Mobile_App_Image_Radio_Control($wp_customize, 'vw_mobile_app_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','vw-mobile-app'),
        'description' => __('Here you can change the width layout of Website.','vw-mobile-app'),
        'section' => 'vw_mobile_app_left_right',
        'choices' => array(
            'Full Width' => get_template_directory_uri().'/images/full-width.png',
            'Wide Width' => get_template_directory_uri().'/images/wide-width.png',
            'Boxed' => get_template_directory_uri().'/images/boxed-width.png',
    ))));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_mobile_app_theme_options',array(
        'default' => __('Right Sidebar','vw-mobile-app'),
        'sanitize_callback' => 'vw_mobile_app_sanitize_choices'	        
	) );
	$wp_customize->add_control('vw_mobile_app_theme_options', array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','vw-mobile-app'),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-mobile-app'),
        'section' => 'vw_mobile_app_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-mobile-app'),
            'Right Sidebar' => __('Right Sidebar','vw-mobile-app'),
            'One Column' => __('One Column','vw-mobile-app'),
            'Three Columns' => __('Three Columns','vw-mobile-app'),
            'Four Columns' => __('Four Columns','vw-mobile-app'),
            'Grid Layout' => __('Grid Layout','vw-mobile-app')
        ),
	));

	$wp_customize->add_setting('vw_mobile_app_page_layout',array(
        'default' => __('One Column','vw-mobile-app'),
        'sanitize_callback' => 'vw_mobile_app_sanitize_choices'
	));
	$wp_customize->add_control('vw_mobile_app_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-mobile-app'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-mobile-app'),
        'section' => 'vw_mobile_app_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-mobile-app'),
            'Right Sidebar' => __('Right Sidebar','vw-mobile-app'),
            'One Column' => __('One Column','vw-mobile-app')
        ),
	) );

	//Slider
	$wp_customize->add_section( 'vw_mobile_app_banner_section' , array(
    	'title'      => __( 'Banner Settings', 'vw-mobile-app' ),
		'priority'   => null,
		'panel' => 'vw_mobile_app_panel_id'
	) );

	// Add color scheme setting and control.
	$wp_customize->add_setting( 'vw_mobile_app_banner_settings', array(
		'default'           => '',
		'sanitize_callback' => 'vw_mobile_app_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'vw_mobile_app_banner_settings', array(
		'label'    => __( 'Select Banner Image Page', 'vw-mobile-app' ),
		'description' => __('Banner image size (1500 x 600)','vw-mobile-app'),
		'section'  => 'vw_mobile_app_banner_section',
		'type'     => 'dropdown-pages'
	) );

	//content layout
	$wp_customize->add_setting('vw_mobile_app_slider_content_option',array(
        'default' => __('Left','vw-mobile-app'),
        'sanitize_callback' => 'vw_mobile_app_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Mobile_App_Image_Radio_Control($wp_customize, 'vw_mobile_app_slider_content_option', array(
        'type' => 'select',
        'label' => __('Banner Content Layouts','vw-mobile-app'),
        'section' => 'vw_mobile_app_banner_section',
        'choices' => array(
            'Left' => get_template_directory_uri().'/images/slider-content1.png',
            'Center' => get_template_directory_uri().'/images/slider-content2.png',
            'Right' => get_template_directory_uri().'/images/slider-content3.png',
    ))));

    //Slider excerpt
	$wp_customize->add_setting( 'vw_mobile_app_slider_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_mobile_app_slider_excerpt_number', array(
		'label'       => esc_html__( 'Banner Excerpt length','vw-mobile-app' ),
		'section'     => 'vw_mobile_app_banner_section',
		'type'        => 'range',
		'settings'    => 'vw_mobile_app_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Opacity
	$wp_customize->add_setting('vw_mobile_app_slider_opacity_color',array(
      'default'              => 0.5,
      'sanitize_callback' => 'vw_mobile_app_sanitize_choices'
	));

	$wp_customize->add_control( 'vw_mobile_app_slider_opacity_color', array(
	'label'       => esc_html__( 'Banner Image Opacity','vw-mobile-app' ),
	'section'     => 'vw_mobile_app_banner_section',
	'type'        => 'select',
	'settings'    => 'vw_mobile_app_slider_opacity_color',
	'choices' => array(
      '0' =>  esc_attr('0','vw-mobile-app'),
      '0.1' =>  esc_attr('0.1','vw-mobile-app'),
      '0.2' =>  esc_attr('0.2','vw-mobile-app'),
      '0.3' =>  esc_attr('0.3','vw-mobile-app'),
      '0.4' =>  esc_attr('0.4','vw-mobile-app'),
      '0.5' =>  esc_attr('0.5','vw-mobile-app'),
      '0.6' =>  esc_attr('0.6','vw-mobile-app'),
      '0.7' =>  esc_attr('0.7','vw-mobile-app'),
      '0.8' =>  esc_attr('0.8','vw-mobile-app'),
      '0.9' =>  esc_attr('0.9','vw-mobile-app')
	),
	));

	//About Category
	$wp_customize->add_section( 'vw_mobile_app_category_section' , array(
    	'title'      => __( 'About us', 'vw-mobile-app' ),
		'priority'   => null,
		'panel' => 'vw_mobile_app_panel_id'
	) );

	$wp_customize->add_setting('vw_mobile_app_section_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_mobile_app_section_title',array(
		'label'	=> __('Section Title','vw-mobile-app'),
		'section'=> 'vw_mobile_app_category_section',
		'setting'=> 'vw_mobile_app_section_title',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_mobile_app_section_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_mobile_app_section_text',array(
		'label'	=> __('Section Text','vw-mobile-app'),
		'section'=> 'vw_mobile_app_category_section',
		'setting'=> 'vw_mobile_app_section_text',
		'type'=> 'text'
	));	

	$categories = get_categories();
	$cat_post = array();
	$cat_post[]= 'select';
	$i = 0;	
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_mobile_app_about_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'vw_mobile_app_sanitize_choices',
	));
	$wp_customize->add_control('vw_mobile_app_about_category',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display services','vw-mobile-app'),
		'description' => __('Image size (70 x 70)','vw-mobile-app'),
		'section' => 'vw_mobile_app_category_section',
	));

	//About excerpt
	$wp_customize->add_setting( 'vw_mobile_app_about_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_mobile_app_about_excerpt_number', array(
		'label'       => esc_html__( 'About Excerpt length','vw-mobile-app' ),
		'section'     => 'vw_mobile_app_category_section',
		'type'        => 'range',
		'settings'    => 'vw_mobile_app_about_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Blog Post
	$wp_customize->add_section('vw_mobile_app_blog_post',array(
		'title'	=> __('Blog Post Settings','vw-mobile-app'),
		'panel' => 'vw_mobile_app_panel_id',
	));	

	$wp_customize->add_setting( 'vw_mobile_app_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_mobile_app_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Mobile_App_Toggle_Switch_Custom_Control( $wp_customize, 'vw_mobile_app_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','vw-mobile-app' ),
        'section' => 'vw_mobile_app_blog_post'
    )));

    $wp_customize->add_setting( 'vw_mobile_app_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_mobile_app_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Mobile_App_Toggle_Switch_Custom_Control( $wp_customize, 'vw_mobile_app_toggle_author',array(
		'label' => esc_html__( 'Author','vw-mobile-app' ),
		'section' => 'vw_mobile_app_blog_post'
    )));

    $wp_customize->add_setting( 'vw_mobile_app_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_mobile_app_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Mobile_App_Toggle_Switch_Custom_Control( $wp_customize, 'vw_mobile_app_toggle_comments',array(
		'label' => esc_html__( 'Comments','vw-mobile-app' ),
		'section' => 'vw_mobile_app_blog_post'
    )));

    $wp_customize->add_setting( 'vw_mobile_app_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_mobile_app_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-mobile-app' ),
		'section'     => 'vw_mobile_app_blog_post',
		'type'        => 'range',
		'settings'    => 'vw_mobile_app_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Content Creation
	$wp_customize->add_section( 'vw_mobile_app_content_section' , array(
    	'title' => __( 'Customize Home Page', 'vw-mobile-app' ),
		'priority' => null,
		'panel' => 'vw_mobile_app_panel_id'
	) );

	$wp_customize->add_setting('vw_mobile_app_content_creation_main_control', array(
		'sanitize_callback' => 'esc_html',
	) );

	$homepage= get_option( 'page_on_front' );

	$wp_customize->add_control(	new VW_Mobile_App_Content_Creation( $wp_customize, 'vw_mobile_app_content_creation_main_control', array(
		'options' => array(
			esc_html__( 'First select static page in homepage setting for front page.Below given edit button is to customize Home Page. Just click on the edit option, add whatever elements you want to include in the homepage, save the changes and you are good to go.','vw-mobile-app' ),
		),
		'section' => 'vw_mobile_app_content_section',
		'button_url'  => admin_url( 'post.php?post='.$homepage.'&action=edit'),
		'button_text' => esc_html__( 'Edit', 'vw-mobile-app' ),
	) ) );
	
	//Footer Text
	$wp_customize->add_section('vw_mobile_app_footer',array(
		'title'	=> __('Footer','vw-mobile-app'),
		'description'=> __('This section will appear in the footer','vw-mobile-app'),
		'panel' => 'vw_mobile_app_panel_id',
	));	
	
	$wp_customize->add_setting('vw_mobile_app_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_mobile_app_footer_text',array(
		'label'	=> __('Copyright Text','vw-mobile-app'),
		'section'=> 'vw_mobile_app_footer',
		'setting'=> 'vw_mobile_app_footer_text',
		'type'=> 'text'
	));	

	$wp_customize->add_setting( 'vw_mobile_app_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_mobile_app_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Mobile_App_Toggle_Switch_Custom_Control( $wp_customize, 'vw_mobile_app_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-mobile-app' ),
      	'section' => 'vw_mobile_app_footer'
    )));

	$wp_customize->add_setting('vw_mobile_app_scroll_top_alignment',array(
        'default' => __('Right','vw-mobile-app'),
        'sanitize_callback' => 'vw_mobile_app_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Mobile_App_Image_Radio_Control($wp_customize, 'vw_mobile_app_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','vw-mobile-app'),
        'section' => 'vw_mobile_app_footer',
        'settings' => 'vw_mobile_app_scroll_top_alignment',
        'choices' => array(
            'Left' => get_template_directory_uri().'/images/layout1.png',
            'Center' => get_template_directory_uri().'/images/layout2.png',
            'Right' => get_template_directory_uri().'/images/layout3.png'
    ))));
}

add_action( 'customize_register', 'vw_mobile_app_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Mobile_App_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Mobile_App_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(new VW_Mobile_App_Customize_Section_Pro($manager,'example_1',array(
			'priority'   => 1,
			'title'    => esc_html__( 'Mobile App Pro', 'vw-mobile-app' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-mobile-app' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/wordpress-mobile-app-theme/'),
		)));

		$manager->add_section(new VW_Mobile_App_Customize_Section_Pro($manager,'example_2',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'vw-mobile-app' ),
			'pro_text' => esc_html__( 'DOCS', 'vw-mobile-app' ),
			'pro_url'  => admin_url('themes.php?page=vw_mobile_app_guide'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-mobile-app-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-mobile-app-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Mobile_App_Customize::get_instance();