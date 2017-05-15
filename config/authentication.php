<?php
	include('config.php');
	include("../key/RSA.php");
	session_start();
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	 
	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);
	
	$sql1 = "SELECT user_akses.username, user_akses.password, user_akses.status, mst_tata_usaha.nik, mst_tata_usaha.kd_prodi, mst_tata_usaha.nama_tata_usaha FROM mst_tata_usaha INNER JOIN user_akses ON mst_tata_usaha.nik = user_akses.kd_user WHERE user_akses.username='$username'";
	
	$sql2 = "SELECT user_akses.username, user_akses.password, user_akses.status, mst_dosen.nik, mst_dosen.kd_prodi, mst_dosen.nama_dosen, mst_dosen.jabatan FROM mst_dosen INNER JOIN user_akses ON mst_dosen.nik = user_akses.kd_user WHERE user_akses.username='$username'";
	
	if (!$result = $mysqli->query($sql1)) {
		$message = "Sorry, the website is experiencing problems.";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header('location:../signin.php?fail='.$mysqli->errno);
	} else {
		if ($result->num_rows == 1) {
			$data = $result->fetch_assoc();
			
			$RSA = new RSA();
			
			if ($password == $RSA->decrypt($data['password'])) {
				$_SESSION['username'] = $data['username'];
				$_SESSION['status'] = $data['status'];
				$_SESSION['nik'] = $data['nik'];
				$_SESSION['nama'] = $data['nama_tata_usaha'];
				$_SESSION['kd_prodi'] = $data['kd_prodi'];
				header('location:../index.php');
			} else {
				header('location:../signin.php?fail=1');
			}
		}
		else {
			if (!$result2 = $mysqli->query($sql2)) {
				$message2 = "Sorry, the website is experiencing problems.";
				echo "<script type='text/javascript'>alert('$message2');</script>";
				header('location:../signin.php?fail='.$mysqli->errno);
			} else {
				if ($result2->num_rows == 1) {
					$data2 = $result2->fetch_assoc();
					
					$RSA = new RSA();
					
					if ($password == $RSA->decrypt($data2['password'])) {
						$_SESSION['username'] = $data2['username'];
						$_SESSION['status'] = $data2['status'];
						$_SESSION['nik'] = $data2['nik'];
						$_SESSION['nama'] = $data2['nama_dosen'];
						$_SESSION['jabatan'] = $data2['jabatan'];
						$_SESSION['kd_prodi'] = $data2['kd_prodi'];
						header('location:../index.php');
					} else {
						header('location:../signin.php?fail=1');
					}
				}
				else {
					header('location:../signin.php?fail=2');
				}
			}
		}
	}
?>