<?php
	if (!isset($_SESSION['status']) || empty($_SESSION['status'])) {
		header('location:index.php');
	} else if ($_SESSION['status'] != "Tata Usaha") {
		header('location:index.php');
	}
?>