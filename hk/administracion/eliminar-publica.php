<?php 
if ($rows['admin_publicas'] == "0") {
	header("location: /hk/index.php?apartado=panel&seccion=index");
}
// Include config file

require_once "../hk/config/hk.config.php";

	$idsds = $_GET['id'];
	
	$horario = date ('Y-m-d H:i:s', time());

	$sqls = "INSERT INTO cms_logadm (nombre, accion, fecha)".
		"VALUES ('$user', 'Ha eliminado la sala ID ".$idsds." de Salas Publicas', '$horario')";
	$link->query($sqls);
	
	$sqldds = ("DELETE FROM navigator_publics WHERE room_id = '$idsds'");
	$link->query($sqldds);
	header("location: /hk/index.php?apartado=administracion&seccion=publicas");
?>