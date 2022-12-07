<?php
  include("session.php");
?>
<style>
body{
  background-color: lightblue;
}
.category-container {
    display: flex;
    justify-content: flex-end;
  }
  
  .category-content {
    flex: 1;
  }
  
  @media (min-width: 1024px) {
    .category-content {
      flex: 0 0 90%;
    }
  }
  
  .section-tree {
    flex-direction: column;
    flex-wrap: wrap;
    justify-content: space-between;
  }
  
  @media (min-width: 768px) {
    .section-tree {
      flex-direction: row;
    }
  }
  
  .section-tree .section {
    flex: initial;
  }
  
  @media (min-width: 768px) {
    .section-tree .section {
      flex: 0 0 45%;
      /* Two columns for tablet and desktop. Leaving 5% separation between columns */
    }
  }
  
  .section-tree-title {
    margin-bottom: 0;
  }
  
  .section-tree-title a {
    color: #333333;
    text-decoration:none
  }
  
  .section-tree .see-all-articles {
    display: block;
    padding: 15px 0;
  }
  
  .article-list-item {
    font-size: 17px;
    padding: 15px 0;
    list-style: none;
    color: #333333;
    text-decoration: none !important;
}
 
img {
    width: 15%;
}
p{
  background-color: rgba(0, 0, 0, .4);
  color: #f1f1f1;
  position: fixed;
  left: 45%;
  top: 15%;
  text-align: left;
  width: 50%;
  z-index: 2;
  border-radius: 10px;
}
  
</style>

<center>
    <div class="logo">
        <img src="images/logotabi's.png" alt="logo">
    </div>
