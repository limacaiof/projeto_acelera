<?php

    session_start();
    date_default_timezone_set('America/Sao_Paulo');
    include('../Controller/DespesaController.php');
    $controller = new DespesaController();

    $acao = '';

    if(isset($_GET['acao'])) {
        $acao = $_GET['acao']; 
    } elseif(isset($_POST['acao'])) {
        $acao = $_POST['acao'];
    }

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

    } elseif($acao == 'cadastrar') {
        $despesa = new Despesa();
        $despesa->nome_despesa = $_POST['nome'];
        $despesa->valor_despesa = $_POST['valor'];
        $despesa->data_limite = $_POST['data'];
        $despesa->data_cadastro = date("d/m/Y");
        $despesa->situacao = $_POST['situacao'];
        $despesa->forma_pagamento = $_POST['fpagamento'];
        $despesa->email_usuario = $_POST['email'];

        $resultado = $controller->salvarDespesa($despesa);

        if($resultado) {
            $_SESSION['msg'] = "Despesa cadastrada com sucesso!";
            header('Location: http://localhost/projeto_acelera/View/despesas.php');
            exit();

        } else {
            $_SESSION['msg-erro'] = "Ocorreu um erro ao realizar operação, tente novamente!";
            header('Location: http://localhost/projeto_acelera/View/despesas.php');
            exit();
        }
    }