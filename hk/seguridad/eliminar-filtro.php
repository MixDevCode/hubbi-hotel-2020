<?php
if ($rows['seg_filters'] == "0") {
	header("location: /hk/index.php?apartado=panel&seccion=index");
}
// Include config file

require_once "../hk/config/hk.config.php";

	$idsds = $_GET['word'];
	
	$horario = date ('Y-m-d H:i:s', time());

	$sqls = "INSERT INTO cms_logseg (nombre, accion, fecha)".
		"VALUES ('$user', 'Eliminó la palabra $idsds del filtro', '$horario')";
	$link->query($sqls);
	
	$sqldds = ("DELETE FROM wordfilter WHERE word = '$idsds'");
	$link->query($sqldds);
	header("location: /hk/index.php?apartado=seguridad&seccion=filtros");
?>