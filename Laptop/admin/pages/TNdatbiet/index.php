<?php
include('../../layouts/header.php');
include('../../Model/TNdatbiet.php');

$TNdatbiet = new TNdatbiet();
$list = $TNdatbiet->getAllNoLimit();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'delete':
            if (is_numeric($_GET['id'])) {
                $TNdatbiet->delete($_GET['id']);
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
                    <th scope="col">Tính Năng Đặt Biệt</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <a class="btn btn-primary" href="add.php">Thêm</a>
            <tbody>
                <?php
                foreach ($list as $r) {
                ?>
                    <tr>
                        <td><?php echo $r['tn_id'] ?></td>
                        <td><?php echo $r['tn_name'] ?></td>
                        <td>
                            <a class="btn btn-danger" href="?action=delete&id=<?php echo $r['tn_id']; ?>">Xoá</a>
                            <a class="btn btn-warning" href="edit.php?id=<?php echo $r['tn_id'] ?>">Sửa</a>
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