<?php
	require_once("config/dbcontroller.php");
	$db_handle = new DBController();
	
	if (!empty($_POST["kd_mata_kuliah"])) {
		$result = mysql_query("SELECT count(*) FROM mata_kuliah WHERE kd_mata_kuliah='" . $_POST["kd_mata_kuliah"] . "'");
		$row = mysql_fetch_row($result);
		$user_count = $row[0];
		if ($user_count > 0) {
			echo "<span class='status-not-available' style='color:red; font-weight:bold'>&nbsp;&nbsp;Kode Mata Kuliah Tidak Tersedia.</span>";
?>
	<script>
		$("#kd_mata_kuliah").val("");
	</script>
<?php
		} else {
			echo "<span class='status-available' style='color:green; font-weight:bold'> &nbsp;&nbsp;Kode Mata Kuliah Tersedia.</span>";
		}
	}
?>