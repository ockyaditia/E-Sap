<?php
	if (!isset($_SESSION['status']) || empty($_SESSION['status'])) {
		header('location:index.php');
	} else if ($_SESSION['status'] != "Tata Usaha" && $_SESSION['kd_prodi'] == "") {
		header('location:index.php');
	}
?>