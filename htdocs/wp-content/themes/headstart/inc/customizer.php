<?php
/**
 * headstart Theme Customizer.
 *
 * @package headstart
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function headstart_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    $wp_customize->get_section('background_image')->title = __( 'Background', 'headstart' );
    $wp_customize->get_section('header_image')->title = __( 'Header', 'headstart' );
    $wp_customize->remove_control('display_header_text');


//HELPDESK SECTION
    $wp_customize->add_section(
        'writers_contact',
        array(
            'title' => __('Helpdesk', 'headstart'),
            'priority' => 1,
            'description' => __( '<p><strong>Helpdesk & Support</strong><br> If you need help with anything theme related, or have pre-sale questions please contact us <a href="http://madeforwriters.com/help-support/" target="_blank">through this form</a> or email us at <strong>Help@madeforwriters.com</strong></p><br><br><a style="display:block" href="http://madeforwriters.com/headstart/" target="_blank"><img src="http://madeforwriters.com/images/headstart-features.png"></a>
                ', 'headstart' ),
            )
        );  
    $wp_customize->add_setting('writers_contact[info]', array(
        'sanitize_callback' => 'writers_no_sanitize',
        'type' => 'info_control',
        'capability' => 'edit_theme_options',
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'contact_section', array(
        'section' => 'writers_contact',
        'settings' => 'writers_contact[info]',
        'type' => 'textarea',
        'priority' => 1
        ) )
    );   

$wp_customize->add_section(
        'headstart_unlock',
        array(
            'title' => __('Unlock More Features', 'headstart'),
            'priority' => 9999999,
        'description' => __( '<a style="display:block;" href="http://madeforwriters.com/headstart/" target="_blank"><img src="http://madeforwriters.com/images/headstart-features.png"></a>
            ', 'headstart' ),
            )
        );  
    $wp_customize->add_setting('headstart_unlock[info]', array(
        'sanitize_callback' => 'headstart_no_sanitize',
        'type' => 'info_control',
        'capability' => 'edit_theme_options',
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'unlock_section', array(
        'section' => 'headstart_unlock',
        'settings' => 'headstart_unlock[info]',
        'type' => 'textarea',
        'priority' => 1
        ) )
    );   


//HEADER SECTION
    $wp_customize->add_setting( 'header_title', array(
        'type'              => 'theme_mod',
        'sanitize_callback' => 'wp_kses_post',
        'capability'        => 'edit_theme_options',
        ) );

    $wp_customize->add_control( 'header_title', array(
        'label'    => __( "Header Title", 'headstart' ),
        'section'  => 'header_image',
        'type'     => 'text',
        'priority' => 1,
        ) );
    $wp_customize->add_setting( 'header_title_color', array(
        'default'           => '#fff', 
        'type'              => 'theme_mod',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage'
        ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_title_color', array(
        'label'       => __( 'Header Title Color', 'headstart' ),
        'section'     => 'header_image',
        'priority' => 1,
        'settings'    => 'header_title_color',
        ) ) );


    $wp_customize->add_setting( 'header_tagline', array(
        'type'              => 'theme_mod',
        'sanitize_callback' => 'wp_kses_post',
        'capability'        => 'edit_theme_options',
        ) );

    $wp_customize->add_control( 'header_tagline', array(
        'label'    => __( "Header Tagline", 'headstart' ),
        'section'  => 'header_image',
        'type'     => 'text',
        'priority' => 1,
        ) );

    $wp_customize->add_setting( 'header_tagline_color', array(
        'default'           => '#fff', 
        'type'              => 'theme_mod',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage'
        ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_tagline_color', array(
        'label'       => __( 'Header Tagline Color', 'headstart' ),
        'section'     => 'header_image',
        'priority' => 1,
        'settings'    => 'header_tagline_color',
        ) ) );


    $wp_customize->add_setting( 'header_left_button_text', array(
        'type'              => 'theme_mod',
        'sanitize_callback' => 'wp_kses_post',
        'capability'        => 'edit_theme_options',
        ) );

    $wp_customize->add_control( 'header_left_button_text', array(
        'label'    => __( "Left Header Button Text", 'headstart' ),
        'section'  => 'header_image',
        'type'     => 'text',
        'priority' => 1,
        ) );
    $wp_customize->add_setting( 'header_left_button_link', array(
        'type'              => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
        'capability'        => 'edit_theme_options',
        ) );

    $wp_customize->add_control( 'header_left_button_link', array(
        'label'    => __( "Left Header Button Link", 'headstart' ),
        'section'  => 'header_image',
        'type'     => 'text',
        'priority' => 1,
        ) );
    $wp_customize->add_setting( 'header_left_button_background_color', array(
        'default'           => '#fff', 
        'type'              => 'theme_mod',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage'
        ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_left_button_background_color', array(
        'label'       => __( 'Left Header Button Background Color', 'headstart' ),
        'section'     => 'header_image',
        'priority' => 1,
        'settings'    => 'header_left_button_background_color',
        ) ) );
    $wp_customize->add_setting( 'header_left_button_text_color', array(
        'default'           => '#2f3b46', 
        'type'              => 'theme_mod',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage'
        ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_left_button_text_color', array(
        'label'       => __( 'Left Header Button Text Color', 'headstart' ),
        'section'     => 'header_image',
        'priority' => 1,
        'settings'    => 'header_left_button_text_color',
        ) ) );


    $wp_customize->add_setting( 'header_right_button_text', array(
        'type'              => 'theme_mod',
        'sanitize_callback' => 'wp_kses_post',
        'capability'        => 'edit_theme_options',
        ) );

    $wp_customize->add_control( 'header_right_button_text', array(
        'label'    => __( "Right Header Button Text", 'headstart' ),
        'section'  => 'header_image',
        'type'     => 'text',
        'priority' => 1,
        ) );
    $wp_customize->add_setting( 'header_right_button_link', array(
        'type'              => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
        'capability'        => 'edit_theme_options',
        ) );

    $wp_customize->add_control( 'header_right_button_link', array(
        'label'    => __( "Right Header Button Link", 'headstart' ),
        'section'  => 'header_image',
        'type'     => 'text',
        'priority' => 1,
        ) );
    $wp_customize->add_setting( 'header_right_button_background_color', array(
        'default'           => '#fff', 
        'type'              => 'theme_mod',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage'
        ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_right_button_background_color', array(
        'label'       => __( 'Right Header Button Border Color', 'headstart' ),
        'section'     => 'header_image',
        'priority' => 1,
        'settings'    => 'header_right_button_background_color',
        ) ) );
    $wp_customize->add_setting( 'header_right_button_text_color', array(
        'default'           => '#fff', 
        'type'              => 'theme_mod',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage'
        ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_right_button_text_color', array(
        'label'       => __( 'Right Header Button Text Color', 'headstart' ),
        'section'     => 'header_image',
        'priority' => 1,
        'settings'    => 'header_right_button_text_color',
        ) ) );
    $wp_customize->add_setting( 'header_bg_color', array(
        'default'           => '#333', 
        'type'              => 'theme_mod',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage'
        ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_bg_color', array(
        'label'       => __( 'Header Background Color', 'headstart' ),
        'section'     => 'header_image',
        'priority' => 1,
        'settings'    => 'header_bg_color',
        ) ) );
    $wp_customize->add_control( 'header_textcolor', array(
        'label'    => __( 'Header Text Color', 'headstart' ),
        'section'  => 'head_colors',
        ) );
    $wp_customize->add_setting( 'header_background_color', array(
            'default'           => '#00adcf', // steelblue
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
            ) );

        // Show Sitename in Menubar Control
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'show_sitename_in_menubar',
            array( 
                'label'         => __( 'Show sitename in menu bar?', 'headstart' ),
                'type'          => 'checkbox',
                'section'       => 'title_tagline',
                )
            ) );



    /* ///////////////// SIDEBAR LAYOUT ////////////////// */

        /* 
         * Select Sidebar Layout 
         */
        // Add Sidebar Layout Section
        $wp_customize->add_section( 'headstart-options', array(
            'title'         => __( 'Theme Options', 'headstart' ),
            'capability'    => 'edit_theme_options',
            'description'   => __( 'Change the default display options for the theme.', 'headstart' ),
            ) );
        
        // Sidebar Layout setting
        $wp_customize->add_setting( 'layout_setting',
            array(
                'default'           => 'sidebar-right',
                'type'              => 'theme_mod',
                'sanitize_callback' => 'headstart_sanitize_layout',
                'transport'         => 'postMessage'
                ) );
        
        // Sidebar Layout Control
        $wp_customize->add_control( 'layout_control',
            array(
                'settings'          => 'layout_setting',
                'type'              => 'radio',
                'label'             => __( 'Sidebar position', 'headstart' ),
                'choices'           => array(
                    'no-sidebar'    => __( 'No sidebar', 'headstart' ),
                    'sidebar-right' => __( 'Sidebar right', 'headstart' ),
                    'sidebar-left'  => __( 'Sidebar left', 'headstart' ),
                    ),
                'section'           => 'sidebar_settings'
                ) );
        
        /**
	 * Front Page sections 
	 *
	 * @since headstart 2.1.2
	 *
	 * @param $page_names array
	 */
        $page_names = array( 'services', 'clients', 'about', 'contact' );

	// Create a setting and control for each of the sections available in the theme.
        for ( $i = 0; $i < count( $page_names ); $i++ ) {
          $wp_customize->add_setting( 'panel_' . $page_names[$i], array(
             'default'           => false,
             'sanitize_callback' => 'absint',
//			'transport'         => 'postMessage',
             ) );

          $wp_customize->add_control( 'panel_' . $page_names[$i], array(
             /* translators: %s is the front page section name */
             'label'          => sprintf( __( '%s Page Content', 'headstart' ), ucwords( $page_names[$i] ) ),
             'description'    => ( 0 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'headstart' ) ),
             'section'        => 'static_front_page',
             'type'           => 'dropdown-pages',
             'allow_addition' => true,
             'active_callback' => 'headstart_is_static_front_page',
             ) );

