<?php
include('../../layouts/header.php');
include('../../Model/dophangiai.php');

if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}
$dophangiai = new Dophangiai();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (is_numeric($id)) {
        $obj = $dophangiai->getDophangiaiById($id);
    } else {
        header('Location:index.php');
    }
}


if (isset($_POST['dpg_id'])) {
    $id = $_POST['dpg_id'];
    $dophangiai->update($_POST);
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

            <input type="hidden" name="dpg_id" value="<?php echo $obj['dpg_id'] ?>" required />
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Độ phân giải:</label>
                <div class="col-sm-10">
                    <input type="text" name="dophangiaiName" value="<?php echo $obj['dpg_name'] ?>" >
                </div>
            </div>

            <input type="submit" name="submit" class="btn btn-primary"></input>
        </form>
    </div>
</body>
<?php
include('../../layouts/footer.php');

?>