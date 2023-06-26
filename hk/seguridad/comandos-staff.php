<?php
if ($rows['seg_commandstaff'] == "0") {
	header("location: /hk/index.php?apartado=panel&seccion=index");
}
if (isset($_GET['pagina'])) {
    $pagina = $_GET['pagina'];
} else {
    $pagina = 1;
}

$no_of_records_per_page = 8;
$offset = ($pagina-1) * $no_of_records_per_page; 

$total_pages_sql = "SELECT COUNT(*) FROM logs_client_staff";
$result = mysqli_query($link,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);
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
									<h3 class="title-5 m-b-35">Ultimos movimientos</h3>
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
												<th>Staff</th>
                                                <th></th>
                                                <th>Comando</th>
                                                <th></th>
                                                <th>Horario</th>
												<th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php 
												$sqls3 = ("SELECT user_id, data_string, timestamp FROM logs_client_staff ORDER BY id DESC LIMIT $offset, $no_of_records_per_page");
												$results3 = $link->query($sqls3);
												if ($rows3 = mysqli_fetch_array($results3)){ 
												do {
												
												$userid = $rows3['user_id'];
												$sqls2 = ("SELECT username FROM users WHERE id = '$userid'");
												$results2 = $link->query($sqls2);
												$rows2 = mysqli_fetch_array($results2);
												
												echo "<tr class='tr-shadow'>
                                                <td>".$rows2['username']."</td>
                                                <td></td>
												<td>".$rows3['data_string']."</td>
                                                <td></td>
                                                <td>". gmdate('d-m-Y',$rows3['timestamp'])."</td>
                                                <td></td>
												<td></td>
                                            </tr>
											<tr class='spacer'></tr>";
												} while ($rows3 = mysqli_fetch_array($results3)); 
												echo "</tbody>";
												} else { 
												}
											?>
                                        </tbody>
                                    </table>
                                </div>
								<hr>
                        </div>
						</div>
						<div class="row">
						<div class="col-md-12">
						<center>
						<a class="btn btn-primary" href="/hk/index.php?apartado=seguridad&seccion=comandos-staff&pagina=1">Primera</a>
						<a class="<?php if($pagina <= 1){ echo 'disabled btn btn-primary'; } else { echo 'btn btn-primary'; } ?>" href="<?php if($pagina <= 1){ echo '#'; } else { echo "/hk/index.php?apartado=seguridad&seccion=comandos-staff&pagina=".($pagina - 1); } ?>">Anterior</a>
						<a class="<?php if($pagina >= $total_pages){ echo 'disabled btn btn-primary'; } else { echo 'btn btn-primary'; } ?>" href="<?php if($pagina >= $total_pages){ echo '#'; } else { echo "/hk/index.php?apartado=seguridad&seccion=comandos-staff&pagina=".($pagina + 1); } ?>">Siguiente</a>
						<a class="btn btn-primary" href="/hk/index.php?apartado=seguridad&seccion=comandos-staff&pagina=<?php echo $total_pages; ?>">Ultima</a>
						</center>
						</div>
						</div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2020 Habbo Hotel. All rights reserved. </p>
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
