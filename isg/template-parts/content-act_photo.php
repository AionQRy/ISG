<?php
/**
 * Loop Name: Content Post Detail
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('content-single'); ?>>
    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header>

    <div class="entry-content">
        <p class="entry-meta">
        </p>
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

        </div>
    </div>

    <footer class="entry-footer">
        <?php paradiz_entry_footer(); ?>
    </footer>
</article>
