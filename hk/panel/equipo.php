<?php 
if ($rows['panel_team'] == "0") {
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
									<h3 class="title-5 m-b-35">Equipo</h3>
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
												<th></th>
                                                <th>Usuario</th>
                                                <th>Rango</th>
                                                <th>Estado</th>
												<th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php 
												$sqld = ("SELECT look, username, rank_cms, online FROM users WHERE rank > 3 ORDER BY rank_cms DESC");
												$resultd = $link->query($sqld);
												if ($rowd = mysqli_fetch_array($resultd)){ 
												do {
													$rankids = $rowd['rank_cms'];
													$sqls = ("SELECT name FROM ranks where rank_id = '$rankids'");
													$results = $link->query($sqls);
													$rowl = mysqli_fetch_array($results);
													echo "<tr class='tr-shadow'>
                                                <td><img src='https://www.habbo.es/habbo-imaging/avatarimage?figure=".$rowd['look']."&direction=3&head_direction=3&gesture=sml&action=&size=2&headonly=1'</td>
                                                <td>".$rowd['username']."</td>
												<td>".$rowl['name']."</td>
                                                <td>"; 
												$online = $rowd['online'];
												switch ($online) {
													case "1":
														$online = "En linea";
														echo $online;
													break;
													case "0":
														$online = "Desconectad@";
														echo $online;
													break;
												}
												echo "
												</td>
                                                <td></td>
                                            </tr>
											<tr class='spacer'></tr>";
												} while ($rowd = mysqli_fetch_array($resultd)); 
												echo "</tbody>";
												} else { 
												}
											?>
                                        </tbody>
                                    </table>
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
