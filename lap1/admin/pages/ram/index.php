<?php
require_once('../../layouts/header.php');
require_once('../../Model/ram.php');

$ram = new Ram();
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'delete':
            if (is_numeric($_GET['id'])) {
                $ram->delete($_GET['id']);
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
                    <th scope="col">Dung lượng</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <a class="btn btn-primary" href="add.php">Thêm</a>

            <tbody>
                <?php

                $list = $ram->getAllNoLimit();

                foreach ($list as $r3) {
                ?>
                    <tr>
                        <td><?php echo $r3['ram_id'] ?></td>
                        <td><?php echo $r3['ram_dungluong'] ?></td>
                        <td>
                            <a class="btn btn-danger" href="?action=delete&id=<?php echo $r3['ram_id']; ?>">Xoá</a>
                            <a class="btn btn-warning" href="edit.php?id=<?php echo $r3['ram_id'] ?>">Sửa</a>
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