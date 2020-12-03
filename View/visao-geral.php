<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visao Geral</title>
    <!-- COMPONENTE MENU  KKK  -->
    <?php
        require './componentes/bootstrap4-5-2.php';
    ?>
    <link rel="stylesheet" href="../src/css/geral.css">
    <link rel="stylesheet" href="../src/css/visaoGeral.css">
    <link rel="stylesheet" href="../src/css/fonts.css">
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
    <div class="container content">


    </div>
</body>

</html>