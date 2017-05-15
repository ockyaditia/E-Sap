<?php
	if (isset($_SESSION['username']) && isset($_SESSION['status'])) {	
?>
	<div align="right" style="margin-right:137px; margin-top:10px; margin-bottom:-30px; margin-left:10px; font-style: italic;">
		<table style="color: black; font-weight:bold;">
			<tr>
				<td>Nama </td>
				<td>&nbsp;:&nbsp;</td>
				<td><?php echo $_SESSION['nama']; ?></td>
			</tr>
			<tr>
				<td>Status </td>
				<td>&nbsp;:&nbsp;</td>
				<td><?php echo $_SESSION['status']; ?></td>
			</tr>
		</table>
	</div>
<?php
	}
?>