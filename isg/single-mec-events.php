<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package paradiz
 */

get_header(); 
$term = get_term_by( 'id', get_post_meta(get_the_ID(),'mec_location_id',true), 'mec_location' );                                    
 ?>
<div class="main-body event-body author-body">
    <div id="primary" class="content-area">
        <main id="main" class="site-main hide-title">
            <div class="single-ac_ph">
                <div class="s-container">
                    <div class="main-object_photo">
                        <div class="object-1">
                            <?php get_sidebar('author'); ?>
                        </div>
                        <div class="object-2">
                            <div class="box-object">
                                <div class="header-cat">
                                    <h2 class="head-cat"><i class="las la-calendar"></i><?php echo get_the_title(); ?></h2>
                                </div>
                                <div class="box-column_post">
                                    <div class="thumbnail">
                                        <?php the_post_thumbnail( 'large' ); ?>
                                    </div>
                                    <div class="excerpt">
                                        <?php the_content(); ?>
                                    </div>                                  
                                    <div class="event_add">
                                        <div class="event-detail">
                                            <div class="block-detail">                                         
                                                <p><span><i class="las la-clock"></i><?php esc_html_e( 'Date:', 'isg' ); ?></span><?php echo get_post_meta(get_the_ID(),'mec_start_date',true); ?></p>
                                                <p><span><i class="las la-clock"></i><?php esc_html_e( 'End:', 'isg' ); ?></span><?php echo get_post_meta(get_the_ID(),'mec_end_date',true); ?></p>
                                            </div>
                                            <div class="block-detail_2">
                                                <p><span><i class="las la-place-of-worship"></i><?php esc_html_e( 'Place:', 'isg' ); ?></span><?php echo $term->name; ?></p>
                                            </div>
                                        </div>
                                        <a href="/registration-form-isg-annual-general-meeting/?event=<?php echo get_the_ID(); ?>" class="btn-event_add"><i class="las la-calendar-plus"></i><?php esc_html_e( 'Register Now', 'isg' ); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<?php get_footer(); ?>
