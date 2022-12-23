<?php
include('../../layouts/header.php');
include('../../Model/ram.php');

if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}
$ram = new Ram();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (is_numeric($id)) {
        $obj = $ram->getramById($id);
    } else {
        header('Location:index.php');
    }
}


if (isset($_POST['submit'])) {
    $id = $_POST['ram_id'];
    $count = $ram->update($_POST);
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
        <?php } ?>
        <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="ram_id" value="<?php echo $obj['ram_id'] ?>" required />
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Dung lượng ram:</label>
                <div class="col-sm-10">
                    <input type="text" name="ramName" value="<?php echo $obj['ram_dungluong'] ?>" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Loại ram:</label>
                <div class="col-sm-10">
                    <input type="text" name="ramloairam" value="<?php echo $obj['ram_loairam'] ?>" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Tốc độ BUS RAM:</label>
                <div class="col-sm-10">
                    <input type="text" name="ramtocdobusram" value="<?php echo $obj['ram_tocdobusram'] ?>" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Hỗ trợ RAM tối đa:</label>
                <div class="col-sm-10">
                    <input type="text" name="ramhtramtoida" value="<?php echo $obj['ram_htramtoida'] ?>" required>
                </div>
            </div>

            <input type="submit" name="submit" class="btn btn-primary"></input>
        </form>
    </div>
</body>
<?php
include('../../layouts/footer.php');
?>