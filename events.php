<?php
/**
 * Template name: События
 * 
 */

?>

<?php
get_header();
?>
    <main class="main">
        <div class="container">   
            <div class="main__body">
                <div class="main-content">       
                    <article class="main-content__article article">
                        <div class="article__image">
                            <?php echo get_the_post_thumbnail(get_the_ID(), 'full'); ?>        
                        </div>   
                        <div class="article__body">
                            <h1><?php the_title(); ?>
                            </h1>
                            <?php the_content(); ?>        
                        </div>     
                    </article>   
                </div>      
            </div>
        </div>
    </main>


<?php
get_footer();