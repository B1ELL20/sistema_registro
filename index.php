<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/index.css">
    <link rel="shortcut icon" href="./images/favicon.png" type="image/x-icon">
    <title>Cadastro de Usuários</title>
</head>
<body>

    <div class="back">

        <?php if (isset($_GET['insert']) && $_GET['insert'] == 'valid') { ?>

                <div class='sucsses'>
                    <p>Usuário cadastrado com sucesso!</p>
                </div>

        <?php } else if (isset($_GET['insert']) && $_GET['insert'] == 'email') { ?>

                <div class='error'>
                    <p>E-mail ja foi cadastrado. Tente outro por favor!</p>
                </div>

        <?php } else if (isset($_GET['insert']) && $_GET['insert'] == 'password') { ?>

            <div class='error'>
                <p>Senha muito curta! Deve conter no mínimo 6 caracteres.</p>
            </div>

        <?php } else if (isset($_GET['insert']) && $_GET['insert'] == 'invalid') { ?>

            <div class='error'>
                <p>Campos de cadastro inválidos!</p>
            </div>

        <?php } ?>


        <div class="login_box">
            <div class="welcome">
                <div class="text">
                    <h1>Sistema de Cadastro de Usuários</h1>
                    <p>Realize o cadastro ao lado, apenas informando o nome, e-mail e senha do usuário desejado. Simples, fácil e rápido!</p>
                    <button class="users_list" onclick={gotoUsers()}>Listar Usuários</button>
                </div>
            </div>
            <div class="register">
                <div class="form_users">
                    <h2>Cadastrar Usuário</h2>
                    <form method="post" action="./backend/user_controller.php?action=insert">
                        <div>
                            <input name="name" type="text" placeholder="Nome">
                            <input name="email" type="email" placeholder="E-mail">
                            <input name="password" type="password" placeholder="Senha">
                        </div>
                        <div>
                            <button class="button" type="submit">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script>

        function gotoUsers() {

            window.location.href = 'http://localhost/sistema_registro/pages/users.php?action=get'
        }

    </script>
</body>
</html>