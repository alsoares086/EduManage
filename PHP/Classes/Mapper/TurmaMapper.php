<?php

// Classe TurmaMapper
class TurmaMapper
{
    private static $conn;

    // Método setConnection()
    public static function setConnection(PDO $conn)
    {
        self::$conn = $conn;
    }

    
    /*
    public static function save(Turma $turma)
    {
        $codigo = $turma->getCodigo();
        $periodo = $turma->getPeriodo();
        $cursoId = $turma->getCurso()->getId();
    
        $sql = "INSERT INTO turma (codigo, periodo, curso) VALUES (:codigo, :periodo, :idCurso)";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(':codigo', $codigo);
        $stmt->bindParam(':periodo', $periodo);
        $stmt->bindParam(':idCurso', $cursoId);
        $stmt->execute();

    }*/

    public static function save(Turma $turma)
    {
        $codigo = $turma->getCodigo();
        $periodo = $turma->getPeriodo();
        $cursoId = $turma->getCurso()->getId();
    
        $sql = "INSERT INTO turma (codigo, periodo, curso) VALUES (:codigo, :periodo, :idCurso)";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(':codigo', $codigo);
        $stmt->bindParam(':periodo', $periodo);
        $stmt->bindParam(':idCurso', $cursoId);
        $stmt->execute();

        $id = self::$conn->lastInsertId();
        $turma->setId($id);

        //criar um método para essa parte debaixo pois a Turma já existe
        foreach ($turma->getAluno() as $estudantes) {
            
            $aluno = $turma->getAluno()->getIdAluno();

            $sql = "INSERT INTO aluno_turma (id_aluno, id_turma) VALUES (:id_aluno, :id_turma)";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindParam(':id_aluno',$aluno);
            $stmt->bindParam(':id_turma',$id) ;
            $stmt->execute();
        }
    }
    
    // Método delete()
    public static function delete($id)
    {
        $sql = "DELETE FROM turma WHERE id = :id";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    // Método find()
    public static function find($id)
    {
        $sql = "SELECT * FROM turma WHERE id = :id";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    // Método all()
    public static function all()
    {
        $sql = "SELECT * FROM turma";
        $stmt = self::$conn->query($sql);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }//Fim do método all()

   
    }


?>
