<?php 
/**
 * template name: Send Email User
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

$current_user = wp_get_current_user(); 
$email = get_the_author_meta( 'email', $current_user->ID );

$headers = array('Content-Type: text/html; charset=UTF-8','From: ISG <'.get_option( 'admin_email' ).'>');

$subject = 'แจ้งเตือนการเปลี่ยนข้อมูลของผู้ใช้';
$to = $email;

$message = '<html><body>';
$message .= '</body></html>';

$message = '<html><body>';
$message .= '<h2>แจ้งเตือนการ แก้ไขข้อมูลผู้ใช้</h2>';
$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
$message .= "<tr style='background: #eee;'><th><strong>หัวข้อ:</strong></th><th><strong>ข้อมูลก่อนหน้า:</strong></th><th><strong>ข้อมูลที่ถูกแก้ไข:</strong></th></tr>";

if($_COOKIE['isg_controller'] != $_COOKIE['isg_controller_u'] ){
    $message .= "<tr><td>ISG Controller:</td><td>" . $_COOKIE['isg_controller'] . "</td><td>" . $_COOKIE['isg_controller_u'] ."</td></tr>";
}
if($_COOKIE['name'] != $_COOKIE['firstname_u'] ){
    $message .= "<tr><td>Name:</td><td>" .$_COOKIE['name'] . ' ' . $_COOKIE['last_name'] . " </td><td>" .  $_COOKIE['firstname_u'] . ' ' . $_COOKIE['lastname_u'] ."</td></tr>";
}
if($_COOKIE['email'] != $_COOKIE['email_u'] ){
    $message .= "<tr><td>Email:</td><td>" . $_COOKIE['email'] . "</td><td>" . $_COOKIE['email_u'] . "</td></tr>";
}
if($_COOKIE['position'] != $_COOKIE['position_u'] ){
    $message .= "<tr><td>Position:</td><td>" . $_COOKIE['position'] . "</td><td>" . $_COOKIE['position_u'] . "</td></tr>";
}
if($_COOKIE['telephone_no'] != $_COOKIE['telephone_no_u'] ){
    $message .= "<tr><td>Telephone No.:</td><td>" . $_COOKIE['telephone_no']. "</td><td>" . $_COOKIE['telephone_no_u'] . "</td></tr>";
}
if($_COOKIE['ext'] != $_COOKIE['ext_u'] ){
    $message .= "<tr><td>Ext:</td><td>" . $_COOKIE['ext'] . "</td><td>" . $_COOKIE['ext_u'] . "</td></tr>";
}
if($_COOKIE['mobile_phone'] != $_COOKIE['mobile_phone_u'] ){
    $message .= "<tr><td>Mobile Phone:</td><td>" . $_COOKIE['mobile_phone'] . "</td><td>" . $_COOKIE['mobile_phone_u'] . "</td></tr>";
}
if($_COOKIE['position_controllerx'] != $_COOKIE['position_controllerx_u'] ){
    $message .= "<tr><td>Position Controller:</td><td>" . $_COOKIE['position_controllerx'] . "</td><td>" . $_COOKIE['position_controllerx_u'] . "</td></tr>";
}
if($_COOKIE['extension'] != $_COOKIE['extension_u'] ){
    $message .= "<tr><td>Extension:</td><td>" . $_COOKIE['extension'] . "</td><td>" . $_COOKIE['extension_u'] . "</td></tr>";
}
if($_COOKIE['company_code'] != $_COOKIE['company_code_u'] ){
    $message .= "<tr><td>Company Code:</td><td>" . $_COOKIE['company_code'] . "</td><td>" . $_COOKIE['company_code_u'] . "</td></tr>";
}
$message .= "</table>";
$message .= "</body></html>";

wp_mail( $to, $subject, $message, $headers );
?>

<div class="tempate-box" style="background: url(<?php echo get_stylesheet_directory_uri(); ?>/img/bg-dots-white.jpg);">
    <div class="s-container">
        <div class="main-salary">
            <div class="content-form">
                <div class="box-form">
                    <div class="box-range">
                        <div class="container forget-form">
                            <h3><?php esc_html_e( 'ข้อมูลของคุณถูกแก้ไขเรียบร้อยแล้ว', 'isg' ); ?></h3>
                            <div class="object-icon_1">
                                <i class="las la-check-circle"></i>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function($) {  
  
        $.removeCookie('isg_controller');
        $.removeCookie('name');
        $.removeCookie('email');
        $.removeCookie('position');
        $.removeCookie('telephone_no');
        $.removeCookie('ext');
        $.removeCookie('mobile_phone');
        $.removeCookie('position_controllerx');
        $.removeCookie('extension');
        $.removeCookie('company_code');

        $.removeCookie('isg_controller_u');
        $.removeCookie('firstname_u');
        $.removeCookie('lastname_u');
        $.removeCookie('email_u');
        $.removeCookie('position_u');
        $.removeCookie('telephone_no_u');
        $.removeCookie('ext_u');
        $.removeCookie('mobile_phone_u');
        $.removeCookie('position_controllerx_u');
        $.removeCookie('extension_u');
        $.removeCookie('company_code_u');
        
        document.location.href = '/author/';
                                            
    });
                                            
</script>


<?php 
get_footer(); ?>