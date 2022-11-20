<?php
require_once('../../layouts/header.php');
require_once('../../Model/manhinh.php');
require_once('../../lib/upload.php');
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
    $realpath = $obj['img'];
    $upload = new upload();
    if (isset($_FILES['file']) && $_FILES['file']['mh_kichthuoc']!='') {
          echo "aaa";
        //    xoa file cu
           if (file_exists('uploads/' . $realpath)) {
               try {
                   unlink('uploads/' . $realpath);
               } catch (Exception $e) {
                   echo $e->getMessage();
               }
           }
        //    up file moi
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

            <input type="hidden" name="mh_id" value="<?php echo $obj['mh_id'] ?>" required />
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Kích thước màn hình:</label>
                <div class="col-sm-10">
                    <input type="text" name="name" value="<?php echo $obj['mh_kichthuoc'] ?>" required>
                </div>
            </div>

            <input type="submit" class="btn btn-primary"></input>
        </form>
    </div>
</body>
<?php
require_once('../../layouts/footer.php');
?>