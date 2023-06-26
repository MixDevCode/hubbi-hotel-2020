<?php 
if ($rows['admin_badgeshop'] == "0") {
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
                                    <div class="card-header"><center>Subir una placa a la tienda</center></div>
                                    <div class="card-body">
											<?php	
											if (!empty($_POST['badge'])) {
								
								$hast = $_POST['badge'];
								$horario = date ('Y-m-d H:i:s', time());
										
								$sqlsdsd = "INSERT INTO cms_badges (badge_id)".
										"VALUES ('$hast')";
								$result = $link->query($sqlsdsd);
								
								$sqldsd = "INSERT INTO cms_logadm (nombre, accion, fecha)".
								"VALUES ('$user', 'Subió la placa $hast a la Tienda de Placas', '$horario')";
								$link->query($sqldsd);	
								
								?>
								<script type="text/javascript">
								window.location.href = '/hk/index.php?apartado=administracion&seccion=tiendaplacas';
								</script>
								<?php } else {
										 ?>
                                        <form action="" method="post">
                                            <div class="row form-group">
                                                <div class="col col-md-12">
                                                    <div class="input-group">
                                                        <input type="text" id="user" name="badge" placeholder="Código de Placa: EJ... ADM" class="form-control">
														<div class='input-group-btn'>
															<button class='btn btn-primary' type='submit'> Subir</button>
														</div>
                                                    </div>
                                                </div>
                                            </div>	
										</form>
										<?php } ?>
											<hr>
                                    </div>
                                </div>
								<div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
												<th>VISTA PREVIA</th>
												<th>Codigo</th>
												<th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php
												$sql = ("SELECT * FROM cms_badges ORDER BY id");
												$result = $link->query($sql);
												if ($row = mysqli_fetch_array($result)){ 
												do {
													echo "<tr class='tr-shadow'>
                                                <td><img src='/swf/c_images/album1584/".$row["badge_id"].".gif'</td>
												<td>".$row["badge_id"]."</td>
                                                <td>
												<div class='table-data-feature'>
                                                    <a href='/hk/index.php?apartado=administracion&seccion=eliminar-placa&id=".$row['badge_id']."' class='item' data-toggle='tooltip' data-placement='top' title='' data-original-title='Eliminar'>
                                                        <i class='zmdi zmdi-delete'></i>
                                                    </a>
                                                </div>
												</td>
                                            </tr>
											<tr class='spacer'></tr>";
												} while ($row = mysqli_fetch_array($result)); 
												echo "</tbody>";
												} else { 
												}
											?>
                                        </tbody>
                                    </table>
                                <hr>
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
