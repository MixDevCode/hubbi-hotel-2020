<?php 
if ($rows['admin_publicas'] == "0") {
	header("location: /hk/index.php?apartado=panel&seccion=index");
}

if (isset($_GET['pagina'])) {
    $pagina = $_GET['pagina'];
} else {
    $pagina = 1;
}

$no_of_records_per_page = 4;
$offset = ($pagina-1) * $no_of_records_per_page; 

$total_pages_sql = "SELECT COUNT(*) FROM navigator_publics";
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
									<h3 class="title-5 m-b-35">Ver o Agregar Publicas</h3>
                                    </div>
                                </div>
								<?php
								if (!empty($_POST)) {
								
								$horario = date ('Y-m-d H:i:s', time());
								$roomid = $_POST['roomid'];
								$roomcat = $_POST['roomcat'];
								
								$sqlsdsdc = "SELECT caption FROM rooms WHERE id = '$roomid'";
								$resultc = $link->query($sqlsdsdc);
								$rowc = mysqli_fetch_array($resultc);
								$roomname = $rowc['caption'];
								
								$sqlsdsd = "INSERT INTO navigator_publics (room_id, caption, description, image_url, order_num, enabled, category_id)".
										"VALUES ('$roomid', '$roomname', 'Publicado por $user', '/newfoto/thumbnail/".$roomid.".png', '1', '1', '$roomcat')";
								$result = $link->query($sqlsdsd);
								
								$sqldsd = "INSERT INTO cms_logadm (nombre, accion, fecha)".
									"VALUES ('$user', 'Ha agregado la sala ID $roomid a Salas Públicas', '$horario')";
								$link->query($sqldsd);
								
								?>
								<script type="text/javascript">
								window.location.href = '/hk/index.php?apartado=administracion&seccion=publicas';
								</script>
								<?php
								} else {
								?> 
                                <form method="post" action="" enctype="multipart/form-data">
								<div class="form-row">
								  <div class="form-group col-md-6">
											<label class="control-label">Categoría</label>
											<select id="inputState" name="roomcat" class="form-control">
											<?php
												$sqlcate = ("SELECT * FROM navigator_categories WHERE category = 'official_view' AND enabled = '1'");
												$resultcate = $link->query($sqlcate);
												if ($rowcate = mysqli_fetch_array($resultcate)){ 
												do {
													
												echo '<option value="'.$rowcate["id"].'">'.$rowcate["public_name"].'</option>';
				
												} while ($rowcate = mysqli_fetch_array($resultcate));
												} else { 
												}
											?>
										</select>
											<span class="shadow-input1"></span>
									</div>
									<div class="form-group col-md-6" data-validate = "Usuario o IP es requerido">
											<label class="control-label">ID de Sala</label>
											<input class="form-control" type="text" name="roomid" value="">
											<span class="shadow-input1"></span>
									</div>

									<div class="mx-auto">
                                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                            <span id="payment-button-amount">Agregar Sala</span>
											</button>
                                    </div>
								</div>
											</form>
								<?php
								}
								?>
                        </div>
						</div>
						<br><br>
						<div class="row">
							<div class="col-md-12">
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
												<th>ID</th>
                                                <th>Nombre</th>
                                                <th>Descripción</th>
                                                <th>Categoría</th>
                                                <th></th>
												<th></th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php
												$sql = ("SELECT * FROM navigator_publics ORDER BY ID DESC LIMIT $offset, $no_of_records_per_page");
												$result = $link->query($sql);
												if ($row = mysqli_fetch_array($result)){ 
												do {
												$catid = $row['category_id'];
												$sqlcat = ("SELECT public_name FROM navigator_categories WHERE id = '$catid' ");
												$resultcat = $link->query($sqlcat);
												$rowcat = mysqli_fetch_array($resultcat);
												
												echo "<tr class='tr-shadow'>
                                                <td>".$row['room_id']."</td>
                                                <td>".$row['caption']."</td>
                                                <td>
                                                    <span class='block-email'>".$row['description']."</span>
                                                </td>
                                                <td class='desc'>".$rowcat['public_name']."</td>
                                                <td></td>
												<td></td>
                                                <td>
												<div class='table-data-feature'>
                                                    <a href='/hk/index.php?apartado=administracion&seccion=eliminar-publica&id=".$row['room_id']."' class='item' data-toggle='tooltip' data-placement='top' title='' data-original-title='Eliminar'>
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
						<a class="btn btn-primary" href="/hk/index.php?apartado=administracion&seccion=publicas&pagina=1">Primera</a>
						<a class="<?php if($pagina <= 1){ echo 'disabled btn btn-primary'; } else { echo 'btn btn-primary'; } ?>" href="<?php if($pagina <= 1){ echo '#'; } else { echo "/hk/index.php?apartado=apartado=administracion&seccion=publicas&pagina=".($pagina - 1); } ?>">Anterior</a>
						<a class="<?php if($pagina >= $total_pages){ echo 'disabled btn btn-primary'; } else { echo 'btn btn-primary'; } ?>" href="<?php if($pagina >= $total_pages){ echo '#'; } else { echo "/hk/index.php?apartado=administracion&seccion=publicas&pagina=".($pagina + 1); } ?>">Siguiente</a>
						<a class="btn btn-primary" href="/hk/index.php?apartado=administracion&seccion=publicass&pagina=<?php echo $total_pages; ?>">Ultima</a>
						</center>
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
