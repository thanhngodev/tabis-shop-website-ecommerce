<?php
    // include("../funtions/funtions.php"); 
    include("../session.php");
    
?>
<?php
    $msg="";
    if(isset($_POST['change'])){
        if(isset($_POST['oldPassword'])){
            $check_old = $_POST['oldPassword'];
            $check_old = md5($check_old);
            $db = mysqli_connect(host, username, password, database);
            $check = "select MSKH from khachhang where username='$login_session' and password='$check_old'";
            $result = mysqli_query($db, $check);
            $count = mysqli_num_rows($result);
            if($count==1){
                if(isset($_POST['newpassword'])&&$_POST['newpassword']!=""){
                    $new = $_POST['newpassword'];
                    $new = md5($new);
                    if(isset($_POST['passwordConfirm'])&&$_POST['passwordConfirm']!=""&&$_POST['passwordConfirm']==$_POST['newpassword']){
                        $query = "UPDATE `khachhang` SET `password`= '$new' WHERE username ='$login_session'";
                        // $msg = $query;
                        execute($query);
                        session_destroy();
                        header('location: ../login.php');
                    }else {
                        $msg="Xác nhận mật khẩu không đúng";
                    }
                } else {
                    $msg="Mật khẩu trống";
                }
            } else {
                $msg="Mật khẩu cũ không đúng"; 
            }
        }
    }
    include("links/header.php");
?>
<div class="content_1">
        <div class="sidebar">
            <?php include("links/sidebar.php"); ?>
        </div>
        <div class="infor_ac">
            <div class="info_ac">
                <h3 class="info_title">Thay đổi mật khẩu</h3>
                <div class="info_body">
                    <form action="change_password.php" method="post">
                        <div class="form-control">
                            <label class="input-a" id="abc">Mật khẩu cũ</label>
                            <div>
                                <input type="password" name="oldPassword" placeholder="Nhập mật khẩu cũ" value="">
                            </div>
                        </div>
                        <div class="form-control">
                            <label class="input-a">Mật khẩu mới</label>
                            <div>
                                <input type="password" name="newpassword" placeholder="Nhập mật khẩu mới" value="">
                            </div>
                        </div>
                        <div class="form-control">
                            <label class="input-a">Nhập lại</label>
                            <div>
                                <input type="password" name="passwordConfirm" placeholder="Nhập lại mật khẩu mới" value="">
                            </div>
                        </div>
                        <div class="form-control">
                            <label class="input-a">&nbsp;&nbsp;</label>
                            <button type="submit" class="btn-submit" name="change">Cập nhật</button>
                        </div>
                    </form>
                    <span class="error text-danger"><?=$msg?></span>
                </div>
            </div>
        </div>


<script>
    window.onload = function(){
        $("#account").addClass("l-active");
    }
</script>
<?php include("links/footer.php");?>