<?php
include("./user/header.php");
include('./admin/Model/users.php');
$users = new Users();
?>

<?php
if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}
$result_check = '';
$users = new Users();
//kiem tra xem user va mail da ton tiaj troeng DB hay chua
$id = $_SESSION['user_id'];
$user = $users->getUserById($id);
if (isset($_POST['update'])) {
    // var_dump($_POST);'
    $_POST['us_id'] = $user['us_id'];
    $result = $users->updateUser($_POST);
    if ($result == 1) { // if insert success retun 1 in function insert
        $_SESSION['success'] = 'Sua thanh cong';
    } else $alert = $result; //to show alert if inset not success
}

?>
    
    <main class="main" >
        <div class="container">

        <?php
       if (isset($_SESSION['success'])) {
       ?>
           <div class="alert alert-primary" role="alert">
               <?php echo $_SESSION['success'] ?>
           </div>
       <?php } ?>
       
       <?php
       if (isset($alert)) echo '<div class="alert alert-primary" role="alert">' . " $alert " . "</div>";
       ?>

            <h1 class="form_title">Thông Tin người dùng</h1>
            <div class="register">
            <input type="hidden" name="us_id" value="<?php echo $obj['us_id'] ?>" required/>

                <div class="form-row">
                    <label for="" >Username:</label>
                    <input type="text"  value="<?php echo $user['us_username']; ?> " required> 
                </div>

                <div class="form-row">
                    <label for="" >Email:</label>
                    <input type="text" type="email" name="us_email" value="<?php if (isset($result_check) && $result_check == 'OK') echo $email;
                                                                                            else echo $user['us_email'] ?>" required> 
                </div>

                <div class="form-row">
                    <label for="" >Địa chỉ:</label>
                    <input type="text" value="<?php echo $user['us_diachi'] ?>" name="us_diachi" class="form-control" required>
                </div>

                <div class="form-row">
                    <label for="">Giới tính:</label>
                    <input type="text" value="<?php echo $user['us_gioitinh'] ?>" name="us_gioitinh" class="form-control" required>
                </div>

                <div class="form-row">
                    <label for="">Ngày sinh: </label>
                    <input type="text" value="<?php echo $user['us_ngaysinh'] ?>" name="us_ngaysinh" class="form-control" required>
                </div>

                <div class="form-row">
                    <label for="" >Số điện thoại: </label>
                    <input type="phone" value="<?php echo $user['us_phone'] ?>" name="us_phone" class="form-control" required>
                </div>
                
                <div class="form__submit">
                    <input class="submit" name="submit" type="submit" value="Sửa Thông Tin"> 
                </div>
            </div>
        </div> 
    </main>

<?php
include("./user/footer.php");
?>