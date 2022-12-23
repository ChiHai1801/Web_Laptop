<?php
include('../../layouts/header.php');
include('../../Model/thongtinsp.php');
include('../../Model/laptops.php');

if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}
$thongtinsp = new TTsanpham();

$laptops = new Laptop();
$listlaptops =  $laptops->getAllNoLimit();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (is_numeric($id)) {
        $obj = $thongtinsp->getthongtinspById($id);
    } else {
        header('Location:index.php');
    }
}


if (isset($_POST['tt_id'])) {
    $id = $_POST['tt_id'];

    $thongtinsp->update($_POST);
    $_SESSION['success'] = "Sua thanh cong " . 'san pham';
}
?>

<body>
    <div class="main_containers">
        <?php
        if (isset($_SESSION['success'])) {
        ?>
            <div class="alert alert-primary" role="alert">
                <?php echo $_SESSION['success'] ?>
            </div>
        <?php
        }
        ?>
        <form method="post" enctype="multipart/form-data">

            <input type="hidden" name="ts_id" value="<?php echo $obj['ts_id'] ?>" required />

            <li class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Tên Sản Phẩm</label>
                <div class="col-sm-10">
                    <select name="lt_id">
       
                    <?php foreach ($listlaptops as $laptops) {
                     ?>
                        <option <?php if($laptops['lt_id'] == $obj['lt_id']) echo 'selected'; ?> value="<?php echo $laptops['lt_id'] ?>"><?php echo $laptops['lt_name'] ?></option>
                        <?php } ?>
                </select>
            </div>
        </li>

        <div class="form-group row">
               <label for="staticEmail" class="col-sm-2 col-form-label">xuất xứ:</label>
               <div class="col-sm-10">
                   <input type="text" name="thongtinspxuatxu" value="<?php echo $obj['tt_xuatxu'] ?>" required>
               </div>
           </div>

           <div class="form-group row">
               <label for="staticEmail" class="col-sm-2 col-form-label">Thông tin sản phẩm:</label>
               <div class="col-sm-11">
                   <textarea type="text" name="thongtinspName" value="<?php echo $obj['tt_thongtinsp'] ?>" required></textarea>
               </div>
           </div>

            <input type="submit" name="submit" class="btn btn-primary"></input>
        </form>
    </div>
</body>
<?php
include('../../layouts/footer.php');
?>