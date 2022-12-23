<?php
include('../../layouts/header.php');
include('../../Model/cpu.php');

$cpu = new Cpu();
$list = $cpu->getAllNoLimit();

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
<div>
    <div class="main_containers">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên CPU</th>
                    <th scope="col">Số nhân</th>
                    <th scope="col">số luồng</th>
                    <th scope="col">Tốc độ CPU</th>
                    <th scope="col">Tốc độ tối đa</th>
                    <th scope="col">Bộ nhớ đệm</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <a class="btn btn-primary" href="add.php">Thêm</a>
            <tbody>
                <?php
                foreach ($list as $r) {
                ?>
                    <tr>
                        <td><?php echo $r['cpu_id'] ?></td>
                        <td><?php echo $r['cpu_name'] ?></td>
                        <td><?php echo $r['cpu_sonhan'] ?></td>
                        <td><?php echo $r['cpu_soluong'] ?></td>
                        <td><?php echo $r['cpu_tocdocpu'] ?></td>
                        <td><?php echo $r['cpu_tocdotoida'] ?></td>
                        <td><?php echo $r['cpu_bonhodem'] ?></td>
                        <td>
                            <a class="btn btn-danger" href="?action=delete&id=<?php echo $r['cpu_id']; ?>">Xoá</a>
                            <a class="btn btn-warning" href="edit.php?id=<?php echo $r['cpu_id'] ?>">Sửa</a>
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