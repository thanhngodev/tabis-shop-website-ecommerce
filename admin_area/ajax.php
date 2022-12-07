<?php 
    include("session.php");
    include("../funtions/funtions.php");

    if(!empty($_POST)){
        if(isset($_POST['action'])){
            $action = $_POST['action'];
            switch ($action) {
                case 'delete':
                    if(isset($_POST['id'])){
                        $id = $_POST['id'];
                        $sql = "delete from hanghoa where MSHH =".$id;
                        execute($sql);
                    }
                    break;
                case 'delete category':
                    if(isset($_POST['id'])){
                        $id = $_POST['id'];
                        $sql = "delete from loaihanghoa where MaLoaiHang =".$id;
                        execute($sql);
                    }
                    break;
                case 'checkOld':
                    if(isset($_POST['password']) && isset($_POST['usrname'])){
                        $usrname = $_POST['usrname'];
                        $password = $_POST['password'];
                        $password = md5($password);

                        $db = mysqli_connect(host, username, password, database);

                        $sql = "select username from nhanvien where username='$usrname' and password='$password'";
                        $result = mysqli_query($db,$sql);
                        $count = mysqli_num_rows($result);


                        if($count == 1){
                            echo 1;
                        } else{
                            echo 0;
                        }
                    }
                    break;
                case 'makeNew':
                    if(isset($_POST['passwrd'])){
                        $password = $_POST['passwrd'];
                        $password = md5($password);
                        $sql = "UPDATE `nhanvien` SET `password` = '$password' WHERE username = '$login_session'";
                        execute($sql);
                        echo 1;
                    }
                    break;
            }
        }
    }
?>