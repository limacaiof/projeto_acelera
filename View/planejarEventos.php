<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planejar Eventos</title>
    <!-- COMPONENTE MENU  KKK  -->
    <?php
        include('../Model/Usuario.php');
        include('../Controller/EventoController.php');
        require './componentes/bootstrap4-5-2.php';
        session_start();

        $usuario = new Usuario();
        $usuario = unserialize($_SESSION['usuario']);

        $controller = new EventoController();
        $eventos[] = new Evento();

        if(isset($_GET['orderBy'])) {
            if($_GET['orderBy'] == 'data') {
                $eventos = $controller->listarTodosOrderData($usuario->email);

            } else {
                $eventos = $controller->listarTodos($usuario->email);
            }

        } else {
            $eventos = $controller->listarTodos($usuario->email);
        }

        $quantEventos = $controller->listarQuantEventoCadastrados($usuario->email);

    ?>
    <link rel="stylesheet" href="../src/css/planejarEventos.css">
    <link rel="stylesheet" href="../src/css/fonts.css">
    <link rel="stylesheet" href="../src/css/geral.css">
    <script src="../src/js/charts.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../src/js/jquery.maskMoney.min.js"></script>
    
</head>

<body>
<!-- COMPONENTE MENU  -->
<?php
        require './componentes/menu.php';
    ?>
    <!-- SUB MENU  -->
    <div class="colorTabs">
        <ul class="nav nav-tabs container">

            <li class="nav-item">
                <a class="nav-link font2" href="visao-geral.php">Visão Geral</a>
            </li>
            <li class="nav-item">
                <a class="nav-link font2" href="despesas.php">Despesas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link font2 active" href="planejarEventos.php">Planeja Eventos</a>
            </li>
        </ul>
    </div>
    <section class="container">
        <div class="titlePageContent">
            <H1>Meus Eventos</H1>
        </div>
        <div class="quanti-evento" style="font-weight: 400; text-align: center; margin-bottom: 50px;">
            <h2>Você possui um total de <b><?php echo $quantEventos ? $quantEventos : 0; ?></b> eventos cadastrados.</h2>
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: large;">
                    Organizar por:
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="font-size: large;">
                    <a class="dropdown-item" href="planejarEventos.php">Ordem de inclusão</a>
                    <a class="dropdown-item" href="planejarEventos.php?orderBy=data">Eventos mais próximos</a>
                </div>
            </div>
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

        <div class="tableGraphicContent">
            <div class="tableContent cardsContent">
                <table class="table tabela font2">
                    <thead>
                        <tr>
                            <th>Evento</th>
                            <th>Valor</th>
                            <th>Descrição:</th>
                            <th>Data do evento:</th>
                            <th>Data cadastrada:</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php if(count($eventos) == 1): ?>
            
                        <div class="alert alert-info" role="alert" style="text-align: center; margin: 50px; font-size: larger;">
                            Parece que você não possui eventos cadastrados, sinta-se à vontade para cadastrar novos eventos quando quiser!
                        </div>

                    <?php else:?>
                        <?php foreach($eventos as $evento):?>
                            <?php if($evento->id_evento != null):?>
                            <!-- Por padrao a primeira posição do array virá vazia com tudo null, então para evitar uma coluna vazia coloquei esta condição-->
                                <tr>
                                    <td class="eventosTable"><?php echo $evento->nome_evento; ?></td>
                                    <td class="valorTable"><?php echo $evento->valor_evento; ?></td>
                                    <td style='text-align: left;'><?php echo $evento->descricao; ?></td>
                                    <td class="dataTable"><?php echo date("d/m/Y", strtotime($evento->data_evento)); ?></td>
                                    <td><?php echo date("d/m/Y", strtotime($evento->data_cadastro)); ?></td>
                                    <td>
                                        <?php  echo '<a class="tbl-btn2" style="color: red;" type="button" href="../Controller/EventoPageController.php?acao=apagar&id='.$evento->id_evento.'">Deletar</a>';?>    
                                    </td>
                                </tr>

                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif ?>

                    </tbody>
                </table>
            </div>
            <div class="graphicContent cardsContent">
                <h1>Orçamentos</h1>
                <div id="grafico">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
        
    </section>
    
    <section class="container create">
        <hr class="line">
        <h1>Criar Evento</h1>
        <div class="flex">
            <div class="form-event">
                <form class="formEvent" action="../Controller/EventoPageController.php" id="formPlanejar" method="POST">
                    <div class="organize">
                        <div class="form-group">
                            <label style="font-size: larger;" class="col-form-label" for="name">Nome:</label>
                            <input class="input" id="name" type="text" name="nome">
                        </div>
                        <div class="form-group">
                            <label style="font-size: larger;"for="date">Acontecerá em:</label>
                            <input  class="input" id="date" type="date" name="data">
                        </div>
                        <div class="form-group">
                            <label style="font-size: larger;"for="price">Custará:</label>
                            <input class="input" id="price" type="text" name="valor">
                        </div>
                    </div>
                    <div class="form-group descr">
                        <label style="font-size: larger;"for="deescricao">Descricão:</label>
                        <input id="deescricao" type="text" name="descricao">
                        <?php echo '<input type="hidden" name="email" value="'.$usuario->email.'">' ?>
                        <input type="hidden" name="acao" value="cadastrar">
                    </div>
                    
                </form>
            </div>
            <div class="div-btn-event">
                <button type="button" class='btn-event' onclick="document.getElementById('formPlanejar').submit()">Criar</button>
            </div>
        </div>
        <hr class="line">

    </section>
    <section class="dicas container">
        <p>A ideia é transformar momentos especiais em algo prazeroso e seguro, cuidando minuciosamente de tudo, para que seja de acordo com o que você imaginou. Nosso foco é ver, de fato, a felicidade estampada nos olhos de nossos clientes com a realização de seu objetivo.</p>
    </section>
    <!-- Footer -->
    <footer class="footer-my">
        <div class="container">
            <p>@Direitos Autorais 2020</p>
        </div>            
    </footer>

</body>
    <script type="text/javascript" src="../src/js/planejarEventos.js"></script>
    <script>
        // mascara para valor despesa
        $(document).ready(function(){
            $("#price").maskMoney({prefix:'', allowNegative: false, thousands:'', decimal:',', affixesStay: false});
        });
    </script>
</html>