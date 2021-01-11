<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Citydreams-wp
 */


?>

    <aside class="aside">
        <div class="aside__body">
            <div class="aside__info">
                <div class="aside__timer">
                    <script src="//megatimer.ru/get/51b46017cd13fe5c6a699061a51fafc4.js"></script>    
                </div>           
                <p>
                    <?php echo nl2br(esc_html(get_theme_mod('aside_text'))); ?>
                </p>
                <br>
                <p>
                    Промежуточные и итоговые результаты:
                    <a href="http://citydreams/sobytiya/">здесь.</a>
                    <br>
                    Информация по забегу и регламент:
                    <a href="http://citydreams/bez-rubriki/zagolovok-vtorogo-urovnya-10/">здесь.</a>     
               </p>
            </div>    
        </div>   
    </aside>