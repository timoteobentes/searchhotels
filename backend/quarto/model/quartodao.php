<?php

    require_once("../model/quarto.php");
    require_once("../../../database/configDB.php");

    class QuartoDAO {

        public static function getAll() {
            try {
                $PDO = connectDB::active();
                $sql = "SELECT * FROM quarto";
                $stmt = $PDO->prepare($sql);
                $stmt->execute();

                $results = array();
                while($row = $stmt -> fetch(PDO::FETCH_OBJ)) {
                    $objeto = new Quarto();

                    $objeto->setId($row->Id);
                    $objeto->setNome($row->nome);
                    $objeto->setCPF($row->cpf);
                    $objeto->setCelular($row->celular);
                    $objeto->setEmail($row->email);
                    $objeto->setPerfil($row->perfil);
                    $objeto->setSenha($row->senha);
                    $objeto->setEndereco_cep($row->endereco_cep);
                    $objeto->setEndereco_numero($row->endereco_numero);
                    $objeto->setEndereco_logradouro($row->endereco_logradouro);
                    $objeto->setEndereco_cidade($row->endereco_cidade);
                    $objeto->setEndereco_estado($row->endereco_estado);
                    $objeto->setEndereco_pais($row->endereco_pais);
                    $objeto->setDados_pagamento_forma($row->dados_pagamento_forma);
                    $objeto->setDados_pagamento_tipo_cartao($row->dados_pagamento_tipo_cartao);
                    $objeto->setDados_pagamento_numero_cartao($row->dados_pagamento_numero_cartao);
                    $objeto->setDados_pagamento_codigo_cartao($row->dados_pagamento_codigo_cartao);
                    $objeto->setDados_pagamento_validade_cartao($row->dados_pagamento_validade_cartao);
                    $objeto->setData_cadatro($row->data_cadatro);

                    $results[] = $objeto;
                }

                return $results;
            } catch (Exception $e) {
                throw new Exception($e->getMessage());
            }
        }

        public static function insertFirstData(Quarto $quarto) {
            try {
                $PDO = connectDB::active();
                $sql = "INSERT INTO quarto
                        (nome, cpf, celular, email, senha, endereco_cep, endereco_numero, endereco_logradouro, endereco_cidade, endereco_estado, endereco_pais)
                        VALUE
                        (:nome, :cpf, :celular, :email, :senha, :endereco_cep, :endereco_numero, :endereco_logradouro, :endereco_cidade, :endereco_estado, :endereco_pais)";
                $stmt = $PDO->prepare($sql);

                $stmt->bindValue(":nome", $quarto->getNome());
                $stmt->bindValue(":cpf", $quarto->getCPF());
                $stmt->bindValue(":celular", $quarto->getCelular());
                $stmt->bindValue(":email", $quarto->getEmail());
                $stmt->bindValue(":senha", $quarto->getSenha());
                $stmt->bindValue(":endereco_cep", $quarto->getEndereco_cep());
                $stmt->bindValue(":endereco_numero", $quarto->getEndereco_numero());
                $stmt->bindValue(":endereco_logradouro", $quarto->getEndereco_logradouro());
                $stmt->bindValue(":endereco_cidade", $quarto->getEndereco_cidade());
                $stmt->bindValue(":endereco_estado", $quarto->getEndereco_estado());
                $stmt->bindValue(":endereco_pais", $quarto->getEndereco_pais());

                $stmt->execute();

                return true;
            } catch(Exception $e) {
                throw new Exception($e->getMessage());
            }
        }

        public static function insertDadosPagamento(Quarto $quarto) {
            try {
                $PDO = connectDB::active();
                $sql = "UPDATE quarto SET
                        dados_pagamento_forma = :dados_pagamento_forma,
                        dados_pagamento_tipo_cartao = :dados_pagamento_tipo_cartao,
                        dados_pagamento_numero_cartao = :dados_pagamento_numero_cartao,
                        dados_pagamento_codigo_cartao = :dados_pagamento_codigo_cartao,
                        dados_pagamento_validade_cartao = :dados_pagamento_validade_cartao
                        WHERE Id = :Id";
                $stmt = $PDO->prepare($sql);

                $stmt->bindValue(":dados_pagamento_forma", $quarto->getDados_pagamento_forma());
                $stmt->bindValue(":dados_pagamento_tipo_cartao", $quarto->getDados_pagamento_tipo_cartao());
                $stmt->bindValue(":dados_pagamento_numero_cartao", $quarto->getDados_pagamento_numero_cartao());
                $stmt->bindValue(":dados_pagamento_codigo_cartao", $quarto->getDados_pagamento_codigo_cartao());
                $stmt->bindValue(":dados_pagamento_validade_cartao", $quarto->getDados_pagamento_validade_cartao());
                $stmt->bindValue(":Id", $quarto->getId());

                $stmt->execute();

                if($stmt -> rowCount() > 0) {
                    return $stmt->rowCount();
                } else {
                    return false;
                }
            } catch(Exception $e) {
                throw new Exception($e->getMessage());
            }
        }

        public static function update(Quarto $quarto) {
            $PDO = connectDB::active();
            $sql = "UPDATE quarto SET
                    nome = :nome,
                    cpf = :cpf,
                    celular = :celular,
                    email = :email,
                    senha = :senha,
                    perfil = :perfil,
                    endereco_cep = :endereco_cep,
                    endereco_numero = :endereco_numero,
                    endereco_logradouro = :endereco_logradouro,
                    endereco_cidade = :endereco_cidade,
                    endereco_estado = :endereco_estado,
                    endereco_pais = :endereco_pais,
                    dados_pagamento_forma = :dados_pagamento_forma,
                    dados_pagamento_tipo_cartao = :dados_pagamento_tipo_cartao,
                    dados_pagamento_numero_cartao = :dados_pagamento_numero_cartao,
                    dados_pagamento_codigo_cartao = :dados_pagamento_codigo_cartao,
                    dados_pagamento_validade_cartao = :dados_pagamento_validade_cartao
                    WHERE Id = :Id";
            $stmt = $PDO->prepare($sql);

            $stmt->bindValue(":nome", $quarto->getNome());
            $stmt->bindValue(":cpf", $quarto->getCPF());
            $stmt->bindValue(":celular", $quarto->getCelular());
            $stmt->bindValue(":email", $quarto->getEmail());
            $stmt->bindValue(":senha", $quarto->getSenha());
            $stmt->bindValue(":perfil", $quarto->getPerfil());
            $stmt->bindValue(":endereco_cep", $quarto->getEndereco_cep());
            $stmt->bindValue(":endereco_numero", $quarto->getEndereco_numero());
            $stmt->bindValue(":endereco_logradouro", $quarto->getEndereco_logradouro());
            $stmt->bindValue(":endereco_cidade", $quarto->getEndereco_cidade());
            $stmt->bindValue(":endereco_estado", $quarto->getEndereco_estado());
            $stmt->bindValue(":endereco_pais", $quarto->getEndereco_pais());
            $stmt->bindValue(":dados_pagamento_forma", $quarto->getDados_pagamento_forma());
            $stmt->bindValue(":dados_pagamento_tipo_cartao", $quarto->getDados_pagamento_tipo_cartao());
            $stmt->bindValue(":dados_pagamento_numero_cartao", $quarto->getDados_pagamento_numero_cartao());
            $stmt->bindValue(":dados_pagamento_codigo_cartao", $quarto->getDados_pagamento_codigo_cartao());
            $stmt->bindValue(":dados_pagamento_validade_cartao", $quarto->getDados_pagamento_validade_cartao());
            $stmt->bindValue(":Id", $quarto->getId());

            $stmt->execute();

            if($stmt -> rowCount() > 0) {
                return $stmt->rowCount();
            } else {
                return false;
            }
        }

        public static function delete($Id) {
            try {
                $PDO = connectDB::active();
                $sql = "DELETE FROM quarto WHERE Id = :Id";
                $stmt = $PDO->prepare($sql);
                $stmt->bindValue(":Id", $Id);
                $stmt->execute();

                return true;
            } catch(Exception $e) {
                throw new Exception($e->getMessage());
            }
        }

        public static function login(Quarto $quarto) {
            try {
                $PDO = connectDB::active();
                $sql = "SELECT * FROM quarto
                            WHERE email = :email AND senha = :senha;";
                $stmt = $PDO->prepare($sql);
                $stmt->bindValue(":email", $quarto->getEmail());
                $stmt->bindValue(":senha", $quarto->getSenha());
                $stmt->execute();

                $row = $stmt->fetch(PDO::FETCH_OBJ);
                $quarto = new Quarto;
                if (!empty($row)) {
                    $quarto->setId($row->Id);
                    $quarto->setNome($row->nome);
                    $quarto->setPerfil($row->perfil);
                }

                return empty($quarto) ? new quarto() : $quarto;
            } catch(Exception $e) {
                throw new Exception($e->getMessage());
            }
        }

    }

?>