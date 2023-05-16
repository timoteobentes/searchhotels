<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    
    <title>Search Hotels</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../components/css/style.css">
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
                        <img src="../components/imgs/searchhotels.svg" alt="Hotel Manaus" class="logo-hotel-manaus">
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
                        <li id="Login" onclick="openLogin()">
                            <a href="#" id="user" value="Login">
                                <i class="bi bi-person-fill"></i>
                                Login
                                <div id="modal-user" class="modal-user">
                                    <div class="container-user">
                                        <div>
                                            <a href="#">Perfil</a>
                                        </div>
                                        <div>
                                            <a href="../controllers/logout.php">Sair</a>
                                        </div>
                                    </div>
                                </div>
                            </a>
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

        <section class="hotels-search">
            <form action="../view/hoteis.php" method="post" class="container-hs">
                <div class="titulo-form">
                    <h2>Vai para onde?</h2>
                </div>
                <div class="campos">
                    <div>
                        <input type="text" class="destino" placeholder="Busque cidade">
                        <i class="bi bi-geo-alt"></i>
                    </div>
                    <span class="periodo">
                        <div>
                            <input type="text" name="check-in" id="check-in" placeholder="Check-in" onfocus="(this.type='date')" onblur="(this.type='text')">
                        </div>
                        <div>
                            <input type="text" name="check-out" id="check-out" placeholder="Check-out" onfocus="(this.type='date')" onblur="(this.type='text')">
                        </div>
                    </span>
                    <div>
                        <input type="text" class="room-hos" value="1 quarto, 3 hóspedes" onclick="roomHos()" readonly>
                        <i class="bi bi-people"></i>
                        <div id="modal-rp" class="modal-rp">
                            <div>
                                <input type="number" name="quartos" id="quartos" value="1" oninput="setQuarto(this.value)">
                                <label for="quartos">Quarto(s)</label>
                            </div>
                            <div>
                                <input type="number" name="hospedes" id="hospedes" value="3" oninput="setHospede(this.value)">
                                <label for="hospedes">Hóspede(s)</label>
                            </div>
                        </div>
                    </div>
                    <div>
                        <input type="submit" value="Pesquisar" class="pesquisar">
                    </div>
                </div>
            </form>
        </section>

        <section class="populares">
            <div class="title-pop">
                <h2>Destinos Populares</h2>
            </div>
            <div class="container-pop">
                <div class="pop-1">
                    <span>Hong Kong - Japão</span>
                </div>
                <div class="col-2">
                    <div class="pop-2">
                        <span>San Francisco - EUA</span>
                    </div>
                    <div class="pop-3">
                        <span>Natal - Brasil</span>
                    </div>
                </div>
            </div>
        </section>

        <section class="ads">
            <div class="container-ads">
                <div class="info-ads">
                    <h2>5O% OFF COM SHPREMIUM</h2>
                </div>
                <div class="action-ads">
                    <a href="#">APROVEITE</a>
                </div>
            </div>
        </section>

        <section class="promocoes">
            <div class="container-p">
                <a href="./view/hoteis.php">
                    <div class="promo-1">
                        <div class="img"></div>
                        <div class="info">
                            <h6>QUARTO</h6>
                            <h2>CASAL</h2>
                            <span>Rio de Janeiro - RJ</span>
                        </div>
                    </div>
                </a>
                <a href="./view/hoteis.php">
                    <div class="promo-2">
                        <div class="img"></div>
                        <div class="info">
                            <h6>QUARTO</h6>
                            <h2>EXECUTIVO</h2>
                            <span>Vitória - ES</span>
                        </div>
                    </div>
                </a>
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
                    <img src="../components/imgs/searchhotels.svg" alt="search hotels">
                </div>
            </div>
            <div class="campos-ml">
                <div>
                    <h2>LOGIN</h2>
                </div>
                <form action="../controllers/valida_login.php" method="post">
                    <div>
                        <input type="text" class="email" name="email" id="email" placeholder="E-mail" required>
                    </div>
                    <div>
                        <input type="password" class="senha" name="senha" id="senha" placeholder="Senha" required>
                    </div>
                    <div>
                        <input type="submit" name="submit" id="submit" value="Entrar" class="entrar">
                    </div>
                </form>
                <div class="novo">
                    <div>
                        <h3>Não tem conta?</h3>
                    </div>
                    <div>
                        <a href="../view/cadastro.php">Cadastre-se</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="login-admin" id="login-admin">
        <a href="../admin/index.php" class="login-adm">
            <span><i class="bi bi-lock-fill"></i></span>
        </a>
    </div>

    <div class="modal-construcao" id="modal-construcao" onclick="closeConstrucao(event)">
        <div class="container-mc">
            <div class="imagem-mc">
                <div>
                    <img src="../components/imgs/engrenagem.gif" alt="search hotels">
                </div>
            </div>
            <div class="mc">
                Página em construção
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="../components/js/script.js"></script>
</body>
</html>