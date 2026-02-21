<?php
declare(strict_types=1);
require_once __DIR__ . '/../config/database.php';

class Curso {
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    //Obtener todos los cursos activos 

    public function getAll(): array{
        $stmt = $this->db->query(
            "SELECT id, nombre, modalidad, duracion
            FROM cursos
            WHERE activo = 1
            ORDER BY nombre ASC"
        );
        return $stmt->fetchAll();
    }

    //Obtener un curso con sus caracteristicas y evaluaciones 

    public function getbyId(int $id): array{
        //Datos base 
        $stmt = $this->db->prepare(
            "SELECT id, nombre, modalidad, duracion 
            FROM cursos
            WHERE id = ? AND activo = 1"

        );
        $stmt->execute([$id]);
        $curso = $stmt->fetch();

        if(!$curso) return[];

        //Caracteristicas
        $stmt = $this->db->prepare(
            "SELECT 
            objetivo, temario, estrategias_didacticas,
            recursos_didacticos_y_materiales, bibliografia, recursos_informaticos
            FROM caracteristicas
            WHERE id_curso = ?"
        );

        $stmt->execute([$id]);
        $curso['caracteristicas'] = $stmt->fetch();

         //Evaluaciones
        $stmt = $this->db->prepare(
            "SELECT componente, porcentaje
            FROM evaluacion
            WHERE id_curso = ?"
        );
        $stmt->execute([$id]);
        $curso['evaluacion'] = $stmt->fetchAll();
        
        return $curso;
    }
    

   
}
