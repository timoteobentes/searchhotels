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
                        <a href="./reservas.php">Reservas</a>
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
                    <aside class="form">
                        <form id="form_cadastro" name="form_cadastro" class="form_cadastro" method="post" action="../backend/usuario/controllers/adicionar.php">
                            <div class="agrupamento_cadastro">
                                <div class="campos">
                                    <div>
                                        <fieldset>
                                            <legend>Dados Gerais</legend>
                                            <div>
                                                <input type="text" id="nome" name="nome" placeholder="Nome" required autofocus>
                                            </div>  
                                            <div>
                                                <input type="text" name="cpf" id="cpf" oninput="formataCPF(this.value)" maxlength="14" placeholder="CPF" required>
                                            </div>
                                            <div>
                                                <input type="text" name="celular" id="celular" maxlength="15" oninput="formataCELULAR(this.value)" placeholder="Celular" required>
                                            </div>
                                            <div>
                                                <input type="email" name="email" oninput="formataEMAIL(this.value)" id="email" placeholder="E-mail" required>
                                            </div>
                                            <div>
                                                <textarea type="email" name="email" id="email" placeholder="Descrição" required></textarea>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <legend>Endereço</legend>
                                            <div>
                                                <input type="text" name="endereco_cep" oninput="formataCEP(this.value)" id="endereco_cep" placeholder="CEP" required>
                                            </div>
                                            <div>
                                                <input type="text" name="endereco_numero" id="endereco_numero" placeholder="Número" required>
                                            </div>
                                            <div>
                                                <input type="text" name="endereco_logradouro" id="endereco_logradouro" placeholder="Logradouro" required>
                                            </div>
                                            <div>
                                                <input type="text" name="endereco_bairro" id="endereco_bairro" placeholder="Bairro" required>
                                            </div>
                                            <div>
                                                <input type="text" name="endereco_cidade" id="endereco_cidade" placeholder="Cidade" required>
                                            </div>
                                            <div>
                                                <input type="text" name="endereco_estado" id="endereco_estado" placeholder="Estado" required>
                                            </div>
                                            <div>
                                                <input type="text" name="endereco_pais" id="endereco_pais" placeholder="País" required>
                                            </div>
                                        </fieldset>


                                        <div class="div-cadastrar">
                                            <input type="submit" value="CADASTRAR" name="entrar">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </aside>
                </div>
            </main>
        </aside>
    </div>

    <script src="../../components/js/admin_painel.js"></script>
</body>
</html>