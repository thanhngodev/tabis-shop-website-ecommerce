<?php
    include("session.php");
    
?>


<?php
    if(isset($_POST['update'])){
        if(isset($_POST['full-name'])){
            $nfull_name = $_POST['full-name'];
        }
        if(isset($_POST['address'])){
            $naddress = $_POST['address'];
        }
        if(isset($_POST['phone'])){
            $nphone = $_POST['phone'];
        }

        $let_update = "UPDATE nhanvien SET HoTenNV='$nfull_name', DiaChi='$naddress', SoDienThoai='$nphone' 
        WHERE MSNV=".$nvid;
        execute($let_update);
        header("refresh:0;");
    }
    include("layout/header.php");
    include("layout/navbar.php");
?>

<!-- Page content holder -->
<div class="page-content p-3" id="content">
    <!-- Toggle button -->
    <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>

    <!-- Content -->
    <div class="separator"></div>
    <div class="outer">
        <div class="left">
            <img src="images/avt1.png" alt="">
        </div>
        <div class="right">
            <form action="account.php" method="post">
                <table>
                    <tr>
                        <td><label for="full-name">Họ và tên</label></td>
                        <td><input type="text" name="full-name" id="full-name" readonly value="<?=$full_name?>"></td>
                        <td><i class="fas fa-edit" onclick="edit('full-name');"></i></td>
                    </tr>
                    <tr>
                        <td><label for="address">Địa chỉ</label></td>
                        <td><input type="text" name="address" id="address" readonly value="<?=$address?>"></td>
                        <td><i class="fas fa-edit" onclick="edit('address');"></td>
                    </tr>
                    <tr>
                        <td><label for="phone">Số điện thoại</label></td>
                        <td><input type="tel" name="phone" id="phone" value="<?=$phone?>" readonly></td>
                        <td><i class="fas fa-edit" onclick="edit('phone');"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><button type="submit" name="update" class="btn btn-primary" disabled>Lưu</button></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <div class="more">
        <button class="btn btn-light" onclick="changePass();">Đổi mật khẩu</button>
            <?php 
                if(isset($_GET['state'])){
                    echo '
                    <div class="center">
                    <div class="second">
                        <div>
                            <table>
                                <tr>
                                    <td><label for="new-pass">Mật khẩu mới</label></td>
                                    <td><input type="password" name="new-pass" id="new-pass"></td>
                                </tr>
                                <tr>
                                    <td><label for="check">Xác nhận mật khẩu</label></td>
                                    <td><input type="password" name="check" id="check"></td>
                                </tr>
                            </table>
                            <small id="validate1" class="form-text text-muted"></small>
                            <button name="new" class="btn btn-primary" onclick="makeNew();">Xác nhận</button>
                        </div>
                    </div>
                    </div>
                    ';
                } else{
                    echo '
                    <div class="center none">
                    <div class="first">
                        <div>
                            <input type="text" name="usr" id="usr" class="none" value="'.$login_session.'">
                            <label for="pass">Nhập mật khẩu cũ</label>
                            <input type="password" name="pass" id="pass"><br>
                            <small id="validate" class="form-text text-muted"></small>
                            <button name="old" class="btn btn-primary" onclick="checkOld();">Xác nhận</button>
                        </div>
                    </div>
                    </div>
                    ';
                }
            ?>
    </div>
</div>

<?php include("layout/footer.php");?>