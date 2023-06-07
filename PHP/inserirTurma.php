<?php

require_once "Classes\Mapper\Cursomapper.php";
require_once "Classes\Mapper\TurmaMapper.php";
require_once "Classes\Turma.php";
require_once "Classes\Curso.php";

$username = "root";
$password = "";

$periodo = $_POST['periodo'];
$codigo = $_POST['codigo'];
$cursoSelecionado = $_POST['curso'];

try {
    $conn = new PDO('mysql:host=localhost; dbname=dbacademico', $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    CursoMapper::setConnection($conn);
    TurmaMapper::setConnection($conn);

    $turma = new Turma();
    $turma-> 

    $curso = CursoMapper::findNomeCurso($cursoSelecionado);
    

        TurmaMapper::save($turma);
        echo "Turma cadastrada com sucesso!";

} catch (Exception $e) {
    echo "Erro ao cadastrar turma: " . $e->getMessage();
}
