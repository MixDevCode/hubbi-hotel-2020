<?php 
if ($rows['entre_money'] == "0") {
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
                                    <div class="card-header"><center>Monedas</center></div>
                                    <div class="card-body">
										<?php if (!empty($_POST['usercred'])) {
											
											$monuser = $_POST['usercred'];
											$horario = date ('Y-m-d H:i:s', time());
											$moncred = $_POST['cred'];
											$mondiam = $_POST['diam'];
											
												if (!empty($_POST['cred']) && !empty($_POST['diam'])) {
													
													$sqld = "UPDATE users SET credits = credits + '$moncred', vip_points = vip_points + '$mondiam' WHERE username='$monuser'";
													$link->query($sqld);
													
													$sqlds = "INSERT INTO cms_logen (nombre, accion, fecha)".
														"VALUES ('$user', 'Ha sumado $mondiam diamantes y $moncred creditos a $monuser', '$horario')";
													$link->query($sqlds);
													
												} else {
													if (!empty($_POST['cred'])) {
														
														$sqld = "UPDATE users SET credits = credits + '$moncred' WHERE username='$monuser'";
														$link->query($sqld);
														
														$sqlds = "INSERT INTO cms_logen (nombre, accion, fecha)".
														"VALUES ('$user', 'Ha sumado $moncred creditos a $monuser', '$horario')";
														$link->query($sqlds);
														
													} else {
														if (!empty($_POST['diam'])) {
															
															$sqld = "UPDATE users SET vip_points = vip_points + '$mondiam' WHERE username='$monuser'";
															$link->query($sqld);
															
															$sqlds = "INSERT INTO cms_logen (nombre, accion, fecha)".
															"VALUES ('$user', 'Ha sumado $mondiam diamantes a $monuser', '$horario')";
															$link->query($sqlds);
														}
													}
												}
											?>
											<script type="text/javascript">
											window.location.href = '/hk/index.php?apartado=entretenimiento&seccion=movimientos';
											</script>
											<?php
										} else {	
											if (!empty($_POST['user'])) {
											
												$nombreuser = $_POST['user'];
												$sqll = ("SELECT look, username, credits, vip_points FROM users WHERE username = '$nombreuser'");
												$resultl = $link->query($sqll);
											
												if ($rowl = mysqli_fetch_array($resultl)){
											
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
														<img src='https://www.habbo.es/habbo-imaging/avatarimage?figure=".$rowl['look']."&direction=3&head_direction=3&gesture=sml&action=&size=2' />
													</center>
													</div>
													<div class='col-12 col-md-12'>
													<center>
														<p class='form-control-static'>Usuario: ".$rowl['username']."</p>
														<input id='cc-name' name='usercred' type='hidden' class='form-control' value='".$rowl['username']."'>
													</center>
													</div>
													<div class='col-12 col-md-12'>
													<center>
														<p class='form-control-static'>Creditos: ".$rowl['credits']."</p>
													</center>
													<div class='col-12 col-md-12'>
													<center>
														<p class='form-control-static'>Diamantes: ".$rowl['vip_points']."</p>
													</center>
													</div>
													</div>
												</div>
												<div class='form-group'>
													<label class='control-label mb-1'>Créditos</label>
													<input id='cc-name' name='cred' type='number' max='500' min='-500' class='form-control' placerholder='Cantidad de creditos...'>
												</div>
												<div class='form-group'>
													<label class='control-label mb-1'>Diamantes</label>
													<input id='cc-number' name='diam' type='number' max='500' min='-500' class='form-control' placerholder='Cantidad de diamantes...'>
												</div>
												<div>
													<button id='payment-button' type='submit' class='btn btn-lg btn-info btn-block'>
														<span id='payment-button-amount'>Dar</span>
													</button>
												</div>
											</form>";
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
