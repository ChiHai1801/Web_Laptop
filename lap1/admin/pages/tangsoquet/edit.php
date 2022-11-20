<?php
require_once('../../layouts/header.php');
require_once('../../Model/tangsoquet.php');

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
                    <input type="text" name="name" value="<?php echo $obj['ts_name'] ?>" required>
                </div>
            </div>

            <input type="submit" class="btn btn-primary"></input>
        </form>
    </div>
</body>
<?php
require_once('../../layouts/footer.php');
?>