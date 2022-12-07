<?php include("../funtions/funtions.php");?>
    <?php
    session_start();
    $username = "";
    $password    = "";
    $errors = array(); 

    // connect to the database
    $db = mysqli_connect(host, username, password, database);
    
    // session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);

        $password = md5($password);
        $sql = "select MSNV from nhanvien where username='$username' and password='$password'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result, 1);
        $count = mysqli_num_rows($result);

        if($count == 1){
            // session_register("$username");
            $_SESSION['login_users'] = $username;
            header("location: index.php");
        } else{
            array_push($errors, "Tên đăng nhập hoặc mật khẩu không đúng!");
        }
    }
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="includes/bootstrap.css">
    <title>Login</title>
</head>
<body>
    <section class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-4">
                <form action="login.php" method="post" class="form-container"> <!--form begin-->
                    <h1>ĐĂNG NHẬP</h1>
                    <div class="form-group"> <!-- input user name group -->
                        <label for="unameInput">Tên tài khoản</label>
                        <input type="text" name="username" id="unameInput" class="form-control" aria-describedby="unameHelp" 
                        placeholder="Nhập tên tài khoản">
                        <small id="unameHelp" class="form-text text-muted">Không chia sẽ thông tin tài khoản cho bất cứ ai.</small>
                    </div>
                    <div class="form-group"> <!-- input password group -->
                        <label for="passInput">Mật khẩu</label>
                        <input type="password" name="password" id="passInput" class="form-control" aria-describedby="unameHelp" 
                        placeholder="Nhập mật khẩu"> <br>
                        <small id="unameHelp" class="form-text text-muted">
                        <?php  if (count($errors) > 0) : ?>
                        <?php foreach ($errors as $error) : ?>
                        <?php echo $error ?>
                        <?php endforeach ?>
                        <?php  endif ?>
                        </small>
                    </div>
                    <div class="form-group form-check"> <!-- input check remember group-->
                    <input type="checkbox" name="checkbox" id="check" class="form-check-input">
                    <label for="check" class="form-check-label">Nhớ tài khoản</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Đăng nhập</button>
                </form> <!--form end-->
            </div>
        </div>
    </section>
    
    <script src="https://kit.fontawesome.com/c02b33a3c8.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="./includes/jquery-3.6.0.slim.min.js"></script>
</body>
</html>