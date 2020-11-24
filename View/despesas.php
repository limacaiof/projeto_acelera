<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Despesas</title>
    <!-- COMPONENTE MENU  KKK  -->
    <?php
        require './componentes/bootstrap4-5-2.php';
    ?>
   
    <link rel="stylesheet" href="../src/css/despesas.css">
    <link rel="stylesheet" href="../src/css/fonts.css">
    <link rel="stylesheet" href="../src/css/geral.css">
    <!--<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>-->
    <script src="../src/js/charts.js"></script>

    
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
                        <input type="text" class="form-control font3" id="recipient-name">
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
                <a class="nav-link font2" href="#">Planeja Eventos</a>
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
                    normalment pagamos todo o mês, ou seja, 
                        são recursos necessario para você. 
                </p>
                <icon> 
                    <?php
                        require '../src/svg/alert-circle-outline.php';
                    ?>
                </icon>
            </div> 
        </div>
        
        <div class="opcoes">
            <button typ="button/submit" id="addDespesas" data-toggle="modal" data-target="#exampleModalLong"class="btn-my-despesas">Adicionar</button>
            <form action="#" method="post">
                <input type="text" class="input-form-my" name="search" id="search" placeholder="Procurar">
                <button typ="button/submit" class="btn-form-my">Buscar</button>
            </form>
         </div>
        <table class="table tabela font2">
            <!-- table-warning table-info table-danger-->
            <thead>
                <tr>
                    <th>Nº</th>
                    <th>Despesas</th>
                    <th>Valor</th>
                    <th>Data Vencimento</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Default</td>
                    <td>Defaultson</td>
                    <td>def@somemail.com</td>
                    <td>
                        <button class="tbl-btn1" type="button">Editar</button>    
                        <button class="tbl-btn2" type="button">Deletar</button>    
                    </td>

                </tr>
                <tr class="">
                    <td>2</td>

                    <td>Primary</td>
                    <td>Joe</td>
                    <td>joe@example.com</td>
                    <td>
                        <button class="tbl-btn1" type="button">Editar</button>    
                        <button class="tbl-btn2" type="button">Deletar</button>    
                    </td>
                </tr>
                <tr class="">
                    <td>3</td>
                    <td>Success</td>
                    <td>Doe</td>
                    <td>john@example.com</td>
                    <td>
                        <button class="tbl-btn1" type="button">Editar</button>    
                        <button class="tbl-btn2" type="button">Deletar</button>    
                    </td>
                </tr>
                <tr class="">
                    <td>4</td>
                    <td>Danger</td>
                    <td>Moe</td>
                    <td>mary@example.com</td>
                    <td>
                        <button class="tbl-btn1" type="button">Editar</button>    
                        <button class="tbl-btn2" type="button">Deletar</button>    
                    </td>
                </tr>
                <tr class="">
                    <td>5</td>
                    <td>Info</td>
                    <td>Dooley</td>
                    <td>july@example.com</td>
                    <td>
                        <button class="tbl-btn1" type="button">Editar</button>    
                        <button class="tbl-btn2" type="button">Deletar</button>    
                    </td>
                </tr>
                
            </tbody>
        </table>
    </div>
    <!-- GRAFICO DE DESPESAS  -->

    <section class="spend-graphic container">
        <h1>Gráficos de Gastos</h1>
        <div id="grafico">
            <canvas id="myChart" max-width="100%" max-height="100%"></canvas>
           
        </div>
    </section>
    
    <!-- Footer -->
    <footer class="footer-my">
        <div class="container">
            <p>@Direitos Autorais 2020</p>
        </div>            
    </footer>

</body>
<script type="text/javascript" src="../src/js/notication.js"></script>
<script type="text/javascript" src="../src/js/depesas.js"></script>
</html>