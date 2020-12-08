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
        $listaPagas = $controllerDespesa->listarTodasNaoPagas($usuario->email);

        $somaValorDespesas = 0;

        foreach ($listaPagas as $despesapaga) {
            $somaValorDespesas+= doubleval($despesapaga->valor_despesa);
        }

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

    <?php if(isset($_GET['valor_i'])): ?>
        <script>
            $( document ).ready(function() {
                console.log( "ready!" );
                jQuery.noConflict(); 
                $('#idModalEditar').modal('show');
                
            });
        </script>
    <?php endif ?>

    <div class="modal fade bd-example-modal-lg" id="idModalEditar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"  aria-hidden="true" style="pointer-events: all;">
        <!-- PARA DIMINUIR O MODAL RETIRA MODAL-LG, PARA DIMINUIR MAIS AINDA ADD O MODAL-SM -->
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title font4" id="exampleModalLongTitle">Editando Despesa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <form action="../Controller/LoginController.php?acao=infovalor" method="POST">
                    <div class="form-group">
                        <label for="message-text" class="col-form-label font3">Novo valor (R$):</label>
                        <?php echo '<input type="text" class="form-control font3" id="valor_i" name="valor_i" value="'.(isset($_GET['valor_i']) ? str_replace('.', ',', $_GET['valor_i']) : 0).'">' ?>
                    </div>
                    <div class="form-group">
                        <input type="hidden" value="editar" name="acao">
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-secondary font3" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary font3">Editar</button>
                    </div>
                    
                </form>
                    
                </div>
                
            </div>
        </div>
    </div>
    <!-- FIM DO MODAL DE EDITAR AS DESPESAS -->

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

        <h3 style="font-style: normal;">Valor inicial informado: 
            <span class="badge badge-secondary"><?php echo $usuario->valor_inicial ?></span> 
            <?php echo '<a style="margin: 10px;" title="Editar valor" href="visao-geral.php?valor_i='.$usuario->valor_inicial.'">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                            </svg>
                        </a>' 
            ?>
        </h3>

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
                            <input class="input" id="valor" type="text" name="valor_i" style="width: 150px; height: 35px; margin-bottom: 25px;">
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

        <?php else: ?>
            <!-- Mostra quando usuario n tem despesa e nem eventos o que da entender que ele é um usuario novo -->
            <div class="alert alert-primary" role="alert" style="margin: 50px; text-align: center; font-size: large; font-style: normal;">
                 Bem vindo ao <span style="color: green;">safe</span><span style="color: #f9b100;">Money</span> <b><?php echo $usuario->nome ?></b>! seu mais novo assistente de controle financeiro. Chega de fazer controles no papel, aqui você gerenciará melhor suas contas, despesas, eventos futuros de sua escolha, enfim, tudo em único lugar só através de seu computador ou smartphone! 
            </div>

            <?php ?>

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