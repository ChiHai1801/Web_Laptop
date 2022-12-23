<?php
include('../../layouts/header.php');
include('../../Model/nhucau.php');
$nhucau = new Nhucau();
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'delete':
            if (is_numeric($_GET['id'])) {
                $nhucau->delete($_GET['id']);
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

                $list = $nhucau->getAllnoLimit();
                foreach ($list as $r) {
                ?>
                    <tr>
                        <td><?php echo $r['nc_id'] ?></td>
                        <td><?php echo $r['nc_name'] ?></td>
                        <td>
                            <a class="btn btn-danger" href="?action=delete&id=<?php echo $r['nc_id']; ?>">Xoá</a>
                            <a class="btn btn-warning" href="edit.php?id=<?php echo $r['nc_id'] ?>">Sửa</a>
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