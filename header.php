<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Citydreams-wp
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="https://gmpg.org/xfn/11">
   
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/css/tests-site.css">
    <script src="https://kit.fontawesome.com/135811f89e.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">



	<?php wp_head(); ?>
</head>

<body class="body" <?php body_class(); ?>>
        <header class="header">
            <div class="container">
                <div class="header__body">
                    <div class="header__logo"> 
<!--                        <a href="http://citydreams">-->
                        <a href="<?php echo get_option('home'); ?>/">
                            <div class="header__img">
<!--                                <img src="/img/swim.png" alt="">   -->
                               
                                <?
                                $logo_img = '';
                                    if ( $custom_logo_id = get_theme_mod( 'custom_logo' ) ) {
                                        $logo_img = wp_get_attachment_image( $custom_logo_id, 'full', false, array(
                                            'class'    => false,
                                            'itemprop' => false,
                                        ) );
                                    }

                                    echo $logo_img;
                                ?>       
                            </div>
                            <div class="header__logo-name">
                                <?php echo nl2br(esc_html(get_theme_mod('header_site-name'))); ?>
<!--
                                Город<br> 
                                мечты    
-->
                            </div>           
                        </a>            
                    </div>             
<!--
                    <nav class="header__menu">
                        <ul class="header__list">
                            <li class="header__item">
                                <a href="#" class="header__link">Главная</a>
                            </li>
                            <li class="header__item">
                                <a href="#" class="header__link">О нас</a>
                            </li>
                            <li class="header__item">
                                <a href="#" class="header__link">События</a>
                            </li>
                            <li class="header__item">
                                <a href="#" class="header__link">Информация</a>
                            </li>
                            <li class="header__item">
                                <a href="#" class="header__link">Контакты</a>
                            </li>
                        </ul>
                    </nav>
-->
                    
                    
                    <nav class="header__menu">
                        <?php
                        wp_nav_menu( array( 
                            'theme_location'  => 'headermenu',                        
                            'items_wrap' => '<ul class="header__list">%3$s</ul>',
                            'container'       => false,                           
                            'container_class' => 'header__menu',
                        ) ); 
                        ?>
                    
                        <div class="header__social-media">
                            <a href="<?php echo nl2br(esc_html(get_theme_mod('copyright'))); ?>"><i class="fab fa-vk" ></i></a>
                            <a href="<?php echo nl2br(esc_html(get_theme_mod('social-inst'))); ?>"><i class="fab fa-instagram"></i></a>
                            <a href="<?php echo nl2br(esc_html(get_theme_mod('social-strava'))); ?>"><i class="fab fa-strava"></i></a>
                        </div>
                    </nav>

                    <div class="header__burger">
                        <span></span>
                    </div> 
                </div>   
            </div>          
        </header>