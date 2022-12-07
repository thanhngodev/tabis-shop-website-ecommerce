<?php
    include_once("../funtions/funtions.php");
    include("session.php");
    include("layout/header.php");
    include("layout/navbar.php");
?>
<div class="page-content p-3" id="content">
    <!-- Toggle button -->
    <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>

    <!-- Content -->
    <div class="separator"></div>
    <table class="all-info">
        <tr>
            <th>Mã SP</th>
            <th>Ảnh</th>
            <th>Tên SP</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Danh mục</th>
            <th>Đơn vị tính</th>
            <th>Nhà sản xuất</th>
            <th>Ghi chú</th>
            <th></th>
            <th></th>
        </tr>
        <?php
            $limit = 5; // Number product on each page
            loadToTableAdmin($limit);
        ?>
    </table>
    <?php 
        $page = 1;   // Page index
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }

        if(isset($_GET['cate_id'])){
            $cate_id = $_GET['cate_id'];
            $sql = "select count(MSHH) as total from hanghoa where MaLoaiHang =".$cate_id;
        } else {
            $sql = "select count(MSHH) as total from hanghoa";
        }
        $result = executeSingleResult($sql);
        $total = $result['total'];
        $count = ceil($total / $limit);
    ?>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
        <?php 
            if($page == 1){
                echo '<li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                    </li>';
            } else if(isset($_GET['cate_id'])){
                $cate_id = $_GET['cate_id'];
                echo '<li class="page-item">
                    <a class="page-link" href="update.php?cate_id='.$cate_id.'&page='.($page-1).'" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                    </li>';
                } else{
                    echo '<li class="page-item">
                    <a class="page-link" href="update.php?page='.($page-1).'" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                    </li>';
                }
        ?>
            
        <?php 
            for ($i=1; $i <= $count; $i++) {
                if($page == $i){
                    if(isset($_GET['cate_id'])){
                        $cate_id = $_GET['cate_id'];
                        echo '<li class="page-item active"><a class="page-link" href="update.php?cate_id='.$cate_id.'&page='.$i.'">'.$i.'</a></li>';
                    } else{
                        echo '<li class="page-item active"><a class="page-link" href="update.php?page='.$i.'">'.$i.'</a></li>';
                    }
                    
                }else if(isset($_GET['cate_id'])){
                    $cate_id = $_GET['cate_id'];
                    echo '<li class="page-item"><a class="page-link" href="update.php?cate_id='.$cate_id.'&page='.$i.'">'.$i.'</a></li>';
                } else{
                    echo '<li class="page-item"><a class="page-link" href="update.php?page='.$i.'">'.$i.'</a></li>';
                }
            }
        ?>
        <?php 
            if($page == $count){
                echo '<li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                    </li>';
            } else if(isset($_GET['cate_id'])){
                $cate_id = $_GET['cate_id'];
                echo '<li class="page-item">
                    <a class="page-link" href="update.php?cate_id='.$cate_id.'&page='.($page+1).'" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                    </li>';
                } else{
                    echo '<li class="page-item">
                    <a class="page-link" href="update.php?page='.($page+1).'" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                    </li>';
                }
        ?>
            
        </ul>
    </nav>
</div>
<?php include("layout/footer.php");?>