<?php 
if ($rows['entre_badges'] == "0") {
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
							<div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header"><center>Subir placa</center></div>
                                    <div class="card-body">
									<?php 
									if (!empty($_POST['tit'])) {
										
										$horario = date ('Y-m-d H:i:s', time());
										$placa = $_FILES["badge"]["name"];
										$target_dir = $_SERVER["DOCUMENT_ROOT"]."/swf/c_images/album1584/";
										$target_file = $target_dir . basename($_FILES["badge"]["name"]);
										$uploadOk = 1;
										$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
						
										$check = getimagesize($_FILES["badge"]["tmp_name"]);
										
										if($check !== false) {
											$uploadOk = 1;
										} else {
											echo "El archivo no es una imagen.";
											$uploadOk = 0;
										}
										
										if (file_exists($target_file)) {
											echo "La placa ya existe.";
											$uploadOk = 0;
										}
										
										// Check file size
										if ($_FILES["badge"]["size"] > 500000) {
											echo "Lo lamento, tu placa es demasiado grande.";
											$uploadOk = 0;
										}
										
										// Allow certain file formats
										if($imageFileType != "gif" ) {
											echo "Tu placa debe ser .gif!.";
											$uploadOk = 0;
										}
										
										// Check if $uploadOk is set to 0 by an error
										if ($uploadOk == 0) {
											echo "Lo siento, tu archivo no puede ser subido.";
										// if everything is ok, try to upload file
										
										} else {
											if (move_uploaded_file($_FILES["badge"]["tmp_name"], $target_dir.$_FILES["badge"]["name"])) {
												
												$gif2kill = str_replace(['.gif', '.GIF'], '', $placa);
												$placaurl = $_SERVER["DOCUMENT_ROOT"]."/swf/gamedata/external_flash_texts.txt";
												$placatit = $_POST["tit"];
												$placadesc = $_POST["desc"];
												$placatexto = "\nbadge_name_" . $gif2kill . "=" . $placatit . "\nbadge_desc_" . $gif2kill . "=" . $placadesc;
												
												$archivo = fopen($placaurl, 'a');
												
												fwrite($archivo, $placatexto);
												
												$sqlcs = "INSERT INTO badge_definitions (code, required_right)".
													"VALUES ('$gif2kill', '0'";
												$link->query($sqlcs);
												
												$sqlds = "INSERT INTO cms_logen (nombre, accion, fecha)".
													"VALUES ('$user', 'Ha subido la placa $gif2kill', '$horario')";
												$link->query($sqlds);
												
												?>
												<script type="text/javascript">
												window.location.href = '/hk/index.php?apartado=entretenimiento&seccion=movimientos';
												</script> 
									
									<?php	
											} else {
												echo "Lo siento, hubo un error subiendo la placa.";
											}
										}
									} else {
									?>	
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="file-input" class=" form-control-label">Placa</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="badge" name="badge" class="form-control-file">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-name" class="control-label mb-1">Título</label>
                                                <input id="cc-name" name="tit" type="text" class="form-control cc-name" placeholder="Inserta el titulo de la placa...">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Descripción</label>
                                                <input id="cc-number" name="desc" type="text" class="form-control cc-number" placeholder="Inserta la descripcion de la placa...">
                                            </div>
                                            <div>
                                                <button id="payment-button" type="submit" name="subirlaca" class="btn btn-lg btn-info btn-block">
                                                    <span id="payment-button-amount">Subir</span>
                                                </button>
                                            </div>
                                        </form>
									<?php } ?>
                                    </div>
                                </div>
                            </div>
                        <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header"><center>Dar placa</center></div>
                                    <div class="card-body">
									<?php
									if (!empty($_POST['userplaca'])) {
										
											$userp = $_POST['userplaca'];
											$horario = date ('Y-m-d H:i:s', time());
											$codeplaca = $_POST['codeplaca'];
											
											$sqlplaca = ("SELECT id FROM users where username = '$userp'");
											$resultplaca = $link->query($sqlplaca);
											
											if ($rowplaca = mysqli_fetch_array($resultplaca)) {
												
												$userid = $rowplaca['id'];
												
												$queryver = "SELECT * FROM user_badges WHERE user_id = '$userid' AND badge_id = '$codeplaca'";
												$resultver = $link->query($queryver);
												if ($resultver) {
													if (mysqli_num_rows($resultver) > 0) {
													echo 
													"<form action='' method='post' enctype='multipart/form-data'>
													<div class='form-group'>
														<label for='cc-name' class='control-label mb-1'>Usuario</label>
														<input id='cc-name' name='userplaca' type='text' class='form-control' placeholder='Insertar nombre de usuario...'>
													</div>
													<div class='form-group'>
														<label for='cc-number' class='control-label mb-1'>Código de Placa</label>
														<input id='cc-number' name='codeplaca' type='text' class='form-control' placeholder='Ejemplo: ADM'>
													</div>
									   
													<div>
														<button id='payment-button' type='submit' class='btn btn-lg btn-info btn-block'>
															<span id='payment-button-amount'>Dar</span>
														</button>
													</div>
													</form>
													<hr>
													<center>El usuario ya tiene esta placa.</center>
													";
													} else {
													
													$sqldd = "INSERT INTO user_badges (user_id, badge_id, badge_slot)".
													"VALUES ('$userid', '$codeplaca', '0')";
													$link->query($sqldd);
												
													$sqldsd = "INSERT INTO cms_logen (nombre, accion, fecha)".
														"VALUES ('$user', 'Le ha dado la placa $codeplaca a $userp', '$horario')";
													$link->query($sqldsd);
													
												?> 
													<script type="text/javascript">
													window.location.href = '/hk/index.php?apartado=entretenimiento&seccion=movimientos';
													</script>
												<?php
													}
												}
												
											} else {
												echo 
												"<form action='' method='post' enctype='multipart/form-data'>
												<div class='form-group'>
													<label for='cc-name' class='control-label mb-1'>Usuario</label>
													<input id='cc-name' name='userplaca' type='text' class='form-control' placeholder='Insertar nombre de usuario...'>
												</div>
												<div class='form-group'>
													<label for='cc-number' class='control-label mb-1'>Código de Placa</label>
													<input id='cc-number' name='codeplaca' type='text' class='form-control' placeholder='Ejemplo: ADM'>
												</div>
                                   
												<div>
													<button id='payment-button' type='submit' class='btn btn-lg btn-info btn-block'>
														<span id='payment-button-amount'>Dar</span>
													</button>
												</div>
												</form>
												<hr>
												<center>Lo sentimos, no se ha encontrado a nadie con ese nombre de usuario.</center>
												";
											}
									} else {
												?>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="cc-name" class="control-label mb-1">Usuario</label>
                                                <input id="cc-name" name="userplaca" type="text" class="form-control" placeholder="Insertar nombre de usuario...">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Código de Placa</label>
                                                <input id="cc-number" name="codeplaca" type="text" class="form-control" placeholder="Ejemplo: ADM">
                                            </div>
                                   
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                    <span id="payment-button-amount">Dar</span>
                                                </button>
                                            </div>
                                        </form>
									<?php 
									} 
									?>
                                    </div>
                                </div>
                            </div>
						</div>
						<div class="row">
							<div class="col-md-12">
                                <div class="card">
									<div class="card-header"><center>Buscar todos los usuarios que contienen una placa</center></div>
                                    <div class="card-body">
                                        <form action="" method="get">
                                            <div class="row form-group">
                                                <div class="col col-md-12">
                                                    <div class="input-group">
														<input type="hidden" name="apartado" value="entretenimiento" class="form-control" readonly>
														<input type="hidden" name="seccion" value="verplaca" class="form-control" readonly>
                                                        <input type="text" id="plakita" name="id" placeholder="Insertar placa..." class="form-control">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i> Buscar placa</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
										</form>
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
