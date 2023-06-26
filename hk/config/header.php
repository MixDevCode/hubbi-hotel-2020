<!DOCTYPE html>
<?php require_once 'libs/Mobile_Detect.php';
			$detect = new Mobile_Detect;
			 
			// Any mobile device (phones or tablets).
			if ( $detect->isMobile() ) {?>
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="#">
                            HOUSEKEEPING
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-home"></i>Inicio</a>
                            <ul class="list-unstyled navbar-mobile-sub__list js-sub-list">
								<li>
									<a href="index.php?apartado=panel&seccion=index"><i class="fa fa-chevron-right"></i>Panel</a>
								</li>
								<li>
									</i><a href="index.php?apartado=panel&seccion=ausencias"><i class="fa fa-chevron-right"></i>Ausencias</a>
								</li>
								<li>
									<a href="index.php?apartado=panel&seccion=equipo"><i class="fa fa-chevron-right"></i>Equipo</a>
								</li>		
                            </ul>
                        </li>
						<hr></hr>
						<?php
						if ($rows['admin_mov'] == "1") { ?>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-chart-bar"></i>Administración</a>
							<ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="index.php?apartado=administracion&seccion=movimientos"><i class="fa fa-chevron-right"></i>Movimientos</a>
                                </li>
								<li>
                                    <a href="index.php?apartado=administracion&seccion=cuentas"><i class="fa fa-chevron-right"></i>Cuentas</a>
                                </li>
								<li>
                                    <a href="index.php?apartado=administracion&seccion=herramientas"><i class="fa fa-chevron-right"></i>Herramientas</a>
                                </li>
								<li>
                                    <a href="index.php?apartado=administracion&seccion=publicas"><i class="fa fa-chevron-right"></i>Salas Públicas</a>
                                </li>
								<li>
                                    <a href="index.php?apartado=administracion&seccion=tiendaplacas"><i class="fa fa-chevron-right"></i>Tienda de Placas</a>	
                                </li>
								<li>
                                    <a href="index.php?apartado=administracion&seccion=catalogoraros"><i class="fa fa-chevron-right"></i>Catálogo de Raros</a>
                                </li>
								<li>
                                    <a href="index.php?apartado=administracion&seccion=furnis"><i class="fa fa-chevron-right"></i>Furnis</a>
                                </li>
								<li>
                                    <a href="index.php?apartado=administracion&seccion=premios"><i class="fa fa-chevron-right"></i>Premios</a>
                                </li>
                            </ul>
                        </li>
						<hr></hr>
						<?php } ?>
						<?php
						if ($rows['desa_mov'] == "1") { ?>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-table"></i>Desarrollo</a>
							<ul class="list-unstyled navbar-mobile-sub__list js-sub-list">
                                <li>
                                    <a href="index.php?apartado=desarrollo&seccion=movimientos"><i class="fa fa-chevron-right"></i>Movimientos</a>
                                </li>
                                <li>
                                    <a href="index.php?apartado=desarrollo&seccion=ajustes"><i class="fa fa-chevron-right"></i>Ajustes</a>
                                </li>
                                <li>
                                    <a href="index.php?apartado=desarrollo&seccion=catalogo"><i class="fa fa-chevron-right"></i>Catálogo</a>
                                </li>
								<li>
                                    <a href="index.php?apartado=desarrollo&seccion=rangos"><i class="fa fa-chevron-right"></i>Editar Rangos</a>
                                </li>
                            </ul>
                        </li>
						<hr></hr>
						<?php } ?>
						<?php
						if ($rows['entre_mov'] == "1") { ?>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="far fa-check-square"></i>Entretenimiento</a>
							<ul class="list-unstyled navbar-mobile-sub__list js-sub-list">
                                <li>
                                    <a href="index.php?apartado=entretenimiento&seccion=movimientos"><i class="fa fa-chevron-right"></i>Movimientos</a>
                                </li>
                                <li>
                                    <a href="index.php?apartado=entretenimiento&seccion=noticias"><i class="fa fa-chevron-right"></i>Noticias</a>
                                </li>
                                <li>
                                    <a href="index.php?apartado=entretenimiento&seccion=placas"><i class="fa fa-chevron-right"></i>Placas</a>
                                </li>
								<li>
                                    <a href="index.php?apartado=entretenimiento&seccion=monedas"><i class="fa fa-chevron-right"></i>Monedas</a>
                                </li>
								<li>
                                    <a href="index.php?apartado=entretenimiento&seccion=eventos"><i class="fa fa-chevron-right"></i>Eventos</a>
                                </li>
	
                            </ul>
                        </li>
						<hr></hr>
						<?php } ?>
						<?php
						if ($rows['seg_mov'] == "1") { ?>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-calendar-alt"></i>Seguridad</a>
							<ul class="list-unstyled navbar-mobile-sub__list js-sub-list">
                                <li>
                                    <a href="index.php?apartado=seguridad&seccion=movimientos"><i class="fa fa-chevron-right"></i>Movimientos</a>
                                </li>
								<li>
                                    <a href="index.php?apartado=seguridad&seccion=comandos-staff"><i class="fa fa-chevron-right"></i>Comandos de Staff </a>
                                </li>
								<li>
                                    <a href="index.php?apartado=seguridad&seccion=comandos"><i class="fa fa-chevron-right"></i>Comandos de Usuarios </a>
                                </li>
								<li>
                                    <a href="index.php?apartado=seguridad&seccion=baneos"><i class="fa fa-chevron-right"></i>Baneos</a>
                                </li>
								<li>
                                    <a href="index.php?apartado=seguridad&seccion=filtros"><i class="fa fa-chevron-right"></i>Filtros</a>
                                </li>
								<li>
                                    <a href="index.php?apartado=seguridad&seccion=chatlogs"><i class="fa fa-chevron-right"></i>Chatlogs</a>
                                </li>
                            </ul>
                        </li>
						<?php } ?>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->
			<?php } else { ?>

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    HOUSEKEEPING HUBBI
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-home"></i>Inicio</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
								<li>
									<a href="index.php?apartado=panel&seccion=index"><i class="fa fa-chevron-right"></i>Panel</a>
								</li>
								<li>
									</i><a href="index.php?apartado=panel&seccion=ausencias"><i class="fa fa-chevron-right"></i>Ausencias</a>
								</li>
								<li>
									<a href="index.php?apartado=panel&seccion=equipo"><i class="fa fa-chevron-right"></i>Equipo</a>
								</li>		
                            </ul>
                        </li>
						<hr></hr>
						<?php
						if ($rows['admin_mov'] == "1") { ?>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-chart-bar"></i>Administración</a>
							<ul class="list-unstyled navbar__sub-list js-sub-list">
								<?php
								if ($rows['admin_mov'] == "1") { ?>
                                <li>
                                    <a href="index.php?apartado=administracion&seccion=movimientos"><i class="fa fa-chevron-right"></i>Movimientos</a>
                                </li>
								<?php } ?>
								<?php
								if ($rows['admin_cuentas'] == "1") { ?>
								<li>
                                    <a href="index.php?apartado=administracion&seccion=cuentas"><i class="fa fa-chevron-right"></i>Cuentas</a>
                                </li>
								<?php } ?>
								<?php
								if ($rows['admin_herr'] == "1") { ?>
								<li>
                                    <a href="index.php?apartado=administracion&seccion=herramientas"><i class="fa fa-chevron-right"></i>Herramientas</a>
                                </li>
								<?php } ?>
								<?php
								if ($rows['admin_publicas'] == "1") { ?>
								<li>
                                    <a href="index.php?apartado=administracion&seccion=publicas"><i class="fa fa-chevron-right"></i>Salas Públicas</a>
                                </li>
								<?php } ?>
								<?php
								if ($rows['admin_badgeshop'] == "1") { ?>
								<li>
                                    <a href="index.php?apartado=administracion&seccion=tiendaplacas"><i class="fa fa-chevron-right"></i>Tienda de Placas</a>	
                                </li>
								<?php } ?>
								<?php
								if ($rows['admin_raresprices'] == "1") { ?>
								<li>
                                    <a href="index.php?apartado=administracion&seccion=catalogoraros"><i class="fa fa-chevron-right"></i>Catálogo de Raros</a>
                                </li>
								<?php } ?>
								<?php
								if ($rows['admin_furnis'] == "1") { ?>
								<li>
                                    <a href="index.php?apartado=administracion&seccion=furnis"><i class="fa fa-chevron-right"></i>Furnis</a>
                                </li>
								<?php } ?>
								<?php
								if ($rows['admin_rewards'] == "1") { ?>
								<li>
                                    <a href="index.php?apartado=administracion&seccion=premios"><i class="fa fa-chevron-right"></i>Premios</a>
                                </li>
								<?php } ?>
                            </ul>
                        </li>
						<hr></hr>
						<?php } ?>
						<?php
						if ($rows['desa_mov'] == "1") { ?>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-table"></i>Desarrollo</a>
							<ul class="list-unstyled navbar__sub-list js-sub-list">
								<?php
								if ($rows['desa_mov'] == "1") { ?>
                                <li>
                                    <a href="index.php?apartado=desarrollo&seccion=movimientos"><i class="fa fa-chevron-right"></i>Movimientos</a>
                                </li>
								<?php } ?>
								<?php
								if ($rows['desa_settings'] == "1") { ?>
                                <li>
                                    <a href="index.php?apartado=desarrollo&seccion=ajustes"><i class="fa fa-chevron-right"></i>Ajustes</a>
                                </li>
								<?php } ?>
								<?php
								if ($rows['desa_cata'] == "1") { ?>
                                <li>
                                    <a href="index.php?apartado=desarrollo&seccion=catalogo"><i class="fa fa-chevron-right"></i>Catálogo</a>
                                </li>
								<?php } ?>
								<?php
								if ($rows['desa_ranks'] == "1") { ?>
								<li>
                                    <a href="index.php?apartado=desarrollo&seccion=rangos"><i class="fa fa-chevron-right"></i>Editar Rangos</a>
                                </li>
								<?php } ?>
                            </ul>
                        </li>
						<hr></hr>
						<?php } ?>
						<?php
						if ($rows['entre_mov'] == "1") { ?>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="far fa-check-square"></i>Entretenimiento</a>
							<ul class="list-unstyled navbar__sub-list js-sub-list">
								<?php
								if ($rows['entre_mov'] == "1") { ?>
                                <li>
                                    <a href="index.php?apartado=entretenimiento&seccion=movimientos"><i class="fa fa-chevron-right"></i>Movimientos</a>
                                </li>
								<?php } ?>
								<?php
								if ($rows['entre_notis'] == "1") { ?>
                                <li>
                                    <a href="index.php?apartado=entretenimiento&seccion=noticias"><i class="fa fa-chevron-right"></i>Noticias</a>
                                </li>
								<?php } ?>
								<?php
								if ($rows['entre_badges'] == "1") { ?>
                                <li>
                                    <a href="index.php?apartado=entretenimiento&seccion=placas"><i class="fa fa-chevron-right"></i>Placas</a>
                                </li>
								<?php } ?>
								<?php
								if ($rows['entre_money'] == "1") { ?>
								<li>
                                    <a href="index.php?apartado=entretenimiento&seccion=monedas"><i class="fa fa-chevron-right"></i>Monedas</a>
                                </li>
								<?php } ?>
								<?php
								if ($rows['entre_events'] == "1") { ?>
								<li>
                                    <a href="index.php?apartado=entretenimiento&seccion=eventos"><i class="fa fa-chevron-right"></i>Eventos</a>
                                </li>
								<?php } ?>
                            </ul>
                        </li>
						<hr></hr>
						<?php } ?>
						<?php
						if ($rows['seg_mov'] == "1") { ?>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-calendar-alt"></i>Seguridad</a>
							<ul class="list-unstyled navbar__sub-list js-sub-list">
								<?php
								if ($rows['seg_mov'] == "1") { ?>
                                <li>
                                    <a href="index.php?apartado=seguridad&seccion=movimientos"><i class="fa fa-chevron-right"></i>Movimientos</a>
                                </li>
								<?php } ?>
								<?php
								if ($rows['seg_commandstaff'] == "1") { ?>
								<li>
                                    <a href="index.php?apartado=seguridad&seccion=comandos-staff"><i class="fa fa-chevron-right"></i>Comandos de Staffs</a>
                                </li>
								<?php } ?>
								<?php
								if ($rows['seg_commanduser'] == "1") { ?>
								<li>
                                    <a href="index.php?apartado=seguridad&seccion=comandos"><i class="fa fa-chevron-right"></i>Comandos de Usuarios</a>
                                </li>
								<?php } ?>
								<?php
								if ($rows['seg_bans'] == "1") { ?>
								<li>
                                    <a href="index.php?apartado=seguridad&seccion=baneos"><i class="fa fa-chevron-right"></i>Baneos</a>
                                </li>
								<?php } ?>
								<?php
								if ($rows['seg_filters'] == "1") { ?>
								<li>
                                    <a href="index.php?apartado=seguridad&seccion=filtros"><i class="fa fa-chevron-right"></i>Filtros</a>
                                </li>
								<?php } ?>
								<?php
								if ($rows['seg_chatlogs'] == "1") { ?>
								<li>
                                    <a href="index.php?apartado=seguridad&seccion=chatlogs"><i class="fa fa-chevron-right"></i>Chatlogs</a>
                                </li>
								<?php } ?>
                            </ul>
                        </li>
						<?php } ?>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <div class="form-header" >
                            </div>
                            <div class="header-button">
                                <div class="noti-wrap">
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="https://www.habbo.es/habbo-imaging/avatarimage?figure=<?php echo $look?>&direction=3&head_direction=3&gesture=sml&action=&size=l"/>
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo $user;?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="https://www.habbo.es/habbo-imaging/avatarimage?figure=<?php echo $look?>&direction=3&head_direction=3&gesture=sml&action=&size=l&headonly=1" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo $user;?></a>
                                                    </h5>
                                                    <span class="email"><?php echo $rowr['name'];?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="../../">
                                                    <i class="zmdi zmdi-power"></i>Salir del Panel</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
						<?php } ?>
            <!-- HEADER DESKTOP-->