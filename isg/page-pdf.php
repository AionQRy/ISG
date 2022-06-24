<?php
/**
 * template name: PDF
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
 require_once 'vendor/autoload.php';

 $mpdf = new \Mpdf\Mpdf();

 $defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
 $fontDirs = $defaultConfig['fontDir'];

 $defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
 $fontData = $defaultFontConfig['fontdata'];

 $mpdf = new \Mpdf\Mpdf([
     'fontDir' => array_merge($fontDirs, [
         __DIR__ . '/vendor/fonts',
     ]),
     'fontdata' => $fontData + [
         'thsarabun' => [
             'R' => 'THSarabunNew.ttf',
             //'I' => 'THSarabunNew Italic.ttf',
             //'B' => 'THSarabunNew Bold.ttf',
         ]
     ],
     'default_font' => 'thsarabun',
     'format' => 'A4',
     'mode' => 'utf-8'
 ]);
ob_start();
?>
<article>
  <style media="print">
    h2{
      text-align: center;
      font-weight: normal;
      font-size: 26px;
      margin: 0;
    }
    h3{
      text-align: center;
      font-weight: normal;
      font-size: 21px;
      margin: 0;
    }
    #top-object th{
      font-size: 18px;
      font-weight: normal;
      margin: 0;
      text-aligh: left;

    }
    #top-object th{
      width: 50%;
    }
    .box-title_object.one h3{
      text-align: center;
    }
    .box-title_object.two h3{
      font-size: 19px;
      text-align: left;
    }
    .object-table tr{
      text-align: left;
    }
    .object-table th{
      font-size: 18px;
      font-weight: normal;
      margin: 0;
      text-aligh: left !important;
      float: left !important;
    }
    .detail p{
      font-size: 18px;
    }
    .detail{
      padding-top: 10px;
    }
  </style>
<?php
                                        // Create DateTime object from value (formats must match).

                                        $start_date = get_field('date_event_s', 'option');

                                        $end_date = get_field('date_event_e', 'option');
                                        $args = array(
                                            'post_type'=> 'isg_information',
                                            'posts_per_page' => 1,
                                            'p' => $_GET['bill'],
                                            'orderby'    => 'date',
                                            'order'    => 'DESC',
                                        );
                                        // The Query
                                        query_posts( $args );

                                        // The Loop
                                        while ( have_posts() ) : the_post();

                                        $com_name = get_field('com_name');
                                        $day_join = get_field('day_join');
                                        //driver
                                        $name_driver = get_field('name_driver');
                                        $no_driver = get_field('no_driver');
                                        $born_driver = get_field('born_driver');
                                        $size_driver = get_field('size_driver');
                                        $cer_driver = get_field('cer_driver');
                                        $day_app_driver = get_field('day_app_driver');
                                        //navigator
                                        $name_navigat = get_field('name_navigat');
                                        $no_navigat = get_field('no_navigat');
                                        $born_navigat = get_field('born_navigat');
                                        $size_navigat = get_field('size_navigat');

                                        // echo get_the_title();
                                        ?>
                                        <div class="form-join_infomation">
                                          <div class="box-title">
                                            <h2><?php echo esc_html__( 'ใบสมัครการแข่งขันอีซูซุแรลลี่ คณะบุคคลผู้ผลิตชิ้นส่วนอีซูซุ', 'isg' ); ?></h2>
                                            <h3>วันที่ <?php echo $start_date;?> ถึง <?php echo $end_date;?></h3>
                                          </div>
                                          <table id="top-object" style="width:400px;padding-top: 20px;">
                                            <tr>
                                              <th style="width: 15%;">จากบริษัท</th>
                                              <th style="width: 35%;border-bottom: 1px dotted #000;"><?php echo $com_name; ?></th>
                                              <th style="width: 15%;">วันที่สมัคร</th>
                                              <th style="width: 35%;border-bottom: 1px dotted #000;"><?php echo $day_join; ?></th>
                                            </tr>
                                          </table>
                                          <div class="box-title_object one" style="padding-top: 10px;">
                                            <h3>*** กรุณาพิมพ์รายละเอียดด้านล่างนี้ เป็นภาษาไทยเท่านั้น ***</h3>
                                          </div>
                                          <div class="box-title_object two" style="padding-top: 0;">
                                            <h3 style="border-bottom: 1px dotted #000;">ผู้ขับขี่ / Driver</h3>
                                          </div>
                                          <table class="object-table" style="width:100%;padding-top: 10px;">
                                            <tr style="width:100%;padding-top: 10px;">
                                              <th style="width: 12.5%;float: left;">ชื่อ-นามสกุล</th>
                                              <th style="width: 17%;border-bottom: 1px dotted #000;"><?php echo $name_driver; ?></th>
                                              <th style="width: 12.5%;">เบอร์มือถือ</th>
                                              <th style="width: 13%;border-bottom: 1px dotted #000;"><?php echo $no_driver; ?></th>
                                              <th style="width: 18.5%;">วัน/เดือน/ปี ค.ศ. เกิด</th>
                                              <th style="width: 12%;border-bottom: 1px dotted #000;"><?php echo $born_driver; ?></th>
                                              <th style="width: 12.5%;">ขนาดเสื้อ</th>
                                              <th style="width: 2%;border-bottom: 1px dotted #000;"><?php echo $size_driver; ?></th>
                                            </tr>
                                          </table>
                                          <table class="object-table" style="width:100%;padding-top: 10px;">
                                            <tr style="width:100%;padding-top: 10px;">
                                              <th style="width: 12.5%;">ใบอนุญาตขับขี่ฉบับที่</th>
                                              <th style="width: 17%;border-bottom: 1px dotted #000;"><?php echo $cer_driver; ?></th>
                                              <th style="width: 12.5%;">วันอนุญาต</th>
                                              <th style="width: 13%;border-bottom: 1px dotted #000;"><?php echo $day_app_driver; ?></th>
                                              <th style="width: 18.5%;"></th>
                                              <th style="width: 12%;"></th>
                                              <th style="width: 12.5%;"></th>
                                              <th style="width: 2%;"></th>
                                            </tr>
                                          </table>
                                          <div class="box-title_object two" style="padding-top: 30px;">
                                            <h3 style="border-bottom: 1px dotted #000;">ผู้นำทาง / Navigator</h3>
                                          </div>
                                          <table class="object-table" style="width:100%;padding-top: 10px;">
                                            <tr style="width:100%;padding-top: 10px;">
                                              <th style="width: 12.5%;float: left;">ชื่อ-นามสกุล</th>
                                              <th style="width: 17%;border-bottom: 1px dotted #000;"><?php echo $name_navigat; ?></th>
                                              <th style="width: 12.5%;">เบอร์มือถือ</th>
                                              <th style="width: 13%;border-bottom: 1px dotted #000;"><?php echo $no_navigat; ?></th>
                                              <th style="width: 18.5%;">วัน/เดือน/ปี ค.ศ. เกิด</th>
                                              <th style="width: 12%;border-bottom: 1px dotted #000;"><?php echo $born_navigat; ?></th>
                                              <th style="width: 12.5%;">ขนาดเสื้อ</th>
                                              <th style="width: 2%;border-bottom: 1px dotted #000;"><?php echo $size_navigat; ?></th>
                                            </tr>
                                          </table>
                                          <div class="box-title_object two" style="padding-top: 30px;">
                                            <h3 style="border-bottom: 1px dotted #000;">ผู้ร่วมรถ (ผู้แข่งขัน ท่านที่ 3 เป็นต้นไป)</h3>
                                          </div>
                                          <?php if( have_rows('repeat_people') ): ?>
                                            <table id="top-object" style="width:100%;padding-top: 10px;">
                                          <?php while( have_rows('repeat_people') ): the_row();
                                              $name_people = get_sub_field('name_people');
                                              $no_people = get_sub_field('no_people');
                                              $born_people = get_sub_field('born_people');
                                              $size_people = get_sub_field('size_people');
                                              ?>
                                               <tr>
                                                <th style="width: 12.5%;float: left;">ชื่อ-นามสกุล</th>
                                                <th style="width: 17%;border-bottom: 1px dotted #000;"><?php echo $name_people; ?></th>
                                                <th style="width: 12.5%;">เบอร์มือถือ</th>
                                                <th style="width: 13%;border-bottom: 1px dotted #000;"><?php echo $no_people; ?></th>
                                                <th style="width: 18.5%;">วัน/เดือน/ปี ค.ศ. เกิด</th>
                                                <th style="width: 12%;border-bottom: 1px dotted #000;"><?php echo $born_people; ?></th>
                                                <th style="width: 12.5%;">ขนาดเสื้อ</th>
                                                <th style="width: 2%;border-bottom: 1px dotted #000;"><?php echo $size_people; ?></th>
                                              </tr>
                                          <?php endwhile; ?>
                                          </table>
                                        <?php endif; ?>



                                          <div class="box-title_object two" style="padding-top: 10px;">
                                            <h3 style="border-bottom: 1px dotted #000;">เด็กอายุ 4-11 ปี</h3>
                                          </div>
                                          <?php if( have_rows('repeat_child') ): ?>
                                            <table id="top-object" style="width:100%;padding-top: 10px;">
                                          <?php while( have_rows('repeat_child') ): the_row();
                                              $name_child = get_sub_field('name_child');
                                              $no_child = get_sub_field('no_child');
                                              $born_child = get_sub_field('born_child');
                                              $size_child = get_sub_field('size_child');
                                              ?>
                                               <tr>
                                                <th style="width: 12.5%;float: left;">ชื่อ-นามสกุล</th>
                                                <th style="width: 17%;border-bottom: 1px dotted #000;"><?php echo $name_child; ?></th>
                                                <th style="width: 12.5%;">เบอร์มือถือ</th>
                                                <th style="width: 13%;border-bottom: 1px dotted #000;"><?php echo $no_child; ?></th>
                                                <th style="width: 18.5%;">วัน/เดือน/ปี ค.ศ. เกิด</th>
                                                <th style="width: 12%;border-bottom: 1px dotted #000;"><?php echo $born_child; ?></th>
                                                <th style="width: 12.5%;">ขนาดเสื้อ</th>
                                                <th style="width: 2%;border-bottom: 1px dotted #000;"><?php echo $size_child; ?></th>
                                              </tr>
                                          <?php endwhile; ?>
                                          </table>
                                        <?php endif; ?>
                                        <div class="box-title_object two" style="padding-top: 10px;">
                                            <h3 style="border-bottom: 1px dotted #000;">รายละเอียดรถ</h3>
                                        </div>
                                        <table class="object-table" style="width:100%;padding-top: 10px;">
                                            <tr style="width:100%;padding-top: 10px;">
                                              <th style="width: 20%;float: left;">ยี่ห้อรถ</th>
                                              <th style="width: 20%;border-bottom: 1px dotted #000;"><?php echo $name_driver; ?></th>
                                              <th style="width: 15%;">รุ่นรถ</th>
                                              <th style="width: 15%;border-bottom: 1px dotted #000;"><?php echo $no_driver; ?></th>
                                              <th style="width: 15%;">รุ่นปี</th>
                                              <th style="width: 15%;border-bottom: 1px dotted #000;"><?php echo $born_driver; ?></th>
                                            </tr>
                                          </table>
                                          <table class="object-table" style="width:100%;padding-top: 10px;">
                                            <tr style="width:100%;padding-top: 10px;">
                                              <th style="width: 20%;">เลขทะเบียน+จังหวัด</th>
                                              <th style="width: 20%;border-bottom: 1px dotted #000;"><?php echo $cer_driver; ?></th>
                                              <th style="width: 15%;">สีรถ</th>
                                              <th style="width: 15%;border-bottom: 1px dotted #000;"><?php echo $size_driver; ?></th>
                                              <th style="width: 15%;"></th>
                                              <th style="width: 15%;"></th>
                                            </tr>
                                          </table>
                                          <div class="detail">
                                            <p>บุคคลที่มีรายชื่อด้านบนนี้ ยินดีให้ข้าพเจ้ารับผิดชอบต่อการแสดงหรือการกระทำอันไม่สมควรต่อคณะกรรมการ อันจะนำความเสื่อมเสียชื่อเสียง
ของหมู่คณะและสถาบัน การสมัครเข้าแข่งขันครั้งนี้ ข้าพเจ้าได้อ่านกติกาและข้อบังคับต่างๆ ที่คณะกรรมการจัดการแข่งขันได้วางไว้ ไม่มีข้อบังคับใดๆ
ให้ข้าพเจ้ากระทำการฝ่าฝืนกฎหมายในการใช้รถใช้ถนนบนทางหลวง ดังนั้น ถ้าเกิดอุบัติเหตุใดๆ ขึ้น ข้าพเจ้าและผู้ร่วมเดินทางทุกคน ไม่ว่าจะอยู่ในหรือ
นอกการแข่งขัน ข้าพเจ้าถือว่าเป็นเรื่องที่ข้าพเจ้าจะต้องรับผิดชอบต่อความเสียหายที่เกิดขึ้นเอง โดยไม่เรียกร้องใดๆ ทั้งสิ้น จึงลงลายมือชื่อไว้เป็นหลักฐาน
</p>
                                          </div>
                                          <div class="agree-box">
                                            <table class="object-table" style="width:200px;padding-top: 10px;margin: 0 0 0 auto;">
                                              <tr style="width:100%;padding-top: 10px;">
                                                <th style="width: 15%;">ลงชื่อ</th>
                                                <th style="width: 75%;border-bottom: 1px dotted #000;"></th>
                                                <th style="width: 15%;">ผู้สมัคร</th>
                                              </tr>
                                            </table>
                                            <table class="object-table" style="width:200px;padding-top: 10px;margin: 0 0 0 auto;">
                                              <tr style="width:100%;padding-top: 10px;">
                                                <th style="width: 15%;">(</th>
                                                <th style="width: 70%;border-bottom: 1px dotted #000;"></th>
                                                <th style="width: 15%;">)&nbsp;&nbsp;&nbsp;</th>
                                              </tr>
                                            </table>
                                          </div>
                                          <div class="price-box">

                                          </div>
                                        </div>
                                        <?php
                                        ?>


</article>
<?php
 $output_string = ob_get_contents();
 	ob_end_clean();
 	// return $output_string;
 $mpdf->WriteHTML($output_string);

 // Turns all headers/footers off from new page onwards
$mpdf->AddPage(
  '','NEXT-ODD','','','','','','','','','',
  '','','','',
  -1,-1,-1,-1
);
ob_start();
?>
  <article>
    <div class="box-title_object two" style="padding-top: 30px;">
        <h3 style="border-bottom: 1px dotted #000;font-size: 21;x">การคำนวณค่าใช้จ่ายสำหรับการแข่งขันอีซูซุแรลลี่</h3>
    </div>
      <?php
      $total_join = get_field('total-join');
      $total_car = get_field('total-car');
      $total_people = get_field('total-people');
      $total_child = get_field('total-child');
      $price_join = get_field('price-join');
      $price_car = get_field('price-car');
      $price_people = get_field('price-people');
      $price_child = get_field('price-child');
      $price_total = get_field('price-total');
      $price_vat = get_field('price-vat');
      $price_receipt = get_field('price-receipt');
      $price_wht = get_field('price-wht');
      $price_paid = get_field('price-paid');
      $wht_name = get_field('ewht-wht_name');
      $wht_percent = get_field('ewht-wht_percent');
      $vat_percent = get_field('vat_percent');
      $payment_event_date = get_field('payment_event_date', 'option');
      $price_third_regular = get_field('price_third_regular', 'option');
      $kid_price_regular = get_field('kid_price_regular', 'option');
      ?>
     <table class="object-table" style="width:660px;padding-top: 10px;margin: 25px auto 0;border-bottom: 1px solid #000;">
      <tr>
          <th style="width: 150px;text-align: center;padding: 5px;font-size: 20px;">รายการ</th>
          <th style="width: 150px;text-align: center;padding: 5px;font-size: 20px;">ประเภท</th>
          <th style="width: 10px;"></th>
          <th style="width: 150px;text-align: center;padding: 5px;font-size: 20px;">ราคา</th>
          <th style="width: 200px;text-align: center;padding: 5px;font-size: 20px;">เงื่อนไข</th>
        </tr>
      </table>

      <table class="object-table" style="width:660px;padding-top: 10px;margin: 0 auto;">
        <tr>
          <th style="width: 150px;text-align: center;padding: 5px;font-size: 18px;">ประเภทการเข้าร่วม</th>
          <th style="width: 150px;text-align: center;padding: 5px;border-bottom: 1px dotted #000;font-size: 18px;"><?php echo $total_join; ?></th>
          <th style="width: 10px;"></th>
          <th style="width: 150px;border-bottom: 1px dotted #000;font-size: 18px;text-align: center;padding: 5px;"><?php if($price_join){ echo $price_join; }else{ echo '0'; } ?> บาท</th>
          <th style="width: 200px;text-align: center;padding: 5px;font-size: 18px;"></th>
        </tr>
      </table>
      <table class="object-table" style="width:660px;padding-top: 10px;margin: 0 auto;">
<tr>
        <th style="width: 150px;text-align: center;padding: 5px;font-size: 18px;">จำนวนรถ</th>
        <th style="width: 150px;text-align: center;padding: 5px;border-bottom: 1px dotted #000;font-size: 18px;"><?php if($total_car){ echo $total_car; }else{ echo '0'; } ?> คัน</th>
        <th style="width: 10px;"></th>
        <th style="width: 150px;text-align: center;padding: 5px;font-size: 18px;border-bottom: 1px dotted #000;"><?php if($price_car){ echo $price_car; }else{ echo '0'; } ?> บาท</th>
        <th style="width: 200px;text-align: center;padding: 5px;font-size: 18px;"></th>
      </tr>
</table>

<table class="object-table" style="width:660px;padding-top: 10px;margin: 0 auto;">
<tr>
        <th style="width: 150px;text-align: center;padding: 5px;font-size: 18px;">จำนวนผู้แข่งขันทั้งหมด</th>
        <th style="width: 150px;text-align: center;padding: 5px;border-bottom: 1px dotted #000;font-size: 18px;"><?php if($total_people){ echo $total_people; }else{ echo '0'; } ?> คน</th>
        <th style="width: 10px;"></th>
        <th style="width: 150px;text-align: center;padding: 5px;font-size: 18px;border-bottom: 1px dotted #000;"><?php if($price_people){ echo $price_people; }else{ echo '0'; } ?> บาท</th>
        <th style="width: 200px;text-align: center;padding: 5px;font-size: 18px;">ท่านที่ 3 เป็นต้นไป <?php if($price_third_regular){ echo $price_third_regular; }else{ echo '0'; } ?> บาท/ท่าน</th>
      </tr>
</table>

<table class="object-table" style="width:660px;padding-top: 10px;margin: 0 auto;">
<tr>
        <th style="width: 150px;text-align: center;padding: 5px;font-size: 18px;">เด็กอายุ 4-11 ปี</th>
        <th style="width: 150px;text-align: center;padding: 5px;border-bottom: 1px dotted #000;font-size: 18px;"><?php if($total_child){ echo $total_child; }else{ echo '0'; } ?> คน</th>
        <th style="width: 10px;"></th>
        <th style="width: 150px;text-align: center;padding: 5px;font-size: 18px;border-bottom: 1px dotted #000;"><?php if($price_child){ echo $price_child; }else{ echo '0'; } ?> บาท</th>
        <th style="width: 200px;text-align: center;padding: 5px;font-size: 18px;"><?php if($kid_price_regular){ echo $kid_price_regular; }else{ echo '0'; } ?> บาท/ท่าน</th>
      </tr>
</table>

<table class="object-table" style="width:660px;padding-top: 10px;margin: 0 auto;">
<tr>
        <th style="width: 150px;text-align: center;padding: 5px;font-size: 18px;">TOTAL</th>
        <th style="width: 150px;text-align: center;padding: 5px;border-bottom: 1px dotted #000;font-size: 18px;"></th>
        <th style="width: 10px;"></th>
        <th style="width: 150px;text-align: center;padding: 5px;font-size: 18px;border-bottom: 1px dotted #000;"><?php if($price_total){ echo number_format($price_total,0); }else{ echo '0'; } ?> บาท</th>
        <th style="width: 200px;text-align: center;padding: 5px;font-size: 18px;"></th>
      </tr>
</table>

<table class="object-table" style="width:660px;padding-top: 10px;margin: 0 auto;">
<tr>
        <th style="width: 150px;text-align: center;padding: 5px;font-size: 18px;">VAT <?php echo $vat_percent;?>%</th>
        <th style="width: 150px;text-align: center;padding: 5px;border-bottom: 1px dotted #000;font-size: 18px;"><?php echo $vat_percent;?>%</th>
        <th style="width: 10px;"></th>
        <th style="width: 150px;text-align: center;padding: 5px;font-size: 18px;border-bottom: 1px dotted #000;"><?php if($price_vat){ echo number_format($price_vat,0); }else{ echo '0'; } ?> บาท</th>
        <th style="width: 200px;text-align: center;padding: 5px;font-size: 18px;"></th>
      </tr>
</table>

<table class="object-table" style="width:660px;padding-top: 10px;margin: 0 auto;">
<tr>
        <th style="width: 150px;text-align: center;padding: 5px;font-size: 18px;">RECEIPT</th>
        <th style="width: 150px;text-align: center;padding: 5px;border-bottom: 1px dotted #000;font-size: 18px;"></th>
        <th style="width: 10px;"></th>
        <th style="width: 150px;text-align: center;padding: 5px;font-size: 18px;border-bottom: 1px dotted #000;"><?php if($price_receipt){ echo number_format($price_receipt,0); }else{ echo '0'; } ?> บาท</th>
        <th style="width: 200px;text-align: center;padding: 5px;font-size: 18px;"></th>
      </tr>
</table>

<table class="object-table" style="width:660px;padding-top: 10px;margin: 0 auto;">
<tr>
        <th style="width: 150px;text-align: center;padding: 5px;font-size: 18px;"><?php echo $wht_name;?></th>
        <th style="width: 150px;text-align: center;padding: 5px;border-bottom: 1px dotted #000;font-size: 18px;"><?php echo $wht_percent;?></th>
        <th style="width: 10px;"></th>
        <th style="width: 150px;text-align: center;padding: 5px;border-bottom: 1px dotted #000;font-size: 18px;"><?php if($price_wht){ echo number_format($price_wht,0); }else{ echo '0'; } ?> บาท</th>
        <th style="width: 200px;text-align: center;padding: 5px;font-size: 18px;"></th>
      </tr>
</table>

<table class="object-table" style="width:660px;padding-top: 10px;margin: 0 auto 40px;">
<tr>
        <th style="width: 150px;text-align: center;padding: 5px;font-size: 18px;">PAID</th>
        <th style="width: 150px;text-align: center;padding: 5px;border-bottom: 1px dotted #000;font-size: 18px;"></th>
        <th style="width: 10px;"></th>
        <th style="width: 150px;text-align: center;padding: 5px;font-size: 18px;border-bottom: 1px dotted #000;"><?php if($price_paid){ echo number_format($price_paid,0); }else{ echo '0'; } ?> บาท</th>
        <th style="width: 200px;text-align: center;padding: 5px;font-size: 18px;"></th>
      </tr>
</table>

        <h3 style="color: red;font-size: 18px;">กำหนดชำระเงิน <?php echo $payment_event_date; ?></h3>
        <h3 style="color: #000;font-size: 18px;">ชี่อและที่อยู่ในการออก ภ.ง.ด. 3 ที่ถูกต้องซึ่งท่านสามารถคัดลอกนำไปใช้ได้</h3>
        <table class="object-table" style="width:600px;padding-top: 10px;margin: 0 auto;">
              <tr style="width:100%;padding-top: 10px;">
                  <td style="width: 48%;border-bottom: 1px dotted #000;padding: 5px;font-size: 18px;">ISUZU SUPPLIERS GROUP</td>
                  <td style="width: 4%;"></td>
                  <td style="width: 48%;border-bottom: 1px dotted #000;padding: 5px;font-size: 18px;">คณะบุคคลผู้ผลิตชิ้นส่วนอีซูซุ</td>
              </tr>
              <tr style="width:100%;padding-top: 10px;">
                  <td style="width: 48%;border-bottom: 1px dotted #000;padding: 5px;font-size: 18px;">HEAD OFFICE</td>
                  <td style="width: 4%;"></td>
                  <td style="width: 48%;border-bottom: 1px dotted #000;padding: 5px;font-size: 18px;">สำนักงานใหญ่</td>
              </tr>
              <tr style="width:100%;padding-top: 10px;">
                  <td style="width: 48%;border-bottom: 1px dotted #000;padding: 5px;font-size: 18px;">38 Kor., Moo 9, Poochaosamingprai Road,<BR> Samrong-tai, Phrapradaeng, Samutprakarn. 10130</td>
                  <td style="width: 4%;"></td>
                  <td style="width: 48%;border-bottom: 1px dotted #000;padding: 5px;font-size: 18px;">38 ก. หมู่ 9 ถ.ปู่เจ้าสมิงพราย ต.สำโรงใต้  อ.พระประแดง จ.สมุทรปราการ 10130</td>
              </tr>
              <tr style="width:100%;padding-top: 10px;">
                  <td style="width: 48%;border-bottom: 1px dotted #000;padding: 5px;font-size: 18px;">Tax ID: 0-9920-01271-10-9</td>
                  <td style="width: 4%;"></td>
                  <td style="width: 48%;border-bottom: 1px dotted #000;padding: 5px;font-size: 18px;">Tax ID: 0-9920-01271-10-9</td>
              </tr>
        </table>

        <div style="margin-top:15px;font-weight:400!important;font-size:18px;text-align:center;">
          <?php the_field('bank_free_text','option'); ?>
        </div>


  </article>
<?php
$page_2 = ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML($page_2);
 $mpdf->Output();
// get_header();
?>
                                <?php
                                        endwhile;
                                        // Reset Query
                                        wp_reset_query();
                                        ?>
<?php ///get_footer(); ?>
