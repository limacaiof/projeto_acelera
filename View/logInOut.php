<!-- <!DOCTYPE html> -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../src/css/logInOut.css">
    <link rel="stylesheet" href="../src/css/fonts.css">
    <title>logInOut</title>
    <script>
        function trocarOpcoes(tipoAcesso){
            var mLogin = document.getElementById("log");
            var mCadastrar = document.getElementById("cad");
                if(tipoAcesso ===  "Logar"){
                    mLogin.style.display = "block";
                    mCadastrar.style.display = "none";
                } 
                else if(tipoAcesso === "cadastrar"){
                    mLogin.style.display = "none";
                    mCadastrar.style.display = "block";
                }
                else{
                    var tipo = document.getElementById("tipo").value;
                    if(tipo ===  "Logar"){
                        mLogin.style.display = "block";
                        mCadastrar.style.display = "none";
                    } 
                    else if(tipo === "cadastrar"){
                        mLogin.style.display = "none";
                        mCadastrar.style.display = "block";
                    }
                }
                
                
            
        }
       


    </script>
</head>

<body>
    <?php  
        $tipo = '';
        // echo "<script>alert('AFFF ".$_POST['tipo']."')</script>";
        
        if(isset($_POST['tipo'])){
            $tipo = $_POST['tipo'];
            // echo "<script>alert('AFFF ".$_POST['tipo']."')</script>";
        }   
    ?>
    <input id="tipo" type="hidden" value=<?php echo "$tipo";?>>
    
    

    <div class="container">
        <div class="modalLogin" id="log">
            <h1>Logar</h1>
            <hr>
            <form action="Controller/" method="POST">
                <input class="camp" type="text" name="email" id="emailId" placeholder="email">
                <input class="camp" type="password" name="senha" id="senhaId" placeholder="senha">
                <div class="form-check ckbox">
                    <input type="checkbox" class="box" id="boxId">
                    <p class="boxtxt">Manter-me Logado</p>
                </div>
                <button type="submit" class="btn btn-enviar">Entrar</button>
                <div class="footer-modal">
                    <h2 class="semconta">Ainda não tem conta?</h2>
                    <button class="btn-cad" type="button" onclick='trocarOpcoes("cadastrar")''>Cadastra-se</button>
                </div>
            </form>
        </div>
        <div class="modalCadastrar" id="cad">
            <div class="row">
                <div class="banner col-sm-5">
                    <h1>Seja Bem Vindo ! ! !</h1>
                    <div class="logo">
                        <img src="logotipo" alt="">
                    </div>
                </div>
                <div class="account col-sm-7">
                    <h1>Criar Conta</h1>
                    <hr>
                    <input class="camp" type="text" name="nome" id="nomeIdC" placeholder="nome">
                    <input class="camp" type="text" name="email" id="emailIdC" placeholder="email">
                    <input class="camp" type="password" name="senha" id="senhaIdC" placeholder="senha">
                    <button type="submit" class="btn btn-enviar">Entrar</button>
                    <div class="footer-modal">
                        <h2 class="semconta">Ainda não tem conta?</h2>
                        <button class="btn-cad" type="button" onclick='trocarOpcoes("Logar")'>Logar-se</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script>
    // Juntamente com o php, utilizar o input hidden para saber qual tipo de operacoes sera usaro logar ou cadastrar
    trocarOpcoes("asdsd");
</script>
</body>

</html>