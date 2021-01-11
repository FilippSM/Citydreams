<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Citydreams-wp
 */

?>


<?php wp_footer(); ?>

   
    <footer class="footer">
        <div class="container">
            <div class="footer__body">
                <div class="footer__widget-left">
                    <div class="footer__logo">
                        <div class="footer__img">
                            <img src="<?php echo nl2br(esc_html(get_theme_mod('bg_image'))); ?>">         
                        </div>    
                        <div class="footer__logo-name">
<!--
                            Город<br> 
                            мечты
-->
                            <?php echo nl2br(esc_html(get_theme_mod('footer_name-site'))); ?>   
                        </div>
                    </div>
                </div>
                <div class="footer__widget-medium">
                    <div class="footer__info">
<!--                        zhlobin-dream.by - Спортивный портал - Спорт | Общественая деятельность | Спортивные ивенты-->
                    	
                        <?php echo nl2br(esc_html(get_theme_mod('footer_text'))); ?>
                                                                                                                         
                    </div>
                </div>
                <div class="footer__widget-right">
                    <div class="footer__social-media">
                        <a href="<?php echo nl2br(esc_html(get_theme_mod('copyright'))); ?>"><i class="fab fa-vk" ></i></a>
                        <a href="<?php echo nl2br(esc_html(get_theme_mod('social-inst'))); ?>"><i class="fab fa-instagram"></i></a>
                        <a href="<?php echo nl2br(esc_html(get_theme_mod('social-strava'))); ?>"><i class="fab fa-strava"></i></a>
                    </div>
                    <div>
                        <ul class="footer__list">
                            <li class="footer__item">
                                <a href="<?php echo nl2br(esc_html(get_theme_mod('footer_social'))); ?>" class="footer__link">Контакты</a>
                            </li>
                        </ul>   
                    </div>
                </div>    
            </div>        
        </div>    
    </footer>
       
    <script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    
<!--    для вывода таблицы в pdf-->
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    
    
    
    
    <script src="<?php echo get_template_directory_uri() ?>/assets/js/tests-site.js" defer></script> 

</body>
</html>
