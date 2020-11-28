<?php 

    include('../Model/Usuario.php');
    include('../Database/DatabaseConnection.php');

    class UsuarioController{

        public function salvar(Usuario $user) {
            
            $pdo = Database::conexao();

            try {

                $sql = "INSERT INTO usuario(nome, email, senha) VALUES (:nome, :email, :senha)";
                $statement = $pdo->prepare($sql);
                $statement->execute(array (
                    ':nome' => $user->nome,
                    ':email' => $user->email,
                    ':senha' => $user->senha
                ));

                return true;

            } catch (PDOException $th) {
                $th->getMessage();
                return false;
            }
        }

        public function validarLogin($email, $senha) {
            $pdo = Database::conexao();

            try {

                $sql = "SELECT * FROM usuario WHERE email = '" .$email. "' and senha = '".$senha."'";
                $statement = $pdo->query($sql);

                while($row = $statement->fetch(PDO::FETCH_ASSOC)) {

                    $user = new Usuario();

                    $user->nome = $row['nome'];
                    $user->email = $row['email'];
                    $user->senha = $row['senha'];
                    $user->valor_inicial = $row['valor_inicio'];

                    return $user;
                }

                return null;

            } catch (PDOException $th) {
                $th->getMessage();
            }
        
        
        }

        public function alterarValorInicial($valor_inicial, $email) {
            $pdo = Database::conexao();

            try {

                $sql = "UPDATE `usuario` SET valor_inicial='" .$valor_inicial. "' WHERE email = '" .$email. "'";
                $statement = $pdo->query($sql);

                $statement = $pdo->prepare($sql);
                $statement->execute();

            } catch (PDOException $th) {
                $th->getMessage();
            }
        
        }
    }

?>