<?php
	require_once("config/dbcontroller.php");
	$db_handle = new DBController();
	
	if (!ctype_digit($_POST["nik"])) {
		echo "<span class='status-not-available' style='color:red; font-weight:bold'>&nbsp;&nbsp;NIK Tidak Valid.</span>";
	} else {
		if (!empty($_POST["nik"])) {
			$result = mysql_query("SELECT count(*) FROM user_akses WHERE kd_user='" . $_POST["nik"] . "'");
			$row = mysql_fetch_row($result);
			$user_count = $row[0];
			if ($user_count > 0) {
				echo "<span class='status-not-available' style='color:red; font-weight:bold'>&nbsp;&nbsp;NIK Tidak Tersedia.</span>";
?>
		<script>
			$("#nik").val("");
		</script>
<?php
			} else {
				echo "<span class='status-available' style='color:green; font-weight:bold'> &nbsp;&nbsp;NIK Tersedia.</span>";
			}
		}
	}
?>