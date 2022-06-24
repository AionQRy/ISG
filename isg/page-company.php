<?php
/**
 * template name: Company
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
?>

<div class="main-body author-body">
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
                                <div class="box-column_post">
                                    <div class="deteil-author">
                                        
                                        <?php 
                                            $isg_controller = get_field('isg_controller' , 'user_' . $current_user->ID);
                                            $position = get_field('position' , 'user_' . $current_user->ID);
                                            $telephone_no = get_field('telephone_no' , 'user_' . $current_user->ID);
                                            $ext = get_field('ext' , 'user_' . $current_user->ID);
                                            $mobile_phone = get_field('mobile_phone' , 'user_' . $current_user->ID);
                                            $position_controller = get_field('position_controller' , 'user_' . $current_user->ID);
                                            $extension = get_field('extension' , 'user_' . $current_user->ID);
                                            $company = get_field('company_code' , 'user_' . $current_user->ID);

                                        $args = array(
                                            'post_type'=> 'company',
                                            'posts_per_page' => 1,
                                            'orderby'    => 'date',
                                            'order'    => 'DESC',
                                            'meta_query'	=> array(
                                                array(
                                                    'key'		=> 'username',
                                                    'value'		=> $company,
                                                    'compare'	=> '='
                                                )
                                            )
                                        );
                                        // The Query
                                        query_posts( $args );
                                        
                                        // The Loop
                                        while ( have_posts() ) : the_post();
                                            $code = get_field('code');
                                            $company_name_english = get_field('company_name_english');
                                            $company_name_thai = get_field('company_name_thai');
                                            $nomoosoinikomroad = get_field('nomoosoinikomroad');
                                            $tambol__kwaeng = get_field('tambol__kwaeng');
                                            $amphur__khet = get_field('amphur__khet');
                                            $province = get_field('province');
                                            $postal = get_field('postal');
                                            $branch = get_field('branch');
                                            $tax_id = get_field('tax_id');
                                            $products = get_field('products');
                                            $top_management_name = get_field('top_management_name');
                                            $position_top = get_field('position_top');
                                            $username = get_field('username');                                          

                                        ?>
                                        <div class="head-company">
                                            <h2><?php echo get_the_title(); ?></h2>
                                        </div>
                                        <div class="list-author">
                                            <h4 class="head-a"><span class="head-b"><?php esc_html_e( 'Code:', 'isg' ); ?></span><?php echo $code; ?></h4><i class="las la-arrow-right"></i>
                                        </div>
                                        <div class="list-author">
                                            <h4 class="head-a"><span class="head-b"><?php esc_html_e( 'Company Name(English):', 'isg' ); ?></span><?php echo $company_name_english; ?></h4><i class="las la-arrow-right"></i>
                                        </div>
                                        <div class="list-author">
                                            <h4 class="head-a"><span class="head-b"><?php esc_html_e( 'Company Name(Thai):', 'isg' ); ?></span><?php echo $company_name_thai; ?></h4><i class="las la-arrow-right"></i>
                                        </div>
                                        <div class="list-author">
                                            <h4 class="head-a"><span class="head-b"><?php esc_html_e( 'No./Moo/Soi/Nikom/Road:', 'isg' ); ?></span><?php echo $nomoosoinikomroad; ?></h4><i class="las la-arrow-right"></i>
                                        </div>
                                        <div class="list-author">
                                            <h4 class="head-a"><span class="head-b"><?php esc_html_e( 'Tambol / Kwaeng:', 'isg' ); ?></span><?php echo $tambol__kwaeng; ?></h4><i class="las la-arrow-right"></i>
                                        </div>
                                        <div class="list-author">
                                            <h4 class="head-a"><span class="head-b"><?php esc_html_e( 'Amphur / Khet:', 'isg' ); ?></span><?php echo $amphur__khet; ?></h4><i class="las la-arrow-right"></i>
                                        </div>
                                        <div class="list-author">
                                            <h4 class="head-a"><span class="head-b"><?php esc_html_e( 'Province:', 'isg' ); ?></span><?php echo $province; ?></h4><i class="las la-arrow-right"></i>
                                        </div>
                                        <div class="list-author">
                                            <h4 class="head-a"><span class="head-b"><?php esc_html_e( 'Postal:', 'isg' ); ?></span><?php echo $postal; ?></h4><i class="las la-arrow-right"></i>
                                        </div>
                                        <div class="list-author">
                                            <h4 class="head-a"><span class="head-b"><?php esc_html_e( 'Branch:', 'isg' ); ?></span><?php echo $branch; ?></h4><i class="las la-arrow-right"></i>
                                        </div>
                                        <div class="list-author">
                                            <h4 class="head-a"><span class="head-b"><?php esc_html_e( 'Tax ID:', 'isg' ); ?></span><?php echo $tax_id; ?></h4><i class="las la-arrow-right"></i>
                                        </div>
                                        <div class="list-author">
                                            <h4 class="head-a"><span class="head-b"><?php esc_html_e( 'Products:', 'isg' ); ?></span><?php echo $products; ?></h4><i class="las la-arrow-right"></i>
                                        </div>
                                        <div class="list-author">
                                            <h4 class="head-a"><span class="head-b"><?php esc_html_e( 'Top Management Name:', 'isg' ); ?></span><?php echo $top_management_name; ?></h4><i class="las la-arrow-right"></i>
                                        </div>
                                        <div class="list-author">
                                            <h4 class="head-a"><span class="head-b"><?php esc_html_e( 'Position Top:', 'isg' ); ?></span><?php echo $position_top; ?></h4><i class="las la-arrow-right"></i>
                                        </div>
                                        <div class="list-author">
                                            <h4 class="head-a"><span class="head-b"><?php esc_html_e( 'Username:', 'isg' ); ?></span><?php echo $username; ?></h4><i class="las la-arrow-right"></i>
                                        </div>
                                        
                                        <div class="btn-button_box">
                                            <a href="<?php echo get_home_url();?>/edit-company/" class="btn-change"><?php esc_html_e( 'Edit', 'isg' ); ?><i class="las la-edit"></i></a>
                                        </div>
                                    </div>
                                    <?php
                                        endwhile;
                                        // Reset Query
                                        wp_reset_query();
                                        ?>
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
