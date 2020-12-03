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

    <!--<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>-->
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
            <div class="tableContent">
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
                    </tr>
                    <tr class="">
                        <td>2</td>
                        <td>Primary</td>
                        <td>Joe</td>
                        <td>joe@example.com</td>
                    </tr>
                </tbody>
            </table>
            </div>
            <div class="graphicContent">
                <h1>Custos Mensais</h1>
                <div id="grafico">
                    <canvas id="myChart" max-width="100%" max-height="100%"></canvas>
                </div>
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
    <script type="text/javascript" src="../src/js/notication.js"></script>
    <script type="text/javascript" src="../src/js/depesas.js"></script>
</html>