<?php
require_once('../../layouts/header.php');
require_once('../../Model/trongluong.php');

if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}
$trongluong = new Trongluong();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (is_numeric($id)) {
        $obj = $trongluong->gettrongluongById($id);
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

            <input type="hidden" name="tl_id" value="<?php echo $obj['tl_id'] ?>" required />
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Trọng lượng máy:</label>
                <div class="col-sm-10">
                    <input type="text" name="name" value="<?php echo $obj['tl_trongluong'] ?>" required>
                </div>
            </div>

            <input type="submit" class="btn btn-primary"></input>
        </form>
    </div>
</body>
<?php
require_once('../../layouts/footer.php');
?>