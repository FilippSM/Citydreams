<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Citydreams-wp
 */

get_header();
?>

	<main class="main">
        <div class="container">   
            <div class="main__body">
                <div class="main-content">       
                    <p>
                        404 Page Not Found.
                    </p>
                    <p>
                        Вы попали на страницу которой не существует. Возможно, она была удалена или в запросе был указан не верный адрес страницы.
                    </p>
                    <p>
                        Попробуйте перейти на <a href="<?php echo get_option('home'); ?>/">главную странцу</a>.
                    </p>
                </div>
            </div>
        </div>
    </main>

<?php
get_footer();
