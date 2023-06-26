<?php 
if ($rows['admin_cuentas'] == "0") {
	header("location: /hk/index.php?apartado=panel&seccion=index");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

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
                                    <div class="card-header"><center>Buscar un Usuario</center></div>
                                    <div class="card-body">
										<?php if (!empty($_POST['usercred'])) {
											
											$monmotto = $_POST['motto'];
											$monuser = $_POST['usercred'];
											$horario = date ('Y-m-d H:i:s', time());
											$monrank = $_POST['rank'];
											
											$sqlsear = ("SELECT id FROM ranks WHERE rank_id = '$monrank'");
											$resultsear = $link->query($sqlsear);
											$rowsear = mysqli_fetch_array($resultsear);
											
											$monranks = $rowsear['id'];
											
											$sqld = "UPDATE users SET motto = '$monmotto', rank = '$monranks', rank_cms = '$monrank' WHERE username='$monuser'";
											$link->query($sqld);
									
														
											$sqlds = "INSERT INTO cms_logadm (nombre, accion, fecha)".
												"VALUES ('$user', 'Ha actualizado el usuario $monuser', '$horario')";
											$link->query($sqlds);
											
											?>
											<script type="text/javascript">
											window.location.href = '/hk/index.php?apartado=administracion&seccion=cuentas';
											</script>
											<?php
										} else {	
											if (!empty($_POST['user'])) {
											
												$nombreuser = $_POST['user'];
												$sqll = ("SELECT * FROM users WHERE username = '$nombreuser'");
												$resultl = $link->query($sqll);
											
												if ($rowl = mysqli_fetch_array($resultl)){
												
												$idrankk= $rowl['rank_cms'];
												$sqll2 = ("SELECT name FROM ranks WHERE rank_id = '$idrankk'");
												$resultl2 = $link->query($sqll2);
												$rowl2 = mysqli_fetch_array($resultl2);
												echo "
												<form action='' method='post'>
												<div class='row form-group'>
													<div class='col col-md-12'>
														<div class='input-group'>
															<input type='text' id='user' name='user' placeholder='Insertar nombre de usuario' class='form-control'>
															<div class='input-group-btn'>
																<button class='btn btn-primary' type='submit'><i class='fas fa-search'></i> Buscar</button>
															</div>
														</div>
													</div>
												</div>
												</form>
												<form enctype='multipart/form-data' method='post' action=''>
												<div class='row form-group'>
													<div class='col-12 col-md-12'>
													<center>
														<p class='form-control-static'>".$rowl['username']."</p>
														<input id='cc-name' name='usercred' type='hidden' class='form-control' value='".$rowl['username']."'>
													</center>
													<center>
														<img src='https://www.habbo.es/habbo-imaging/avatarimage?figure=".$rowl['look']."&direction=3&head_direction=3&gesture=sml&action=&size=2' />
													</center>
													</div>
													<div class='col-12 col-md-12'>
													<center>
														<p class='form-control-static'>".$rowl2['name']."</p>
													</center>
													</div>
													<br>
													<br>
												<div class='form-group col-md-6'>
											<label class='control-label'>Mision</label>
											<input class='form-control' type='text' name='motto' value='".$rowl['motto']."'>
											<span class='shadow-input1'></span>
											</div>
											<div class='form-group col-md-6'>
											<label class='control-label'>Rango</label>
											<select class='form-control' name='rank'>
											"; 
											$sqlrank = ("SELECT * FROM ranks WHERE rank_id < '$rankid'");
											$resultrank = $link->query($sqlrank);
											if ($rowrank = mysqli_fetch_array($resultrank)){
											do {
												echo "<option value='".$rowrank['rank_id']."'>".$rowrank['name']."</option>";
											} while ($rowrank = mysqli_fetch_array($resultrank));
											echo "</select>";
											}
											echo "
											<span class='shadow-input1'></span>
											</div>
											"; echo "
												</div>
												
	
												<div>
													<button id='payment-button' type='submit' class='btn btn-lg btn-info btn-block'>
														<span id='payment-button-amount'>Actualizar</span>
													</button>
												</div>
											</form>
											</div>
											</div>
											</div>
											</div>";
											echo '<div class="row">
							<div class="col-md-12">
                                <div class="card">
                                    <div class="card-header"><center>Información del Usuario</center></div>
                                    <div class="card-body">
								<div class="form-row">
								  <div class="form-group col-md-3">
											<label class="control-label">IP de Registro</label>
											<p class="form-control-static">'.$rowl['ip_reg'].'</p>
											<span class="shadow-input1"></span>
									</div>
									<div class="form-group col-md-3" data-validate = "Usuario o IP es requerido">
											<label class="control-label">Ultima IP</label>
											<p class="form-control-static">'.$rowl['ip_last'].'</p>
											<span class="shadow-input1"></span>
									</div>
									<div class="form-group col-md-6" data-validate = "Usuario o IP es requerido">
											<label class="control-label">Otros Usuarios</label>
											<p class="form-control-static">';
											$iplast = $rowl['ip_last'];
											$sqlranku = ("SELECT GROUP_CONCAT(username SEPARATOR ', ') FROM users WHERE ip_last = '$iplast'");
											$resultranku = $link->query($sqlranku);
											if ($rowranku = mysqli_fetch_array($resultranku)){
											do {
												$Array = $rowranku["GROUP_CONCAT(username SEPARATOR ', ')"];
												print_r($Array);
											} while ($rowranku = mysqli_fetch_array($resultranku));
											} else {
												echo "No existen otras cuentas";
											}
											echo '
											</p>
											<span class="shadow-input1"></span>
									</div>
								</div>

									</div>
								</div>
							</div>
						</div>';
											} else {
												echo "
												<form action='' method='post'>
                                            <div class='row form-group'>
                                                <div class='col col-md-12'>
                                                    <div class='input-group'>
                                                        <input type='text' id='user' name='user' placeholder='Insertar nombre de usuario' class='form-control'>
                                                        <div class='input-group-btn'>
                                                            <button class='btn btn-primary' type='submit'><i class='fas fa-search'></i> Buscar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											</form>
											<hr>
												No se encontraron usuarios con ese nombre";
											}
										 } else {
										 ?>
                                        <form action="" method="post">
                                            <div class="row form-group">
                                                <div class="col col-md-12">
                                                    <div class="input-group">
                                                        <input type="text" id="user" name="user" placeholder="Insertar nombre de usuario" class="form-control">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i> Buscar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
										</form>
										<?php }} ?>
											<hr>
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
