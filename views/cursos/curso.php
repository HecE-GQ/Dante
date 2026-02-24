<?php

declare(strict_types=1);
require_once __DIR__ . '/../../controllers/CursoController.php';

//Obtener los datos de los cursos, el curso completo 
//Id 
$id = $_GET['id'];

$controller = new CursoController;
$curso = $controller->getById($id);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <title>Cursos — DGTIC UNAM</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/variables.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/main.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/navbar.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/footer.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/cursos.css" />
</head>

<body class="is-preload">
    <div id="page-wrapper">

        <?php include __DIR__ . '/../templates/header.php'; ?>
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
       <h1>Hola</h1>

            <?php include __DIR__ . '/../templates/footer.php'; ?>

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

    </div>
    <script src="<?= BASE_URL ?>assets/js/jquery.min.js"></script>
    <Script src="<?= BASE_URL ?>assets/js/app.js"></script>
</body>

</html>