<?php
require_once('../../lib/upload.php');
require_once('../../layouts/header.php');
require_once('../../Model/hinhanh.php');
if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}
$hinhanh = new Hinhanh();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (is_numeric($id)) {
        $obj = $hinhanh->gethinhanhById($id);
    } else {
        header('Location: ../index.php');
    }
}
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $realpath = $obj['img'];
    $upload = new upload();
    if (isset($_FILES['file']) && $_FILES['file']['name']!='') {
        //   echo "aaa";
           //xoa file cu
           if (file_exists('uploads/' . $realpath)) {
               try {
                   unlink('uploads/' . $realpath);
               } catch (Exception $e) {
                   echo $e->getMessage();
               }
           }
           // up file moi
           $upload = new upload();
           $upload->upload();
           $realpath = $upload->getRealpath();
           $_POST['file'] = $realpath; //getRealpath -> file name
           $brand->update($_POST);
       } else { //nen k co anh dc uploads thi lays nah cu chen vao db
           $_POST['file'] = $realpath;
           $brand->update($_POST);
       }

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
        <form method="post" enctype="multipart/form-data">

        <input type="hidden" name="oc_id" value="<?php echo $obj['ha_id'] ?>" required />
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Hình ảnh:</label>
                <div class="col-sm-10">
                    <img height="100px" width="120px" src="<?php echo './uploads/' . $obj['img'];  ?>" alt="">
                    <input type="file" name="file">
                </div>
            </div>
            <input type="submit" class="btn btn-primary"></input>
        </form>
    </div>
</body>
<?php
require_once('../../layouts/footer.php');
?>