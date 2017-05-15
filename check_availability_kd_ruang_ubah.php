<?php
	require_once("config/dbcontroller.php");
	$db_handle = new DBController();

	if (!empty($_POST["kd_ruang"]) && !empty($_POST["kd_ruang_old"])) {
		$result = mysql_query("SELECT count(*) FROM laboratorium WHERE kd_ruang='" . $_POST["kd_ruang"] . "' AND kd_ruang!='" . $_POST["kd_ruang_old"] . "'");
		$row = mysql_fetch_row($result);
		$user_count = $row[0];
		if ($user_count > 0) {
			echo "<span class='status-not-available' style='color:red; font-weight:bold'>&nbsp;&nbsp;Kode Ruang Tidak Tersedia.</span>";
?>
	<script>
		$("#kd_ruang").val("");
	</script>
<?php
		} else {
			echo "<span class='status-available' style='color:green; font-weight:bold'> &nbsp;&nbsp;Kode Ruang Tersedia.</span>";
		}
	}
?>