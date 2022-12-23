<?php
include('../../layouts/header.php');
include('../../Model/maumay.php');

if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}
$maumay = new Maumay();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (is_numeric($id)) {
        $obj = $maumay->getmaumayById($id);
    } else {
        header('Location:index.php');
    }
}

if (isset($_POST['mm_id'])) {
    $id = $_POST['mm_id'];
    $count = $maumay->update($_POST);
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
        <?php }?>
        <form method="post" enctype="multipart/form-data">

            <input type="hidden" name="mm_id" value="<?php echo $r['mm_id'] ?>" required />
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Màu máy:</label>
                <div class="col-sm-10">
                    <input type="text" name="maumayName" value="<?php echo $obj['mm_mau'] ?>" >
                </div>
            </div>

            <input type="submit" name="submit" class="btn btn-primary"></input>
        </form>
    </div>
</body>
<?php
include('../../layouts/footer.php');

?>