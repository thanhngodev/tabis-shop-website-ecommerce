<?php 
    include("session.php");
    include("layout/header.php");
?>


<?php include("layout/navbar.php");?>

<?php
    $time = "select SoDonDH,NgayGH from dathang";
    $re = executeResult($time);
    foreach ($re as $value) {
        $today = date("Y-m-d");
        $daytra = $value['NgayGH'];
        if(strtotime($daytra)<=strtotime($today)){
            $up_state = "UPDATE dathang SET TrangThai='Giao hàng' WHERE SoDonDH=".$value['SoDonDH'];
            execute($up_state);
        }
    }
?>
<!-- Page content holder -->
<div class="page-content p-5" id="content">
  <!-- Toggle button -->
  <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>

  <!-- Content -->
  <div class="separator"></div>
  <center>
    <div class="bill">
    <div class="new">
        <h3>Đơn hàng chờ xác nhận</h3>
        <table border="1">
            <tr>
                <th>Mã số đơn hàng</th>
                <th>Khách hàng</th>
                <th>Ngày DH</th>
                <th>Thanh Toán</th>
                <th>Tổng Tiền</th>
                <th>Trạng Thái</th>
                <th></th>
            </tr>
            <?php
                $sql = "select * from dathang d, khachhang k where d.MSKH=k.MSKH and TrangThai='Mới'";
                $result = executeResult($sql);
                if(count($result)>0){
                    foreach ($result as  $value) {
                        echo '
                        <tr>
                            <td>'.$value["SoDonDH"].'</td>
                            <td>'.$value["HoTenKH"].'</td>
                            <td>'.$value["NgayDH"].'</td>
                            <td>'.$value["HTGH"].'</td>
                            <td>'.number_format($value["TongTien"], 0, ',', '.') . "đ".'</td>
                            <td>'.$value["TrangThai"].'</td>
                            <td><a href="detail_bill.php?action=sucess&bid='.$value["SoDonDH"].'"><button class="btn btn-success">Xác nhận</button></a></td>
                        </tr>
                        ';
                    }
                } else{
                    echo '
                    <tr>
                        <td class="blank text-danger" colspan="7" align="center">Không có đơn hàng nào</td>
                    </tr>
                    ';
                }
                
            ?>
        </table>
    </div>

    <div class="processing">
    <h3>Đơn hàng đang xử lý</h3>
        <table border="1">
            <tr>
                <th>Mã số đơn hàng</th>
                <th>Khách hàng</th>
                <th>Nhân viên</th>
                <th>Ngày Đặt</th>
                <th>Thanh Toán</th>
                <th>Tổng Tiền</th>
                <th>Trạng Thái</th>
                <th></th>
            </tr>
            <?php
                $sql1 = "select * from dathang d, khachhang k, nhanvien n where n.MSNV=d.MSNV and d.MSKH=k.MSKH and TrangThai='Đang xử lý'";
                
                $result = executeResult($sql1);
                if(count($result)>0){
                    foreach ($result as  $value) {
                        echo '
                        <tr>
                            <td>'.$value["SoDonDH"].'</td>
                            <td>'.$value["HoTenKH"].'</td>
                            <td>'.$value["HoTenNV"].'</td>
                            <td>'.$value["NgayDH"].'</td>
                            <td>'.$value["HTGH"].'</td>
                            <td>'.number_format($value["TongTien"], 0, ',', '.') . "đ".'</td>
                            <td>'.$value["TrangThai"].'</td>
                            <td><a href="detail_bill.php?bid='.$value['SoDonDH'].'"><button class="btn btn-warning">Chi tiết</button></a></td>
                        </tr>
                        ';
                    }
                } else{
                    echo '
                    <tr>
                        <td class="blank text-danger" colspan="8" align="center">Không có đơn hàng nào</td>
                    </tr>
                    ';
                }
            ?>
        </table>
    </div>

    <div class="success">
    <h3>Đơn hàng đã giao</h3>
        <table border="1">
            <tr>
                <th>Mã số đơn hàng</th>
                <th>Khách hàng</th>
                <th>Nhân viên</th>
                <th>Ngày Đặt</th>
                <th>Ngày Giao</th>
                <th>Thanh Toán</th>
                <th>Tổng Tiền</th>
                <th>Trạng Thái</th>
                <th></th>
            </tr>
            <?php
                $sql2 = "select * from dathang d, khachhang k, nhanvien n where n.MSNV=d.MSNV and d.MSKH = k.MSKH and TrangThai='Giao hàng'";
                $result = executeResult($sql2);
                if(count($result)>0){
                    foreach ($result as  $value) {
                        echo '
                        <tr>
                            <td>'.$value["SoDonDH"].'</td>
                            <td>'.$value["HoTenKH"].'</td>
                            <td>'.$value["HoTenNV"].'</td>
                            <td>'.$value["NgayDH"].'</td>
                            <td>'.$value["NgayGH"].'</td>
                            <td>'.$value["HTGH"].'</td>
                            <td>'.number_format($value["TongTien"], 0, ',', '.') . "đ".'</td>
                            <td>'.$value["TrangThai"].'</td>
                            <td><a href="detail_bill.php?bid='.$value['SoDonDH'].'"><button class="btn btn-warning">Chi tiết</button></a></td>
                        </tr>
                        ';
                    }
                } else{
                    echo '
                    <tr>
                        <td class="blank text-danger" colspan="7" align="center">Không có đơn hàng nào</td>
                    </tr>
                    ';
                }
            ?>
        </table>
    </div>
    </div>
  </center>
  

  <!-- End Content -->
</div>
<?php include("layout/footer.php");?>