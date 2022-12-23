<?php
include('../../lib/upload.php');
include('../../layouts/header.php');
include('../../Model/thuonghieu.php');
$thuonghieu = new Thuonghieu();

if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (is_numeric($id)) {
        $obj = $thuonghieu->getThuongHieuById($id);
    } else {
        header('Location:index.php');
    }
}

if (isset($_POST['th_id'])) {
    $id = $_POST['th_id'];
    $realpath = $obj['img'];
    $upload = new upload();
    if (isset($_FILES['file']) && $_FILES['file']['name']!='') {
        //   echo "aaa";
           //xoa file cu
           if (file_exists('./uploads/' . $realpath)) {
               try {
                   unlink('./uploads/' . $realpath);
               } catch (Exception $e) {
                   echo $e->getMessage();
               }
           }
           // up file moi
           $upload = new upload();
           $upload->upload();
           $realpath = $upload->getRealpath();
           $_POST['file'] = $realpath; //getRealpath -> file name
           $thuonghieu->update($_POST);
       } else { //nen k co anh dc uploads thi lays nah cu chen vao db
           $_POST['file'] = $realpath;
           $thuonghieu->update($_POST);
       }

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

            <input type="hidden" name="th_id" value="<?php echo $obj['th_id'] ?>" required />
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Tên thương hiệu:</label>
                <div class="col-sm-10">
                    <input type="text" name="thuonghieuName" value="<?php echo $obj['th_name'] ?>" required>
                </div>
    </div>

            <div class="form-group row">
              <label for="staticEmail" class="col-sm-2 col-form-label">Logo:</label>
              <div class="col-sm-10">
                  <img height="100px" width="100px" src="<?php echo './uploads/' . $obj['img'];  ?>" alt="">
                  <input type="file" name="file">
              </div>
          </div>


            <input type="submit" value="Up Load" class="btn btn-primary"></input>
        </form>
    </div>
</body>
<?php
include('../../layouts/footer.php');
?>