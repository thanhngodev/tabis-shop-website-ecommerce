<?php
    include("session.php");
    include("layout/header.php");
    include("layout/navbar.php");
?>

<?php 
    $msg = "";
    $id = "";
    if(isset($_POST['save'])){
        // Declare variable
        if(isset($_GET['id'])){
            $id = $_POST['id'];
        }
        $pro_name = $_POST['name'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $type = $_POST['type'];
        $make = $_POST['make'];
        $description = $_POST['description'];
        $filename = $_FILES['images']['name'];
        $tempname = $_FILES["images"]["tmp_name"];
        $folder = "product_images/".$filename;

        // Connect to database
        $db = mysqli_connect(host, username, password, database);
        $db->set_charset("utf8");

        if($id==""){
            // Create id product
            $id_query = "select max(MSHH) as ms from hanghoa";
            $result2 = mysqli_query($db,$id_query);
            $row2 = mysqli_fetch_array($result2, 1);
            $id_post = $row2['ms'] + 0.01;

            // post data to database
            $post = "insert into hanghoa (MSHH, TenHH, Anh, mansx, QuyCach, Gia, SoLuongHang, MaLoaiHang, GhiChu) 
            values('$id_post','$pro_name','$folder','$make','$type','$price','$quantity','$category','$description')";

            mysqli_query($db, $post);
            if(move_uploaded_file($tempname, $folder)){
                $msg = "Thêm sản phẩm thành công";
            } else{
                $msg = "Không thể thêm sản phẩm";
                $del_query = "DELETE FROM `hanghoa` WHERE CONCAT(`hanghoa`.`MSHH`) = '$id'";
                mysqli_query($db,$del_query);
            };
            
        } else{
            
            $sql = "UPDATE hanghoa SET 
                TenHH ='$pro_name', 
                mansx = '$make', 
                QuyCach ='$type', 
                Gia ='$price', 
                SoLuongHang ='$quantity', 
                MaLoaiHang ='$category', 
                GhiChu ='$description' 
                WHERE MSHH = '$id'";

            execute($sql);
            $msg = "Chỉnh sửa sản phẩm thành công";
        }
    };
?>

<?php 
    $name_cf = $make_cf = $type_cf = $price_cf = $quantity_cf = $category_cf = $description_cf = "";
    $img_cf="images/avt1.png";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "select * from hanghoa where MSHH=".$id;
        $product = executeSingleResult($sql);
        if($product != null){
            $name_cf = $product['TenHH'];
            $img_cf = $product['Anh'];
            $make_cf_id = $product['mansx'];
            $type_cf = $product['QuyCach'];
            $price_cf = $product['Gia'];
            $quantity_cf = $product['SoLuongHang'];
            $category_cf=$product['MaLoaiHang'];
            $description_cf = $product['GhiChu'];
        }
    }
