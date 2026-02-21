<?php
declare(strict_types=1);

require_once __DIR__ . '/../models/Curso.php';

class CursoController{
    private Curso $model;

    public function __construct()
    {
        $this->model = new Curso();
    }

    //Lista de cursos ç
    public function index(): array {
        return $this->model->getAll();
    }

    public function cursoDetalle(int $id): array{
        $curso = $this->model->getbyId($id);

        if(empty($curso)){
            http_response_code(404);
            return [];
        }
        return $curso;
    }

}

