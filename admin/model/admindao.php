<?php

    require_once("../../database/configDB.php");
    require_once("../../admin/model/admin.php");
    require_once("../../backend/hotel/model/hotel.php");

    class AdminDAO {

        public static function login(Admin $admin) {
            try {
                $PDO = connectDB::active();
                $sql = "SELECT * FROM usuario
                            WHERE cpf = :cpf AND senha = :senha; AND perfil = 'ADMIN'";
                $stmt = $PDO->prepare($sql);
                $stmt->bindValue(":cpf", $admin->getCpf());
                $stmt->bindValue(":senha", $admin->getSenha());
                $stmt->execute();

                $row = $stmt->fetch(PDO::FETCH_OBJ);
                $Admin = new Admin;
                if(!empty($row)) {
                    $Admin->setCpf($row->cpf);
                    $Admin->setNome($row->nome);
                    $Admin->setEmail($row->email);
                }

                return empty($Admin) ? new Admin : $Admin;

            } catch(Exception $e) {
                throw new Exception($e->getMessage());
            }
        }

        public static function getLastUsers() {
            try {
                $PDO = connectDB::active();
                $sql = "SELECT * FROM usuario ORDER BY id DESC";
                $stmt = $PDO->prepare($sql);
                $stmt->execute();

                $results = array();

                while($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                    $objeto = new Admin();

                    $objeto->setNome($row->nome);
                    $objeto->setCpf($row->cpf);
                    $objeto->setData_cadastro($row->data_cadastro);

                    $results[] = $objeto;
                }

                return $results;
            } catch(Exception $e) {
                throw new Exception($e->getMessage());
            }
        }

        public static function getHotelsStar() {
            try {
                $PDO = connectDB::active();
                $sql = "SELECT COUNT(h.id) AS num, h.nome, h.cnpj, h.data_cadastro FROM hotel h
                            INNER JOIN quarto q ON q.idhotel = h.id
                                GROUP BY h.id ORDER BY num DESC";
                $stmt = $PDO->prepare($sql);
                $stmt->execute();

                $results = array();

                while($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                    $objeto = new Hotel();

                    $objeto->setNome($row->nome);
                    $objeto->setCNPJ($row->cnpj);
                    $objeto->setData_cadatro($row->data_cadastro);

                    $results[] = $objeto;
                }

                return $results;
            } catch(Exception $e) {
                throw new Exception($e->getMessage());
            }
        }

    }

?>