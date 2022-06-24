<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
                                <div class="header-cat">
                                    <h2 class="head-cat"><i class="las la-user-tie"></i><?php esc_html_e( 'ข้อมูลส่วนบุคคล', 'isg' ); ?></h2>
                                    <h3 class="head-cat"><?php esc_html_e( 'ข้อมูลพื้นฐานและข้อมูลการติดต่อ', 'isg' ); ?></h3>
                                    <div class="deteil-p">
                                        <p><?php esc_html_e( 'ท่านสามารถดูข้อมูลส่วนตัวของท่านด้านล่าง หากต้องการเปลี่ยนข้อมูลผู้ใช้โปรดคลิกปุ่ม Change ISG Controller', 'isg' ); ?></p>
                                        <p><?php esc_html_e( 'หากมีข้อสงสัยโปรดติดต่อผู้ดูแล เว็บไซต์ของเรา', 'isg' ); ?></p>
                                    </div>       
                                </div>
                                <div class="box-column_post">
                                    <div class="deteil-author">
                                        <?php 
                                            $isg_controller = get_field('isg_controller' , 'user_' . $current_user->ID);
                                            $position = get_field('position' , 'user_' . $current_user->ID);
                                            $telephone_no = get_field('telephone_no' , 'user_' . $current_user->ID);
                                            $ext = get_field('ext' , 'user_' . $current_user->ID);
                                            $mobile_phone = get_field('mobile_phone' , 'user_' . $current_user->ID);
                                            $position_controller = get_field('position_controllerx' , 'user_' . $current_user->ID);
                                            $extension = get_field('extension' , 'user_' . $current_user->ID);
                                            $company_code = get_field('company_code' , 'user_' . $current_user->ID);
                                            $name = get_the_author_meta( 'first_name', $current_user->ID ) . ' ' .get_the_author_meta( 'last_name', $current_user->ID ); 
                                            $user_email = get_the_author_meta( 'user_email', $current_user->ID );
                                        ?>

                                    <div class="list-author">
                                            <h4 class="head-a"><span class="head-b"><?php esc_html_e( 'ISG Controller:', 'isg' ); ?></span><?php echo $isg_controller; ?></h4><i class="las la-arrow-right"></i>
                                        </div>
                                        <div class="list-author">
                                            <h4 class="head-a"><span class="head-b"><?php esc_html_e( 'Name:', 'isg' ); ?></span><?php echo get_the_author_meta( 'first_name', $current_user->ID ) . ' ' .get_the_author_meta( 'last_name', $current_user->ID ); ?></h4><i class="las la-arrow-right"></i>
                                        </div>
                                        <div class="list-author">
                                            <h4 class="head-a"><span class="head-b"><?php esc_html_e( 'Position:', 'isg' ); ?></span><?php echo $position; ?></h4><i class="las la-arrow-right"></i>
                                        </div>
                                        <div class="list-author">
                                            <h4 class="head-a"><span class="head-b"><?php esc_html_e( 'Telephone:', 'isg' ); ?></span><?php echo $telephone_no; ?></h4><i class="las la-arrow-right"></i>
                                        </div>
                                        <div class="list-author">
                                            <h4 class="head-a"><span class="head-b"><?php esc_html_e( 'Ext:', 'isg' ); ?></span><?php echo $ext; ?></h4><i class="las la-arrow-right"></i>
                                        </div>
                                        <div class="list-author">
                                            <h4 class="head-a"><span class="head-b"><?php esc_html_e( 'Mobile Phone:', 'isg' ); ?></span><?php echo $mobile_phone; ?></h4><i class="las la-arrow-right"></i>
                                        </div>
                                        <div class="list-author">
                                            <h4 class="head-a"><span class="head-b"><?php esc_html_e( 'Position Controller:', 'isg' ); ?></span><?php echo $position_controller; ?></h4><i class="las la-arrow-right"></i>
                                        </div>
                                        <div class="list-author">
                                            <h4 class="head-a"><span class="head-b"><?php esc_html_e( 'Extension:', 'isg' ); ?></span><?php echo $extension; ?></h4><i class="las la-arrow-right"></i>
                                        </div>
                                        <div class="list-author">
                                            <h4 class="head-a"><span class="head-b"><?php esc_html_e( 'Company Code:', 'isg' ); ?></span><?php echo $company_code; ?></h4><i class="las la-arrow-right"></i>
                                        </div>
                                        <div class="list-author">
                                            <h4 class="head-a"><span class="head-b"><?php esc_html_e( 'E-mail:', 'isg' ); ?></span><?php echo get_the_author_meta( 'user_email', $current_user->ID ); ?></h4><i class="las la-arrow-right"></i>
                                        </div>
                                        <div class="list-author">
                                            <h4 class="head-a"><span class="head-b"><?php esc_html_e( 'Username:', 'isg' ); ?></span><?php echo get_the_author_meta( 'user_login', $current_user->ID ); ?></h4>
                                        </div>
                                        <div class="list-author">
                                            <h4 class="head-a"><span class="head-b"><?php esc_html_e( 'Password:', 'isg' ); ?></span>***************<?php// echo get_the_author_meta( 'user_pass', $current_user->ID ); ?></h4><i class="las la-arrow-right"></i>
                                        </div>
                                        
                                        <div class="btn-button_box">
                                            <a href="<?php echo get_home_url();?>/edit-author/" class="btn-change"><?php esc_html_e( 'Edit User', 'isg' ); ?><i class="las la-edit"></i></a>
                                            <a href="<?php echo get_home_url();?>/change-user/" class="btn-change"><?php esc_html_e( 'Change ISG Controller', 'isg' ); ?><i class="las la-edit"></i></a>
                                        </div>
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