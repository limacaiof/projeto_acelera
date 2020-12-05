<?php

include('../Model/Evento.php');
include('../Database/DatabaseConnection.php');

class EventoController
{

    public function salvarEvento(Evento $evento)
    {

        $pdo = Database::conexao();

        try {

            // transformando string do valor em double pra armazenar no banco
            $valor_convertido = str_replace(',', '.', $evento->valor_evento);
            $valor_convertido = doubleval($valor_convertido);
            $evento->valor_evento = $valor_convertido;

            $sql = "INSERT INTO eventos(nome_evento, data_evento, data_cadastro, valor_evento, descricao, email_usuario) VALUES (:nome, :data_evento, :data_cadastro, :valor_evento, :descricao, :email_usuario)";
            $statement = $pdo->prepare($sql);
            $statement->execute(array(
                ':nome' => $evento->nome_evento,
                ':data_evento' => $evento->data_evento,
                ':data_cadastro' => $evento->data_cadastro,
                ':valor_evento' => $evento->valor_evento,
                ':descricao' => $evento->descricao,
                ':email_usuario' => $evento->email_usuario,

            ));

            return true;
        } catch (PDOException $th) {
            $th->getMessage();
            return false;

        } finally {
            $pdo = null;
        }
    }

    public function listarTodos($email_user) {

        $pdo = Database::conexao();
        $lista[] = new Evento;

            try {

                $sql = "SELECT * FROM eventos WHERE email_usuario= '".$email_user."' ORDER BY id_evento";
                $statement = $pdo->query($sql);

                while($row = $statement->fetch(PDO::FETCH_ASSOC)) {

                    $evento = new Evento();
                    $evento->id_evento= $row['id_evento'];
                    $evento->nome_evento= $row['nome_evento'];
                    $evento->data_evento = $row['data_evento'];
                    $evento->data_cadastro = $row['data_cadastro'];
                    $evento->valor_evento = $row['valor_evento'];
                    $evento->descricao = $row['descricao'];
                    $evento->email_usuario = $row['email_usuario'];

                    array_push($lista, $evento);
                }

                if(!empty($lista)) { // verifica se a lista está vazia
                    return $lista;
                } else {
                    return null;
                }

            } catch (PDOException $th) {
                $th->getMessage();

            } finally {
                $pdo = null;
            }
    }

    public function listarTodosOrderData($email_user) {

        $pdo = Database::conexao();
        $lista[] = new Evento;

            try {

                $sql = "SELECT * FROM eventos WHERE email_usuario= '".$email_user."' ORDER BY data_evento";
                $statement = $pdo->query($sql);

                while($row = $statement->fetch(PDO::FETCH_ASSOC)) {

                    $evento = new Evento();
                    $evento->id_evento= $row['id_evento'];
                    $evento->nome_evento= $row['nome_evento'];
                    $evento->data_evento = $row['data_evento'];
                    $evento->data_cadastro = $row['data_cadastro'];
                    $evento->valor_evento = $row['valor_evento'];
                    $evento->descricao = $row['descricao'];
                    $evento->email_usuario = $row['email_usuario'];

                    array_push($lista, $evento);
                }

                if(!empty($lista)) { // verifica se a lista está vazia
                    return $lista;
                } else {
                    return null;
                }

            } catch (PDOException $th) {
                $th->getMessage();

            } finally {
                $pdo = null;
            }
    }

    public function excluirEvento($id_evento ) {
        $pdo = Database::conexao();

            try {

                $sql = "DELETE FROM eventos WHERE id_evento= :id";
                $statement = $pdo->prepare($sql);
                $statement->execute(array(
                    ':id' => $id_evento
                ));

                return true;

            } catch (PDOException $th) {
                $th->getMessage();
                return false;

            } finally {
                $pdo = null;
            }

    }

    public function listarQuantEventoCadastrados($email_user) {

        $pdo = Database::conexao();

        try {

            $sql = "SELECT count(*) from eventos WHERE email_usuario = '" .$email_user."'";

            $quantidade = $pdo->query($sql)->fetchColumn();

            if($quantidade) {
                return $quantidade;
            } else {
                return null;
            }
        } catch (\Throwable $th) {
            $th->getMessage(); 

        } finally {
            $pdo = null;
        }
    }
}
