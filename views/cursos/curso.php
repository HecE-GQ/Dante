<?php

declare(strict_types=1);
require_once __DIR__ . '/../../controllers/CursoController.php';

// Validar ID de la URL
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($id <= 0) {
  require __DIR__ . '/../errors/404.php';
  exit;
}

$controller = new CursoController();
$curso      = $controller->getById($id);

if (empty($curso)) {
  require __DIR__ . '/../errors/404.php';
  exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <title><?= htmlspecialchars($curso['nombre']) ?> — DGTIC UNAM</title>
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/variables.css" />
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/main.css" />
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/navbar.css" />
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/footer.css" />
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/curso-detalle.css" />
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/modal.css" />
</head>

<body class="is-preload">
  <div id="page-wrapper">

    <?php include __DIR__ . '/../templates/header.php'; ?>

    <!-- MODAL DE REQUISITOS
       Se abre con el botón flotante-->
    <div id="modal-requisitos" class="modal-overlay" aria-hidden="true">
      <div class="modal-box">
        <h2>Requisitos para la inscripción</h2>
        <ol class="modal-lista">
          <li>Contar con una identificación oficial con fotografía, vigente, como INE, credencial SEP o Pasaporte.</li>
          <li>Escáner o celular para tomar una foto de su credencial, para el envío por correo electrónico.</li>
          <li>Contar con un equipo de cómputo con acceso a internet y cámara web activa en todo momento, que se empleará para hacer el examen diagnóstico.</li>
          <li>Navegador web actualizado.</li>
          <li>Acceso a una cuenta de correo para uso personal (registrada en el SIDEPAAE).</li>
          <li>30 minutos libres para responder el examen diagnóstico.</li>
        </ol>
        <button class="btn-cerrar" onclick="cerrarModal()">Cerrar</button>
      </div>
    </div>

    <!--CONTENIDO PRINCIPAL-->
    <main class="curso-detail">

      <!-- HERO: título + info general + evaluación -->
      <section class="curso-hero">

        <div class="hero-titulo">
          <a href="<?= BASE_URL ?>index.php?page=cursos" class="hero-back">
            <span class="icon solid fa-arrow-left"></span> Cursos
          </a>
          <h1><?= htmlspecialchars($curso['nombre']) ?></h1>
        </div>

        <div class="hero-cards">

          <!-- Card modalidad y duración -->
          <div class="card-info">
            <div class="card-info-item">
              <span class="card-info-label">Modalidad</span>
              <span class="card-info-valor"><?= htmlspecialchars($curso['modalidad']) ?></span>
            </div>
            <div class="card-info-divider"></div>
            <div class="card-info-item">
              <span class="card-info-label">Duración</span>
              <span class="card-info-valor"><?= htmlspecialchars($curso['duracion']) ?></span>
            </div>
          </div>

          <!-- Card evaluación -->
          <div class="card-evaluacion">
            <h3 class="card-section-title">Evaluación</h3>
            <table class="tabla-evaluacion">
              <thead>
                <tr>
                  <th>Componente</th>
                  <th>Porcentaje</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($curso['evaluacion'] as $eval): ?>
                  <tr>
                    <td><?= htmlspecialchars($eval['componente']) ?></td>
                    <td><?= htmlspecialchars((string)$eval['porcentaje']) ?>%</td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

        </div>
      </section>

      <!-- PERFILES -->
      <section class="curso-perfiles">

        <div class="perfil-card objetivo">
          <h2 class="perfil-titulo">Objetivo General</h2>
          <p><?= htmlspecialchars($curso['caracteristicas']['objetivo_general'] ?? '') ?></p>
        </div>

        <div class="perfil-card">
          <h2 class="perfil-titulo">Perfil de Ingreso</h2>
          <p><?= htmlspecialchars($curso['caracteristicas']['perfil_ingreso'] ?? '') ?></p>
        </div>

        <div class="perfil-card">
          <h2 class="perfil-titulo">Perfil de Egreso</h2>
          <p><?= htmlspecialchars($curso['caracteristicas']['perfil_egreso'] ?? '') ?></p>
        </div>

      </section>

      <!-- TEMARIO -->
       <!-- Acceso a los subarray que hay en temario, se creo una nueva tabla para temario, 
        para acceder a su contendio hacemos uso de un foreach, porque del modelo viene un array -->
                <!-- $curso['temario'] es un array de arrays — cada sub-array representa
                      una fila de la tabla `temario` en la BD.-->
      <section class="curso-temario">
        <h2 class="section-title">Temario</h2>
        <div class="tabla-wrapper">
          <table class="tabla-temario">
            <thead>
              <tr>
                <th>Contenido</th>
                <th>Estrategias Didácticas</th>
                <th>Recursos Didácticos y Materiales</th>
              </tr>
            </thead>
            <tbody>
              <?php if (empty($curso['temario'])): ?>
                <tr>
                  <td colspan="3" class="tabla-vacia">Sin temario registrado.</td>
                </tr>
              <?php else: ?>
                <?php foreach ($curso['temario'] as $tema): ?> 
                  <tr>
                    <td><?= nl2br(htmlspecialchars($tema['contenido'])) ?></td>
                    <td><?= nl2br(htmlspecialchars($tema['estrategias_didacticas'] ?? '')) ?></td>
                    <td><?= nl2br(htmlspecialchars($tema['recursos_didacticos_y_materiales'] ?? '')) ?></td>
                  </tr>
                <?php endforeach; ?>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </section>

      <!-- BIBLIOGRAFÍA Y RECURSOS -->
      <section class="curso-recursos">

        <div class="recursos-card">
          <h2 class="perfil-titulo">
            <span class="icon solid fa-book"></span> Bibliografía
          </h2>
          <ul class="lista-recursos">
            <?php foreach (explode('|', $curso['caracteristicas']['bibliografia'] ?? '') as $item): ?>
              <?php if (trim($item) !== ''): ?>
                <li><?= htmlspecialchars(trim($item)) ?></li>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
        </div>
        <!-- con explode converti toda la data de bibliografia de texto plano a un array, 
        asi se puede desplegar el contenido de ese registro en forma de una lista, ya que de no hacerlo asi se veria todo junto
        1.1----1.2----1.3----etc.
        hacemos el explode, separando cada tenxto con un separador, y de ese array recorremos con un foreach para hacer el despliegue de informacion
        -->
        <div class="recursos-card">
          <h2 class="perfil-titulo">
            <span class="icon solid fa-laptop"></span> Recursos Informáticos
          </h2>
          <ul class="lista-recursos">
            <?php foreach (explode('.', $curso['caracteristicas']['recursos_informaticos'] ?? '') as $item): ?>
              <?php if (trim($item) !== ''): ?>
                <li><?= htmlspecialchars(trim($item)) ?></li>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
        </div>

      </section>

    </main>

    <?php include __DIR__ . '/../templates/footer.php'; ?>

    <!-- BOTÓN FLOTANTE — abre el modal de requisitos -->
    <button class="btn-requisitos-flotante" onclick="abrirModal()"
      title="Ver requisitos de inscripción"
      aria-label="Ver requisitos de inscripción">
      <span class="btn-req-icono">?</span>
      <span class="btn-req-texto">Requisitos</span>
    </button>

              <!--Boton de creditos CUALQUIER SOLICITUD RESPECTO A LOS CURSOS, DEBERA ENVIAR CORRERO A LA CUENTA TAL TAL... -->
      <button class="btn-contacto-flotante" onclick="abrirModalCreditos()"
      title="Contacto y solicitudes"
      aria-label="Contacto y solicitudes">
      <span class="btn-req-icono">@</span>
      <span class="btn-req-texto">Contacto</span>
    </button>

              <div id="modal-creditos" class="modal-overlay" aria-hidden="true">
                  <div class="modal-box">
                    <h2>Contacto y Solicitudes</h2>
                    <p>Cualquier solicitud respecto a los cursos, deberá enviar correo a la cuenta:</p>
                      <p class="modal-email">cursos.sep.unam@gmail.com</p>
                      <p><strong>Indicando:</strong></p>
                      <p><strong>Asunto:</strong>Escribe tu numero de folio SDPC (Indispensable para poderte atender)</p> 
                      <p><strong>Contenido del mensaje:</strong> Deberia contener tu nombre completo posteriormente, el contenido de la solicitud</p> 
                    <button class="btn-cerrar" onclick="cerrarModalCreditos()">Cerrar</button>
                  </div>
              </div>

  </div><!-- /page-wrapper -->
  
              <!--  * El modelo usa fetchAll() → devuelve array de arrays
                        * Por eso se necesita foreach para iterar cada fila. 
                        * nl2br() convierte los saltos de línea \n del texto de la BD en <br> para preservar la jerarquía visual (1.1, 1.1.1, 1.2, etc.)
           * htmlspecialchars() sanitiza contra inyección XSS antes de imprimir.-->

  
  <script src="<?= BASE_URL ?>assets/js/app.js"></script>
</body>

</html>
