<?php
	require_once("config/dbcontroller.php");
	$db_handle = new DBController();

	if (!empty($_POST["kd_prodi"]) && !empty($_POST["kd_prodi_old"])) {
		$result = mysql_query("SELECT count(*) FROM mst_program_studi WHERE kd_prodi='" . $_POST["kd_prodi"] . "' AND kd_prodi!='" . $_POST["kd_prodi_old"] . "'");
		$row = mysql_fetch_row($result);
		$user_count = $row[0];
		if ($user_count > 0) {
			echo "<span class='status-not-available' style='color:red; font-weight:bold'>&nbsp;&nbsp;Kode Program Studi Tidak Tersedia.</span>";
?>
	<script>
		$("#kd_prodi").val("");
	</script>
<?php
		} else {
			echo "<span class='status-available' style='color:green; font-weight:bold'> &nbsp;&nbsp;Kode Program Studi Tersedia.</span>";
		}
	}
?>