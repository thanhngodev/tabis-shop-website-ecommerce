
<?php
    include("session.php");
    include("./layout/header.php");
?>
        <div class="content_w">
            <div class="content">
                <div class="align">
                    <div class="main-content">
                        <div id="demo" class="carousel slide" data-ride="carousel">

                            <!-- Indicators -->
                            <ul class="carousel-indicators">
                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                            <li data-target="#demo" data-slide-to="1"></li>
                            <li data-target="#demo" data-slide-to="2"></li>
                            </ul>

                            <!-- The slideshow -->
                            <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="images/banner1.png" alt="Bannner 1" width="1100" height="500">
                            </div>
                            <div class="carousel-item">
                                <img src="images/banner4.jpg" alt="Banner4" width="1100" height="500">
                            </div>
                            <div class="carousel-item">
                                <img src="images/banner2.png" alt="Banner2" width="1100" height="500">
                            </div>
                            <!-- <div class="carousel-item">
                                <img src="images/banner3.png" alt="Banner3" width="1100" height="500">
                            </div> -->
                            
                            </div>

                            <!-- Left and right controls -->
                            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                            </a>
                            <a class="carousel-control-next" href="#demo" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                            </a>
                        </div>
                        <!-- Display Products Sale -->
                        <div class="products">
                            <div class="head-pro">
                                <div class="display">
                                <div class="title">
                                    <h3>Đang Giảm Giá</h3>
                                </div>
                                <div class="see-more">
                                    <a href="all_products.php?supplier=1">Xem Thêm&nbsp;<i class="fas fa-caret-right"></i></a>
                                </div>
                                </div>
                            </div>
                            <?php
                                loadSaleProduct_Home(0);
                            ?>
                        </div>
                        <!-- Display Products Popular-->
                        <div class="products">
                            <div class="head-pro">
                                <div class="display">
                                <div class="title">
                                    <h3>Sản Phẩm Bán Chạy</h3>
                                </div>
                                <div class="see-more">
                                    <a href="all_products.php?type=1.0">Xem Thêm&nbsp;<i class="fas fa-caret-right"></i></a>
                                </div>
                                </div>
                            </div>
                            <?php
                                loadSaleProduct_Home(20);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.onload = function(){
            $("#home").addClass("l-active");
        }
    
    
    </script>
    

    <?php include("./layout/footer.php");?>