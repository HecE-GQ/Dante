<?php
declare(strict_types=1);
require_once __DIR__ . '/controllers/CursoController.php';

$controller = new CursoController();

$cursos = $controller->index();

$detalle = $controller->getById(1);

header('Content-Type: application/json');
echo json_encode([
    'cursos' => $cursos,
    'detalle' => $detalle, 
], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);




