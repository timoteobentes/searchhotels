<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
    header("Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS");

    $servidor = "localhost";
    $user = "root";
    $senha = "Timoteo@24";
    $db_name = "searchhotels";

    $conexao = mysqli_connect($servidor, $user, $senha, $db_name) or die("Banco de Dados Indisponível...");
    date_default_timezone_set("America/Manaus");

?>