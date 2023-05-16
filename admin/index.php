<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../icon_admin.ico" type="image/x-icon">
    
    <title>Painel Admin | LOGIN</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../components/css/painel/login_painel.css">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
</head>
<body>
    <div class="container">
        <form id="form_login" name="form_login" class="form_login" method="post" action="./index.php">
            <div class="agrupamento_login">
                <div class="top-al">
                    <div>
                        <img class="logo-search-hotel" src="../components/imgs/searchhotels.svg" alt="Search Hotels">
                    </div>
                    <div>
                        <h1>ADMIN</h1>
                    </div>
                </div>
                <div class="campos">
                    <div>
                        <label for="cpf">CPF</label>
                        <div>
                            <input type="text" id="cpf" name="cpf" required autofocus>
                        </div>
                        <div>
                            <label for="senha">SENHA</label>
                        </div>
                        <div>
                            <input type="password" name="senha" id="senha" required>
                        </div>
                        <div class="div-login">
                            <input type="submit" value="ENTRAR" name="entrar">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>