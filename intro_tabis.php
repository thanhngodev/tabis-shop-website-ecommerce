

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
      flex: 0 0 80%;
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
  position: absolute;
  left: 25%;
  top: 15%;
  text-align: left;
  width: 70%;
  z-index: 2;
  border-radius: 10px;
  padding: 0 10px;
}
  
</style>

<center>
    <div class="Logo">
        <img src="images/logotabi's.png" alt="logo">
    </div>
</center>
<main role="main">
    <div class="container-divider"></div>
<div class="container">

  <div class="section-container">
    
  <section class="section-content">
      <header class="page-header">
        <h1>
          Giới thiệu về Tabi's
        </h1>
    </div>
        
      </header>
        <ul class="article-list">
          
            <li class="article-list-item" onclick="ask10()">
              
            Giới thiệu
            </li>
            <p id="demo">
            </p>
          
            <li class="article-list-item " onclick="ask11()">
              
            Thông tin về công ty
              
            </li>
        </ul>
        <script>
            function ask10(){
                var str = "<center><h2>Giới thiệu</h2></center> <hr>   <h4>&nbsp;&nbsp;&nbsp;&nbsp; Tabis là một hệ sinh thái thương mại tất cả trong một, gồm các công ty thành viên như:&nbsp;&nbsp;&nbsp;&nbsp;TabisNOW Smart Logistics cung cấp dịch vụ logistics đầu-cuối;<br>&nbsp;&nbsp;&nbsp;&nbsp;Ticketbox mang đến dịch vụ vé sự kiện, xem phim hàng đầu;<br>&nbsp;&nbsp;&nbsp;&nbsp;Đơn vị bán lẻ Tabis Trading và Sàn Giao dịch cung cấp 10 triệu sản phẩm từ 26 ngành hàng phục vụ hàng triệu khách hàng trên toàn quốc.Với phương châm hoạt động “Tất cả vì  &nbsp;&nbsp;&nbsp;&nbsp;Khách Hàng”, Tabis luôn không ngừng nỗ lực nâng cao chất lượng dịch vụ và sản phẩm, từ đó mang đến trải nghiệm mua sắm trọn vẹn cho Khách Hàng Việt Nam với dịch vụ giao  &nbsp;&nbsp;&nbsp;&nbsp;hàng nhanh trong 2 tiếng và ngày hôm sau TabisNOW lần đầu tiên tại Đông Nam Á, cùng cam kết cung cấp hàng chính hãng với chính sách hoàn tiền 111% nếu phát hiện hàng giả, hàng nhái.<br>&nbsp;&nbsp;&nbsp;&nbsp;Thành lập từ tháng 3/2010, Tabis.vn hiện đang là trang thương mại điện tử lọt top 2 tại Việt Nam và top 6 tại khu vực Đông Nam Á. <br>&nbsp;&nbsp;&nbsp;&nbsp;Tabis lọt Top 1 nơi làm việc tốt nhất Việt Nam trong ngành Internet/E-commerce 2018 (Anphabe bình chọn), Top 50 nơi làm việc tốt nhất châu Á 2019 (HR Asia bình chọn). </h4><hr> "
                document.getElementById("demo").innerHTML = str;
            }
            function ask11(){
                var str = "<center><h2>Thông tin về công ty</h2></center> <hr>   <h4> Công ty Cổ Phần TABIS <br> &nbsp;&nbsp;&nbsp;&nbsp;Địa chỉ đăng ký kinh doanh: 29/1, đường số 4, KP.3, P. Bình Khánh, Q.2, TPHCM, Việt Nam <br> &nbsp;&nbsp;&nbsp;&nbsp;Giấy chứng nhận Đăng ký Kinh doanh số 0309532909 do Sở Kế hoạch và Đầu tư Thành phố Hồ Chí Minh cấp ngày 06/01/2010 <br> &nbsp;&nbsp;&nbsp;&nbsp;  </h4><hr>"
                document.getElementById("demo").innerHTML = str;
            }
        </script>

      

    </section>



    <section class="section-content">
      <header class="page-header">
        <h1>
          Các chính sách của Tabis
        </h1>
    </div>
        
      </header>
        <ul class="article-list">
          
            <li class="article-list-item" onclick="ask0()">
              
             Quy chế hoạt động
            </li>
            <p id="demo">
            </p>
          
            <li class="article-list-item " onclick="ask1()">
              
              Điều khoản sử dụng
              
            </li>
          
            <li class="article-list-item " onclick="ask2()">
              
              Chính sách bảo mật thanh toán
              
            </li>
          
            <li class="article-list-item " onclick="ask3()">
              
              Chính sách bảo mật thông tin cá nhân
              
            </li>
          
          
            <li class="article-list-item " onclick="ask5()">
              
              Chính sách bảo hành
              
            </li>
          
        </ul>
        <script>
            function ask0(){
                var str = "<center><h2>Quy chế hoạt động</h2></center> <hr>   <h4>&nbsp;&nbsp;&nbsp;&nbsp;Tabis.vn là sàn giao dịch thương mại điện tử và là website khuyến mại trực tuyến (gọi tắt là Sàn thương mại điện tử Tabis.vn). Quý khách có thể tham khảo thêm tại Quy chế hoạt động sàn thương mại Tabis.</h4><hr> "
                document.getElementById("demo").innerHTML = str;
            }
            function ask1(){
                var str = "<center><h2>Điều khoản sử dụng</h2></center> <hr>   <h4> 1. Giới thiệu Chào mừng quý khách hàng đến với Tabis. Chúng tôi là Công ty Cổ phần TABIS có địa chỉ trụ sở tại 29/1 Đường số 4, Khu phố 3, Phường Bình Khánh, Quận 2, Tp.Hồ Chí Minh, địa chỉ giao dịch: 52 Út Tịch, Phường 4, Quận Tân Bình Tp.Hồ Chí Minh, thành lập Sàn giao dịch thương mại điện tử thông qua website www.Tabis.vn và đã được đăng ký chính thức với Bộ Công Thương Việt Nam.Khi quý khách hàng truy cập vào trang website của chúng tôi có nghĩa là quý khách đồng ý với các điều khoản này. Trang web có quyền thay đổi, chỉnh sửa, thêm hoặc lược bỏ bất kỳ phần nào trong Điều khoản mua bán hàng hóa này, vào bất cứ lúc nào. Các thay đổi có hiệu lực ngay khi được đăng trên trang web mà không cần thông báo trước. Và khi quý khách tiếp tục sử dụng trang web, sau khi các thay đổi về Điều khoản này được đăng tải, có nghĩa là quý khách chấp nhận với những thay đổi đó.Quý khách hàng vui lòng kiểm tra thường xuyên để cập nhật những thay đổi của chúng tôi.<br> 2. Hướng dẫn sử dụng websiteKhi vào web của chúng tôi, khách hàng phải đảm bảo đủ 18 tuổi, hoặc truy cập dưới sự giám sát của cha mẹ hay người giám hộ hợp pháp. Khách hàng đảm bảo có đầy đủ hành vi dân sự để thực hiện các giao dịch mua bán hàng hóa theo quy định hiện hành của pháp luật Việt Nam.Chúng tôi sẽ cấp một tài khoản (Account) sử dụng để khách hàng có thể mua sắm trên website Tabis.vn trong khuôn khổ Điều khoản và Điều kiện sử dụng đã đề ra.Quý khách hàng sẽ phải đăng ký tài khoản với thông tin xác thực về bản thân và phải cập nhật nếu có bất kỳ thay đổi nào. Mỗi người truy cập phải có trách nhiệm với mật khẩu, tài khoản và hoạt động của mình trên web. Hơn nữa, quý khách hàng phải thông báo cho chúng tôi biết khi tài khoản bị truy cập trái phép. Chúng tôi không chịu bất kỳ trách nhiệm nào, dù trực tiếp hay gián tiếp, đối với những thiệt hại hoặc mất mát gây ra do quý khách không tuân thủ quy định.Nghiêm cấm sử dụng bất kỳ phần nào của trang web này với mục đích thương mại hoặc nhân danh bất kỳ đối tác thứ ba nào nếu không được chúng tôi cho phép bằng văn bản. Nếu vi phạm bất cứ điều nào trong đây, chúng tôi sẽ hủy tài khoản của khách mà không cần báo trước.Trong suốt quá trình đăng ký, quý khách đồng ý nhận email quảng cáo từ website. Nếu không muốn tiếp tục nhận mail, quý khách có thể từ chối bằng cách nhấp vào đường link ở dưới cùng trong mọi email quảng cáo.<br> 3. Ý kiến của khách hàngTất cả nội dung trang web và ý kiến phê bình của quý khách đều là tài sản của chúng tôi. Nếu chúng tôi phát hiện bất kỳ thông tin giả mạo nào, chúng tôi sẽ khóa tài khoản của quý khách ngay lập tức hoặc áp dụng các biện pháp khác theo quy định của pháp luật Việt Nam.<br> 4. Chấp nhận đơn hàng và giá cảChúng tôi có quyền từ chối hoặc hủy đơn hàng của quý khách vì bất kỳ lý do gì liên quan đến lỗi kỹ thuật, hệ thống một cách khách quan vào bất kỳ lúc nào. Ngoài ra, để đảm bảo tính công bằng cho khách hàng là người tiêu dùng cuối cùng của Tabis, chúng tôi cũng sẽ từ chối các đơn hàng không nhằm mục đích sử dụng cho cá nhân, mua hàng số lượng nhiều hoặc với mục đích mua đi bán lại. Chúng tôi cam kết sẽ cung cấp thông tin giá cả chính xác nhất cho người tiêu dùng. Tuy nhiên, đôi lúc vẫn có sai sót xảy ra, ví dụ như trường hợp giá sản phẩm không hiển thị chính xác trên trang web hoặc sai giá, tùy theo từng trường hợp chúng tôi sẽ liên hệ hướng dẫn hoặc thông báo hủy đơn hàng đó cho quý khách. Chúng tôi cũng có quyền từ chối hoặc hủy bỏ bất kỳ đơn hàng nào dù đơn hàng đó đã hay chưa được xác nhận hoặc đã thanh toán. <br> 5. Thay đổi hoặc hủy bỏ giao dịch tại Tabis Trong mọi trường hợp, khách hàng đều có quyền chấm dứt giao dịch nếu đã thực hiện các biện pháp sau đây: Thông báo cho Tabis về việc hủy giao dịch qua đường dây nóng (hotline) 1900-6035 hoặc lời ghi nhắn tại Trả lại hàng hoá đã nhận nhưng chưa sử dụng hoặc hưởng bất kỳ lợi ích nào từ hàng hóa đó (theo quy định của chính sách đổi trả hàng tại <br> 6. Giải quyết hậu quả do lỗi nhập sai thông tin tại Tabis Khách hàng có trách nhiệm cung cấp thông tin đầy đủ và chính xác khi tham gia giao dịch tại Tabis. Trong trường hợp khách hàng nhập sai thông tin và gửi vào trang TMĐT Tabis.vn, Tabis có quyền từ chối thực hiện giao dịch. Ngoài ra, trong mọi trường hợp, khách hàng đều có quyền đơn phương chấm dứt giao dịch nếu đã thực hiện các biện pháp sau đây: Thông báo cho Tabis qua đường dây nóng 1900-6035 hoặc lời nhập nhắn tại địa chỉ Trả lại hàng hoá đã nhận nhưng chưa sử dụng hoặc hưởng bất kỳ lợi ích nào từ hàng hóa đó. Trong trường hợp sai thông tin phát sinh từ phía Tabis mà Tabis có thể chứng minh đó là lỗi của hệ thống hoặc từ bên thứ ba (sai giá sản phẩm, sai xuất xứ, …), Tabis sẽ đền bù cho khách hàng một mã giảm giá cho các lần mua sắm tiếp theo với mệnh giá tùy từng trường hợp cụ thể và có quyền không thực hiện giao dịch bị lỗi. <br> 7. Thương hiệu và bản quyền Mọi quyền sở hữu trí tuệ (đã đăng ký hoặc chưa đăng ký), nội dung thông tin và tất cả các thiết kế, văn bản, đồ họa, phần mềm, hình ảnh, video, âm nhạc, âm thanh, biên dịch phần mềm, mã nguồn và phần mềm cơ bản đều là tài sản của chúng tôi. Toàn bộ nội dung của trang web được bảo vệ bởi luật bản quyền của Việt Nam và các công ước quốc tế. Bản quyền đã được bảo lưu. <br> 8. Quyền pháp lý Các điều kiện, điều khoản và nội dung của trang web này được điều chỉnh bởi luật pháp Việt Nam và Tòa án có thẩm quyền tại Việt Nam sẽ giải quyết bất kỳ tranh chấp nào phát sinh từ việc sử dụng trái phép trang web này.<br> 9. Quy định về bảo mật Trang web của chúng tôi coi trọng việc bảo mật thông tin và sử dụng các biện pháp tốt nhất bảo vệ thông tin và việc thanh toán của quý khách. Thông tin của quý khách trong quá trình thanh toán sẽ được mã hóa để đảm bảo an toàn. Sau khi quý khách hoàn thành quá trình đặt hàng, quý khách sẽ thoát khỏi chế độ an toàn.Quý khách không được sử dụng bất kỳ chương trình, công cụ hay hình thức nào khác để can thiệp vào hệ thống hay làm thay đổi cấu trúc dữ liệu. Trang web cũng nghiêm cấm việc phát tán, truyền bá hay cổ vũ cho bất kỳ hoạt động nào nhằm can thiệp, phá hoại hay xâm nhập vào dữ liệu của hệ thống. Cá nhân hay tổ chức vi phạm sẽ bị tước bỏ mọi quyền lợi cũng như sẽ bị truy tố trước pháp luật nếu cần thiết.Mọi thông tin giao dịch sẽ được bảo mật ngoại trừ trong trường hợp cơ quan pháp luật yêu cầu.  </h4><hr>"
                document.getElementById("demo").innerHTML = str;
            }
            function ask2(){
                var str = "<center><h2>Chính sách bảo mật thanh toán</h2></center> <hr>   <h4>&nbsp;&nbsp;&nbsp;&nbsp; Thông tin thanh toán của khách hàng trên Tabis được cam kết bảo mật tuyệt đối theo chính sách bảo mật thông tin thanh toán của Tabis. Quý khách vui lòng tham khảo chi tiết tại Chính sách bảo mật thanh toán.  </h4><hr>"
                document.getElementById("demo").innerHTML = str;
            }
            function ask3(){
                var str = "<center><h2>Chính sách bảo mật thông tin cá nhân</h2></center> <hr>   <h4>&nbsp;&nbsp;&nbsp;&nbsp;  Thông tin cá nhân của khách hàng trên Tabis được cam kết bảo mật tuyệt đối theo chính sách bảo vệ thông tin cá nhân của Tabis. Quý khách vui lòng tham khảo chi tiế tại Chính sách bảo mật thông tin cá nhân. </h4><hr>"
                document.getElementById("demo").innerHTML = str;
            }
            function ask5(){
                var str = "<center><h2>Chính sách bảo hành</h2></center> <hr>   <h4>&nbsp;&nbsp;&nbsp;&nbsp; 1. Tôi có thể bảo hành sản phẩm tại đâu?<br>- Bảo hành chính hãng: khách hàng có thể mang sản phẩm đến trực tiếp hãng để bảo hành mà không cần thông qua Tabis. Quý khách có thể tham khảo thông tin liên hệ trung tâm bảo hành tại:<br>Danh sách trung tâm bảo hành.<br>- Bảo hành thông qua Tabis: khách hàng liên hệ Tabis để được hỗ trợ tư vấn về bảo hành hoặc khách hàng có thể chủ động đến trực tiếp nhà bán hàng để được bảo hành sản phẩm.<br><hr>&nbsp;&nbsp;&nbsp;&nbsp; 2. Tôi có thể được bảo hành sản phẩm miễn phí không?<br>Sản phẩm của quý khách được bảo hành miễn phí chính hãng khi:<br>Còn thời hạn bảo hành (dựa trên tem/phiếu bảo hành hoặc thời điểm kích hoạt bảo hành điện tử).<br>Tem/phiếu bảo hành còn nguyên vẹn.<br>Sản phẩm bị lỗi kỹ thuật.<br>Các trường hợp có thể phát sinh phí bảo hành:<br>Sản phẩm hết thời hạn bảo hành.<br>Sản phẩm bị bể, biến dạng, cháy, nổ, ẩm thấp trong động cơ hoặc hư hỏng trong quá trình sử dụng.<br><hr>&nbsp;&nbsp;&nbsp;&nbsp; 3. Sau bao lâu tôi có thể nhận lại sản phẩm bảo hành? <br>Nếu sản phẩm của quý khách vẫn còn trong thời hạn bảo hành, Tabis khuyến khích quý khách gửi trực tiếp đến trung tâm của hãng để được hỗ trợ bảo hành trong thời gian nhanh nhất.<br>Trường hợp quý khách gửi hàng về Tabis, thời gian bảo hành dự kiến trong vòng 21- 45 ngày tùy thuộc vào điều kiện sẵn có của linh kiện thay thế từ nhà sản xuất/lỗi sản phẩm (không tính thời gian vận chuyển đi và về). Đối với sản phẩm của Apple (iPhone, iPad, Macbook,…), thời gian hoàn tất bảo hành dự kiến từ 30 đến 60 ngày.  </h4><hr>"
                document.getElementById("demo").innerHTML = str;
            }
        </script>

      

    </section>
  </div>
</div>

  </main>
