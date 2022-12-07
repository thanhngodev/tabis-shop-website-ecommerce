<?php
    include("session.php");

    if(!isset($_SESSION['login_user'])){
        header("location: login.php");
        die();
    }
    $mgh = session_id();

    if(isset($khid)){
        $ud = "UPDATE giohang SET MSGH='$khid' WHERE MSGH='$mgh'";
        execute($ud);
        $mgh=$khid;
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
        <div class="header">
            <div class="align">
                <div class="header-display">
                    <div class="logo">
                        <img src="images/logotabi's.png" alt="logo">
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
                            <li class="hv">
                                <div class="user">
                                    <?php if (isset($_SESSION['login_user'])) : ?>
                                        <div onclick="window.location.href='./my_account.php'">
                                            <p><i class="fas fa-user"></i> <?php echo $full_name; ?> </p>
                                            <div class="dropdown-us logined">
                                                <p>Đăng xuất tài khoản</p>
                                                <p class="btn btn-danger btn-block" style="width: 72%;height: 50%;margin-left: 24px;"> 
                                                    <a href="index.php?logout='1'" style="color: white; font-size: 13px;">
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
                                            <button class="btn btn-danger btn-block" onclick="window.location.href='signup.php'">Đăng ký</button>
                                            <hr>
                                            <p>Đã có tài khoản</p>
                                            <button class="btn btn-info btn-block" onclick=" window.location.href='login.php'">Đăng nhập</button>
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
                        <a href="index.php"> Trang chủ </a>
                    </li>
                    <li class="product" id="product">
                        <a href="all_products.php"> Sản Phẩm </a>
                    </li>
                    <li class="account" id="account">
                        <a href="customer/my_account.php"> Tài Khoản </a>
                    </li>
                    <li class="contact" id="contact">
                        <a href="contact_us.php"> Liên hệ </a>
                    </li>
                </ul>
            </div>
        </div>


<?php
    $prices = "";
    
        if(isset($_POST['tamtinh'])){
            $prices = $_POST['tamtinh'] +40000;
        }
    
    $get_bullId = "select max(SoDonDH) as billId from dathang";
    $billId = executeSingleResult($get_bullId);
    $bid = $billId['billId']+1;
    if(isset($_POST['addBill'])){
        $pay_method = $_POST['addBill'];
        if(isset($_POST['price'])){
            $pri = $_POST['price'];
        }

        $sql = "INSERT INTO dathang(SoDonDH,MSKH,NgayDH,NgayGH,HTGH,TongTien,TrangThai) VALUES(".$bid.",".$khid.",CURDATE(),DATE_ADD(CURDATE(),INTERVAL 5 DAY),'$pay_method',$pri,'Mới')";
        // var_dump($sql);exit;
        execute($sql);
        $cart = "select * from giohang where MSGH='$mgh'";
        $result = executeResult($cart);
        $num = sizeof($result);
        foreach ($result as $value) {
            $mshh = $value['MSHH'];
            $get_price = "select Gia from hanghoa where MSHH=".$mshh;
            $price = executeSingleResult($get_price);
            $pri = $price['Gia'];
            $sl = $value['soluong'];
            $constraint_data = "select SoLuongHang from hanghoa where MSHH=".$mshh;
            $constraint = executeSingleResult($constraint_data);
            if($constraint['SoLuongHang']>$sl){
                $sql_detail = "INSERT INTO chitietdathang(SoDonDH,MSHH,SoLuong,GiaDatHang,GiamGia) VALUES($bid,$mshh,$sl,$pri,0)";
                // var_dump($sql_detail);exit;
                execute($sql_detail);
            } else{
                $del = "DELETE FROM dathang WHERE SoDonDH=".$bid;
                execute($del);
                echo '
                <script>
                    alert("Xin lỗi quý khách, số lượng của sản phẩm không còn đủ!");
                </script>
                ';
                break;
            }
            
        }
        // hủy giỏ hàng
        
        $del_cart_data = "DELETE FROM giohang WHERE MSGH='$mgh'";
        execute($del_cart_data);
        
        // thanh toán bằng vnpay
        if($_POST['addBill']=="vnpay"){
            echo "<script>window.location.href='vnpay_php/index.php?billId=$bid'</script>";
        } else{
            echo '<script>alert("Đặt hàng thành công");</script>';
            echo "<script>window.location.href='customer/order_ manage.php'</script>";
        }
        
    }
?>


        <div class="order_form" style="display: flex; width: 1200px; flex-wrap: wrap;">
            <div class="order_form_1">
                <div class="order_form_2">
                    <h3 class="title">1. Chọn hình thức giao hàng</h3>
                    <div class="order_form_3">
                        <div class="order_form_4">
                            <div class="sponsor-normal-order">
                                <div class="item-left">
                                    <ul class="products">
                                        <?php
                                            $sql = "select * from giohang where MSGH='$mgh'";
                                            $results = executeResult($sql);
                                            foreach ($results as $value) {
                                                $selec = "select * from hanghoa where MSHH=".$value['MSHH'];
                                                $result = executeSingleResult($selec);
                                                echo '
                                                <li class="product">
                                                    <div class="product__wrap">
                                                        <img src="admin_area/'.$result['Anh'].'" alt="" class="product__img">
                                                        <div class="product__inner">
                                                            <p class="product__name font-weight-bold">'.$result['TenHH'].'</p>
                                                            <p class="product__action">
                                                                <span class="product__qty">SL: '.$value['soluong'].'x </span>
                                                                <span class="product__pri text-danger">'.number_format($result['Gia'], 0, ',', '.') . "đ".'</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="includes-product"></div>
                                                </li>
                                                ';
                                            }
                                            $total = "select sum(soluong) as total from giohang where MSGH='$mgh'";
                                            $get_s = executeSingleResult($total);
                                            $size = $get_s['total'];
                                        ?>
                                        
                                    </ul>
                                </div>
                                <div class="method-inner">
                                    <div>
                                        <label class="method-inner_rabel">
                                            <input type="radio" data-view-id="checkout.shipping_method_select" data-view-index="3" readonly="" name="shipping-methods" value="3" checked="">
                                            <span class="radio-fake"></span>
                                            <span class="rabel">
                                                <div class="label-no-shippments">
                                                    <div>
                                                    <img class="method-icon" width="50" src="./images/giaohangtietkiem.svg" alt="cod">
                                                        <span class="method-name">
                                                            <span> Giao hàng tiết kiệm</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </span>
                                        </label>
                                    </div> 

                                    <div>
                                        <label class="method-inner_rabel">
                                            <input type="radio" data-view-id="checkout.shipping_method_select" data-view-index="3" readonly="" name="shipping-methods" value="3" checked="">
                                            <span class="radio-fake"></span>
                                            <span class="rabel">
                                                <div class="label-no-shippments">
                                                    <div>
                                                        <img class="method-icon" width="50" src="./images/giaohangnhanh.svg" alt="cod">
                                                        <span class="method-name">
                                                            <span> Giao hàng nhanh</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </span>
                                        </label>
                                    </div> 

                                    <div>
                                        <label class="method-inner_rabel">
                                            <input type="radio" data-view-id="checkout.shipping_method_select" data-view-index="3" readonly="" name="shipping-methods" value="3" checked="">
                                            <span class="radio-fake"></span>
                                            <span class="rabel">
                                                <div class="label-no-shippments">
                                                    <div>
                                                        <img class="method-icon" width="50" src="./images/jt.svg" alt="cod">
                                                        <span class="method-name">
                                                            <span> J&T Express</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </span>
                                        </label>
                                    </div> 

                                    <div>
                                        <label class="method-inner_rabel">
                                            <input type="radio" data-view-id="checkout.shipping_method_select" data-view-index="3" readonly="" name="shipping-methods" value="3" checked="">
                                            <span class="radio-fake"></span>
                                            <span class="rabel">
                                                <div class="label-no-shippments">
                                                    <div>
                                                        <img class="method-icon" width="50" src="./images/viettelpost.svg" alt="cod">
                                                        <span class="method-name">
                                                            <span> viettelpost </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </span>
                                        </label>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="order_form_2">
                    <h3 class="title">2. Chọn hình thức thanh toán</h3>
                    <div class="order_form_3-1">
                        <ul class="list">
                            <li class="order_form-li">
                                <label class="method-inner_rabel">
                                    <input type="radio" data-view-id="checkout.payment_method_select" data-view-index="cod" readonly="" name="payment-methods" value="cod" checked="">
                                    <span class="radio-fake"></span>
                                    <span class="rabel">
                                        <div class="order_form-pay">
                                            <img class="method-icon" width="50" src="./images/icon_payment.svg" alt="cod">
                                            <div class="method-content">
                                                <div class="method-content__name">
                                                    <span>Thanh toán tiền mặt khi nhận hàng</span>
                                                </div>
                                            </div>
                                        </div>
                                    </span>
                                </label>
                            </li>
                            <li class="order_form-li">
                                <label class="method-inner_rabel">
                                    <input type="radio" data-view-id="checkout.payment_method_select" data-view-index="vnpay" readonly="" name="payment-methods" value="vnpay">
                                    <span class="radio-fake"></span>
                                    <span class="rabel">
                                        <div class="order_form-pay">
                                            <img class="method-icon" width="100" src="../Tabi's-1.0/images/vnpay.svg" alt="vnpay">
                                            <div class="method-content">
                                                <div class="method-content__name">
                                                    <span>Thanh toán bằng VNpay</span>
                                                </div>
                                            </div>
                                        </div>
                                    </span>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="order-button">


                    <form action="order.php" method="post">
                        <input type="text" name="price" id="price" value="<?=$prices?>" hidden>
                        <button id="pay" data-view-id="checkout.confirmation_navigation_proceed" name="addBill">ĐẶT MUA</button>
                    </form>
                    
                    <p>(Xin vui lòng kiểm tra lại đơn hàng trước khi Đặt Mua)</p>
                </div>
            </div>
            <div class=" confirm_order">
                <div class="confirm_order_1">
                    <div class="title">
                        <span>Địa chỉ giao hàng</span>
                        <a data-view-id="checkout.confirmation_shipping_location.change" href="/checkout/shipping">Sửa</a>
                    </div>
                    <div class="address">
                        <span class="name"><?=$full_name?></span>
                        <span class="street"><?=$address?></span>
                        <span class="phone">Điện thoại: <?=$phone?></span>
                    </div>
                </div>
                <div class=" confirm_order_2">
                    <div class="title">
                        <div class="sub-title">
                            <b>Đơn hàng</b>
                            <p><?=$size?> sản phẩm. 
                                <span class="action "><a href="cart.php">Xem thông tin</a></span>
                            </p>
                        </div>
                        <a data-view-id="checkout.confirmation_cart_order.change" href="cart.php">Sửa</a>
                    </div>
                    <div class="cart">
                        <div class="product ">
                            <div class=" confirm_order_3">
                                <div class="info">
                                    <strong class="qty">1 x</strong>
                                    <a data-view-id="checkout.confirmation_cart_order.product" data-view-index="5d2be823-b951-11eb-8d62-c265d7378e9b" href="/product-p54364183.html?spid=58478355" target="_blank" class="product-name">Rubik 3x3x3 </a>
                                    <span class="seller-name">Cung cấp bởi <strong>Hoành Gia store</strong></span>
                                </div>
                                <div class="price">47.500 ₫</div>
                            </div>
                        </div>
                        <div class="price-summary">
                            <div class="confirm_order_4">
                                <div class="inner">
                                    <div class="name">Tạm tính</div>
                                    <div class="value"><?=number_format($prices, 0, ',', '.') . "đ"?></div>
                                </div>
                            </div>
                            <div class=" confirm_order_4">
                                <div class="inner">
                                    <div class="name">Phí vận chuyển</div>
                                    <div class="value">40.000đ</div>
                                </div>
                            </div>
                            <div class="total">
                                <div class="name">Thành tiền:</div>
                                <div class="value"><?= number_format($prices + 40000, 0, ',', '.') . "đ"?>
                                
                                    <i>(Đã bao gồm VAT nếu có)</i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php include("./layout/footer.php");?>