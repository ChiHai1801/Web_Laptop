<?php
	require('layouts/header.php');

	if (isset($_GET['login.php'])) {
		$controller = $_GET['login.php'];
	} else {
		$controller = '';
	}

	switch ($controller) {
		case 'test':
			echo "trang test";
			break;
		
		default:
			require('pages/home.php');
			break;
	}

	require('layouts/footer.php');