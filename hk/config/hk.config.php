<?php

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: /");
    exit;
} else {

$user = $_SESSION['superman'];

}

/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'hubbi');
	 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
	 
// Check connection
if($link === false){
	die("ERROR: Could not connect. " . mysqli_connect_error());
}		
	
$sql = ("SELECT * FROM users WHERE username = '$user'");
$result = $link->query($sql);
$row = mysqli_fetch_array($result);

$user= $row["username"];
$rankid = $row["rank_cms"];
$look = $row["look"];

$sqlr = ("SELECT name FROM ranks where rank_id = '$rankid'");
$resultr = $link->query($sqlr);
$rowr = mysqli_fetch_array($resultr);

$sqls = ("SELECT * FROM hk_permissions where rank_id = '$rankid'");
$results = $link->query($sqls);
$rows = mysqli_fetch_array($results);

if ($rows['panel_index'] == "0") {
	header("location: /");
}

if (!empty($_GET)) {
	
$apartado = $_GET['apartado'];
$seccion = $_GET['seccion'];
										
$url = '';

if (!empty($_GET['apartado'])) {
	$url .= $_GET['apartado'] . '/';
		if (!empty($_GET['seccion'])) {
			$url .= $_GET['seccion'] . '.php';
		include $url;
		}
} else {
		include('../index.php');
}
}
?>