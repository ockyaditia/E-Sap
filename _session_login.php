<?php
	if (!isset($_SESSION['status']) || empty($_SESSION['status'])) {
		header('location:index.php');
	}
?>