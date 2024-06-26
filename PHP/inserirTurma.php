<?php

session_start();
// inserirTurma.php

require_once "Classes\Mapper\CursoMapper.php";
require_once "Classes\Mapper\TurmaMapper.php";
require_once "Classes\Mapper\AlunoMapper.php";
require_once "Classes\Turma.php";
require_once "Classes\Curso.php";
require_once "Classes\Aluno.php";


$username = "root";
$password = "";

$periodo = $_SESSION['periodo'];
$codigo =  $_SESSION['codigo'];
$cursoSelecionado = $_SESSION['cursoSelecionado'];
$idAluno = $_SESSION['alunos'];


try {
    $conn = new PDO('mysql:host=localhost; dbname=dbacademico', $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    CursoMapper::setConnection($conn);
    TurmaMapper::setConnection($conn);
    AlunoMapper::setConnection($conn);

    $turma = new Turma();
    $turma->setPeriodo($periodo);
    $turma->setCodigo($codigo);
    
    $curso = CursoMapper::findIdCurso($cursoSelecionado);
    $alunos = array();

    foreach ($idAluno as $alunoId) {
        $aluno = AlunoMapper::find($alunoId);

        if ($aluno) {
            $alunos[] = $aluno;
        } else {
            echo "Aluno não encontrado para o ID: " . $alunoId;
        }
    }
    
    if ($curso) {
        $turma->setCurso($curso);
        $turma->setAluno($alunos);
        TurmaMapper::save($turma);
    
        $turmaId = $turma->getId(); // Obter o ID da turma recém-inserida
        TurmaMapper::addAlunosToTurma($turma); // Passar o ID da turma para o método
    } else {
        echo "Curso não encontrado!";
    }
    
} catch (Exception $e) {
    echo "Erro ao cadastrar turma: " . $e->getMessage();
}

?>