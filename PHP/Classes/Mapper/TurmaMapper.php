<?php

require_once "C:\\xampp\htdocs\EduManage\PHP\Classes\Curso.php";
// Classe TurmaMapper
class TurmaMapper
{
    private static $conn;

    // Método setConnection()
    public static function setConnection(PDO $conn)
    {
        self::$conn = $conn;
    }

    public static function save(Turma $turma, Curso $curso) {

        $sql = "INSERT INTO turma (codigo, turno, periodo, cursoNome, categoriaCurso, idCurso) VALUES (:codigo, :turno, :periodo, :cursoNome, :categoriaCurso, :idCurso)";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(':codigo', $turma->getCodigo());
        $stmt->bindParam(':turno', $curso->getTurnoCurso());
        $stmt->bindParam(':periodo', $turma->getPeriodo());
        $stmt->bindParam(':cursoNome', $curso->getNomeCurso());
        $stmt->bindParam(':categoriaCurso', $curso->gettipoCurso());
        $stmt->bindParam(':idCurso', $curso->getId());
        $stmt->execute();

        /*
            $id = self::$conn->lastInsertId();
            $turma->setId($id);*/


            //USAR A SESSÃO PARA PASSAR PRIMEIRO OS DADOS DO CURSO NELA E DEPOIS 
            //NA MESMA SESSÃO USAR OS DADOS PARA INSERIR NO CURSO!!!
            //REFLETINDO, SE EU JÁ TENHO INFORMAÇÕES NA TABELA CURSO, NÃO PRECISO INSERIR NOVAMENTE NA TURMA
            //SÓ PRECISO ASSOCIAR O CURSO À ELA
            //AO INVÉS DE NO CURSO TER O TIPO DE TURMA, O TIPO SERÁ EM TURMA
    
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
