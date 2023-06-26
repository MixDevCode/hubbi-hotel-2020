<?php 
if ($rows['desa_settings'] == "0") {
	header("location: /hk/index.php?apartado=panel&seccion=index");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
	<?php include('config/header.php');?>
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
                                <div class="card">
                                    <div class="card-header"><center>Ajustes de Registro</center></div>
                                    <div class="card-body">
								<?php
								if (isset($_POST['registro2'])) {
								
								$hast = $_POST['credits'];
								$horario = date ('Y-m-d H:i:s', time());
								$userban = $_POST['diamonds'];
								$reason = $_POST['room'];
								$type = $_POST['motto'];
										
								$sqlsdsd = "UPDATE slopt_cms SET credits='$hast', diamonds='$userban', home_room='$reason', motto='$type'";
								$result = $link->query($sqlsdsd);
								
								$sqldsd = "INSERT INTO cms_logdes (nombre, accion, fecha)".
									"VALUES ('$user', 'Actualizó los Ajustes de Registro', '$horario')";
								$link->query($sqldsd);
								
								
								?>
								<script type="text/javascript">
								window.location.href = '/hk/index.php?apartado=desarrollo&seccion=ajustes';
								</script>
								<?php
								} else {
								?> 
                                <form method="post" action="" enctype="multipart/form-data">
								<div class="form-row">
								<?php 
									$sqls2 = ("SELECT * FROM slopt_cms");
									$results2 = $link->query($sqls2);
									$rows2 = mysqli_fetch_array($results2);
									?>
								  <div class="form-group col-md-3">
											<label class="control-label">Créditos de Inicio</label>
											<input class="form-control" type="text" name="credits" value="<?php echo $rows2["credits"];?>">
											<span class="shadow-input1"></span>
									</div>
									<div class="form-group col-md-3" data-validate = "Usuario o IP es requerido">
											<label class="control-label">Diamantes de Inicio</label>
											<input class="form-control" type="text" name="diamonds" value="<?php echo $rows2["diamonds"];?>">
											<span class="shadow-input1"></span>
									</div>
									<div class="form-group col-md-3" data-validate = "Razon es requerida">
											<label class="control-label">Sala de Inicio (ID)</label>
											<input class="form-control" type="text" name="room" value="<?php echo $rows2["home_room"];?>">
											<span class="shadow-input1"></span>
									</div>
									<div class="form-group col-md-3" data-validate = "Tiempo es requerido">
											<label class="control-label">Misión de Inicio</label>
											<input class="form-control" type="text" name="motto" value="<?php echo $rows2["motto"];?>">
											<span class="shadow-input1"></span>
									</div>
									<div class="mx-auto">
                                            <button id="payment-button" type="submit" name="registro2" class="btn btn-lg btn-info btn-block">
                                            <span id="payment-button-amount">Actualizar Registro</span>
											</button>
                                    </div>
								</div>
											</form>
								<?php
								}
								?>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
                                <div class="card">
                                    <div class="card-header"><center>Ajustes de Radio</center></div>
                                    <div class="card-body">
								<?php
								if (isset($_POST['radio'])) {
								
								$hast = $_POST['radio2'];
								$horario = date ('Y-m-d H:i:s', time());
										
								$sqlsdsd2 = "UPDATE slopt_cms SET radio='$hast'";
								$result2 = $link->query($sqlsdsd2);
								
								$sqldsd2 = "INSERT INTO cms_logdes (nombre, accion, fecha)".
									"VALUES ('$user', 'Actualizó los Ajustes de Radio', '$horario')";
								$link->query($sqldsd2);
								
								?>
								<script type="text/javascript">
								window.location.href = '/hk/index.php?apartado=desarrollo&seccion=ajustes';
								</script>
								<?php
								} else {
								?> 
                                <form method="post" action="" enctype="multipart/form-data">
								<div class="form-row">
								  <div class="form-group col-md-12">
											<label class="control-label">URL para Reproductor</label>
											<input class="form-control" type="text" name="radio2" value="<?php echo $rows2["radio"];?>">
											<span class="shadow-input1"></span>
									</div>
									<div class="mx-auto">
                                            <button id="payment-button" type="submit" name="radio" class="btn btn-lg btn-info btn-block">
                                            <span id="payment-button-amount">Actualizar Radio</span>
											</button>
                                    </div>
								</div>
											</form>
								<?php
								}
								?>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
                                <div class="card">
                                    <div class="card-header"><center>Mantenimiento del Hotel</center></div>
                                    <div class="card-body">
								<?php
								if (isset($_POST['mantenimiento2'])) {
								
								$hast = $_POST['maintenance'];
								$horario = date ('Y-m-d H:i:s', time());
								$userban = $_POST['rank'];
										
								$sqlsdsd3 = "UPDATE slopt_cms SET maintenance= '$hast', rank_maintenance= '$userban'";
								$result3 = $link->query($sqlsdsd3);
								
								$sqldsd3 = "INSERT INTO cms_logdes (nombre, accion, fecha)".
									"VALUES ('$user', 'Actualizó los Ajustes de Mantenimiento', '$horario')";
								$link->query($sqldsd3);
								
								?>
								<script type="text/javascript">
								window.location.href = '/hk/index.php?apartado=desarrollo&seccion=ajustes';
								</script>
								<?php
								} else {
								?> 
                                <form method="post" action="" enctype="multipart/form-data">
								<div class="form-row">
								  <div class="form-group col-md-6">
											<label class="control-label">Activar Mantenimiento</label>
											<select name="maintenance" class="form-control">
											
											<option value="false" <?php if ($rows2["maintenance"] == "false'") { echo "selected"; }?>>No</option>
											<option value="true" <?php if ($rows2["maintenance"] == "true") { echo "selected"; }?>>Si</option>
											</select>
											<span class="shadow-input1"></span>
									</div>
									<div class="form-group col-md-6" data-validate = "Usuario o IP es requerido">
											<label class="control-label">Rango Mínimo para Acceder al Hotel</label>
											<input class="form-control" type="text" name="rank" value="<?php echo $rows2["rank_maintenance"];?>">
											<span class="shadow-input1"></span>
									</div>
									<div class="mx-auto">
                                            <button id="payment-button" type="submit" name="mantenimiento2" class="btn btn-lg btn-info btn-block">
                                            <span id="payment-button-amount">Actualizar Mantenimiento</span>
											</button>
                                    </div>
								</div>
											</form>
								<?php
								}
								?>
									</div>
								</div>
							</div>
						</div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2020 Hubbi Hotel. All rights reserved. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
