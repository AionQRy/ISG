<?php
/**
 * template name: Edit Company
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
                                <div class="box-column_post">
                                    <div class="deteil-author">                                     
                                    <div id="form-edit_company" class="form-edit_company">
                                            <form action="" method="POST" id="edit_company" class="edit_company">
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
                                                <div class="input-box">
                                                    <h4 class="title-input"><?php esc_html_e( 'Code:', 'isg' ); ?></h4>
                                                    <input type="text" class="input-field code" name="code" id="code" value="<?php echo $code; ?>">
                                                </div>
                                                <div class="input-box">
                                                    <h4 class="title-input"><?php esc_html_e( 'Company Name(English):', 'isg' ); ?></h4>
                                                    <input type="text" class="input-field company_name_english" name="company_name_english" id="company_name_english" value="<?php echo $company_name_english; ?>">
                                                </div>
                                                <div class="input-box">
                                                    <h4 class="title-input"><?php esc_html_e( 'Company Name(Thai):', 'isg' ); ?></h4>
                                                    <input type="text" class="input-field company_name_thai" name="company_name_thai" id="company_name_thai" value="<?php echo $company_name_thai; ?>">
                                                </div>
                                                <div class="input-box">
                                                    <h4 class="title-input"><?php esc_html_e( 'No./Moo/Soi/Nikom/Road:', 'isg' ); ?></h4>
                                                    <input type="text" class="input-field nomoosoinikomroad" name="nomoosoinikomroad" id="nomoosoinikomroad" value="<?php echo $nomoosoinikomroad; ?>">
                                                </div>
                                                <div class="input-box">
                                                    <h4 class="title-input"><?php esc_html_e( 'Tambol / Kwaeng:', 'isg' ); ?></h4>
                                                    <input type="text" class="input-field tambol__kwaeng" name="tambol__kwaeng" id="tambol__kwaeng" value="<?php echo $tambol__kwaeng; ?>">
                                                </div>
                                                <div class="input-box">
                                                    <h4 class="title-input"><?php esc_html_e( 'Amphur:', 'isg' ); ?></h4>
                                                    <input type="text" class="input-field ext" name="amphur__khet" id="amphur__khet" value="<?php echo $amphur__khet; ?>">
                                                </div>
                                                <div class="input-box">
                                                    <h4 class="title-input"><?php esc_html_e( 'Province:', 'isg' ); ?></h4>
                                                    <input type="text" class="input-field mobile_phone" name="province" id="province" value="<?php echo $province; ?>">
                                                </div>
                                                <div class="input-box">
                                                    <h4 class="title-input"><?php esc_html_e( 'Postal:', 'isg' ); ?></h4>
                                                    <input type="text" class="input-field postal" name="postal" id="postal" value="<?php echo $postal; ?>"> 
                                                </div>
                                                <div class="input-box">
                                                    <h4 class="title-input"><?php esc_html_e( 'Branch:', 'isg' ); ?></h4>
                                                    <input type="text" class="input-field branch" name="branch" id="branch" value="<?php echo $branch; ?>"> 
                                                </div>
                                                <div class="input-box">
                                                    <h4 class="title-input"><?php esc_html_e( 'Tax ID:', 'isg' ); ?></h4>
                                                    <input type="text" class="input-field company_code" name="tax_id" id="tax_id" value="<?php echo $tax_id; ?>">
                                                </div>
                                                <div class="input-box">
                                                    <h4 class="title-input"><?php esc_html_e( 'Products:', 'isg' ); ?></h4>
                                                    <input type="text" class="input-field company_code" name="products" id="products" value="<?php echo $products; ?>">
                                                </div>
                                                <div class="input-box">
                                                    <h4 class="title-input"><?php esc_html_e( 'Top Management Name:', 'isg' ); ?></h4>
                                                    <input type="text" class="input-field company_code" name="top_management_name" id="top_management_name" value="<?php echo $top_management_name; ?>">
                                                </div>
                                                <div class="input-box">
                                                    <h4 class="title-input"><?php esc_html_e( 'Position Top:', 'isg' ); ?></h4>
                                                    <input type="text" class="input-field company_code" name="position_top" id="position_top" value="<?php echo $position_top; ?>">
                                                </div>
                                                <div class="status-box">
                                                    <p class="status"></p>
                                                </div>
                                                <div class="btn-submit_box">
                                                    <input type="hidden" name="check_company" value="success">
                                                    <input type="hidden" name="company" value="<?php echo get_the_ID(); ?>">
                                                    <button type="submit" class="btn-submit"><?php esc_html_e( 'Update', 'isg' ); ?></button>
                                                </div>
                                                <?php                                             
                                        endwhile;
                                        
                                        // Reset Query
                                        wp_reset_query();
                                        ?>
                                            </form>
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
<script>
                                            jQuery(document).ready(function($) {  
  
                                            $.cookie('c_code', '<?php echo $code; ?>', { expires: 1, path: '/' });
                                            $.cookie('c_company_name_english', '<?php echo $company_name_english; ?>', { expires: 1, path: '/' });  
                                            $.cookie('c_company_name_thai', '<?php echo $company_name_thai; ?>', { expires: 1, path: '/' });                                               
                                            $.cookie('c_nomoosoinikomroad', '<?php echo $nomoosoinikomroad; ?>', { expires: 1, path: '/' });
                                            $.cookie('c_tambol__kwaeng', '<?php echo $tambol__kwaeng; ?>', { expires: 1, path: '/' });
                                            $.cookie('c_amphur__khet', '<?php echo $amphur__khet; ?>', { expires: 1, path: '/' });
                                            $.cookie('c_province', '<?php echo $province; ?>', { expires: 1, path: '/' });
                                            $.cookie('c_postal', '<?php echo $postal; ?>', { expires: 1, path: '/' });
                                            $.cookie('c_branch', '<?php echo $branch; ?>', { expires: 1, path: '/' });
                                            $.cookie('c_tax_id', '<?php echo $tax_id; ?>', { expires: 1, path: '/' });
                                            $.cookie('c_products', '<?php echo $products; ?>', { expires: 1, path: '/' });
                                            $.cookie('c_top_management_name', '<?php echo $top_management_name; ?>', { expires: 1, path: '/' });
                                            $.cookie('c_position_top', '<?php echo $position_top; ?>', { expires: 1, path: '/' });                                         
                                            });
                                            
                                        </script>
<?php get_footer(); ?>
