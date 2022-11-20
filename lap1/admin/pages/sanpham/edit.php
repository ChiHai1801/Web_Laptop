<?php
if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}
require_once('../../layouts/header.php');
require_once('../../Model/sanpham.php');
$sanpham = new Sanpham();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (is_numeric($id)) {
        $obj = $sanpham->getsanphamById($id);
    } else {
        header('Location:index.php');
    }
}
if (isset($_POST['sp_id'])) {
    $id = $_POST['sp_id'];

    $sanpham->update($_POST);
    header('Location:edit.php?id=' . $id);
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
        <form method="post">

        
            <input type="hidden" name="id" value="<?php echo $obj['id'] ?>" />
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Tên sản phẩm:</label>
                <div class="col-sm-10">
                    <input type="text" name="sp_name" value="<?php echo $obj['sp_name'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Xuất Xứ:</label>
                <div class="col-sm-10">
                    <input type="text" name="sp_xuatxu" value="<?php echo $obj['sp_xuatxu'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Mô tả:</label>
                <div class="col-sm-10">
                    <input type="text" name="sp_mota" value="<?php echo $obj['sp_mota']; ?>">
                </div>
            </div>
            <input type="submit" class="btn btn-primary"></input>
        </form>
    </div>
</body>
<?php
require_once('../../layouts/footer.php');
?>