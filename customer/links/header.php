
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabi's Shop</title>
    <link rel="stylesheet" href="../resourses/css/style.css">
    <link rel="stylesheet" href="../includes/bootstrap.css">
    
</head>
<body>
    <div class="main">
        <div class="header">
            <div class="align">
                <div class="header-display">
                    <div class="logo">
                        <img src="../images/logotabi's.png" alt="logo">
                    </div>
                    <div class="search">
                        <form action="#">
                        <div class="p-1 bg-light radius rounded-pill shadow-sm mb-4">
                            <div class="input-group">
                            <input type="search" placeholder="Tìm tên sản phẩm, danh mục, thương hiệu,..." aria-describedby="button-addon1" class="form-control border-0 bg-light">
                            <div class="input-group-append">
                                <button id="button-addon1" type="submit" class="btn btn-link text-primary"><i class="fa fa-search"></i></button>
                            </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="action">
                        <ul>
                            <li>
                                <div class="cart location" onclick="window.location.href='../cart.php'">
                                    <p><i class="fas fa-shopping-cart"></i> Giỏ hàng
                                    <?php
                                        $mh = session_id();
                                        include("../funtions/funtions.php");
                                        $get_total = "select count(MSHH) as total from giohang where MSGH='$mh'";
                                        $total = executeSingleResult($get_total);
                                        if($total['total']>0){
                                            echo '<div class="mess"><small>'.$total['total'].'</small></div>';
                                        }
                                    ?>
                                    </p>
                                </div>
                            </li>
                            
                            <li class="hv">
                                <div class="user">
                                    <?php if (isset($_SESSION['login_user'])) : ?>
                                        <div onclick="window.location.href='./my_account.php'">
                                            <p><i class="fas fa-user"></i> <?php echo $full_name; ?> </p>
                                            <div class="dropdown-us logined">
                                                <p>Đăng xuất tài khoản</p>
                                                <p class="btn btn-danger btn-block" style="width: 72%;height: 50%;margin-left: 24px;"> 
                                                    <a href="../logout.php" style="color: white; font-size: 13px;">
                                                        <i class="fas fa-sign-out-alt">
                                                            Đăng xuất
                                                        </i>
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    <?php else : ?>
                                        <p><i class="fas fa-user"></i> Đăng nhập</p>
                                        <div class="dropdown-us">
                                            <p>Chưa có tài khoản</p>
                                            <button class="btn btn-danger btn-block" onclick="window.location.href='../signup.php'">Đăng ký</button>
                                            <hr>
                                            <p>Đã có tài khoản</p>
                                            <button class="btn btn-info btn-block" onclick=" window.location.href='../login.php'">Đăng nhập</button>
                                        </div>
                                    <?php endif ?>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu_bar">
            <div class="category">
                <a href="#"><i class="fas fa-bars"></i></a>
                <div id="sidebar" class="slide_bar">
                    <ul id="cats">
                        <?php
                            getCats();
                        ?>
                    </ul>
                </div>
            </div>
            <div class="align">
                <ul id="menu">
                    <li class="home" id="home">
                        <a href="../index.php"> Trang chủ </a>
                    </li>
                    <li class="product" id="product">
                        <a href="../all_products.php"> Sản Phẩm </a>
                    </li>
                    <li class="account" id="account">
                        <a href="my_account.php"> Tài Khoản </a>
                    </li>
                    <li class="contact" id="contact">
                        <a href="../contact_us.php"> Liên hệ </a>
                    </li>
                </ul>
            </div>
        </div>