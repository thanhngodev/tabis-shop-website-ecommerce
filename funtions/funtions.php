<?php

    if(!defined("host")){
        define('host', 'localhost');
    }
    if(!defined("username")){
        define('username', 'root');
    }
    if(!defined("password")){
        define('password', '');
    }
    if(!defined("database")){
        define('database', 'tabis');
    }
    $con = mysqli_connect(host,username,password,database);
    $con->set_charset("utf8");
    
    if(!function_exists("execute")) {
        function execute($sql){
            //open connection to database
            $con = mysqli_connect(host,username,password,database);
            $con->set_charset("utf8");
            //insert, update, delete
            mysqli_query($con,$sql);
            //close connection
            mysqli_close($con);
        }
    } 

    if(!function_exists("executeResult")){
        function executeResult($sql){
            //open connection to database
            $con = mysqli_connect(host,username,password,database);
            $con->set_charset("utf8");
            $result = mysqli_query($con,$sql);
            $data = [];
            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_array($result)){
                    $data[] = $row;
                }
            }
            
            //close connection
            mysqli_close($con);
            return $data; 
        }
    }

    if(!function_exists("executeSingleResult")){
        function executeSingleResult($sql){
            //open connection to database
            $con = mysqli_connect(host,username,password,database);
            $con->set_charset("utf8");
            $result = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($result, 1);
            
            //close connection
            mysqli_close($con);
            return $row; 
        }
    }

    if(!function_exists("getCats")){
        function getCats(){
            $get_cats = "select * from LoaiHangHoa";
            $result = executeResult($get_cats);
            foreach ($result as $row_cats){
                $cat_id = $row_cats['MaLoaiHang'];
                $cat_title = $row_cats['TenLoaiHang'];
                echo "<li> <a href='all_products.php?type=$cat_id' style='font-size: 17px;'>$cat_title</a> </li>";
            }
        }
    }

    if(!function_exists("loadAllProduct")){
        function loadAllProduct(){
            $get_prod = "select * from HangHoa";
            if(isset($_GET['price'])&& $_GET['price']!=""){
                switch ($_GET['price']) {
                    case '1Mdown':
                        $get_prod = "select * from HangHoa where Gia <1000000";
                        if(isset($_GET['type']) && $_GET['type']!=""){
                            $get_prod = "select * from HangHoa where Gia <1000000 and MaLoaiHang=".$_GET['type'];
                            if(isset($_GET['supplier'])&& $_GET['supplier']!=""){
                                $get_prod = "select * from HangHoa where Gia <1000000 and mansx=".$_GET['supplier']."and MaLoaiHang=".$_GET['type'];
                            }
                        }
                        if(isset($_GET['supplier'])&& $_GET['supplier']!=""){
                            $get_prod = "select * from HangHoa where Gia <1000000 and mansx=".$_GET['supplier'];
                        }
                        break;
                    case '2Mdown':
                        $get_prod = "select * from HangHoa where Gia <2000000";
                        if(isset($_GET['type']) && $_GET['type']!=""){
                            $get_prod = "select * from HangHoa where Gia <2000000 and MaLoaiHang=".$_GET['type'];
                            if(isset($_GET['supplier'])&& $_GET['supplier']!=""){
                                $get_prod = "select * from HangHoa where Gia <2000000 and mansx=".$_GET['supplier']."and MaLoaiHang=".$_GET['type'];
                            }
                        }
                        if(isset($_GET['supplier'])&& $_GET['supplier']!=""){
                            $get_prod = "select * from HangHoa where Gia <2000000 and mansx=".$_GET['supplier'];
                        }
                        break;
                    case '5Mdown':
                        $get_prod = "select * from HangHoa where Gia <5000000";
                        if(isset($_GET['type']) && $_GET['type']!=""){
                            $get_prod = "select * from HangHoa where Gia <5000000 and MaLoaiHang=".$_GET['type'];
                            if(isset($_GET['supplier'])&& $_GET['supplier']!=""){
                                $get_prod = "select * from HangHoa where Gia <5000000 and mansx=".$_GET['supplier']."and MaLoaiHang=".$_GET['type'];
                            }
                        }
                        if(isset($_GET['supplier'])&& $_GET['supplier']!=""){
                            $get_prod = "select * from HangHoa where Gia <5000000 and mansx=".$_GET['supplier'];
                        }
                        break;
                    case '10Mdown':
                        $get_prod = "select * from HangHoa where Gia <10000000";
                        if(isset($_GET['type']) && $_GET['type']!=""){
                            $get_prod = "select * from HangHoa where Gia <10000000 and MaLoaiHang=".$_GET['type'];
                            if(isset($_GET['supplier'])&& $_GET['supplier']!=""){
                                $get_prod = "select * from HangHoa where Gia <10000000 and mansx=".$_GET['supplier']."and MaLoaiHang=".$_GET['type'];
                            }
                        }
                        if(isset($_GET['supplier'])&& $_GET['supplier']!=""){
                            $get_prod = "select * from HangHoa where Gia <10000000 and mansx=".$_GET['supplier'];
                        }
                        break;
                    case '10Mup':
                        $get_prod = "select * from HangHoa where Gia >10000000";
                        if(isset($_GET['type']) && $_GET['type']!=""){
                            $get_prod = "select * from HangHoa where Gia >10000000 and MaLoaiHang=".$_GET['type'];
                            if(isset($_GET['supplier'])&& $_GET['supplier']!=""){
                                $get_prod = "select * from HangHoa where Gia >10000000 and mansx=".$_GET['supplier']."and MaLoaiHang=".$_GET['type'];
                            }
                        }
                        if(isset($_GET['supplier'])&& $_GET['supplier']!=""){
                            $get_prod = "select * from HangHoa where Gia >10000000 and mansx=".$_GET['supplier'];
                        }
                        break;
                }
                
            } elseif (isset($_GET['type']) && $_GET['type']!="") {
                $get_prod = "select * from HangHoa where MaLoaiHang=".$_GET['type'];
                if(isset($_GET['supplier'])&& $_GET['supplier']!=""){
                    $get_prod = "select * from HangHoa where MaLoaiHang=".$_GET['type']."and mansx=".$_GET['supplier'];
                }
                
            } elseif (isset($_GET['supplier'])&& $_GET['supplier']!="") {
                $get_prod = "select * from HangHoa where mansx=".$_GET['supplier'];
            }
            $result = executeResult($get_prod);
            $rows=ceil(sizeof($result)/4);
            $i=0;
            for($row=0;$row<$rows;$row++){
                echo '<div class="row">';
                for($col=0;$col<4;$col++){
                    if($i<sizeof($result)){
                        echo '
                            <div class="col-sm-3" onclick="linkTo('.$result[$i]['MSHH'].');">
                                <img src="admin_area/'.$result[$i]['Anh'].'" alt="Redmi Node 9S">
                                <h3>'.$result[$i]['TenHH'].'</h3>
                                <div class="price">
                                    <strong>'.number_format($result[$i]['Gia'], 0, ',', '.') . "đ".'</strong>
                                
                                    <span><strike>'.number_format($result[$i]['Gia']+500000, 0, ',', '.') . "đ".'</strike></span>
                                </div>
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                    ';
                    $i++;
                    }
                }
                echo '</div>';
            }
        }
    }

    if(!function_exists("loadSaleProduct_Home")){
        function loadSaleProduct_Home($position){
            $get_prod = "select * from HangHoa where 1 limit $position, 8";
            $result = executeResult($get_prod);
            echo '<div class="row">';
            for($col=0;$col<4;$col++){
                echo '
                <div class="col-sm-3" onclick="linkTo('.$result[$col]['MSHH'].');">
                <img src="admin_area/'.$result[$col]['Anh'].'" alt="Redmi Node 9S">
                <h3>'.$result[$col]['TenHH'].'</h3>
                <div class="price">
                    <strong>'.number_format($result[$col]['Gia'], 0, ',', '.') . "đ".'</strong>
                </div>
                <div class="rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                </div>
                </div>
                ';
            }
            echo '</div>';
        };
    }

    if(!function_exists("phpalert")){
        function phpalert($in){
            echo '<script type="text/javascript">alert("'.$in.'")</script>';
        };
    }

    if(!function_exists("loadProductSameType")){
        function loadProductSameType($type){
            $sql = "SELECT * FROM hanghoa WHERE MaLoaiHang=".$type;
            $result = executeResult($sql);
            echo '<div class="row">';
            for($col=0;$col<4;$col++){
                echo '
                <div class="col-sm-3" onclick="linkTo('.$result[$col]['MSHH'].');">
                <img src="admin_area/'.$result[$col]['Anh'].'" alt="Redmi Node 9S">
                <h3>'.$result[$col]['TenHH'].'</h3>
                <div class="price">
                    <strong>'.number_format($result[$col]['Gia'], 0, ',', '.') . "đ".'</strong>
                </div>
                <div class="rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                </div>
                </div>
                ';
            }
            echo '</div>';
        };
    }

    if(!function_exists("loadProductQuery")){
        function loadProductQuery($query){
            $sql = "SELECT * FROM hanghoa WHERE LOWER(TenHH) LIKE '%$query%'";
            $result = executeResult($sql);
            $rows=ceil(sizeof($result)/4);
            $i=0;
            if(sizeof($result)==0){
                echo '<h4 >Không có kết quả tìm kiếm cho : `'.$query.'`  <span class="text-muted">('.sizeof($result).' sản phẩm)</span></h4>';
                loadAllProduct();
            }else{
                echo '<h4 >Kết quả tìm kiếm cho : `'.$query.'`  <span class="text-muted">('.sizeof($result).' sản phẩm)</span></h4>';
                for($row=0;$row<$rows;$row++){
                    echo '<div class="row">';
                    for($col=0;$col<4;$col++){
                        if($i<sizeof($result)){
                            echo '
                                <div class="col-sm-3" onclick="linkTo('.$result[$i]['MSHH'].');">
                                    <img src="admin_area/'.$result[$i]['Anh'].'" alt="Redmi Node 9S">
                                    <h3>'.$result[$i]['TenHH'].'</h3>
                                    <div class="price">
                                        <strong>'.number_format($result[$i]['Gia'], 0, ',', '.') . "đ".'</strong>
                                    
                                        <span><strike>'.number_format($result[$i]['Gia']+500000, 0, ',', '.') . "đ".'</strike></span>
                                    </div>
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                        ';
                        $i++;
                        }
                    }
                    echo '</div>';
                }
            }
        }
        
    }

    if(!function_exists("loadToTableAdmin")){
        function loadToTableAdmin($limit){
            $page = 1;   // Page index
            if(isset($_GET['page'])){
                $page = $_GET['page'];
            }
            $firstIndex = ($page - 1) * $limit;
            if(isset($_GET['cate_id'])){
                $cate_id = $_GET['cate_id'];
                $get_all = 'select * from hanghoa where MaLoaiHang = '.$cate_id.' limit '.$firstIndex.', '.$limit;
            }else{
                $get_all = 'select * from hanghoa where 1 limit '.$firstIndex.', '.$limit;
            }
            
            $result = executeResult($get_all);
            foreach($result as $row){
                // get tennsx
                $mansx = $row["mansx"];
                $get_make = "select tennsx from nhasanxuat where mansx = $mansx";
                $make = executeSingleResult($get_make);
                // get ten loaihang
                $maloai = $row["MaLoaiHang"];
                $get_tenloai = "select TenLoaiHang from loaihanghoa where MaLoaiHang = $maloai";
                $tenloai = executeSingleResult($get_tenloai);

                $href = "insert_product.php?id=".$row["MSHH"];
                echo '
                <tr>
                    <td>'.$row["MSHH"].'</td>
                    <td class="img-td"><img src="'.$row["Anh"].'" alt="" width="100%"></td>
                    <td>'.$row["TenHH"].'</td>
                    <td>'.$row["SoLuongHang"].'</td>
                    <td>'.number_format($row["Gia"], 0, ',', '.') . "đ".'</td>
                    <td>'.$tenloai["TenLoaiHang"].'</td>
                    <td>'.$row["QuyCach"].'</td>
                    <td>'.$make["tennsx"].'</td>
                    <td style="max-width: 15rem;">'.$row["GhiChu"].'</td>
                    <td>
                        <a href="'.$href.'"><button class="btn btn-primary">Edit</button></a>
                    </td>
                    <td>
                        <button class="btn btn-danger" onclick="del_product('.$row["MSHH"].');">Delete</button>
                    </td>
                </tr>
                ';
            };
        };
    }
    

    

    

             
    
       


    
    
    
?>