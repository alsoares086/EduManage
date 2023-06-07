<?php
    require_once "Classes/Mapper/CursoMapper.php";

    $username = "root";
    $password = "";

    $conn = new PDO ('mysql:host=localhost; dbname=dbacademico', $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    Cursomapper::setConnection($conn);    

    $nomeCurso = "Processos Escolares";
    $cursos = CursoMapper::findByNomeCurso($nomeCurso);
    
    foreach ($cursos as $curso) {
        // Faça algo com cada curso encontrado
        echo "ID: " . $curso['idCurso'] . "<br>";
        echo "Nome: " . $curso['nomeCurso'] . "<br>";
        echo "Tipo: " . $curso['tipoCurso'] . "<br>";
        echo "Turno: " . $curso['turno'] . "<br>";
        echo "<br>";
    }

?>