</center>
<div class="category-container">
    <div class="category-content">
      <header class="page-header">
        <h1>Tài khoản của tôi</h1>
        
      </header>

      <div class="section-tree">
        
          <section class="section">
            <h3 class="section-tree-title">
              <a href="./signup.php">Đăng ký tài khoản </a>
            </h3>
            
              <ul class="article-list" >
                
                  <li class="article-list-item" onclick="ask2()" >
                    
                    Làm cách nào để tôi đăng ký tài khoản trên website Tabi's?
                        <p id="demo">
                        </p>
                  </li>
                  <script>
                        function ask2(){
                            var str = "<center><h2>Làm cách nào để tôi đăng ký tài khoản trên website Tabi's?</h2></center> <hr>&nbsp; Bước 1: Chọn mục đăng nhập nằm phí trên kế bên giỏ hàng <br><hr> &nbsp;Bước 2: Chọn mục đăng ký <br><hr>&nbsp; Bước 3: Lúc này đã hiện form đăng ký, nhập đầy đủ thông tin <br><hr>&nbsp; Bước 4: click vào nút đăng ký là đăng ký thành công <hr> "
                            document.getElementById("demo").innerHTML = str;
                        }
                  </script>
                    
                
                  <li class="article-list-item" onclick="ask3()">
                    
                    Tại sao tôi nên đăng ký tài khoản tại Tabi's?
                    
                  </li>
                  <script>
                        function ask3(){
                            var str = "<center><h2>Tại sao tôi nên đăng ký tài khoản tại Tabi's?</h2></center> <hr> Khi đăng ký tài khoản tại Tabi's, quý khách sẽ:<br><br>&nbsp;- Thường xuyên được cập nhật những thông tin sản phẩm hữu ích cũng như thông tin khuyến mãi, giảm giá có tại website Tabi's.vn.<br>&nbsp;- Dễ dàng theo dõi tình trạng đơn hàng của mình khi đặt hàng.<br>&nbsp;- Thao tác nhanh hơn khi đặt những đơn hàng tiếp theo. Hệ thống sẽ tự động lưu trữ và điền sẵn các thông tin cá nhân của quý khách cho những đơn hàng sau.<br>&nbsp;- Tích lũy và sử dụng Tabi's Xu khi mua hàng.<br>&nbsp;- Tabi's thường xuyên có những chương trình ưu đãi, dành riêng cho các khách hàng đã đăng kí tài khoản tại website Tabi's.vn.<br><hr>Việc đăng kí tài khoản tại Tabi's rất đơn giản, quý khách có thể tham khảo tại:  <br>&nbsp;Các bước đăng ký tài khoản mới. "
                            document.getElementById("demo").innerHTML = str;
                        }
                  </script>
                
              </ul>
              
            
          </section>
        
          <section class="section">
            <h3 class="section-tree-title">
              <a href="./login.php">Đăng nhập</a>
            </h3>
            
              <ul class="article-list">
                
                  <li class="article-list-item" onclick="ask4()">
                    
                    Làm cách nào để tôi có thể đăng nhập vào Tabi's trên website?
                  </li>
                  <script>
                        function ask4(){
                          var str = "<center><h2>Làm cách nào để tôi có thể đăng nhập vào Tabi's trên website?</h2></center> <hr>&nbsp; Bước 1: Chọn mục đăng nhập nằm phí trên kế bên giỏ hàng <br><hr> &nbsp;Bước 2: Chọn mục đăng nhập <br><hr>&nbsp; Bước 3: Lúc này đã hiện form đăng nhập, nhập đầy đủ thông tin <br><hr>&nbsp; Bước 4: click vào nút đăng nhập là đăng nhập thành công <hr> "
                            document.getElementById("demo").innerHTML = str;
                        }
                  </script>
                
                  <li class="article-list-item" onclick="ask5()">
                    
                    Tại sao tôi không đăng nhập được?
                    
                  </li>
                  <script>
                        function ask5(){
                          var str = "<center><h2>Tại sao tôi không đăng nhập được?</h2></center> <hr><h3>&nbsp;&nbsp;&nbsp;&nbsp;Nguyên nhân do bạn chưa có tài khoản !!! <br>&nbsp;&nbsp;&nbsp;&nbsp;=> Hãy đăng ký tài khoản nhé !!!"
                            document.getElementById("demo").innerHTML = str;
                        }
                  </script>
                
              </ul>
          </section>
        

          <section class="section">
            <h3 class="section-tree-title">
              <a href="./login.php">Quản lý tài khoản</a>
            </h3>
            
              <ul class="article-list">
                
              <li class="article-list-item" onclick="ask6()">
                  
                  Làm thế nào để tôi quản lý thông tin trong tài khoản?
                  
                </li>
                <script>
                      function ask6(){
                        var str = "<center><h2>Làm thế nào để tôi quản lý thông tin trong tài khoản?</h2></center> <hr>&nbsp;&nbsp;&nbsp;&nbsp;Sau khi hoàn tất quá trình tạo tài khoản và đăng nhập vào website Tabi's thành công. Quý khách có thể kiểm tra và theo dõi thông tin tài khoản ở Tabi's bằng cách chọn thông tin cần kiểm tra trên thanh đăng nhập hoặc truy cập vào “Tài khoản của tôi”."
                          document.getElementById("demo").innerHTML = str;
                      }
                </script>
                  <li class="article-list-item" onclick="ask7()">
                  
                  Làm cách nào để tôi thay đổi mật khẩu tại Tabi's?
                  
                </li>
                <script>
                        function ask7(){
                          var str = "<center><h2>Tại sao tôi không đăng nhập được?</h2><hr><h4>&nbsp;&nbsp;&nbsp;&nbsp;Quý khách có thể thay đổi mật khẩu cho tài khoản bằng cách đăng nhập vào trang quản lý tài khoản và thực hiện theo các bước sau:</h4></center> &nbsp;&nbsp;&nbsp;&nbsp;1. Vào phần thông tin tài khoản <br>&nbsp;&nbsp;&nbsp;&nbsp; 2. Thay đổi mật khẩu<br>&nbsp;&nbsp;&nbsp;&nbsp;3. Bấm Cập nhật "
                            document.getElementById("demo").innerHTML = str;
                        }
                  </script>
                
              </ul>
          </section>
      </div>
    </div>
  </div>
</div>


