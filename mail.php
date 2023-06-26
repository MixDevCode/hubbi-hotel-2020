<?php session_start(); ?><html>
<head>
    <meta charset="utf-8">

    <title>Hubbi: <?php echo $_SESSION["username"];?></title>

    <link type="text/css" href="css/style.css" rel="stylesheet">
</head>

<body>

	<?php include_once("config/header.php");?>

	<div class="container">
		<div class="row">
<link type="text/css" href="css/settings.css" rel="stylesheet">
<div class="col-4">
            <a href="settings" id="settings-navigation-box">
                <div class="png20">
                    <i class="far fa-cog icon"></i>
                    <div class="settings-title">General</div>
                    <div class="settings-desc">Cambios generales para tu cuenta</div>
                </div>
                <div class="clear"></div>
            </a>
            <a href="#" id="settings-navigation-box" class="selected">
                <div class="png20">
                    <i class="far fa-envelope icon"></i>
                    <div class="settings-title">Correo electrónico</div>
                    <div class="settings-desc">Cambia el correo electrónico</div>
                </div>
                <div class="clear"></div>
            </a>
            <a href="password" id="settings-navigation-box">
                <div class="png20">
                    <i class="far fa-lock-open-alt icon"></i>
                    <div class="settings-title">Contraseña</div>
                    <div class="settings-desc">Cambia la contraseña actual</div>
                </div>
                <div class="clear"></div>
            </a>
        </div>
