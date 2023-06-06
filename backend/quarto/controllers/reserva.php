<?php

    require_once("../../../backend/quarto/model/quarto.php");
    require_once("../../../backend/quarto/model/quartodao.php");

    $receivedData = file_get_contents("php://input");
    $dataJSON = json_decode($receivedData);

    $iduser = $dataJSON->user;
    $idquarto = $dataJSON->quarto;
    $status = "ATIVA";

    $Quarto = new Quarto();

    $Quarto->setIduser($iduser);
    $Quarto->setId($idquarto);
    $Quarto->setStatus($status);

    $add = QuartoDAO::reserva($Quarto);

    if($add) {
        header("location: ../../../view/hoteis.php");
    } else {
        header("location: ../../../view/hoteis.php");
    }

?>