<?php
include('../../layouts/header.php');
include('../../Model/tangsoquet.php');

if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}
$tangsoquet = new Tangsoquet();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (is_numeric($id)) {
        $obj = $tangsoquet->gettangsoquetById($id);
    } else {
        header('Location:index.php');
    }
}


if (isset($_POST['ts_id'])) {
    $id = $_POST['ts_id'];

    $tangsoquet->update($_POST);
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
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Tầng số quét:</label>
                <div class="col-sm-10">
                    <input type="text" name="tangsoquetName" value="<?php echo $obj['ts_tangso'] ?>" required>
                </div>
            </div>

            <input type="submit" name="submit" class="btn btn-primary"></input>
        </form>
    </div>
</body>
<?php
include('../../layouts/footer.php');
?>