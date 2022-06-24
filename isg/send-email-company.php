<?php 
/**
 * template name: Send Email Company
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

				$subject = 'แจ้งเตือนการเปลี่ยนข้อมูลองค์กร';
				$to = $email;

				$message = '<html><body>';
				$message .= '</body></html>';

				$message = '<html><body>';
				$message .= '<h2 style="color: black; font-weight: 400;">แจ้งเตือนการเปลี่ยนข้อมูลองค์กร</h2>';
				$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
				$message .= "<tr style='background: #eee;'><th><strong>หัวข้อ:</strong></th><th><strong>ข้อมูลก่อนหน้า:</strong></th><th><strong>ข้อมูลที่ถูกแก้ไข:</strong></th></tr>";

                if($_COOKIE['c_code'] != $_COOKIE['code_cn'] ){
                    $message .= "<tr><td>Code:</td><td>" . $_COOKIE['c_code'] . " </td><td>" . $_COOKIE['code_cn'] . "</td></tr>";
                }
                if($_COOKIE['c_company_name_english'] != $_COOKIE['company_name_english_cn'] ){
                    $message .= "<tr><td>Company Name(English):</td><td>" . $_COOKIE['c_company_name_english'] . "</td><td>" . $_COOKIE['company_name_english_cn']. ' ' . $_COOKIE['last_name'] ."</td></tr>";
                }
                if($_COOKIE['c_company_name_thai'] != $_COOKIE['company_name_thai_cn'] ){
                    $message .= "<tr><td>Company Name(Thai):</td><td>" . $_COOKIE['c_company_name_thai'] . "</td><td>" . $_COOKIE['company_name_thai_cn'] . "</td></tr>";
                }
                if($_COOKIE['c_nomoosoinikomroad'] != $_COOKIE['nomoosoinikomroad_cn'] ){
                    $message .= "<tr><td>No./Moo/Soi/Nikom/Road:</td><td>" . $_COOKIE['c_nomoosoinikomroad'] . "</td><td>" . $_COOKIE['nomoosoinikomroad_cn'] . "</td></tr>";
                }
                if($_COOKIE['c_tambol__kwaeng'] != $_COOKIE['tambol__kwaeng_cn'] ){
                    $message .= "<tr><td>Tambol / Kwaeng.:</td><td>" . $_COOKIE['c_tambol__kwaeng'] . "</td><td>" . $_COOKIE['tambol__kwaeng_cn'] . "</td></tr>";
                }
                if($_COOKIE['c_amphur__khet'] != $_COOKIE['amphur__khet_cn'] ){
                    $message .= "<tr><td>Amphur / Khet:</td><td>" . $_COOKIE['c_amphur__khet'] . "</td><td>" . $_COOKIE['amphur__khet_cn'] . "</td></tr>";
                }
                if($_COOKIE['c_province'] != $_COOKIE['province_cn'] ){
                    $message .= "<tr><td>Province:</td><td>" . $_COOKIE['c_province'] . "</td><td>" . $_COOKIE['province_cn'] . "</td></tr>";
                }
                if($_COOKIE['c_postal'] != $_COOKIE['postal_cn'] ){
                    $message .= "<tr><td>Postal:</td><td>" . $_COOKIE['c_postal'] . "</td><td>" . $_COOKIE['postal_cn'] . "</td></tr>";
                }
                if($_COOKIE['c_branch'] != $_COOKIE['branch_cn'] ){
                    $message .= "<tr><td>Branch:</td><td>" . $_COOKIE['c_branch'] . "</td><td>" . $_COOKIE['branch_cn'] . "</td></tr>";
                }
                if($_COOKIE['c_tax_id'] != $_COOKIE['tax_id_cn'] ){
                    $message .= "<tr><td>Tax ID:</td><td>" . $_COOKIE['c_tax_id'] . "</td><td>" . $_COOKIE['tax_id_cn'] . "</td></tr>";
                }
                if($_COOKIE['c_products'] != $_COOKIE['products_cn'] ){
                    $message .= "<tr><td>Products:</td><td>" . $_COOKIE['c_products'] . "</td><td>" . $_COOKIE['products_cn'] . "</td></tr>";
                }
                if($_COOKIE['c_top_management_name'] != $_COOKIE['top_management_name_cn'] ){
                    $message .= "<tr><td>Top Management Name:</td><td>" . $_COOKIE['c_top_management_name'] . "</td><td>" . $_COOKIE['top_management_name_cn'] . "</td></tr>";
                }
                if($_COOKIE['c_position_top'] != $_COOKIE['position_top_cn'] ){
                    $message .= "<tr><td>Position Top:</td><td>" . $_COOKIE['c_position_top'] . "</td><td>" . $_COOKIE['position_top_cn'] . "</td></tr>";
                }
				$message .= "</table>";
				$message .= "</body></html>";

				wp_mail( $to, $subject, $message, $headers );
?>

<div class="tempate-box com-send" style="background: url(<?php echo get_stylesheet_directory_uri(); ?>/img/bg-dots-white.jpg);">
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
  
        $.removeCookie('c_code');
        $.removeCookie('c_company_name_english');
        $.removeCookie('c_company_name_thai');
        $.removeCookie('c_nomoosoinikomroad');
        $.removeCookie('c_tambol__kwaeng');
        $.removeCookie('c_amphur__khet');
        $.removeCookie('c_province');
        $.removeCookie('c_postal');
        $.removeCookie('c_branch');
        $.removeCookie('c_tax_id');
        $.removeCookie('c_products');
        $.removeCookie('c_top_management_name');
        $.removeCookie('c_position_top');

        $.removeCookie('code_cn');
        $.removeCookie('company_name_english_cn');
        $.removeCookie('company_name_thai_cn');
        $.removeCookie('nomoosoinikomroad_cn');
        $.removeCookie('tambol__kwaeng_cn');
        $.removeCookie('amphur__khet_cn');
        $.removeCookie('province_cn');
        $.removeCookie('postal_cn');
        $.removeCookie('branch_cn');
        $.removeCookie('tax_id_cn');
        $.removeCookie('products_cn');
        $.removeCookie('top_management_name_cn');
        $.removeCookie('position_top_cn');
        
        document.location.href = '/company-user/';
                                            
    });
                                            
</script>


<?php 
get_footer(); ?>