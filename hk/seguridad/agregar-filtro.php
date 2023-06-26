<?php 
if ($rows['seg_filters'] == "0") {
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
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
									<h3 class="title-5 m-b-35">Agregar baneo</h3>
                                    </div>
                                </div>
								<?php
								if (!empty($_POST)) {
								
								$hast = $_POST['word'];
								$horario = date ('Y-m-d H:i:s', time());
								$userban = $_POST['reem'];
								$reason = $_POST['estricto'];
								$type = $_POST['ban'];
										
								$sqlsdsd = "INSERT IF NOT EXISTS INTO wordfilter (word, replacement, strict, addedby, bannable)".
										"VALUES ('$hast', '$userban', '$reason', '$user', '$type')";
								$result = $link->query($sqlsdsd);
								
								$sqldsd = "INSERT INTO cms_logseg (nombre, accion, fecha)".
									"VALUES ('$user', 'Agregó la palabra $hast al filtro', '$horario')";
								$link->query($sqldsd);
								
								
								?>
								<script type="text/javascript">
								window.location.href = '/hk/index.php?apartado=seguridad&seccion=filtros';
								</script>
								<?php
								} else {
								?> 
                                <form method="post" action="" enctype="multipart/form-data">
								<div class="form-row">
									<div class="form-group col-md-3" data-validate = "Palabra es requerida">
											<label class="control-label">Palabra</label>
											<input class="form-control" type="text" name="word" value="">
											<span class="shadow-input1"></span>
									</div>
									<div class="form-group col-md-3" data-validate = "Usuario o IP es requerido">
											<label class="control-label">Reemplazo</label>
											<input class="form-control" type="text" name="reem" value="">
											<span class="shadow-input1"></span>
									</div>
									<div class="form-group col-md-3">
											<label class="control-label">Estricto</label>
											<select id="inputState" name="estricto" class="form-control">
											 <option value="1" selected>Si</option>
											 <option value="0">No</option>
										    </select>
											<span class="shadow-input1"></span>
									</div>
									<div class="form-group col-md-3">
											<label class="control-label">Baneable</label>
											<select id="inputState" name="ban" class="form-control">
											 <option value="0" selected>No</option>
											 <option value="1">Si</option>
										    </select>
											<span class="shadow-input1"></span>
									</div>
									<div class="mx-auto">
                                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                            <span id="payment-button-amount">Agregar palabra</span>
											</button>
                                    </div>
								</div>
											</form>
								<?php
								}
								?>
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
