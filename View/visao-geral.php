<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visao Geral</title>
    <!-- COMPONENTE MENU  KKK  -->
    <?php
        require './componentes/bootstrap4-5-2.php';
        include_once('../Controller/EventoController.php');
        include_once('../Controller/UsuarioController.php');
        include_once('../Controller/DespesaController.php');
        session_start();

        $usuario = new Usuario();
        $usuario = unserialize($_SESSION['usuario']);

        $controllerEvento = new EventoController();
        $contollerUsuario = new UsuarioController();
        $controllerDespesa = new DespesaController();


    ?>
    <link rel="stylesheet" href="../src/css/geral.css">
    <link rel="stylesheet" href="../src/css/visaoGeral.css">
    <link rel="stylesheet" href="../src/css/fonts.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../src/js/jquery.maskMoney.min.js"></script>
</head>
<body>
    <!-- COMPONENTE MENU  KKK  -->
    <?php
        require './componentes/menu.php';
    ?>
    <div class="colorTabs">
        <ul class="nav nav-tabs container">
            <li class="nav-item">
                <a class="nav-link font2 active" href="#">Visão Geral</a>
            </li>
            <li class="nav-item">
                <a class="nav-link font2" href="despesas.php">Despesas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link font2" href="planejarEventos.php">Planeja Eventos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link font2" href="#">Gastos</a>
            </li>
        </ul>
    </div>

    <!-- Verifica se possui alerta ou avisos para o usuario -->
    <?php if(isset($_SESSION['msg'])): ?>
            <div class="alert alert-info" role="alert" style="margin: 50px; text-align: center; font-size: large;">
                <?php echo $_SESSION['msg']; ?>
            </div>
        <?php 
            endif; 
            unset($_SESSION['msg']); // Ja desativa a msg pra ela n ficar para sempre na session
        ?>

        <?php if(isset($_SESSION['msg-erro'])): ?>
            <div class="alert alert-danger" role="alert" style="margin: 50px; text-align: center; font-size: large;">
                <?php echo $_SESSION['msg-erro']; ?>
            </div>
    <?php 
        endif; 
        unset($_SESSION['msg-erro']); // Ja desativa a msg pra ela n ficar para sempre na session
    ?>
    <!-- Fim verificação de msgs -->

    <div class="container">

        <!-- Gera um campo para o usuário cadastrar um valor inicial caso não possua -->
        <?php if($usuario->valor_inicial == 0): ?>
            
            <div>
                <div class="alert alert-info" role="alert" style="text-align: center; margin: 50px; font-size: larger;">
                    Informe um valor inicial monetário que você possui para gerar alguns e avisos e alertas personalizados em relação suas despesas e eventos cadastrados!
                </div>
                <div class="form-valorinicial">
                    <form action="../Controller/LoginController.php?acao=infovalor" method="POST">
                        <div class="agrupar" style="display: flex; flex-direction: column;">
                            <label style="font-size: larger;" class="col-form-label" for="valor">Valor inicial:</label>
                            <input class="input" id="valor" type="text" name="valor" style="width: 150px; height: 35px; margin-bottom: 25px;">
                        </div>
                        <button type="submit" class="btn btn-primary font3">Cadastrar</button>
                    </form>
                </div>
            </div>

        <?php endif;?>

        <?php var_dump($usuario) ?>

    </div>
</body>
<script>
    // mascara para valor despesa
    $(document).ready(function(){
        $("#valor").maskMoney({prefix:'', allowNegative: false, thousands:'', decimal:',', affixesStay: false});
    });
</script>

</html>