<?php

// Initialize the session
session_start();
 
include_once ("config/hubbi.config.php");

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: me");
  exit;
} else {
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
		$username_err = 1;
        echo '<div class="error-msg">No puedes dejar el Usuario vacío.</div>';
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
		$password_err = 1;
        echo '<div class="error-msg">No puedes dejar la contraseña vacía.</div>';
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
							
							$queryban = mysqli_query($link, "SELECT * FROM bans WHERE value='$username'");

							if (mysqli_num_rows($queryban) > 0) {
								$rowban = mysqli_fetch_array($queryban);
								$user = "Automático";
								$expire = $rowban["expire"];
								$reason = $rowban["reason"];
								$bandate = time();
								echo '<div class="error-msg">Cuenta baneada hasta el'.gmdate('d-m-Y', $rowban["expire"]).'. Razón: '.$rowban["reason"].' </div>';
								$querybanins = mysqli_query($link, "INSERT INTO bans(bantype,value,reason,expire,added_by,added_date, appeal_state)".
								"VALUES ('ip, '$user_ip', '$reason', '$expire, '$user', '$bandate', '1'')");
								
							} else {
								
								$querybanip = mysqli_query($link, "SELECT * FROM bans WHERE value='$user_ip'");
								
								if (mysqli_num_rows($querybanip) > 0) {
								
								$rowbanip = mysqli_fetch_array($querybanip);								
								$user = "Automático";
								$expire = $rowbanip["expire"];
								$reason = $rowbanip["reason"];
								$bandate = time();
								
								echo '<div class="error-msg">IP '.$user_ip.' baneada hasta el '.gmdate('d-m-Y', $rowban["expire"]).'. Razón: '.$rowban["reason"].' </div>';
								$querybanipins = mysqli_query($link, "INSERT INTO bans(bantype,value,reason,expire,added_by,added_date, appeal_state)".
								"VALUES ('user', '$username', '$reason', '$expire, '$user', '$bandate', '1'')");
								
								} else {
								
								// Password is correct, so start a new session
								session_start();
								
								// Store data in session variables
								$_SESSION["loggedin"] = true;
								$_SESSION["id"] = $id;
								$_SESSION["username"] = $username;                            
								
								// Redirect user to welcome page
								header("location: me");
								}
							}
                        } else {
                            // Display an error message if password is not valid
                           echo '<div class="error-msg">La contraseña no es válida.</div>';
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                   echo '<div class="error-msg">No se encontró una cuenta con ese usuario.</div>';
                }
            } else{
                echo '<div class="error-msg">Oops! Algo salió mal, inténtalo más tarde.</div>';
            }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        }

      
    }
    
    // Close connection
    mysqli_close($link);
}
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Hubbi: Un mundo conectado</title>

        <link type="text/css" href="css/index.css" rel="stylesheet">
		<script data-ad-client="ca-pub-1938510658592260" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-168125478-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-168125478-1');
		</script>

    </head>

    <body>
        
		
        <div class="hero">
            <div class="hotel"></div>
        </div>

        <div id="header-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="logo"></div>
                        <div class="online-count"><b><?= USERSON ?></b> usuarios conectados</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="login-position">
                        <h2>Iniciar Sesión</h2>
                        <form method="post">
                            <label for="login-username">Usuario</label>
                            <input type="text" name="username" id="login-username">

                            <label for="login-password">Contraseña</label>
                            <input type="password" name="password" id="login-password">

                            <button class="btn big green login-button">Entrar</button>
                        </form>
                        <div class="clear"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <p>¿No tienes cuenta aún?</p>
                            </div>
                            <div class="col-md-12">
                                <a href="register" class="btn big orange register-button">Regístrate ahora</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear">
			</div>
        </div>
    </body>
</html>