//		$wp_customize->selective_refresh->add_partial( 'panel_' . $page_names[$i], array(
//			'selector'            => '#' . $page_names[$i],
//			'render_callback'     => 'headstart_front_page_section',
//			'container_inclusive' => true,
//		) );
      }

  }
  add_action( 'customize_register', 'headstart_customize_register' );

/**
 * Return whether we're previewing the front page and it's a static page.
 */
function headstart_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function headstart_customize_preview_js() {
	wp_enqueue_script( 'headstart_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20160507', true );
}
add_action( 'customize_preview_init', 'headstart_customize_preview_js' );

/*
 * Sanitize layout options
 */

function headstart_sanitize_layout ( $value ) {
    if ( !in_array( $value, array( 'no-sidebar', 'sidebar-right', 'sidebar-left' ) ) ) {
        $value = 'no-sidebar';
    }
    return $value;
}

/**
 * Checkbox sanitization callback
 * @link    https://github.com/WPTRT/code-examples/blob/master/customizer/sanitization-callbacks.php
 * 
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 * 
 * @param   bool    $checked    Whether the checkbox is checked.
 * @return  bool                Whether the checkbox is checked.
 */
function headstart_sanitize_checkbox( $checked ) {
    // Boolean check
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

function headstart_customizer_stylesheet() {
    wp_enqueue_style( 'headstart-customizer-css', get_template_directory_uri().'/assets/stylesheets/customizer.css', NULL, NULL, 'all' );
}



if(! function_exists('headstart_custom_styles' ) ):
/**
* Set the header background color 
*/
function headstart_custom_styles(){
    ?>
    <style type="text/css">
        #header-image .site-title { color: <?php echo esc_attr(get_theme_mod( 'header_title_color')); ?>; }
        #header-image .site-description{ color: <?php echo esc_attr(get_theme_mod( 'header_tagline_color')); ?>; }
        .site-description:before { background: <?php echo esc_attr(get_theme_mod( 'header_tagline_color')); ?>; }
        div#header-image { background: <?php echo esc_attr(get_theme_mod( 'header_bg_color')); ?>; }
        ul.sub-menu.dropdown.childopen, .main-navigation ul li a:hover, .top-bar, .top-bar ul, button.menu-toggle.navicon, button.menu-toggle:hover, .main-navigation .sub-menu li { background: <?php echo esc_attr(get_theme_mod( 'nav_bg')); ?>; background-color: <?php echo esc_attr(get_theme_mod( 'nav_bg')); ?>; }
        .navicon:focus .fa-bars, .navicon:active .fa-bars, .navicon .fa-bars, .site-header .main-navigation ul li a, .site-header .main-navigation ul li a:hover, .site-header .main-navigation ul li a:visited, .site-header .main-navigation ul li a:focus, .site-header .main-navigation ul li a:active, .main-navigation ul li ul.childopen li:hover a, .top-bar-menu .navicon span, .main-navigation ul li ul.childopen li .active a { color: <?php echo esc_attr(get_theme_mod( 'nav_link_color')); ?>; }
        .top-bar-title .site-title a { color: <?php echo esc_attr(get_theme_mod( 'nav_logo_color')); ?>; }
        .blog .hentry { background-color: <?php echo esc_attr(get_theme_mod( 'blog_feed_post_bg')); ?>; }
        .blog h2.entry-title a { color: <?php echo esc_attr(get_theme_mod( 'blog_feed_post_headline_color')); ?>; }
        .blog time.entry-date.published { color: <?php echo esc_attr(get_theme_mod( 'blog_feed_post_date_color')); ?>; }
        .blog .entry-content label, .blog .entry-content, .blog .entry-content li, .blog .entry-content p, .blog .entry-content ol li, .blog .entry-content ul li { color: <?php echo esc_attr(get_theme_mod( 'blog_feed_post_text_color')); ?>; }
        #content .sticky:before { background: <?php echo esc_attr(get_theme_mod( 'blog_feed_post_featured_color')); ?>; }
        .blog .entry-content a, .blog .entry-content a:link, .blog .entry-content a:visited { color: <?php echo esc_attr(get_theme_mod( 'blog_feed_post_link_color')); ?>; }
        .blog .entry-content form.post-password-form input[type="submit"], .blog .entry-content a.more-link.more-link-activated, .blog .entry-content a.more-link.more-link-activated:hover, .blog .entry-content a.more-link.more-link-activated:focus, .blog .entry-content a.more-link.more-link-activated:active, .blog .entry-content a.more-link.more-link-activated:visited { border-color: <?php echo esc_attr(get_theme_mod( 'blog_feed_post_button_bg_color')); ?>; }
        .blog .entry-content form.post-password-form input[type="submit"],.blog .entry-content a.more-link.more-link-activated, .blog .entry-content a.more-link.more-link-activated:hover, .blog .entry-content a.more-link.more-link-activated:focus, .blog .entry-content a.more-link.more-link-activated:active, .blog .entry-content a.more-link.more-link-activated:visited { color: <?php echo esc_attr(get_theme_mod( 'blog_feed_post_button_text_color')); ?>; }
        .blog .pagination a:hover, .blog .pagination button:hover, .blog .paging-navigation ul, .blog .pagination ul, .blog .pagination .current { background: <?php echo esc_attr(get_theme_mod( 'blog_feed_post_navigation_bg_color')); ?>; }
        .blog .paging-navigation li a:hover, .blog .pagination li a:hover, .blog .paging-navigation li span.page-numbers, .blog .pagination li span.page-numbers, .paging-navigation li a, .pagination li a { color: <?php echo esc_attr(get_theme_mod( 'blog_feed_post_navigation_text_color')); ?>; }
        .single-post .hentry, .single-post .comments-area, .single-post .read-comments, .single-post .write-comments, .single-post .single-post-content, .single-post .site-main .posts-navigation, .page .hentry, .page .comments-area, .page .read-comments, .page .write-comments, .page .page-content, .page .site-main .posts-navigation, .page .site-main .post-navigation, .single-post .site-main .post-navigation, .page .comment-respond, .single-post .comment-respond { background: <?php echo esc_attr(get_theme_mod( 'post_pages_background')); ?>; }
        .page #main th, .single-post #main th, .page #main h1, .page #main h2, .page #main h3, .page #main h4, .page #main h5, .page #main h6, .single-post #main h1, .single-post #main h2, .single-post #main h3, .single-post #main h4, .single-post #main h5, .single-post #main h6, h2.comments-title, .page .comment-list .comment-author .fn, .single-post .comment-list .comment-author .fn { color: <?php echo esc_attr(get_theme_mod( 'post_pages_headline')); ?>; }
        .single-post #main span .single-post .site-main .post-navigation .nav-indicator, .single-post #main p, .single-post #main td, .single-post #main ul,  .single-post #main li,  .single-post #main ol,  .single-post #main blockquote, .page #main span .page .site-main .post-navigation .nav-indicator, .page #main p, .page #main td, .page #main ul,  .page #main li,  .page #main ol,  .page #main blockquote, .page #main, .single-post #main, .page #main p, .single-post #main p, .single-post #main cite, .page #main cite, .page #main abbr, .single-post #main abbr, .single-post .site-main .post-navigation .nav-indicator, .page .site-main .post-navigation .nav-indicator, .page #main label, .single-post #main label { color: <?php echo esc_attr(get_theme_mod( 'post_pages_text')); ?>; }
        .page #main time, .single-post #main time, .page time.entry-date.published, .single-post time.entry-date.published { color: <?php echo esc_attr(get_theme_mod( 'post_pages_date')); ?>; }
        .page #main a, .single-post #main a { color: <?php echo esc_attr(get_theme_mod( 'post_pages_links')); ?>; }
        .page .comment-list .comment-body, .single-post .comment-list .comment-body, .page .comment-form textarea, .single-post .comment-form textarea { border-color: <?php echo esc_attr(get_theme_mod( 'post_pages_borders')); ?>; }
        .single-post .form-submit input#submit, .single-post #main .comment-reply-form input#submit, .page #main .form-submit input#submit, .page #main .comment-reply-form input#submit, .single-post #main .comment-reply-form input#submit { border-color: <?php echo esc_attr(get_theme_mod( 'post_pages_button_bg')); ?>; }
        .single-post .form-submit input#submit, .single-post #main .comment-reply-form input#submit, .page #main .form-submit input#submit, .page #main .comment-reply-form input#submit, .single-post #main .comment-reply-form input#submit{ color: <?php echo esc_attr(get_theme_mod( 'post_pages_button_text')); ?>; }
        .page blockquote, .single-post blockquote{ border-color: <?php echo esc_attr(get_theme_mod( 'post_pages_text')); ?>; }
        #secondary .widget{ background: <?php echo esc_attr(get_theme_mod( 'sidebar_background')); ?>; }
        #secondary .widget th, #secondary .widget-title, #secondary h1, #secondary h2, #secondary h3, #secondary h4, #secondary h5, #secondary h6 { color: <?php echo esc_attr(get_theme_mod( 'sidebar_headline')); ?>; }
        #secondary .widget cite, #secondary .widget, #secondary .widget p, #secondary .widget li, #secondary .widget td, #secondary .widget abbr{ color: <?php echo esc_attr(get_theme_mod( 'sidebar_text')); ?>; }
        #secondary .widget a, #secondary .widget li a{ color: <?php echo esc_attr(get_theme_mod( 'sidebar_link')); ?>; }
        #secondary input.search-submit { color: <?php echo esc_attr(get_theme_mod( 'sidebar_button_text_color')); ?>; }
        #secondary input.search-submit { background: <?php echo esc_attr(get_theme_mod( 'sidebar_button_bg')); ?>; }
        #supplementary .widget, .site-footer { background: <?php echo esc_attr(get_theme_mod( 'footer_background')); ?>; }
        .site-footer .widget-title, .site-footer h1, .site-footer h2, .site-footer h3, .site-footer h4, .site-footer h5, .site-footer h6 { color: <?php echo esc_attr(get_theme_mod( 'footer_headline')); ?>; }
        .site-footer .widget, .site-footer .widget li, .site-footer .widget p, .site-footer abbr, .site-footer cite, .site-footer table caption { color: <?php echo esc_attr(get_theme_mod( 'footer_text')); ?>; }
        .site-footer .widget a, .site-footer .widget li a, .site-footer .widget ul li a { color: <?php echo esc_attr(get_theme_mod( 'footer_link')); ?>; }
        .site-footer input.search-submit { background: <?php echo esc_attr(get_theme_mod( 'footer_button_bg')); ?>; }
        .site-footer input.search-submit { color: <?php echo esc_attr(get_theme_mod( 'footer_button_text')); ?>; }
        .copyright { color: <?php echo esc_attr(get_theme_mod( 'footer_copyright_text')); ?>; }
        .copyright { background: <?php echo esc_attr(get_theme_mod( 'footer_copyright_bg')); ?>; }
        a.topbutton, a.topbutton:visited, a.topbutton:hover, a.topbutton:focus, a.topbutton:active { background: <?php echo esc_attr(get_theme_mod( 'scroll_top_background')); ?>; }
        a.topbutton, a.topbutton:visited, a.topbutton:hover, a.topbutton:focus, a.topbutton:active { color: <?php echo esc_attr(get_theme_mod( 'scroll_top_color')); ?>; }
        #header-image .header-button-left { color: <?php echo esc_attr(get_theme_mod( 'header_left_button_text_color')); ?>; }
        #header-image .header-button-left { background: <?php echo esc_attr(get_theme_mod( 'header_left_button_background_color')); ?>; }
        #header-image .header-button-right { color: <?php echo esc_attr(get_theme_mod( 'header_right_button_text_color')); ?>; }
        #header-image .header-button-right { border-color: <?php echo esc_attr(get_theme_mod( 'header_right_button_background_color')); ?>; }
        .top-widget h3, .top-widget-inner-wrapper h3 { color: <?php echo esc_attr(get_theme_mod( 'top_widgets_headline_color')); ?>; }
        .top-widget, .top-widget p, .top-widget-inner-wrapper p, .top-widget-inner-wrapper { color: <?php echo esc_attr(get_theme_mod( 'top_widgets_text_color')); ?>; }
        .top-widget a, .top-widget-inner-wrapper a { color: <?php echo esc_attr(get_theme_mod( 'top_widgets_link_color')); ?>; }
        .top-widget-inner-wrapper { background: <?php echo esc_attr(get_theme_mod( 'top_widgets_background_color')); ?>; }
    </style>
    <?php }
    add_action( 'wp_head', 'headstart_custom_styles' );
    endif;





