<?php

    if(!isset($_SESSION)){
        session_start();
    }

    $nome = "Login";
    if(isset($_SESSION["Logado"])) {
        $nome = $_SESSION["Logado"];
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../icon_admin.ico" type="image/x-icon">
    
    <title>Painel Admin | Search Hotels</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../../components/css/painel/admin_painel.css">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            <div class="top-s">
                <div>
                    <img src="../../components/imgs/perfil.png" alt="Usuário">
                </div>
                <div class="info">
                    <span>Timóteo Bentes</span>
                    <span>Admin</span>
                </div>
            </div>
            <div class="opcoes">
                <ul>
                    <li class="selected">
                        <a href="./main.php">Dashboard</a>
                    </li>
                    <li>
                        <a href="./usuarios.php">Usuários</a>
                    </li>
                    <li>
                        <a href="./quartos.php">Quartos</a>
                    </li>
                    <li>
                        <a href="./hoteis.php">Hotéis</a>
                    </li>
                    <li class="suporte">
                        <a href="./suporte.php">Suporte</a>
                    </li>
                </ul>
            </div>
        </aside>
        <aside class="main">
            <header>
                <div div class="logo" id="logo">
                    <h2>PAINEL ADMIN | SEARCH HOTELS</h2>
                </div>
                <div class="nav">
                    <ul>
                        <li>
                            <a href="#">Notificações</a>
                        </li>
                        <li>
                            <a href="#">Configurações</a>
                        </li>
                        <li>
                            <a href="../controllers/logout.php">Sair</a>
                        </li>
                    </ul>
                </div>
            </header>

            <main class="dashboard">
                <div class="container-dash">
                    <div class="novos-usuarios">
                        <div class="title-user">
                            <h2>Últimos usuários cadastrados</h2>
                        </div>
                        <div>
                            <table id="table-usuarios" class="table-usuarios"></table>
                        </div>
                    </div>
                    <div class="hotel-paises">
                        <div class="hotel-famosos">
                            <div>
                                <h2>Hotéis + selecionados</h2>
                            </div>
                            <div>
                                <table id="table-hotel" class="table-hotel">
                                    <!-- <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>CNPJ</th>
                                            <th>Data de Cadastro</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Pax hotel</td>
                                            <td>12.345.678/0001-90</td>
                                            <td>01/05/2023</td>
                                        </tr>
                                        <tr>
                                            <td>Test hotel</td>
                                            <td>12.345.678/0001-90</td>
                                            <td>01/05/2023</td>
                                        </tr>
                                        <tr>
                                            <td>Teste hotel</td>
                                            <td>12.345.678/0001-90</td>
                                            <td>01/05/2023</td>
                                        </tr>
                                        <tr>
                                            <td>Hello hotel</td>
                                            <td>12.345.678/0001-90</td>
                                            <td>01/05/2023</td>
                                        </tr>
                                        <tr>
                                            <td>Hi hotel</td>
                                            <td>12.345.678/0001-90</td>
                                            <td>01/05/2023</td>
                                        </tr>
                                    </tbody> -->
                                </table>
                            </div>
                        </div>
                        <div class="paises-famosos">
                            <div>
                                <h2>Países + selecionados</h2>
                            </div>
                            <div>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>País</th>
                                            <th>-</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Brasil</td>
                                            <td>78%</td>
                                        </tr>
                                        <tr>
                                            <td>EUA</td>
                                            <td>59%</td>
                                        </tr>
                                        <tr>
                                            <td>França</td>
                                            <td>36%</td>
                                        </tr>
                                        <tr>
                                            <td>Espanha</td>
                                            <td>24%</td>
                                        </tr>
                                        <tr>
                                            <td>Israel</td>
                                            <td>24%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </aside>
    </div>

    <script src="../../components/js/admin_painel.js"></script>
</body>
</html>