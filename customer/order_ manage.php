<?php
    include("../session.php");
    include("links/header.php");
?>


<div class="content_1">
    <div class="sidebar">
        <?php include("links/sidebar.php"); ?>
    </div>
    <div class="info_ac">
        <h3 class="info_title">Đơn hàng của tôi</h3>
        <div class="inner">
            <table>
                <thead>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Ngày mua</th>
                        <th>Sản phẩm</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $sql = "SELECT d.SoDonDH,d.NgayDH,h.TenHH,d.TongTien,d.TrangThai
                    FROM chitietdathang c, dathang d, hanghoa h 
                    WHERE c.SoDonDH = d.SoDonDH 
                    and c.MSHH=h.MSHH
                    AND d.MSKH = ".$khid;
                    $result = executeResult($sql);
                    foreach ($result as $value) {
                        echo '
                        <tr>
                            <td>
                                <a href="/sales/order/view/681589127">'.$value['SoDonDH'].'</a>
                            </td>
                            <td>'.$value['NgayDH'].'</td>
                            <td>'.$value['TenHH'].'</td>
                            <td>'.number_format($value['TongTien'], 0, ',', '.').'</td>
                            <td>'.$value['TrangThai'].'</td>
                        </tr>
                        ';
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    window.onload = function(){
        $("#account").addClass("l-active");
    }
</script>
<?php include("links/footer.php");?>