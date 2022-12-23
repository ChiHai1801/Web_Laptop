<?php
include('../../layouts/header.php');
include('../../Model/manhinh.php');
include('../../lib/upload.php');
if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}
$manhinh = new Manhinh();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (is_numeric($id)) {
        $obj = $manhinh->getmanhinhById($id);
    } else {
        header('Location:index.php');
    }
}

if (isset($_POST['mh_id'])) {
    $id = $_POST['mh_id'];
    $count = $manhinh->update($_POST);
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

            <input type="hidden" name="mh_id" value="<?php echo $obj['mh_id'] ?>" required />
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Kích thước màn hình:</label>
                <div class="col-sm-10">
                    <input type="text" name="manhinhName" value="<?php echo $obj['mh_kichthuoc'] ?>" required>
                </div>
            </div>

            <input type="submit" name="submit" class="btn btn-primary"></input>
        </form>
    </div>
</body>
<?php
include('../../layouts/footer.php');
?>