<div class="col-8">
	
	<?php
	if (!empty($_POST['old_mail'])) {
		
		if (empty($_POST['new_mail'])) {
			echo '<div class="alert failed">No puedes dejar campos vacíos.</div>
			<div id="content-box" style="height:570px">
						<div class="png20">
							<form method="post">
								<label for="old-mail">Correo actual</label>
								<input type="email" id="old-mail" name="old_mail">
								<div class="desc" style="margin: 0 0 20px 0">Ingrese su dirección de correo electrónico anterior para identificar su cuenta.</div>
								<div class="line"></div>

								<label for="new-mail">Ingrese el correo</label>
								<input type="email" id="new-mail" name="new_mail">
								<div class="desc">Por favor ingrese su nueva dirección de correo electrónico.</div>

								<label for="new-mail-repeat">Ingrese nuevamente el correo</label>
								<input type="email" id="new-mail-repeat" name="new_mail_repeat">
								<div class="desc">Repite el nuevo correo.</div>

								<button class="btn green save" type="submit">Guardar</button>
							</form>
						</div>
					</div>';
		} else {
			if (empty($_POST['new_mail_repeat'])) {
				echo '<div class="alert failed">">No puedes dejar campos vacíos.</div>
				<div id="content-box" style="height:570px">
						<div class="png20">
							<form method="post">
								<label for="old-mail">Correo actual</label>
								<input type="email" id="old-mail" name="old_mail">
								<div class="desc" style="margin: 0 0 20px 0">Ingrese su dirección de correo electrónico anterior para identificar su cuenta.</div>
								<div class="line"></div>

								<label for="new-mail">Ingrese el correo</label>
								<input type="email" id="new-mail" name="new_mail">
								<div class="desc">Por favor ingrese su nueva dirección de correo electrónico.</div>

								<label for="new-mail-repeat">Ingrese nuevamente el correo</label>
								<input type="email" id="new-mail-repeat" name="new_mail_repeat">
								<div class="desc">Repite el nuevo correo.</div>

								<button class="btn green save" type="submit">Guardar</button>
							</form>
						</div>
					</div>';
			} else {
				$old = $_POST['old_mail'];
				$new = $_POST['new_mail'];
				$newrepeat = $_POST['new_mail_repeat'];
				$username = $_SESSION['username'];
				$mail = $row['mail'];
						
				if ($old !== $mail) {
					echo '<div class="alert failed">Lo siento, el email actual no es correcto.</div>
					<div id="content-box" style="height:570px">
						<div class="png20">
							<form method="post">
								<label for="old-mail">Correo actual</label>
								<input type="email" id="old-mail" name="old_mail">
								<div class="desc" style="margin: 0 0 20px 0">Ingrese su dirección de correo electrónico anterior para identificar su cuenta.</div>
								<div class="line"></div>

								<label for="new-mail">Ingrese el correo</label>
								<input type="email" id="new-mail" name="new_mail">
								<div class="desc">Por favor ingrese su nueva dirección de correo electrónico.</div>

								<label for="new-mail-repeat">Ingrese nuevamente el correo</label>
								<input type="email" id="new-mail-repeat" name="new_mail_repeat">
								<div class="desc">Repite el nuevo correo.</div>

								<button class="btn green save" type="submit">Guardar</button>
							</form>
						</div>
					</div>';
				} else {
					if ($new !== $newrepeat) {
						echo '<div class="alert failed">Lo siento, los emails no coinciden.</div>
						<div id="content-box" style="height:570px">
						<div class="png20">
							<form method="post">
								<label for="old-mail">Correo actual</label>
								<input type="email" id="old-mail" name="old_mail">
								<div class="desc" style="margin: 0 0 20px 0">Ingrese su dirección de correo electrónico anterior para identificar su cuenta.</div>
								<div class="line"></div>

								<label for="new-mail">Ingrese el correo</label>
								<input type="email" id="new-mail" name="new_mail">
								<div class="desc">Por favor ingrese su nueva dirección de correo electrónico.</div>

								<label for="new-mail-repeat">Ingrese nuevamente el correo</label>
								<input type="email" id="new-mail-repeat" name="new_mail_repeat">
								<div class="desc">Repite el nuevo correo.</div>

								<button class="btn green save" type="submit">Guardar</button>
							</form>
						</div>
					</div>';
					} else {
						$sqlmail = "UPDATE users SET mail = '$newrepeat' WHERE username='$username'";
						$link->query($sqlmail);
						echo '<div class="alert success">La configuración se ha guardado correctamente!</div>
						<div id="content-box" style="height:570px">
						<div class="png20">
							<form method="post">
								<label for="old-mail">Correo actual</label>
								<input type="email" id="old-mail" name="old_mail">
								<div class="desc" style="margin: 0 0 20px 0">Ingrese su dirección de correo electrónico anterior para identificar su cuenta.</div>
								<div class="line"></div>

								<label for="new-mail">Ingrese el correo</label>
								<input type="email" id="new-mail" name="new_mail">
								<div class="desc">Por favor ingrese su nueva dirección de correo electrónico.</div>

								<label for="new-mail-repeat">Ingrese nuevamente el correo</label>
								<input type="email" id="new-mail-repeat" name="new_mail_repeat">
								<div class="desc">Repite el nuevo correo.</div>

								<button class="btn green save" type="submit">Guardar</button>
							</form>
						</div>
					</div>';
					}
				}
			}
		}
	} else {
    ?>

    <div id="content-box" style="height:570px">

        <div class="png20">
            <form method="post">
                <label for="old-mail">Correo actual</label>
                <input type="email" id="old-mail" name="old_mail">
                <div class="desc" style="margin: 0 0 20px 0">Ingrese su dirección de correo electrónico anterior para identificar su cuenta.</div>
                <div class="line"></div>

                <label for="new-mail">Ingrese el correo</label>
                <input type="email" id="new-mail" name="new_mail">
                <div class="desc">Por favor ingrese su nueva dirección de correo electrónico.</div>

                <label for="new-mail-repeat">Ingrese nuevamente el correo</label>
                <input type="email" id="new-mail-repeat" name="new_mail_repeat">
                <div class="desc">Repite el nuevo correo.</div>

                <button class="btn green save" type="submit">Guardar</button>
            </form>
        </div>
    </div>
	<?php } ?>
</div>

			<?php include_once("config/footer.php");?>
        </div>
    </div>
    </body>
    <script type="text/javascript" src="js/vendor.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
</html>