<?php
function theme3_customize_register( $wp_customize ) {
	//Light Logo
	$wp_customize->add_setting( 'themeslug_logo_light', array() );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_log_light', array(
        'priority'       => 15,
        'label'    => __( 'Light Logo', 'themeslug' ),
        'section'  => 'site_branding',
        'settings' => 'themeslug_logo_light',
    ) ) );

    //SIte Information
    $wp_customize->add_section( 'site_header', array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => 'Site Header',
        'description'    =>  'All website information i.e your details',
        'panel'  => 'theme_options',
    ) );
		$wp_customize->add_setting('delivery_textbox',array());
	    $wp_customize->add_control('delivery_textbox',array(
	                'priority'       => 22,
	                'label' => 'Delivery Slogan',
	                'section' => 'site_header',
	                'description' => 'Change your delivery slogan',
	                'type' => 'text',
	            )   );
	    $wp_customize->add_setting('business_textbox',array());
	    $wp_customize->add_control('business_textbox',array(
	                'priority'       => 24,
	                'label' => 'Business Slogan',
	                'section' => 'site_header',
	                'description' => 'Change your business slogan',
	                'type' => 'text',
	            )   );
	    $wp_customize->add_setting('business_link_textbox',array());
	    $wp_customize->add_control('business_link_textbox',array(
	                'priority'       => 24,
	                'label' => 'Business Slogan Link',
	                'section' => 'site_header',
	                'description' => 'Change your business slogan link',
	                'type' => 'text',
	            )   );
    
	//Header 
	$wp_customize->add_section( 'header', array(
        'priority'       => 11,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => 'Header',
        'description'    =>  'Select colours that will affect the header.',
        'panel'  => 'colours',
    ) );
    	//Header Background
	    $wp_customize->add_setting('header-background', array('default' => 'transparent','sanitize_callback' => 'sanitize_hex_color',) );
	    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'header-background',array(
	                'label' => 'Header Background',
	                'section' => 'header',
	                'settings' => 'header-background',
	        )   )   );
	    //Menu
        $wp_customize->add_setting('top-header-setting', array('default' => get_theme_mod('secondary_settings'),'sanitize_callback' => 'sanitize_hex_color',) );
	    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'top-header-setting',array(
	                'label' => 'Top Header Colour',
	                'section' => 'header',
	                'settings' => 'top-header-setting',
        )   )   );
	    //Menu
        $wp_customize->add_setting('menu-colour-setting', array('default' => get_theme_mod('text_colour_settings'),'sanitize_callback' => 'sanitize_hex_color',) );
	    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'menu-colour-setting',array(
	                'label' => 'Menu Colour',
	                'section' => 'header',
	                'settings' => 'menu-colour-setting',
        )   )   );
        //Mini-header Menu
        $wp_customize->add_setting('mini-menu-colour-setting', array('default' => get_theme_mod('text_colour_settings'),'sanitize_callback' => 'sanitize_hex_color',) );
	    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'mini-menu-colour-setting',array(
	                'label' => 'Scroll-Header Menu Colour',
	                'section' => 'header',
	                'settings' => 'mini-menu-colour-setting',
        )   )   );
	    //Mega Menu
	    $wp_customize->add_setting('mega-menu-background', array('default' => '#FFFFFF','sanitize_callback' => 'sanitize_hex_color',) );
	    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'mega-menu-background',array(
	                'label' => 'Mega Menu Background',
	                'section' => 'header',
	                'settings' => 'mega-menu-background',
        )   )   );
        $wp_customize->add_setting('mega-menu-category', array('default' => get_theme_mod( 'secondary_settings'),'sanitize_callback' => 'sanitize_hex_color',) );
	    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'mega-menu-category',array(
	                'label' => 'Mega Menu Category',
	                'section' => 'header',
	                'settings' => 'mega-menu-category',
        )   )   );
        $wp_customize->add_setting('mega-menu-link', array('default' => get_theme_mod('text_colour_settings'),'sanitize_callback' => 'sanitize_hex_color',) );
	    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'mega-menu-link',array(
	                'label' => 'Mega Menu Links',
	                'section' => 'header',
	                'settings' => 'mega-menu-link',
        )   )   );
        $wp_customize->add_setting('mega-menu-link-hover', array('default' => get_theme_mod('primary_settings'),'sanitize_callback' => 'sanitize_hex_color',) );
	    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'mega-menu-link-hover',array(
	                'label' => 'Mega Menu Links Hover',
	                'section' => 'header',
	                'settings' => 'mega-menu-link-hover',
        )   )   );
        $wp_customize->add_setting('account-link', array('default' => get_theme_mod('primary_settings'),'sanitize_callback' => 'sanitize_hex_color',) );
	    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'account-link',array(
	                'label' => 'Account Links',
	                'section' => 'header',
	                'settings' => 'account-link',
        )   )   );
        $wp_customize->add_setting('account-link-hover', array('default' => get_theme_mod('primary_settings'),'sanitize_callback' => 'sanitize_hex_color',) );
	    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'account-link-hover',array(
	                'label' => 'Account Links Hover',
	                'section' => 'header',
	                'settings' => 'account-link-hover',
        )   )   );
        

    //Footer
    $wp_customize->add_section( 'footer', array(
        'priority'       => 12,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => 'Footer',
        'description'    =>  'Select colours that will affect the footer.',
        'panel'  => 'colours',
    ) );
	    //Footer Background
	    $wp_customize->add_setting('footer-background', array('default' => get_theme_mod('primary_settings'),'sanitize_callback' => 'sanitize_hex_color',) );
	    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer-background',array(
	                'label' => 'Footer Background',
	                'section' => 'footer',
	                'settings' => 'footer-background',
	        )   )   );
	    //Footer Box Background
	    $wp_customize->add_setting('footer-box-background', array('default' => '#55b0db','sanitize_callback' => 'sanitize_hex_color',) );
	    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer-box-background',array(
	                'label' => 'Footer Box Background',
	                'section' => 'footer',
	                'settings' => 'footer-box-background',
	        )   )   );
	    //Footer Titles
	    $wp_customize->add_setting('footer-h3', array('default' => '#ffffff','sanitize_callback' => 'sanitize_hex_color',) );
	    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer-h3',array(
	                'label' => 'Footer Title',
	                'section' => 'footer',
	                'settings' => 'footer-h3',
	        )   )   );
	    //Footer Link
	    $wp_customize->add_setting('footer-link', array('default' => '#ffffff','sanitize_callback' => 'sanitize_hex_color',) );
	    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer-link',array(
	                'label' => 'Footer Links',
	                'section' => 'footer', 
	                'settings' => 'footer-link',
	        )   )   );
	    //Footer Link
	    $wp_customize->add_setting('footer-link-hover', array('default' => '#ffffff','sanitize_callback' => 'sanitize_hex_color',) );
	    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer-link-hover',array(
	                'label' => 'Footer Link Hover',
	                'section' => 'footer', 
	                'settings' => 'footer-link-hover',
	        )   )   );
	    //Footer Text
	    $wp_customize->add_setting('footer-text', array('default' => '#ffffff','sanitize_callback' => 'sanitize_hex_color',) );
	    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer-text',array(
	                'label' => 'Footer Text',
	                'section' => 'footer',
	                'settings' => 'footer-text',
	        )   )   );
	    //Footer Bottom Background
	    $wp_customize->add_setting('footer-bottom-background', array('default' => get_theme_mod('primary_settings'),'sanitize_callback' => 'sanitize_hex_color',) );
	    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer-bottom-background',array(
	                'label' => 'Footer Bottom Background',
	                'section' => 'footer',
	                'settings' => 'footer-bottom-background',
	        )   )   );
	    //Footer Bottom Text
	    $wp_customize->add_setting('footer-bottom-text', array('default' => '#FFFFFF','sanitize_callback' => 'sanitize_hex_color',) );
	    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer-bottom-text',array(
	                'label' => 'Footer Bottom Text',
	                'section' => 'footer',
	                'settings' => 'footer-bottom-text',
	        )   )   );
	    //Footer Bottom Link
	    $wp_customize->add_setting('footer-bottom-link', array('default' => '#FFFFFF','sanitize_callback' => 'sanitize_hex_color',) );
	    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer-bottom-link',array(
	                'label' => 'Footer Bottom Link',
	                'section' => 'footer',
	                'settings' => 'footer-bottom-link',
	        )   )   );
	    //Footer Bottom Link Hover
	    $wp_customize->add_setting('footer-bottom-link-hover', array('default' => '#FFFFFF','sanitize_callback' => 'sanitize_hex_color',) );
	    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer-bottom-link-hover',array(
	                'label' => 'Footer Bottom Link Hover',
	                'section' => 'footer',
	                'settings' => 'footer-bottom-link-hover',
	        )   )   );

	//CONTENT BLOCKS
	//Slider
	//Sample Pack

	//PRINT
	//TEMPLATE SYSTEM
}
add_action( 'customize_register', 'theme3_customize_register' );


?>