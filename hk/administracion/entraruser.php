<?php
session_destroy();

session_start();
								
// Store data in session variables
$_SESSION["loggedin"] = true;
$_SESSION["username"] = $_GET["user"];                            
								
// Redirect user to welcome page
header("location: me");
							
?>							