<?php
if ($rows['seg_filters'] == "0") {
	header("location: /hk/index.php?apartado=panel&seccion=index");
}
if (isset($_GET['pagina'])) {
    $pagina = $_GET['pagina'];
} else {
    $pagina = 1;
}

$no_of_records_per_page = 4;
$offset = ($pagina-1) * $no_of_records_per_page; 

$total_pages_sql = "SELECT COUNT(*) FROM wordfilter";
$result = mysqli_query($link,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);
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
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
									<h3 class="title-5 m-b-35">Filtro de Palabras</h3>
                                    </div>
                                    <div class="table-data__tool-right">
                                        <a href="index.php?apartado=seguridad&seccion=agregar-filtro" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>Agregar</a>
										<a href="index.php?apartado=seguridad&seccion=buscar-filtro" class="au-btn au-btn-icon au-btn--green au-btn--small">
											<i class="zmdi zmdi-search"></i>Buscar</a>
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
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
											<?php
												$sql = ("SELECT * FROM wordfilter LIMIT $offset, $no_of_records_per_page");
												$result = $link->query($sql);
												if ($row= mysqli_fetch_array($result)){ 
												do {
													echo "<tr class='tr-shadow'>
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
						<center>
						<a class="btn btn-primary" href="/hk/index.php?apartado=seguridad&seccion=baneos&pagina=1">Primera</a>
						<a class="<?php if($pagina <= 1){ echo 'disabled btn btn-primary'; } else { echo 'btn btn-primary'; } ?>" href="<?php if($pagina <= 1){ echo '#'; } else { echo "/hk/index.php?apartado=seguridad&seccion=baneos&pagina=".($pagina - 1); } ?>">Anterior</a>
						<a class="<?php if($pagina >= $total_pages){ echo 'disabled btn btn-primary'; } else { echo 'btn btn-primary'; } ?>" href="<?php if($pagina >= $total_pages){ echo '#'; } else { echo "/hk/index.php?apartado=seguridad&seccion=baneos&pagina=".($pagina + 1); } ?>">Siguiente</a>
						<a class="btn btn-primary" href="/hk/index.php?apartado=seguridad&seccion=baneos&pagina=<?php echo $total_pages; ?>">Ultima</a>
						</center>
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
