<?php
/**
 * Template name: Шаблон поста 
 * Template Post Type: post, page, product
 */

?>

<?php
get_header();
?>
    <main class="main">
        <div class="container">   
            <div class="main__body">
                <div class="main-content">       
            
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                    <article class="main-content__article article">
                        <h1><?php the_title(); ?></h1>   
                        <div class="article__image">
                            <?php echo get_the_post_thumbnail(get_the_ID(), 'full'); ?>        
                        </div>   
                        <div class="article__body">
                            <?php the_content(); ?>
                            

                            
                            <div class="article__descript">
                                <div class="article__descript-author">
                                    <i class="fas fa-user-edit"></i>
                                    <span class="article__author"><?php echo get_the_author(); ?></span>   
                                </div>   
                                <div class="article__descript-date">
                                    <i class="fas fa-calendar-alt"></i>
                                    <span class="article__date"><?php echo get_the_date(); ?></span>   
                                </div>
                            </div>          
                        </div>     
                    </article>
                <?php
                    endwhile;
                else :

                    get_template_part( 'template-parts/content', 'none' );

                endif;
                ?>
                <?php the_posts_pagination(); ?>
                </div>
<!--
                <aside class="aside">
                    <div class="aside__body">
                        <div class="aside__info">
                           <p>
                               Lorem ipsum dolor sit amet, consectetur adipisicing elit. At veniam mollitia dolore a temporibus nostrum consequatur, impedit odio nihil quae, tempora fuga, soluta magni illum distinctio. Accusantium delectus nemo alias non unde necessitatibus perspiciatis impedit facere veritatis maiores, consequuntur magni mollitia, deserunt expedita recusandae in vitae aliquid ea commodi fugit rem repellat facilis! Iure obcaecati, totam delectus commodi tempore hic architecto quod excepturi earum. Alias deleniti tempora, impedit accusantium eos.    
                           </p>
                        </div>    
                    </div>   
                </aside>
-->    
            </div>
        </div>
    </main>


<?php
get_footer();