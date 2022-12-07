<?php
    include("../funtions/funtions.php"); 
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
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $get_data = "select * from dathang d, chitietdathang c ,hanghoa h where c.MSHH=h.MSHH and d.SoDonDH = c.SoDonDH and d.MSKH=$khid and d.TrangThai='Giao hàng'";
                        $result = executeResult($get_data);
                        if(count($result)>0){
                            foreach ($result as $value) {
                                echo '
                                <tr>
                                    <td>
                                        <a href="#">'.$value['SoDonDH'].'</a>
                                    </td>
                                    <td>'.$value["NgayDH"].'</td>
                                    <td>'.$value["TenHH"].'</td>
                                    <td>'.number_format($value["GiaDatHang"], 0, ',', '.').'</td>
                                </tr>
                                ';
                            }
                        } else{
                            echo '
                                <tr>
                                    <td colspan="4">Không có đơn hàng nào!</td>
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