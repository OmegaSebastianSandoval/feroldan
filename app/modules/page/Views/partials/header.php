<div class="header-redes">
	<div class="container header-container">
		<div class="row">
			<div class="col-8 header-contacto">
				<div align="left">
					<?php if ($this->infopage->info_pagina_instagram) { ?>
						<a href="<?php echo $this->infopage->info_pagina_instagram ?>" target="_blank" class="red">
							<i class="fab fa-instagram"></i>
						</a>
					<?php } ?>
					<?php if ($this->infopage->info_pagina_youtube) { ?>
						<a href="<?php echo $this->infopage->info_pagina_youtube ?>" target="_blank" class="red">
							<i class="fab fa-youtube"></i>
						</a>
					<?php } ?>
					<?php if ($this->infopage->info_pagina_facebook) { ?>
						<a href="<?php echo $this->infopage->info_pagina_facebook ?>" target="_blank" class="red">
							<i class="fab fa-facebook-f"></i>
						</a>
					<?php } ?>
					<?php if ($this->infopage->info_pagina_twitter) { ?>
						<a href="<?php echo $this->infopage->info_pagina_twitter ?>" target="_blank" class="red">
							<i class="fab fa-twitter"></i>
						</a>
					<?php } ?>

					<?php if ($this->infopage->info_pagina_pinterest) { ?>
						<a href="<?php echo $this->infopage->info_pagina_pinterest ?>" target="_blank" class="red">
							<i class="fab fa-pinterest-p"></i>
						</a>
					<?php } ?>

					<?php if ($this->infopage->info_pagina_linkdn) { ?>
						<a href="<?php echo $this->infopage->info_pagina_linkdn ?>" target="_blank" class="red">
							<i class="fab fa-linkedin-in"></i>
						</a>
					<?php } ?>
					<?php if ($this->infopage->info_pagina_google) { ?>
						<a href="<?php echo $this->infopage->info_pagina_google ?>" target="_blank" class="red">
							<i class="fab fa-google-plus-g"></i>
						</a>
					<?php } ?>
					<?php if ($this->infopage->info_pagina_flickr) { ?>
						<a href="<?php echo $this->infopage->info_pagina_flickr ?>" target="_blank" class="red">
							<i class="fab fa-flickr"></i>
						</a>
					<?php } ?>
				</div>
				<!-- 	</div>
			<div class="col-sm-5 text-left"> -->
				<?php if ($this->infopage->info_pagina_whatsapp) { ?>
					<?php $whatsapp = intval(preg_replace('/[^0-9]+/', '', $this->infopage->info_pagina_whatsapp), 10);  ?>
					<a href="https://api.whatsapp.com/send?phone=<?php echo $whatsapp; ?>" target="_blank" class="red mr-1 ml-1">
						<i class="fab fa-whatsapp"></i>
					</a>
					<span><?php echo $this->infopage->info_pagina_whatsapp ?></span>

				<?php } ?>
				<a href="mailto:feroldan@roldanlogistica.com" class="red ml-1"><i class="far fa-envelope"></i>
					<?php echo $this->infopage->info_pagina_correos_contacto; ?>
				</a>
			</div>

			<div class="col-4 text-right">


				<a href="https://zonapferoldan.cyfsoluciones.co/zonapnvo/#/" target="blank" class="iniciar-sesion"><i class="fas fa-user mr-1"></i> Oficina Virtual</a>

			</div>
		</div>
	</div>
