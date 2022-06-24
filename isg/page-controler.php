<?php
/**
 * template name: Change ISG Controller
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


<div class="tempate-box template-change" style="background: url(<?php echo get_stylesheet_directory_uri(); ?>/img/bg-dots-white.jpg);">
    <div class="s-container">
        <div class="main-salary">
        <div class="content-form">
          <div class="box-form">
            <div class="box-range">
              <h3><i class="las la-user"></i> <?php echo esc_html__( 'Change ISG Controller', 'isg' ); ?></h3>
              <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-11 col-sm-10 col-md-10 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
                            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                                <form action="" id="msform" name="change-form" method="POST">
                                    <!-- progressbar -->
                                    <ul id="progressbar">
                                        <li class="active" id="account"><strong><?php esc_html_e( 'Account', 'isg' ); ?></strong></li>
                                        <li id="personal"><strong><?php esc_html_e( 'Detail', 'isg' ); ?></strong></li>
                                        <li id="confirm"><strong>Finish</strong></li>
                                    </ul>
                                    <fieldset id="field1">
                                        <div class="form-card">
                                            <div class="c-input_box drop_form">
                                                <label class="fieldlabels"><?php esc_html_e( 'ISG Controller:', 'isg' ); ?></label> 
                                                <select name="isg_contro" id="isg_contro" class="isg_contro exd" >
                                                    <option value="mr" <?php if($isg_controller == 'mr'){echo 'selected';}?>><?php esc_html_e( 'Mr.', 'isg' ); ?></option>
                                                    <option value="ms" <?php if($isg_controller == 'ms'){echo 'selected';}?>><?php esc_html_e( 'Ms.', 'isg' ); ?></option>
                                                </select>
                                            </div>
                                            <div class="c-input_box grid-2">
                                                <div class="object-1">
                                                    <label class="fieldlabels"><?php esc_html_e( 'Name:', 'isg' ); ?></label> 
                                                    <input type="text" class="input-field c-first_name exd" id="c-first_name" name="c-first_name" >
                                                </div>
                                                <div class="object-2">
                                                    <label class="fieldlabels"><?php esc_html_e( 'Last Name:', 'isg' ); ?></label>
                                                    <input type="text" class="input-field c-last_name exd" id="c-last_name" name="c-last_name" >
                                                </div>
                                            </div>
                                            <div class="c-input_box">
                                                <label class="fieldlabels"><?php esc_html_e( 'Postion:', 'isg' ); ?></label>
                                                <input type="text" class="input-field c-position exd" id="c-position" name="c-position" >
                                            </div>
                                            <div class="c-input_box grid-2">                                               
                                                <div class="object-1">
                                                    <label class="fieldlabels"><?php esc_html_e( 'Telephone no.:', 'isg' ); ?></label>
                                                    <input type="text" class="input-field c-telephone exd" id="c-telephone" name="c-telephone" >
                                                </div>
                                                <div class="object-2">
                                                    <label class="fieldlabels"><?php esc_html_e( 'Ext:', 'isg' ); ?></label>
                                                    <input type="text" class="input-field c-ext exd" id="c-ext" name="c-ext" >
                                                </div>
                                            </div>
                                            <div class="c-input_box">
                                                <label class="fieldlabels"><?php esc_html_e( 'Email:', 'isg' ); ?></label>
                                                <input type="email" class="input-field c-email exd" id="c-email" name="c-email" >
                                            </div>
                                            <div class="c-input_box">
                                                <label class="fieldlabels"><?php esc_html_e( 'Mobile Phone:', 'isg' ); ?></label>
                                                <input type="text" class="input-field c-mobile exd" id="c-mobile" name="c-mobile" >                                               
                                            </div>
                                            <input type="hidden" name="checkms" value="success">
                                        </div> <input type="button" name="next" id="next1" class="next action-button" value="Next">
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-card">
                                            <div class="row">
                                                <div class="col-7">
                                                    <h2 class="fs-title"><?php esc_html_e( 'Rule', 'isg' ); ?></h2>
                                                </div>       
                                                <div class="box-rule">
                                                    <?php $rule = get_field('detail_isg_c', 'option'); 
                                                    echo $rule;
                                                    ?>
                                                </div> 
                                                <div class="check-box_rule">
                                                    <input type="checkbox" name="check-rule" value="check" id="check-rule">
                                                    <label for="check-rule"><?php esc_html_e( 'Check here to indicate that you have read and agree to the terms of the ISG', 'isg' ); ?></label>
                                                </div>               
                                            </div> 
                                        </div> 
                        
                                            <input type="button" name="next" id="next2" class="next action-button" value="Next">
                                            <input type="button" name="previous" class="previous action-button-previous" value="Previous">
                                   
                                        
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-card">
                                            <div class="finish-card">
                                                <div class="object-1">
                                                    <h2 class="fs-title"><?php esc_html_e( 'ยืนยันการเปลี่ยนข้อมูลผู้ใช้', 'isg' ); ?></h2>
                                                </div>   
                                                <div class="object-2">
                                                    <i class="las la-check-circle"></i>
                                                </div>  
                                                <div class="object-3">
                                                <button type="submit" id="submit-change" class="btn-submit"><?php esc_html_e( 'Confirm', 'isg' ); ?></button>
                                                    <div class="status-box">
                                                        <p class="status"></p>
                                                    </div>
                                                </div>                            
                                            </div> 
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>