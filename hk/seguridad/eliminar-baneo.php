	<?php 
	if ($rows['seg_bans'] == "0") {
		header("location: /hk/index.php?apartado=panel&seccion=index");
	}
	// Include config file
	require_once "../hk/config/hk.config.php";

	$idsds = $_GET['id'];
	$sqldsds = ("SELECT value FROM bans where id = '$idsds'");
	$resultdsds = $link->query($sqldsds);
	$rowdsds = mysqli_fetch_array($resultdsds);
	$userban = $rowdsds['value'];
	
	$horario = date ('Y-m-d H:i:s', time());

	$sqls = "INSERT INTO cms_logseg (nombre, accion, fecha)".
		"VALUES ('$user', 'Eliminó el baneo de $userban', '$horario')";
	$link->query($sqls);
	
	$sqldds = ("DELETE FROM bans WHERE id = '$idsds'");
	$link->query($sqldds);
	header("location: /hk/index.php?apartado=seguridad&seccion=baneos");
?>