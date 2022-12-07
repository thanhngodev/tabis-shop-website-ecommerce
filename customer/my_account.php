<?php
    include("../session.php");
    
    if(!isset($_SESSION['login_user'])){
        header("location: ../login.php");
        die();
    }
    if(isset($_POST['update'])){
        header("refresh:0;");
    }
    include("links/header.php");
?>
    <div class="content_1">
        <div class="sidebar">
            <?php include("links/sidebar.php"); ?>
        </div>
        <div class="infor_account"> 
        <?php
            if(isset($_POST['update'])){
                if(isset($_POST['fullName'])){
                    $fname = $_POST['fullName'];
                }
                if(isset($_POST['phoneNumber'])){
                    $phone_num = $_POST['phoneNumber'];
                }
                if(isset($_POST['Email'])){
                    $email = $_POST['Email'];
                }
                if(isset($_POST['gender'])){
                    $gen = $_POST['gender'];
                }
                if(isset($_POST['birth1'])){
                    $rawdate = htmlentities($_POST['birth1']);
                    $birday = date('Y-m-d', strtotime($rawdate));
                }
                $sql = "UPDATE khachhang SET HoTenKH='$fname',
                    phai='$gen',
                    ngaysinh='$birday',
                    SoDienThoai='$phone_num',
                    Email='$email' WHERE username='$login_session'";
        
                // echo $sql;
                execute($sql);
            }   
        ?>
        <?php include("./infor_account.php"); ?>
            
        </div>
    </div>
    
    
<script>
    window.onload = function(){
        $("#account").addClass("l-active");
    }
</script>
<?php include("links/footer.php");?>
