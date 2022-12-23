<?php
    $sql_thuonghieu = "SELECT * FROM thuonghieu ORDER BY th_id DESC";
    $query_thuonghieu = mysqli_query($mysqli, $sql_thuonghieu);
    ?>


<div class="sidebar">
          <ul class="list_sidebar">

            <?php
            $sql_thuonghieu = "SELECT * FROM thuonghieu ORDER BY th_id DESC";
            $query_thuonghieu = mysqli_query($mysqli, $sql_thuonghieu);
            while($row = mysqli_fetch_array($query_thuonghieu)){
            ?>

             <li><a href="index.php?quanly=thuonghieu&id=<?php echo $row['th_id'] ?>"><?php echo $row['th_name'] ?></a></li>

             <?php
             }
             ?>
         </ul>
    </div>










