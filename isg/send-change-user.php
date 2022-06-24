<?php 
/**
 * template name: Send Change User
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

$isg_controller = get_field('isg_controller' , 'user_' . $current_user->ID);
$position = get_field('position' , 'user_' . $current_user->ID);
$telephone_no = get_field('telephone_no' , 'user_' . $current_user->ID);
$ext = get_field('ext' , 'user_' . $current_user->ID);
$mobile_phone = get_field('mobile_phone' , 'user_' . $current_user->ID);
$name = get_the_author_meta( 'first_name', $current_user->ID ) . ' ' .get_the_author_meta( 'last_name', $current_user->ID ); 
$email = get_the_author_meta( 'email', $current_user->ID );

$headers = array('Content-Type: text/html; charset=UTF-8','From: ISG <'.get_option( 'admin_email' ).'>');

$subject = 'แจ้งเตือนการเปลี่ยนข้อมูลของผู้ใช้';
$to = $email;

$message = '<html><body>';
$message .= '</body></html>';

$message = '<html><body>';
$message .= '<h2>แจ้งเตือนการ เปลี่ยน ISG Controller</h2>';
$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
$message .= "<tr style='background: #eee;'><th><strong>หัวข้อ:</strong></th><th><strong>ข้อมูลก่อนหน้า:</strong></th><th><strong>ข้อมูลที่ถูกแก้ไข:</strong></th></tr>";

$message .= "<tr><td>ISG Controller:</td><td>" . $isg_controller . "</td><td>" . $_COOKIE['isg_controller_cc'] ."</td></tr>";
$message .= "<tr><td>Name:</td><td>" . $name  . " </td><td>" .  $_COOKIE['firstname_cc'] . ' ' . $_COOKIE['lastname_cc'] ."</td></tr>";
$message .= "<tr><td>Email:</td><td>" . $email . "</td><td>" . $_COOKIE['email_cc'] . "</td></tr>";
$message .= "<tr><td>Position:</td><td>" . $position . "</td><td>" . $_COOKIE['position_cc'] . "</td></tr>";
$message .= "<tr><td>Telephone No.:</td><td>" . $telephone_no. "</td><td>" . $_COOKIE['telephone_no_cc'] . "</td></tr>";
$message .= "<tr><td>Ext:</td><td>" . $ext . "</td><td>" . $_COOKIE['ext_cc'] . "</td></tr>";
$message .= "<tr><td>Mobile Phone:</td><td>" . $mobile_phone . "</td><td>" . $_COOKIE['mobile_phone_cc'] . "</td></tr>";

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
  
        $.removeCookie('isg_controller_cc');
        $.removeCookie('firstname_cc');
        $.removeCookie('lastname_cc');
        $.removeCookie('email_cc');
        $.removeCookie('position_cc');
        $.removeCookie('telephone_no_cc');
        $.removeCookie('mobile_phone_cc');
        $.removeCookie('ext_cc');
        
        document.location.href = '/author/';
                                            
    });
                                            
</script>


<?php 
get_footer(); ?>