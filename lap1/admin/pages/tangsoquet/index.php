<?php
require_once('../../layouts/header.php');
require_once('../../Model/tangsoquet.php');

$tangsoquet = new Tangsoquet();
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
    <!-- <div class="container"> -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tầng số quét</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <a class="btn btn-primary" href="add.php">Thêm</a>

            <tbody>
                <?php

                $list = $tangsoquet->getAllNoLimit();

                foreach ($list as $r10) {
                ?>
                    <tr>
                        <td><?php echo $r10['ts_id'] ?></td>
                        <td><?php echo $r10['ts_name'] ?></td>
                        <td>
                            <a class="btn btn-danger" href="?action=delete&id=<?php echo $r10['ts_id']; ?>">Xoá</a>
                            <a class="btn btn-warning" href="edit.php?id=<?php echo $r10['ts_id'] ?>">Sửa</a>
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