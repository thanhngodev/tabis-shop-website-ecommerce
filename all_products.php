<?php
    include("session.php");
    include("layout/header.php");
?>

<div class="content">
    <div class="pro-filter">
        <div class="align">
            <div class="label-filter">Bộ Lọc</div>
            <form action="all_products.php" method="get">
                <select name="price" id="price-fil">
                    <option value="" disabled selected>Giá</option>
                    <option value="">Tất cả</option>
                    <?php
                        $value = array("1Mdown"=>"dưới 1 triệu",
                        "2Mdown"=>"dưới 2 triệu",
                        "5Mdown"=>"dưới 5 triệu",
                        "10Mdown"=>"dưới 10 triệu",
                        "10Mup"=>"trên 10 triệu");
                        foreach ($value as $key => $val) {
                            if(isset($_GET['price'])){
                                if($_GET['price']==$key){
                                    echo '<option selected value="'.$key.'">'.$val.'</option>';
                                }else {
                                    echo '<option value="'.$key.'">'.$val.'</option>';
                                }
                            } else {
                                echo '<option value="'.$key.'">'.$val.'</option>';
                            }
                        }
                    ?>
                </select>
                <select name="type" id="type-fil">
                    <option value="" disabled selected>Loại</option>
                    <option value="">Tất cả</option>
                    <?php
                        $sql = "select * from loaihanghoa";
                        $result = executeResult($sql);
                        foreach ($result as $option) {
                            if(isset($_GET['type'])){
                                if($option["MaLoaiHang"]==$_GET['type']){
                                    echo '<option selected value="'.$option["MaLoaiHang"].'">'.$option["TenLoaiHang"].'</option>';
                                }else {
                                    echo '<option value="'.$option["MaLoaiHang"].'">'.$option["TenLoaiHang"].'</option>';
                                }
                            }else {
                                echo '<option value="'.$option["MaLoaiHang"].'">'.$option["TenLoaiHang"].'</option>';
                            }
                        }
                    ?>
                </select>
                <select name="supplier" id="supplier-fil">
                    <option value="" disabled selected>Nhà cung cấp</option>
                    <option value="">Tất cả</option>
                    <?php
                        $query = "select * from nhasanxuat";
                        $exec = executeResult($query);
                        foreach ($exec as $option ) {
                            if(isset($_GET['supplier'])){
                                if($option["mansx"]==$_GET['supplier']){
                                    echo '<option selected value="'.$option["mansx"].'">'.$option["tennsx"].'</option>';
                                }else {
                                    echo '<option value="'.$option["mansx"].'">'.$option["tennsx"].'</option>';
                                }
                            } else {
                                echo '<option value="'.$option["mansx"].'">'.$option["tennsx"].'</option>';
                            }
                        }
                    ?>
                </select>
                <button type="submit" class="btn btn-danger">Lọc</button>
            </form>
        </div>
    </div>
    <div class="align">
        <div class="products">
            <?php 
            if(isset($_GET['q'])&&$_GET['q']!=""){
                loadProductQuery($_GET['q']);
            } else{
                loadAllProduct();
            }
            ?>
        </div>
    </div>
</div>
<script>
    window.onload = function(){
        $("#product").addClass("l-active");
    }
</script>


<?php include("layout/footer.php");?>