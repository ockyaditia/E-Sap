<?php
	require_once("config/dbcontroller.php");
	$db_handle = new DBController();

	if (!empty($_POST["password"]) && !empty($_POST["re_password"])) {
		if ($_POST["password"] != $_POST["re_password"]) {
			echo "<span class='status-not-available' style='color:red; font-weight:bold'>&nbsp;&nbsp;Kata Sandi Tidak Sama.</span>";
?>
	<script>
		$("#password").val("");
		$("#re_password").val("");
	</script>
<?php
		} else {
			echo "<span class='status-available' style='color:green; font-weight:bold'> &nbsp;&nbsp;Kata Sandi Sama.</span>";
		}
	}
?>