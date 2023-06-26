<?php 
if ($rows['admin_badgeshop'] == "0") {
	header("location: /hk/index.php?apartado=panel&seccion=index");
}
// Include config file

require_once "../hk/config/hk.config.php";

	$idsds = $_GET['id'];
	
	$horario = date ('Y-m-d H:i:s', time());

	$sqls = "INSERT INTO cms_logadm (nombre, accion, fecha)".
		"VALUES ('$user', 'Ha eliminado la placa $idsds de la Tienda de Placas', '$horario')";
	$link->query($sqls);
	
	$sqldds = ("DELETE FROM cms_badges WHERE badge_id = '$idsds'");
	$link->query($sqldds);
	header("location: /hk/index.php?apartado=administracion&seccion=tiendaplacas");
?>