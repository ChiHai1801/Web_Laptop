<?php
if (isset($_SESSION['ad_username'])) {
	header('Location:laptop/index.php');
} else {
	header('Location:pages/login.php');
}




