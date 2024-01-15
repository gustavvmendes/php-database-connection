<?php
include('config.php');

// Inicializa a variável de mensagem de erro
$loginError = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura os dados do formulário
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Conecta ao banco de dados
    try {
        // Utilize as variáveis corretas
        $pdo = new PDO($dsn);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Exemplo de consulta
        $stmt = $pdo->prepare("SELECT * FROM tb_funcionarios WHERE fun_nome = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verifica se o usuário existe e a senha está correta
        if ($user && $user['fun_senha'] === $password) {
            // Login bem-sucedido
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['fun_codigo1'] = $user['fun_codigo'];
            // Redireciona para a página products.php
            header("Location: products.php");
            exit(); // Certifique-se de encerrar o script após o redirecionamento
        } else {
            // Login falhou, define a mensagem de erro
            $loginError = "Login falhou. Verifique suas credenciais.";
        }

    } catch (PDOException $e) {
        // Em caso de erro na conexão ou consulta
        $loginError = "Erro na conexão: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1ab94d0eba.js" crossorigin="anonymous"></script>
    <title>Login Form</title>
    <link rel="stylesheet" href="style-login.css"> 
</head>
<body>
    <main class="container">
        <h2>Login</h2>

        <?php
        // Exibe a mensagem de erro, se existir
        if (!empty($loginError)) {
            echo "<p class='error-message'>$loginError</p>";
        }
        ?>

        <form action="processa-login.php" method="post">
            <div class="input-field">
                <input type="text" name="username" id="username" placeholder="Enter Your Username">
                <div class="underline"></div>
            </div>
            <div class="input-field">
                <input type="password" name="password" id="password" placeholder="Enter Your Password">
                <div class="underline"></div>
            </div>

            <input type="submit" value="Continue">
        </form>

    </main>
</body>
</html>