</div>
<div class="header-content">
	<div class="container botonera">
		<div class="row no-gutters">
			<div class="col-sm-2">
				<div class="logo" align="left"><a href="/page/index"><img src="/skins/page/images/roldan4.png"></a></div>
			</div>
			<div class="col-sm-10">
				<nav>
					<ul>
						<li><a href="#"><span>Quiénes Somos <!-- <i class="fas fa-angle-down"></i> --></span></a>
							<ul>
								<?php foreach ($this->botonesnosotros as $key => $nosotros) { ?>
									<li><a href="/page/nosotros#<?php echo $nosotros->contenido_id ?>"><?php echo $nosotros->contenido_titulo ?></a></li>
								<?php } ?>
								<li><a href="/page/tratamientodedatos">Política de Tratamiento de Datos</a></li>
								<li><a href="#">Preguntas Frecuentes</a></li>
							</ul>
						</li>
						<!-- <div class="linea">|</div> -->
						<li><a href="#"><span>Servicios <!-- <i class="fas fa-angle-down"></i> --></span></a>
							<ul>
								<li><a href="https://feroldan.com/files/RESUMEN_PRESENTACION_FEROLDAN.pdf" target="_blank">Portafolio</a></li>
								<li><a href="/page/creditos">Créditos</a></li>
								<li><a href="/page/ahorro">Ahorros</a></li>
								<li><a href="/page/bienestarsocial">Fondos de Bienestar Social</a></li>
								<?php foreach ($this->botonesservicios as $key => $servicios) { ?>
									<li><a href="/page/servicios#<?php echo $servicios->contenido_id ?>"><?php echo $servicios->contenido_titulo ?></a></li>
								<?php } ?>
							</ul>
						</li>
						<!-- <div class="linea">|</div> -->
						<li><a href="#"><span>Reglamentos, Formatos y Circulares <!-- <i class="fas fa-angle-down"></i> --></span></a>
							<ul>
								<li><a href="/page/reglamentos">Reglamentos</a></li>
								<li><a href="/page/formatos">Formatos</a></li>
								<li><a href="/page/circulares">Circulares Asamblea</a></li>
								<li><a href="/page/circularesinformativas">Circulares Informativas</a></li>
							</ul>
						</li>
						<!-- <div class="linea">|</div> -->

						<li><a href="/page/convenios"><span>Convenios</span></a></li>
						<!-- <div class="linea">|</div> -->
						<!-- <li><a href="/page/galeria/login"><span>Galería</span></a></li> -->
						<!-- <div class="linea">|</div> -->
						<li><a href="/page/contactenos"><span>Contáctenos</span></a></li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
	<div class="botonera-responsive">
		<div class="row">
			<div class="col-sm-4">
				<div class="logo" align="center"><a href="/page/index"><img src="/skins/page/images/logo-feroldan.png"></a></div>
			</div>
			<div class="col-sm-8">

				<nav>
					<div style="background-color: #AA181B;padding: 0px 20px 0px 20px;display: flex;gap: 6px;justify-content: space-between;color: #FFF;">
						<?php if ($_SESSION['kt_login_id'] > 0) { ?>
							<span style="font-size:15px;"><i class="fas fa-user-tie" aria-hidden="true"></i> Hola <?php echo $_SESSION['kt_login_name']; ?></span>
							<a href="/page/login/logout" class="enlace-salir">Salir <i class="fas fa-sign-out-alt"></i></a></i>
						<?php }  ?>

					</div>
					<div class="div-menu-responsive">
						<div style="display: flex;justify-content: space-between; align-items:center;"> <span> Menú</span><a class="menu-responsive"><i class="fas fa-times-circle"></i></a></div>
					</div>
					<ul>
						<li class="desplegable"><a href="#"><span>Quiénes Somos <i class="fas fa-angle-down"></i></span></a>
							<ul>
								<?php foreach ($this->botonesnosotros as $key => $nosotros) { ?>
									<li><a href="/page/nosotros#<?php echo $nosotros->contenido_id ?>"><?php echo $nosotros->contenido_titulo ?></a></li>
								<?php } ?>
								<li><a href="/page/tratamientodedatos">Política de Tratamiento de Datos</a></li>
							</ul>
						</li>
						<li class="desplegable"><a href="#"><span>Servicios <i class="fas fa-angle-down"></i></span></a>
							<ul>
								<li><a href="/page/creditos">Créditos</a></li>
								<li><a href="/page/ahorro">Ahorros</a></li>
								<li><a href="/page/bienestarsocial">Fondos de Bienestar Social</a></li>
								<?php foreach ($this->botonesservicios as $key => $servicios) { ?>
									<li><a href="/page/servicios#<?php echo $servicios->contenido_id ?>"><?php echo $servicios->contenido_titulo ?></a></li>
								<?php } ?>
							</ul>
						</li>
						<li class="desplegable"><a href="#"><span>Reglamentos y Formatos <i class="fas fa-angle-down"></i></span></a>
							<ul>
								<li><a href="/page/reglamentos">Reglamentos</a></li>
								<li><a href="/page/formatos">Formatos</a></li>
								<li><a href="/page/circulares">Circulares Asamblea</a></li>
								<li><a href="/page/circularesinformativas">Circulares Informativas</a></li>
							</ul>
						</li>
						<li><a href="/page/convenios"><span>Convenios</span></a></li>
						<!-- <li><a href="/page/galeria"><span>Galería</span></a></li> -->
						<li><a href="/page/contactenos"><span>Contáctenos</span></a></li>
					</ul>
					<div class="redes">
						<div>
							<?php if ($this->infopage->info_pagina_facebook) { ?>
								<a href="<?php echo $this->infopage->info_pagina_facebook ?>" target="_blank" class="red">
									<i class="fab fa-facebook-f"></i>
								</a>
							<?php } ?>
							<?php if ($this->infopage->info_pagina_twitter) { ?>
								<a href="<?php echo $this->infopage->info_pagina_twitter ?>" target="_blank" class="red">
									<i class="fab fa-twitter"></i>
								</a>
							<?php } ?>
							<?php if ($this->infopage->info_pagina_instagram) { ?>
								<a href="<?php echo $this->infopage->info_pagina_instagram ?>" target="_blank" class="red">
									<i class="fab fa-instagram"></i>
								</a>
							<?php } ?>
							<?php if ($this->infopage->info_pagina_youtube) { ?>
								<a href="<?php echo $this->infopage->info_pagina_youtube ?>" target="_blank" class="red">
									<i class="fab fa-youtube"></i>
								</a>
							<?php } ?>
							<?php if ($this->infopage->info_pagina_pinterest) { ?>
								<a href="<?php echo $this->infopage->info_pagina_pinterest ?>" target="_blank" class="red">
									<i class="fab fa-pinterest-p"></i>
								</a>
							<?php } ?>
							<?php if ($this->infopage->info_pagina_linkedin) { ?>
								<a href="<?php echo $this->infopage->info_pagina_linkedin ?>" target="_blank" class="red">
									<i class="fab fa-linkedin-in"></i>
								</a>
							<?php } ?>
							<?php if ($this->infopage->info_pagina_google) { ?>
								<a href="<?php echo $this->infopage->info_pagina_google ?>" target="_blank" class="red">
									<i class="fab fa-google-plus-g"></i>
								</a>
							<?php } ?>
							<?php if ($this->infopage->info_pagina_flickr) { ?>
								<a href="<?php echo $this->infopage->info_pagina_flickr ?>" target="_blank" class="red">
									<i class="fab fa-flickr"></i>
								</a>
							<?php } ?>
						</div>
						<div>
							<?php if ($this->infopage->info_pagina_whatsapp) { ?>
								<?php $whatsapp = intval(preg_replace('/[^0-9]+/', '', $this->infopage->info_pagina_whatsapp), 10);  ?>
								<a href="https://api.whatsapp.com/send?phone=<?php echo $whatsapp; ?>" target="_blank" class="red">
									<i class="fab fa-whatsapp"></i>
									<span><?php echo $this->infopage->info_pagina_whatsapp ?></span>
								</a>
							<?php } ?>
						</div>
						<div>
							<a href="mailto:feroldan@roldanlogistica.com" target="_blank" class="red">
								<i class="far fa-envelope"></i>
								<span><?php echo $this->infopage->info_pagina_correos_contacto; ?></span>
							</a>
						</div>
					</div>
				</nav>
				<div>
					<?php if ($_SESSION['kt_login_id'] == "") { ?>
						<a href="https://zonapferoldan.cyfsoluciones.co/" target="blank"><i class="fas fa-user"></i></a>
					<?php } ?>
					<a class="menu-responsive"><i class="fas fa-bars mr-3"></i></a>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="botones">

	<?php foreach ($this->botones as $key => $boton) { ?>

		<a href="<?php echo $boton->publicidad_enlace ?>" target="<?php echo $boton->publicidad_tipo_enlace == 1 ? '_blank' : '' ?>" style="text-decoration:none;">
			<div><img src="/images/<?php echo $boton->publicidad_imagen ?>" alt=""></div>
		</a>
	<?php } ?>
