<?php
include('../../layouts/header.php');
include('../../Model/thuonghieu.php');
$thuonghieu = new Thuonghieu();
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'delete':
            if (is_numeric($_GET['id'])) {
                $thuonghieu->delete($_GET['id']);
            }
            break;

        default:
            # code...
            break;
    }
}
?>

<body>

    <div class="main_containers">
              <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên thương hiệu</th>
                    <th scope="col">Logo</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <br>
            <a class="btn btn-primary" href="add.php">Thêm</a>
            <br>
            <br>

            <tbody>
                <?php

                $list = $thuonghieu->getAllnoLimit();

                foreach ($list as $r) {
                ?>
                    <tr>
                        <td><?php echo $r['th_id'] ?></td>
                        <td><?php echo $r['th_name'] ?></td>
                        <td> <img height="30px" width="50px" src="<?php echo 'uploads/' . $r['img'] ?>" alt=""> </td>
                        <td>
                            <a class="btn btn-danger" href="?action=delete&id=<?php echo $r['th_id']; ?>">Xoá</a>
                            <a class="btn btn-warning" href="edit.php?id=<?php echo $r['th_id'] ?>">Sửa</a>
                        </td>
                    </tr>
                <?php
                }

                ?>

            </tbody>
            </table>
    </div>
</body>
<?php
include('../../layouts/footer.php');
?>