<?php

require_once "..\Classes\Mapper\ProfessorMapper.php";
require_once "..\Classes\Professor.php";


$matricula = $_POST['matricula'];
$senha = $_POST['password'];

$username = "root";
$password = "";


try {
    $conn = new PDO("mysql:host=localhost;dbname=dbacademico", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    ProfessorMapper::setConnection($conn);
 

    if (ProfessorMapper::autenticacao($matricula, $senha)) {

        echo "Login bem-sucedido!";
    } else {

        header('Location: ../../loginProfessor.html');
    }
} catch (PDOException $e) {
    echo "Erro na conexão com o banco de dados: " . $e->getMessage();
}


?>