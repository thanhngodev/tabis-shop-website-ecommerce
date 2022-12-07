<?php 
    include("session.php");
    include("layout/header.php");
?>

<?php include("layout/navbar.php");?>

<?php
    if(isset($_GET['bid'])){
        $bid = $_GET['bid'];
        $sql = "select * from khachhang k, dathang d
        where k.MSKH = d.MSKH and d.SoDonDH=".$bid;
        $result = executeSingleResult($sql);
        $cus_id = $result['MSKH'];
        $cus_name = $result['HoTenKH'];
        $cus_gen = $result['phai'];
        $cus_addr = $result['DiaChi'];
        $cus_phone = $result['SoDienThoai'];
        $cus_email = $result['Email'];
    }

    if(isset($_POST['success'])){
        $ssid = $_POST['success'];
        $exec = "UPDATE dathang SET MSNV=$nvid WHERE SoDonDH=".$ssid;
        $exec1 ="UPDATE dathang SET TrangThai='Đang xử lý' WHERE SoDonDH=".$ssid;
        execute($exec);
        execute($exec1);
        echo '
        <script>window.location.href="bill.php"</script>
        ';
    }
?>
<!-- Page content holder -->
<div class="page-content p-5" id="content">
  <!-- Toggle button -->
  <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>

  <!-- Content -->
  <div class="separator"></div>
  <center>
    <div class="bill-confirm">
        <div class="user-info">
            <h4>Thông tin khách hàng(`<?=$bid?>`)</h4>
            <table>
                <tr>
                    <th>Tên khách hàng</th>
                    <td><?=$cus_name?></td>
                </tr>
                <tr>
                    <th>Giới tính</th>
                    <td><?=$cus_gen?></td>
                </tr>
                <tr>
                    <th>Địa chỉ</th>
                    <td><?=$cus_addr?></td>
                </tr>
                <tr>
                    <th>Số ĐT</th>
                    <td><?=$cus_phone?></td>
                </tr>
                <tr>
                    <th>email</th>
                    <td><?=$cus_email?></td>
                </tr>
            </table>
        </div>
        <div class="bill-info">
            <h4>Thông tin đơn đặt hàng</h4>
            <table>
                <tr>
                    <th class="large">Tên sản phẩm</th>
                    <th style="min-width: 8rem;">Số lượng</th>
                    <th>Ngày đặt</th>
                    <th>Ngày giao</th>
                    <th>Thành tiền</th>
                </tr>
                <?php
                    $sql = "SELECT h.TenHH,c.SoLuong,d.NgayDH,d.NgayGH,c.GiaDatHang
                    FROM chitietdathang c, dathang d, hanghoa h 
                    WHERE c.SoDonDH = d.SoDonDH 
                    and c.MSHH=h.MSHH
                    AND d.SoDonDH = ".$bid;
                    $result1 = executeResult($sql);
                    foreach ($result1 as $value) {
                        echo '
                        <tr>
                            <td>'.$value["TenHH"].'</td>
                            <td style="min-width: 8rem;" align="center">'.$value["SoLuong"].'</td>
                            <td>'.$value["NgayDH"].'</td>
                            <td>'.$value["NgayGH"].'</td>
                            <td>'.number_format($value['GiaDatHang'], 0, ',', '.') . "đ".'</td>
                        </tr>
                        ';
                    }
                    $total_data = "select TongTien from dathang where SoDonDH=".$bid;
                    $total = executeSingleResult($total_data);
                    echo '<tr><td colspan="4" style="font-size: 1.3rem;line-height: 4rem;">Tổng Tiền: <b class="text-danger">'.number_format($total["TongTien"], 0, ',', '.') . "đ".'</b></td></tr>';
                ?>
                </table>
        </div>

        <div class="success">
            <?php
            
            ?>
            <?php if(isset($_GET['action'])){
                echo '
                <form action="detail_bill.php" method="post">
                    <a href="bill.php" class="btn btn-light">Quay về</a>
                    <button type="submit" class="btn btn-success" value="'.$bid.'" name="success">Xác nhận</button>
                </form>';
            }
            
            else {
                $previous = "javascript:history.go(-1)";
                if(isset($_SERVER['HTTP_REFERER'])) {
                    $previous = $_SERVER['HTTP_REFERER'];
                }
                echo '<a href="'.$previous.'"><button class="btn btn-light">Quay về</button></a>';
            }
            ?>
            
        </div>
    </div>
  </center>
  <!-- End Content -->
</div>
<?php include("layout/footer.php");?>