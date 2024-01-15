<?php
session_start();
include('config-usuario.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1ab94d0eba.js" crossorigin="anonymous"></script>
    <title>Erro na Compra</title>
    <link rel="stylesheet" href="style-login.css">
    <style>
    body {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        margin: 0;
        background-color: #f2f2f2;
    }

    .loggedUser {
            margin-bottom: 32px;
        }

    .container {
        text-align: center;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        width: 360px;
        height: 360px;
    }

    .confirmText {
        margin-bottom: 45px;
    }

    .button-back {
        margin-top: 2rem;
        padding: 0.4rem;
        width: 100%;
        background: linear-gradient(to left, #4776E6, #8e54e9);
        cursor: pointer;
        color: white;
        font-size: 0.9rem;
        font-weight: 300;
        border-radius: 4px;
        transition: all 0.3s ease;
        text-align: center;
        text-decoration: unset;
    }

    .button-back:hover {
        letter-spacing: 0.5px;
        background: linear-gradient(to right, #4776E6, #8e54e9);
    }

    .error-icon {
        color: #a80000;
        font-size: 54px;
        margin-bottom: 32px;
    }
</style>

</head>
<body>

<div class="container">
    <h4 class="loggedUser">Usuário Logado: <?php echo $user; ?></h4>
    <i class="fas fa-times-circle error-icon"></i>
    <h2 class="confirmText">Desculpe, este produto está fora de estoque.</h2>
    <a href="products.php" class="button-back">Voltar para a página de produtos</a>
</div>

</body>
</html>
