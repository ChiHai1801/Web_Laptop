<?php
include('../../layouts/header.php');
include('../../Model/ocung.php');
include('../../lib/upload.php');
if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}
$ocung = new Ocung();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (is_numeric($id)) {
        $obj = $ocung->getocungById($id);
    } else {
        header('Location:index.php');
    }
}

if (isset($_POST['oc_id'])) {
    $id = $_POST['oc_id'];

    $ocung->update($_POST);
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

            <input type="hidden" name="oc_id" value="<?php echo $obj['oc_id'] ?>" required />
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Tên ổ cứng:</label>
                <div class="col-sm-10">
                    <input type="text" name="ocungName" value="<?php echo $obj['oc_name'] ?>" required>
                </div>
            </div>

            <input type="submit" class="btn btn-primary"></input>
        </form>
    </div>
</body>
<?php
include('../../layouts/footer.php');
?>