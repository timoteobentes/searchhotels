<?php

    require_once("../../../backend/hotel/model/hotel.php");
    require_once("../../../backend/hotel/model/hoteldao.php");

    $endereco_cidade = $_POST['endereco_cidade'] ?? null;
    $endereco_estado = $_POST['endereco_estado'] ?? null;

    $Hotel = new Hotel();

    $Hotel->setEndereco_cidade($endereco_cidade);
    $Hotel->setEndereco_estado($endereco_estado);

    $operator = HotelDAO::pesquisaHotel($Hotel);

    if($operator) {
        foreach($operator as $op) {
            $data[] = [
                "nome" => $op->getNome()
            ];
        }
        header("location: ../../../view/main.php");
    } else {
        header("location: ../../../view/main.php");
    }

?>