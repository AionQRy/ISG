<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package paradiz
 */
get_header(); ?>


<div class="main-body">
    <div id="primary" class="content-area">
        <main id="main" class="site-main hide-title">
            <div class="single-ac_ph">
                <div class="s-container">
                    <div class="main-object_photo">
                        <div class="object-1">
                            <?php get_sidebar('activity_photo'); ?>
                        </div>
                        <div class="object-2">
                            <div class="box-object">
                                <?php if ( have_posts() ) : ?>    
                                <div class="header-cat">
                                    <h2 class="head-cat"><?php echo get_the_archive_title(); ?></h2>
                                </div>
                                <div class="box-column_post">
                                <?php 
                                    while ( have_posts() ) : the_post();
                                    get_template_part( 'template-parts/content', 'card-act_photo');
                                    endwhile; 
                                    wp_reset_postdata();
                                    paradiz_posts_navigation(); 
                                ?>
                                </div>
                                <?php else : ?>

                                <?php get_template_part( 'template-parts/content', 'none' ); ?>

                                <?php endif; ?>
                            </div>      
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<?php get_footer(); ?>