<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br>
    <div class='container'>
        <div class='jumbotron'>
            <?php
            if (isset($_SESSION['is_logged']))
            {   ?>
                <h2>Bem-vindo ao Sistema de Gestão de Alocação de Salas
                <?php
                    echo $_SESSION['user_name'];
                ?>
                !</h2>
            <?php
            }
            else
            {   ?>
                <h2>Bem-vindo ao Sistema de Gestão de Alocação de Salas!</h2>
                <h4>Cadastre-se ou faça login para utilizar o sistema!</h4>
            <?php
            }
            ?>
        </div>
    </div>
</body>
</html>