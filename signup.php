<?php
    include("./funtions/server.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabi's Shop</title>
    <link rel="stylesheet" href="resourses/css/style.css">
    <link rel="stylesheet" href="includes/bootstrap.css">
    
</head>
<body>
  <div class="main">
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
        <i class="fas fa-lock" style="font-size: 60px; margin: 10px 0;"></i>
        <h2>ĐĂNG KÍ TÀI KHOẢN</h2>
    </div>

    <!-- Login Form -->
    <form action="signup.php" method="post">
      <?php include('errors.php'); ?>
      <input type="text" class="fadeIn third" name="username" placeholder="Tên đăng nhập">

      <input type="password" class="fadeIn third" name="password" placeholder="Mật khẩu">

      <input type="password" class="fadeIn third" name="repassword" placeholder="Nhập lại mật khẩu">

      <input type="text" class="fadeIn third" name="fullname" placeholder="Họ và tên">

      <input type="text" class="fadeIn third" name="address" placeholder="Địa chỉ">

      <input type="text" class="fadeIn third" name="gender" placeholder="Giới tính">

      <input type="text" class="fadeIn third" name="phone" placeholder="Số điện thoại">

      <input type="email" class="fadeIn third" name="mail" placeholder="Địa chỉ Email">
      
      <input type="submit" class="btn btn-danger" name="reg_user" value="Đăng kí">

    </form>
    
    <!-- Remind Passowrd -->
    <div id="formFooter">
        Bạn đã có tài khoản ? <a class="underlineHover" href="login.php">ĐĂNG NHẬP</a>
    </div>
  </div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://kit.fontawesome.com/c02b33a3c8.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    window.onload = function(){
        $("#account").addClass("l-active");
    }
</script>
<script src="resourses/js/scripts.js"></script>
</body>
</html> 
