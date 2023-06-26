<?php session_start(); ?><html>
<head>
    <meta charset="utf-8">

    <title>Hubbi: Equipo</title>

    <link type="text/css" href="css/style.css" rel="stylesheet">
</head>

<body>
	<?php include_once("config/header.php");?>

	<div class="container">
			<?php
					$sqlranks = ("SELECT * FROM ranks WHERE rank_id > 17 AND oculto = 'no' ORDER BY rank_id DESC");
					$resultranks = $link->query($sqlranks);
					if ($rowranks = mysqli_fetch_array($resultranks)){ 
					do {
						echo '<div class="row">
								<div class="col-12">
									<div id="title-headline">'.$rowranks['name'].'</div>
								</div>
							</div><div class="row">';
							$rankidr = $rowranks['rank_id'];
							$sqlranksu = ("SELECT * FROM users WHERE rank_cms = '$rankidr' ORDER BY id DESC");
							$resultranksu = $link->query($sqlranksu);
							if ($rowranksu = mysqli_fetch_array($resultranksu)){
							do {
								echo ' 
								<div class="col-8">
									<a href="/home/'.$rowranksu['username'].'" class="staff-box">
										<div class="staff-header"><div class="header"></div><div class="overlay"><div class="work">';
										$rankbadge = $rowranksu['id'];
										$sqlbadge = ("SELECT badge_id FROM user_badges WHERE user_id = '$rankbadge' AND badge_slot > 0 ORDER BY id DESC");
										$resultbadge = $link->query($sqlbadge);
										if ($rowbadge = mysqli_fetch_array($resultbadge)){
										do {
											echo '<img src="http://localhost/swf/c_images/album1584/'.$rowbadge['badge_id'].'.gif" style="margin-right:5px;" />';
										} while ($rowbadge = mysqli_fetch_array($resultbadge));
										}
										echo '</div><div class="username">'.$rowranksu['username'].'</div></div></div>
										<div class="avatarimage" style="background-image:url(https://www.habbo.com/habbo-imaging/avatarimage?figure='.$rowranksu['look'].'&size=l)"></div>
										<div class="clear"></div>
										<div class="png">
											<div class="motto">'.$rowranksu['motto'].'</div>
											<div class="online-status '; if ($rowranksu['online'] == "1") { echo "online"; } else { echo "offline";} echo '"><div class="dot"></div></div>
											<div class="clear"></div>
										</div>
										<div class="clear"></div>
									</a>
								</div>
							';
							} while ($rowranksu = mysqli_fetch_array($resultranksu));
							}
							else {
								echo "No hay usuarios disponibles <br><br>";
							}
							echo '</div>';
					} while ($rowranks = mysqli_fetch_array($resultranks));
					}
				?>
            
            
			
			<?php include_once("config/footer.php");?>
        </div>
    </div>
    </body>
    <script type="text/javascript" src="js/vendor.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
</html>