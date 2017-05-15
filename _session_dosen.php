<?php
	if (!isset($_SESSION['status']) || empty($_SESSION['status'])) {
		header('location:index.php');
	} else if ($_SESSION['status'] != "Dosen") {
		header('location:index.php');
	}
?>