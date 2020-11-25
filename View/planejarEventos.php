<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palnejar Eventos</title>
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
    <section class="container">

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