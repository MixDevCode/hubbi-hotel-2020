<?php 
if ($rows['entre_notis'] == "0") {
	header("location: /hk/index.php?apartado=panel&seccion=index");
}

// Include config file

require_once "../hk/config/hk.config.php";

	$idsds = $_GET['id'];
	$sqldsds = ("SELECT title FROM cms_news where ID = '$idsds'");
	$resultdsds = $link->query($sqldsds);
	$rowdsds = mysqli_fetch_array($resultdsds);
	$titulonoti = $rowdsds['title'];
	
	$horario = date ('Y-m-d H:i:s', time());

	$sqls = "INSERT INTO cms_logen (nombre, accion, fecha)".
		"VALUES ('$user', 'Ha eliminado la noticia $titulonoti', '$horario')";
	$link->query($sqls);
	
	$sqldds = ("DELETE FROM cms_news WHERE id = '$idsds'");
	$link->query($sqldds);
	header("location: /hk/index.php?apartado=entretenimiento&seccion=noticias");
?>