<!DOCTYPE html>
<html lang="es">

<head>
    <title>Quiénes Somos — DGTIC UNAM</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/variables.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/main.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/navbar.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/footer.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/nosotros.css" />
</head>

<body class="is-preload">
    <div id="page-wrapper">

        <?php include __DIR__ . '/../templates/header.php'; ?>

        <main class="nosotros-main">

            <!-- SECCIÓN PRINCIPAL -->
            <section class="nosotros-hero">
                <div class="nosotros-hero-inner">

                    <!-- Imagen institucional -->
                    <div class="nosotros-imagen">
                        <img src="" alt="Instalaciones DGTIC UNAM" />
                    </div>

                    <!-- Texto principal -->
                    <div class="nosotros-texto">
                        <h1 class="nosotros-titulo">¿Quiénes somos?</h1>
                        <p class="nosotros-descripcion">
                            La Dirección de Docencia forma parte de la Dirección General de Cómputo y de
                            Tecnologías de Información y Comunicación (DGTIC) de la Universidad Nacional
                            Autónoma de México (UNAM). Nos dedicamos a satisfacer las necesidades de
                            capacitación en Tecnologías de la Información y Comunicación (TIC) de una amplia
                            gama de participantes, incluyendo niños, adultos mayores, estudiantes,
                            profesionistas y trabajadores, sumando miles de personas capacitadas.
                        </p>
                        <p class="nosotros-descripcion">
                            Nuestra oferta académica se compone de una rica variedad de opciones, con más de
                            120 cursos y talleres, complementados por una sólida propuesta de 12 diplomados
                            de alto nivel académico. Para enriquecer nuestra labor, establecemos colaboraciones
                            estratégicas con organizaciones líderes en el sector tecnológico como Huawei® y Google®.
                        </p>
                    </div>

                </div>

                <!-- Subcontent — Misión y destacados -->
                <div class="nosotros-subcontent">

                    <div class="nosotros-mision">
                        <h2 class="nosotros-subtitle">Nuestra Misión</h2>
                        <p>
                            Brindar servicios de capacitación y actualización en TIC de calidad y vanguardia
                            a la comunidad universitaria, empresas y organizaciones y al público en general.
                        </p>
                    </div>

                    <div class="nosotros-destacados">
                        <h2 class="nosotros-subtitle">¿En qué nos destacamos?</h2>
                        <ul class="nosotros-lista">
                            <li class="nosotros-item">
                                <span class="nosotros-item-titulo">Ranking</span>
                                <p>
                                    Somos la UNAM, una institución educativa reconocida a nivel mundial y una
                                    de las dos mejores universidades de Iberoamérica (QS World University Rankings 2020).
                                </p>
                            </li>
                            <li class="nosotros-item">
                                <span class="nosotros-item-titulo">Proveedor</span>
                                <p>
                                    Formamos parte de la Red de Educación Continua y a Distancia de la UNAM (REDEC).
                                </p>
                            </li>
                        </ul>
                    </div>

                </div>
            </section>

            <!-- SECCIÓN CENTROS — Cards 3 en fila
         Imagen, nombre del centro, dirección y teléfonos -->
            <section class="centros-section">
                <h2 class="centros-titulo">Nuestros Centros</h2>
                <div class="centros-grid">

                    <div class="centro-card">
                        <div class="centro-card-img">
                            <img src="" alt="Centro Ciudad Universitaria" />
                        </div>
                        <div class="centro-card-body">
                            <h3 class="centro-card-nombre">Centro Ciudad Universitaria</h3>
                            <p class="centro-card-info"></p>
                        </div>
                    </div>

                    <div class="centro-card">
                        <div class="centro-card-img">
                            <img src="" alt="Centro Mascarones" />
                        </div>
                        <div class="centro-card-body">
                            <h3 class="centro-card-nombre">Centro Mascarones</h3>
                            <p class="centro-card-info"></p>
                        </div>
                    </div>

                    <div class="centro-card">
                        <div class="centro-card-img">
                            <img src="" alt="Centro Polanco" />
                        </div>
                        <div class="centro-card-body">
                            <h3 class="centro-card-nombre">Centro Polanco</h3>
                            <p class="centro-card-info"></p>
                        </div>
                    </div>

                </div>
            </section>

        </main>

        <?php include __DIR__ . '/../templates/footer.php'; ?>

    </div>
    <script src="<?= BASE_URL ?>assets/js/jquery.min.js"></script>
    <script src="<?= BASE_URL ?>assets/js/app.js"></script>
</body>

</html>