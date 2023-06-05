﻿<?php

require_once "..\Classes\Gateway\AlunoGateway.php";
require_once "..\Classes\Aluno.php";

$username = "root";
$password = "";

    $nomeAluno = $_POST['nome'];
    $curso = $_POST['curso'];
    $tipoCurso = $_POST['tipo'];
    $matriculaAluno = $_POST['matricula'];
    $senhaAluno = $_POST['senha'];

    try {
        $conn = new PDO ('mysql:host=localhost; dbname=dbacademico', $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        Aluno::setConnection($conn);    
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        AlunoGateway::setConnection($conn);

        $aluno1 = new Aluno();
        $aluno1 -> nomeAluno = $nomeAluno;
        $aluno1 -> curso = $curso;
        $aluno1 -> tipoCurso = $tipoCurso;
        $aluno1 -> matriculaAluno = $matriculaAluno;
        $aluno1 -> senhaAluno = $senhaAluno;
        $aluno1 -> save();

        $turma = Aluno::all();
        foreach ($turma as $sala) {
            echo "Nome do Aluno: " . $sala->nomeAluno . "<br>";
            echo "Curso:  " . $sala->curso . "<br>";
            echo "Tipo: " . $sala->tipoCurso . "<br>";
        }
    } catch (Exception $e) {
        print $e->getMessage();
    }

    //Testando Table Data Gateway - validando
    //Foi contruído e testado  o Table Data Gateway com funcionamento validado
    //Não é construído para ser utilizado diretamente pela aplicação
    //O papel é só realizar a trasferência de dados
    //Precisamos de um objeto de domínio, que além de transpostar os dados,
    //também oferece método de negócio, utilizado pela aplicação para realizar
    //processos de negócio
?>