<?php

$host = "34.151.223.145";
$port = "5432";
$dbname = "postgres";
$user = $_SESSION['username'];;
$password = $_SESSION['password'];;

// String de conexão
$dsn = "pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password";
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
try {
    $pdo = new PDO($dsn);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  

} catch (PDOException $e) {

    echo "Erro na conexão: " . $e->getMessage();
}
?>
