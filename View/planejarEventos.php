<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planejar Eventos</title>
    <!-- COMPONENTE MENU  KKK  -->
    <?php
        require './componentes/bootstrap4-5-2.php';
    ?>
    <link rel="stylesheet" href="../src/css/planejarEventos.css">
    <link rel="stylesheet" href="../src/css/fonts.css">
    <link rel="stylesheet" href="../src/css/geral.css">
    <script src="../src/js/charts.js"></script>

    
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
                <a class="nav-link font2" href="#">Despesas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link font2 active" href="#">Planeja Eventos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link font2" href="#">Limites</a>
            </li>
        </ul>
    </div>
    <section class="container">
        <div class="titlePageContent">
            <H1>Meus Eventos</H1>
        </div>
        <div class="tableGraphicContent">
            <div class="tableContent cardsContent">
                <table class="table tabela font2">
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
                            <td><button class="tbl-btn2" type="button">Deletar</button></td>   
                        </tr>
                        <tr class="">
                            <td>2</td>
                            <td>Joe</td>
                            <td>Defaultson</td>
                            <td>joe@example.com</td>
                            <td><button class="tbl-btn2" type="button">Deletar</button></td>   
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="graphicContent cardsContent">
                <h1>Custos Mensais</h1>
                <div id="grafico">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
        <hr class="line">
    </section>
    <section class="dicas container">
        <p>A ideia é transformar momentos especiais em algo prazeroso e seguro, cuidando minuciosamente de tudo, para que seja de acordo com o que você imaginou. Nosso foco é ver, de fato, a felicidade estampada nos olhos de nossos clientes com a realização de seu objetivo.</p>
    </section>
    <section class="container create">
        <hr class="line">
        <h1>Criar Evento</h1>
        <div class="flex">
            <div class="form-event">
                <form class="formEvent" action="" method="POST">
                    <div class="organize">
                        <div class="form-group">
                            <label class="col-form-label" for="name">Nome:</label>
                            <input class="input" id="name" type="text">
                        </div>
                        <div class="form-group">
                            <label for="date">Acontecerá em:</label>
                            <input id="date" type="date">
                        </div>
                        <div class="form-group">
                            <label for="price">Custará:</label>
                            <input id="price" type="text">
                        </div>
                    </div>
                    <div class="form-group descr">
                        <label for="deescricao">Descricão:</label>
                        <input id="deescricao" type="text">
                    </div>
                    
                </form>
            </div>
            <div class="div-btn-event">
                <button type="button" class='btn-event'>Criar</button>
            </div>
        </div>
        

    </section>
    <!-- Footer -->
    <footer class="footer-my">
        <div class="container">
            <p>@Direitos Autorais 2020</p>
        </div>            
    </footer>

</body>
    <script type="text/javascript" src="../src/js/depesas.js"></script>
</html>