<div class="category-container">
    <div class="category-content">
      <header class="page-header">
        <h1>Đặt hàng và thanh toán</h1>
        
      </header>

      <div class="section-tree">
        
          <section class="section">
            <h3 class="section-tree-title">
              <a href="#">Hướng dẫn đặt hàng</a>
            </h3>
            
              <ul class="article-list">
              <script>
                        function ask8(){
                          var str = "<center><h2>Làm thế nào để tôi đặt hàng qua website Tabi's?</h2></center> <hr>&nbsp; Bước 1: Chọn vào sản phẩm muốn mua <br><hr> &nbsp;Bước 2: Chọn số lượng và nhấn Chọn mua trên trang chi tiết <br><hr>&nbsp; Bước 3: Trong trang giỏ hàng nhấn Tiến hành đặt hàng <br><hr>&nbsp; Bước 4: Chọn thình thức giao hàng, hình thức thanh toán và nhấn Đạt mua <hr> "
                            document.getElementById("demo").innerHTML = str;
                        }
                  </script>
                  <li class="article-list-item" onclick="ask8()" >
                    
                    Làm thế nào để tôi đặt hàng qua website Tabi's?
                    
                  </li>
                  
                  <li class="article-list-item" onclick="ask9()" >
                    
                    Tabi's có xác nhận đơn hàng với tôi không?
                    
                  </li>
                  <script>
                        function ask9(){
                          var str = "<center><h2>Tabi's có xác nhận đơn hàng với tôi không?</h2></center> <hr>&nbsp;&nbsp;&nbsp;&nbsp;Nhân viên của Tabi's sẽ xác nhận lại tất cả đơn hàng của Quý Khách trước khi nó được giao cho bên vận chuyển."
                          document.getElementById("demo").innerHTML = str;
                        }
                  </script>
                
                  <li class="article-list-item" onclick="ask10()" >
                    
                    Làm thế nào để tôi tìm được sản phẩm?
                    
                  </li>
                  <script>
                        function ask10(){
                          var str = "<center><h2>Làm thế nào để tôi tìm được sản phẩm?</h2></center> <hr>&nbsp;&nbsp;&nbsp;&nbsp;Quý khách có thể nhập từ khóa cần tìm lên thanh tìm kiếm của website Tabi's để tìm được sản phẩm như mong muốn."
                          document.getElementById("demo").innerHTML = str;
                        }
                  </script>
                  <li class="article-list-item" onclick="ask11()">
                    
                    Làm thế nào để tôi đặt nhiều sản phẩm vào cùng 1 đơn hàng?
                    
                  </li>
                  <script>
                        function ask11(){
                          var str = "<center><h2>Làm thế nào để tôi đặt nhiều sản phẩm vào cùng 1 đơn hàng?</h2></center> <hr>&nbsp;&nbsp;&nbsp;&nbsp;Sau khi sản phẩm được thêm vào giỏ hàng, Quý khách có thể trở về trang sản phẩm để tiếp tục mua sắp mà không cần thiết phải nhấn vào Tiến hành đặt hàng ngay."
                          document.getElementById("demo").innerHTML = str;
                        }
                  </script>
              </ul>
              
            
          </section>
        
        
          <section class="section">
            <h3 class="section-tree-title">
              <a href="#">Các câu hỏi thường gặp</a>
            </h3>
            
              <ul class="article-list">
                
                  <li class="article-list-item" onclick="ask12()">
                    
                    Tabi's bán những sản phẩm gì?
                    
                  </li>
                  <script>
                        function ask12(){
                          var str = "<center><h2>Tabi's bán những sản phẩm gì?</h2></center> <hr>&nbsp; - Điện thoại - Laptop <br><hr> &nbsp;- Điện tử - Điện lạnh <br><hr>&nbsp; - Thời trang - Phụ kiện <br><hr>&nbsp; - Nhà cửa - Đời sống<hr> "
                            document.getElementById("demo").innerHTML = str;
                        }
                  </script>

                  <li class="article-list-item" onclick="ask13();">
                    
                   Làm thế nào để tôi nhận biết sản phẩm còn hay hết hàng?
                    
                  </li>

                  <script>
                        function ask13(){
                          var str = "<center><h2>Làm thế nào để tôi nhận biết sản phẩm còn hay hết hàng?</h2></center> <hr>&nbsp;&nbsp;&nbsp;&nbsp;Sau khi nhấn vào đặt mua ở trang xác nhận đặt hàng, Nếu số lượng sản phẩm không còn đủ thì sẽ hiện thông báo đặt hàng không thành công."
                          document.getElementById("demo").innerHTML = str;
                        }
                  </script>
              </ul>
            
          </section>
        
      </div>
    </div>
  </div>
</div>






  </main>
  <?php include("./footer_ask.php") ?>