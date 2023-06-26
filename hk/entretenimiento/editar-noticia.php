<?php 
if ($rows['entre_notis'] == "0") {
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
	<script src="https://cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>

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
									<h3 class="title-5 m-b-35">Agregar noticia</h3>
                                    </div>
                                </div>
								<?php
								if (!empty($_POST)) {

								$idnoti = $_GET['id'];
								$horario = date ('Y-m-d H:i:s', time());
								$sqls = ("SELECT id FROM users where username = '$user'");
								$results = $link->query($sqls);
								$rowl = mysqli_fetch_array($results);
								$userid = $rowl['id'];

								$title = $_POST['titulo'];
								$title2 = $link->real_escape_string($title);
								
								$image = $_POST['image'];
								
								$desc = $_POST['short_desc'];
								$desc2 = $link->real_escape_string($desc);
								
								$noti = $_POST['longstory'];
								$noti2 = $link->real_escape_string($noti);
										
								$sqlsdsd = "UPDATE cms_news SET title = '$title2', shortstory = '$desc2', longstory = '$noti2', author = '$userid', image = '$image' WHERE id = '$idnoti'";
								$result = $link->query($sqlsdsd);
								
								$sqldsd = "INSERT INTO cms_logen (nombre, accion, fecha)".
								"VALUES ('$user', 'Ha actualizado la noticia $title2', '$horario')";
								$link->query($sqldsd);
								
								?>
								<script type="text/javascript">
								window.location.href = '/hk/index.php?apartado=entretenimiento&seccion=noticias';
								</script>
								<?php
								} else {
								?> 
                                <form method="post" action="" enctype="multipart/form-data">
								<?php
								$idsds = $_GET['id'];
								$sqldsds = ("SELECT title, shortstory, longstory, image FROM cms_news where ID = '$idsds'");
								$resultdsds = $link->query($sqldsds);
								$rowdsds = mysqli_fetch_array($resultdsds);
								?>
								  <div class="form-group" data-validate = "Titulo es requerido">
											<label class="control-label col-md-3">Titulo de la noticia</label>
											<input class="form-control" type="text" name="titulo" value="<?php echo $rowdsds['title']?>">
											<span class="shadow-input1"></span>
									</div>
									<div class="form-group" data-validate = "Imagen es requerida">
											<label class="control-label col-md-3">Imagen de la noticia</label>
											<input class="form-control" type="text" name="image" value="<?php echo $rowdsds['image']?>">
											<span class="shadow-input1"></span>
									</div>
									<div class="form-group" data-validate = "Descripcion es requerida">
											<label class="control-label col-md-3">Descripcion</label>
											<input class="form-control" type="text" name="short_desc" value="<?php echo $rowdsds['shortstory']?>">
											<span class="shadow-input1"></span>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">Noticia</label>
										
							   <div id="toolbar-container"></div>
							   <textarea name="longstory" id="editor1"><?php echo $rowdsds['longstory']?></textarea>
									<script>
										CKEDITOR.replace( 'editor1' );
									</script>
								</div>
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                    <span id="payment-button-amount">Actualizar noticia</span>
                                                </button>
                                            </div>
											</form>
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
