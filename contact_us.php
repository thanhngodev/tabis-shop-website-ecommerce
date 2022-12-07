<?php
    include("session.php");
    include("funtions/funtions.php");
    include("layout/header.php");
?>
<style>
            body{
                font-family: arial;
            }
            .container{
                width: 800px;
                margin: 0 auto;
            }
            #send-email-form label {
                width: 150px;
                display: inline-block;
            }
            #send-email-form input {
                margin-bottom: 10px;
                padding: 0.5rem;
                border: none;
            }
            #send-email-form textarea {
                width: 500px;
                height: 200px;
            }
            #send-email-form input[type=submit] {
                margin-top: 35px;
                height: 32px;
                display: flex;
                justify-content: center;
                align-items: center;
            }
        </style>
<?php 
    use phpmailer\phpmailer\PHPMailer;
    use phpmailer\phpmailer\Exception;

    if (isset($_GET['action']) && $_GET['action'] == "send") {
        if (empty($_POST['email'])) { 
            $error = "Bạn phải nhập địa chỉ email";
        } elseif (!empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error = "Bạn phải nhập email đúng định dạng";
        } elseif (empty($_POST['content'])) {
            $error = "Bạn phải nhập nội dung";
        }
        if (!isset($error)) {
            include 'library.php'; 
            require 'vendors/autoload.php';
            $mail = new PHPMailer(true);
            try {
                $mail->CharSet = "UTF-8";
                $mail->SMTPDebug = 1; 
                $mail->isSMTP();        
                $mail->Host = SMTP_HOST;  
                $mail->SMTPAuth = true;   
                $mail->Username = SMTP_UNAME;     
                $mail->Password = SMTP_PWORD;        
                $mail->SMTPSecure = 'ssl';  
                $mail->setFrom(SMTP_UNAME, "Tên người gửi");
                $mail->addAddress($_POST['email'], 'Tên người nhận');   
                $mail->addReplyTo(SMTP_UNAME, 'Tên người trả lời');

                $mail->isHTML(true);                          
                $mail->Subject = $_POST['title'];
                $mail->Body = $_POST['content'];
                $mail->AltBody = $_POST['content']; 
                $result = $mail->send();
                if (!$result) {
                    $error = "Có lỗi xảy ra trong quá trình gửi mail";
                }
            } catch (Exception $e) {
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            }
        }
?>
   <div class = "container">
        <div class = "error"><?= isset($error) ? $error : "Gửi email thành công" ?></div>
        <a href ="./contact_us.php">Quay lại form gửi mail</a>
    </div>
<?php } else { ?>
            <div class="container">
                <h3>Form gửi mail</h3>
                <form id="send-email-form" method="POST" action="?action=send">
                    <label>Gửi đến email: </label>
                    <input type="text" name="email" value="" /><br/>
                    <label>Tiêu đề: </label>
                    <input type="text" name="title" value="" /><br/>
                    <label>Nội dung: </label>
                    <textarea name="content"></textarea><br/>
                    <input class="btn btn-primary" type="submit" value="Send Email" />
                </form>
            </div>
<?php } ?>

<script>
        window.onload = function(){
            $("#contact").addClass("l-active");
        }
    </script>
<?php include("layout/footer.php");?>