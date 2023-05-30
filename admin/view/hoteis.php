<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../icon_admin.ico" type="image/x-icon">
    
    <title>Painel Admin | Search Hotels</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../../components/css/painel/hoteis_painel.css">
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
                    <li>
                        <a href="./main.php">Dashboard</a>
                    </li>
                    <li>
                        <a href="./usuarios.php">Usuários</a>
                    </li>
                    <li>
                        <a href="./quartos.php">Quartos</a>
                    </li>
                    <li class="selected">
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
                    <div class="hotel-paises">
                        <div class="hotel-famosos">
                            <div>
                                <h2>Hotéis + selecionados</h2>
                            </div>
                            <div>
                                <table>
                                    <thead>
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