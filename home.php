<?php
	session_start();
	
	include_once ("config/hubbi.config.php");
	
	if(empty($_GET['user']))
	{
	header("Location:/");
	} else {
		$userhome = str_replace(".php","", $_GET['user']);
		$queryhome = mysqli_query($link, "SELECT * FROM users WHERE username='$userhome'");
		if(mysqli_num_rows($queryhome) > 0){
			$rowhome = mysqli_fetch_array($queryhome);
			$rowuserid = $rowhome['id'];
		} else {
			header("Location:/");
		}
	}
	error_reporting(0);
	ini_set('display_errors', 0);
	
?>
<html>
<head>
    <meta charset="utf-8">

    <title>Hubbi: <?php echo $userhome;?></title>

    <link type="text/css" href="/css/style.css" rel="stylesheet">
</head>

<body>
	<?php include_once("config/header.php");?>

	<div class="container">
		<div class="row">
        <link type="text/css" href="/css/profile.css" rel="stylesheet">
        <div class="col-6">
            <div id="content-box" class="profile">
                <div class="bg"></div>
                <div class="overlay">
                    <div class="avatar-image" style="background-image:url(http://habbo.com/habbo-imaging/avatarimage?figure=<?php echo $rowhome['look'];?>&size=l&head_direction=3&gesture=sml)"></div>

                    <div class="username"><?php echo $rowhome['username'];?></div>
                    <div class="motto"><?php echo $rowhome['motto'];?></div>

                    <div class="last-online">Última conexión: <?php echo gmdate('d.m.Y H:i', $rowhome["last_online"]); ?>Hs</div>
                </div>
                <div style="clear:both"></div>
            </div>

            
            <div class="tease_rooms"></div>
            <div id="content-box">
                <div class="title-box png20">
                    <div class="title">Salas</div>
                    <div class="desc">Echa un vistazo a todas las salas que contiene <?php echo $userhome;?></div>
                </div>
                <div class="png20">
					<?php
					$sqlroom = ("SELECT caption FROM rooms WHERE id = '$rowuserid'");
					$resultroom = $link->query($sqlroom);
					if ($rowroom = mysqli_fetch_array($resultroom)){ 
					do {
						echo '<div class="room-thumbnail"><div class="room-name">'.$rowroom['caption'].'</div></div>';
					} while ($rowroom = mysqli_fetch_array($resultroom));
					}
					?>
                    
                    
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="col-6">
            <div class="tease_friends"></div>
            <div id="content-box">
                <div class="title-box png20">
                    <div class="title">Amigos</div>
                    <div class="desc">¿Creíste que <?php echo $userhome;?> era una persona solitaria?</div>
                </div>
                <div class="png20">
					<?php
					$sqlfriends = ("SELECT user_two_id FROM messenger_friendships WHERE user_one_id = '$rowuserid'");
					$resultfriends = $link->query($sqlfriends);
					if ($rowfriends = mysqli_fetch_array($resultfriends)){ 
					do {
						$friendtwo = $rowfriends['user_two_id'];
						$sqlfriends2 = ("SELECT username,look FROM users WHERE id = '$friendtwo'");
						$resultfriends2 = $link->query($sqlfriends2);
						$rowfriends2 = mysqli_fetch_array($resultfriends2);
						echo '<a href="/home/'.$rowfriends2['username'].'" class="friends-head" style="background-image:url(http://habbo.com/habbo-imaging/avatarimage?figure='.$rowfriends2['look'].'&size=b&head_direction=3&gesture=sml&headonly=1)"><div class="username">'.$rowfriends2['username'].'</div></a>';
					} while ($rowfriends = mysqli_fetch_array($resultfriends));
					}
					?>   
                    <div class="clear"></div>
                </div>
            </div>

            <div class="tease_groups"></div>
            <div id="content-box">
                <div class="title-box png20">
                    <div class="title">Grupos</div>
                    <div class="desc">Los grupos en los que <?php echo $userhome;?> forma parte! :D</div>
                </div>
                <div class="png20">
					<?php
					$sqlgroup = ("SELECT group_id FROM group_memberships WHERE user_id = '$rowuserid'");
					$resultgroup = $link->query($sqlgroup);
					if ($rowgroup = mysqli_fetch_array($resultgroup)){ 
					do {
						$grouptwo = $rowgroup['group_id'];
						$sqlgroup2 = ("SELECT name, badge FROM groups WHERE id = '$grouptwo'");
						$resultgroup2 = $link->query($sqlgroup2);
						$rowgroup2 = mysqli_fetch_array($resultgroup2);
						echo '<div class="group-badge" style="background-image:url(http://localhost/habbo-imaging/badge/'.$rowgroup2['badge'].'.gif)"><div class="group-name">'.$rowgroup2['name'].'</div></div>';
					} while ($rowgroup = mysqli_fetch_array($resultgroup));
					}
					?>      
                    <div class="clear"></div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="created_account"><?php echo $rowhome['username'];?> desde el <b><?php echo gmdate('d.m.Y', $rowhome["account_created"]); ?></b> forma parte de nuestra comunidad</div>
        </div>
		
			<?php include_once("config/footer.php");?>
			
        </div>
    </div>
    </body>
    <script type="text/javascript" src="js/vendor.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
</html>