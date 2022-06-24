<?php
/**
 * template name: Join
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package paradiz
 */
get_header();

if(!is_user_logged_in()){
    wp_redirect( get_home_url() . '/login' ); exit;
}
$current_user = wp_get_current_user();
if(!$current_user->ID){
    wp_redirect( get_author_posts_url( $current_user->ID ) ); exit;
}

$id_p = $_GET['event'];
?>

<div class="tempate-box template-change template-join" style="background: url(<?php echo get_stylesheet_directory_uri(); ?>/img/bg-dots-white.jpg);">
    <div class="s-container">
        <div class="main-salary">
        <div class="content-form">
          <div class="box-form">
            <div class="box-range">
              <h3><i class="las la-user"></i> <?php echo esc_html__( 'Change ISG Controller', 'isg' ); ?></h3>
              <div class="box-join">
                <?php echo do_shortcode( '[fluentform id="6"]' ); ?>
                <script>
                    jQuery(document).ready(function($) {
                        $('select#ff_6_dropdown').change(function(event) {
                            var index = $(this).children('option:selected').index();
                            $('select#ff_6_dropdown_1 option')[index].selected = true;
                        });
                        $("input[name='name_event']").val("<?php echo get_the_title($id_p);?>");
                        $("input[name='url_event']").val("<?php echo get_permalink($id_p);?>");
                    });
                </script>
                </div>
            </div>
          </div>
        </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
