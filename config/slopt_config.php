<?php

	/* Database Setting */
	$db['host'] = 'localhost'; //Mysql's Host
	$db['port'] = '3306'; //Mysql's port
	$db['user'] = "root"; //Mysql's user
	$db['pass'] = ''; //Mysql's password
	$db['db'] = "hubbi"; //Mysql's database
	
	/* Emu Settings */
	$config['hotelEmu'] = 'plusemu'; // plusemu // arcturus

	/* Client Configuracion */
	$hotel['emuHost'] = "37.59.173.26"; // Ip del servidor
	$hotel['emuPort'] = "30000";  // Port del emulador
	$hotel['external_Variables'] = "http://localhost/swf/gamedata/external_variables.txt?12323233323";
	$hotel['external_Variables_Override'] = "http://localhost/swf/gamedata/override/external_override_variables.txt?03062021";
	$hotel['external_Texts'] = "http://localhost/swf/gamedata/external_flash_texts.txt?".rand(1,900);
	$hotel['external_Texts_Override'] = "http://localhost/swf/gamedata/override/external_flash_override_texts.txt?03062020";
	$hotel['productdata'] = "http://localhost/swf/gamedata/productdata.txt";
	$hotel['furnidata'] = "http://localhost/swf/gamedata/furnidata.xml";
	$hotel['figuremap'] = "http://localhost/swf/gamedata/figuremap.xml";
	$hotel['figuredata'] = "http://localhost/swf/gamedata/figuredata.xml";
	$hotel['swfFolder'] = "http://localhost/swf/gordon/PRODUCTION-201601012205-226667486";
	$hotel['swfFolderSwf'] = "http://localhost/swf/gordon/habboe.swf";
	$hotel['onlineCounter'] = false; // Enable the user count in the client.
	$hotel['diamonds.enabled'] = true; // Enable diamonds in the hotel.
	
	/* Website Setting */
	$config['hotelUrl'] = "https://hubbi.us";//Address of your hotel. Does not end with a "/"
	$config['skin'] = "sloptv4.3"; //Skin/template of your website
	$config['lang'] = "es"; //Language of your website en/nl/es
	$config['hotelName'] = "Hubbi"; //Name of your hotel
	$config['favicon'] = "/favicon.ico";
	$hotel['StaffCheckHkClient'] = false;//Activar el pin de personal en el cliente y Hk (true) o deshabilitarlo (false)
	$hotel['StaffCheckHkClientMinRank'] = "4"; //Nivel mínimo de personal para obtener el pin de personal en el cliente y Hk	
	$config['groupBadgeURL'] = "http://localhost/habbo-imaging/badge.php?badge=";
	$config['roomthumball'] = "http://localhost/newfoto/thumbnail/"; 
	$config['roomphotos'] = "localhost/newfoto/camera/"; 
	$config['badgeURL'] = "https://hubbi.us/swf/c_images/album1584/"; 
	$config['lookUrl'] = "https://www.habbo.com/habbo-imaging/avatarimage?figure="; 
	$config['userLikeEnable'] = true; // Enable user likes 
	$config['newsCommandEnable'] = true; //Enable news commands
	$config['newsCommandFilter'] = true; //Enable wordfilter on news commands (the filter use the db tabels wordfilter and wordfilter_characters)
	$config['alertReferrer'] = true;
	$config['RankMin'] = "11"; //Autoridad para entrar a la hk
	$config['RankMax'] = "14"; //Todos los pluggin de la hk
	$config['preciovip'] = "30";//Precio VIP mes
	
	/* Facebook Login Settings
	You need a Facebook app for this to work go to
	https://developers.facebook.com/apps/ */


	$config['facebookLogin'] = false; //Enable the Facebook login (true) or disable it (false)
	$config['facebookAPPID'] = '';
	$config['facebookAPPSecret'] = '';
	
	/* Social settings */
	$config['facebook'] = 'HubbiComunity'; /*  Colocar colo el codigo de la pagina ejemplo facebook.com/lo que va aqui se pone  */
	$config['discord'] = 'https://discord.gg/vPh3UgG';
	$config['twitter'] = 'twitter';
	/* Register Setting */
	$config['duckets']	= "0";
	$config['registerEnable'] = true;
	
	/* Config Shop */
	$config['precioloteria'] = "5"; //Aqui va el precio para jugar loteria, el premio va ser el doble de lo que pongas
	
	switch($config['hotelEmu'])
	{
		case "arcturus":
		$emuUse['user_wardrobe']  = 'users_wardrobe ';
		$emuUse['ip_last'] = 'ip_current';
		$emuUse['respect'] = 'respects_received';
		$emuUse['user_stats'] = 'users_settings';
		$emuUse['user_stats_user_id'] = 'user_id';
		$emuUse['OnlineTime'] = 'online_time';
		break;
		case "plusemu":
		$emuUse['user_wardrobe']  = 'user_wardrobe ';
		$emuUse['ip_last'] = 'ip_last';
		$emuUse['respect'] = 'Respect';
		$emuUse['user_stats'] = 'user_stats';
		$emuUse['user_stats_user_id'] = 'id';
		$emuUse['OnlineTime'] = 'OnlineTime';
		break;
		default:
		//Nothing
		break;
	}


?>
