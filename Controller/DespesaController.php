<?php

include('../Model/Despesa.php');
include_once('../Database/DatabaseConnection.php');

class DespesaController {

    public function salvarDespesa(Despesa $despesa) {

        $pdo = Database::conexao();

        try {

            // transformando string do valor em double pra armazenar no banco
            $valor_convertido = str_replace(',', '.', $despesa->valor_despesa);
            $valor_convertido = doubleval($valor_convertido);
            $despesa->valor_despesa = $valor_convertido;

            $sql = "INSERT INTO despesas (nome_despesa, data_cadastro, data_limite, forma_pagamento, valor_despesa, situacao, email_usuario) VALUES (:nome, :data_cadastro, :data_limite, :forma_pagamento, :valor_despesa, :situacao, :email_usuario)";
            $statement = $pdo->prepare($sql);
            $statement->execute(array(
                ':nome' => $despesa->nome_despesa,
                ':data_cadastro' => $despesa->data_cadastro,
                ':data_limite' => $despesa->data_limite,
                ':forma_pagamento' => $despesa->forma_pagamento,
                ':valor_despesa' => $despesa->valor_despesa,
                ':situacao' => $despesa->situacao,
                ':email_usuario' => $despesa->email_usuario,

            ));

            return true;
        } catch (PDOException $th) {
            $th->getMessage();
            return false;

        } finally {
            $pdo = null;
        }
    }

    public function listarTodas($email_user) {

        $pdo = Database::conexao();
        $lista[] = new Despesa;

            try {

                $sql = "SELECT * FROM despesas WHERE email_usuario= '".$email_user."' ORDER BY id_despesa";
                $statement = $pdo->query($sql);

                while($row = $statement->fetch(PDO::FETCH_ASSOC)) {

                    $despesa = new Despesa();
                    $despesa->id_despesa= $row['id_despesa'];
                    $despesa->nome_despesa= $row['nome_despesa'];
                    $despesa->data_cadastro = $row['data_cadastro'];
                    $despesa->data_limite = $row['data_limite'];
                    $despesa->forma_pagamento = $row['forma_pagamento'];
                    $despesa->valor_despesa = $row['valor_despesa'];
                    $despesa->situacao = $row['situacao'];
                    $despesa->email_usuario = $row['email_usuario'];

                    array_push($lista, $despesa);
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

    public function listarTodasOrderDataLimite($email_user) {

        $pdo = Database::conexao();
        $lista[] = new Despesa;

            try {

                $sql = "SELECT * FROM despesas WHERE email_usuario= '".$email_user."' ORDER BY data_limite asc";
                $statement = $pdo->query($sql);

                while($row = $statement->fetch(PDO::FETCH_ASSOC)) {

                    $despesa = new Despesa();
                    $despesa->id_despesa= $row['id_despesa'];
                    $despesa->nome_despesa= $row['nome_despesa'];
                    $despesa->data_cadastro = $row['data_cadastro'];
                    $despesa->data_limite = $row['data_limite'];
                    $despesa->forma_pagamento = $row['forma_pagamento'];
                    $despesa->valor_despesa = $row['valor_despesa'];
                    $despesa->situacao = $row['situacao'];
                    $despesa->email_usuario = $row['email_usuario'];

                    array_push($lista, $despesa);
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

    public function listarTodasOrderNaoPagas($email_user) {

        $pdo = Database::conexao();
        $lista[] = new Despesa;

            try {

                $sql = "SELECT * FROM despesas WHERE email_usuario= '".$email_user."' ORDER BY situacao= 'Paga'";
                $statement = $pdo->query($sql);

                while($row = $statement->fetch(PDO::FETCH_ASSOC)) {

                    $despesa = new Despesa();
                    $despesa->id_despesa= $row['id_despesa'];
                    $despesa->nome_despesa= $row['nome_despesa'];
                    $despesa->data_cadastro = $row['data_cadastro'];
                    $despesa->data_limite = $row['data_limite'];
                    $despesa->forma_pagamento = $row['forma_pagamento'];
                    $despesa->valor_despesa = $row['valor_despesa'];
                    $despesa->situacao = $row['situacao'];
                    $despesa->email_usuario = $row['email_usuario'];

                    array_push($lista, $despesa);
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

    public function listarTodasOrderPagas($email_user) {

        $pdo = Database::conexao();
        $lista[] = new Despesa;

            try {

                $sql = "SELECT * FROM despesas WHERE email_usuario= '".$email_user."' ORDER BY situacao= 'A pagar'";
                $statement = $pdo->query($sql);

                while($row = $statement->fetch(PDO::FETCH_ASSOC)) {

                    $despesa = new Despesa();
                    $despesa->id_despesa= $row['id_despesa'];
                    $despesa->nome_despesa= $row['nome_despesa'];
                    $despesa->data_cadastro = $row['data_cadastro'];
                    $despesa->data_limite = $row['data_limite'];
                    $despesa->forma_pagamento = $row['forma_pagamento'];
                    $despesa->valor_despesa = $row['valor_despesa'];
                    $despesa->situacao = $row['situacao'];
                    $despesa->email_usuario = $row['email_usuario'];

                    array_push($lista, $despesa);
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

    public function alterarStatusDespesa($nova_situacao, $id_despesa) {

        $pdo = Database::conexao();

            try {

                $sql = "UPDATE despesas SET situacao= '".$nova_situacao."' WHERE id_despesa = $id_despesa";
                $statement = $pdo->prepare($sql);
                $statement->execute();

                return true;

            } catch (PDOException $th) {
                $th->getMessage();
                return false;
            }
    }

    public function excluirDespesa($id_despesa ) {
        $pdo = Database::conexao();
    
            try {
    
                $sql = "DELETE FROM despesas WHERE id_despesa= :id";
                $statement = $pdo->prepare($sql);
                $statement->execute(array(
                    ':id' => $id_despesa
                ));
    
                return true;
    
            } catch (PDOException $th) {
                $th->getMessage();
                return false;
    
            } finally {
                $pdo = null;
            }
    
    }

    public function listarQuantDespesasCadastradas($email_user) {

        $pdo = Database::conexao();

        try {

            $sql = "SELECT count(*) from despesas WHERE email_usuario = '" .$email_user."'";

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

    public function listarTodasNaoPagas($email_user) {

        $pdo = Database::conexao();
        $lista[] = new Despesa;

            try {

                $sql = "SELECT * FROM despesas WHERE email_usuario= '".$email_user."' and situacao='A pagar'";
                $statement = $pdo->query($sql);

                while($row = $statement->fetch(PDO::FETCH_ASSOC)) {

                    $despesa = new Despesa();
                    $despesa->id_despesa= $row['id_despesa'];
                    $despesa->nome_despesa= $row['nome_despesa'];
                    $despesa->data_cadastro = $row['data_cadastro'];
                    $despesa->data_limite = $row['data_limite'];
                    $despesa->forma_pagamento = $row['forma_pagamento'];
                    $despesa->valor_despesa = $row['valor_despesa'];
                    $despesa->situacao = $row['situacao'];
                    $despesa->email_usuario = $row['email_usuario'];

                    array_push($lista, $despesa);
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

    
}

