<?php
declare (strict_types=1);

// ruta base del proyecto - ajustar en produccion
define('BASE_URL', '/Dante/');

//Dependencias
require_once __DIR__ . '/config/database.php';

$page = $_GET['page'] ?? 'inicio';

match($page){
    'cursos' => require __DIR__ . '/views/cursos/index.php',
    'curso' => require __DIR__ .'/views/cursos/curso.php',
    'nosotros' => require __DIR__ . '/views/estaticas/nosotros.php',
    'preguntas' => require __DIR__ . '/views/estaticas/preguntas.php',
    default => require __DIR__ . '/views/inicio.php'
};

