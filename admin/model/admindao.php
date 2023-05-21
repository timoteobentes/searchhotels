<?php

    require_once("../../../searchhotels/database/connection/configDB.php");
    require_once("../../../searchhotels/admin/model/admin.php");

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

    }

?>