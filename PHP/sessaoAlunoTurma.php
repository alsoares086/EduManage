<?php
require_once "Classes/Aluno.php";
session_start();

try {
    
    // Verificar se a matriz de alunos selecionados existe na sessão
    $_SESSION['alunos'] = array(); // Inicializar a matriz se ainda não estiver definida
// Verificar se o ID do aluno foi enviado através do formulário
    $alunosSelecionados = $_POST['alunos'];
    
    // Adicionar os IDs dos alunos selecionados na matriz da sessão
    foreach ($alunosSelecionados as $alunoId) {
        $_SESSION['alunos'][] = $alunoId;
    }

    /*
    $alunos = $_POST['alunos'];

    $_SESSION['alunos'] = $alunos;*/

    print_r ($_SESSION['alunos']);

    header('Location: inserirTurma.php');
} catch (Exception $e) {
    echo $e->getMessage();
}

?>
