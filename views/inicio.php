<!DOCTYPE HTML>
<!--
	Arcana by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html lang="es">

<head>
	<title>Dante DGTIC</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="<?= BASE_URL ?>assets/css/main.css" />
	<link rel="stylesheet" href="<?= BASE_URL ?>assets/css/navbar.css">
	<link rel="stylesheet" href="<?= BASE_URL ?>assets/css/variables.css">
	<link rel="stylesheet" href="<?= BASE_URL ?>assets/css/footer.css">
	<link rel="stylesheet" href="<?= BASE_URL ?>assets/css/inicio.css">
</head>

<body class="is-preload">
	<div id="page-wrapper">

		<?php include __DIR__ . '/templates/header.php' ?>

		<!-- Header 
		<header id="site-header">
					 Franja azul claro arriba 
			<div class="header-franja-top"></div>

				Logo + texto sobre fondo blanco 
			<div class="header-main">
				<div class="header-inner container">
					<div class="header-logo">
						<a href="BASE_URL?>">
							<img src="BASE_URL?>assets/images/logo_DGTIC_color.png" alt="DGTIC UNAM Logo" />
						</a>
					</div>
					<div class="header-text">
						<p>Dirección de Docencia en</p>
						<p class="header-text-bold">Tecnologías de Información y Comunicación</p>
					</div>
				</div>
			</div>

					Navbar azul medio 
			<nav id="nav">
				<div class="container">
					<ul>
						<li class="current"><a href="BASE_URL?>">Inicio</a></li>
						<li><a href="BASE_URL index.php?page=cursos">Cursos</a></li>
						<li><a href="https://calsdpc.sep.gob.mx/">Convocatoria SIDEPAAE</a></li>
						<li><a href="BASE_URL?>index.php?page=nosotros">Nosotros</a></li>
						<li><a href="BASE_URL?>index.php?page=preguntas">Preguntas frecuentes</a></li>
					</ul>
				</div>
			</nav>
		</header> -->

		<!-- Banner -->
		<section id="banner">
			<div class="banner-content">
				<h1 class="banner-titulo">Capacitación TIC para trabajadores del SPDC</h1>
				<p class="banner-subtitulo">
					En colaboración con el Sindicato de Trabajadores de la SEP,
					la DGTIC UNAM pone a tu disposición cursos en línea
					para tu desarrollo profesional.
				</p>
				<a href="<?= BASE_URL ?>index.php?page=cursos" class="banner-btn">
					Ver cursos disponibles
				</a>
			</div>
		</section>




		<section class="wrapper style1">
			<div class="container">
				<div class="row gtr-200">

					<!-- Card 1 — Cursos SPDC -->
					<section class="col-4 col-12-narrower">
						<div class="box highlight">
							<i class="icon solid major fa-laptop"></i>
							<h3>Cursos para trabajadores SPDC</h3>
							<p>
								Contamos con variedad de cursos disponibles para tu desarrollo profesional
								en Tecnologías de la Información.
							</p>
							<a href="<?= BASE_URL ?>index.php?page=cursos" class="button">Ver cursos</a>
						</div>
					</section>

					<!-- Card 2 — Convocatoria SPDC -->
					<section class="col-4 col-12-narrower">
						<div class="box highlight">
							<i class="icon solid major fa-file-alt"></i>
							<h3>Convocatoria SPDC</h3>
							<p>
								Consulta si estás en etapa de capacitación y revisa
								la convocatoria vigente en el SIDEPAAE.
							</p>
							<a href="https://calsdpc.sep.gob.mx/" target="_blank" rel="noopener" class="button">
								Ir al SIDEPAAE
							</a>
						</div>
					</section>

					<!-- Card 3 — Oferta general -->
					<section class="col-4 col-12-narrower">
						<div class="box highlight">
							<i class="icon solid major fa-graduation-cap"></i>
							<h3>Oferta académica general</h3>
							<p>
								Más de 120 cursos, talleres y 12 diplomados de alto nivel
								para el público en general.
							</p>
							<a href="https://docencia.tic.unam.mx/wordpress/" target="_blank" rel="noopener" class="button">
								Visitar DGTIC
							</a>
						</div>
					</section>

				</div>
			</div>
		</section>

		<!-- QUIÉNES SOMOS — texto institucional breve-->
		<section class="wrapper style2">
			<div class="container">
				<header class="major">
					<h2>¿Quiénes somos?</h2>
					<p>Parte de la DGTIC de la Universidad Nacional Autónoma de México</p>
				</header>
				<div class="inicio-institucional">
					<p>
						La Dirección de Docencia forma parte de la Dirección General de Cómputo y de
						Tecnologías de Información y Comunicación (DGTIC) de la UNAM. Nos dedicamos a
						satisfacer las necesidades de capacitación en TIC de una amplia gama de
						participantes: niños, adultos mayores, estudiantes, profesionistas y trabajadores.
					</p>
					<p>
						Establecemos colaboraciones estratégicas con organizaciones líderes como
						Huawei® y Google®, y formamos parte de la Red de Educación Continua
						y a Distancia de la UNAM (REDEC).
					</p>
					<a href="<?= BASE_URL ?>index.php?page=nosotros" class="button">Conócenos</a>
				</div>
			</div>
		</section>

		<!--CONVOCATORIA SPDC — bloque destacado -->
		<section class="inicio-spdc">
			<div class="container">
				<div class="spdc-inner">
					<div class="spdc-texto">
						<h2>¿Eres trabajador del SPDC?</h2>
						<p>
							Consulta la convocatoria vigente y verifica si estás
							en etapa de capacitación. Accede al sistema SIDEPAAE
							para más información.
						</p>
					</div>
					<a href="https://calsdpc.sep.gob.mx/" target="_blank" rel="noopener" class="button">
						Ir a la convocatoria
					</a>
				</div>
			</div>
		</section>


		<?php include __DIR__ . '/templates/footer.php' ?>

		<!-- <footer id="footer">
  <div class="footer-main">
    <div class="container footer-inner">

      Columna 1: Logo + links legales 
      <div class="footer-col">
        <div class="footer-logo">
          <img src="assets/images/logo_DGTIC_color.png" alt="DGTIC UNAM" />
        </div>
        <ul class="footer-links">
          <li><a href="#">Avisos de privacidad de la DGTIC</a></li>
          <li><a href="#">Política General de Seguridad de la Información de la DGTIC</a></li>
          <li><a href="#">Código de ética de la UNAM</a></li>
          <li><a href="#">Normatividad Interna</a></li>
        </ul>
      </div>

         Columna 2: Ubicación 
      <div class="footer-col">
        <p class="footer-label">Ubicación</p>
        <p class="footer-address">
          Circuito exterior s/n, frente a la
          Facultad de Contaduría y Administración,
          Ciudad Universitaria, C.P. 04510,
          Ciudad de México
        </p>
      </div>

      	Columna 3: Redes sociales 
      <div class="footer-col footer-social-col">
        <ul class="footer-social">
          <li><a href="#" aria-label="Facebook"><i class="icon brands fa-facebook-f"></i></a></li>
          <li><a href="#" aria-label="X (Twitter)"><i class="icon brands fa-x-twitter"></i></a></li>
          <li><a href="#" aria-label="YouTube"><i class="icon brands fa-youtube"></i></a></li>
          <li><a href="#" aria-label="Instagram"><i class="icon brands fa-instagram"></i></a></li>
          <li><a href="#" aria-label="LinkedIn"><i class="icon brands fa-linkedin-in"></i></a></li>
        </ul>
      </div>

    </div>
  </div>

  	Copyright 
  <div class="footer-bottom">
    <p>Hecho en México. Universidad Nacional Autónoma de México (UNAM). Todos los derechos reservados 2025. Esta página puede ser reproducida con fines no lucrativos, siempre y cuando se cite la fuente completa y su dirección electrónica, y no se mutile; de otra forma requiere permiso previo por escrito de la institución.</p>
  </div>
</footer> -->


		<!-- Scripts -->
		
		<script src="assets/js/app.js"></script>
</body>

</html>