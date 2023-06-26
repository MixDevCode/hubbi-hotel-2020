<?php 
if ($rows['panel_aus'] == "0") {
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
									<h3 class="title-5 m-b-35">Ausencias</h3>
                                    </div>
                                </div>
								<?php
								if (!empty($_POST)) {
								
								$Usuario = $user;
								$Razon = $_POST['raz'];
								$Desde = $_POST['desd'];
								$Hasta = $_POST['hast'];
										
								$sql = "INSERT INTO ausencias_hk (Usuario, Razon, Desde, Hasta)".
										"VALUES ('$Usuario', '$Razon', '$Desde', '$Hasta')";
								$result = $link->query($sql);
								
								?>
								<script type="text/javascript">
								window.location.href = '/hk/index.php?apartado=panel&seccion=ausencias';
								</script>
								<?php
								} else {
								?> 
                                    <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="cc-name" class="control-label mb-1">Razón</label>
                                                <input id="cc-name" name="raz" type="text" class="form-control" placeholder="Ej: Enfermedad..."></span>
                                            </div>
											<div class="form-inline">
												<div class="form-group col-md-6">
													<label for="cc-number" class="control-label mb-1 ">Desde&nbsp</label>
													<input id="cc-number" name="desd" type="date" class="form-control" value="5141"></span>
												</div>
												<div class="form-group col-md-6">
													<label for="cc-number" class="control-label mb-1">Hasta&nbsp</label>
													<input id="datefield" name="hast" min="2000-00-00" type="date" class="form-control"></span>
												</div>
											</div>
											<hr>
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                    <span id="payment-button-amount">Agregar ausencia</span>
                                                </button>
                                            </div>
                                        </form>
									<script type="text/javascript">
									var today = new Date();
									var dd = today.getDate();
									var mm = today.getMonth()+1; //January is 0!
									var yyyy = today.getFullYear();
									 if(dd<10){
											dd='0'+dd
										} 
										if(mm<10){
											mm='0'+mm
										} 

									today = yyyy+'-'+mm+'-'+dd;
									document.getElementById("datefield").setAttribute("min", today);
									</script>
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
