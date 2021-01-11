<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Citydreams-wp
 */

get_header();
?>
  <main class="main">
        <div class="container">   
            <div class="main__body">
                <div class="main-content">       
<!--
                    <article class="main-content__article article">
                        <a href="#"><img src="<?php echo get_template_directory_uri() ?>/assets/img/afisha.jpg" alt=""></a>
                        <div class="article__body">
                            <h2><a href="#" class="article__heading">Заголовок второго уровня</a>
                            </h2>
                            <p>
                                <a href="#" class="article__paragraph">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias omnis voluptatum ex possimus ad aliquid, accusamus hic facere neque velit perferendis odit quia reiciendis inventore nulla cum laborum unde molestiae eum, atque nam facilis dolore soluta distinctio quis. Pariatur officiis magnam dolore maiores fuga ipsam laborum perspiciatis dolores nostrum eveniet.
                                </a>
                            </p>
                            <div class="article__descript">
                                <div class="article__descript-author">
                                    <i class="fas fa-user-edit"></i>
                                    <span class="article__author">Никита Самсонов</span>   
                                </div>   
                                <div class="article__descript-date">
                                    <i class="fas fa-calendar-alt"></i>
                                    <span class="article__date">
                                        19/09/2020
                                    </span>   
                                </div>
                            </div>     
                        </div>    
                    </article>
                    <article class="main-content__article-mini article">
                        <div class="article__image">
                            <a href="#"><img src="<?php echo get_template_directory_uri() ?>/assets/img/afisha.jpg" alt=""></a>         
                        </div>   
                        <div class="article__body">
                            <h2><a href="#" class="article__heading">Заголовок второго уровня</a>
                            </h2>
                            <p>
                                <a href="№" class="article__paragraph">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores voluptate tempore, quo labore in odio optio, dolor, distinctio perferendis rem rerum possimus aliquam magni sit assumenda officiis accusamus natus eligendi voluptates. Officia perspiciatis quasi, commodi vitae voluptate sit ipsam recusandae aliquid voluptas veritatis nam sint aut odit suscipit eius pariatur!
                                </a> 
                            </p>
                            <div class="article__descript">
                                <div class="article__descript-author">
                                    <i class="fas fa-user-edit"></i>
                                    <span class="article__author">Самсонов Никита</span>   
                                </div>   
                                <div class="article__descript-date">
                                    <i class="fas fa-calendar-alt"></i>
                                    <span class="article__date">19/09/2020</span>   
                                </div>
                            </div>          
                        </div>     
                    </article>
-->
                           
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                    <article class="main-content__article-mini article">
                        <div class="article__image">
                            <a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail(get_the_ID(), 'full'); ?> </a>         
                        </div>   
                        <div class="article__body">
                            <h2><a href="<?php the_permalink(); ?>" class="article__heading"><?php the_title(); ?></a>
                            </h2>
                            <a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>
                            

                            
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
                <?php get_sidebar(); ?>      
            </div>
        </div>
    </main>


get_footer();
