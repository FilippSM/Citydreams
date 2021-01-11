<?php
/**
 * Citydreams-wp Theme Customizer
 *
 * @package Citydreams-wp
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function citydreams_wp_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'citydreams_wp_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'citydreams_wp_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'citydreams_wp_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function citydreams_wp_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function citydreams_wp_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function citydreams_wp_customize_preview_js() {
	wp_enqueue_script( 'citydreams-wp-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'citydreams_wp_customize_preview_js' );

add_action('customize_register', 'dco_customize_register');
 
function dco_customize_register(WP_Customize_Manager $wp_customize) {

        // Добавляем панель
    $wp_customize->add_panel( 
    'footer_settings',
       array(
            'priority' => 30, 
            'capability' => 'edit_theme_options',
            'title' => 'Настройки шапки и подвала',
            'description' => '',
        ) 
    );
  
    // Добавляем секцию
    $wp_customize->add_section(
        'custom_copyright', // id секции
        array(
            'title'     => 'Социальные сети',
            'priority'  => 10,
            'panel' => 'footer_settings', 
        )
	);
    
    $wp_customize->add_setting(
	    'copyright',
	    array(
			'default'      => 'url', 
			'transport'         => 'refresh',
	    )
	);

	$wp_customize->add_control(
	    'copyright',
	    array(
            'section' => 'custom_copyright',
            'type' => 'url',
            'label' => 'vkontakte',
	    )
	);
    
    $wp_customize->add_setting(
	    'social-inst',
	    array(
			'default'      => 'url', 
			'transport'         => 'refresh',
	    )
	);

	$wp_customize->add_control(
	    'social-inst',
	    array(
            'section' => 'custom_copyright',
            'type' => 'url',
            'label' => 'instagram',
	    )
	);
    
    $wp_customize->add_setting(
	    'social-strava',
	    array(
			'default'      => 'url', 
			'transport'         => 'refresh',
	    )
	);

	$wp_customize->add_control(
	    'social-strava',
	    array(
            'section' => 'custom_copyright',
            'type' => 'url',
            'label' => 'strava',
	    )
	);
    
    
    
    
    //Добавляем новую вкладку в раздел Внешний вид -> Настроить админ-панели
    $wp_customize->add_section('footer', array(
        'title' => 'Подвал',
        'priority' => 1, //с помощью этого параметра можно регулировать положение вкладки в списке вкладок
        'panel' => 'footer_settings', 
    ));
 
    //Указываем имя настройки, которая будет содержать текст для подвала
    $setting_name = 'footer_text';
    //и добавляем ее
    $wp_customize->add_setting($setting_name, array(
        'default' => '', //с помощью этого параметра можно задать текст по умолчанию
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage'
    ));
 
    $wp_customize->add_control($setting_name, array(
        'section' => 'footer',
        'type' => 'textarea',
        'label' => 'Описание сайта',
    ));   
    
    //Добавляем поддержку предпросмотра изменений без полного обновления страницы
    $wp_customize->selective_refresh->add_partial($setting_name, array(
        'selector' => '.site-info', //должен содержать class или id элемента с текстом в подвале
        'render_callback' => function() use ($setting_name) {
            return nl2br(esc_html(get_theme_mod($setting_name)));
        }
    ));
    
    $setting_name = 'footer_name-site';
    $wp_customize->add_setting($setting_name, array(
        'default' => '',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage'
    ));
 
    $wp_customize->add_control($setting_name, array(
        'section' => 'footer',
        'type' => 'textarea',
        'label' => 'Название сайта',
    ));
     
    $wp_customize->selective_refresh->add_partial($setting_name, array(
        'selector' => '.site-info', //должен содержать class или id элемента с текстом в подвале
        'render_callback' => function() use ($setting_name) {
            return nl2br(esc_html(get_theme_mod($setting_name)));
        }
    ));
    
    $setting_name = 'footer_social';
    $wp_customize->add_setting($setting_name, array(
        'default' => 'url',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage'
    ));
 
    $wp_customize->add_control($setting_name, array(
        'section' => 'footer',
        'type' => 'url',
        'label' => 'Контакты',
    ));

    $setting = 'bg_image';
    $wp_customize->add_setting($setting, array(
        'default'      => '', // по умолчанию - фоновое изображение не установлено
        'transport'    => 'postMessage'
    ));
 

    $wp_customize->add_control(
        new WP_Customize_Image_Control( $wp_customize, $setting, [
            'label'    => 'Логотип',
            'settings' => 'bg_image',
            'section'  => 'footer'
        ] )
    );
     
    $wp_customize->selective_refresh->add_partial($setting, array(
    'selector' => '.site-image', //должен содержать class или id элемента с текстом в подвале
    'render_callback' => function() use ($setting) {
        return nl2br(esc_html(get_theme_mod($setting)));
    }
    ));
    
    $wp_customize->add_section('header', array(
        'title' => 'Шапка',
        'priority' => 1,
        'panel' => 'footer_settings', 
    ));
 
    $setting_name = 'header_site-name';
    $wp_customize->add_setting($setting_name, array(
        'default' => '',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage'
    ));
 
    $wp_customize->add_control($setting_name, array(
        'section' => 'header',
        'type' => 'textarea',
        'label' => 'Название сайта',
    ));      
}


add_action('customize_register', 'customize_aside');

function customize_aside(WP_Customize_Manager $wp_customize) {
    //Добавляем новую вкладку в раздел Внешний вид -> Настроить админ-панели
    $wp_customize->add_section('aside', array(
        'title' => 'Боковая панель',
        'priority' => 1, //с помощью этого параметра можно регулировать положение вкладки в списке вкладок
    ));
 
    //Указываем имя настройки, которая будет содержать текст для подвала
    $setting_name = 'aside_text';
    //и добавляем ее
    $wp_customize->add_setting($setting_name, array(
        'default' => '', //с помощью этого параметра можно задать текст по умолчанию
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage'
    ));
 
    $wp_customize->add_control($setting_name, array(
        'section' => 'aside',
        'type' => 'textarea',
        'label' => 'Текстовое поле',
    ));
    
}




//
//add_action( 'customize_register', 'theme_slug_add_customize_register' );
//function theme_slug_add_customize_register( $wp_customize ) { 
//
//// Добавляем панель
//$wp_customize->add_panel( 
//    'footer_settings',
//       array(
//            'priority' => 30, 
//            'capability' => 'edit_theme_options',
//            'title' => 'Настройки Footer',
//            'description' => '',
//        ) 
//    );
//  
//// Добавляем секцию
//$wp_customize->add_section(
//		'custom_copyright', // id секции
//		array(
//			'title'     => 'Текст копирайта',
//			'priority'  => 10,
//			'panel' => 'footer_settings', 
//		)
//	);
//
//	$wp_customize->add_setting(
//	    'copyright',
//	    array(
//			'default'      => 'Здесь текст копирайта', 
//			'transport'         => 'refresh',
//	    )
//	);
//
//	$wp_customize->add_control(
//	    'copyright',
//	    array(
//	        'label' => 'Добавьте текст',
//	        'description' => 'Добавьте текст копирайта. Поле поддерживает HTML теги.',
//	        'section' => 'custom_copyright',
//	        'type' => 'textarea',
//	    )
//	);
//	
//    $setting_name = 'footer_name-site';
//    $wp_customize->add_setting($setting_name, array(
//        'default' => '',
//        'sanitize_callback' => 'sanitize_textarea_field',
//        'transport' => 'postMessage'
//    ));
// 
//    $wp_customize->add_control($setting_name, array(
//        'section' => 'custom_copyright',
//        'type' => 'textarea',
//        'label' => 'Название сайта',
//    ));
//    
//    
//    
//    
//    
//    
//    
//    
//	  /**
//	   * Sanitize Text
//	   */
//	  function fe_dev_sanitize_text( $input ) {
//	       return wp_kses_post( force_balance_tags( $input ) );
//	  }
//
//}
//


