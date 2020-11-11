<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Se tiver arquivos css a parte, colocar depois do bootstrap para assim nao sobrescrever-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="./src/css/index.css">
    <title>Página Inicial</title>
</head>

<body>

    <!-- Modelo de navbar no site do bootstrap -->
    <nav class="navbar navbar-expand-lg " id="navbar">
        <a class="navbar-brand" href="#" id="logo">Nome do Negócio</a>
        <div class="botoes">
            <form id="logPc" action="View/logInOut.php" method="POST">
                <input type="hidden" name="tipo" value="Logar">
                <a class="nav-link" href="#" onclick="document.getElementById('logPc').submit()" id="login">Entrar</a>
            </form>
            <form id="cadPC" action="View/logInOut.php" method="POST">
                <input type="hidden" name="tipo" value="cadastrar">
                <a class="nav-link" href="#" onclick="document.getElementById('cadPC').submit()" id="register">Cadastrar</a>
            </form>
        </div>

        <div class="hamburger ">
            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-arrow-down-square" fill="white" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4z" />
            </svg>
        </div>
        <ul class="menu">
            <form id="logMobile" action="View/logInOut.php" method="POST">
                <input type="hidden" name="tipo" value="Logar">
                <li><a href="#" onclick="document.getElementById('logMobile').submit()">Entrar</a></li>
            </form>
            <form id="cadMobile" action="View/logInOut.php" method="POST">
                <input type="hidden" name="tipo" value="cadastrar">
                <hr>
                <li><a href="#" onclick="document.getElementById('cadMobile').submit()">Cadastrar</a></li>
            </form>
        </ul>
    </nav>

    <div class="corpo ">
        <div class="banner">
            <img src="./src/img/banner.png" alt="Facilite ainda hoje a forma como gerencia seu dinheiro!">
        </div>
        <div class="blocos container">
            <div class="card">
                <b class="card-title">Gerencie melhor sua renda!</b>
                <ul class="topicos-list">
                    <li topico>Ferramenta ideal para você</li>
                    <hr>
                    <li class="topico">Tenha melhor controle do seu dinheiro</li>
                    <hr>
                    <li class="topico">Controle contas a serem pagas</li>
                    <hr>
                    <li class="topico">e muito mais!</li>
                
                </ul>
    
            </div>
            <div class="card">
                <b class="card-title">Gerencie melhor sua renda!</b>
                <ul class="topicos-list">
                    <li topico>Ferramenta ideal para você</li>
                    <hr>
                    <li class="topico">Tenha melhor controle do seu dinheiro</li>
                    <hr>
                    <li class="topico">Controle contas a serem pagas</li>
                    <hr>
                    <li class="topico">e muito mais!</li>
                
                </ul>
    
            </div>
            <div class="card">
                <b class="card-title">Gerencie melhor sua renda!</b>
                <ul class="topicos-list">
                    <li topico>Ferramenta ideal para você</li>
                    <hr>
                    <li class="topico">Tenha melhor controle do seu dinheiro</li>
                    <hr>
                    <li class="topico">Controle contas a serem pagas</li>
                    <hr>
                    <li class="topico">e muito mais!</li>
                
                </ul>
    
            </div>
        </div>
    
        <div class="footer"></div>
 </div>

</body>
<script src="./src/js/index.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</html>