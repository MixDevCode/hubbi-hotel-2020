<?php 
if ($rows['panel_index'] == "0") {
	header("location: /");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Title Page-->
    <title>Panel - Inicio</title>

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
                                <div class="au-card recent-report">
                                    <div class="au-card-inner">
                                        <h3 class="title-1"><center>Panel de Administración</center></h3>
										<hr>
										<span>Hola <b><?php echo $user; ?></b>, estás en el apartado del Panel de Administración del hotel. Aquí tendrás todas las funciones que necesitas cumplir.<br>
										Eres <b><?php echo $rowr['name'];?></b> y formas parte del <b>Equipo Staff</b>.<br>
										<br>
										<br>
										Si encuentras algún bug o algún inconveniente en el HK, comunicar a Mix.
										</span>
										
									</div>
								</div>
							</div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                                    <div class="au-card-title" style="background-image:url('images/bg-title-02.jpg');">
                                        <div class="bg-overlay bg-overlay--blue"></div>
                                        <h3>
                                            <i class="zmdi zmdi-comment-text"></i>Ultimas ausencias</h3>
                                    </div>
                                    <div class="au-inbox-wrap js-inbox-wrap">
                                        <div class="au-message js-list-load">
                                            <div class="au-message-list">
											<?php 
												$sql = ("SELECT Usuario, Razon, Desde, Hasta FROM ausencias_hk ORDER BY ID DESC LIMIT 4");
												$result = $link->query($sql);
												if ($row = mysqli_fetch_array($result)){ 
												do {
													$userau = $row['Usuario'];
													$sqls = ("SELECT look FROM users where username = '$userau'");
													$results = $link->query($sqls);
													$rowl = mysqli_fetch_array($results);
													echo "<div class='au-message__item'>
															<div class='au-message__item-inner'>
																<div class='au-message__item-text'>
																	<div class='avatar-wrap'>
																		<div class='avatar'>
																			<img src='https://www.habbo.es/habbo-imaging/avatarimage?figure=".$rowl['look']."&direction=3&head_direction=3&gesture=sml&action=&size=2&headonly=1'>
																		</div>
																	</div>
																	<div class='text'>
																		<h5 class='name'>".$row['Usuario']."</h5>
																		<p>".$row['Razon']."</p>
																	</div>
																</div>
																<div class='au-message__item-time'>
																	<span>".$row['Desde']." - ".$row['Hasta']."</span>
																</div>
															</div>
														</div>";
												} while ($row = mysqli_fetch_array($result)); 
												echo "</div>";
												} else { 
												}
											?>
                                        </div>
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