<?php
include('../../layouts/header.php');
include('../../Model/gia.php');

$gia = new Gia();
if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (is_numeric($id)) {
        $obj = $gia->getGiaById($id);
    } else {
        header('Location: ../index.php');
    }
}

if (isset($_POST['gia_id'])) {
    $id = $_POST['gia_id'];
    $count = $gia->update($_POST);
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

        <input type="hidden" name="gia_id" value="<?php echo $obj['gia_id'] ?>" required/>

        <li class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Giá:</label>
                <div class="col-sm-10">
                    <input type="text" name="giaht" value="<?php echo $obj['gia'] ?>" required>
                </div>
            </li>

            <li class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Ngày:</label>
                <div class="col-sm-10">
                    <input type="date" name="ngayht" value="<?php echo $obj['ngay'] ?>" required>
                </div>
            </li>

            <input type="submit" name="submit" class="btn btn-primary"></input>
        </form>
    </div>
</body>
<?php
include('../../layouts/footer.php');
?>