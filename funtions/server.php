
<!-- ----------------------------------------- begin signup --------------------------------------------- -->

<?php
    include("./funtions/funtions.php");
    $username = "";
    $email    = "";
    $errors = array();
    

// connect to the database
    $db = mysqli_connect(host, username, password, database);
    $db->set_charset("utf8");
    session_start();

// REGISTER USER
    if (isset($_POST['reg_user'])) {
    // receive all input values from the form
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $email = mysqli_real_escape_string($db, $_POST['mail']);
        $password_1 = mysqli_real_escape_string($db, $_POST['password']);
        $password_2 = mysqli_real_escape_string($db, $_POST['repassword']);
        $name = mysqli_real_escape_string($db, $_POST['fullname']);
        $gender = mysqli_real_escape_string($db, $_POST['gender']);
        $address = mysqli_real_escape_string($db, $_POST['address']);
        $phone = mysqli_real_escape_string($db, $_POST['phone']);

        // form validation: ensure that the form is correctly filled ...
        // by adding (array_push()) corresponding error unto $errors array
        if (empty($username)) { array_push($errors, "Hãy nhập tên đăng nhập !!!"); }
        if (empty($email)) { array_push($errors, "Hãy nhập email !!!"); }
        if (empty($password_1)) { array_push($errors, "Hãy nhập mật khẩu !!!"); }
        if ($password_1 != $password_2) {
            array_push($errors, "Nhập lại mật khẩu !!!");
        }
        if (empty($name)) { array_push($errors, "Hãy nhập họ và tên !!!"); }
        if (empty($address)) { array_push($errors, "Hãy nhập địa chỉ !!!"); }
        if (empty($phone)) { array_push($errors, "Hãy nhập số điện thoại !!!"); }

        // first check the database to make sure 
        // a user does not already exist with the same username and/or email
        $user_check_query = "select * from khachhang WHERE username='$username' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);
        
        if ($user) { // if user exists
            if ($user['username'] === $username) {
            array_push($errors, "Tên đăng nhập đã tồn tại");
            }
        }

        // Finally, register user if there are no errors in the form
        //encrypt the password before saving in the database
        if (count($errors) == 0) {
            $password = md5($password_1);
            $query = "INSERT INTO `khachhang` (`MSKH`, `HoTenKH`, `phai`, `DiaChi`, `SoDienThoai`, `Email`, `username`, `password`)  VALUES (NULL, '$name', '$gender', '$address', '$phone', '$email', '$username', '$password')";
            mysqli_query($db, $query);
            $_SESSION['username'] = $username;
            echo '<script>alert("Đăng ký thành công");</script>';
            echo '<script>window.location.href="login.php"</script>';
        }
    }
//  ----------------------------------------- end signup --------------------------------------------- 

?>

