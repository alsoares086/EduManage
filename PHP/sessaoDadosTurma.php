<?php
session_start();


    try{

        $periodo = $_POST['periodo'];
        $codigo = $_POST['codigo'];
        $cursoSelecionado = $_POST['curso'];

        $_SESSION['periodo'] = $periodo;
        $_SESSION['codigo'] = $codigo;
        $_SESSION['cursoSelecionado'] = $cursoSelecionado;

        var_dump($cursoSelecionado);

        header('Location: ..\cadastroAlunosTurma.html');
    }catch(Exception $e){
        print $e->getMessage();
    }


?>
