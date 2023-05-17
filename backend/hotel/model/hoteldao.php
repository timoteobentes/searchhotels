<?php

    require_once("../model/hotel.php");
    require_once("../../../database/configDB.php");

    class HotelDAO {

        public static function getAll() {
            try {
                $PDO = connectDB::active();
                $sql = "SELECT * FROM hotel";
                $stmt = $PDO->prepare($sql);
                $stmt->execute();

                $results = array();
                while($row = $stmt -> fetch(PDO::FETCH_OBJ)) {
                    $objeto = new Hotel();

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

        public static function insertFirstData(Hotel $hotel) {
            try {
                $PDO = connectDB::active();
                $sql = "INSERT INTO hotel
                        (nome, cpf, celular, email, senha, endereco_cep, endereco_numero, endereco_logradouro, endereco_cidade, endereco_estado, endereco_pais)
                        VALUE
                        (:nome, :cpf, :celular, :email, :senha, :endereco_cep, :endereco_numero, :endereco_logradouro, :endereco_cidade, :endereco_estado, :endereco_pais)";
                $stmt = $PDO->prepare($sql);

                $stmt->bindValue(":nome", $hotel->getNome());
                $stmt->bindValue(":cpf", $hotel->getCPF());
                $stmt->bindValue(":celular", $hotel->getCelular());
                $stmt->bindValue(":email", $hotel->getEmail());
                $stmt->bindValue(":senha", $hotel->getSenha());
                $stmt->bindValue(":endereco_cep", $hotel->getEndereco_cep());
                $stmt->bindValue(":endereco_numero", $hotel->getEndereco_numero());
                $stmt->bindValue(":endereco_logradouro", $hotel->getEndereco_logradouro());
                $stmt->bindValue(":endereco_cidade", $hotel->getEndereco_cidade());
                $stmt->bindValue(":endereco_estado", $hotel->getEndereco_estado());
                $stmt->bindValue(":endereco_pais", $hotel->getEndereco_pais());

                $stmt->execute();

                return true;
            } catch(Exception $e) {
                throw new Exception($e->getMessage());
            }
        }

        public static function insertDadosPagamento(Hotel $hotel) {
            try {
                $PDO = connectDB::active();
                $sql = "UPDATE hotel SET
                        dados_pagamento_forma = :dados_pagamento_forma,
                        dados_pagamento_tipo_cartao = :dados_pagamento_tipo_cartao,
                        dados_pagamento_numero_cartao = :dados_pagamento_numero_cartao,
                        dados_pagamento_codigo_cartao = :dados_pagamento_codigo_cartao,
                        dados_pagamento_validade_cartao = :dados_pagamento_validade_cartao
                        WHERE Id = :Id";
                $stmt = $PDO->prepare($sql);

                $stmt->bindValue(":dados_pagamento_forma", $hotel->getDados_pagamento_forma());
                $stmt->bindValue(":dados_pagamento_tipo_cartao", $hotel->getDados_pagamento_tipo_cartao());
                $stmt->bindValue(":dados_pagamento_numero_cartao", $hotel->getDados_pagamento_numero_cartao());
                $stmt->bindValue(":dados_pagamento_codigo_cartao", $hotel->getDados_pagamento_codigo_cartao());
                $stmt->bindValue(":dados_pagamento_validade_cartao", $hotel->getDados_pagamento_validade_cartao());
                $stmt->bindValue(":Id", $hotel->getId());

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

        public static function update(Hotel $hotel) {
            $PDO = connectDB::active();
            $sql = "UPDATE hotel SET
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

            $stmt->bindValue(":nome", $hotel->getNome());
            $stmt->bindValue(":cpf", $hotel->getCPF());
            $stmt->bindValue(":celular", $hotel->getCelular());
            $stmt->bindValue(":email", $hotel->getEmail());
            $stmt->bindValue(":senha", $hotel->getSenha());
            $stmt->bindValue(":perfil", $hotel->getPerfil());
            $stmt->bindValue(":endereco_cep", $hotel->getEndereco_cep());
            $stmt->bindValue(":endereco_numero", $hotel->getEndereco_numero());
            $stmt->bindValue(":endereco_logradouro", $hotel->getEndereco_logradouro());
            $stmt->bindValue(":endereco_cidade", $hotel->getEndereco_cidade());
            $stmt->bindValue(":endereco_estado", $hotel->getEndereco_estado());
            $stmt->bindValue(":endereco_pais", $hotel->getEndereco_pais());
            $stmt->bindValue(":dados_pagamento_forma", $hotel->getDados_pagamento_forma());
            $stmt->bindValue(":dados_pagamento_tipo_cartao", $hotel->getDados_pagamento_tipo_cartao());
            $stmt->bindValue(":dados_pagamento_numero_cartao", $hotel->getDados_pagamento_numero_cartao());
            $stmt->bindValue(":dados_pagamento_codigo_cartao", $hotel->getDados_pagamento_codigo_cartao());
            $stmt->bindValue(":dados_pagamento_validade_cartao", $hotel->getDados_pagamento_validade_cartao());
            $stmt->bindValue(":Id", $hotel->getId());

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
                $sql = "DELETE FROM hotel WHERE Id = :Id";
                $stmt = $PDO->prepare($sql);
                $stmt->bindValue(":Id", $Id);
                $stmt->execute();

                return true;
            } catch(Exception $e) {
                throw new Exception($e->getMessage());
            }
        }

        public static function login(Hotel $hotel) {
            try {
                $PDO = connectDB::active();
                $sql = "SELECT * FROM hotel
                            WHERE email = :email AND senha = :senha;";
                $stmt = $PDO->prepare($sql);
                $stmt->bindValue(":email", $hotel->getEmail());
                $stmt->bindValue(":senha", $hotel->getSenha());
                $stmt->execute();

                $row = $stmt->fetch(PDO::FETCH_OBJ);
                $hotel = new Hotel;
                if (!empty($row)) {
                    $hotel->setId($row->Id);
                    $hotel->setNome($row->nome);
                    $hotel->setPerfil($row->perfil);
                }

                return empty($hotel) ? new Hotel() : $hotel;
            } catch(Exception $e) {
                throw new Exception($e->getMessage());
            }
        }

    }

?>