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
    <script type="text/javascript" src="../src/js/notication.js"></script>
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
        <h1>Minhas Despesas</h1>
        <div class="opcoes">
            <div class="help-expenses">
                <p>Despesas são os gastos básicos que
                    normalment pagamos todo o mês, ou seja, 
                        são recursos necessario para você. 
                </p>
                <icon>ADD</icon>
            </div> 
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
        <div>
            <grafic></grafic>
        </div>
    </section>
    
    <!-- Footer -->
    <footer class="footer-my">
        <div class="container">
            <p>@Direitos Autorais 2020</p>
        </div>            
    </footer>

</body>

</html>