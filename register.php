<?php
// Initialize the session
session_start();
 
include_once ("config/hubbi.config.php");

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: me");
  exit;
}
?>
<html>
    <head>
        <meta charset="utf-8">

        <title>Hubbi: Registrarse</title>

        <link type="text/css" href="css/registration.css" rel="stylesheet">
    </head>

    <body>
        <div class="main" style="margin-top: 40px">
            
            <div class="content-box" id="step-1">
                <div class="title-box">
                    <div class="title">Registrarse</div>
                </div>
                <div class="png20">
				<?php
				if (!empty($_POST)) {
					
					if (empty($_POST['gender'])) {
						echo '<div class="alert">Debes escoger un género.</div>';
					} else {
						if (empty($_POST['register-mail'])) {
							echo '<div class="alert">Debes escribir un correo.</div>';
						} else {
							if (empty($_POST['register-username'])) {
								echo '<div class="alert">Debes escribir un usuario.</div>';
							} else {
								if (empty($_POST['register-password'])) {
									echo '<div class="alert">Debes escribir una contraseña.</div>';
								} else {
									if (empty($_POST['register-password-repeat'])) {
										echo '<div class="alert">Debes repetir la contraseña.</div>';
									} else {
										
										$sexo = $_POST['gender'];
										$correo = $_POST['register-mail'];
										if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
											echo '<div class="alert">Ingresa un correo válido.</div>';
										} else {
											$usuario = $_POST['register-username'];
											$contraseña = $_POST['register-password'];
											$repetircontraseña = $_POST['register-password-repeat'];
											
											switch ($sexo) {
												case "M":
													$avatar = "hd-180-2.sh-3206-64.hr-3163-45.ch-215-1297.ca-3511-1.lg-275-62";
													break;
												case "F":
													$avatar = "ch-660-1408.hd-600-1.hr-515-32.lg-715-64";
													break;
											}
											
											$ip = $_SERVER['REMOTE_ADDR'];
											
											$querya = mysqli_query($link, "SELECT * FROM users WHERE username='$usuario'");

											if (mysqli_num_rows($querya) > 0) {
												echo '<div class="alert">El usuario ya existe.</div>';
											} else {
												$contrahash = password_hash($repetircontraseña, PASSWORD_DEFAULT);
												$sessionKey  = 'SLOPT-'.substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ", 5)), 0, 25).'-SSO';
												$time = strtotime('now');
												$queryr = mysqli_query($link, "SELECT * FROM slopt_cms");
												$rowr = mysqli_fetch_array($queryr);
												$motto = $rowr['motto'];
												$credits = $rowr['credits'];
												$diamonds = $rowr['diamonds'];
												$homeroom = $rowr['home_room'];
												$queryreg = mysqli_query($link, "INSERT INTO users (username, password, rank, auth_ticket, motto, account_created, last_online, mail, look, gender, ip_last, ip_reg, credits, activity_points, vip_points, home_room)".
												"VALUES ('$usuario', '$contrahash', '1', '$sessionKey' , '$motto' , '$time', '$time' , '$correo' , '$avatar' , '$sexo' , '$ip' , '$ip' , '$credits' ,'0', '$diamonds' , '$homeroom')") or die(mysqli_error($link));
									
												// Store data in session variables
												$_SESSION["loggedin"] = true;
												$_SESSION["username"] = $usuario;                            
												
												// Redirect user to welcome page
												header("location: me");
											}
										}
									}
								}
							}			
						}					
					}					
				} else {
				?> 
				
                    <form method="post" id="msform">
					<fieldset id="hehe">
					
                        <input type="hidden" id="gender" name="gender" value="">

                        <label for="register-gender">Sexo</label>
						
                        <div class="genders">
                            <label for="male" onclick="$('#gender').val('M')"><div class="male" style="background-image:url(https://www.habbo.de/habbo-imaging/avatarimage?figure=hd-180-1.hr-893-45.lg-280-64.sh-300-64.fa-1201-0.ch-255-62&size=l&headonly=1)"></div></label>

                            <label for="female" onclick="$('#gender').val('F')"><div class="female" style="background-image:url(https://www.habbo.de/habbo-imaging/avatarimage?figure=hd-600-1.hr-540-45.lg-695-62.sh-905-62.ch-660-62&size=l&head_direction=4&headonly=1)"></div></label>
                        </div>
                        <p class="desc">Hacemos esto para que una vez dentro del hotel, se te sea más facil reconocerte ante los demás usuarios y tengas una mejor experiencia desde el inicio, escoge con el cual te sientas identificad@ mejor.</p>
                        
                        <label for="register-mail">Correo Electrónico</label>
                        <input type="text" id="register-mail" name="register-mail" value="">
                        <p class="desc">Esto te servirá para después comprobar tu identidad a la hora de hacer un cambio de contraseña, así que guardalo bien.</p>
                        
                        <div style="clear:both"></div>

                        <a href="/" class="btn red back-register">Volver</a>
						<input type="button" name="next" onclick="myFunction()" class="btn green next next-register" value="Siguiente">

                        <div style="clear:both"></div>
					</fieldset>
					<fieldset id="hehe2">
						<label for="register-username">Usuario</label>
                        <input type="text" id="register-username" name="register-username" value="">
                        <p class="desc">Debe ser de más de 2 carácteres, esto lo usarás para iniciar sesión las veces que quieras ingresar al hotel</p>

                        
                         <label for="register-password">Contraseña</label>
                        <input type="password" id="register-password" name="register-password">
                        <p class="desc">Se recomienda que la contraseña deba tener más de 6 carácteres para una mayor seguridad, no nos hacemos responsables de hackeo de contraseñas faciles. </p>

                        
                        <label for="register-password-repeat">Repite contraseña</label>
                        <input type="password" id="register-password-repeat" name="register-password-repeat">
                        <p class="desc">Para verificar que la contraseña sea la que elegiste, te pedimos que vuelvas a ingresarla.</p>


                        <input type="button" class="btn red back-register" onclick="myFunctionprev()" value="Volver">
                        <button class="btn green next-register">Registrarme</button>

                        <div style="clear:both"></div>
                    </form>
				<?php } ?>
                </div>
            </div>
        </div>
    </body>
	<script type="text/javascript">
	
	function myFunction() {
		$("#hehe").hide();
		$("#hehe2").show();
	}
	
	function myFunctionprev() {
		$("#hehe2").hide();
		$("#hehe").show();
	}
	</script>
    <script type="text/javascript" src="js/vendor.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
</html>