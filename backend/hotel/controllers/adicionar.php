<?php

    require_once("../../../backend/hotel/model/hotel.php");
    require_once("../../../backend/hotel/model/hoteldao.php");

    $nome = $_POST['nome'];

    $cnpj = $_POST['cnpj'];
    $cnpj = str_replace('.', '', $cnpj);
    $cnpj = str_replace('-', '', $cnpj);

    $celular = $_POST['celular'] ?? null;
    $email = $_POST['email'] ?? null;
    $descricao = "USER";
    $quantidade_quarto = $_POST['quantidade_quarto'];
    $endereco_cep = $_POST['endereco_cep'];
    $endereco_numero = $_POST['endereco_numero'] ?? null;
    $endereco_logradouro = $_POST['endereco_logradouro'] ?? null;
    $endereco_bairro = $_POST['endereco_bairro'] ?? null;
    $endereco_cidade = $_POST['endereco_cidade'] ?? null;
    $endereco_estado = $_POST['endereco_estado'] ?? null;
    $endereco_pais = $_POST['endereco_pais'] ?? null;

    $Hotel = new Hotel();

    $Hotel->setNome($nome);
    $Hotel->setCNPJ($cnpj);
    $Hotel->setCelular($celular);
    $Hotel->setEmail($email);
    $Hotel->setQuantidade_quarto($quantidade_quarto);
    $Hotel->setDescricao($descricao);
    $Hotel->setEndereco_cep($endereco_cep);
    $Hotel->setEndereco_numero($endereco_numero);
    $Hotel->setEndereco_logradouro($endereco_logradouro);
    $Hotel->setEndereco_bairro($endereco_bairro);
    $Hotel->setEndereco_cidade($endereco_cidade);
    $Hotel->setEndereco_estado($endereco_estado);
    $Hotel->setEndereco_pais($endereco_pais);

    $add = HotelDAO::insert($Hotel);

    if($add) {
        #$username = explode(" ", $nome);
        #$username = $username[0];

        // $_SESSION["Nome"] = $username;
        #if(!isset($_SESSION)){
        #    session_start();
        #}
        #$_SESSION["Cadastrado"] = $username;
        header("location: ../../../view/main.php");
    } else {
        #$_SESSION["CadastroFail"] = "Erro ao Cadastrar!";
        header("location: ../../../view/main.php");
    }

?>