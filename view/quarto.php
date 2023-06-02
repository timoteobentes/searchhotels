<?php

    if(!isset($_SESSION)){
        session_start();
    }

    $nome = "Login";
    $iduser = 0;
    $nomeValue = 0;
    if(isset($_SESSION["Logado"])) {
        $nome = $_SESSION["Logado"]["nome"];
        $iduser = $_SESSION["Logado"]["iduser"];
        $nomeValue = 1;
    } elseif(isset($_SESSION["quartos"])) {
        var_dump($_SESSION["quartos"]);
    }

    if(!isset($_SESSION)){
        session_start();
    }

    $hotel = $_SESSION["hotel"];
    $prec = $_SESSION["preco"];
    $comodidades = $_SESSION["comodidades"];
    $classificacao = $_SESSION["classificacao"];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    
    <title>Search Hotels</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../components/css/quarto.css">
    <!-- Fonts -->
    <link href="https://fonts.cdnfonts.com/css/fidena" rel="stylesheet">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
</head>
<body>
    <div class="container">
        <header>
            <div class="container-h">
                <div class="logo" id="logo">
                    <a href="../index.php">
                        <img src="../components/imgs/searchhotels.svg" alt="Search Hotels" class="logo-hotel-manaus">
                    </a>
                </div>
                <nav class="nav">
                    <ul>
                        <li id="Favoritos" onclick="openConstrucao()">
                            <a href="#">
                                <i class="bi bi-heart-fill"></i>
                                Favoritos
                            </a>
                        </li>
                        <li id="Suporte" onclick="openConstrucao()">
                            <a href="#">
                                <i class="bi bi-chat-dots-fill"></i>
                                Suporte
                            </a>
                        </li>
                        <li id="Login" value="<?php echo $nomeValue; ?>" onclick="openLogin(this)">
                        <i class="bi bi-person-fill"></i>
                            <?php echo $nome; ?>
                            <div id="modal-user" class="modal-user">
                                <div class="container-user">
                                    <div onclick="openConstrucao()">
                                        <a href="#">Perfil</a>
                                    </div>
                                    <div>
                                        <a href="../auth/sair/logout.php" class="sair">Sair</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li id="Idioma">
                            <select name="idioma" id="idioma">
                                <option value="pt-br">Português</option>
                                <option value="en-us">English</option>
                                <option value="es-es">Espanha</option>
                            </select>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>

    <section class="quarto">
        <div class="container-q">
            <div class="top-q">
                <div class="imagem"></div>
            </div>
            <div class="bottom-q">
                <div class="hotel">
                    <div>
                        <h2><?php echo $hotel; ?></h2>
                    </div>
                    <?php if($classificacao == 5) { ?>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <!-- <i class="bi bi-star-half"></i>
                            <i class="bi bi-star"></i> -->
                        </div>
                    <?php } ?>
                    <div class="preco-comodidades">
                        <div class="preco">
                            <h3> R$ <?php echo $prec; ?><sup>,00</sup></h3>
                            <span>Valor diária</span>
                        </div>
                        <div class="comodidades">
                            <div>
                                <h3>Comodidades:</h3>
                                <div class="comodidades-list">
                                    <?php echo $comodidades; ?>                        
                                </div>
                            </div>
                            <a href="#" onclick="setReserva(<?php echo $iduser; ?>)">Reservar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="newsletter">
        <div class="container-n">
            <div class="title-n">
                <h2>INSCREVA-SE PARA RECEBER OFERTAS EXCLUSIVAS!</h2>
            </div>
            <div class="campos-n">
                <div>
                    <input type="text" class="nome" placeholder="Nome">
                </div>
                <div>
                    <input type="text" class="email" placeholder="E-mail">
                </div>
                <div>
                    <input type="submit" class="eu_quero" value="EU QUERO">
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container-f">
            <div class="top-f">
                <div class="logo-f">
                    <img src="../components/imgs/searchhotels.svg" alt="Logo">
                </div>
            </div>
            <div class="main-f">
                <div>
                    <a href="https://www.instagram.com/bentest.t/" target="_blank">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="https://www.facebook.com/bentestimoteo/" target="_blank">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=5592994546580&text=Ol%C3%A1%20Tim%C3%B3teo!" target="_blank">
                        <i class="bi bi-whatsapp"></i>
                    </a>
                    <a href="https://github.com/timoteobentes">
                        <i class="bi bi-github"></i>
                    </a>
                </div>
            </div>
            <div class="bottom-f">
                <div>
                    <span>&copy;2O23 Timóteo Bentes | Todos os Direitos Reservados</span>
                </div>
            </div>
        </div>
    </footer>
</div>

<div class="modal-login" id="modal-login" onclick="closeLogin(event)">
    <div class="container-ml">
        <div class="imagem-ml">
            <div>
                <img src="../components/imgs/searchhotels.svg" alt="Search Hotels">
            </div>
        </div>
        <div class="campos-ml">
            <div>
                <h2>LOGIN</h2>
            </div>
            <div>
                <input type="text" class="email" placeholder="E-mail" required>
            </div>
            <div>
                <input type="password" class="senha" placeholder="Senha" required>
            </div>
            <div>
                <input type="submit" value="Entrar" class="entrar">
            </div>
            <div class="novo">
                <div>
                    <h3>Não tem conta?</h3>
                </div>
                <div>
                    <a href="./cadastro.php">Cadastre-se</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../components/js/hoteis.js"></script>
</body>
</html>