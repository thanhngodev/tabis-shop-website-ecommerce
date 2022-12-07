<?php 
    include("../funtions/funtions.php");
    $db = mysqli_connect(host, username, password, database);
    $db->set_charset("utf8");
    session_start();

    $user_check = $_SESSION['login_users'];
    $sql = "select username from nhanvien where username='$user_check'";
    $ses_sql = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($ses_sql, 1);

    $login_session = $row['username'];

    $sqli = "select * from nhanvien where username='$user_check'";
    $row = executeSingleResult($sqli);

    $nvid = $row['MSNV'];
    $full_name = $row['HoTenNV'];
    $rule = $row['ChucVu'];
    $address = $row['DiaChi'];
    $phone = $row['SoDienThoai'];
    if(!isset($_SESSION['login_users'])){
        header("location: login.php");
        die();
    }
?>