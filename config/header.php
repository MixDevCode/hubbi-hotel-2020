<?php
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: /");
    exit;
}

require_once "hubbi.config.php";

$query = mysqli_query($link, "SELECT * FROM users WHERE username='".$_SESSION['username']."'");

if(mysqli_num_rows($query) > 0){
	$row = mysqli_fetch_array($query);
	$sqlshk = ("SELECT panel_index FROM hk_permissions where rank_id = '".$row['rank_cms']."'");
	$resultshk = $link->query($sqlshk);
	$rowshk = mysqli_fetch_array($resultshk);
}else{
    header("location: /");
	session_destroy();
}

//HK user

$_SESSION['superman'] = $row['username'];

?>
<!DOCTYPE html>
<div id="header-content" style="background-image: url('https://i.imgur.com/eL3BsrU.png');">
		<div class="container">
			<div class="row">
				<div class="col-12">

					<div class="online-count-box"><b><?= USERSON ?></b>usuarios en línea</div>

					<a href="/jugar" class="btn green big check-in-header" target="_blank">Entrar al Hotel</a>
				</div>
			</div>
		</div>
	</div>
	<div id="header-menu">
		<div class="container">
			<div class="row">
				<div class="col-5">
					<ul class="user-menu">
						<li>
							<a href="/me">
								<div class="user-avatar-menu" style="background-image:url(http://habbo.com/habbo-imaging/avatarimage?figure=<?php echo $row['look'];?>&head_direction=3&gesture=sml)"></div><?php echo $row['username'];?><span><i class="far fa-angle-down"></i></span>
							</a>

							<ul class="user-subnavi">
								<li><a href="/home/<?php echo $row['username'];?>">Mi perfil</a></li>
								<li><a href="/settings">Ajustes</a></li>
								<li><a href="/logout" class="logout">Cerrar sesión</a></li>
							</ul>
						</li>
					</ul>
					<?php if ($rowshk['panel_index'] == "1") { echo '
					<ul class="navigation">
						<li><a href="/hk/index.php?apartado=panel&seccion=index">Housekeeping</a></li>
					</ul>';
					}
					?>
				</div>
				<div class="col-2">
					<a href="\" class="logo"></a>
				</div>
				<div class="col-5">
					<ul class="navigation">
						<li>
							<a href="#">Equipo<span><i class="far fa-angle-down"></i></span></a>
								<ul class="subnavi">
									<li><a href="/soporte"><i class="far fa-wrench"></i> Soporte</a></li>
									<li><a href="/staff"><i class="far fa-star"></i> Staff</a></li>
									<li><a href="/extras"><i class="far fa-headphones-alt"></i> Extras</a></li>
								</ul>
						</li>
						<li><a href="/news"><i class="far fa-newspaper"></i> Noticias</a></li>
						<li><a href="#"><i class="far fa-store"></i> Tienda</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>