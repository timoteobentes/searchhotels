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
                    $objeto->setIdHotel($row->idhotel);
                    $objeto->setNumero($row->numero);
                    $objeto->setDescricao($row->descricao);
                    $objeto->setValor_diaria($row->valor_diaria);
                    $objeto->setData_cadastro($row->data_cadatro);

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
                        (nome, numero, descricao, valor_diaria, senha, endereco_cep, endereco_numero, endereco_logradouro, endereco_cidade, endereco_estado, endereco_pais)
                        VALUE
                        (:nome, :numero, :descricao, :valor_diaria, :senha, :endereco_cep, :endereco_numero, :endereco_logradouro, :endereco_cidade, :endereco_estado, :endereco_pais)";
                $stmt = $PDO->prepare($sql);

                $stmt->bindValue(":numero", $quarto->getNumero());
                $stmt->bindValue(":descricao", $quarto->getDescricao());
                $stmt->bindValue(":valor_diaria", $quarto->getValor_diaria());

                $stmt->execute();

                return true;
            } catch(Exception $e) {
                throw new Exception($e->getMessage());
            }
        }

        public static function update(Quarto $quarto) {
            $PDO = connectDB::active();
            $sql = "UPDATE quarto SET
                    nome = :nome,
                    numero = :numero,
                    descricao = :descricao,
                    valor_diaria = :valor_diaria,
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

            $stmt->bindValue(":numero", $quarto->getNumero());
            $stmt->bindValue(":descricao", $quarto->getDescricao());
            $stmt->bindValue(":valor_diaria", $quarto->getValor_diaria());
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
                            WHERE valor_diaria = :valor_diaria AND senha = :senha;";
                $stmt = $PDO->prepare($sql);
                $stmt->bindValue(":valor_diaria", $quarto->getValor_diaria());
                $stmt->execute();

                $row = $stmt->fetch(PDO::FETCH_OBJ);
                $quarto = new Quarto;
                if (!empty($row)) {
                    $quarto->setId($row->Id);
                    $quarto->setIdHotel($row->nome);
                }

                return empty($quarto) ? new quarto() : $quarto;
            } catch(Exception $e) {
                throw new Exception($e->getMessage());
            }
        }

    }

?>