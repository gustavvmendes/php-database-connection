<?php
include('config.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1ab94d0eba.js" crossorigin="anonymous"></script>
    <title>Login Form</title>
    <link rel="stylesheet" href="style-login.css"> 
    <style>
        .input-field {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
</head>
<body>
    <main class="container">
        <h2>Login</h2>
        <form action="processa-login.php" method="post">
            <div class="input-field">
                <input type="text" name="username" id="username" placeholder="Digite seu usuário">
                <div class="underline"></div>
            </div>
            <div class="input-field">
                <input type="password" name="password" id="password" placeholder="Digite sua senha">
                <i class="fas fa-eye toggle-password" onclick="togglePassword('password')"></i>
                <div class="underline"></div>
            </div>
            <input type="submit" value="Continue">
        </form>
    </main>

    <script>
        function togglePassword(fieldId) {
            var passwordField = document.getElementById(fieldId);
            var type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
        }
    </script>
</body>
</html>
