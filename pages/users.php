<?php

   require '../backend/user_controller.php';
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/users.css">
    <script src="../scripts/users.js"></script>
    <title>Usuários Cadastrados</title>
</head>
<body>
    
    <div class="back">

        <?php if (isset($_GET['update']) && $_GET['update'] == 1) { ?>
            <div class='sucsses'>
                <p>Usuário atualizado com sucesso!</p>
            </div>
        <?php } ?>

        <?php if (isset($_GET['del']) && $_GET['del'] == 1) { ?>
            <div class='sucsses'>
                <p>Usuário deletado com sucesso!</p>
            </div>
        <?php } ?>
        
        <div class="box_edit">

        </div>

        <div class="title_users">
            <h1>Usuários Cadastrados</h1>
        </div>

        <div class="table_users">

            <div class="box_button">
                <button onclick="back()" class="back_button">Voltar</button>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th colspan="2">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $id => $user) { ?>
                        <tr id="user_<?=$user->id?>">
                            <td><?=$user->nome?></th>
                            <td><?=$user->email?></th>
                            <td>
                                <div onclick="edit(<?=$user->id?>, '<?=$user->nome?>', '<?=$user->email?>', '<?=$user->senha?>')" class="edit_icon icon"></div>  
                            </th>
                            <td>
                                <div onclick="del(<?=$user->id?>)" class="delete_icon icon"></div> 
                            </th>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
            
        </div>
    </div>
</body>
</html>