<?php
// Informações do banco de dados
$host = "34.151.223.145";
$port = "5432";
$dbname = "postgres";
$user = "postgres";
$password = "db2123";

// String de conexão
$dsn = "pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password";
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
try {
    // Cria uma nova instância de PDO
    $pdo = new PDO($dsn);

    // Configura para lançar exceções em caso de erro
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



} catch (PDOException $e) {
    // Em caso de erro na conexão ou consulta
    echo "Erro na conexão: " . $e->getMessage();
}
?>
