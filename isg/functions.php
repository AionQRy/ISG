<?php
/**
 * Override seed_setup()
 */
/*
function fruit_setup() {
	add_theme_support( 'custom-logo', array(
		'width'       => 200,
		'height'      => 200,
		'flex-width' => true,
		) );
}
add_action( 'after_setup_theme', 'fruit_setup', 11);
*/
// function acf_form_wp_head()
// {
// 	// global vars
// 	global $post, $acf;
//
// 	// Style
// 	echo '<link rel="stylesheet" type="text/css" href="'.$acf->dir.'/css/global.css?ver=' . $acf->version . '" />';
// 	echo '<link rel="stylesheet" type="text/css" href="'.$acf->dir.'/css/input.css?ver=' . $acf->version . '" />';
// 	// Javascript
// 	echo '<script type="text/javascript" src="'.$acf->dir.'/js/input-actions.js?ver=' . $acf->version . '" ></script>';
//
// 	// add user js + css
// 	// do_action('acf_head-input');
//
// 	echo '<script type="text/javascript" src="'.get_site_url().'/wp-content/plugins/advanced-custom-fields-pro/assets/js/acf.min.js" ></script>';
//
// }

add_filter( 'send_password_change_email', '__return_false' );

include_once( get_stylesheet_directory() .'/add-on/fpdf184/fpdf.php');

// include get_stylesheet_directory() . '/add-on/fpdf184/fpdf.php';
/**
 * Enqueue scripts and styles.
 */
function fruit_scripts() {

	wp_dequeue_style( 'seed-style');

	wp_enqueue_style( 'isg-theme-css', get_stylesheet_uri() );
	wp_enqueue_script( 'isg-theme-js', get_stylesheet_directory_uri() . '/js/main.js', array(), '2020-1', true );

}
add_action( 'wp_enqueue_scripts', 'fruit_scripts' , 20 );

function add_font_ai(){
	//wp_enqueue_style( 'isg-catamaran-font-style', get_stylesheet_directory_uri() . '/add-on/fonts/catamaran/stylesheet.css', true );
	wp_enqueue_style( 'isg-montserrat-font-style', get_stylesheet_directory_uri() . '/add-on/fonts/montserrat/stylesheet.css', true );
    wp_enqueue_style( 'isg-kanit-font-style', get_stylesheet_directory_uri() . '/add-on/fonts/kanit/stylesheet.css', true );
	wp_enqueue_style( 'font-line-awesome', get_stylesheet_directory_uri() . '/add-on/icon/line-awesome/css/line-awesome.min.css', array(), '1.1', 'all');
	wp_enqueue_script( 'isg-cookie-js', get_stylesheet_directory_uri() . '/js/jquery.cookie.js', array('jquery'), true );
	wp_enqueue_script( 'isg-step-js', get_stylesheet_directory_uri() . '/js/step-change.js', array('jquery'), true );
	wp_enqueue_script( 'isg-select-js', get_stylesheet_directory_uri() . '/js/select-option.js', array('jquery'), true );
	wp_enqueue_script( 'datex-js', get_stylesheet_directory_uri() . '/add-on/date-picker/bootstrap-datepicker.js', array(), '1.1', 'all' );
	wp_enqueue_script( 'date-th-js', get_stylesheet_directory_uri() . '/add-on/date-picker/bootstrap-datepicker-thai.js', array(), '1.1', 'all' );
	wp_enqueue_script( 'date-th-th-js', get_stylesheet_directory_uri() . '/add-on/date-picker/bootstrap-datepicker.th.js', array(), '1.1', 'all' );
	wp_enqueue_style( 'datepicker-css', get_stylesheet_directory_uri() . '/add-on/date-picker/datepicker.css', array(), true );
	
	// // wp_enqueue_script( 'validat-js', get_stylesheet_directory_uri() . '/add-on/validation/validin.js', array(), '1.1', 'all' );
	// wp_enqueue_script( 'validat-min-js', get_stylesheet_directory_uri() . '/add-on/validation/validin.min.js', array(), '1.1', 'all' );
	// wp_enqueue_style( 'validat-css', get_stylesheet_directory_uri() . '/add-on/validation/validin.css', array(), true );
}
add_action( 'wp_enqueue_scripts', 'add_font_ai' );

add_filter( 'wp_image_editors', 'change_graphic_lib' );

