
<?php
include("./user/header.php");
include('./admin/Model/users.php');
?>

<?php 
$result_check = '';
$users = new Users();
//kiem tra xem user va mail da ton tiaj troeng DB hay chua
$id = $_SESSION['user_id'];
$user = $users->getUserById($id);
if (isset($_POST['update'])) {
    // var_dump($_POST);'
    $_POST['us_id'] = $user['us_id'];
    $result = $users->updateUser($_POST);
}

?>
    
    <main class="main main__contact two__column__one__row " >
      
      <aside class="contact__info">
        <p><b>LIÊN HỆ VỚI CHÚNG TÔI</b></p>
        <p>Hotline: 0123456789</p>
        <p>Trường Đại học Cần Thơ</p>
        <p> Khu II, đường 3/2, P. Xuân Khánh, Q. Ninh Kiều, TP. Cần Thơ.</p>
        <div class="social-network">
            <p><b> Theo Dõi Chúng Tôi Trên</b></p>
            <a href="#"><i class="fab fa-facebook-f"></i></a>&nbsp;
            <a href="#"><i class="fab fa-twitter"></i></a>&nbsp;
            <a href="#"><i class="fab fa-pinterest"></i></a>&nbsp;
        </div>
      </aside>
      <article class="support">
       
        <iframe class="contact__map" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d4740.172856141843!2d105.76948759674536!3d10.029452193403076!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9d76b0035f6d53d0!2zxJDhuqFpIGjhu41jIEPhuqduIFRoxqE!5e0!3m2!1svi!2s!4v1639472453305!5m2!1svi!2s" width="870" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

        <div class="support__title">
            <h3> GÓP Ý VÀ TIẾP NHẬN HỖ TRỢ</h3>
            <p>
                Bạn có vấn đề không hài lòng, bạn muốn góp ý với chúng tôi. 
                Xin đừng ngần ngại, hãy điền đầy đủ thông tin theo mẫu bên dưới và gửi về chúng tôi.
                Chúng tôi chân thành cảm ơn và tôn trọng ý kiến của bạn!
            </p>
        </div>
          
        <form class="feedback" action="#">
            <div class="form-row">
                <label for="name">Họ Tên </label>
                <input type="text" id="name" name="name"  value="<?php echo $user['us_username']; ?>" placeholder="Vui lòng nhập họ tên ..." required>
            </div>

            <div class="form-row">
                <label for="phone">Số Điện Thoại </label>
                <input type="text" id="phone" name="phone" placeholder="Vui lòng nhập số điện thoại ..." required>
            </div>

            <div class="form-row">
                <label for="email">Email</label>
                <input type="email" id="email" placeholder="Vui lòng nhập Email..." required>
            </div>

            <div class="form-row">
                <label for="feedback__content">Nội Dung Góp Ý </label>
                <textarea id="feedback__content" name="feedback" rows="4" cols="50" placeholder="Nội dung góp ý" required></textarea> 
            </div>
            <div class="form__submit">
                <input type="submit" value="Gửi">
            </div>
        </form>
        

      </article>
     
        
    </main>
<?php
include("./user/footer.php");
?>


