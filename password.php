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
            <a href="mail" id="settings-navigation-box">
                <div class="png20">
                    <i class="far fa-envelope icon"></i>
                    <div class="settings-title">Correo electrónico</div>
                    <div class="settings-desc">Cambia el correo electrónico</div>
                </div>
                <div class="clear"></div>
            </a>
            <a href="#" id="settings-navigation-box" class="selected">
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
	if (!empty($_POST['old_password'])) {
		
		if (empty($_POST['new_password'])) {
			echo '<div class="alert failed">No puedes dejar campos vacíos.</div>
			<div id="content-box" style="height:570px">

					<div class="png20">
						<form method="post">
							<label for="old-password">Contraseña anterior</label>
							<input type="password" id="old-password" name="old_password">
							<div class="desc" style="margin: 0 0 20px 0">Necesitamos esto para asegurarnos de que usted es el propietario de la cuenta.</div>
							<div class="line"></div>

							<label for="new-password">Nueva contraseña</label>
							<input type="password" id="new-password" name="new_password">
							<div class="desc">La nueva contraseña debe contener más de 6 carácteres.</div>

							<label for="new-password-repeat">Repetir nueva contraseña</label>
							<input type="password" id="new-password-repeat" name="new_password_repeat">
							<div class="desc">Para verificar la correción de la nueva contraseña.</div>

							<button class="btn green save">Guardar</button>
						</form>
					</div>
				</div>';
		} else {
			if (empty($_POST['new_password_repeat'])) {
				echo '<div class="alert failed">">No puedes dejar campos vacíos.</div>
				<div id="content-box" style="height:570px">

					<div class="png20">
						<form method="post">
							<label for="old-password">Contraseña anterior</label>
							<input type="password" id="old-password" name="old_password">
							<div class="desc" style="margin: 0 0 20px 0">Necesitamos esto para asegurarnos de que usted es el propietario de la cuenta.</div>
							<div class="line"></div>

							<label for="new-password">Nueva contraseña</label>
							<input type="password" id="new-password" name="new_password">
							<div class="desc">La nueva contraseña debe contener más de 6 carácteres.</div>

							<label for="new-password-repeat">Repetir nueva contraseña</label>
							<input type="password" id="new-password-repeat" name="new_password_repeat">
							<div class="desc">Para verificar la correción de la nueva contraseña.</div>

							<button class="btn green save">Guardar</button>
						</form>
					</div>
				</div>';
			} else {
				$old = $_POST['old_password'];
				$new = $_POST['new_password'];
				$newrepeat = $_POST['new_password_repeat'];
				$newrepeat1 = password_hash($newrepeat, PASSWORD_DEFAULT);
				$username = $_SESSION['username'];
				$password = $row['password'];
						
				if(!password_verify($old, $password)) {
					echo '<div class="alert failed">Lo siento, la contraseña actual no es correcta.</div>
					<div id="content-box" style="height:570px">

					<div class="png20">
						<form method="post">
							<label for="old-password">Contraseña anterior</label>
							<input type="password" id="old-password" name="old_password">
							<div class="desc" style="margin: 0 0 20px 0">Necesitamos esto para asegurarnos de que usted es el propietario de la cuenta.</div>
							<div class="line"></div>

							<label for="new-password">Nueva contraseña</label>
							<input type="password" id="new-password" name="new_password">
							<div class="desc">La nueva contraseña debe contener más de 6 carácteres.</div>

							<label for="new-password-repeat">Repetir nueva contraseña</label>
							<input type="password" id="new-password-repeat" name="new_password_repeat">
							<div class="desc">Para verificar la correción de la nueva contraseña.</div>

							<button class="btn green save">Guardar</button>
						</form>
					</div>
				</div>';
				} else {
					if ($new !== $newrepeat) {
						echo '<div class="alert failed">Lo siento, las contraseñas no coinciden.</div>
						<div id="content-box" style="height:570px">

						<div class="png20">
							<form method="post">
								<label for="old-password">Contraseña anterior</label>
								<input type="password" id="old-password" name="old_password">
								<div class="desc" style="margin: 0 0 20px 0">Necesitamos esto para asegurarnos de que usted es el propietario de la cuenta.</div>
								<div class="line"></div>

								<label for="new-password">Nueva contraseña</label>
								<input type="password" id="new-password" name="new_password">
								<div class="desc">La nueva contraseña debe contener más de 6 carácteres.</div>

								<label for="new-password-repeat">Repetir nueva contraseña</label>
								<input type="password" id="new-password-repeat" name="new_password_repeat">
								<div class="desc">Para verificar la correción de la nueva contraseña.</div>

								<button class="btn green save">Guardar</button>
							</form>
						</div>
					</div>';
					} else {
						$sqlpassword = "UPDATE users SET password = '$newrepeat1' WHERE username='$username'";
						$link->query($sqlpassword);
						echo '<div class="alert success">La configuración se ha guardado correctamente!</div>
						<div id="content-box" style="height:570px">

						<div class="png20">
							<form method="post">
								<label for="old-password">Contraseña anterior</label>
								<input type="password" id="old-password" name="old_password">
								<div class="desc" style="margin: 0 0 20px 0">Necesitamos esto para asegurarnos de que usted es el propietario de la cuenta.</div>
								<div class="line"></div>

								<label for="new-password">Nueva contraseña</label>
								<input type="password" id="new-password" name="new_password">
								<div class="desc">La nueva contraseña debe contener más de 6 carácteres.</div>

								<label for="new-password-repeat">Repetir nueva contraseña</label>
								<input type="password" id="new-password-repeat" name="new_password_repeat">
								<div class="desc">Para verificar la correción de la nueva contraseña.</div>

								<button class="btn green save">Guardar</button>
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
                <label for="old-password">Contraseña anterior</label>
                <input type="password" id="old-password" name="old_password">
                <div class="desc" style="margin: 0 0 20px 0">Necesitamos esto para asegurarnos de que usted es el propietario de la cuenta.</div>
                <div class="line"></div>

                <label for="new-password">Nueva contraseña</label>
                <input type="password" id="new-password" name="new_password">
                <div class="desc">La nueva contraseña debe contener más de 6 carácteres.</div>

                <label for="new-password-repeat">Repetir nueva contraseña</label>
                <input type="password" id="new-password-repeat" name="new_password_repeat">
                <div class="desc">Para verificar la correción de la nueva contraseña.</div>

                <button class="btn green save">Guardar</button>
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