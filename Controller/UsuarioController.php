<?php 

    include('../Model/Usuario.php');
    include_once('../Database/DatabaseConnection.php');

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
                $valor_inicial = str_replace(',', '.', $valor_inicial); // troca , por . para seguir as conveções de valor em double
                $valor_inicial_convertido = doubleval($valor_inicial); 

                $sql = "UPDATE usuario SET valor_inicio= $valor_inicial_convertido WHERE email = '" .$email. "'";
                $statement = $pdo->prepare($sql);
                $statement->execute();

                return true;

            } catch (PDOException $th) {
                $th->getMessage();
                return false;
            }
        
        }
    }

?>