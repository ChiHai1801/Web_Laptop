<div class="header">
    <!--header sidebar cố định-->
<div id="wrapper">
      <header>
          <div class="inner-header container-header">
              <a href="#" id="logo">Shop Laptop</a>
              <nav>
                  <ul id="main-menu">
                      <li><a href="">Trang chu</a></li>
                      <li><a href="">Gioi thieu</a></li>
                      <li><a href="">San pham</a></li>
                      <li><a href="">Blog</a></li>
                      <li><a href="">Lien he</a></li>
                  </ul>
                  <p>
                <form action="index.php?quanly=timkiem" method="POST">
                <input type="text" placeholder="Tìm kiếm sản phẩm ... " name="tukhoa">
                <input type="submit" name="timkiem" value="Tìm kiếm">
                </form>
            </p>
              </nav>
          </div>
      </header>
      <div id="banner">
      </div>

      <script src="https://code.jquery.com/jquery-3.6.2.js"></script>
   <script>
       $(document).ready(function(){
           $(window).scroll(function(){
               if($(this).scrollTop()){
                   $('header').addClass('sticky');
               }else{
                   $('header').removeClass('sticky');
               }
           });
       });
   </script>
</div>
<!-- kết thúc-->

</div>