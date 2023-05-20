<?php

    require_once("../model/newsletter.php");
    require_once("../../../database/configDB.php");

    class NewsletterDAO {

        public static function getAll() {
            try {
                $PDO = connectDB::active();
                $sql = "SELECT * FROM newsletter";
                $stmt = $PDO->prepare($sql);
                $stmt->execute();

                $results = array();
                while($row = $stmt -> fetch(PDO::FETCH_OBJ)) {
                    $objeto = new Quarto();

                    $objeto->setId($row->Id);
                    $objeto->setNome($row->nome);
                    $objeto->setEmail($row->email);
                    $objeto->setData_cadatro($row->data_cadatro);

                    $results[] = $objeto;
                }

                return $results;
            } catch (Exception $e) {
                throw new Exception($e->getMessage());
            }
        }

        public static function insert(Newsletter $newsletter) {
            try {
                $PDO = connectDB::active();
                $sql = "INSERT INTO newsletter
                        (nome, email)
                        VALUE
                        (:nome, :email)";
                $stmt = $PDO->prepare($sql);

                $stmt->bindValue(":nome", $newsletter->getNome());
                $stmt->bindValue(":email", $newsletter->getEmail());

                $stmt->execute();

                return true;
            } catch(Exception $e) {
                throw new Exception($e->getMessage());
            }
        }

        public static function update(Quarto $quarto) {
            $PDO = connectDB::active();
            $sql = "UPDATE newsletter SET
                    nome = :nome,
                    email = :email
                    WHERE Id = :Id";
            $stmt = $PDO->prepare($sql);

            $stmt->bindValue(":nome", $quarto->getNome());
            $stmt->bindValue(":email", $quarto->getEmail());
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
                $sql = "DELETE FROM newsletter WHERE Id = :Id";
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