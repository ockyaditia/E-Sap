<?php
	require_once("config/dbcontroller.php");
	$db_handle = new DBController();

	if (!empty($_POST["kd_fakultas"]) && !empty($_POST["kd_fakultas_old"])) {
		$result = mysql_query("SELECT count(*) FROM mst_fakultas WHERE kd_fakultas='" . $_POST["kd_fakultas"] . "' AND kd_fakultas!='" . $_POST["kd_fakultas_old"] . "'");
		$row = mysql_fetch_row($result);
		$user_count = $row[0];
		if ($user_count > 0) {
			echo "<span class='status-not-available' style='color:red; font-weight:bold'>&nbsp;&nbsp;Kode Fakultas Tidak Tersedia.</span>";
?>
	<script>
		$("#kd_fakultas").val("");
	</script>
<?php
		} else {
			echo "<span class='status-available' style='color:green; font-weight:bold'> &nbsp;&nbsp;Kode Fakultas Tersedia.</span>";
		}
	}
?>