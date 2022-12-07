
<?php
  include("session.php");
  include("./layout/header.php"); 

?>
<Style>
.container {
    max-width: 1160px;
    margin: 0 auto;
    padding: 0 5%;
}
.blocks-list {
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-start;
    list-style: none;
    padding: 0;
}
.blocks-item {
    margin: 0 15px 30px;
}
.blocks-item {
    border: 0px solid #ffffff;
    background-color: white;
    border-radius: 59px;
    border-radius: 15px;
    box-sizing: border-box;
    color: #0072EF;
    display: flex;
    flex: 1 0 340px;
    flex-direction: column;
    justify-content: center;
    margin: 0 0 30px;
    max-width: 100%;
    text-align: center;
    margin: 10px 15px 10px 15px;
}
h4.blocks-item-title {
    margin-top: 10px;
}
.blocks-item-link {
    color: #0072EF;
    padding: 15px 25px;
}

.promoted-articles {
    display: flex;
    flex-direction: column;
    flex-wrap: wrap;
}
.main {
    width: 100%;
    height: auto;
    background: rgb(235, 232, 232);
    padding-bottom: 7%;
}
.footer {
    width: 100%;
    height: auto;
    clear: both;
    background: #ffffff00;
    margin-top: 12%;
}
ul {
    list-style: none;
    margin: 0;
    padding: 0;
}
.promoted-articles-item a {
    display: block;
    border-bottom: 1px solid #ddd;
    padding: 15px 0;
    color: #333333;
}
</Style>
<br>
<main role="main">
  <div class="container">
    <h2 >Các câu hỏi thường gặp</h2>
    <form action="confirm_ask.php" method="$_GET">
    <section class="section knowledge-base">
      <section class="categories blocks">
        <ul class="blocks-list">
          <li class="blocks-item" onclick="window.location.href='./confirm_ask.php'">
            <h4 class="blocks-item-title">Tài khoản của tôi</h4>
            <p class="blocks-item-description"></p>
          </li>
          <li class="blocks-item" onclick="window.location.href='./confirm_ask.php'">
            <h4 class="blocks-item-title">Đặt hàng và thanh toán</h4>
            <p class="blocks-item-description"></p>
          </li>
          <li class="blocks-item" onclick="window.location.href='./confirm_ask.php'">
            <h4 class="blocks-item-title">Giao nhận hàng</h4>
            <p class="blocks-item-description"></p>
          </li>
          <li class="blocks-item" onclick="window.location.href='./intro_tabis.php'">
            <h4 class="blocks-item-title">Bảo hành và bồi hoàn</h4>
            <p class="blocks-item-description"></p>
          </li>
          <li class="blocks-item" onclick="window.location.href='./intro_tabis.php'">
              <h4 class="blocks-item-title">Điều khoản sử dụng</h4>
              <p class="blocks-item-description"></p>
          </li>
          <li class="blocks-item" onclick="window.location.href='./intro_tabis.php'">
              <h4 class="blocks-item-title">Thông tin về Tabi's</h4>
              <p class="blocks-item-description"></p>
          </li>
        </ul>
      </section>
      <section class="articles">
        <h3>Bài viết được thăng hạng</h3>
        <br>
        <ul class="article-list promoted-articles">
          <li class="promoted-articles-item" onclick="window.location.href='./confirm_ask.php'">
            Dịch vụ Tabi's
          </li>
          <li class="promoted-articles-item" onclick="window.location.href='./confirm_ask.php'">
            Làm thế nào để tôi theo dõi tiến trình xử lý đơn hàng tại Tabi's?
          </li>
        </ul>
      </section>
    </section>
    </form>
  <section class="section activity">
  </section>
  </div>
</main>
<?php include("./footer_ask.php") ?>