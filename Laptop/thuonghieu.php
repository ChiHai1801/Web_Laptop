<?php
include("./user/header.php");
include("./admin/Model/thuonghieu.php");
$thuonghieu = new Thuonghieu();
?>
    <main class="main" >
        <article>
            <section class="introduce">
                <div class="introduce__title">
                    <h1>Thương Hiệu</h1>
                </div>
                
                  <table class="table table-striped">
                     <thead>
                         <tr>
                             <th scope="col">Thương hiệu</th>
                             <th scope="col">Logo</th>
                         </tr>
                     </thead>
                
                     <tbody>
                         <?php
                         $list = $thuonghieu->getAllnoLimit();
                         foreach ($list as $r) {
                         ?>
                             <tr>
                                 <td><?php echo $r['th_name'] ?></td>
                                 <td> <img height="120px" width="200px" src="<?php echo './admin/pages/thuonghieu/uploads/' . $r['img'] ?>"></td>
                             </tr>
                         <?php
                         }
                         ?>
                     </tbody>
                  </table>
        </section>
    </article>
    </main>
<?php
include("./user/footer.php");
?>




