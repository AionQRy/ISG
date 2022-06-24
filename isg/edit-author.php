<?php
/**
 * template name: Edit Author
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
            <div class="bar-success"><p class="status"></p></div>
                <div class="s-container">
                    <div class="main-object_photo">
                        <div class="object-1">
                            <?php get_sidebar('author'); ?>
                        </div>
                        <div class="object-2">
                            <div class="box-object">    
                                <div class="header-cat">
                                    <h2 class="head-cat"><i class="las la-user-tie"></i><?php esc_html_e( 'แก้ไขข้อมูลผู้ใช้', 'isg' ); ?></h2>      
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
                                            $name = get_the_author_meta( 'first_name', $current_user->ID );
                                            $last_name = get_the_author_meta( 'last_name', $current_user->ID ); 
                                            $user_email = get_the_author_meta( 'user_email', $current_user->ID );
                                        ?>
                                        <script>
                                            jQuery(document).ready(function($) {  
  
                                            $.cookie('isg_controller', '<?php echo $isg_controller; ?>', { expires: 7, path: '/' });
                                            $.cookie('name', '<?php echo $name; ?>', { expires: 7, path: '/' });  
                                            $.cookie('last_name', '<?php echo $name; ?>', { expires: 7, path: '/' });  
                                            $.cookie('email', '<?php echo $user_email; ?>', { expires: 7, path: '/' });                                               
                                            $.cookie('position', '<?php echo $position; ?>', { expires: 7, path: '/' });
                                            $.cookie('telephone_no', '<?php echo $telephone_no; ?>', { expires: 7, path: '/' });
                                            $.cookie('ext', '<?php echo $ext; ?>', { expires: 7, path: '/' });
                                            $.cookie('mobile_phone', '<?php echo $mobile_phone; ?>', { expires: 7, path: '/' });
                                            $.cookie('position_controllerx', '<?php echo $position_controller; ?>', { expires: 7, path: '/' });
                                            $.cookie('extension', '<?php echo $extension; ?>', { expires: 7, path: '/' });
                                            $.cookie('company_code', '<?php echo $company_code; ?>', { expires: 7, path: '/' });
                                            
                                            });
                                            
                                        </script>

                                        <div id="form-edit_author" class="form-edit_author">
                                            <form action="" method="POST" id="edit_author" class="edit_author">
                                                <div class="input-box">
                                                    <h4 class="title-input"><?php esc_html_e( 'ISG Controller:', 'isg' ); ?></h4>
                                                    <select name="isg_contro" id="isg_contro" class="isg_contro">
                                                        <option value="mr" <?php if($isg_controller == 'mr'){echo 'selected';}?>><?php esc_html_e( 'Mr.', 'isg' ); ?></option>
                                                        <option value="ms" <?php if($isg_controller == 'ms'){echo 'selected';}?>><?php esc_html_e( 'Ms.', 'isg' ); ?></option>
                                                    </select>
                                                </div>
                                                <div class="input-box">
                                                    <h4 class="title-input"><?php esc_html_e( 'Name:', 'isg' ); ?></h4>
                                                    <input type="text" class="input-field first_name" id="first_name" name="first_name" value="<?php echo $name; ?>">
                                                </div>
                                                <div class="input-box">
                                                    <h4 class="title-input"><?php esc_html_e( 'Last Name:', 'isg' ); ?></h4>
                                                    <input type="text" class="input-field last_name" id="last_name" name="last_name" value="<?php echo $last_name; ?>">
                                                </div>
                                                <div class="input-box">
                                                    <h4 class="title-input"><?php esc_html_e( 'Email:', 'isg' ); ?></h4>
                                                    <input type="email" class="input-field email" id="email_u" name="email" value="<?php echo $user_email; ?>">
                                                </div>
                                                <div class="input-box">
                                                    <h4 class="title-input"><?php esc_html_e( 'Position:', 'isg' ); ?></h4>
                                                    <input type="text" class="input-field position" id="position" name="position" value="<?php echo $position; ?>">
                                                </div>
                                                <div class="input-box">
                                                    <h4 class="title-input"><?php esc_html_e( 'Telephone No.:', 'isg' ); ?></h4>
                                                    <input type="text" class="input-field telephone_no" id="telephone" name="telephone_no" value="<?php echo $telephone_no; ?>">
                                                </div>
                                                <div class="input-box">
                                                    <h4 class="title-input"><?php esc_html_e( 'Ext:', 'isg' ); ?></h4>
                                                    <input type="text" class="input-field ext" id="ext" name="ext" value="<?php echo $ext; ?>">
                                                </div>
                                                <div class="input-box">
                                                    <h4 class="title-input"><?php esc_html_e( 'Mobile Phone:', 'isg' ); ?></h4>
                                                    <input type="text" class="input-field mobile_phone" id="mobile_phone" name="mobile_phone" value="<?php echo $mobile_phone; ?>">
                                                </div>
                                                <div class="input-box">
                                                    <h4 class="title-input"><?php esc_html_e( 'Position Controller:', 'isg' ); ?></h4>
                                                    <input type="text" class="input-field position_controller" id="position_controller" name="position_controller" value="<?php echo $position_controller; ?>"> 
                                                </div>
                                                <div class="input-box">
                                                    <h4 class="title-input"><?php esc_html_e( 'Extension:', 'isg' ); ?></h4>
                                                    <input type="text" class="input-field extension" id="extension" name="extension" value="<?php echo $extension; ?>">
                                                </div>
                                                <div class="input-box">
                                                    <h4 class="title-input"><?php esc_html_e( 'Company Code:', 'isg' ); ?></h4>
                                                    <input type="text" class="input-field company_code" id="company_code" name="company_code" value="<?php echo $company_code; ?>">
                                                </div>
                                                <div class="input-box">
                                                    <h4 class="title-input"><?php esc_html_e( 'Password:', 'isg' ); ?></h4>
                                                    <input type="password" class="input-field password" id="password" name="password">
                                                </div>
                                                <div class="status-box">
                                                    <p class="status"></p>
                                                </div>
                                                <div class="btn-submit_box">
                                                    <input type="hidden" name="check_author" value="success">
                                                    <button type="submit" class="btn-submit"><?php esc_html_e( 'Update', 'isg' ); ?></button>
                                                </div>
                                            </form>
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