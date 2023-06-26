<?php
	include("config/hubbi.config.php");
	
	$sqldj = ("SELECT live_dj FROM dj WHERE id = 1");
	$resultdj = $link->query($sqldj);
	$rowdj = mysqli_fetch_array($resultdj);
	$dj = $rowdj['live_dj'];

	echo $dj;
?>

