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
                    $objeto->setCNPJ($row->cnpj);
                    $objeto->setCelular($row->celular);
                    $objeto->setEmail($row->email);
                    $objeto->setDescricao($row->descricao);
                    $objeto->setQuantidade_quarto($row->quantidade_quarto);
                    $objeto->setClassificacao($row->classificacao);
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

        public static function insert(Hotel $hotel) {
            try {
                $PDO = connectDB::active();
                $sql = "INSERT INTO hotel
                        (nome, cnpj, celular, email, descricao, classificacao, quantidade_quarto, endereco_cep, endereco_numero, endereco_logradouro, endereco_cidade, endereco_estado, endereco_pais)
                        VALUE
                        (:nome, :cnpj, :celular, :email, :descricao, :classificacao, :quantidade_quarto, :endereco_cep, :endereco_numero, :endereco_logradouro, :endereco_cidade, :endereco_estado, :endereco_pais)";
                $stmt = $PDO->prepare($sql);

                $stmt->bindValue(":nome", $hotel->getNome());
                $stmt->bindValue(":cnpj", $hotel->getcnpj());
                $stmt->bindValue(":celular", $hotel->getCelular());
                $stmt->bindValue(":email", $hotel->getEmail());
                $stmt->bindValue(":descricao", $hotel->getDescricao());
                $stmt->bindValue(":classificacao", $hotel->getClassificacao());
                $stmt->bindValue(":quantidade_quarto", $hotel->getquantidade_quarto());
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

        public static function update(Hotel $hotel) {
            $PDO = connectDB::active();
            $sql = "UPDATE hotel SET
                    nome = :nome,
                    cnpj = :cnpj,
                    celular = :celular,
                    email = :email,
                    quantidade_quarto = :quantidade_quarto,
                    descricao = :descricao,
                    classificacao = :classificacao,
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
            $stmt->bindValue(":cnpj", $hotel->getcnpj());
            $stmt->bindValue(":celular", $hotel->getCelular());
            $stmt->bindValue(":email", $hotel->getEmail());
            $stmt->bindValue(":quantidade_quarto", $hotel->getquantidade_quarto());
            $stmt->bindValue(":descricao", $hotel->getdescricao());
            $stmt->bindValue(":classificacao", $hotel->getClassificacao());
            $stmt->bindValue(":endereco_cep", $hotel->getEndereco_cep());
            $stmt->bindValue(":endereco_numero", $hotel->getEndereco_numero());
            $stmt->bindValue(":endereco_logradouro", $hotel->getEndereco_logradouro());
            $stmt->bindValue(":endereco_cidade", $hotel->getEndereco_cidade());
            $stmt->bindValue(":endereco_estado", $hotel->getEndereco_estado());
            $stmt->bindValue(":endereco_pais", $hotel->getEndereco_pais());
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

    }

?>