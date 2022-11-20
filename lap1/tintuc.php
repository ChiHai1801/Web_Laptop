<!--File: template.html
    @IT student: 
    Tran Thi Kim Ngan, nganb1910109@student.ctu.edu.vn
    @Created: 13/12/2021-->

    <!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/ico" href="images/favicon.ico" />
    <link rel="stylesheet" href="./css/template.css">
    <link rel="stylesheet" href="./css/tintuc.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <title>Tin tức</title>
</head>

<body class="page">
    <header class="header" >

        <a id="logo" class="header__logo"  href="#!"  >
            <p><b>NÔNG SẢN VIỆT</b></p>
        </a>
        <div class="button__login-register">
            <a class="bt button__login"  href="./dangnhap.html" class="menu-bth">Đăng nhập</a>
            <a class="bt button__register"   href="./dangky.html" class="menu-bth">Đăng Ký</a>
            
        </div>
        
        <nav class="header__nav"> 
            <div class="nav__search">
                <input type="text" placeholder="Nhập nội dung cần tìm" height="30px">
                <button type="submit"><i class="fa fa-search"></i></button>
                <div class="shopping-card">
                    <a href="./giohang.html">
                        <p class="no-ordered-items">0</p>
                        <i class=" fas fa-shopping-cart cart"></i> 
                    </a>
                </div> 
            </div>
            <span class="nav__small__icon"><i class="fas fa-bars"></i></span>
    
            <div class="nav__link">
                <a class="nav__link--items"  href="./trangchu.html" class="menu-bth">Trang chủ</a>
                <a class="nav__link--items"  href="./gioithieu.html" class="menu-bth">Giới thiệu</a>
                <a class="nav__link--items new__link"  href="./tintuc.html" class="menu-bth">Tin Tức</a>
                <a class="nav__link--items nav__login-register"  href="./dangnhap.html" class="menu-bth">Đăng nhập</a>
                <a class="nav__link--items nav__login-register"  href="./dangky.html" class="menu-bth">Đăng Ký</a>
                <a class="nav__link--items contact__link"  href="./lienhe.html" class="menu-bth">Liên Hệ</a>
            </div>
        </nav>    
    </header >
    
    <main class="main two__column__one__row" >
        <aside class="new_aside">
            <!--nội dung  bên trái-->
            <!--phần lề-->
            <h1 class="aside_title aside_title--primary">ĐƯỢC QUAN TÂM
            </h1>
            <img class="aside_image" src="./images/new/new.jpg" alt="" width="400px">
            <h2 class="aside_title aside_title--secondary">ĐĂNG KÝ THÀNH VIÊN - NHẬN NGAY ƯU ĐÃI
            </h2>
            <p class="aside_content">
                Đăng ký ngay để mua sắm dễ dàng hơn và tận hưởng thêm nhiều ưu đãi độc quyền cho thành viên.

            </p>
        </aside>

        <article class="new_article ">
            <!-- nội dung bên phải  -->
            <h1 class="article_title article_title--primary ">TIN TỨC</h1>

            <div class="col_3-9">

                <!--phần tin tức-->
                <h2 class="section_title section_title--secondary ">Thái rau củ quả rồi mới rửa sạch làm hao hụt chất dinh dưỡng, chất chống oxy hóa</h2>
                <div class="article_section_content ">

                    <div>
                        <img class="section_image " src="./images/new/tt1.jpg " alt=" "></div>
                    <div>
                        <p class="section_content  ">
                            Theo Healthline, rau củ quả được thái, cắt nhỏ rồi rửa bằng nước sẽ làm tăng diện tích tiếp xúc giữa những loại thực phẩm này và nước. Đây là nguyên nhân dẫn đến tình trạng mất các vitamin có khả năng hòa tan trong nước như vitamin B, C và một số khoáng
                            chất, làm mất tính chống oxy hóa. Trong khi ai cũng biết, chất chống oxy hóa có vai trò cực quan trọng để phòng chống ung thư.


                            <div id="full1" class="content_span content_span--extra-off">
                                <p>Thái rau củ quả rồi mới rửa sạch vô hình trung làm mất luôn khả năng phòng chống căn bệnh mãn tính nguy hiểm này. Nguồn: kenh14.vn</p>
                            </div>
                            <a href="#!" class="read-more-less" > Xem thêm</a>
                        </p>
                    </div>
                </div>

                <h2 class=" section_title section_title--secondary ">Giám đốc hệ thống điện thoại đi bán rau, thịt, trứng đồng giá giữa đại dịch Covid-19</h2>
                <div class="article_section_content ">
                    <div>
                        <img class="section_image " src="./images/new/tt2.png " alt=" "></div>
                    <div>
                        <p class="section_content ">
                            Nhằm hỗ trợ người dân TP.HCM có thể mua sắm lương thực, thực phẩm giữa đại dịch Covid-19, Sở công thương đã kêu gọi các doanh nghiệp cùng chung tay giải quyết vấn đề này. Ông Nguyễn Ngọc Đạt - Giám đốc một hệ thống bán lẻ smartphone tại TP.HCM, cho biết
                            sau khi nhận được thông tin từ Sở, đã làm việc với một số đối tác có kinh nghiệm về nguồn cung thực phẩm để mở cửa hàng rau củ, thịt, cá đồng giá.
                            <div class=" content_span content_span--extra-off" id="full">
                                <p>"Tôi thấy nhiều bạn bè, người xung quanh gặp khó khăn trong việc mua rau củ, trái cây, thịt, trứng…Tôi hành động vì nghĩ sẽ hỗ trợ một phần để giải quyết vấn đề đó", ông Đạt nói. Ông đặt tên cho hệ thống bán rau quả di
                                    động này là FoodShare. Cửa hàng đầu tiên đã đi vào hoạt động từ ngày 17/7 trên đường Nguyễn Hữu Cảnh, quận Bình Thạnh, TP.HCM. Các sản phẩm đều được bán đồng giá. Theo đó, tùy vào loại rau củ sẽ có giá 20.000-30.000
                                    đồng/ký, trứng gà 30.000 đồng/vỉ 10 trứng, thịt heo 120.000 đồng/kg… Người dân có thể đến trực tiếp cửa hàng để mua hoặc đặt online. Nguồn: kenh14</p>
                            </div>
                            <a href="#!" class="read-more-less" > Xem thêm</a>
                        </p>
                    </div>
                </div>

                <h2 class="section_title section_title--secondary ">Nhật Bản có loại quả mọc dại đầy đường không ai hái, về đến Việt Nam có giá lên tới 4 triệu/kg, chỉ dành cho hội nhà giàu?</h2>
                <div class="article_section_content ">
                    <div>
                        <img class="section_image  " src="./images/new/tt3.png " alt=" "></div>
                    <div>
                        <p class="section_content ">
                            Nói đâu xa, mới đây một thanh niên sống ở Nhật đã đăng video lên TikTok chia sẻ về biwa - một loại trái cây mà người dân xứ sở mặt trời mọc chỉ trồng để làm cảnh, nhưng người Việt chúng ta lại đua nhau săn lùng với giá lên tới cả triệu đồng/kg.
                            <div id="full3" class="content_span content_span--extra-off">
                                <p>Được biết, biwa còn được gọi là nhót Nhật, thanh trà Nhật. Chúng thường mọc dại rất nhiều ven đường, từ khoảng tháng 3 đến tháng 6 thì chín rụng đầy gốc. Người Nhật trồng loại cây này chủ yếu để lấy bóng mát chứ họ không
                                    ăn. Ở siêu thị Nhật cũng có bán biwa nhưng mức giá khá mềm, tính ra tiền Việt chỉ khoảng hơn 100k/kg. Tuy nhiên khi về tới Việt Nam, loại quả này bị đội giá lên gấp nhiều lần, thậm chí còn được liệt vào danh sách những
                                    loại quả chỉ dành cho "hội nhà giàu". Nguồn: kenh14</p>
                            </div>
                            <a href="#!" class="read-more-less" > Xem thêm</a>
                        </p>
                    </div>
                </div>

                <h2 class="section_title section_title--secondary ">200 tấn rau củ quả "ế ", người dân Hà Nội đổ ngoài đồng</h2>
                <div class="article_section_content ">
                    <div>
                        <img class="section_image " src="./images/new/tt4.jpg " alt=" "></div>
                    <div>
                        <p class="section_content ">
                            Hàng tấn cà chua, su hào… của người dân đến vụ thu hoạch nhưng không ai mua, nhiều gia đình (tại xã Tráng Việt (Mê Linh, TP. Hà Nội) phải nhổ bỏ vứt la liệt đầy đường, thậm chí mang về cho gà, lợn ăn cũng không hết.
                            <div id="full4" class="content_span content_span--extra-off">
                                <p>
                                    Ngày 28/2, theo ghi nhận của Tiền Phong tại xã Tráng Việt, những ruộng cà chua chín mọng đỏ rực cả cánh đồng, nhưng rất ít bóng người đến thu hoạch. “Chưa bao giờ, chúng tôi lâm vào hoàn cảnh như thế này. Cà chua chín cả ruộng nhưng bán không ai mua.
                                    Giờ ai hỏi, giá mấy tôi cũng bán để đỡ tốn công nhổ mà cũng không có ai. Trong làng, có nhà đưa ra chợ bán mỗi ngày được vài chục cân với giá 500 - 1.000 đồng, còn nhà tôi giờ chỉ có đổ đi hoặc cho gà ăn nhưng nó ăn
                                    mãi cũng chán”, bà Thoan ngậm ngùi nói. Nguồn: kenh14
                                </p>
                            </div>
                            <a href="#!" class="read-more-less" > Xem thêm</a>
                        </p>
                    </div>
                </div>

                <h2 class="section_title section_title--secondary ">
                    Đầu bếp khách sạn 5 sao cảnh báo không ăn cà chua cùng thứ này vì mất hết vitamin C, đáng tiếc người Việt luôn kết hợp vì thấy ngon và đẹp mắt
                </h2>
                <div class="article_section_content ">
                    <div>
                        <img class="section_image " src="./images/new/tt5.jpg " alt="tt5.jpg ">
                    </div>
                    <div>
                        <p class="section_content ">
                            Dưa chuột kết hợp cà chua có thể làm phân hủy hết lượng vitamin C cần thiết mà cơ thể cần. Dưa chuột và cà chua là hai loại rau quả thường xuyên được kết hợp với nhau trong thực đơn ăn uống hàng ngày của người Việt. Nhiều gia đình có thói quen rang cơm
                            với cà chua cho sắc màu đẹp mắt, khi ăn lại phải ăn kèm với dưa chuột muối chua ngọt. Phải như vậy món ăn mới thể hiện đúng chất đậm đà, khoái khẩu.
                            <div id="full5" class="content_span content_span--extra-off">
                                <p>
                                    Những thói quen kết hợp dưa chuột với cà chua kiểu này được đầu bếp N.D - một đầu bếp có 7 năm kinh nghiệm nấu nướng tại khách sạn 5 sao ở Hà Nội - cảnh báo gây hao hụt dinh dưỡng, thậm chí lượng vitamin C sẽ bị phân giải hoàn toàn thay vì được hấp thu
                                    vào cơ thể. Dưa chuột là một món ăn có chứa enzyme phân hủy vitamin C, trong khi cà chua là loại quả chứa lượng vitamin C dồi dào. Khi kết hợp với nhau, giá trị dinh dưỡng trong cà chua sẽ bị hao hụt đáng kể. Cựu đại
                                    tá, lương y đa khoa Bùi Hồng Minh (Nguyên Chủ tịch Hội Đông y Ba Đình, Hà Nội) cũng nhận định không nên ăn cà chưa với dưa chuột vì catabolic - enzyme có trong dưa chuột sẽ phá hủy lượng vitamin C dồi dào trong cà chua
                                    cũng như nhiều loại rau củ giàu vitamin C khác. Nguồn: cafef.vn
                                </p>
                            </div>
                            <a href="#!" class="read-more-less" > Xem thêm</a>
                        </p>
                    </div>
                </div>

                <h2 class="section_title section_title--secondary ">Săn lùng bí ngô "siêu khổng lồ " nửa tạ giá chục triệu trưng nhà, cửa hàng Hà Nội bán cả tấn quả cận lễ Halloween</h2>
                <div class="article_section_content ">
                    <div>
                        <img class="section_image " src="./images/new/tt6.jpg " alt="tt6.jpg ">
                    </div>
                    <div>
                        <p class="section_content ">
                            Bí ngô mini có giá từ hàng trăm ngàn đồng mỗi cân, quả bí 'siêu khổng lồ' nặng vài chục cân mỗi quả có giá cả chục triệu đồng đang 'cháy' hàng trên thị trường dù chưa đến ngày lễ Halloween.

                            <div id="full6" class="content_span content_span--extra-off">
                                <p>
                                    Chia sẻ với PV Infonet, anh Hà Minh Khôi, chủ cửa hàng hoa tươi Khoi Ha Flower Boutique ở Hồ Xuân Hương (quận Hai Bà Trưng, Hà Nội) đang bán những quả bí "siêu khổng lồ " cho biết, bí ngô khổng lồ tại cửa hàng được đặt tại nhà vườn ở Đà Lạt. Bí có màu
                                    cam và màu vàng, nặng từ 34 - 49 kg, giá bán từ 180.000 - 210.000 đồng/kg. Như vậy, mỗi quả bí ngô có giá dao động từ 6 triệu đồng đến trên chục triệu đồng mỗi quả. Nguồn: kenh14.
                                </p>
                            </div>
                            <a href="#!" class="read-more-less" > Xem thêm</a>
                        </p>
                    </div>
                </div>
            </div>
        </article>
       

       
    </main>

    <footer class="footer">
        <div class="footer__map"> 
            <p><b>ĐỊA CHỈ</b></p>
            <iframe  src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d4740.172856141843!2d105.76948759674536!3d10.029452193403076!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9d76b0035f6d53d0!2zxJDhuqFpIGjhu41jIEPhuqduIFRoxqE!5e0!3m2!1svi!2s!4v1639472453305!5m2!1svi!2s" width="300" height="225" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        
        <div class="footer__contact">
            <p> 
                <b>LIÊN HỆ</b><br>
                <b>Địa Chỉ:</b>  Đại Học Cần Thơ<br>
                <b>Số Điện Thoại:</b>0123456789<br>
                <b>Email :</b>  vub1906615@student.ctu.edu.vn<br>
                nganb1910109@student.ctu.edu.vn<br>
                haib1906314@student.ctu.edu.vn<br>
            </p>
        </div>
        <div class="footer__follow">
            <p><b>Nhận thông tin mới nhất từ chúng tôi !</b></p>
            <input class="email__follow" type="text" name="email" id="email" placeholder="Email. . .">
            <input class="send__email" type="button" value="nhận thông tin">
            <div class="social-network">
                <p><b> Theo Dõi Chúng Tôi Trên</b></p>
                <a href="#"><i class="fab fa-facebook-f"></i></a>&nbsp;
                <a href="#"><i class="fab fa-twitter"></i></a>&nbsp;
                <a href="#"><i class="fab fa-pinterest"></i></a>&nbsp;
            </div>
            <div class="footer__support">
                <p><b> HỖ TRỢ KHÁCH HÀNG</b></p>
                <ul>
                  <li><a href="#!">Chính sách giao hàng</a></li>
                  <li><a href="#!">Chính sách đổi trả</a></li>
                  <li><a href="#!">Hướng dẫn mua hàng</a></li>
                  <li><a href="#!">Hổ trợ thanh toán</a></li>
                </ul>
              </div>
            
        </div>
        <div class="footer__copyright" >
            &copy; 2021 Bản quyền thuộc về nhóm 03 học phần CT188_10 kỳ 1 2021-2022.
        </div>
    </footer>
    <div id="myBtn" title="Go to top"  ><i class="far fa-arrow-alt-circle-up"></i></div>
    <div class="zalo-chat-widget" data-oaid="579745863508352884" data-welcome-message="Rất vui khi được hỗ trợ bạn!" data-autopopup="0" data-width="200" data-height="300"></div>
    <script src="https://sp.zalo.me/plugins/sdk.js"></script>
    <script src="./js/main.js"></script>
    <script src="./js/cart.js"></script>
    <script src="./js/readmore.js"></script>
    <script>
        window.addEventListener("load", show_hide_v, false)
        window.addEventListener("load", loadShopingCart, false);
    </script>
</body>
</html>


