<?php
require_once "../Classes/Mapper/CursoMapper.php";
require_once "../Classes/Curso.php";

$username = "root";
$password = "";

try {
    $conn = new PDO('mysql:host=localhost;dbname=dbacademico', $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    CursoMapper::setConnection($conn);

    $cursos = CursoMapper::allCursos();

    if (!empty($cursos)) {
        echo json_encode($cursos);
    } else {
        echo json_encode(array('message' => 'Nenhum curso encontrado.'));
    }
} catch (PDOException $e) {
    $error = array('error' => 'Erro ao conectar ao banco de dados: ' . $e->getMessage());
    echo json_encode($error);
}
?>