function change_graphic_lib($array) {
return array( 'WP_Image_Editor_GD', 'WP_Image_Editor_Imagick' );
}

function register_shortcodes() {
	add_shortcode( 'menu_header_user', 'menu_header_user' );
	add_shortcode( 'menu_header_user_mobile', 'menu_header_user_mobile' );
}
add_action( 'init', 'register_shortcodes' );

function wpdocs_theme_slug_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Activity Photo', 'isg' ),
        'id'            => 'act-photo',
        'description'   => __( 'Activity Photo Widget.', 'isg' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );

	register_sidebar( array(
        'name'          => __( 'Author Sidebar', 'isg' ),
        'id'            => 'sb-author',
        'description'   => __( 'Activity Photo Widget.', 'isg' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
	register_sidebar( array(
        'name'          => __( 'About Sidebar', 'isg' ),
        'id'            => 'sb-about',
        'description'   => __( 'About Widget.', 'isg' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
	register_sidebar( array(
        'name'          => __( 'Post Sidebar', 'isg' ),
        'id'            => 'sb-post',
        'description'   => __( 'About Widget.', 'isg' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'wpdocs_theme_slug_widgets_init' );

add_action( 'after_setup_theme', 'wpdocs_theme_setup' );
function wpdocs_theme_setup() {
    add_image_size( 'act-photothumb', 300, 300, false ); // (cropped)
}


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
}

/*pagination*/
function seed_posts_navigation() {
	printf('<div class="content-pagination">');
	global $paged, $wp_query; $big = 9999999;
	if ( !$max_page ):
			$max_page = $wp_query->max_num_pages;
	endif;
	?>
	<span class="text-number_page"><?php esc_html_e( 'หน้า', 'Job989' ); ?> <?php echo max( 1, get_query_var('paged') );?> <?php esc_html_e( 'จาก', 'Job989' ); ?> <?php echo $wp_query->max_num_pages; ?></span>
	<?php
	echo '<div class="box-pagination">';
	echo paginate_links(
		array(
				'base' 		=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' 	=> '?paged=%#%',
				'current'	=> max( 1, get_query_var('paged') ),
				'total' 	=> $wp_query->max_num_pages,
				'prev_text'  => '<i class="las la-angle-left"></i>',
				'next_text'  => '<i class="las la-angle-right"></i>',
		));
	echo '</div>';
	if( $paged != $max_page ):
		if( $max_page > 1 ):
	?>
	<a href="<?php echo esc_url( get_pagenum_link( $wp_query->max_num_pages ) ); ?>" class="last-number_page"><?php esc_html_e( 'หน้าสุดท้าย', 'Job989' ); ?></a>
	<?php
		endif;
	endif;
	printf('</div>');
}


function menu_header_user() {
	ob_start();
	 if (!is_user_logged_in()): ?>
		<div class="account-box">
			<!-- <div class="login-box">
				<a href="<?php echo get_home_url();?>/log-in/">
					<i class="las la-unlock"></i>
					<span><?php esc_html_e( 'เข้าสู่ระบบ', 'isg' ); ?></span>
				</a>
			</div>
			<div class="middle-pass">
				<span></span>
			</div> -->
			<div class="register-box">
				<a href="<?php echo get_home_url();?>/log-in/">
					<i class="las la-user"></i>
					<span><?php esc_html_e( 'เข้าสู่ระบบ', 'isg' ); ?></span>
				</a>
			</div>
		</div>
		<?php else:
			global $post;
			$author_id =get_current_user_id();
		?>
			<div class="account-box">
                            <div class="login-box">
                                <div class="btn-acc_option">
                                    <i class="las la-user"></i>
                                    <span><span class="span-x"><?php echo get_the_author_meta( 'first_name', $author_id ); ?></span><i class="las la-angle-down"></i></span>
		</div>
                            <?php
                                $current_user = wp_get_current_user();
							?>
                                <ul id="sub-acc" class="sub-menu sub-acc">
                                <?php
                                // get author ID
                                $author_id = get_current_user_id(); ?>
                                <li><a href="<?php echo esc_url( get_author_posts_url( $current_user->ID ) ); ?>"><?php esc_html_e( 'Profile', 'isg' ); ?></a></li>
								<li><a href="<?php echo get_home_url();?>/company-user/""><?php esc_html_e( 'Company', 'isg' ); ?></a></li>
								<li><a href="<?php echo get_home_url();?>/change-user/"><?php esc_html_e( 'Change ISG Controller', 'isg' ); ?></a></li>
                                <li><a href="<?php echo wp_logout_url( get_home_url() ); ?>"><?php esc_html_e( 'Logout', 'isg' ); ?></a></li>
                                </ul>
                            </div>
                            <div class="middle-pass">
                                <span></span>
                            </div>
                            <div class="register-box">
                                <a href="<?php echo get_home_url(); ?>/activities/">
									<i class="las la-plus-circle"></i>
                                    <span><?php esc_html_e( 'Join Activity', 'isg' ); ?></span>
                                </a>
                            </div>
                        </div>
		<?php endif;
	$myvariablex = ob_get_clean();
	return $myvariablex;
}

function menu_header_user_mobile() {
	ob_start();
	 if (!is_user_logged_in()): ?>
		<div class="account-box account-box_mobile">
			<div class="login-box">
				<a href="<?php echo get_home_url();?>/login/">
					<i class="las la-sign-in-alt"></i>
				</a>
			</div>
			<div class="middle-pass">
				<span></span>
			</div>
			<div class="register-box">
				<a href="<?php echo get_home_url();?>/register/">
					<i class="las la-user-plus"></i>
				</a>
			</div>
		</div>
		<?php else:
			global $post;
			$author_id =get_current_user_id();
		?>
			<div class="account-box">
                            <div class="login-box">
                                <a href="#" class="btn-acc_option">
                                    <i class="las la-user"></i>
                                    <span><?php echo get_the_author_meta( 'first_name', $author_id ); ?><i class="las la-angle-down"></i></span>
                                </a>
                            <?php
                                $current_user = wp_get_current_user();
							?>
                                <ul id="sub-acc" class="sub-menu sub-acc">
                                <?php
                                // get author ID
                                $author_id = get_current_user_id(); ?>
                                <li><a href="<?php echo esc_url( get_author_posts_url( $current_user->ID ) ); ?>"><?php esc_html_e( 'ดูข้อมูลโปรไฟล์', 'isg' ); ?></a></li>
                                <li><a href="<?php echo get_home_url();?>/edit-profile-guest/"><?php esc_html_e( 'แก้ไขข้อมูลส่วนตัว', 'isg' ); ?></a></li>
                                <li><a href="<?php echo wp_logout_url( get_home_url() ); ?>"><?php esc_html_e( 'ออกจากระบบ', 'isg' ); ?></a></li>
                                </ul>
                            </div>
                            <div class="middle-pass">
                                <span></span>
                            </div>
                            <div class="register-box">
                                <a href="<?php echo get_home_url(); ?>/recruit/">
                                    <i class="las la-sign-out-alt"></i>
                                    <span><?php esc_html_e( 'Join Activity', 'isg' ); ?></span>
                                </a>
                            </div>
                        </div>
		<?php endif;
	$myvariablex = ob_get_clean();
	return $myvariablex;
}

function ajax_login_init(){
	global $wp_query;

	//In most cases it is already included on the page and this line can be removed
	wp_enqueue_script('jquery');

	//register our main script but do not enqueue it yet
	wp_register_script( 'login_system', get_stylesheet_directory_uri() . '/js/ajax-login-script.js', array('jquery') );

	//now the most interesting part
	//we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
	//you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
	wp_localize_script( 'login_system', 'login_system_params',
	array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'redirecturl' => home_url(),
        'loadingmessage' => __('Sending user info, please wait...')
	) );

	 wp_enqueue_script( 'login_system' );
}
if (!is_user_logged_in()) {
    add_action('wp_enqueue_scripts', 'ajax_login_init');
}

function ajax_author_init(){
	global $wp_query;

	//In most cases it is already included on the page and this line can be removed
	wp_enqueue_script('jquery');

	//register our main script but do not enqueue it yet
	wp_register_script( 'author_system', get_stylesheet_directory_uri() . '/js/edit-author.js', array('jquery') );

	//now the most interesting part
	//we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
	//you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
	wp_localize_script( 'author_system', 'author_system_params',
	array( 
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'redirecturl' => home_url().'/author',
        'loadingmessage' => __('Sending user info, please wait...')
	) );

	 wp_enqueue_script( 'author_system' );
}
add_action('wp_enqueue_scripts', 'ajax_author_init');

function ajax_company_init(){
	global $wp_query;

	//In most cases it is already included on the page and this line can be removed
	wp_enqueue_script('jquery');

	//register our main script but do not enqueue it yet
	wp_register_script( 'company_system', get_stylesheet_directory_uri() . '/js/edit-company.js', array('jquery') );

	//now the most interesting part
	//we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
	//you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
	wp_localize_script( 'company_system', 'company_system_params',
	array( 
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'redirecturl' => home_url().'/company-user',
        'loadingmessage' => __('Sending user info, please wait...')
	) );

	 wp_enqueue_script( 'company_system' );
}
add_action('wp_enqueue_scripts', 'ajax_company_init');


function login_fuc(){
	$store_arr["results"]=array();
	if(isset($_POST['checklog']) && $_POST['checklog'] == 'true') {

		//We shall SQL escape all inputs
		$email = $_POST['email'];
		$password = $_POST['password'];
		$remember = $_POST['remembercheck'];

		if($remember) $remember = "true";
		else $remember = "false";
		$login_data = array();
		$login_data['user_login'] = $email;
		$login_data['user_password'] = $password;
		$login_data['remember'] = $remember;
		$user_verify = wp_signon( $login_data, false );
		//wp_signon is a wordpress function which authenticates a user. It accepts user info parameters as an array.
		if ( is_wp_error($user_verify) ){
			$data = array(
				"loggedin"=> "false",
				"message" => "อีเมลหรือรหัสผ่านของคุณไม่ถูกต้อง" ,
			);

			array_push($store_arr["results"], $data);
			echo json_encode( $store_arr );
		} else {
			wp_set_current_user($user_verify->ID);
			wp_set_auth_cookie($user_verify->ID);
			$data = array(
				"loggedin"=> "true",
				"message" => "คุณได้เข้าสู่ระบบสำเร็จ เรากำลังพาคุณไปที่หน้าหลักเว็บไซต์" ,
			);

			array_push($store_arr["results"], $data);
			echo json_encode( $store_arr );
		}
	}
	die();
}
	// add_action('init', 'login_fuc');
	add_action('wp_ajax_login_system', 'login_fuc'); // wp_ajax_{action}
	add_action('wp_ajax_nopriv_login_system', 'login_fuc'); // wp_ajax_nopriv_{action}

function check_a(){
	if ( is_page( 'author' ) ) {
		if(is_user_logged_in()){
			$current_user = wp_get_current_user();
			wp_redirect( get_author_posts_url( $current_user->ID ) ); exit;
		}else{
			wp_redirect( get_home_url() ); exit;
		}
   }
}
add_action( 'template_redirect', 'check_a' );

function edit_author(){
	$store_arr["results"]=array();
	global $wpdb, $PasswordHash, $current_user, $user_ID;
	if(isset($_POST['check_author']) && $_POST['check_author'] == 'success') {
		$current_user = wp_get_current_user();
		$u_id = $current_user->ID;
		//We shall SQL escape all inputs
		$email = $_POST['email'];
		if($_POST['password']){
			$password = $_POST['password'];
		}
		
		$isg_contro = $_POST['isg_contro'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$position = $_POST['position'];
		$telephone_no = $_POST['telephone_no'];
		$ext = $_POST['ext'];
		$mobile_phone = $_POST['mobile_phone'];
		$position_controller = $_POST['position_controller'];
		$extension = $_POST['extension'];
		$company_code = $_POST['company_code'];

		$user_id = wp_update_user( array ( //default wordpress wp_users
			'ID' => $u_id,
			'first_name' => $first_name,
			 'last_name' => $last_name,
		 	'user_pass' => $password,
			 'user_email' => $email,
			)
			 );

		if ($isg_contro) {
			update_field( 'field_60f84ef65b55a', $isg_contro, 'user_'.$u_id );
		}
		if ($position) {
			update_field( 'field_60f84faf7906a', $position, 'user_'.$u_id );
		}
		if ($telephone_no) {
			update_field( 'field_60f84fbf7906b', $telephone_no, 'user_'.$u_id );
		}
		if ($ext) {
			update_field( 'field_60f84fcf7906c', $ext, 'user_'.$u_id );
		}
		if ($mobile_phone) {
			update_field( 'field_60f84fd97906d', $mobile_phone, 'user_'.$u_id );
		}
		if ($position_controller) {
			update_field( 'field_6110d3cc6668e', $position_controller, 'user_'.$u_id );
		}
		if ($extension) {
			update_field( 'field_6110d40266690', $extension, 'user_'.$u_id );
		}
		if ($company_code) {
			update_field( 'field_6110d47c66693', $company_code, 'user_'.$u_id );
		}

		//wp_signon is a wordpress function which authenticates a user. It accepts user info parameters as an array.
		if ( is_wp_error($user_id) ){
			$data = array(
				"loggedin"=> "false",
				"message" => "มีความผิดพลาดกรุณาลองใหม่อีกครั้ง" ,
			);

			array_push($store_arr["results"], $data);
			echo json_encode( $store_arr );
		} else {
			$data = array(
				"loggedin"=> "true",
				"message" => "แก้ไขข้อมูลผู้ใช้เรียบร้อย" ,
			);

			array_push($store_arr["results"], $data);
			echo json_encode( $store_arr );
		}
	}
	die();
}
// add_action('init', 'edit_author');
add_action('wp_ajax_author_system', 'edit_author'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_author_system', 'edit_author'); // wp_ajax_nopriv_{action}


function edit_company(){
	$store_arr["results"]=array();
	if(isset($_POST['check_cal']) && $_POST['check_cal'] == 'success') {
		$current_user = wp_get_current_user();
		$u_id = $current_user->ID;
		//We shall SQL escape all inputs
		$post_id = $_POST['company'];
		// echo $post_id;
		$post_author_id = get_post_field( 'post_author', $post_id );
		if($post_author_id == $u_id){
			$code = $_POST['code'];
			$company_name_english = $_POST['company_name_english'];
			$company_name_thai = $_POST['company_name_thai'];
			$nomoosoinikomroad = $_POST['nomoosoinikomroad'];
			$tambol__kwaeng = $_POST['tambol__kwaeng'];
			$amphur__khet = $_POST['amphur__khet'];
			$province = $_POST['province'];
			$postal = $_POST['postal'];
			$branch = $_POST['branch'];
			$tax_id = $_POST['tax_id'];
			$products = $_POST['products'];
			$top_management_name = $_POST['top_management_name'];
			$position_top = $_POST['position_top'];
			   
			$p_id = wp_update_post( array(
				'ID' => $post_id,
				'post_type' => 'company',
				'post_title'   => $company_name_thai,
				'post_status'   => 'publish',
				'post_name' => $code,
				'post_content' => false,
			   ) );

			if ($code) {
				update_field( 'field_6110d9a2b5462', $code, $post_id );
			}
			if ($company_name_english) {
				update_field( 'field_6110d9bbb5463', $company_name_english, $post_id );
			}
			if ($company_name_thai) {
				update_field( 'field_6110d9cbb5464', $company_name_thai, $post_id );
			}
			if ($nomoosoinikomroad) {
				update_field( 'field_6110d9dab5465', $nomoosoinikomroad, $post_id );
			}
			if ($tambol__kwaeng) {
				update_field( 'field_6110d9fdb5466', $tambol__kwaeng, $post_id );
			}
			if ($amphur__khet) {
				update_field( 'field_6110da53b5467', $amphur__khet, $post_id );
			}
			if ($province) {
				update_field( 'field_6110da63b5468', $province, $post_id );
			}
			if ($postal) {
				update_field( 'field_6110da6fb5469', $postal, $post_id );
			}
			if ($branch) {
				update_field( 'field_6110dae3b546a', $branch, $post_id );
			}
			if ($tax_id) {
				update_field( 'field_6110dae9b546b', $tax_id, $post_id );
			}
			if ($products) {
				update_field( 'field_6110daf0b546c', $products, $post_id );
			}
			if ($top_management_name) {
				update_field( 'field_6110db03b546d', $top_management_name, $post_id );
			}
			if ($position_top) {
				update_field( 'field_6110db07b546e', $position_top, $post_id );
			}

			//wp_signon is a wordpress function which authenticates a user. It accepts user info parameters as an array.
			if ( is_wp_error($p_id) ){
				$data = array(
					"loggedin"=> "false",
					"message" => "มีความผิดพลาดกรุณาลองใหม่อีกครั้ง" ,
				);

				array_push($store_arr["results"], $data);
				echo json_encode( $store_arr );
			} else {

				$data = array(
					"loggedin"=> "true",
					"message" => "แก้ไขข้อมูลองค์กรเรียบร้อย" ,
				);

				array_push($store_arr["results"], $data);
				echo json_encode( $store_arr );
			}
		}
	}
	die();
}
// add_action('init', 'edit_company');
add_action('wp_ajax_company_system', 'edit_company'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_company_system', 'edit_company'); // wp_ajax_nopriv_{action}

function sign_event(){
	if(isset($_POST['check_print']) && $_POST['check_print'] == 'success') :
		$store_arr["results"]=array();
			$current_user = wp_get_current_user();
			$u_id = $current_user->ID;
			// echo $post_id;
			$post_author_id = get_post_field( 'post_author', $post_id );		

				$name_company = $_POST['name_company'];
				$date_join = $_POST['date_join'];
				//driver
				$name_leader = $_POST['name_leader'];
				$phone_leader = $_POST['phone_leader'];
				$born_leader = $_POST['born_leader'];
				$size_leader = $_POST['size_leader'];
				$license_no = $_POST['license_no'];
				$day_g_leader = $_POST['day_g_leader'];
				//navigator
				$name_g = $_POST['name_g'];
				$phone_g = $_POST['phone_g'];
				$born_g = $_POST['born_g'];
				$size_g = $_POST['size_g'];
				//people

				//child

				//detailcar
				$name_c = $_POST['name_c'];
				$year_c = $_POST['year_c'];
				$no_c = $_POST['no_c'];
				$number_c = $_POST['number_c'];
				$color_c = $_POST['color_c'];
				//price
				$type_count = $_COOKIE['type_count'];
				$car_count = $_COOKIE['car_count'];
				$people_count = $_COOKIE['people_count'];
				$kid_count = $_COOKIE['kid_count'];

				$type_count_p = $_COOKIE['type_count_p'];
				$car_count_p = $_COOKIE['car_count_p'];
				$people_count_p = $_COOKIE['people_count_p'];
				$kid_count_p = $_COOKIE['kid_count_p'];
				$total_p = $_COOKIE['total_p'];
				$vat_p = $_COOKIE['vat_p'];
				$receipt_p = $_COOKIE['receipt_p'];
				$wht_p = $_COOKIE['wht_p'];
				$paid_p = $_COOKIE['paid_p'];
				$wht_name = $_COOKIE['wht_name'];
				$wht_percent = $_COOKIE['wht_percent'];
				$vat_percent = get_field( 'vat', 'option');

				$date_s = $_POST['date_event_s'];
				$date_e = $_POST['date_event_e'];
				$title_info = 'บริษัท '. $name_company . 'ใบสมัครการแข่งขันอีซูซุแรลลี่ คณะบุคคลผู้ผลิตชิ้นส่วนอีซูซุวันที่' . ' ' . $date_s . 'ถึง ' . $date_e;
				
				$post_id = wp_insert_post( array(
					'ID' => $post_id,
					'post_type' => 'isg_information',
					'post_title'   => $title_info,
					'post_status'   => 'publish',
					'post_name' => $post_id,
					'post_content' => false,
					'post_author' => $u_id,
				   ) );
	
				if ($name_company) {
					update_field( 'field_612f11af4366c', $name_company, $post_id );
				}
				if ($date_join) {
					update_field( 'field_612f146d4366d', $date_join, $post_id );
				}
				//driver
				if ($name_leader) {
					update_field( 'field_612f14a6357a2', $name_leader, $post_id );
				}
				if ($phone_leader) {
					update_field( 'field_612f14b2357a3', $phone_leader, $post_id );
				}
				if ($born_leader) {
					update_field( 'field_612f14bf357a4', $born_leader, $post_id );
				}
				if ($size_leader) {
					update_field( 'field_612f14d3357a5', $size_leader, $post_id );
				}
				if ($license_no) {
					update_field( 'field_612f14e4357a6', $license_no, $post_id );
				}
				if ($day_g_leader) {
					update_field( 'field_612f14f7357a7', $day_g_leader, $post_id );
				}
				//navigator
				if ($name_g) {
					update_field( 'field_612f150eacaec', $name_g, $post_id );
				}
				if ($phone_g) {
					update_field( 'field_612f150eacb23', $phone_g, $post_id );
				}
				if ($born_g) {
					update_field( 'field_612f150eacb59', $born_g, $post_id );
				}
				if ($size_g) {
					update_field( 'field_612f150eacb8e', $size_g, $post_id );
				}
				//people
				$name_u = array();
				$phone_u = array();
				$born_u = array();
				$size_u = array();
				
				$name_u = $_POST['name_u'];
				$phone_u = $_POST['phone_u'];
				$born_u = $_POST['born_u'];
				$size_u = $_POST['size_u'];
			


				// // Save a repeater field value.
				$field_key = "field_612f2359f30df";

				$one = $_POST['name_u'];
            	$two = $_POST['phone_u'];
                $three = $_POST['born_u'];
                $four = $_POST['size_u'];

                $object_a = array_map(function ($one, $two, $three, $four) {
                    return array(
                        "name_people"   => $one,
                        "no_people"   => $two,
                        "born_people"   => $three,
                        "size_people"   => $four
                    );
                }, $one , $two , $three, $four);
				update_field( $field_key, $object_a, $post_id );

				//Child
				$field_keyx = "field_612f23f5610ca";

				$one_k = $_POST['name_k'];
                $two_k = $_POST['phone_k'];
                $three_k = $_POST['born_k'];
                $four_k = $_POST['size_k'];
                $object_b = array_map(function ($one_k, $two_k, $three_k, $four_k) {
                    return array(
                        "name_child"   => $one_k,
                        "no_child"   => $two_k,
                        "born_child"   => $three_k,
                        "size_child"   => $four_k
                	);
                }, $one_k , $two_k , $three_k, $four_k);
				update_field( $field_keyx, $object_b, $post_id );
				
				if ($u_id) {
					update_field( 'field_612f2f6cac358', $u_id, $post_id );
				}
				//detailcar
				if ($name_c) {
					update_field( 'field_612f1c0ed5dea', $name_c, $post_id );
				}
				if ($year_c) {
					update_field( 'field_612f1c0ed5e21', $year_c, $post_id );
				}
				if ($no_c) {
					update_field( 'field_612f1c0ed5e57', $no_c, $post_id );
				}
				if ($number_c) {
					update_field( 'field_612f1c0ed5e8c', $number_c, $post_id );
				}
				if ($color_c) {
					update_field( 'field_612f1ce4a6c36', $color_c, $post_id );
				}
				//price
				if ($type_count) {
					update_field( 'field_612f1ff0ea686', $type_count, $post_id );
				}
				if ($car_count) {
					update_field( 'field_612f200dea687', $car_count, $post_id );
				}
				if ($people_count) {
					update_field( 'field_612f2027ea688', $people_count, $post_id );
				}
				if ($kid_count) {
					update_field( 'field_612f2038ea689', $kid_count, $post_id );
				}
				if ($type_count_p) {
					update_field( 'field_612f204cea68a', $type_count_p, $post_id );
				}
				if ($car_count_p) {
					update_field( 'field_612f2067ea68b', $car_count_p, $post_id );
				}
				if ($people_count_p) {
					update_field( 'field_612f207bea68c', $people_count_p, $post_id );
				}
				if ($kid_count_p) {
					update_field( 'field_612f209cea68d', $kid_count_p, $post_id );
				}
				if ($total_p) {
					update_field( 'field_612f20b0ea68e', $total_p, $post_id );
				}
				if ($vat_p) {
					update_field( 'field_612f20c1ea68f', $vat_p, $post_id );
				}
				if ($receipt_p) {
					update_field( 'field_612f20d8ea690', $receipt_p, $post_id );
				}
				if ($wht_p) {
					update_field( 'field_612f20e7ea691', $wht_p, $post_id );
				}
				if ($paid_p) {
					update_field( 'field_612f20f6ea692', $paid_p, $post_id );
				}
				if($wht_name){
					update_field( 'field_615ab6c7bf01f', $wht_name, $post_id );
				}
				if($wht_percent){
					update_field( 'field_615ab6c7bf058', $wht_percent, $post_id );
				}
					
			
			
					
				

					update_field( 'field_615afb8cf390c', $vat_percent, $post_id );
			

				//wp_signon is a wordpress function which authenticates a user. It accepts user info parameters as an array.
				if ( is_wp_error($post_id) ){
					// $data = array(
					// 	"loggedin"=> "false",
					// 	"message" => "มีความผิดพลาดกรุณาลองใหม่อีกครั้ง" ,
					// );
	
					// array_push($store_arr["results"], $data);
					// echo json_encode( $store_arr );
				} else {
	
					// $data = array(
					// 	"loggedin"=> "true",
					// 	"message" => "ส่งแบบฟอร์มสมัครกิจกรรมเรียบร้อย" ,
					// );					
					// array_push($store_arr["results"], $data);
					// echo json_encode( $store_arr );
					// echo $post_id;			
					$success = 'ลงทะเบียนเสร็จเรียบร้อย';
					?>
					  <script type="text/javascript">
						alert("<?php echo $success;?>");
						window.location ='/pdf/?bill=<?php echo $post_id;?>';
					  </script>
						<?php
				}

	endif;
}
add_action('init', 'sign_event');


function ajax_author_change(){
	global $wp_query;

	//In most cases it is already included on the page and this line can be removed
	wp_enqueue_script('jquery');

	//register our main script but do not enqueue it yet
	wp_register_script( 'author_change', get_stylesheet_directory_uri() . '/js/edit-author.js', array('jquery') );

	//now the most interesting part
	//we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
	//you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
	wp_localize_script( 'author_change', 'author_change_params',
	array( 
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'redirecturl' => home_url().'/author',
        'loadingmessage' => __('Sending user info, please wait...')
	) );

	 wp_enqueue_script( 'author_change' );
}
add_action('wp_enqueue_scripts', 'ajax_author_change');


function change_controller(){
	$store_arr["results"]=array();
	global $wpdb, $PasswordHash, $current_user, $user_ID;
	if(isset($_POST['checkms']) && $_POST['checkms'] == 'success') {
		$current_user = wp_get_current_user();
		$u_id = $current_user->ID;
		//We shall SQL escape all inputs		
		if($_POST['c-email']){
			$email = $_POST['c-email'];
		}
		
		$isg_contro = $_POST['isg_contro'];

		if($_POST['c-first_name']){
			$first_name = $_POST['c-first_name'];
		}
		if($_POST['c-last_name']){
			$last_name = $_POST['c-last_name'];
		}
		$position = $_POST['c-position'];
		$telephone_no = $_POST['c-telephone'];
		$ext = $_POST['c-ext'];
		$mobile_phone = $_POST['c-mobile'];

		if( $email == "" || $isg_contro == "" || $first_name == "" || $last_name == "" || $position == "" || $telephone_no == "" || $ext == "" || $mobile_phone == "") {
			$data = array(
			  "loggedin"=> "false",
			  "message" => "กรุณากรอกข้อมูลให้ครบถ้วน โปรดกรอกใหม่อีกครั้ง" ,
		  );
  
		  array_push($store_arr["results"], $data);
		  echo json_encode( $store_arr );
  
		} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  $data = array(
			  "loggedin"=> "false",
			  "message" => "อีเมลไม่ถูกต้อง โปรดกรอกใหม่อีกครั้ง" ,
		  );
  
		  array_push($store_arr["results"], $data);
		  echo json_encode( $store_arr );
		} else {

			$user_id = wp_update_user( array ( //default wordpress wp_users
				'ID' => $u_id,
				'first_name' => $first_name,
				'last_name' => $last_name,
				'user_email' => $email,
				)
				);

			if ($isg_contro) {
				update_field( 'field_60f84ef65b55a', $isg_contro, 'user_'.$u_id );
			}
			if ($position) {
				update_field( 'field_60f84faf7906a', $position, 'user_'.$u_id );
			}
			if ($telephone_no) {
				update_field( 'field_60f84fbf7906b', $telephone_no, 'user_'.$u_id );
			}
			if ($ext) {
				update_field( 'field_60f84fcf7906c', $ext, 'user_'.$u_id );
			}
			if ($mobile_phone) {
				update_field( 'field_60f84fd97906d', $mobile_phone, 'user_'.$u_id );
			}



			//wp_signon is a wordpress function which authenticates a user. It accepts user info parameters as an array.
			if ( is_wp_error($user_id) ){
				$data = array(
					"loggedin"=> "false",
					"message" => "มีความผิดพลาดกรุณาลองใหม่อีกครั้ง" ,
				);

				array_push($store_arr["results"], $data);
				echo json_encode( $store_arr );
			} else {
				$data = array(
					"loggedin"=> "true",
					"message" => "แก้ไขข้อมูลผู้ใช้เรียบร้อย" ,
				);

				array_push($store_arr["results"], $data);
				echo json_encode( $store_arr );
			}
		}
	}
	die();
}
// add_action('init', 'edit_author');
add_action('wp_ajax_author_change', 'change_controller'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_author_change', 'change_controller'); // wp_ajax_nopriv_{action}

