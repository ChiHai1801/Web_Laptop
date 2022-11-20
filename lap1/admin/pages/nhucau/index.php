<?php
require_once('../../layouts/header.php');
require_once('../../Model/nhucau.php');
$nhucaus = new Nhucau();
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'delete':
            if (is_numeric($_GET['id'])) {
                $nhucaus->delete($_GET['id']);
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
                    <th scope="col">Tên Thể Loại</th>
                    <th scope="col">Thao Tác</th>
                </tr>
            </thead>

            <a class="btn btn-primary" href="add.php">Thêm</a>


            <tbody>
                <?php

                $list = $nhucaus->getAllnoLimit();
                foreach ($list as $r5) {
                ?>
                    <tr>
                        <td><?php echo $r5['nc_id'] ?></td>
                        <td><?php echo $r5['nc_name'] ?></td>
                        <td>
                            <a class="btn btn-danger" href="?action=delete&id=<?php echo $r5['nc_id']; ?>">Xoá</a>
                            <a class="btn btn-warning" href="edit.php?id=<?php echo $r5['nc_id'] ?>">Sửa</a>
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
require_once('../../layouts/footer.php');
?>