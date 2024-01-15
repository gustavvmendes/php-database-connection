<?php
session_start();
include('config-usuario.php');

function obterDataHoraAtual() {
    date_default_timezone_set('America/Sao_Paulo');
    $dataHoraAtual = date('Y-m-d H:i:s');
    return $dataHoraAtual;
}

// Verifica se o botão "Sim" foi clicado
$IdSql = $_GET['id'];

if (isset($_GET['confirm']) && $_GET['confirm'] === 'true') {
    try {

        $query = "UPDATE tb_produtos 
        SET pro_quantidade = pro_quantidade - 1 
        WHERE pro_codigo = $IdSql";

        $stmt = $pdo->prepare("SELECT MAX(ven_codigo) AS max_ven_codigo FROM tb_vendas;");
        $stmt->execute();
        $ven_codigo = $stmt->fetch(PDO::FETCH_ASSOC);

        $consulta_tb_prod = $pdo->prepare("SELECT pro_valor FROM tb_produtos WHERE pro_codigo = $IdSql;");
        $consulta_tb_prod->execute();
        $pro_valor = $consulta_tb_prod->fetch(PDO::FETCH_ASSOC);

        $valor_insert = $pro_valor['pro_valor'];
        $codigo_insert = $ven_codigo['max_ven_codigo'];
        $codigo_insert = $codigo_insert + 1;
        $codigo_funcionario = $_SESSION['fun_codigo1'];
        $dataHoraAtual = obterDataHoraAtual();

        $query2 = "INSERT INTO tb_vendas (ven_codigo, ven_horario, ven_valor_total, tb_funcionarios_fun_codigo)
        VALUES
        ($codigo_insert, '$dataHoraAtual', $valor_insert, $codigo_funcionario)";

        // Executar a consulta
        $result = pg_query($conn, $query);
        $result2 = pg_query($conn, $query2);

        
        // Verificar se a consulta foi bem-sucedida
        if (!$result || !$result2) {
            throw new Exception("Erro na consulta: " . pg_last_error());
        }

        pg_close($conn);

        // Redirecionar para a página de sucesso
        header("Location: sucesso-compra.php");
        exit();
    } catch (PDOException $e) {
        // Exibir mensagem de erro amigável para o usuário
        $errorMessage = "Desculpe, ocorreu um erro ao processar a sua solicitação. Seu usuário não tem permissão para acessar esta página.";
        // Aqui você pode personalizar $errorMessage conforme necessário
        die($errorMessage);
    } catch (Exception $e) {
        // Exibir mensagem de erro amigável para o usuário
        $errorMessage = "Desculpe, ocorreu um erro ao processar a sua solicitação. Seu usuário não tem permissão para acessar esta página.";
        // Aqui você pode personalizar $errorMessage conforme necessário
        die($errorMessage);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1ab94d0eba.js" crossorigin="anonymous"></script>
    <title>Confirma</title>
    <link rel="stylesheet" href="style-login.css"> 
    <style>
        .loggedUser {
            margin-bottom: 28px;
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

        .loadingIcon {
            color: #4CAF50;
            width: 58px;
            height: 58px;
            margin-bottom:28px;
        }

        .button-confirma {
            margin-top: 10px;
            padding: 10px;
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

.button-confirma:hover {
    letter-spacing: 0.5px;
    background: linear-gradient(to right, #4776E6, #8e54e9);
}
</style>

</head>
<body>



<main class="container" style="min-height: 30vh;">
    <h4 class="loggedUser">Usuário Logado: <?php echo $user; ?></h4>
    <svg xmlns="http://www.w3.org/2000/svg" class="loadingIcon" height="16" width="20" viewBox="0 0 640 512"><path d="M640 0V400c0 61.9-50.1 112-112 112c-61 0-110.5-48.7-112-109.3L48.4 502.9c-17.1 4.6-34.6-5.4-39.3-22.5s5.4-34.6 22.5-39.3L352 353.8V64c0-35.3 28.7-64 64-64H640zM576 400a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM23.1 207.7c-4.6-17.1 5.6-34.6 22.6-39.2l46.4-12.4 20.7 77.3c2.3 8.5 11.1 13.6 19.6 11.3l30.9-8.3c8.5-2.3 13.6-11.1 11.3-19.6l-20.7-77.3 46.4-12.4c17.1-4.6 34.6 5.6 39.2 22.6l41.4 154.5c4.6 17.1-5.6 34.6-22.6 39.2L103.7 384.9c-17.1 4.6-34.6-5.6-39.2-22.6L23.1 207.7z"/></svg>
    <h2 class="confirmaCompra">Confirmar compra?</h2>
    <div style="display: flex; flex-direction: column;">
        <a href="?id=<?php echo $_GET['id']; ?>&confirm=true" class="button-confirma">Sim</a>
        <a href="products.php" class="button-confirma">Cancelar</a>
    </div>
</main>
</body>
</html>
