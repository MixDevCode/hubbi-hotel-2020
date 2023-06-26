<?php session_start(); ?><html>
<head>
    <meta charset="utf-8">

    <title>Hubbi: Noticias</title>
	<script data-ad-client="ca-pub-1938510658592260" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <link type="text/css" href="css/style.css" rel="stylesheet">
</head>

<body>
	<?php include_once("config/header.php");?>

	<div class="container">
		<div class="row">
        <div class="col-4">
            <div id="content-box">
                <div class="title-box png20">
                    <div class="title">Últimas noticias</div>
                </div>
                <div class="png20">
                    <ul class="news-list">
						<?php
						$sqlnewsS = ("SELECT * FROM cms_news ORDER BY id DESC LIMIT 5");
						$resultnewsS = $link->query($sqlnewsS);
						if ($rownewsS = mysqli_fetch_array($resultnewsS)){ 
						do {
							echo '<li><a href="http://localhost/news.php?id='.$rownewsS["id"].'">'.$rownewsS["title"].'</a></li>';

						} while ($rownewsS = mysqli_fetch_array($resultnewsS));
						}
					?>
                    </ul>					
                </div>
            </div>
        </div>
        <div class="col-8">
            <div id="content-box">
			<?php
				if(empty($_GET['id']))
				{
					$sqlnews = ("SELECT * FROM cms_news ORDER BY id DESC LIMIT 1");
						$resultnews = $link->query($sqlnews);
						if ($rownews = mysqli_fetch_array($resultnews)){ 
						do {
							echo '<div class="title-box png20">
                    <div class="title">'.$rownews["title"].'</div>
                    <div class="desc">'.$rownews["shortstory"].'</div>
                </div>
                <div class="png20">
                    '.$rownews["longstory"].'
                </div>';

						} while ($rownews = mysqli_fetch_array($resultnews));
						}
						
				} else {
						$newid = $_GET['id'];
						$sqlnews = ("SELECT * FROM cms_news WHERE id = '$newid'");
						$resultnews = $link->query($sqlnews);
						$rownews = mysqli_fetch_array($resultnews);
			
						echo '<div class="title-box png20">
						<div class="title">'.$rownews["title"].'</div>
						<div class="desc">'.$rownews["shortstory"].'</div>
						</div>
						<div class="png20">
						'.$rownews["longstory"].'
						</div>';

				}
					?>
                
            </div>
        </div>
		
			<?php include_once("config/footer.php");?>
        </div>
    </div>
    </body>
    <script type="text/javascript" src="js/vendor.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
</html>