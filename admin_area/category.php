<?php
    include("session.php");
    include("layout/header.php");
    include("layout/navbar.php");
?>

<?php 
    $msg="";
    if(isset($_POST['add'])){
        $cate_name = $_POST["category-name"];
        if($cate_name != ""){
            // Get category id
            $query = "select max(MaLoaiHang) as maxId from loaihanghoa";
            $result = executeSingleResult($query);
            $id_cate = $result["maxId"] + 1;
            // Insert to database
            $sql = "insert into loaihanghoa(MaLoaiHang,TenLoaiHang) values('$id_cate','$cate_name')";
            execute($sql);
        } else{
            $msg = "Tên danh mục trống";
        }
    }
?>

<!-- Page content holder -->
<div class="page-content p-3" id="content">
    <!-- Toggle button -->
    <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>

    <!-- Content -->
    <div class="separator"></div>
    <div class="category-manager">
        <div class="add-form">
            <form action="category.php" method="post">
                <label for="category-name">Nhập danh mục mới</label>
                <input type="text" name="category-name" id="category-name">
                <button type="submit" name="add" class="btn btn-primary">Lưu</button>
            </form>
        </div>
        <div class="msg">
                <p><?php echo $msg;?></p>
        </div>
        <div class="table-data">
            <table>
                <tr>
                    <th>Mã danh mục</th>
                    <th>Tên danh mục</th>
                    <th>Số sản phẩm hiện có</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php 
                    $sql = "select * from loaihanghoa";
                    $result = executeResult($sql);
                    foreach ($result as $item) {
                        echo '<tr>
                        <td>'.$item["MaLoaiHang"].'</td>
                        <td>'.$item["TenLoaiHang"].'</td>';
                        $product = "select count(MSHH) as total from hanghoa where MaLoaiHang =".$item["MaLoaiHang"];
                        $count = executeSingleResult($product);
                        echo '<td>'.$count["total"].'</td>
                        <td><a href="update.php?cate_id='.$item["MaLoaiHang"].'" class="btn btn-info">Xem</a></td>
                        <td><button onclick="del_category('.$item["MaLoaiHang"].');" class="btn btn-danger">Xóa</button></td>
                        </tr>';
                    }
                ?>
            </table>            
        </div>
    </div>
</div>

<?php include("layout/footer.php");?>