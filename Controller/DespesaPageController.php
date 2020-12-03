<?php

    session_start();
    include('../Controller/DespesaController.php');
    $controller = new DespesaController();

    $acao = $_GET['acao'];

    if($acao == 'apagar') {
        $id = $_GET['id'];
        $resultado = $controller->excluirDespesa($id);
        if($resultado) {
            $_SESSION['msg'] = "Despesa apagada com sucesso!";
            header('Location: http://localhost/projeto_acelera/View/despesas.php');
            exit();

        } else {
            $_SESSION['msg-erro'] = "Ocorreu um erro ao realizar operação, tente novamente!";
            header('Location: http://localhost/projeto_acelera/View/despesas.php');
            exit();
        }
    } 