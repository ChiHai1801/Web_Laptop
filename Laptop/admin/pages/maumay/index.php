<?php
include('../../layouts/header.php');
include('../../Model/maumay.php');

$maumay = new Maumay();
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'delete':
            if (is_numeric($_GET['id'])) {
                $maumay->delete($_GET['id']);
            }
            break;

        default:
            # code...
            break;
    }
}
?>

<body>
<div>
    <div class="main_containers">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Màu máy</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <a class="btn btn-primary" href="add.php">Thêm</a>
            <tbody>
                <?php

                $list = $maumay->getAllNoLimit();

                foreach ($list as $r) {
                ?>
                    <tr>
                        <td><?php echo $r['mm_id'] ?></td>
                        <td><?php echo $r['mm_mau'] ?></td>
                        <td>
                            <a class="btn btn-danger" href="?action=delete&id=<?php echo $r['mm_id']; ?>">Xoá</a>
                            <a class="btn btn-warning" href="edit.php?id=<?php echo $r['mm_id'] ?>">Sửa</a>
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