<?php
    include("session.php");
    include("layout/header.php");
    include("layout/navbar.php");
?>

<!-- Page content holder -->
<div class="page-content p-3" id="content">
    <!-- Toggle button -->
    <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>

    <!-- Content -->
    <div class="separator"></div>
    <center class="customers">
    <table border="1">
        <tr>
            <th>MSKH</th>
            <th>Họ tên</th>
            <th>Địa chỉ</th>
            <th>Số ĐT</th>
            <th>Số đơn hàng</th>
            <th>Tổng tiền</th>
        </tr>
        <?php 
            $sql = "select * from khachhang";
            $result = executeResult($sql);
            foreach ($result as $item ) {
                echo '
                    <tr>
                        <td>'.$item["MSKH"].'</td>
                        <td>'.$item["HoTenKH"].'</td>
                        <td>'.$item["DiaChi"].'</td>
                        <td>'.$item["SoDienThoai"].'</td>';
                $num = $total = 0;

                $db = mysqli_connect(host, username, password, database);
                $db->set_charset("utf8");

                $count = "select d.SoDonDH,d.TongTien from dathang d, chitietdathang c where d.SoDonDH=c.SoDonDH and d.MSKH =".$item["MSKH"];
                $results = mysqli_query($db, $count);
                if(mysqli_num_rows($results)>0){
                    $num = mysqli_num_rows($results);
                    while($row = mysqli_fetch_array($results)){
                        $SoDonDH = $row['SoDonDH'];
                        $query = "select sum(TongTien) as total from dathang 
                        where MSKH=".$item["MSKH"];
                        $data = executeSingleResult($query);
                        $total = $data["total"];
                    }
                }
                
                echo '
                        <td>'.$num.'</td>
                        <td>'.number_format($total, 0, ',', '.') . "đ".'</td>
                    </tr>
                ';
            }
        ?>
    </table>
    </center>
</div>

<?php include("layout/footer.php");?>