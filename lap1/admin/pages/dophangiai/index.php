<?php
require_once('../../layouts/header.php');
require_once('../../Model/dophangiai.php');

$dophangiai = new Dophangiai();
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'delete':
            if (is_numeric($_GET['id'])) {
                $dophangiai->delete($_GET['id']);
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
                    <th scope="col">Độ phân giải</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <a class="btn btn-primary" href="add.php">Thêm</a>
            <tbody>
                <?php

                $list = $dophangiai->getAllNoLimit();

                foreach ($list as $r) {
                ?>
                    <tr>
                        <td><?php echo $r['dpg_id'] ?></td>
                        <td><?php echo $r['dpg_name'] ?></td>
                        <td>
                            <a class="btn btn-danger" href="?action=delete&id=<?php echo $r['dpg_id']; ?>">Xoá</a>
                            <a class="btn btn-warning" href="edit.php?id=<?php echo $r['dpg_id'] ?>">Sửa</a>
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