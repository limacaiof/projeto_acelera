<?php 

    class Database {

        protected static $pdo;

        public function __construct()
        {
            $db_host = "localhost";
            $db_name = ""; // Insira o nome do BD de teste na sua maquina
            $db_port = '5432'; // Porta padrão do pgsql
            $db_usuario = "postgres"; // Por padrao o Postgresql usa o usuario postgres, caso use um diferente, coloque-o neste campo
            $db_senha = ""; // senha do usuario postgres da sua maquina
            $db_driver = "pgsql";

            try {
                self::$pdo = new PDO("$db_driver:host=$db_host; port=$db_port; dbname=$db_name", $db_usuario, $db_senha);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {

                die("Erro de conexão: ".$e->getMessage()); 
            }
        }

        public static function conexao()
        {
            # Garante uma única instância. Se não existe uma conexão, criamos uma nova.
            if (!self::$pdo)
            {
                new Database();
            }

            # Retorna a conexão.
            return self::$pdo;
        }
    }

?>