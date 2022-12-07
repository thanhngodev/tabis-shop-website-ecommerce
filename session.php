<?php 
    include("funtions/funtions.php");
    $db = mysqli_connect(host, username, password, database);
    $db->set_charset("utf8");
    session_start();
    
    if(isset($_SESSION['login_user'])){
        $user_check = $_SESSION['login_user'];
        $sql = "select username from khachhang where username='$user_check'";
        $ses_sql = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($ses_sql, 1);

        $login_session = $row['username'];

        $sqli = "select * from khachhang where username='$login_session'";
        $result = executeSingleResult($sqli);
        $khid = $result['MSKH'];
        $full_name = $result['HoTenKH'];
        $gender = $result['phai'];
        $birth = $result['ngaysinh'];
        $address = $result['DiaChi'];
        $phone = $result['SoDienThoai'];
        $mail = $result['Email'];
    }
    
?>