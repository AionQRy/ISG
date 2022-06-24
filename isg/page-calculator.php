<?php
/**
 * template name: Calculator
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
$sponsor_1 = get_field('sponsor_1', 'option');
$sponsor_2 = get_field('sponsor_2', 'option');
$sponsor_3 = get_field('sponsor_3', 'option');
$sponsor_4 = get_field('sponsor_4', 'option');
$sponsor_5 = get_field('sponsor_5', 'option');
$price_guest_regular = get_field('price_guest_regular', 'option');
$price_guest_regular_2 = get_field('price_guest_regular_2', 'option');
$price_third_regular = get_field('price_third_regular', 'option');
$kid_price_regular = get_field('kid_price_regular', 'option');
$vat = get_field('vat', 'option');
$ewht = get_field('ewht', 'option');
$wht = get_field('wht', 'option');
?>

<div class="tempate-box template-change template-join template-cal" style="background: url(<?php echo get_stylesheet_directory_uri(); ?>/img/bg-dots-white.jpg);">
    <div class="s-container">
        <div class="main-salary">
            <div class="content-form">
                <div class="box-form">
                    <div class="box-range">
                        <h3><i class="las la-user"></i> <?php echo esc_html__( 'การคำนวณค่าใช้จ่ายสำหรับการแข่งขันอีซูซุแรลลี่', 'isg' ); ?></h3>
                        <div class="box-join">
                            <form action="/sign-event/" method="post" id="form-cal" class="form-cal" name="form-cal">
                                <div class="search-calculator">                             
                                    <div class="object-1">
                                        <div class="main-cal">
                                            <div class="main-calculator gap-box">
                                                <h4 class="gap-text"><?php echo esc_html__( 'ประเภทการเข้าร่วม', 'isg' ); ?></h4>
                                                <p class="red-text"><?php echo esc_html__( 'Sponsor ทุกชนิด ได้ ผู้แข่งขัน 2 ท่าน/รถ 1 คัน และสติ๊กเกอร์ติดรถทุกคัน', 'isg' ); ?></p>                                   
                                                <select id="cal-state" name="cal-state">
                                                    <option value="" class="selected"><?php echo esc_html__( 'กรุณาเลือกจากลิสต์', 'isg' ); ?></option>
                                                    <option value="sponsor-1"><?php echo esc_html__( 'Sponsor หลัก', 'isg' ); ?></option>
                                                    <option value="sponsor-2"><?php echo esc_html__( 'Sponsor การแข่งขัน', 'isg' ); ?></option>
                                                    <option value="sponsor-3"><?php echo esc_html__( 'Sponsor ร่วม', 'isg' ); ?></option>
                                                    <option value="sponsor-4"><?php echo esc_html__( 'Sponsor พิเศษ', 'isg' ); ?></option>
                                                    <option value="normal-sport"><?php echo esc_html__( 'รถแข่งขันปกติ', 'isg' ); ?></option>
                                                </select>
                                            </div>

                                            <div id="sub-select-1" class="sub-select-1 gap-box">
                                                <h4><?php echo esc_html__( 'จำนวนรถที่ใช้แข่งขัน', 'isg' ); ?></h4>
                                                <p class="red-text"><?php echo esc_html__( '(รวมคันสปอนเซอร์)', 'isg' ); ?></p> 
                                                <select id="select-1" class="select-1" name="select-1">
                                                    <option value="0"><?php echo esc_html__( 'กรุณาเลือกจากลิสต์', 'isg' ); ?></option>
                                                    <option value="1"><?php echo esc_html__( '1 คัน', 'isg' ); ?></option>
                                                    <option value="2"><?php echo esc_html__( '2 คัน', 'isg' ); ?></option>
                                                </select>
                                                <p class="red-text m-0"><?php echo esc_html__( '"รถแข่งขันปกติ จำกัด 1 คัน/บริษัท Sponsor จำกัด 2 คัน/บริษัท"', 'isg' ); ?></p> 
                                            </div>

                                            <div id="sub-select-2" class="sub-select-2 gap-box">
                                                <h4><?php echo esc_html__( 'จำนวนรถที่ใช้แข่งขัน', 'isg' ); ?></h4>
                                                <p class="red-text"><?php echo esc_html__( '(รวมคันสปอนเซอร์)', 'isg' ); ?></p>
                                                <select id="select-2" class="select-2" name="select-2">
                                                    <option value="0"><?php echo esc_html__( 'กรุณาเลือกจากลิสต์', 'isg' ); ?></option>
                                                    <option value="1"><?php echo esc_html__( '1 คัน', 'isg' ); ?></option>
                                                </select>
                                                <p class="red-text m-0"><?php echo esc_html__( '"รถแข่งขันปกติ จำกัด 1 คัน/บริษัท Sponsor จำกัด 2 คัน/บริษัท"', 'isg' ); ?></p>  
                                            </div>

                                            <div id="sub-select-3" class="sub-select-2 gap-box">
                                                <h4><?php echo esc_html__( 'จำนวนรถที่ใช้แข่งขัน', 'isg' ); ?></h4>
                                                <p class="red-text"><?php echo esc_html__( '(รวมคันสปอนเซอร์)', 'isg' ); ?></p>
                                                <select id="select-3" class="select-3" name="select-3">
                                                    <option value="0"><?php echo esc_html__( 'กรุณาเลือกจากลิสต์', 'isg' ); ?></option>
                                                    <option value="1"><?php echo esc_html__( '1 คัน', 'isg' ); ?></option>
                                                </select>
                                                <p class="red-text m-0"><?php echo esc_html__( '"รถแข่งขันปกติ จำกัด 1 คัน/บริษัท Sponsor จำกัด 2 คัน/บริษัท"', 'isg' ); ?></p>  
                                            </div>

                                            <div id="one-car" class="gap-box">
                                                <h4><?php echo esc_html__( 'จำนวนผู้แข่งขันทั้งหมด', 'isg' ); ?></h4>
                                                <p class="red-text"><?php echo esc_html__( '(ท่านที่ 3 เป็นต้นไป 3,500 บาท/ท่าน)', 'isg' ); ?></p>
                                                <select  id="car-select-one" class="car-select-one" name="one-car">
                                                    <option value="0"><?php echo esc_html__( 'กรุณาเลือกจากลิสต์', 'isg' ); ?></option>
                                                    <option value="2"><?php echo esc_html__( '2', 'isg' ); ?></option>
                                                    <option value="3"><?php echo esc_html__( '3', 'isg' ); ?></option>
                                                    <option value="4"><?php echo esc_html__( '4', 'isg' ); ?></option>
                                                    <option value="5"><?php echo esc_html__( '5', 'isg' ); ?></option>
                                                    <option value="6"><?php echo esc_html__( '6', 'isg' ); ?></option>
                                                </select>
                                                <p class="red-text m-0"><?php echo esc_html__( '"พักห้องละ 2 ท่าน ถ้าเหลือเศษ 1 ท่าน ทางเราจะจัดเตียงเสริมให้"' ); ?></p>
                                            </div>
                                            <div id="two-car" class="gap-box">
                                                <h4><?php echo esc_html__( 'จำนวนผู้แข่งขันทั้งหมด', 'isg' ); ?></h4>
                                                <p class="red-text"><?php echo esc_html__( '(ท่านที่ 3 เป็นต้นไป 3,500 บาท/ท่าน)', 'isg' ); ?></p>                                  
                                                <select  id="car-select-two" class="car-select-two" name="two-car">
                                                    <option value="0"><?php echo esc_html__( 'กรุณาเลือกจากลิสต์', 'isg' ); ?></option>
                                                    <option value="2"><?php echo esc_html__( '2', 'isg' ); ?></option>
                                                    <option value="3"><?php echo esc_html__( '3', 'isg' ); ?></option>
                                                    <option value="4"><?php echo esc_html__( '4', 'isg' ); ?></option>
                                                    <option value="5"><?php echo esc_html__( '5', 'isg' ); ?></option>
                                                    <option value="6"><?php echo esc_html__( '6', 'isg' ); ?></option>
                                                    <option value="7"><?php echo esc_html__( '7', 'isg' ); ?></option>
                                                    <option value="8"><?php echo esc_html__( '8', 'isg' ); ?></option>
                                                    <option value="9"><?php echo esc_html__( '9', 'isg' ); ?></option>
                                                    <option value="10"><?php echo esc_html__( '10', 'isg' ); ?></option>
                                                    <option value="11"><?php echo esc_html__( '11', 'isg' ); ?></option>
                                                    <option value="12"><?php echo esc_html__( '12', 'isg' ); ?></option>
                                                </select>
                                                <p class="red-text m-0"><?php echo esc_html__( '"พักห้องละ 2 ท่าน ถ้าเหลือเศษ 1 ท่าน ทางเราจะจัดเตียงเสริมให้"' ); ?></p>
                                            </div>
                                            <div id="normal-car" class="gap-box">
                                                <h4><?php echo esc_html__( 'จำนวนผู้แข่งขันทั้งหมด', 'isg' ); ?></h4>
                                                <p class="red-text"><?php echo esc_html__( '(ท่านที่ 3 เป็นต้นไป 3,500 บาท/ท่าน)', 'isg' ); ?></p>
                                                <select  id="car-select-normal" class="car-select-one" name="normal-car">
                                                    <option value="0"><?php echo esc_html__( 'กรุณาเลือกจากลิสต์', 'isg' ); ?></option>
                                                    <option value="2"><?php echo esc_html__( '2', 'isg' ); ?></option>
                                                    <option value="3"><?php echo esc_html__( '3', 'isg' ); ?></option>
                                                    <option value="4"><?php echo esc_html__( '4', 'isg' ); ?></option>
                                                    <option value="5"><?php echo esc_html__( '5', 'isg' ); ?></option>
                                                    <option value="6"><?php echo esc_html__( '6', 'isg' ); ?></option>
                                                </select>
                                                <p class="red-text m-0"><?php echo esc_html__( '"พักห้องละ 2 ท่าน ถ้าเหลือเศษ 1 ท่าน ทางเราจะจัดเตียงเสริมให้"' ); ?></p>
                                            </div>

                                            <div id="wht-select" class="wht-select gap-box">
                                                <h4><?php echo esc_html__( 'EWHT-WHT', 'isg' ); ?></h4>
                                                <select id="wht-drop" class="wht-drop" name="wht-drop">
                                                    <option value="0"><?php echo esc_html__( 'กรุณาเลือกจากลิสต์', 'isg' ); ?></option>
                                                    <option value="<?php echo $ewht;?>">EWHT <?php echo $ewht;?>%</option>
                                                    <option value="<?php echo $wht;?>">WHT <?php echo $wht;?>%</option>
                                                </select>
                                                <p class="red-text m-0"><?php echo esc_html__( 'E-Withholding Tax และ Withholding Tax' ); ?></p>
                                            </div>

                                            <div id="child-select" class="gap-box">
                                                <h4><?php echo esc_html__( 'เด็กอายุ 4-11 ปี', 'isg' ); ?></h4>
                                                <p class="red-text"><?php echo esc_html__( '(2,000 บาท/ท่าน)', 'isg' ); ?></p>
                                                <select  id="child-select_m" class="child-select_m" name="child-select">
                                                    <option value="0"><?php echo esc_html__( 'กรุณาเลือกจากลิสต์', 'isg' ); ?></option>
                                                    <option value="0"><?php echo esc_html__( '0', 'isg' ); ?></option>
                                                    <option value="1"><?php echo esc_html__( '1', 'isg' ); ?></option>
                                                    <option value="2"><?php echo esc_html__( '2', 'isg' ); ?></option>
                                                </select>
                                                <p class="red-text m-0"><?php echo esc_html__( 'ไม่ได้ เสื้อ, เตียง และรางวัลทุกประเภท' ); ?></p>
                                            </div>
                                            <div class="btn-generate">
                                            <button type="button" id="btn-cal" class="btn-form_cal"><?php echo esc_html__( 'Calculator', 'isg' ); ?><i class="las la-calculator"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="object-2">
                                        <div class="price-table_box">
                                            <table id="table-total" class="table-total">
                                                <thead>
                                                    <tr>
                                                        <th><?php echo esc_html__( 'ประเภท' ); ?></th>
                                                        <th><?php echo esc_html__( 'จำนวน' ); ?></th>
                                                        <th><?php echo esc_html__( 'ราคา(THB)' ); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo esc_html__( 'ประเภทการเข้าร่วม' ); ?></td>
                                                        <td id="total-join" class="total-join td-list"></td>
                                                        <td id="price-join" class="total-join td-list"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo esc_html__( 'จำนวนรถที่ใช้แข่งขัน' ); ?></td>
                                                        <td id="total-car" class="total-car td-list"></td>
                                                        <td id="price-car" class="total-car td-list"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo esc_html__( 'จำนวนผู้แข่งขันทั้งหมด' ); ?></td>
                                                        <td id="total-people" class="total-people td-list"></td>
                                                        <td id="price-people" class="total-people td-list"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo esc_html__( 'เด็กอายุ 4-11 ปี' ); ?></td>
                                                        <td id="total-child" class="total-child td-list"></td>
                                                        <td id="price-child" class="total-child td-list"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo esc_html__( 'รูปแบบ EWHT-WHT' ); ?></td>
                                                        <td id="ewht-wht" class="ewht-wht td-list"></td>
                                                        <td id="p-ewht-wht" class="p-ewht-wht td-list"></td>
                                                    </tr>
                                                    <tr class="p-tr">
                                                        <td><?php echo esc_html__( 'Total' ); ?></td>
                                                        <td id="total-total" class="total-child td-list"></td>
                                                        <td id="price-total" class="price-total td-list"></td>
                                                    </tr>
                                                    <tr class="p-tr">
                                                        <td>Vat <?php echo $vat; ?>%</td>
                                                        <td id="total-vat" class="total-child td-list"></td>
                                                        <td id="price-vat" class="price-vat td-list"></td>
                                                    </tr>
                                                    <tr class="p-tr">
                                                        <td><?php echo esc_html__( 'Receipt' ); ?></td>
                                                        <td id="total-receipt" class="total-child td-list"></td>
                                                        <td id="price-receipt" class="price-receipt td-list"></td>
                                                    </tr>
                                                    <tr class="p-tr">
                                                        <td><?php echo esc_html__( 'EWHT-WHT' ); ?></td>
                                                        <td id="total-wht" class="total-child td-list"></td>
                                                        <td id="price-wht" class="price-wht td-list"></td>
                                                    </tr>
                                                    <tr class="p-tr">
                                                        <td><?php echo esc_html__( 'Paid' ); ?></td>
                                                        <td id="total-paid" class="total-child td-list"></td>
                                                        <td id="price-paid" class="price-paid td-list"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
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
                                        <input type="hidden" id="type_count" name="type_count" value="">
                                        <input type="hidden" id="car_count" name="car_count" value="">
                                        <input type="hidden" id="people_count" name="people_count" value="">
                                        <input type="hidden" id="kid_count" name="kid_count" value="">

                                        <input type="hidden" id="type_count_p" name="type_count_p" value="">
                                        <input type="hidden" id="car_count_p" name="car_count_p" value="">
                                        <input type="hidden" id="people_count_p" name="people_count_p" value="">
                                        <input type="hidden" id="kid_count_p" name="kid_count_p" value="">

                                        <input type="hidden" id="total_p" name="total_p" value="">
                                        <input type="hidden" id="vat_p" name="vat_p" value="">
                                        <input type="hidden" id="receipt_p" name="receipt_p" value="">
                                        <input type="hidden" id="wht_p" name="wht_p" value="">
                                        <input type="hidden" id="paid_p" name="paid_p" value="">

                                        <input type="hidden" id="wht_name" name="wht_name" value="">
                                        <input type="hidden" id="wht_percent" name="wht_percent" value="">
                                        
                                        <input type="hidden" id="check_cal" name="check_cal" value="success">
                                    </div>
                                    <button type="submit" id="btn-form_cal" class="btn-form_cal"><?php echo esc_html__( 'Confirm', 'isg' ); ?><i class="las la-arrow-right"></i></button>
                                </div>                      
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function($) {                                                  
    $("#cal-state").change(function(e) {
        hideAll();
        empty_price();
        empty_total();
        $(e.target.options).removeClass();
        var $selectedOption = $(e.target.options[e.target.options.selectedIndex]);
        $selectedOption.addClass('selected');
        // $('#' + $selectedOption.val()).show();
        $("#select-1,#select-2,#select-3")[0].selectedIndex = 0;
        $("#one-car,#two-car")[0].selectedIndex = 0;
        if($selectedOption.val() == 'normal-sport' ){
            // $selectedOption.addClass('xxx');
            $('#sub-select-3').show();
        }else{
            $('#sub-select-1').show();
        }
        let price_one = $selectedOption.val();
        let price_state;
        switch(price_one) {
            case 'sponsor-1':
                price_state = <?php echo $sponsor_1; ?>;
             break;
            case 'sponsor-2':
                price_state = <?php echo $sponsor_2; ?>;
             break;
            case 'sponsor-3':
                price_state = <?php echo $sponsor_3; ?>;
            break;
            case 'sponsor-4':
                price_state = <?php echo $sponsor_4; ?>;
            break;
            case 'normal-sport':
                price_state = <?php echo $sponsor_5; ?>;
            break;
            default:
                price_state = 0;
        }
        $('#total-join').text($selectedOption.text());
        $('#price-join').text(price_state.toLocaleString());
        $('#btn-form_cal').hide();

    });
  
    
    $("#select-1").change(function(e) {
        // hideAll();
        $(e.target.options).removeClass();
        var $selectedOption = $(e.target.options[e.target.options.selectedIndex]);
        $selectedOption.addClass('selected');
        if($selectedOption.val() == '2' ){
            $('#two-car').show();
            $('#one-car').hide();
            $('#one-car').val('');
            $('#normal-car').hide();
            $('#normal-car').val('');
            $('#total-people').text('');
            $('#price-people').text('');
        }else{
            $('#one-car').show();
            $('#two-car').hide();
            $('#two-car').val('');
            $('#normal-car').hide();
            $('#normal-car').val('');
            $('#total-people').text('');
            $('#price-people').text('');
        }
        let price_one = $selectedOption.val();
        let price_state;
        switch(price_one) {
            case '':
                price_state = 0;
            break;
            default:
                price_state = 0;
        }
        $('#total-car').text(price_one);
        $('#price-car').text(price_state.toLocaleString());
        $('#btn-form_cal').hide();
    });
    $("#select-2").change(function(e) {
        // hideAll();
        $(e.target.options).removeClass();
        var $selectedOption = $(e.target.options[e.target.options.selectedIndex]);
        $selectedOption.addClass('selected');
        $('#one-car').show();
        $('#normal-car').hide();
        $('#normal-car').val('');
        let price_one = $selectedOption.val();
        let price_state;
        switch(price_one) {
            case '':
                price_state = 0;
            break;
            default:
                price_state = 0;
        }
        $('#total-car').text(price_one);
        $('#price-car').text(price_state.toLocaleString());
        $('#btn-form_cal').hide();
    });
    $("#select-3").change(function(e) {
        // hideAll();
        $(e.target.options).removeClass();
        var $selectedOption = $(e.target.options[e.target.options.selectedIndex]);
        $selectedOption.addClass('selected');
        $('#normal-car').show();
        let price_one = $selectedOption.val();
        let price_state;
        switch(price_one) {
            case '':
                price_state = 0;
            break;
            default:
                price_state = 0;
        }
        $('#total-car').text(price_one);
        $('#price-car').text(price_state.toLocaleString());
        $('#btn-form_cal').hide();
    });

    $("#one-car").change(function(e) {
        // hideAll();
        $(e.target.options).removeClass();
        var $selectedOption = $(e.target.options[e.target.options.selectedIndex]);
        $selectedOption.addClass('selected');
        $('#child-select').show();
        let price_one = $selectedOption.val();
        let price_state;
        if(price_one == 2){
            price_state = <?php echo $price_guest_regular; ?>;
        }else if(price_one == 0){
            price_state = 0;
        }else{
            price_state = (price_one-2)*<?php echo $price_third_regular; ?>;
        }   

        $('#total-people').text(price_one);
        $('#price-people').text(price_state.toLocaleString());
        $('#btn-form_cal').hide();
    });

    $("#two-car").change(function(e) {
        // hideAll();
        $(e.target.options).removeClass();
        var $selectedOption = $(e.target.options[e.target.options.selectedIndex]);
        $selectedOption.addClass('selected');
        $('#child-select').show();
        let price_one = $selectedOption.val();
        let price_state;
        if(price_one == 2){
            price_state = <?php echo $price_guest_regular; ?>;
        }else if(price_one == 0){
            price_state = 0;
        }else{
            price_state = (price_one-2)*<?php echo $price_third_regular; ?>;
        }   

        $('#total-people').text(price_one);
        $('#price-people').text(price_state.toLocaleString());
        $('#btn-form_cal').hide();
    });
    $("#normal-car").change(function(e) {
        // hideAll();
        $(e.target.options).removeClass();
        var $selectedOption = $(e.target.options[e.target.options.selectedIndex]);
        $selectedOption.addClass('selected');
        $('#child-select').show();
        let price_one = $selectedOption.val();
        let price_state;
        if(price_one == 2){
            price_state = <?php echo $price_guest_regular_2; ?>;
        }else if(price_one == 0){
            price_state = 0;
        }else{
            price_state = (price_one)*<?php echo $price_third_regular; ?>;
        }   

        $('#total-people').text(price_one);
        $('#price-people').text(price_state.toLocaleString());
        $('#btn-form_cal').hide();
    });

    $("#child-select").change(function(e) {
        // hideAll();
        $(e.target.options).removeClass();
        var $selectedOption = $(e.target.options[e.target.options.selectedIndex]);
        $selectedOption.addClass('selected');
        let price_one = $selectedOption.val();
        let price_state;
        price_state = price_one*<?php echo $kid_price_regular; ?>;  

        $('#total-child').text(price_one);
        $('#price-child').text(price_state.toLocaleString());

        var child_price = price_state;
        $('#btn-form_cal').hide();
    });

    $("#wht-drop").change(function(e) {
        // hideAll();
        $(e.target.options).removeClass();
        var $selectedOption = $(e.target.options[e.target.options.selectedIndex]);
        $selectedOption.addClass('selected');
        let price_one = $selectedOption.val();
        let price_state;
        price_state = (price_one/100)*100;  

        $('#ewht-wht').text(price_state);
        $('#wht_name').val($selectedOption.text());
        let percent_ewhtwht = $selectedOption.val()+'%';
        $('#wht_percent').val(percent_ewhtwht);
        // $('#price-child').text(price_state.toLocaleString());

        var wht_price = price_state;
        $('#btn-form_cal').hide();
    });

    function hideAll() {
        $("#one-car").hide();
        $("#two-car").hide();
        $('#normal-car').hide();
        $("#sub-select-1").hide();
        $("#normal-car").hide();
        $("#sub-select-1").hide();
        $("#sub-select-2").hide();      
        $("#child-select").hide();      
    }

    function empty_price(){
        $('#price-join').text('');
        $('#price-car').text('');
        $('#price-people').text('');
        $('#price-child').text('');
        $('#price-total').text('');
        $('#price-vat').text('');
        $('#price-receipt').text('');
        $('#price-wht').text('');
        $('#price-paid').text('');
    }

    function empty_total(){
        $('#total-join').text('');
        $('#total-car').text('');
        $('#total-people').text('');
        $('#total-child').text('');
        $('#total-total').text('');
        $('#total-vat').text('');
        $('#total-receipt').text('');
        $('#total-wht').text('');
        $('#total-paid').text('');
    }

    $( "#btn-cal" ).on( "click", function( e ) {

        let p_join = $('#price-join').text();
        let p_car = $('#price-car').text();
        let p_people = $('#price-people').text();
        let p_child = $('#price-child').text();
        let ewhtwht = $('#ewht-wht').text();

        
        let n_join = parseInt( p_join.split(',').join('') );
        let n_car = parseInt( p_car.split(',').join('') );
        let n_people = parseInt( p_people.split(',').join('') );
        let n_child = parseInt( p_child.split(',').join('') );
        
        let total = (n_join+n_car)+(n_people+n_child);
        let real_wht = ewhtwht/100;
        let real_vat = <?php echo $vat; ?>/100;
        let vat = total*real_vat;
        let receipt = total+vat;
        let wht = total*real_wht;
        let paid = receipt-wht;
        
        $('#price-total').text(total.toLocaleString());
        $('#price-vat').text(vat.toLocaleString());
        $('#price-receipt').text(receipt.toLocaleString());
        $('#price-wht').text(wht.toLocaleString());
        $('#price-paid').text(paid.toLocaleString());

        let type_c = $('#total-join').text();
        let car_count = $('#total-car').text();
        let people_count = $('#total-people').text();
        let kid_count = $('#total-child').text();
        
        $('input#type_count').val(type_c);
        $('input#car_count').val(car_count);
        $('input#people_count').val(people_count);
        $('input#kid_count').val(kid_count);

        let type_count_p = $('#price-join').text();
        let car_count_p = $('#price-car').text();
        let people_count_p = $('#price-people').text();
        let kid_count_p = $('#price-child').text();

        $('input#type_count_p').val(type_count_p);
        $('input#car_count_p').val(car_count_p);
        $('input#people_count_p').val(people_count_p);
        $('input#kid_count_p').val(kid_count_p);

        $('input#total_p').val(total);
        $('input#vat_p').val(vat);
        $('input#receipt_p').val(receipt);
        $('input#wht_p').val(wht);
        $('input#paid_p').val(paid);

        $('#btn-form_cal').show();
        $('.p-tr').show();

        // alert( total );
      });

      $('#btn-form_cal').on( "click", function( e ){
        // Stop the form submitting
          e.preventDefault();
          // Do whatever it is you wish to do
          let paid = $('#price-paid').text();
          if(paid == ''){
              $('.bar-alert').show();
              $('.bar-alert p').text('กรุณาระบุข้อมูลให้ครบ');
              $('.p-tr').hide();
              $('#btn-form_cal').hide();
              return false;
          }else if(paid == 'NaN'){
            $('.bar-alert').show();
            $('#btn-form_cal').hide();
            $('.bar-alert p').text('กรุณาระบุข้อมูลให้ครบก่อนคำนวณราคา');
            $('.p-tr').hide();
              return false;
          }else{
            $('.bar-alert').hide();
            $("#form-cal").submit();
          }
    });
    $('#btn-cal').on( "click", function( e ){
        // Stop the form submitting
          e.preventDefault();
          // Do whatever it is you wish to do       
          let paid = $('#price-paid').text();
          if(paid != ''){
            $('.bar-alert').hide();          
          }
    });

});
</script>
<?php get_footer(); ?>