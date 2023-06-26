<?php 
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: /");
    exit;
}

require_once "config/hubbi.config.php";
require_once "config/slopt_config.php";

$query = mysqli_query($link, "SELECT * FROM users WHERE username='".$_SESSION['username']."'");

if(mysqli_num_rows($query) > 0){
	$row = mysqli_fetch_array($query);
}else{
    header("location: /");
	session_destroy();
}
$usersubid = $row['id'];
$querysub = mysqli_query($link, "SELECT * FROM user_subscriptions WHERE user_id='$usersubid' AND subscription_id='habbo_vip'");

if(mysqli_num_rows($querysub) > 0){
}else{
	$querysubtime = time();
   $querysub = mysqli_query($link, "INSERT INTO user_subscriptions (user_id, subscription_id, timestamp_activated, timestamp_expire) VALUES ('$usersubid', 'habbo_vip', '$querysubtime', '2147483647')");
}

?>

<html>
</body>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Hubbi - <?php echo $_SESSION["username"];?></title>
	<script src="/client/js/jquery-latest.js" type="text/javascript"></script>
	<script src="/client/js/jquery-ui.js" type="text/javascript"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-168125478-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-168125478-1');
	</script>
	<script data-ad-client="ca-pub-1938510658592260" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<script src="/client/js/flashclient.js"></script>
	<script src="/client/js/flash_detect_min.js"></script>
	<script src="/client/js/client.js" type="text/javascript"></script>
	<script src="/client/js/error.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="/assets/css/clientindex.css">
	<link rel="stylesheet" href="/client/css/client.css" type="text/css">
	<link rel="stylesheet" href="/client/css/radio.css" type="text/css">
	<link rel="stylesheet" href="/client/css/tipped.css" type="text/css">
	<link rel="stylesheet" href="/client/css/reset.css" type="text/css">
    <link rel="stylesheet" href="/assets/css/client.css" type="text/css">
</head>
<body>
	<center>
		<script type="text/javascript">
			$(document).ready(function(e) {
				$.ajaxSetup({
					cache:true
				});
				setInterval(function() {
					$('#alerton').load('/alertoncms');
				}, 30000);
			});
		</script>
			<div id="alertcms"></div>
			<div id="alerton"></div>

	<div id="flash-container" style="visibility: hidden;">
        	<div id="content" style="display: block;"> 
				<div class="logo" style="margin-top: 12.5%;"></div>
				<a href="//www.adobe.com/go/getflashplayer">
					<div class="flashImage"><img src="/assets/images/frank.gif"></div>
					<h2 style=" font-family: arial; ">Habilite o instale flash haciendo click aquí</h2>
				</a>
				<br>
			</div>
        </div>
		<div id="client-ui">
			<div class="client" id="client"></div>
		</div>

