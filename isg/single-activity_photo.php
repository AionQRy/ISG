<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package paradiz
 */

get_header(); ?>

<?php 
if(have_posts()):
    while ( have_posts() ) : the_post(); 
    $gallerys = get_field('image_gallery', get_the_ID() );
    $post_date = get_the_date( 'd F Y' ); 
?>

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
                        <article id="post-<?php the_ID(); ?>" <?php post_class('content-single'); ?>>
                            <header class="entry-header">
                                <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
                                <p class="p-meta">
                                    <?php echo $post_date;?>
                                </p>
                            </header>

                            <div class="entry-content"> 
                                <div class="box-gallery">
                                <?php 
                                    if( $gallerys ): ?>
                                        <div class="list-gallery">
                                            <?php foreach( $gallerys as $gallery ): ?>
                                                <div class="article-gallery">
                                                    <a href="<?php echo esc_url($gallery['url']); ?>">
                                                        <img src="<?php echo esc_url($gallery['sizes']['large']); ?>" alt="<?php echo esc_attr($gallery['alt']); ?>" />
                                                    </a>
                                                    <p><?php echo esc_html($gallery['caption']); ?></p>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if( have_rows('download_box') ): ?>
                                        <div class="box-link_download">
                                        <?php 
                                            $i = 1;
                                            while( have_rows('download_box') ): the_row(); 
                                                $file = get_sub_field('file-image');
                                                if( $file ): ?>
                                                <a href="<?php echo $file['url']; ?>"><i class="las la-image"></i><?php esc_html_e( 'ดาวน์โหลดรูป', 'isg' ); ?> <?php echo $i++;?></a>
                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <footer class="entry-footer">
                                <?php paradiz_entry_footer(); ?>
                            </footer>
                        </article>
                            <?php wp_reset_postdata(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<?php
    endwhile; 
else:
    echo 'ไม่มีรูปภาพ';
endif;
?>
<?php get_footer(); ?>