<div class="clear"></div>
<div class="main">

<?php

     if(isset($_GET['action']) && $_GET['query']){
         $tam = $_GET['action'];
         $query = $_GET['query'];
     }else{
         $tam = '';
         $query = '';
     }
     if($tam=='quanlydanhmucsanpham' && $query == 'them'){
         include("modules/quanlydanhmucsp/them.php");
         include("modules/quanlydanhmucsp/lietke.php");
        }elseif($tam=='quanlydanhmucsanpham' && $query == 'sua'){
            include("modules/quanlydanhmucsp/sua.php");
        }elseif($tam=='quanlysp' && $query == 'them'){
            include("modules/quanlysp/them.php");
            include("modules/quanlysp/lietke.php");
        }elseif($tam=='quanlysp' && $query == 'sua'){
            include("modules/quanlysp/sua.php");

        }elseif($tam=='quanlythuonghieu' && $query == 'them'){
            include("modules/quanlythuonghieu/them.php");
            include("modules/quanlythuonghieu/lietke.php");
        }elseif($tam=='quanlythuonghieu' && $query == 'sua'){
            include("modules/quanlythuonghieu/sua.php");
        }elseif($tam=='quanlycpu' && $query == 'them'){
            include("modules/quanlycpu/them.php");
            include("modules/quanlycpu/lietke.php");
        }elseif($tam=='quanlycpu' && $query == 'sua'){
            include("modules/quanlycpu/sua.php");
        }else{

        // giao dien chinh admin
         include("modules/dashboard.php");
     }
 ?>

</div>