</div>


























<!-- <div class="header-redes">
	<div class="container" style="max-width: 1251px;">
		<div class="row">
			<div class="col-sm-5 text-left">
				<?php if ($this->infopage->info_pagina_whatsapp) { ?>
					<?php $whatsapp = intval(preg_replace('/[^0-9]+/', '', $this->infopage->info_pagina_whatsapp), 10);  ?>
					<a href="https://api.whatsapp.com/send?phone=<?php echo $whatsapp; ?>" target="_blank" class="red" >
						<i class="fab fa-whatsapp"></i>
						<span><?php echo $this->infopage->info_pagina_whatsapp ?></span>
					</a>
				<?php } ?>
			</div>
			<div class="col-sm-2">
				<div align="center"> 
					<?php if ($this->infopage->info_pagina_facebook) { ?>
						<a href="<?php echo $this->infopage->info_pagina_facebook ?>" target="_blank" class="red">
							<i class="fab fa-facebook-f"></i>
						</a>
					<?php } ?>
					<?php if ($this->infopage->info_pagina_twitter) { ?>
						<a href="<?php echo $this->infopage->info_pagina_twitter ?>" target="_blank" class="red">
							<i class="fab fa-twitter"></i>
						</a>
					<?php } ?>
					<?php if ($this->infopage->info_pagina_instagram) { ?>
						<a href="<?php echo $this->infopage->info_pagina_instagram ?>" target="_blank" class="red">
							<i class="fab fa-instagram"></i>
						</a>
					<?php } ?>
					<?php if ($this->infopage->info_pagina_pinterest) { ?>
						<a href="<?php echo $this->infopage->info_pagina_pinterest ?>" target="_blank" class="red">
							<i class="fab fa-pinterest-p"></i>
						</a>
					<?php } ?>
					<?php if ($this->infopage->info_pagina_youtube) { ?>
						<a href="<?php echo $this->infopage->info_pagina_youtube ?>" target="_blank" class="red">
							<i class="fab fa-youtube"></i>
						</a>
					<?php } ?>
					<?php if ($this->infopage->info_pagina_linkdn) { ?>
						<a href="<?php echo $this->infopage->info_pagina_linkdn ?>" target="_blank" class="red">
							<i class="fab fa-linkedin-in"></i>
						</a>
					<?php } ?>
					<?php if ($this->infopage->info_pagina_google) { ?>
						<a href="<?php echo $this->infopage->info_pagina_google ?>" target="_blank" class="red">
							<i class="fab fa-google-plus-g"></i>
						</a>
					<?php } ?>
					<?php if ($this->infopage->info_pagina_flickr) { ?>
						<a href="<?php echo $this->infopage->info_pagina_flickr ?>" target="_blank" class="red">
							<i class="fab fa-flickr"></i>
						</a>
					<?php } ?>
				</div>
			</div>
			<div class="col-sm-5 text-right">
				<a href="mailto:feroldan@roldanlogistica.com"class="red"><i class="far fa-envelope"></i>
					<?php echo $this->infopage->info_pagina_correos_contacto; ?>
				</a>
				<div>
					<a href="https://zonapferoldan.cyfsoluciones.co/zonapnvo/#/" target="blank"class="iniciar-sesion"><i class="fas fa-user"></i> Oficina Virtual</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="header-content">
	<div class="container" style="max-width: 1251px;">
		<div class="botonera">
			<div class="row no-gutters">
				<div class="col-sm-5">
					<nav>
						<ul>
							<li><a href="#"><span>Quiénes Somos <i class="fas fa-angle-down"></i></span></a>
								<ul>
									<?php foreach ($this->botonesnosotros as $key => $nosotros) { ?>
										<li><a href="/page/nosotros#<?php echo $nosotros->contenido_id ?>"><?php echo $nosotros->contenido_titulo ?></a></li>
									<?php } ?>
									<li><a href="/page/tratamientodedatos">Política de Tratamiento de Datos</a></li>
									<li><a href="#">Preguntas Frecuentes</a></li>
								</ul>
							</li>
							<div class="linea">|</div>
							<li><a href="#"><span>Servicios <i class="fas fa-angle-down"></i></span></a>
								<ul>
								    <li><a href="https://feroldan.com/files/RESUMEN_PRESENTACION_FEROLDAN.pdf" target="_blank">Portafolio</a></li>
									<li><a href="/page/creditos">Créditos</a></li>
									<li><a href="/page/ahorro">Ahorros</a></li>
									<li><a href="/page/bienestarsocial">Fondos de Bienestar Social</a></li>
									<?php foreach ($this->botonesservicios as $key => $servicios) { ?>
										<li><a href="/page/servicios#<?php echo $servicios->contenido_id ?>"><?php echo $servicios->contenido_titulo ?></a></li>
									<?php } ?>
								</ul>
							</li>
							<div class="linea">|</div>
							<li><a href="#"><span>Reglamentos, Formatos y Circulares <i class="fas fa-angle-down"></i></span></a>
								<ul>
									<li><a href="/page/reglamentos">Reglamentos</a></li>
									<li><a href="/page/formatos">Formatos</a></li>
									<li><a href="/page/circulares">Circulares Asamblea</a></li>
									<li><a href="/page/circularesinformativas">Circulares Informativas</a></li>
								</ul>
							</li>
						</ul>
					</nav>
				</div>
				<div class="col-sm-2">
					<div class="logo" align="center"><a href="/page/index"><img src="/skins/page/images/roldan4.png" ></a></div>
				</div>
				<div class="col-sm-5">
					<nav>
						<ul>
							<li><a href="/page/convenios"><span>Convenios</span></a></li>
							<div class="linea">|</div>
							<li><a href="/page/galeria/login"><span>Galería</span></a></li>
							<div class="linea">|</div>
							<li><a href="/page/contactenos"><span>Contáctenos</span></a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
		<div class="botonera-responsive">
			<div class="row">
				<div class="col-sm-4">
					<div class="logo" align="center"><a href="/page/index"><img src="/skins/page/images/logo-feroldan.png" ></a></div>
				</div>
				<div class="col-sm-8">
					<div>
						<?php if ($_SESSION['kt_login_id'] == "") { ?>
							<a href="https://zonapferoldan.cyfsoluciones.co/" target="blank"><i class="fas fa-user"></i></a>
						<?php } ?>
						<a  class="menu-responsive"><i class="fas fa-bars"></i></a>
					</div>
					<nav>
						<div>
							<?php if ($_SESSION['kt_login_id'] > 0) { ?> 
								<span style="font-size:15px;"><i class="fas fa-user-tie" aria-hidden="true"></i> Hola <?php echo $_SESSION['kt_login_name']; ?></span>
								<a href="/page/login/logout" class="enlace-salir">Salir <i class="fas fa-sign-out-alt"></i></a></i>
							<?php } ?>
						</div>
						<div><a class="menu-responsive"><i class="fas fa-times-circle"></i></a></div>
						<ul>
							<li class="desplegable"><a href="#"><span>Quiénes Somos <i class="fas fa-angle-down"></i></span></a>
								<ul>
									<?php foreach ($this->botonesnosotros as $key => $nosotros) { ?>
										<li><a href="/page/nosotros#<?php echo $nosotros->contenido_id ?>"><?php echo $nosotros->contenido_titulo ?></a></li>
									<?php } ?>
									<li><a href="/page/tratamientodedatos">Política de Tratamiento de Datos</a></li>
								</ul>
							</li>
							<li class="desplegable"><a href="#"><span>Servicios <i class="fas fa-angle-down"></i></span></a>
								<ul>
									<li><a href="/page/creditos">Créditos</a></li>
									<li><a href="/page/ahorro">Ahorros</a></li>
									<li><a href="/page/bienestarsocial">Fondos de Bienestar Social</a></li>
									<?php foreach ($this->botonesservicios as $key => $servicios) { ?>
										<li><a href="/page/servicios#<?php echo $servicios->contenido_id ?>"><?php echo $servicios->contenido_titulo ?></a></li>
									<?php } ?>
								</ul>
							</li>
							<li class="desplegable"><a href="#"><span>Reglamentos y Formatos <i class="fas fa-angle-down"></i></span></a>
								<ul>
									<li><a href="/page/reglamentos">Reglamentos</a></li>
									<li><a href="/page/formatos">Formatos</a></li>
									<li><a href="/page/circulares">Circulares Asamblea</a></li>
									<li><a href="/page/circularesinformativas">Circulares Informativas</a></li>
								</ul>
							</li>
							<li><a href="/page/convenios"><span>Convenios</span></a></li>
							<li><a href="/page/galeria"><span>Galería</span></a></li>
							<li><a href="/page/contactenos"><span>Contáctenos</span></a></li>
						</ul>
						<div class="redes">
							<div>
								<?php if ($this->infopage->info_pagina_facebook) { ?>
									<a href="<?php echo $this->infopage->info_pagina_facebook ?>" target="_blank" class="red">
										<i class="fab fa-facebook-f"></i>
									</a>
								<?php } ?>
								<?php if ($this->infopage->info_pagina_twitter) { ?>
									<a href="<?php echo $this->infopage->info_pagina_twitter ?>" target="_blank" class="red">
										<i class="fab fa-twitter"></i>
									</a>
								<?php } ?>
								<?php if ($this->infopage->info_pagina_instagram) { ?>
									<a href="<?php echo $this->infopage->info_pagina_instagram ?>" target="_blank" class="red">
										<i class="fab fa-instagram"></i>
									</a>
								<?php } ?>
								<?php if ($this->infopage->info_pagina_youtube) { ?>
									<a href="<?php echo $this->infopage->info_pagina_youtube ?>" target="_blank" class="red">
										<i class="fab fa-youtube"></i>
									</a>
								<?php } ?>
								<?php if ($this->infopage->info_pagina_pinterest) { ?>
									<a href="<?php echo $this->infopage->info_pagina_pinterest ?>" target="_blank" class="red">
										<i class="fab fa-pinterest-p"></i>
									</a>
								<?php } ?>
								<?php if ($this->infopage->info_pagina_linkedin) { ?>
									<a href="<?php echo $this->infopage->info_pagina_linkedin ?>" target="_blank" class="red">
										<i class="fab fa-linkedin-in"></i>
									</a>
								<?php } ?>
								<?php if ($this->infopage->info_pagina_google) { ?>
									<a href="<?php echo $this->infopage->info_pagina_google ?>" target="_blank" class="red">
										<i class="fab fa-google-plus-g"></i>
									</a>
								<?php } ?>
								<?php if ($this->infopage->info_pagina_flickr) { ?>
									<a href="<?php echo $this->infopage->info_pagina_flickr ?>" target="_blank" class="red">
										<i class="fab fa-flickr"></i>
									</a>
								<?php } ?>
							</div>
							<div>
								<?php if ($this->infopage->info_pagina_whatsapp) { ?>
									<?php $whatsapp = intval(preg_replace('/[^0-9]+/', '', $this->infopage->info_pagina_whatsapp), 10);  ?>
									<a href="https://api.whatsapp.com/send?phone=<?php echo $whatsapp; ?>" target="_blank" class="red" >
										<i class="fab fa-whatsapp"></i>
										<span><?php echo $this->infopage->info_pagina_whatsapp ?></span>
									</a>
								<?php } ?>
							</div>
							<div>
								<a href="mailto:feroldan@roldanlogistica.com" target="_blank" class="red">
									<i class="far fa-envelope"></i>
									<span><?php echo $this->infopage->info_pagina_correos_contacto; ?></span>
								</a>
							</div>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="botones">
	<?php foreach ($this->botones as $key => $boton) { ?>
		<a href="<?php echo $boton->publicidad_enlace ?>" style="text-decoration:none;">
			<div><img src="/images/<?php echo $boton->publicidad_imagen ?>" alt=""></div>
		</a>
	<?php } ?> 
</div> -->