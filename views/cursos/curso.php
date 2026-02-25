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
$curso = $controller->getById($id);

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


  <?php include __DIR__ . '/../templates/header.php'; ?>

  <!-- MODAL DE REQUISITOS -->
  <div id="modal-requisitos" class="modal-overlay" aria-hidden="true">
  <div class="modal-box">
    <h2>Requisitos para la inscripción</h2>
    <ol class="modal-lista">
      <li>Contar con una identificación oficial con fotografía, vigente, como INE, credencial SEP o Pasaporte.</li>
      <li>Escáner o celular para tomar una foto de su credencial, para el envío por correo electrónico.</li>
      <li>Contar con un equipo de cómputo con acceso a internet y cámara web activa en todo momento.</li>
      <li>Navegador web actualizado.</li>
      <li>Acceso a una cuenta de correo para uso personal (registrada en el SIDEPAAE).</li>
      <li>30 minutos libres para responder el examen diagnóstico.</li>
    </ol>
    <button class="btn-cerrar" onclick="cerrarModal()">Cerrar</button>
  </div>
</div>

  <!-- CONTENIDO PRINCIPAL -->
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

        <!-- Card info general -->
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
            <?php foreach(explode('|', $curso['caracteristicas']['bibliografia']) as $item): ?> 
                <?php if(trim($item) !== ''): ?> <li><?= htmlspecialchars(trim($item)) ?></li> 
                    <?php endif; ?> <?php endforeach; ?> </ul> 
      </div>

      <div class="recursos-card">
        <h2 class="perfil-titulo">
          <span class="icon solid fa-laptop"></span> Recursos Informáticos
        </h2>
        <ul class="lista-recursos"> <?php foreach(explode('.', $curso['caracteristicas']['recursos_informaticos']) as $item): ?> 
            <?php if(trim($item) !== ''): ?> <li>
            <?= htmlspecialchars(trim($item)) ?></li> <?php endif; ?> <?php endforeach; ?> </ul>
      </div>

    </section>

  </main>

  <?php include __DIR__ . '/../templates/footer.php'; ?>

</div>
<script src="<?= BASE_URL ?>assets/js/jquery.min.js"></script>
<script src="<?= BASE_URL ?>assets/js/app.js"></script>
</body>
</html>
