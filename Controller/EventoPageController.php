<?php 

    session_start();
    date_default_timezone_set('America/Sao_Paulo');
    include('../Controller/EventoController.php');
    $controller = new EventoController();

    $acao = '';

    if(isset($_GET['acao'])) {
        $acao = $_GET['acao']; 
    } elseif(isset($_POST['acao'])) {
        $acao = $_POST['acao'];
    }

    if ($acao == 'cadastrar') {
        

        $evento = new Evento();
        $evento->nome_evento = $_POST['nome'];
        $evento->valor_evento = $_POST['valor'];
        $evento->descricao = $_POST['descricao'];
        $evento->data_evento = $_POST['data'];
        $evento->email_usuario = $_POST['email'];
        $evento->data_cadastro = date("d/m/Y");

        $resultado = $controller->salvarEvento($evento);

        if($resultado) {
            $_SESSION['msg'] = "Evento cadastrado com sucesso!";
            header('Location: http://localhost/projeto_acelera/View/planejarEventos.php');
            exit();

        } else {
            $_SESSION['msg-erro'] = "Ocorreu um erro ao realizar operação, tente novamente!";
            header('Location: http://localhost/projeto_acelera/View/planejarEventos.php');
            exit();
        }
    } elseif($acao == 'apagar') {

        $id = $_GET['id'];
        $resultado = $controller->excluirEvento($id);
        if($resultado) {
            $_SESSION['msg'] = "Evento apagado com sucesso!";
            header('Location: http://localhost/projeto_acelera/View/planejarEventos.php');
            exit();

        } else {
            $_SESSION['msg-erro'] = "Ocorreu um erro ao realizar operação, tente novamente!";
            header('Location: http://localhost/projeto_acelera/View/planejarEventos.php');
            exit();
        }
    }


?>