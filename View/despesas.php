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
</head>

<body>
    <!-- COMPONENTE MENU  KKK  -->
    <?php
        require './componentes/menu.php';
    ?>
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
            <div class="nav-item alerts">
                <li class="nav-item right-my">
                    <a class="nav-link font2" href="#">Alerta</a>
                </li>
                <li class="nav-item right-my">
                    <a class="nav-link font2" href="#">Notificações</a>
                </li>
            </div>
        </ul>
    </div>
    <div class="container content">
        <h1>Minhas Despesas</h1>
        <div class="opcoes">
            <div class="acoes">
                <button type="button" class="btn-my acao1">Adicionar Despesas</button>
                <button type="button" class="btn-my acao2">Remover Despesas</button>
            </div>

            <form action="#" method="post">
                <button typ="button/submit" class="btn-form-my">Buscar</button>
                <input type="text" class="input-form-my" name="search" id="search" placeholder="Procurar">
            </form>
        </div>
        <table class="table tabela font2">
            <!-- table-warning table-info table-danger-->
            <thead>
                <tr>
                    <th>Despesas</th>
                    <th>Valor</th>
                    <th>Data Vencimento</th>
                    <th>Categoria</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Default</td>
                    <td>Defaultson</td>
                    <td>def@somemail.com</td>
                    <td>
                        <button class="tbl-btn1" type="button">Editar</button>    
                        <button class="tbl-btn2" type="button">Deletar</button>    
                    </td>

                </tr>
                <tr class="">
                    <td>Primary</td>
                    <td>Joe</td>
                    <td>joe@example.com</td>
                    <td>
                        <button class="tbl-btn1" type="button">Editar</button>    
                        <button class="tbl-btn2" type="button">Deletar</button>    
                    </td>
                </tr>
                <tr class="">
                    <td>Success</td>
                    <td>Doe</td>
                    <td>john@example.com</td>
                    <td>
                        <button class="tbl-btn1" type="button">Editar</button>    
                        <button class="tbl-btn2" type="button">Deletar</button>    
                    </td>
                </tr>
                <tr class="">
                    <td>Danger</td>
                    <td>Moe</td>
                    <td>mary@example.com</td>
                    <td>
                        <button class="tbl-btn1" type="button">Editar</button>    
                        <button class="tbl-btn2" type="button">Deletar</button>    
                    </td>
                </tr>
                <tr class="">
                    <td>Info</td>
                    <td>Dooley</td>
                    <td>july@example.com</td>
                    <td>
                        <button class="tbl-btn1" type="button">Editar</button>    
                        <button class="tbl-btn2" type="button">Deletar</button>    
                    </td>
                </tr>
                <tr class="">
                    <td>Warning</td>
                    <td>Refs</td>
                    <td>bo@example.com</td>
                    <td>
                        <button class="tbl-btn1" type="button">Editar</button>    
                        <button class="tbl-btn2" type="button">Deletar</button>    
                    </td>
                </tr>
                <tr>
                    <td>Default</td>
                    <td>Defaultson</td>
                    <td>def@somemail.com</td>
                    <td>
                        <button class="tbl-btn1" type="button">Editar</button>    
                        <button class="tbl-btn2" type="button">Deletar</button>    
                    </td>
                </tr>
                <tr class="">
                    <td>Primary</td>
                    <td>Joe</td>
                    <td>joe@example.com</td>
                    <td>
                        <button class="tbl-btn1" type="button">Editar</button>    
                        <button class="tbl-btn2" type="button">Deletar</button>    
                    </td>
                </tr>
                <tr class="">
                    <td>Success</td>
                    <td>Doe</td>
                    <td>john@example.com</td>
                    <td>
                        <button class="tbl-btn1" type="button">Editar</button>    
                        <button class="tbl-btn2" type="button">Deletar</button>    
                    </td>
                </tr>
                <tr class="">
                    <td>Danger</td>
                    <td>Moe</td>
                    <td>mary@example.com</td>
                    <td>
                        <button class="tbl-btn1" type="button">Editar</button>    
                        <button class="tbl-btn2" type="button">Deletar</button>    
                    </td>
                </tr>
                <tr class="">
                    <td>Info</td>
                    <td>Dooley</td>
                    <td>july@example.com</td>
                    <td>
                        <button class="tbl-btn1" type="button">Editar</button>    
                        <button class="tbl-btn2" type="button">Deletar</button>    
                    </td>
                </tr>
                <tr class="">
                    <td>Warning</td>
                    <td>Refs</td>
                    <td>bo@example.com</td>
                    <td>
                        <button class="tbl-btn1" type="button">Editar</button>    
                        <button class="tbl-btn2" type="button">Deletar</button>    
                    </td>
                </tr>
                
            </tbody>
        </table>
    </div>
    <!-- Footer -->
    <footer class="footer-my">
        <div class="container">
            <p>@Direitos Autorais 2020</p>
        </div>            
    </footer>

</body>

</html>