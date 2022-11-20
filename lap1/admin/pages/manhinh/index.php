<?php
require_once('../../layouts/header.php');
require_once('../../Model/manhinh.php');
require_once('../../lib/upload.php');
$manhinh = new Manhinh();
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'delete':
            if (is_numeric($_GET['id'])) {
                $cpu->delete($_GET['id']);
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
                    <th scope="col">Kích thước màn hình</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>

            <a class="btn btn-primary" href="add.php">Thêm</a>


            <tbody>
                <?php

                $list = $manhinh->getAllNoLimit();

                foreach ($list as $r7) {
                ?>
                    <tr>
                        <td><?php echo $r7['mh_id'] ?></td>
                        <td><?php echo $r7['mh_kichthuoc'] ?></td>
                        <td>
                            <a class="btn btn-danger" href="?action=delete&id=<?php echo $r7['mh_id']; ?>">Xoá</a>
                            <a class="btn btn-warning" href="edit.php?id=<?php echo $r7['mh_id'] ?>">Sửa</a>
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