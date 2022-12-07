<?php
    include("session.php");
    include("layout/header.php");
    $msgh= session_id();
?>
<?php
    if(isset($_GET['action'])){
        $actions = $_GET['action'];
        switch ($actions) {
            // them vao gio hang
            case 'add':
                if(isset($_POST['index'])){
                    $id = $_POST['index'];
                }
                if(isset($_POST['quantity'])){
                    $quantt = $_POST['quantity'];
                }

                $db = mysqli_connect(host, username, password, database);
                $db->set_charset("utf8");
                $ms = "select * from giohang where MSHH=".$id;
                $result = mysqli_query($db, $ms);
                if(mysqli_num_rows($result)==1){
                    $row = mysqli_fetch_array($result, 1);
                    $add = $row['soluong'] + $quantt;
                    $sql = "UPDATE giohang SET soluong =".$add." WHERE MSHH=".$id." and MSGH='$msgh'";
                    execute($sql);
                } else{
                    $sql = "INSERT INTO giohang(MSGH,MSHH,soluong) VALUES('$msgh',$id,$quantt)";
                    execute($sql);
                }
                
                break;
            // xoa khoi gio hang
            case 'delete':
                if(isset($_GET['id'])){
                    $sql = "DELETE FROM giohang WHERE MSHH=".$_GET['id']." and MSGH='$msgh'";
                    execute($sql);
                }
                break;
            case 'update':
                if(isset($_POST['maso'])){
                    $id = $_POST['maso'];
                }
                if(isset($_POST['nb'])){
                    $quantity = $_POST['nb'];
                }
                $sql = "UPDATE giohang SET soluong=".$quantity." WHERE MSHH=".$id." and MSGH='$msgh'";
                // var_dump($sql);
                execute($sql);
                break;
        }
    }
    $tsl = "select sum(soluong) as tong from giohang where MSGH='$msgh'";
    $run = executeSingleResult($tsl);
    $size = $run['tong'];
?>

<div class="small-container align">
    <table>
        <tr>
            <th>Sản phẩm (<span><?=$size?></span>)</th>
            <th>Số Lượng</th>
            <th>Thành Tiền</th>
            <th></th>
        </tr>
        <?php
            
            $cart = "select * from giohang where MSGH='$msgh'";
            $result = executeResult($cart);
            if(sizeof($result)>0){
                $thanhtien1=0;
                foreach ($result as $value) {
                    $get_prod = "select * from hanghoa where MSHH=".$value['MSHH'];
                    $products = executeSingleResult($get_prod);
                    $sl = $value['soluong'];
                    $name = $products['TenHH'];
                    $picture = $products['Anh'];
                    $gia = $products['Gia'];
                        echo '
                            <tr>
                                <td>
                                    <div class="cart-info">
                                        <img src="admin_area/'.$picture.'">
                                        <div class="name">
                                            <p>'.$name.'</p>
                                            <small>Giá: '.number_format($gia, 0, ',', '.') . "đ".'</small><br>
                                            <a class="text-danger" href="cart.php?action=delete&id='.$value['MSHH'].'"><span class="delete">Xóa</span></a>
                                        </div>
                                    </div>
                                </td>
                                <form action="cart.php?action=update" method="post">
                                <td>
                                    <input type="number" name="nb" id="nb" value="'.$sl.'" min="1">
                                    <input type="text" name="maso" id="maso" value="'.$value['MSHH'].'" hidden>
                                </td>
                                <td>'.number_format($thanhtien=$gia*$sl, 0, ',', '.') . "đ".'</td>
                                
                                <td><button class="btn btn-warning" type="submit" name="ud">Cập nhật</button></td>
                                </form>
                            </tr>
                        ';
                        $thanhtien1 = $thanhtien1 + $thanhtien;
                } 
            }else{
                echo '
                <tr>
                    <td colspan="4">
                        <center style="height: 20rem;">
                            <img src="images/cart-empty.png" alt="" style="width: 10rem;">
                            <h4 class="text-muted">Không có sản phẩm nào trong giỏ hàng của bạn</h4>
                            <a href="all_products.php"><button class="btn btn-warning">Tiếp tục mua sắm</button></a>
                        </center>
                    </td>
                </tr>
                ';
            } 
        ?>
    </table>
    <div class="total-price">
    <?php if(sizeof($result)>0) :?>
        <table>
            <tr>
                <td>Tạm tính</td>
                <td><?=number_format($tamtinh=$thanhtien1, 0, ',', '.') . "đ"?></td>
            </tr>
            <tr>
                <td>Phí vận chuyển: </td>
                <td><?=number_format($ship = 40000, 0, ',', '.') . "đ"?></td>
            </tr>
            <tr>
                <td>Tổng</td>
                <td><?=number_format($tamtinh+$ship, 0, ',', '.') . "đ"?></td>
            </tr>
        </table>
    </div>
    <div class="commit">
        <form action="order.php" method="post">
            <input type="text" name="tamtinh" id="tamtinh" value="<?=$tamtinh?>" hidden>
            <button class="btn btn-commit" name="payment" type="submit">Tiến hành đặt hàng</button>
        </form>
    </div>
    <?php endif ?>
</div>
<script>
    window.onload = function(){
        $("#cart").addClass("l-active");
    }
</script>
<?php include("layout/footer.php");?>