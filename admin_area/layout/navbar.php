
   <!-- Vertical navbar -->
    <div class="vertical-nav bg-white" id="sidebar">
  <div class="py-4 px-3 mb-4 bg-light">
    <div class="media d-flex align-items-center"><img src="images/avt1.png" alt="..." width="65" class="mr-3 rounded-circle img-thumbnail shadow-sm">
      <div class="media-body">
        <?php 
            echo '
            <h4 class="m-0">'.$full_name.'</h4>
            <p class="font-weight-light text-muted mb-0">'.$rule.'</p>';
        ?>
        
      </div>
    </div>
  </div>

  <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Chung</p>

  <ul class="nav flex-column bg-white mb-0" id="accordionSidebar">
    <li class="nav-item">
      <a href="index.php" class="nav-link text-dark font-italic bg-light">
                <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
                DashBoard
            </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed text-dark font-italic" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder mr-3 text-primary"></i>
            Quản Lý
        </a>
        <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Quản lý Sản Phẩm:</h6>
                <a class="collapse-item text-dark font-italic" href="insert_product.php">
                    <i class="far fa-plus-square text-primary"></i>
                    Thêm Sản Phẩm
                </a>
                <a class="collapse-item text-dark font-italic" href="update.php">
                    <i class="fas fa-sliders-h text-primary"></i>
                    Cập nhật Sản Phẩm
                </a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Quản lý Danh Mục:</h6>
                <a class="collapse-item text-dark font-italic" href="category.php">
                <i class="far fa-plus-square text-primary"></i>
                    Thêm/Cập nhật Danh Mục
                </a> 
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Quản lý Đơn Hàng:</h6>
                <a class="collapse-item text-dark font-italic" href="bill.php">
                <i class="fas fa-calendar-week text-primary"></i>
                    Quản lý đơn hàng
                    <?php
                        $billnum_data = "select count(SoDonDH) as total from dathang where TrangThai='Mới'";
                        $getb = executeSingleResult($billnum_data);
                        if($getb['total']>0){
                            echo '<div class="mess"><small>'.$getb['total'].'</small></div>';
                        }
                    ?>
                    
                </a>
            </div>
        </div>
    </li>
  </ul>
    <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Tài Khoản</p>

    <ul class="nav flex-column bg-white mb-0" id="accordionSidebar">
        <li class="nav-item">
            <a href="customer.php" class="nav-link text-dark font-italic bg-light">
                <i class="fas fa-users mr-3 text-primary fa-fw"></i>
                Quản lý Khách Hàng
            </a>
        </li>
    </ul>
    <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Quản Trị Viên</p>
    
    <ul class="nav flex-column bg-white mb-0" id="accordionSidebar">
        <li class="nav-item">
            <a href="account.php" class="nav-link text-dark font-italic bg-light">
                <i class="fas fa-user-shield mr-3 text-primary fa-fw"></i>
                Tài Khoản
            </a>
        </li>
        <li class="nav-item" style="padding-bottom: 10rem;">
            <a href="logout.php" class="nav-link text-dark font-italic bg-light">
                <i class="fas fa-sign-out-alt mr-3 text-primary fa-fw"></i>
                Đăng Xuất
            </a>
        </li>
    </ul>
</div>
<!-- End vertical navbar -->