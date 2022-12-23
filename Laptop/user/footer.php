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
              <b>Email :</b>haib1906314@student.ctu.edu.vn<br>
          </p>
      </div>
      <div class="footer__follow">
          <p>Nhận thông tin mới nhất từ chúng tôi !</p>
          <input class="email__follow" type="text" name="email" id="email" placeholder="Email. . .">
          <input class="send__email" type="button" value="nhận thông tin">
          <div class="social-network">
              <p><b> Theo Dõi Chúng Tôi Trên</b></p>
              <a href="#"><i class="fab fa-facebook-f"></i></a>&nbsp;
              <a href="#"><i class="fab fa-twitter"></i></a>&nbsp;
              <a href="#"><i class="fab fa-pinterest"></i></a>&nbsp;
          </div>
          <div class="footer__support">
            <p>HỖ TRỢ KHÁCH HÀNG</p>
            <ul>
              <li><a href="#!">Chính sách giao hàng</a></li>
              <li><a href="#!">Chính sách đổi trả</a></li>
              <li><a href="#!">Hướng dẫn mua hàng</a></li>
              <li><a href="#!">Hổ trợ thanh toán</a></li>
            </ul>
          </div>

          
      </div>
      <div class="footer__copyright" >
          &copy; 2021 Bản quyền thuộc về 2021-2022.
      </div>
  </footer>
  <div id="myBtn" title="Go to top"  ><i class="far fa-arrow-alt-circle-up"></i></div>
  <div class="zalo-chat-widget" data-oaid="579745863508352884" data-welcome-message="Rất vui khi được hỗ trợ bạn!" 
  data-autopopup="0" data-width="200" data-height="300"></div>
  <script src="https://sp.zalo.me/plugins/sdk.js"></script>
  <script src="./js/main.js"></script>
  <script src="./js/slider.js"></script>
  <script src="./js/cart.js"></script>
  <script>
    const prices = document.querySelectorAll('.card__price');
    prices.forEach(item => {
        item.innerText = (Number(item.innerText).toLocaleString('de-DE',{style : 'currency', currency : 'VND' }))+'/Kg';
    });
    window.addEventListener("load", loadShopingCart, false);
  
</script>
</body>
</html>