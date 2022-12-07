<?php 
    include("session.php");
    include("layout/header.php");
?>


<?php include("layout/navbar.php");?>


<!-- Page content holder -->
<div class="page-content p-5" id="content">
  <!-- Toggle button -->
  <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>
  <h1 align="center">Chào mừng đến Tabi's - Trang Quản Trị</h1>
  <!-- Content -->
  <div class="separator"></div>
  <center>
  <form action="index.php" method="post">
  <div class="statistic">
    <h3>Thống kê doanh thu</h3>
    <label for="statistic-type">Loại thống kê</label>
    <select name="statistic-type" id="statistic-type">
      <?php
        echo '<option value=""></option>';
        $type_arr = ["time"=>"Theo thời gian", "product"=>"Theo sản phẩm", "type"=>"Theo loại sản phẩm", "make"=>"Theo nhà sản xuất"];
          foreach ($type_arr as $key => $value) {
            if($key==$GLOBALS['sta-type']){
              echo '<option selected value="'.$key.'">'.$value.'</option>';
            } 
            else{
              echo '<option value="'.$key.'">'.$value.'</option>';
            }
          }
      ?>
    </select>
    <div class="fillter">
      <div class="group1 none" id="time">
        <label for="time-sta">Thời gian</label>
        <select name="time-sta" id="time-sta">
          <option value=""></option>
          <option value="day">Ngày</option>
          <option value="month">Tháng</option>
          <option value="year">Năm</option>
        </select>
      
      <div class="group2 none" id="dtime">
        <div class="g1">
          <label for="start">Ngày bắt đầu</label>
          <input type="date" name="start" id="start">
        </div>
        <div class="g2">
          <label for="end">Ngày kết thúc</label>
          <input type="date" name="end" id="end">
        </div>
      </div>
      <div class="group3 none" id="mtime">
        <div class="g1">
          <label for="mstart">Tháng bắt đầu</label>
          <select name="mstart" id="mstart">
            <option value=""></option>
            <option value="1">Tháng 1</option>
            <option value="2">Tháng 2</option>
            <option value="3">Tháng 3</option>
            <option value="4">Tháng 4</option>
            <option value="5">Tháng 5</option>
            <option value="6">Tháng 6</option>
            <option value="7">Tháng 7</option>
            <option value="8">Tháng 8</option>
            <option value="9">Tháng 9</option>
            <option value="10">Tháng 10</option>
            <option value="11">Tháng 11</option>
            <option value="12">Tháng 12</option>
          </select>
        </div>
        <div class="g2">
          <label for="mend">Tháng kết thúc</label>
          <select name="mend" id="mend">
            <option value=""></option>
            <option value="1">Tháng 1</option>
            <option value="2">Tháng 2</option>
            <option value="3">Tháng 3</option>
            <option value="4">Tháng 4</option>
            <option value="5">Tháng 5</option>
            <option value="6">Tháng 6</option>
            <option value="7">Tháng 7</option>
            <option value="8">Tháng 8</option>
            <option value="9">Tháng 9</option>
            <option value="10">Tháng 10</option>
            <option value="11">Tháng 11</option>
            <option value="12">Tháng 12</option>
          </select>
        </div>
      </div>
      <div class="group4 none" id="ytime">
        <div class="g1">
          <label for="ystart">Năm bắt đầu</label>
          <select name="ystart" id="ystart">
            <option value=""></option>
            <option value="2019">2019</option>
            <option value="2020">2020</option>
            <option value="2021">2021</option>
          </select>
        </div>
        <div class="g2">
          <label for="yend">Năm kết thúc</label>
          <select name="yend" id="yend">
            <option value=""></option>
            <option value="2019">2019</option>
            <option value="2020">2020</option>
            <option value="2021">2021</option>
          </select>
        </div>
      </div>
    </div>
  </div>
  <div class="submit">
    <button type="submit" name="sta" class="btn btn-primary">Xuất thống kê</button>
  </div>
  </form>
  </center>
  <div class="result">
  <?php
    if(isset($_POST['sta'])){
      if(isset($_POST['statistic-type']) && !empty($_POST['statistic-type'])){
        $GLOBALS['sta-type']=$_POST['statistic-type'];
        switch ($_POST['statistic-type']) {
          case 'time':
            echo '
            <table border="1">
              <tr>
                <th>Thời gian</th>
                <th>Số đơn hàng</th>
                <th>Doanh thu</th>
              </tr>';
            
            if(isset($_POST['time-sta'])&&!empty($_POST['time-sta'])){
              switch ($_POST['time-sta']) {
                case 'day':
                  if(isset($_POST['start'])&&!empty($_POST['start'])){
                    $dstart = $_POST['start'];
                  }
                  if(isset($_POST['end'])&&!empty($_POST['end'])){
                    $dend = $_POST['end'];
                  }
                  timeStatistic($dstart, $dend);
                  echo '</table>';
                  break;
                case 'month':
                  if(isset($_POST['mstart'])&&!empty($_POST['mstart'])){
                    $mstart = $_POST['mstart'];
                  }
                  if(isset($_POST['mend'])&&!empty($_POST['mend'])){
                    $mend = $_POST['mend'];
                  }
                  mtimeStatistic($mstart, $mend);
                  echo '</table>';
                  break;
                case 'year':
                  if(isset($_POST['ystart'])&&!empty($_POST['ystart'])){
                    $ystart = $_POST['ystart'];
                  }
                  if(isset($_POST['yend'])&&!empty($_POST['yend'])){
                    $yend = $_POST['yend'];
                  }
                  ytimeStatistic($ystart, $yend);
                  echo '</table>';
                  break;
              }
            }
            break;
          case 'product':
            echo '
            <table border="1">
              <tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Doanh thu</th>
              </tr>';
              productStatistic();
            echo '</table>';
            
            break;
          case 'type':
            echo '
            <table border="1">
              <tr>
                <th>Mã loại hàng</th>
                <th>Tên loại hàng</th>
                <th>Doanh thu</th>
              </tr>';
              typeStatistic();
            echo '</table>';
            
            break;
          case 'make':
            echo '
            <table boder="1">
              <tr>
                <th>Mã nhà sản xuất</th>
                <th>Tên nhà sản xuất</th>
                <th>Doanh thu</th>
              </tr>';
              makeStatistic();
            echo '</table>';
            
            break;
        }
      }
    }

    function timeStatistic($start, $end){
      $get_dt = "select NgayDH ,sum(TongTien) as tong,count(SoDonDH) as num from dathang where NgayDH between CAST('$start' AS DATE) and CAST('$end' AS DATE) group by NgayDH";
      $result = executeResult($get_dt);
      foreach ($result as $value) {
        echo '
        <tr>
          <td>Ngày '.$value["NgayDH"].'</td>
          <td>'.$value["num"].'</td>
          <td>'.number_format($value["tong"], 0, ',', '.').'</td>
        </tr>
        ';
      }
    }

    function mtimeStatistic($start, $end){
      $get_dt = "select month(NgayDH) as m ,sum(TongTien) as tong,count(SoDonDH) as num from dathang where month(NgayDH) between '$start' and '$end' group by month(NgayDH)";
      $result = executeResult($get_dt);
      foreach ($result as $value) {
        echo '
        <tr>
          <td>Tháng '.$value["m"].'</td>
          <td>'.$value["num"].'</td>
          <td>'.number_format($value["tong"], 0, ',', '.').'</td>
        </tr>
        ';
      }
    }

    function ytimeStatistic($start, $end){
      $get_dt = "select year(NgayDH) as m ,sum(TongTien) as tong,count(SoDonDH) as num from dathang where year(NgayDH) between '$start' and '$end' group by year(NgayDH)";
      $result = executeResult($get_dt);
      foreach ($result as $value) {
        echo '
        <tr>
          <td>Năm '.$value["m"].'</td>
          <td>'.$value["num"].'</td>
          <td>'.number_format($value["tong"], 0, ',', '.').'</td>
        </tr>
        ';
      }
    }

    function productStatistic(){
      $get_dt = "select c.MSHH, h.TenHH, sum(c.GiaDatHang) as tong 
      from hanghoa h, chitietdathang c, dathang d 
      where h.MSHH = c.MSHH and c.SoDonDH = d.SoDonDH group by c.MSHH 
      order by tong DESC";
      $result = executeResult($get_dt);
      foreach ($result as $value) {
        echo '
        <tr>
          <td>'.$value["MSHH"].'</td>
          <td>'.$value["TenHH"].'</td>
          <td>'.number_format($value["tong"], 0, ',', '.').'</td>
        </tr>
        ';
      }
    }

    function typeStatistic(){
      $get_dt = "select h.MaLoaiHang, l.TenLoaiHang, sum(c.GiaDatHang) as tong 
      from hanghoa h, chitietdathang c, dathang d, loaihanghoa l
      where h.MSHH = c.MSHH and c.SoDonDH = d.SoDonDH and h.MaLoaiHang=l.MaLoaiHang group by h.MaLoaiHang 
      order by tong DESC";
      $result = executeResult($get_dt);
      foreach ($result as $value) {
        echo '
        <tr>
          <td>'.$value["MaLoaiHang"].'</td>
          <td>'.$value["TenLoaiHang"].'</td>
          <td>'.number_format($value["tong"], 0, ',', '.').'</td>
        </tr>
        ';
      }
    }

    function makeStatistic(){
      $get_dt = "select h.mansx, n.tennsx, sum(c.GiaDatHang) as tong 
      from hanghoa h, chitietdathang c, dathang d, nhasanxuat n
      where h.MSHH = c.MSHH and c.SoDonDH = d.SoDonDH and h.mansx=n.mansx group by h.mansx 
      order by tong DESC";
      $result = executeResult($get_dt);
      foreach ($result as $value) {
        echo '
        <tr>
          <td>'.$value["mansx"].'</td>
          <td>'.$value["tennsx"].'</td>
          <td>'.number_format($value["tong"], 0, ',', '.').'</td>
        </tr>
        ';
      }
    }

  ?>
  </div>
  
  <!-- End Content -->
</div>
<?php include("layout/footer.php");?>