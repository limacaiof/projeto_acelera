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

        //definir filtro que o usuario escolheu, caso n ter escolhido nenhum, filtra todos por ordem de inclusao
        if(isset($_GET['orderBy'])) {
            if($_GET['orderBy'] == 'data') {
                $despesas = $controller->listarTodasOrderDataLimite($usuario->email);

            } elseif($_GET['orderBy'] == 'npagas') {
                $despesas = $controller->listarTodasOrderNaoPagas($usuario->email);

            } elseif($_GET['orderBy'] == 'pagas') {
                $despesas = $controller->listarTodasOrderPagas($usuario->email);
            }

        } else {
            $despesas = $controller->listarTodas($usuario->email);
        }


        $quantidadeDespesas = $controller->listarQuantDespesasCadastradas($usuario->email);
        
    ?>
   
    <link rel="stylesheet" href="../src/css/despesas.css">
    <link rel="stylesheet" href="../src/css/fonts.css">
    <link rel="stylesheet" href="../src/css/geral.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../src/js/jquery.maskMoney.min.js"></script>
    
</head>

<body>
<!-- Modal Adicionar Despesas-->

<div class="modal fade bd-example-modal-lg" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"  aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font4" id="exampleModalLongTitle">Nova Despesa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="../Controller/DespesaPageController.php" method="POST">
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label font3">Nome:</label>
                  <input type="text" class="form-control font3" id="recipient-name" name="nome">
                </div>
                <div class="form-group form-group-flex-my">
                    <div>
                        <label for="message-text" class="col-form-label font3">Valor (R$):</label>
                        <input type="text" class="form-control font3" id="valor" name="valor">
                    </div>
                    
                    <div>
                        <label for="message-text" class="col-form-label font3">Data de vencimento:</label>
                        <input type="date" class="form-control font3" id="recipient-name" name="data">
                    </div>
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label font3">Situação:</label>
                    <select name="situacao" class="selectpicker" style=" height: 40px; width: 150px; border: 1px solid #CED4DA; border-radius: 5px; background: transparent;">
                        <option value="A pagar">A pagar</option>
                        <option value="Paga">Paga</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label font3">Forma de pagamento:</label>
                    <select name="fpagamento" class="selectpicker" style="margin-bottom: 25px; height: 40px; width: 150px; border: 1px solid #CED4DA; border-radius: 5px; background: transparent;">
                        <option value="Crédito">Crédito</option>
                        <option value="Boleto">Boleto</option>
                        <option value="Débito">Débito</option>
                        <option value="Transferência bancária">Transferência bancária</option>
                        <option value="Dinheiro">Dinheiro</option>
                    </select>
                    <input type="hidden" value="cadastrar" name="acao">
                    <?php echo '<input type="hidden" name="email" value="'.$usuario->email.'">' ?>
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-secondary font3" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary font3">Cadastrar</button>
                </div>
                
              </form>
        </div>
        
      </div>
    </div>
  </div>
<!-- MODAL DE EDITAR AS DESPESAS -->
    <!-- MODAL DE EDITAR AS DESPESAS -->
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
                <form action="../Controller/DespesaPageController.php" method="POST">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label font3">Nova situação da despesa:</label>
                        <select name="situacao" class="selectpicker" style=" height: 40px; width: 150px; border: 1px solid #CED4DA; border-radius: 5px; background: transparent;">
                            <option value="A pagar">A pagar</option>
                            <option value="Paga">Paga</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="hidden" value="editar" name="acao">
                        <?php echo '<input type="hidden" name="id_despesa" value="'.(isset($_GET['id_des']) ? $_GET['id_des'] : 0).'">' ?>
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
<!-- FIM DO MODAL DE EDITAR AS DESPESAS -->

    <!-- chave principal para alteração de despesa, NAO MEXA -->
    <?php if(isset($_GET['id_des'])): ?>
        <script>
            $( document ).ready(function() {
                console.log( "ready!" );
                jQuery.noConflict(); 
                $('#idModalEditar').modal('show'); 
            });
        </script>
    <?php endif ?>


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
            <button typ="button/submit" id="addDespesas" data-toggle="modal" data-target="#exampleModalLong" class="btn-my-despesas">Adicionar</button>
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: large;">
                    Organizar por:
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="font-size: large;">
                    <a class="dropdown-item" href="despesas.php">Ordem de inclusão</a>
                    <a class="dropdown-item" href="despesas.php?orderBy=data">Datas de vencimento próximas</a>
                    <a class="dropdown-item" href="despesas.php?orderBy=npagas">Despesas não pagas primeiro</a>                    
                    <a class="dropdown-item" href="despesas.php?orderBy=pagas"> Despesas pagas primeiro</a>
                </div>
            </div>
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
            <?php if(count($despesas) == 1): ?>
            
                <div class="alert alert-info" role="alert" style="text-align: center; margin: 50px; font-size: large;">
                    Parece que você não possui despesas cadastradas, sinta-se à vontade para cadastrar novas despesas quando quiser!
                </div>

            <?php else:?>
                <tbody>
                    <?php foreach($despesas as $despesa):?>
                        <?php if($despesa->id_despesa != null):?>
                        <!-- Por padrao a primeira posição do array virá vazia com tudo null, então para evitar uma coluna vazia coloquei esta condição-->
                            <tr>
                                <td class="despesasTable"><?php echo $despesa->nome_despesa; ?></td>
                                <td class="valorTable"><?php echo $despesa->valor_despesa; ?></td>
                                <td class="dateTable"><?php echo date("d/m/Y", strtotime($despesa->data_limite)); ?></td>
                                <td><?php echo $despesa->forma_pagamento; ?></td>
                                <td><?php echo $despesa->situacao; ?></td>
                                <td><?php echo date("d/m/Y", strtotime($despesa->data_cadastro)); ?></td>
                                <td>
                                    <?php echo'<a class="tbl-btn1" type="button" href="despesas.php?id_des='.$despesa->id_despesa.'" >Editar</a>' ?>    
                                    <?php echo '<a class="tbl-btn2" type="button" href="../Controller/DespesaPageController.php?acao=apagar&id='.$despesa->id_despesa.'">Deletar</a>';?>    
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
<script>
    // mascara para valor despesa
    $(document).ready(function(){
        $("#valor").maskMoney({prefix:'', allowNegative: false, thousands:'', decimal:',', affixesStay: false});
    });
</script>
<script src="../src/js/charts.js"></script>
<script type="text/javascript" src="../src/js/depesas.js"></script>
</html>