?>
<!-- Page content holder -->
<div class="page-content p-3" id="content">
    <!-- Toggle button -->
    <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>

    <!-- Content -->
    <div class="separator"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-7">
                <h3>Nhập/Chỉnh sửa sản phẩm</h3>
                <form action="insert_product.php" method="post" class="insert-form" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td><label for="name">Tên sản phẩm</label></td>
                            <td>
                                <input type="text" name="name" id="name" value="<?=$name_cf?>">
                                <input type="text" name="id" id="id" value="<?=$id?>" hidden="true">
                            </td>
                        </tr>
                        <tr>
                            <td><label for="quantity">Số lượng</label></td>
                            <td><input type="text" name="quantity" id="quantity" value="<?=$quantity_cf?>"></td>
                        </tr>
                        <tr>
                            <td><label for="price">Đơn giá</label></td>
                            <td><input type="text" name="price" id="price" value="<?=$price_cf?>"></td>
                        </tr>
                        <tr>
                            <td><label for="category">Danh mục sản phẩm</label></td>
                            <td>
                                <select name="category" id="category">
                                    <?php
                                        $sql = "select * from loaihanghoa";
                                        $result = executeResult($sql);
                                        foreach($result as $item){
                                            if($item['MaLoaiHang']==$category_cf){
                                                echo '<option selected value="'.$item['MaLoaiHang'].'">'.$item['TenLoaiHang'].'</option>';
                                            } else{
                                                echo '<option value="'.$item['MaLoaiHang'].'">'.$item['TenLoaiHang'].'</option>';
                                            }
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="type">Quy cách</label></td>
                            <td>
                                <select name="type" id="type">
                                    <option value="cái">cái</option>
                                    <option value="bộ">bộ</option>
                                    <option value="hộp">hộp</option>
                                    <option value="thùng">thùng</option>
                                    <option value="bịch">bịch</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="make">Nhà cung cấp</label></td>
                            <td>
                                <select name="make" id="make">
                                    <?php
                                        $sql = "select * from nhasanxuat";
                                        $result = executeResult($sql);
                                        foreach($result as $item){
                                            if($item['mansx']==$make_cf_id){
                                                echo '<option selected value="'.$item['mansx'].'">'.$item['tennsx'].'</option>';
                                            } else{
                                                echo '<option value="'.$item['mansx'].'">'.$item['tennsx'].'</option>';
                                            }
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="images">Hình ảnh</label></td>
                            <td><input type="file" name="images" id="images"></td>
                        </tr>
                        <tr>
                            <td><label for="description">Mô tả</label></td>
                            <td><textarea name="description" id="description" cols="35" rows="8"><?=$description_cf?></textarea></td>
                        </tr>
                    </table>
                    <div class="action text-center">
                        <button id="save" type="submit" class="btn btn-primary" name="save">Lưu</button>
                        <button id="clear" class="btn btn-danger">Xóa</button>
                    </div>
                    
                </form>
            </div> <!--form end-->
            <div class="col-sm-5">
                <div class="preview">
                    <h3>Preview</h3>
                    <table>
                        <tr>
                            <td class="img-display" rowspan="7"><img class="loadImg" src="<?=$img_cf?>" alt="" width="180rem"></td>
                            <td><p class="name-view">
                                <?php 
                                if(isset($_GET['id'])) : ?>
                                    <?=$name_cf?>
                                <?php else : ?>
                                Tên sản phẩm
                                <?php endif ?>
                            </p></td>
                        </tr>
                        <tr>
                            <td><p class="quantity-view">
                            <?php 
                                if(isset($_GET['id'])) : ?>
                                    <?=$quantity_cf?>
                                <?php else : ?>
                                Số lượng
                                <?php endif ?>
                            </p></td>
                        </tr>
                        <tr>
                            <td><p class="price-view">
                            <?php 
                                if(isset($_GET['id'])) : ?>
                                    <?=number_format($price_cf, 0, ',', '.') . "đ"?>
                                <?php else : ?>
                                    Giá
                                <?php endif ?>
                            </p></td>
                        </tr>
                        <tr>
                            <td><p class="category-view">
                            <?php 
                                if(isset($_GET['id'])) : ?>
                                    <?=$category_cf?>
                                <?php else : ?>
                                    Danh mục
                                <?php endif ?>
                            </p></td>
                        </tr>
                        <tr>
                            <td><p class="type-view">
                            <?php 
                                if(isset($_GET['id'])) : ?>
                                    <?=$type_cf?>
                                <?php else : ?>
                                    Quy cách
                                <?php endif ?>
                            </p></td>
                        </tr>
                        <tr>
                            <td><p class="make-view">
                            <?php 
                                if(isset($_GET['id'])) : ?>
                                    <?=1?>
                                <?php else : ?>
                                    Nhà cung cấp
                                <?php endif ?>
                            </p></td>
                        </tr>
                        <tr>
                            <td><p class="description-view">
                            <?php 
                                if(isset($_GET['id'])) : ?>
                                    <?=$description_cf?>
                                <?php else : ?>
                                    Mô tả
                                <?php endif ?>
                            </p></td>
                        </tr>
                    </table>
                    <div class="msg">
                        <p><?php echo $msg;?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- End Content -->
</div>

<?php include("layout/footer.php");?>