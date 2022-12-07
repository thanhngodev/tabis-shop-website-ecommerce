<?php
$to = 'thanhngoangiang@gmail.com';
$subject = 'Khách hàng phản hồi';
$from = $_POST['mail'];

$username = $_POST['login_session'];

$bophan = $_POST['concerned_department'];
$vande = $_POST['email_title'];
$noidung = $_POST['visitor_message'];

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();

$message = '<html><body>';
$message .= '<h1 style="color:#f40;">'.$vande.'</h1>';
$message .= '<p style="color:#080;font-size:18px;">'.$noidung.'</p>';
$message .= '</body></html>';

if(mail($to, $subject, $message, $headers)){
    echo 'Chúc mừng. Email của bạn được gửi thành công.';
} else{
    echo 'Không thể gửi Email. Vui lòng thử lại.';
}
?>