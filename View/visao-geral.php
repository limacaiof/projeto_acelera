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

        $quantidadeDespesa = $controllerDespesa->listarQuantDespesasCadastradas($usuario->email);
        $quantidadeEvento = $controllerEvento->listarQuantEventoCadastrados($usuario->email);
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

        <div class="alert alert-secondary" role="alert" style="margin: 35px; text-align: center; font-size: medium;">
            <i style="font-size: larger;">A mensagens que serão informadas aqui são geradas automaticamente através das informações fornecidas pelo usuário, se achar que o conteúdo de alguma delas não se enquadra com o seu perfil, favor desconsidera-las.<i>
        </div>

        <h3 style="font-style: normal;">Valor inicial informado: <span class="badge badge-secondary"><?php echo $usuario->valor_inicial ?></span></h3>

        <hr style="margin: 35px;">

        <!-- Gera um campo para o usuário cadastrar um valor inicial caso não possua -->
        <?php if($usuario->valor_inicial == 0): ?>
            
            <div>
                <div class="alert alert-info" role="alert" style="text-align: center; margin: 50px; font-size: large; font-style: normal;">
                    Informe um valor inicial monetário que você possui para gerar alguns e avisos e alertas personalizados em relação a suas despesas e eventos cadastrados!
                </div>
                <div class="form-valorinicial">
                    <form action="../Controller/LoginController.php?acao=infovalor" method="POST">
                        <div class="agrupar" style="display: flex; flex-direction: column;">
                            <label style="font-size: large; font-style: normal" class="col-form-label" for="valor">Valor inicial:</label>
                            <input class="input" id="valor" type="text" name="valor" style="width: 150px; height: 35px; margin-bottom: 25px;">
                        </div>
                        <button type="submit" class="btn btn-primary font3">Cadastrar</button>
                    </form>
                </div>
            </div>

            <hr style="margin: 50px;">

        <?php endif;?>

        <!-- disposicao de notificacoes aqui -->
        <?php if($quantidadeDespesa > 0 || $quantidadeEvento > 0):?>

            <!-- Se o usuario n tiver muitas despesas, alerta fazendo um estimulo para ele cadastrar mais -->
            <?php if($quantidadeDespesa < 3): ?>
                <div class="alert alert-warning" role="alert" style="margin: 50px; text-align: center; font-size: large; font-style: normal;">
                    Hmm, parece que você tem poucas despesas cadastradas no sistema, talvez tenha se esquecido de alguma.. Vamos lá, tente recordar de alguma despesa que tenha não cadastrado e informe na <a href="despesas.php" style="text-decoration: none;">aba de despesas</a>, ficará bem mais simples de se organizar ;)
                </div>
            <?php endif ?>

            <!-- alerta sobre importancia de planejar eventos futuros caso ele n tenha cadastrado muitos eventos -->
            <?php if($quantidadeEvento < 2): ?>
                <div class="alert alert-info" role="alert" style="margin: 50px; text-align: center; font-size: large; font-style: normal;">
                    Planejamento é fundamental para alavancar suas chances de realizar alguma meta ou preparar-se para eventos futuros. Por isso se planeje o quanto antes! Adicione mais eventos que envolvem algum custo na aba de <a href="planejarEventos.php">Planejar Eventos</a> para manter o controle de tudo o quanto antes! 
                </div>
            <?php endif ?>

        <?php endif; ?>


    </div>
</body>
<script>
    // mascara para valor despesa
    $(document).ready(function(){
        $("#valor").maskMoney({prefix:'', allowNegative: false, thousands:'', decimal:',', affixesStay: false});
    });
</script>

</html>