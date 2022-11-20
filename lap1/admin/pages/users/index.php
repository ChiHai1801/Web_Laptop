<?php
require_once('../../layouts/header.php');
require_once('../../Model/users.php');
$users = new Users();
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'delete':
            if (is_numeric($_GET['id'])) {
                $users->delete($_GET['id']);
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
                    <th scope="col">Username</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Giới tính</th>
                    <th scope="col">Ngày Sinh</th>
                    <th scope="col">Email</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>

            <a class="btn btn-primary" href="add.php">Thêm</a>

            <tbody>
                <?php

                $list = $users->getAll(0, 5);

                foreach ($list as $r) {
                ?>
                <tr>
                    <td><?php echo $r['us_id'] ?></td>
                    <td><?php echo $r['us_username'] ?></td>
                    <td><?php echo $r['us_phone'] ?></td>
                    <td><?php echo $r['us_diachi'] ?></td>
                    <td><?php echo $r['us_gioitinh'] ?></td>
                    <td><?php echo $r['us_ngaysinh'] ?></td>
                    <td><?php echo $r['us_email'] ?></td>
                    <td>
                        <a class="btn btn-danger" href="?action=delete&id=<?php echo $r['us_id']; ?>">Xoá</a>
                        <a class="btn btn-warning" href="edit.php?id=<?php echo $r['us_id'] ?>">Sửa</a>
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