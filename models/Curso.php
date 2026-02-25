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
       try{
         $stmt = $this->db->query(
            "SELECT id, nombre, modalidad, duracion
            FROM cursos
            WHERE activo = 1
            ORDER BY nombre ASC"
        );
        return $stmt->fetchAll();
       }catch(PDOException $e){
            error_log("[Curso::getAll] " . $e->getMessage());
            return [];
       }
    }

    //Obtener un curso con sus caracteristicas y evaluaciones 

    public function getById(int $id): array{
        if($id <= 0) return [];
        //Mas robustes con un trycatch en cada modulo, para manejo de errores
        try{
            //Datos base 
            $stmt = $this->db->prepare(
            "SELECT id, nombre, modalidad, duracion 
            FROM cursos
            WHERE id = ? AND activo = 1"

        );
        $stmt->execute([$id]);
        $curso = $stmt->fetch();
    
        if(!$curso) return[];

        //Caracteristicas - fetch() porque es 1 a 1 
        $stmt = $this->db->prepare(
            "SELECT 
            objetivo_general, perfil_ingreso, perfil_egreso, bibliografia, recursos_informaticos
            FROM caracteristicas
            WHERE id_curso = ?"
        );

        $stmt->execute([$id]);
        $curso['caracteristicas'] = $stmt->fetch() ?: [];

         //Evaluaciones -fetchAll() por que es 1 a muchos 
        $stmt = $this->db->prepare(
            "SELECT componente, porcentaje
            FROM evaluacion
            WHERE id_curso = ?"
        );
        $stmt->execute([$id]);
        $curso['evaluacion'] = $stmt->fetchAll();

        //Temario
        $stmt = $this->db->prepare(
                "SELECT contenido, estrategias_didacticas, recursos_didacticos_y_materiales
                FROM temario
                WHERE id_curso = ?"
        );
        $stmt->execute([$id]);
        $curso['temario'] = $stmt->fetchAll();

        return $curso;
        
        }catch(PDOException $e){
            error_log("[Curso::getById]" . $e->getMessage());
            return [];
        }
    
    }
   
}
