<?php 

    include('./UsuarioController.php');
    $controller = new UsuarioController();

    session_start(); 

    // vai identificar se o form enviado para esse controller foi o de cadastro ou de login
    $acao = $_GET['acao'];

    if($acao == "login") { // caso a ação seja reconhecida como login
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $usuario = new Usuario(); // cria um novo objeto do tipo Usuario
        $usuario = $controller->validarLogin($email, $senha); // retorna null se nao achar nada ou retorna um usuario por inteiro caso o encontre

        if($usuario == null) {

            $_SESSION['erro-login'] = "Email e/ou senha inválidos. Tente novamente.";
            header("Location: http://localhost/projeto_acelera/index.php");
            exit();
        } else {

            $_SESSION['usuario'] = serialize($usuario); // guarda um objeto inteiro na sessao do navegador, ao inves de ficar cirando uma session diferente pra cada atributo
            header("Location: http://localhost/projeto_acelera/View/visao-geral.php");
            exit();
        }
        
    } elseif($acao == "cadastrar") {

        //setando atributos do usuario
        $usuario = new Usuario();
        $usuario->nome = $_POST['nome'];
        $usuario->senha = $_POST['senha'];
        $usuario->email = $_POST['email'];

        // $_SESSION['usuario'] = serialize($usuario);

        // header("Location: http://localhost/projeto_acelera/test.php");
        // exit();

        $statusCadastro = $controller->salvar($usuario); // retorna true caso consiga salvar e false caso ocorra algum erro

        if($statusCadastro) {

            $_SESSION['msg-sucesso'] = "Cadastro efetuado com sucesso! Faça seu login agora mesmo!";
            header("Location: http://localhost/projeto_acelera/index.php");
            exit();
        } else {
            $_SESSION['erro-login'] = "Ocorreu algum problema durante o cadastro, tente novamente.";
            header("Location: http://localhost/projeto_acelera/index.php");
            exit();
        }

    } elseif ($acao == 'logoff') {
        unset($_SESSION['usuario']);
        $_SESSION['msg-sucesso'] = "Logoff efetuado com sucesso";
        header("Location: http://localhost/projeto_acelera/index.php");
        exit();
    
    } elseif($acao = 'infovalor') {
        $valor_inicio = $_POST['valor'];
        $usuario = new Usuario();
        $usuario = unserialize($_SESSION['usuario']);
        $resultado = $controller ->alterarValorInicial($valor_inicio, $usuario->email);
        if($resultado) {
            $usuario = $controller->validarLogin($usuario->email, $usuario->senha); //atualizar dados novos dos usuarios
            unset($_SESSION['usuario']); //mata o usuario antigo e atualiza para um novo com o valor inicial inserido e na sessao
            $_SESSION['usuario'] = serialize($usuario);
            $_SESSION['msg'] = "Valor inicial informado com sucesso!";
            header("Location: http://localhost/projeto_acelera/View/visao-geral.php");
            exit();

        } else {
            
            $_SESSION['msg-erro'] = "Ops, parece que houve um problema durante a operação, tente novamente";
            header("Location: http://localhost/projeto_acelera/View/visao-geral.php");
            exit();
        }

    }

?>