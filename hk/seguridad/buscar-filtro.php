<?php 
if ($rows['seg_filters'] == "0") {
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
                                    <div class="card-header"><center>Buscar Filtro</center></div>
                                    <div class="card-body">
											<?php	
											if (!empty($_POST['user'])) {
											
												$nombreuser = $_POST['user'];
												$sqlban = ("SELECT * FROM wordfilter WHERE word = '$nombreuser'");
												$resultban = $link->query($sqlban);
												
												if ($rowban = mysqli_fetch_array($resultban)){

												echo "
												<form action='' method='post'>
												<div class='row form-group'>
													<div class='col col-md-12'>
														<div class='input-group'>
															<input type='text' id='user' name='user' placeholder='Insertar palabra' class='form-control'>
															<div class='input-group-btn'>
																<button class='btn btn-primary' type='submit'><i class='fas fa-search'></i> Buscar</button>
															</div>
														</div>
													</div>
												</div>
												</form>
												<div class='table-responsive table-responsive-data2'>
												<table class='table table-data2'>
													<thead>
														<tr>
															<th>Palabra</th>
															<th>Estricto</th>
															<th>Reemplazo</th>
															<th>Staff</th>
															<th>Baneable</th>
															<th></th>
															<th>Acciones</th>
														</tr>
													</thead>
													<tbody>
															<tr class='tr-shadow'>
															<td>".$row['word']."</td>
															<td>"; if ($row['strict'] == 1){ echo "Si";} else { echo "No"; }  echo "</td>
															<td>
																<span class='block-email'>".$row['replacement']."</span>
															</td>
															<td class='desc'>".$row['addedby']."</td>
															<td>"; if ($row['bannable'] == 1){ echo "Si";} else { echo "No"; } echo "</td>
															<td></td>
															<td>
															<div class='table-data-feature'>
																<a href='/hk/index.php?apartado=seguridad&seccion=eliminar-filtro&word=".$row['word']."' class='item' data-toggle='tooltip' data-placement='top' title='' data-original-title='Eliminar'>
																	<i class='zmdi zmdi-delete'></i>
																</a>
															</div>
															</td>
														</tr>
														<tr class='spacer'></tr>
													</tbody>
												</table>
											</div>";
											} else {
												echo "
												<form action='' method='post'>
                                            <div class='row form-group'>
                                                <div class='col col-md-12'>
                                                    <div class='input-group'>
                                                        <input type='text' id='user' name='user' placeholder='Insertar palabra' class='form-control'>
                                                        <div class='input-group-btn'>
                                                            <button class='btn btn-primary' type='submit'><i class='fas fa-search'></i> Buscar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											</form>
											<hr>
												No se encontraron filtros con esa palabra";
											}
										 } else {
										 ?>
                                        <form action="" method="post">
                                            <div class="row form-group">
                                                <div class="col col-md-12">
                                                    <div class="input-group">
                                                        <input type="text" id="user" name="user" placeholder="Insertar palabra" class="form-control">
														<div class='input-group-btn'>
															<button class='btn btn-primary' type='submit'><i class='fas fa-search'></i> Buscar</button>
														</div>
                                                    </div>
                                                </div>
                                            </div>	
										</form>
										<?php } ?>
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
