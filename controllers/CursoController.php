<?php
declare(strict_types=1);

require_once __DIR__ . '/../models/Curso.php';

class CursoController{
    private Curso $model;

    public function __construct()
    {
        $this->model = new Curso();
    }

    //Conteo de cursos activos
    public function contarCursos(): int{
        return $this->model->contarCursos();
    } 

    //Lista de cursos ç
    public function index(): array {
        $cursos = $this->model->getAll();

        if(empty($cursos)){
            http_response_code(404);
            return [];
        }
        return $cursos;
    }


    public function getById(int $id): array{
        //Validar ID antes de llegar al modelo 
        if($id <= 0){
            http_response_code(400);
            return [];
        }
        $curso = $this->model->getById($id);
        if(empty($curso)){
            http_response_code(404);
            return [];
        }
        return $curso;
    }

}

