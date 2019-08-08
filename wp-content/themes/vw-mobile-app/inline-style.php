<?php
	
	/*---------------------------First highlight color-------------------*/

	$vw_mobile_app_first_color = get_theme_mod('vw_mobile_app_first_color');

	$custom_css = '';

	if($vw_mobile_app_first_color != false){
		$custom_css .='.error-btn a:hover, a.content-bttn:hover, .pagination .current, .pagination a:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce span.onsale{';
			$custom_css .='background-color: '.esc_html($vw_mobile_app_first_color).';';
		$custom_css .='}';
	}
	if($vw_mobile_app_first_color != false){
		$custom_css .='a, #footer h3, .post-main-box:hover h3 a, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title{';
			$custom_css .='color: '.esc_html($vw_mobile_app_first_color).';';
		$custom_css .='}';
	}
	if($vw_mobile_app_first_color != false){
		$custom_css .='{';
			$custom_css .='border-color: '.esc_html($vw_mobile_app_first_color).';';
		$custom_css .='}';
	}
	if($vw_mobile_app_first_color != false){
		$custom_css .='#about-us hr, .post-info hr{';
			$custom_css .='border-top-color: '.esc_html($vw_mobile_app_first_color).';';
		$custom_css .='}';
	}

	/*---------------------------Second highlight color-------------------*/

	$vw_mobile_app_second_color = get_theme_mod('vw_mobile_app_second_color');

	if($vw_mobile_app_second_color != false){
		$custom_css .='.pagination span, .pagination a{';
			$custom_css .='background-color: '.esc_html($vw_mobile_app_second_color).';';
		$custom_css .='}';
	}
	if($vw_mobile_app_second_color != false){
		$custom_css .='#sidebar .custom-social-icons i:hover, #footer .custom-social-icons i:hover{';
			$custom_css .='color: '.esc_html($vw_mobile_app_second_color).';';
		$custom_css .='}';
	}
	if($vw_mobile_app_second_color != false){
		$custom_css .='{';
			$custom_css .='border-color: '.esc_html($vw_mobile_app_second_color).';';
		$custom_css .='}';
	}
	if($vw_mobile_app_second_color != false){
		$custom_css .='{';
			$custom_css .='border-top-color: '.esc_html($vw_mobile_app_second_color).';';
		$custom_css .='}';
	}

	if($vw_mobile_app_second_color != false || $vw_mobile_app_first_color != false){
		$custom_css .='#header .nav ul.sub-menu li a:hover, .scrollup i, #sidebar .custom-social-icons i, #footer .custom-social-icons i, #footer .tagcloud a:hover, input[type="submit"], #footer-2, #sidebar input[type="submit"], #sidebar .tagcloud a:hover, .error-btn a, a.content-bttn, #header, #comments input[type="submit"].submit, nav.woocommerce-MyAccount-navigation ul li, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{
		background: linear-gradient(to right, '.esc_html($vw_mobile_app_second_color).', '.esc_html($vw_mobile_app_first_color).');
	 	}';
	}

	/*---------------------------Width Layout -------------------*/

	$theme_lay = get_theme_mod( 'vw_mobile_app_width_option','Full Width');
    if($theme_lay == 'Boxed'){
		$custom_css .='body{';
			$custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$custom_css .='}';
	}else if($theme_lay == 'Wide Width'){
		$custom_css .='body{';
			$custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$custom_css .='}';
	}else if($theme_lay == 'Full Width'){
		$custom_css .='body{';
			$custom_css .='max-width: 100%;';
		$custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$theme_lay = get_theme_mod( 'vw_mobile_app_slider_opacity_color','0.5');
	if($theme_lay == '0'){
		$custom_css .='#banner img{';
			$custom_css .='opacity:0';
		$custom_css .='}';
		}else if($theme_lay == '0.1'){
		$custom_css .='#banner img{';
			$custom_css .='opacity:0.1';
		$custom_css .='}';
		}else if($theme_lay == '0.2'){
		$custom_css .='#banner img{';
			$custom_css .='opacity:0.2';
		$custom_css .='}';
		}else if($theme_lay == '0.3'){
		$custom_css .='#banner img{';
			$custom_css .='opacity:0.3';
		$custom_css .='}';
		}else if($theme_lay == '0.4'){
		$custom_css .='#banner img{';
			$custom_css .='opacity:0.4';
		$custom_css .='}';
		}else if($theme_lay == '0.5'){
		$custom_css .='#banner img{';
			$custom_css .='opacity:0.5';
		$custom_css .='}';
		}else if($theme_lay == '0.6'){
		$custom_css .='#banner img{';
			$custom_css .='opacity:0.6';
		$custom_css .='}';
		}else if($theme_lay == '0.7'){
		$custom_css .='#banner img{';
			$custom_css .='opacity:0.7';
		$custom_css .='}';
		}else if($theme_lay == '0.8'){
		$custom_css .='#banner img{';
			$custom_css .='opacity:0.8';
		$custom_css .='}';
		}else if($theme_lay == '0.9'){
		$custom_css .='#banner img{';
			$custom_css .='opacity:0.9';
		$custom_css .='}';
		}

	/*---------------------------Slider Content Layout -------------------*/

	$theme_lay = get_theme_mod( 'vw_mobile_app_slider_content_option','Left');
    if($theme_lay == 'Left'){
		$custom_css .='.box-content, .box-content h2{';
			$custom_css .='text-align:left; left:10%; right:55%;';
		$custom_css .='}';
	}else if($theme_lay == 'Center'){
		$custom_css .='.box-content, .box-content h2{';
			$custom_css .='text-align:center; left:30%; right:30%;';
		$custom_css .='}';
	}else if($theme_lay == 'Right'){
		$custom_css .='.box-content, .box-content h2{';
			$custom_css .='text-align:right; left:55%; right:10%;';
		$custom_css .='}';
	}