<header id="site-header">
	<!-- Franja azul claro arriba -->
	<div class="header-franja-top"></div>

	<!-- Logo + texto sobre fondo blanco -->
	<div class="header-main">
		<div class="header-inner container">
			<div class="header-logo">
				<a href="<?= BASE_URL ?>">
					<img src="<?= BASE_URL ?>assets/images/logo_DGTIC_color.png" alt="DGTIC UNAM Logo" />
				</a>
			</div>
			<div class="header-text">
				<p>Dirección de Docencia en</p>
				<p class="header-text-bold">Tecnologías de Información y Comunicación</p>
			</div>
		</div>
	</div>

	<!--	Navbar azul medio -->
	<nav id="nav">
		<div class="container">
			<button class="nav-toggle" aria-label="Abrir menú">
				<span></span>
				<span></span>
				<span></span>
			</button>

			<ul>
				<li><a href="<?= BASE_URL ?>">Inicio</a></li>
				<li><a href="<?= BASE_URL ?>index.php?page=cursos">Cursos</a></li>
				<li><a href="https://calsdpc.sep.gob.mx/">Convocatoria SIDEPAAE</a></li>
				<li><a href="<?= BASE_URL ?>index.php?page=nosotros">Nosotros</a></li>
				<li><a href="<?= BASE_URL ?>index.php?page=preguntas">Preguntas frecuentes</a></li>
			</ul>

		</div>
	</nav>

</header>