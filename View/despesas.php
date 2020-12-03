<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Despesas</title>
    <!-- COMPONENTE MENU  KKK  -->
    <?php
        include('../Model/Usuario.php');
        include('../Controller/DespesaController.php');
        require './componentes/bootstrap4-5-2.php';
        session_start();

        $usuario = new Usuario();
        $usuario = unserialize($_SESSION['usuario']);

        //Ja selecionar todas despesas do usuario
        $controller = new DespesaController();
        $despesas[] = new Despesa();
        $despesas = $controller->listarTodas($usuario->email);

        $quantidadeDespesas = $controller->listarQuantDespesasCadastradas($usuario->email);
    ?>
   
    <link rel="stylesheet" href="../src/css/despesas.css">
    <link rel="stylesheet" href="../src/css/fonts.css">
    <link rel="stylesheet" href="../src/css/geral.css">
    <!--<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>-->
    
</head>

<body>
<!-- Modal Despesas-->
<div class="modal fade bd-example-modal-lg" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"  aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font4" id="exampleModalLongTitle">Nova Despesas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label font3">Nome:</label>
                  <input type="text" class="form-control font3" id="recipient-name">
                </div>
                <div class="form-group form-group-flex-my">
                    <div>
                        <label for="message-text" class="col-form-label font3">Valor:</label>
                        <input type="text" class="form-control font3" id="recipient-name">
                    </div>
                    
                    <div>
                        <label for="message-text" class="col-form-label font3">Data:</label>
                        <input type="date" class="form-control font3" id="recipient-name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label font3">Categoria:</label>
                    <input type="text" class="form-control font3" placeholder="Despesas ou Gastos" id="recipient-name">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label font3">Forma de Pagamento:</label>
                    <input type="text" class="form-control font3" placeholder="Despesas ou Gastos" id="recipient-name">
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-secondary font3" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary font3">Nova Despesagit</button>
                </div>
                
              </form>
        </div>
        
      </div>
    </div>
  </div>
  
 
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
                <a class="nav-link font2 active" href="#">Despesas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link font2" href="planejarEventos.php">Planeja Eventos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link font2" href="#">Gastos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link font2" href="#">Investimentos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link font2" href="#">Limites</a>
            </li>
        </ul>
    </div>
    <!-- DICAS BUSCA TABELA DE DESPESAS  -->

    <div class="container details-expenses">
        <div class="title-detais">
            <h1>Minhas Despesas</h1>
            <div class="help-expenses">
                <p>Despesas são os gastos básicos que
                    normalmente pagamos todo o mês, ou seja, 
                        são recursos necessarios para você. 
                </p>
                <icon> 
                    <?php
                        require '../src/svg/alert-circle-outline.php';
                    ?>
                </icon>
            </div>
    
        </div>

        <div class="quanti-despesas" style="font-weight: 400; text-align: center; margin: 50px;">
            <h2>Você possui um total de <b><?php echo $quantidadeDespesas ? $quantidadeDespesas : 0; ?></b> despesas cadastradas.</h2>
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
        
        <div class="opcoes">
            <button typ="button/submit" id="addDespesas" data-toggle="modal" data-target="#exampleModalLong"class="btn-my-despesas">Adicionar</button>
            <form action="#" method="post">
                <input type="text" class="input-form-my" name="search" id="search" placeholder="Procurar">
                <button typ="button/submit" class="btn-form-my">Buscar</button>
            </form>
         </div>

         <!-- Primeiro verificar se o usuario tem despesas, se nao tiver, colocar um aviso na tela -->
         <table class="table tabela font2">
             <!-- table-warning table-info table-danger-->
             <thead>
                 <tr>
                     <th>Despesa</th>
                     <th>Valor (R$)</th>
                     <th>Data Vencimento</th>
                     <th>Forma de pagamento</th>
                     <th>Situação</th>
                     <th>Data Cadastrada</th>
                     <th>Ações</th>
                 </tr>
             </thead>
            <?php if($despesas == null): ?>
            
                <div class="alert alert-info" role="alert" style="text-align: center; margin: 50px;">
                    Parece que você não possui despesas cadastradas, sinta-se à vontade para cadastrar novas despesas quando quiser!
                </div>

            <?php else:?>
                <tbody>
                    <?php foreach($despesas as $despesa):?>
                        <?php if($despesa->id_despesa != null):?>
                        <!-- Por padrao a primeira posição do array virá vazia com tudo null, então para evitar uma coluna vazia coloquei esta condição-->
                            <tr>
                                <td><?php echo $despesa->nome_despesa; ?></td>
                                <td><?php echo $despesa->valor_despesa; ?></td>
                                <td><?php echo date("d/m/Y", strtotime($despesa->data_limite)); ?></td>
                                <td><?php echo $despesa->forma_pagamento; ?></td>
                                <td><?php echo $despesa->situacao; ?></td>
                                <td><?php echo date("d/m/Y", strtotime($despesa->data_cadastro)); ?></td>
                                <td>
                                    <a class="tbl-btn1" type="button">Editar</a>    
                                    <?php  echo '<a class="tbl-btn2" type="button" href="../Controller/DespesaPageController.php?acao=apagar&id='.$despesa->id_despesa.'">Deletar</a>';?>    
                                </td>
                            </tr>

                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            <?php endif;?>
        </table>
    </div>
    <!-- GRAFICO DE DESPESAS  -->

    <section class="spend-graphic container">
        <h1>Gráficos de Gastos</h1>
        <div id="grafico">
            <canvas id="myChart" max-width="100%" height="100%"></canvas>
        </div>
    </section>
    
    <!-- Footer -->
    <footer class="footer-my">
        <div class="container">
            <p>@Direitos Autorais 2020</p>
        </div>            
    </footer>

</body>
<script src="../src/js/charts.js"></script>
<script type="text/javascript" src="../src/js/notication.js"></script>
<script type="text/javascript" src="../src/js/depesas.js"></script>
</html>