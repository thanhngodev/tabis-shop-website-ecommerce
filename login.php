
<?php
  include("./funtions/funtions.php");

  session_start();
  $username = "";
  $password    = "";
  $errors = array(); 

  // connect to the database
  $db = mysqli_connect(host, username, password, database);
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password1']);

    if(empty($username)){
      array_push($errors, "Tên đăng nhập không để trống !!!");
    }
    if(empty($password)){
      array_push($errors, "Mật khẩu không để trống !!!");
    }
    $password = md5($password);
    $query = "select * from khachhang where username='$username' and password='$password' LIMIT 1";
    $result = mysqli_query($db, $query);
    $count = mysqli_num_rows($result);
      if ($count == 1) {
        $_SESSION['login_user']=$username;
        header("location: index.php");
        
      } else{
        array_push($errors, "Sai tên tên đăng nhập và mật khẩu !!!");
      }
      mysqli_free_result($result);
  }
  
  
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
          <?php if (isset($_SESSION['success'])) : ?>
              <?php 
                  phpalert($_SESSION['success']);
              ?>
          <?php endif ?> 
          <!-- Icon -->
          <div class="fadeIn first">
            <i class="fas fa-fingerprint" style="font-size: 60px; margin: 10px 0;"></i>
            <h2>ĐĂNG NHẬP</h2>
          </div>

          <!-- Login Form -->
          <form action="login.php" method="post">
            <?php include('errors.php'); ?>
            <input type="text" class="fadeIn second" name="username" placeholder="Tên đăng nhập">
            <input type="password" class="fadeIn third" name="password1" placeholder="Mật khẩu">
            <input type="submit" class="btn btn-danger" name="login_user" value="Đăng nhập">
          </form>

          <!-- Remind Passowrd -->
          <div id="formFooter">
            Bạn chưa có tài khoản ? <a class="underlineHover" href="signup.php">Đăng ký</a>
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
