<?php
    include("session.php");
    include("./layout/header.php");
    
    if (isset($_GET['id'])){
        $id=mysqli_real_escape_string($db, $_GET['id']);

        $mahh = $id;
        $sql = "select * from hanghoa where MSHH=".$mahh;
        $ses_sql = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($ses_sql, 1);

        $name = $row['TenHH'];
        $picture = $row['Anh'];
        $mansx = $row['mansx'];
        $gia = $row['Gia'];
        $maloaihang = $row['MaLoaiHang'];
        $note = $row['GhiChu'];

        $sql_loaihang = "select * from loaihanghoa where MaLoaiHang =".$maloaihang;
        $sql_mahang = mysqli_query($db, $sql_loaihang);
        $row = mysqli_fetch_array($sql_mahang, 1);
        $tenloaihang = $row['TenLoaiHang'];

        $sql_sx = "select * from nhasanxuat where mansx=$mansx";
        $ses_sql2 = mysqli_query($db, $sql_sx);
        $row2 = mysqli_fetch_array($ses_sql2, 1);
        $tennsx = $row2['tennsx'];
    }

?>

<div class="content">
    <br>
    <div class="content-product align">


        <div class="row">
            <div class="col-sm-4">
                <div class="left-pro">
                    <img src="admin_area/<?=$picture;?>" alt="Product focus" style="width: 100%;">
                </div>
            </div>
            <div class="col-sm-8">
                <div class="right-pro">
                    <h2><?=$name;?></h2>
                    <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                    </div>
                    <div class="discribe">
                        <h4>Mô tả sản phẩm</h4>
                        <p>- Loại sản phẩm: <?=$tenloaihang?> <br>
                            - Nhà sản xuất: <?=$tennsx?> <br>
                            - Mô tả chung: <?=$note?>
                        </p>
                    </div>
                    <div class="make_by">
                        <h4>Thông tin nhà sản xuất</h4>
                    </div>
                    <br>
                    <br>
                    <h3 class="price"><?=number_format($gia, 0, ',', '.') . "đ"?></h3>
                   <form action="cart.php?action=add" method="post">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <button onclick="document.querySelector('input[type=number]').stepDown();event.preventDefault();" class="btn btn-outline-dark">
                                    <img src="images/icons-remove.svg">
                                </button>
                            </div>
                            <input type="text" name="index" id="index" value="<?=$mahh?>" hidden>
                            <input type="number" id="quantity" name="quantity" min="1" max="99" value="1">
                            <div class="input-group-append">
                                <button onclick="document.querySelector('input[type=number]').stepUp();event.preventDefault();" class="btn btn-outline-dark">
                                <img src="images/icons-add.svg">
                                </button>
                            </div>
                        </div>
                        <button class="btn btn-danger" type="submit" name="submit">Chọn Mua</button>
                    </form>
                    
                </div>
            </div>
        </div>
        


        <div class="products">
            <div class="head-pro">
                <div class="display">
                    <div class="title">
                        <h3>Sản Phẩm Cùng Loại</h3>
                    </div>
                    <div class="see-more">
                        <a href="all_products.php?type=<?=$maloaihang?>">Xem Thêm&nbsp;<i class="fas fa-caret-right"></i></a>
                    </div>
                </div>
            </div>
            <?php
                loadProductSameType($maloaihang);
            ?>
        </div>
    </div>
    <div class="align">
        <div class="products">
            <div class="head-pro">
                <div class="display">
                    <div class="title">
                        <h3>Khám Phá thêm</h3>
                    </div>
                </div>
            </div>
            <?php loadAllProduct(); ?>
        </div>
    </div>
</div>
<script>
    window.onload = function(){
        $("#product").addClass("l-active");
    }
</script>

<?php include("./layout/footer.php");?>