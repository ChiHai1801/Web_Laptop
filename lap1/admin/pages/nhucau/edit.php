<?php
require_once('../../layouts/header.php');
require_once('../../lib/upload.php');
require_once('../../Model/nhucau.php');
if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}
$nhucau = new Nhucau();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (is_numeric($id)) {
        $obj = $nhucau->getnhucauById($id);
    } else {
        header('Location:index.php');
    }
}
if (isset($_POST['nc_id'])) {
    $id = $_POST['nc_id'];

    $nhucau->update($_POST);
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

            <input type="hidden" name="id" value="<?php echo $obj['nc_id'] ?>" required/>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">nhu Cầu</label>
                <div class="col-sm-10">
                    <input type="text" name="name" value="<?php echo $obj['nc_name'] ?>" required>
                </div>
            </div>
            <input type="submit"class="btn btn-primary"></input>
        </form> 
    </div>
</body>
<?php
require_once('../../layouts/footer.php');
?>