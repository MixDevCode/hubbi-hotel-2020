<?php session_start(); ?>
<html>
<head>
    <meta charset="utf-8">
    <title>Hubbi: <?php echo $_SESSION["username"];?></title>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-168125478-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-168125478-1');
	</script>
	<script data-ad-client="ca-pub-1938510658592260" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>


    <link type="text/css" href="css/style.css" rel="stylesheet">
</head>

<body>
	
	<?php include_once("config/header.php");?>

	<div class="container">
		<div class="row">
			<div class="col-8">
				<div id="news-content">
				<?php
					$sqlnews = ("SELECT * FROM cms_news");
					$resultnews = $link->query($sqlnews);
					if ($rownews = mysqli_fetch_array($resultnews)){ 
					do {
						$sqlnewsu = ("SELECT username FROM users where id = ".$rownews['author']."");
						$resultnewsu = $link->query($sqlnewsu);
						$rownewsu = mysqli_fetch_array($resultnewsu);
						
						echo '
									<div class="news-article show" style="background-image:url('.$rownews['image'].')">
										<div class="shadow"></div>

										<div class="news-content">
											<div class="news-title">'.$rownews['title'].'</div>
											<div class="news-short-text">'.$rownews['shortstory'].'</div>
										</div>

										<div class="details-box">
											<div class="back-news"><i class="fal fa-angle-left"></i></div>

											<div class="authors-details">
												<div class="written-by">
													<b>Escrito por:</b>
													<span>'.$rownewsu['username'].'</span>
												</div>
											</div>

											<a href="news.php?id='.$rownews['id'].'" class="btn green news-slider-btn">Leer más</a>

											<div class="next-news"><i class="fal fa-angle-right"></i></div>
										</div>
									</div>
								';
									
								
					} while ($rownews = mysqli_fetch_array($resultnews));
					echo '</div>';
					}
				?>
			</div>
			<div class="col-4">
				<iframe src="https://discordapp.com/widget?id=715438588522659902&theme=dark" width="340" height="250" allowtransparency="true" frameborder="0"></iframe>
			</div>
			<div class="col-7">
				<div id="content-box">
					<div class="title-box png20">
						<div class="title">¡Síguenos en las Redes!</div>
						<div class="desc">¿Te perderás todo lo que ocurre en el hotel?</div>
					</div>
					<div class="png20">
					
						<div class="campaigns">
							<a href="https://www.facebook.com/hubbi.us/" target="_blank">
								<div class="img" style="background-image:url('https://beeimg.com/images/q90710632332.png')"></div>
								<div class="details">
									<div class="title">Facebook</div>
									<div class="desc">¡Da click aquí para que te lleve al Facebook del hotel!</div>
								</div>
							</a>
						</div>
						<div class="campaigns">
							<a href="https://www.instagram.com/hubbi_us/" target="_blank">
								<div class="img" style="background-image:url('https://beeimg.com/images/k56426457131.png')"></div>
								<div class="details">
									<div class="title">Instagram</div>
									<div class="desc">¡Da click aquí para que te lleve al Instagram del hotel!</div>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-5">
				<div id="content-box" style="max-height:300px">
					<div class="title-box png20">
						<div class="title">Salas populares</div>
						<div class="desc">Entérate de las salas con más usuarios dentro de Hubbi</div>
					</div>
					<div class="png202">
						<div class="popular-rooms">
						<?php
					$sqlpopr = ("SELECT * FROM rooms ORDER BY users_now + 0 DESC LIMIT 3");
					$resultpopr = $link->query($sqlpopr);
					if ($rowpopr = mysqli_fetch_array($resultpopr)){ 
					do {
						echo '<a href="/jugar">
								<div class="rooms">
									<div class="icon"></div>
									<div class="room-details">
										<div class="name">'.$rowpopr['caption'].'</div>
										<div class="desc">'.$rowpopr['description'].'</div>
										<div class="user-count">'.$rowpopr['users_now'].' <span><i class="fas fa-user"></i></span></div>
									</div>
								</div>
							</a>';
									
								
					} while ($rowpopr = mysqli_fetch_array($resultpopr));
					}
				?>
						</div>
					</div>
                </div>
					</div>
				</div>
			</div>
			<?php include_once("config/footer.php");?>
        </div>
    </div>
    </body>
    <script type="text/javascript" src="js/vendor.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
</html>