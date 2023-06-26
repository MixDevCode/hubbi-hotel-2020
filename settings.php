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
        <link type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet">
        <link type="text/css" href="css/settings.css" rel="stylesheet">

        <div class="col-4">
            <a href="#" id="settings-navigation-box" class="selected">
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
		
		if (!empty($_POST)) {
	
		$inroom = $_POST['hide_inRoom'];
		$newfriends = $_POST['block_newFriends'];
		$online = $_POST['hide_Online'];
		$username = $_SESSION['username'];
				
		$sqlgen = "UPDATE users SET hide_inroom ='$inroom', block_newfriends='$newfriends', hide_online='$online' WHERE username='$username'";
		$link->query($sqlgen);
		
		echo '<div class="alert success">La configuración se ha guardado correctamente!</div>
		<div id="content-box" style="height:380px">
                <div class="png20">
                    <form method="post">
                        <label>Seguimiento</label>
                        <div class="desc">¿Pueden los otros usuarios del hotel seguirte?</div>
                        <div class="btnset">
                            <input type="radio" value="0" id="btnset_following1" name="hide_inRoom"';  if ($inroom !== '1') { echo "checked"; }  echo '><label for="btnset_following1">Si</label>
                            <input type="radio" value="1" id="btnset_following3" name="hide_inRoom"';  if ($inroom !== '0') { echo "checked"; }  echo '><label for="btnset_following3">No</label>
                        </div>

                        <label>Solicitudes</label>
                        <div class="desc">¿Pueden los otros usuarios agregarte a enviarte solicitud de amistad?</div>
                        <div class="btnset">
                            <input type="radio" value="0" id="btnset_requests1" name="block_newFriends"'; if ($newfriends !== '1') { echo "checked"; } echo '><label for="btnset_requests1">Si</label>
                            <input type="radio" value="1" id="btnset_requests3" name="block_newFriends"';  if ($newfriends !== '0') { echo "checked"; } echo '><label for="btnset_requests3">No</label>
                        </div>

                        <label>Estado en línea</label>
                        <div class="desc">¿Pueden los otros usuarios verte en línea?</div>
                        <div class="btnset">
                            <input type="radio" value="0" id="btnset_online1" name="hide_Online"';  if ($online !== "1") { echo "checked"; } echo '><label for="btnset_online1">Si</label>
                            <input type="radio" value="1" id="btnset_online3" name="hide_Online"';  if ($online !== "0") { echo "checked"; } echo '><label for="btnset_online3">No</label>
                        </div>

                        <button class="btn green save" type="submit" name="general">Guardar</button>
                    </form>
                </div>
            </div>';
		
		} else {
			?>
            <div id="content-box" style="height:380px">
                <div class="png20">
                    <form method="post">
                        <label>Seguimiento</label>
                        <div class="desc">¿Pueden los otros usuarios del hotel seguirte?</div>
                        <div class="btnset">
                            <input type="radio" value="0" id="btnset_following1" name="hide_inRoom" <?php if ($row['hide_inroom'] !== '1') { echo "checked"; } ?>><label for="btnset_following1">Si</label>
                            <input type="radio" value="1" id="btnset_following3" name="hide_inRoom" <?php if ($row['hide_inroom'] !== '0') { echo "checked"; } ?>><label for="btnset_following3">No</label>
                        </div>

                        <label>Solicitudes</label>
                        <div class="desc">¿Pueden los otros usuarios agregarte a enviarte solicitud de amistad?</div>
                        <div class="btnset">
                            <input type="radio" value="0" id="btnset_requests1" name="block_newFriends" <?php if ($row['block_newfriends'] !== '1') { echo "checked"; } ?>><label for="btnset_requests1">Si</label>
                            <input type="radio" value="1" id="btnset_requests3" name="block_newFriends" <?php if ($row['block_newfriends'] !== '0') { echo "checked"; } ?>><label for="btnset_requests3">No</label>
                        </div>

                        <label>Estado en línea</label>
                        <div class="desc">¿Pueden los otros usuarios verte en línea?</div>
                        <div class="btnset">
                            <input type="radio" value="0" id="btnset_online1" name="hide_Online" <?php if ($row['hide_online'] !== "1") { echo "checked"; } ?>><label for="btnset_online1">Si</label>
                            <input type="radio" value="1" id="btnset_online3" name="hide_Online" <?php if ($row['hide_online'] !== "0") { echo "checked"; } ?>><label for="btnset_online3">No</label>
                        </div>

                        <button class="btn green save" type="submit" name="general">Guardar</button>
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