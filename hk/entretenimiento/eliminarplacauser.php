<?php 
if ($rows['entre_badges'] == "0") {
	header("location: /hk/index.php?apartado=panel&seccion=index");
}
// Include config file

require_once "../hk/config/hk.config.php";

	$placa = $_GET['placa'];
	$userpla = $_GET['user'];
	$idpla = $_GET['id'];
	$horario = date ('Y-m-d H:i:s', time());

	$sqls = "INSERT INTO cms_logen (nombre, accion, fecha)".
		"VALUES ('$user', 'Ha eliminado la placa $placa del usuario $userpla', '$horario')";
	$link->query($sqls);
	
	$sqldds = ("DELETE FROM user_badges WHERE user_id = '$idpla' AND badge_id = '$placa'");
	$link->query($sqldds);
	header("location: /hk/index.php?apartado=entretenimiento&seccion=movimientos");
?>