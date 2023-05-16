<?php

    require_once("../../../database/configDB.php");
    

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $celular = $_POST['celular'] ?? null;
    $email = $_POST['email'] ?? null;
    $perfil = "USER";
    $senha = md5($_POST['senha']);
    $endereco_cep = $_POST['endereco_cep'];
    $endereco_numero = $_POST['endereco_numero'] ?? null;
    $endereco_logradouro = $_POST['endereco_logradouro'] ?? null;
    $endereco_bairro = $_POST['endereco_bairro'] ?? null;
    $endereco_cidade = $_POST['endereco_cidade'] ?? null;
    $endereco_estado = $_POST['endereco_estado'] ?? null;
    $endereco_pais = $_POST['endereco_pais'] ?? null;

    $insert = mysqli_query($conexao,
        " INSERT INTO usuario (nome, cpf, celular, email, perfil, senha,
                                endereco_cep, endereco_numero, endereco_logradouro, endereco_bairro, endereco_cidade,
                                endereco_estado, endereco_pais)
                VALUES ('$nome', $cpf, '$celular', '$email', '$perfil', '$senha', $endereco_cep, '$endereco_numero',
                        '$endereco_logradouro', '$endereco_bairro', '$endereco_cidade', '$endereco_estado',
                        '$endereco_pais');
    ");

    if($insert) {
        $_SESSION["Cadastrado"] = "Cadastro OK";
        header("location: ../../../index.php");
    } else {
        $_SESSION["CadastroFail"] = "Erro ao Cadastrar";
        header("location: ../../../index.php");
    }

?>