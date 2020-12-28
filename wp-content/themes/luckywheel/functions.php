<?php

define('THEME_URL', get_stylesheet_directory());
define('CORE', THEME_URL . '/core');
/**
  @ Load file /core/init.php
  @ Đây là file cấu hình ban đầu của theme mà sẽ không nên được thay đổi sau này.
 **/

require_once(CORE . '/init.php');

/**
 * Nhúng tập tin /inc/init.php vào để load một số chức năng trong website
 */
require dirname(__FILE__) . '/inc/init.php';

if (!function_exists('render_segement')) {
  function render_segement($giai_thuong)
  { 
    ?>
    {
    'fillStyle': '<?php echo get_post_meta($giai_thuong->ID, 'fillStyle', true); ?>',
    'text': '<?php echo get_the_title($giai_thuong->ID) ?>',
    'textFillStyle': '<?php echo get_post_meta($giai_thuong->ID, 'textFillStyle', true); ?>',
    },

<?php }
}
if (!function_exists('phone_number')) {
    function phone_number($thong_tin)
    { 
    
     echo get_post_meta($thong_tin->ID, 'phone-number', true);
    
       
    }
  }

add_action('wp_ajax_cvf_send_message', array('CVF_Posts', 'cvf_send_message'));
add_action('wp_ajax_nopriv_cvf_send_message', array('CVF_Posts', 'cvf_send_message'));

function SaveThongTin()
{
    $result = "error";
    // $to = get_option('admin_email');

    $id = wp_insert_post(array(
        'post_title' => $_POST['title'],
        'post_type' => 'thong_tin',
        'post_status' => 'private',
        'meta_input' => array(
            'name' => $_POST['name'],
            'phone-number' => $_POST['phone-number'],
        )
    ));
    // Gửi mail
    ob_start();
    // echo '
    //     <h2>' . $_POST['title'] . ':</h2>
    //     <br />
    //     Khách hàng: <b>' . $_POST['name'] . '</b>
    //     <br />
    //     Số điện thoại: <b>' . $_POST['phone'] . '</b>
    //     <br />
    //     Email: <b>' . $_POST['email'] . '</b>
    //     <br />
    //     Xin cam on
    //     <p><a href = "' . home_url() . '">www.abogovillas.vn</a></p>';
    // $message = ob_get_contents();
    // ob_end_clean();
    // $mail = wp_mail($to, $subject, $message, $headers);
    // if ($mail) {
    //     $result = "success";
    // }
    $result = "success";

    echo $result;
}
class CVF_Posts
{
    public static function cvf_send_message()
    {
       
        if ($_POST['type'] == 0) {
          SaveThongTin();
        }

        exit();
    }


}