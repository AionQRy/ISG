<?php
/**
 * template name: Page Print
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

$id_p = $_GET['check_cal'];
$start_date = get_field('date_event_s', 'option');
$end_date = get_field('date_event_e', 'option');
?>

<div class="tempate-box template-change template-join template-cal template-print" style="background: url(<?php echo get_stylesheet_directory_uri(); ?>/img/bg-dots-white.jpg);">
    <div class="s-container">
        <div class="main-salary">
            <div class="content-form">
                <div class="box-form">
                    <div class="box-range">
                        <?php if(isset($_POST['check_cal']) && $_POST['check_cal'] == 'success') :?>
                        <h3><?php echo esc_html__( 'ใบสมัครการแข่งขันอีซูซุแรลลี่ คณะบุคคลผู้ผลิตชิ้นส่วนอีซูซุ', 'isg' ); ?></h3>
                        <h3><?php echo $start_date; ?> - <?php echo $end_date; ?></h3>
                        <div class="box-join">
                            <form action="" method="post" id="form-print" class="form-print" name="form-print">
                                <div class="object-1">
                                    <div class="input-grid">
                                        <label for="name_company"><?php echo esc_html__( 'จากบริษัท', 'isg' ); ?></label>
                                        <input type="text" id="name_company" name="name_company" required>
                                    </div>
                                    <div class="input-grid">
                                        <label for="date_join"><?php echo esc_html__( 'วันที่สมัคร', 'isg' ); ?></label>
                                        <input class="input-medium" type="text" id="date_join" data-provide="datepicker" data-date-language="th" name="date_join" required>
                                    </div>
                                </div>
                                <div class="object-2">
                                    <div class="head-h">
                                       <h3><?php echo esc_html__( 'ผู้ขับขี่ / Driver', 'isg' ); ?> </h3>
                                    </div>
                                    <div class="input-grid">
                                        <label for="name_leader"><?php echo esc_html__( 'ชื่อ-นามสกุล', 'isg' ); ?></label>
                                        <input type="text" id="name_leader" name="name_leader" required>
                                    </div>
                                    <div class="input-grid">
                                        <label for="phone_leader"><?php echo esc_html__( 'เบอร์มือถือ', 'isg' ); ?></label>
                                        <input type="text" id="phone_leader" class="phone_format" name="phone_leader" required>
                                    </div>
                                    <div class="input-grid">
                                        <label for="born_leader"><?php echo esc_html__( 'วัน/เดือน/ปี ค.ศ. เกิด', 'isg' ); ?></label>
                                        <input class="input-medium" type="text" id="born_leader" data-provide="datepicker" data-date-language="th" name="born_leader" required>
                                    </div>
                                    <div class="input-grid">
                                        <label for="size_leader"><?php echo esc_html__( 'ขนาดเสื้อ( Free Size )', 'isg' ); ?></label>
                                        <input type="text" id="size_leader" name="size_leader" value="F" readonly >
                                    </div>
                                    <div class="input-grid">
                                        <label for="license_no"><?php echo esc_html__( 'ใบอนุญาติขับขี่ฉบับที่', 'isg' ); ?></label>
                                        <input type="text" id="license_no" name="license_no" required>
                                    </div>
                                    <div class="input-grid">
                                        <label for="day_g_leader"><?php echo esc_html__( 'วันอนุญาติ', 'isg' ); ?></label>
                                        <input class="input-medium" type="text" id="day_g_leader" data-provide="datepicker" data-date-language="th" name="day_g_leader" required>
                                    </div>
                                </div>
                                <div class="object-3">
                                    <div class="head-h">
                                       <h3><?php echo esc_html__( 'ผู้นำทาง / Navigator', 'isg' ); ?> </h3>
                                    </div>
                                    <div class="x-grid">
                                        <div class="input-grid">
                                            <label for="name_g"><?php echo esc_html__( 'ชื่อ-นามสกุล', 'isg' ); ?></label>
                                            <input type="text" id="name_g" name="name_g" required>
                                        </div>
                                        <div class="input-grid">
                                            <label for="phone_g"><?php echo esc_html__( 'เบอร์มือถือ', 'isg' ); ?></label>
                                            <input type="text" class="phone_format" id="phone_g" name="phone_g" required>
                                        </div>
                                        <div class="input-grid">
                                            <label for="born_g"><?php echo esc_html__( 'วัน/เดือน/ปี ค.ศ. เกิด', 'isg' ); ?></label>
                                            <input class="input-medium" type="text" id="born_g" data-provide="datepicker" data-date-language="th" name="born_g" required>
                                        </div>
                                        <div class="input-grid">
                                            <label for="size_g"><?php echo esc_html__( 'ขนาดเสื้อ( Free Size )', 'isg' ); ?></label>
                                            <input type="text" id="size_g" name="size_g" value="F" readonly >
                                        </div>
                                    </div>
                                </div>
                                <div class="object-3">
                                    <div class="head-h">
                                       <h3><?php echo esc_html__( 'ผู้ร่วมรถ ( ผู้แข่งขัน ท่านที่ 3 เป็นต้นไป )', 'isg' ); ?></h3>
                                    </div>
                                    <?php
                                    $people = $_POST['people_count'];
                                    $sum = 0;
                                    for($i = 2; $i<= $people; $i++) {
                                        if($i <= 2){
                                            continue;
                                        }
                                        ?>
                                        <div class="x-grid">
                                            <div class="input-grid">
                                                <label for="name_u_<?php echo $i; ?>"><?php echo esc_html__( 'ชื่อ-นามสกุล', 'isg' ); ?></label>
                                                <input type="text" id="name_u_<?php echo $i; ?>" name="name_u[]" required>
                                            </div>
                                            <div class="input-grid">
                                                <label for="phone_u_<?php echo $i; ?>"><?php echo esc_html__( 'เบอร์มือถือ', 'isg' ); ?></label>
                                                <input type="text" class="phone_format" id="phone_u_<?php echo $i; ?>" name="phone_u[]" required>
                                            </div>
                                            <div class="input-grid">
                                                <label for="born_u_<?php echo $i; ?>"><?php echo esc_html__( 'วัน/เดือน/ปี ค.ศ. เกิด', 'isg' ); ?></label>
                                                <input class="input-medium" type="text" id="born_u_<?php echo $i; ?>" data-provide="datepicker" data-date-language="th" name="born_u[]" required>
                                            </div>
                                            <div class="input-grid">
                                                <label for="size_u_<?php echo $i; ?>"><?php echo esc_html__( 'ขนาดเสื้อ( Free Size )', 'isg' ); ?></label>
                                                <input type="text" id="size_u_<?php echo $i; ?>" name="size_u[]" value="F" readonly >
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="object-3">
                                    <div class="head-h">
                                       <h3><?php echo esc_html__( 'เด็กอายุ 4-11 ปี', 'isg' ); ?></h3>
                                    </div>
                                    <?php
                                    $kids = $_POST['kid_count'];

                                    for($b = 1; $b <= $kids; $b++) {
                                        // if($b = 0){
                                        //     continue;
                                        // }
                                        ?>
                                         <div class="x-grid">
                                            <div class="input-grid">
                                                <label for="name_k_<?php echo $b; ?>"><?php echo esc_html__( 'ชื่อ-นามสกุล', 'isg' ); ?></label>
                                                <input type="text" id="name_k_<?php echo $b; ?>" name="name_k[]" required>
                                            </div>
                                            <div class="input-grid">
                                                <label for="phone_k_<?php echo $b; ?>"><?php echo esc_html__( 'เบอร์มือถือ', 'isg' ); ?></label>
                                                <input type="text"  class="phone_format"  id="phone_k_<?php echo $b; ?>" name="phone_k[]" required>
                                            </div>
                                            <div class="input-grid">
                                                <label for="born_k_<?php echo $b; ?>"><?php echo esc_html__( 'วัน/เดือน/ปี ค.ศ. เกิด', 'isg' ); ?></label>
                                                <input class="input-medium" type="text" id="born_k_<?php echo $b; ?>" data-provide="datepicker" data-date-language="th" name="born_k[]" required>
                                            </div>
                                            <div class="input-grid">
                                                <label for="size_k_<?php echo $b; ?>"><?php echo esc_html__( 'ขนาดเสื้อ( Free Size )', 'isg' ); ?></label>
                                                <input type="text" id="size_k_<?php echo $b; ?>" name="size_k[]" value="F" readonly >
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>

                                <div class="object-4">
                                    <div class="head-h">
                                       <h3><?php echo esc_html__( 'รายละเอียดรถ', 'isg' ); ?></h3>
                                    </div>
                                        <div class="a-grid">
                                            <div class="input-grid">
                                                <label for="name_c"><?php echo esc_html__( 'ยี่ห้อรถ', 'isg' ); ?></label>
                                                <input type="text" id="name_c" name="name_c"  value="ISUZU (Only)" readonly required>
                                            </div>
                                            <div class="input-grid">
                                                <label for="year_c"><?php echo esc_html__( 'รุ่นรถ', 'isg' ); ?></label>
                                                <input type="text" id="year_c" name="year_c" required>
                                            </div>
                                            <div class="input-grid">
                                                <label for="no_c"><?php echo esc_html__( 'รุ่นปี', 'isg' ); ?></label>
                                                <input type="text" id="no_c" name="no_c" required>
                                            </div>
                                            <div class="input-grid">
                                                <label for="number_c"><?php echo esc_html__( 'เลขทะเบียน+จังหวัด', 'isg' ); ?></label>
                                                <input type="text" id="number_c" name="number_c">
                                            </div>
                                            <div class="input-grid">
                                                <label for="color_c"><?php echo esc_html__( 'สีรถ', 'isg' ); ?></label>
                                                <input type="text" id="color_c" name="color_c">
                                            </div>
                                        </div>
                                </div>

                                <div class="box-form_text">
                                    <div class="bar-alert">
                                        <p></p>
                                    </div>
                                </div>
                                <div class="box-btn-f">
                                    <div class="hidden-box">
                                        <input type="hidden" id="date_event_s" name="date_event_s" value="<?php echo $start_date;?>">
                                        <input type="hidden" id="date_event_e" name="date_event_e" value="<?php echo $end_date;?>">
                                        <input type="hidden" id="check_print" name="check_print" value="success">
                                    </div>
                                    <button type="submit" id="btn-form_print" class="btn-form_print"><?php echo esc_html__( 'Confirm', 'isg' ); ?><i class="las la-arrow-right"></i></button>
                                </div>
                            </form>
                        </div>

                        <script>
                            jQuery(document).ready(function($) {
                                $.cookie('type_count', '<?php echo $_POST['type_count']; ?>', { expires: 1, path: '/' });
                                $.cookie('car_count', '<?php echo $_POST['car_count']; ?>', { expires: 1, path: '/' });
                                $.cookie('people_count', '<?php echo $_POST['people_count']; ?>', { expires: 1, path: '/' });
                                $.cookie('kid_count', '<?php echo $_POST['kid_count']; ?>', { expires: 1, path: '/' });

                                $.cookie('type_count_p', '<?php echo $_POST['type_count_p']; ?>', { expires: 1, path: '/' });
                                $.cookie('car_count_p', '<?php echo $_POST['car_count_p']; ?>', { expires: 1, path: '/' });
                                $.cookie('people_count_p', '<?php echo $_POST['people_count_p']; ?>', { expires: 1, path: '/' });
                                $.cookie('kid_count_p', '<?php echo $_POST['kid_count_p']; ?>', { expires: 1, path: '/' });

                                $.cookie('total_p', '<?php echo $_POST['total_p']; ?>', { expires: 1, path: '/' });
                                $.cookie('vat_p', '<?php echo $_POST['vat_p']; ?>', { expires: 1, path: '/' });
                                $.cookie('receipt_p', '<?php echo $_POST['receipt_p']; ?>', { expires: 1, path: '/' });
                                $.cookie('wht_p', '<?php echo $_POST['wht_p']; ?>', { expires: 1, path: '/' });
                                $.cookie('paid_p', '<?php echo $_POST['paid_p']; ?>', { expires: 1, path: '/' });
                                $.cookie('wht_name', '<?php echo $_POST['wht_name']; ?>', { expires: 1, path: '/' });
                                $.cookie('wht_percent', '<?php echo $_POST['wht_percent']; ?>', { expires: 1, path: '/' });
                                $.cookie('check_cal', '<?php echo $_POST['check_cal']; ?>', { expires: 1, path: '/' });


                            });
                        </script>
                        <?php endif; ?>
                        <?php
                        //  $name_u = array_keys($_POST['name_u']);
                        // //  echo count($_POST['name_u']);
                        //  echo '<hr>';

                        //  $count = count($_POST['name_u']);
                        // $array_one = array();
                        //  for ($i=0; $i < $count ; $i++) {

                        //      $array_one[] =  array(
                        //         'name' =>  $i,
                        //         'phone' =>  $i
                        //         );
                        //  }
                        // // echo '<pre>'; print_r($array_one); echo '</pre>';


                        //  $name_u_val = array();
                        // //  print_r($_POST['name_u']);
                        //  //transfer form data to an associative array
                        //  echo '<br>';
                        //  foreach($name_u as $value1) {
                        //      $name_u_val[$value1] = $_POST['name_u'][$value1];
                        //      echo $name_u_val[$value1];
                        //      echo '<br>';
                        //      echo '****';
                        //      echo '<br>';
                        //     //  print_r($var);
                        //  }
                        //  echo '<hr>';
                        // //  $a = [1, 2, 3, 4, 5];
                        //  $b = array_map($name_u_val[$value1]);
                        //  print_r($b);
                        //  echo '<hr>';


                        //  $phone_u = array_keys($_POST['phone_u']);
                        //  $phone_u_val = array();
                        //  //transfer form data to an associative array
                        //  echo '<br>';
                        //  foreach($phone_u as $value2) {
                        //      $phone_u_val[$value2] = $_POST['phone_u'][$value2];
                        //      echo $phone_u_val[$value2];
                        //      echo '<br>';
                        //      echo '++++';
                        //      echo '<br>';
                        //     //  print_r($var);
                        //  }

                        //  $born_u = array_keys($_POST['born_u']);
                        //  $born_u_val = array();
                        //  //transfer form data to an associative array
                        //  echo '<br>';
                        //  foreach($born_u as $value3) {
                        //      $born_u_val[$value3] = $_POST['born_u'][$value3];
                        //      echo $born_u_val[$value3];
                        //      echo '<br>';
                        //      echo '----';
                        //      echo '<br>';
                        //     //  print_r($var);
                        //  }
                         ?>
                         <script type="text/javascript" src="<?php echo get_site_url(); ?>/wp-content/themes/isg/js/jquery-input-mask-phone-number.min.js"></script>
                         <script type="text/javascript">
                         jQuery(document).ready(function($) {
                           $('.phone_format').usPhoneFormat({
                                  format:'(xxx) xxx-xxxx'
                                });
                         });
                         </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
