<?php

    require_once("../../backend/usuario/model/usuario.php");
    require_once("../../backend/usuario/model/usuariodao.php");

    $email_login = $_POST['email'];
    $senha_login = md5($_POST['senha']);

    $Usuario = new Usuario();

    $Usuario->setEmail($email_login);
    $Usuario->setSenha($senha_login);
    
    $login = UsuarioDAO::login($Usuario);
    
    if(!isset($_SESSION)){
        session_start();
    }
    $nome = $login->getNome();
    if(!is_null($nome)) {
        $nome = explode(" ", $nome);
    
    
        $_SESSION["Logado"] = array(
            "nome" => $nome[0],
            "iduser" => $login->getId()
        );
        header("location: ../../view/main.php");
    } else {
        header("location: ../../view/main.php");
    }

?>