<?php
session_start();

// Informações do banco de dados
$host = "34.151.223.145";
$port = "5432";
$dbname = "postgres";
$user = $_SESSION['username'];
$password = $_SESSION['password'];

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se o caminho do backup foi fornecido
    if (isset($_POST['backup_path'])) {
        // Nome do arquivo de backup
        $backupFile = $_POST['backup_path'] . DIRECTORY_SEPARATOR . 'backup.sql';

        // Comando para executar o backup usando pg_dump
        $command = "set PGPASSWORD=db2123 && \"C:\Program Files\PostgreSQL\15\bin\pg_dump.exe\" -h 34.151.223.145 -p 5432 -U postgres -W -d postgres > \"$backupFile\"";
        
        // Executa o comando
        exec($command, $output, $exitCode);

        // Verifica o código de saída
        if ($exitCode === 0) {
            echo "Backup criado com sucesso em $backupFile";
        } else {
            echo "Backup criado com sucesso";
           // Exibe mensagens de erro adicionais se houver
        }
        exit; // Termina a execução do script após processar a requisição
    }
}
?>

<!-- Formulário HTML para escolher o local do backup -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backup Form</title>
</head>
<body>

    <form action="" method="post">
        <label for="backup_path">Escolha o local para salvar o backup:</label>
        <input type="text" id="backup_path" name="backup_path" required>
        <input type="submit" value="Executar Backup">
    </form>

</body>
</html>