<div id="area_player">
			<div id="player" class="draggable ui-widget-content" style="z-index: 10000000;">
				<div class="player_min">
					<div class="guy"></div>
					<div class="txt">Radio</div>
					<div class="handle ui-draggable-handle"></div>
					<div class="open o-c tip"></div>
				</div>
				<div class="player">
					<div class="chair tip">
						
						
					</div>
					<div id="demo">
						<audio id="audio" src="https://centova.blumhost.es/proxy/alain?mp=/stream" autoplay=""></audio>
					</div>
					<div class="btn" onclick="Player.toggleP();">
						<div class="play pause"></div>
					</div>
					<div class="separa"></div>

					<div class="info music">Radio Hubbi</div>
					<script type="text/javascript">
						$(document).ready(function(e) {
							$.ajaxSetup({
								cache:true
							});
							setInterval(function() {
								$('#actualdj').load('/djactual');
							}, 5000);
						});
					</script>
					<div class="info listeners" id="actualdj"></div>
					
					<div class="close o-c tip" title="Cerrar"></div>
					<div class="handle ui-draggable-handle"></div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
		if(!FlashDetect.installed){
			var elemento = document.getElementById("flash-container");
			elemento.style.visibility = 'visible'; 	
		}
		</script>
	<script src="/client/js/tipped.js" type="text/javascript"></script>
	<script src="/client/js/player.js" type="text/javascript"></script>
	
		<script>
			var Client = new SWFObject("<?= $hotel['swfFolderSwf'] ?>", "client", "100%", "100%", "10.0.0");
			Client.addVariable("client.allow.cross.domain", "0"); 
			Client.addVariable("client.notify.cross.domain", "1");
			Client.addVariable("connection.info.host", "<?= $hotel['emuHost'] ?>");
			Client.addVariable("connection.info.port", "<?= $hotel['emuPort'] ?>");
			Client.addVariable("site.url", "<?= $config['hotelUrl'] ?>");
			Client.addVariable("url.prefix", "<?= $config['hotelUrl'] ?>"); 
			Client.addVariable("client.reload.url", "<?= $config['hotelUrl'] ?>/me");
			Client.addVariable("client.fatal.error.url", "<?= $config['hotelUrl'] ?>/me");
			Client.addVariable("client.connection.failed.url", "<?= $config['hotelUrl'] ?>/me");
			Client.addVariable("external.override.texts.txt", "<?= $hotel['external_Texts_Override'] ?>"); 
			Client.addVariable("external.override.variables.txt", "<?= $hotel['external_Variables_Override'] ?>"); 	
			Client.addVariable("external.variables.txt", "<?= $hotel['external_Variables'] ?>");
			Client.addVariable("external.texts.txt", "<?= $hotel['external_Texts'] ?>"); 
			Client.addVariable("external.figurepartlist.txt", "<?= $hotel['figuredata'] ?>"); 
			Client.addVariable("flash.dynamic.avatar.download.configuration", "<?= $hotel['figuremap'] ?>");
			Client.addVariable("productdata.load.url", "<?= $hotel['productdata'] ?>"); 
			Client.addVariable("furnidata.load.url", "<?= $hotel['furnidata'] ?>");
			Client.addVariable("use.sso.ticket", "1"); 
			Client.addVariable("sso.ticket", "<?php echo $row['auth_ticket']; ?>");
			Client.addVariable("processlog.enabled", "0");
			Client.addVariable("client.starting", "Hubbi está cargando...");
			Client.addVariable("flash.client.url", "<?= $hotel['swfFolder'] ?>/"); 
			Client.addVariable("flash.client.origin", "popup");
			Client.addVariable("ads.domain", "");
			Client.addVariable("diamonds.enabled", "<?= $hotel['diamonds.enabled'] ?>");
			Client.addParam("base", "<?= $hotel['swfFolder'] ?>/");
			Client.addParam("allowScriptAccess", "always");
			Client.addParam("wmode", "opaque");
			Client.write("client");
			FlashExternalInterface.signoutUrl = "<?= $config['hotelUrl'] ?>/logout";
		</script>
		
		<script type="text/javascript">				  
			$(document).ready(function() {
				setTimeout(function() {
					$("div.ads").fadeOut(55000, function () {
						$("div.ads").remove();
					});
				}, 20000);

				setTimeout(function() {
					$("div.ads").fadeOut(55000, function () {
						$("div.ads").remove();
					});
				}, 60000);
				
				setInterval(function(){
					$(".ads2").slideDown("slow2");
				}, 300000);
				
				$('#area_player').css('width', 'calc(100% - 500px)');
			});
			$(document).ready(function() {
				setTimeout(function() {
					$("div.ads").fadeOut(55000, function () {
						$("div.ads").remove();
					});
				}, 20000);

				setTimeout(function() {
					$("div.ads").fadeOut(55000, function () {
						$("div.ads").remove();
					});
				}, 60000);
				
				setInterval(function(){
					$(".ads2").slideDown("slow2");
				}, 300000);
				
				$('#area_player').css('width', 'calc(100% - 500px)');
			});

		var Player = {
			toggleP:function(){
				if ($('#audio').hasClass('pause') === true){
					$("#demo").html();
					$("#demo").html('<audio id="audio" src="https://centova.blumhost.es/proxy/alain?mp=/stream" autoplay></audio>');
					$("#audio").trigger('play');
				}else{
					$("#audio").trigger("pause");
					$("#audio").addClass('pause');
				}
			}
		}

		var audio = document.getElementById('audio');
		audio.volume = 0.5;
		function closeCalendar(){$(".ca1").hide().html(" ");}
</script>

	</center>
</body>
</html>

