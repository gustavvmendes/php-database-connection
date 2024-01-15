<?php
session_start();
include('config-usuario.php');

// Verifica se o usuário está logado
if (!isset($_SESSION['username'])) {
    // Se não estiver logado, redireciona para a página de login
    header("Location: login.php");
    exit(); 
}

// Verifica se o botão de logout foi clicado
if (isset($_POST['logout'])) {
    
    session_destroy();
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <title>Produtos</title>
    <link rel="stylesheet" href="style.css" />
  </head>

  <body>

  <style></style>
    <header>
      <nav>
        <a class="logo" href="/">Roupas</a>
        <div class="mobile-menu">
          <div class="line1"></div>
          <div class="line2"></div>
          <div class="line3"></div>
        </div>
        <ul class="nav-list">
          <li><a href="#">Início</a></li>
          <li><a href="#">Sobre</a></li>
          <li><a href="#">Projetos</a></li>
          <li><a href="#">Contato</a></li>
          <li><a href="#">Backup</a></li>
          <li><a href="logout.php" class="logout-btn">Logout</a></li>
  
        </ul>
      </nav>
    </header>
   

    <h2 class="font1 principal-title">Produtos</h2>

    <div class="div-block-1">

    <?php
     $idVestidoFloral = "1";
     $idBlusaListrada = "2";
     $idCalçaJeans = "3";
     $idSaia = "4";
     $idCamisetaBasica = "5";
     $idJaquetaCouro = "6";
     $idSapatilhaPreta = "7";
     $idVestidoAmarelo = "8";
     $idOculosSol = "9";
     $idVestidoEstampado = "10";

    ?>

      <a href="confirma-compra.php?id=<?php echo $idVestidoFloral; ?>" class="product-home">
      <div class="around-product">
        <img class="images-home" src="images/vestido6-min.jpg" loading="lazy">
        <h3 class="title-imovel-home font1">Vestido Floral</h3>
      </div>
    </a>

    <a href="confirma-compra.php?id=<?php echo $idBlusaListrada; ?>" class="product-home">
      <div class="around-product">
        <img class="images-home" src="images/blusa-listrada-min.jpg" loading="lazy">
        <h3 class="title-imovel-home font1">Blusa Listrada</h3>
      </div>
    </a>

    <a href="confirma-compra.php?id=<?php echo $idCalçaJeans; ?>" class="product-home">
      <div class="around-product">
        <img class="images-home" src="images/calca-jeans-min.jpg" loading="lazy">
        <h3 class="title-imovel-home font1">Calça Jeans</h3>
      </div>
    </a>

    </div>

    <div class="div-block-1">

        <a href="confirma-compra.php?id=<?php echo $idSaia; ?>" class="product-home">
        <div class="around-product">
          <img class="images-home" src="images/saia-min.jpg" loading="lazy">
          <h3 class="title-imovel-home font1">Saia</h3>
        </div>
      </a>
  
      <a href="confirma-compra.php?id=<?php echo $idCamisetaBasica; ?>" class="product-home">
        <div class="around-product">
          <img class="images-home" src="images/camiseta-basica-min.jpg" loading="lazy">
          <h3 class="title-imovel-home font1">Camiseta Básica</h3>
        </div>
      </a>
  
      <a href="confirma-compra.php?id=<?php echo $idJaquetaCouro; ?>" class="product-home">
        <div class="around-product">
          <img class="images-home" src="images/jaqueta-couro-min.jpg" loading="lazy">
          <h3 class="title-imovel-home font1">Jaqueta de couro</h3>
        </div>
      </a>

 
      </div>


      <div class="div-block-1">

        <a href="confirma-compra.php?id=<?php echo $idSapatilhaPreta; ?>" class="product-home">
        <div class="around-product">
          <img class="images-home" src="images/sapatilha-preta-min.jpg" loading="lazy">
          <h3 class="title-imovel-home font1">Sapatilha Preta</h3>
        </div>
      </a>
  
      <a href="confirma-compra.php?id=<?php echo $idVestidoAmarelo; ?>" class="product-home">
        <div class="around-product">
          <img class="images-home" src="images/vestidoamarelo-min.jpg" loading="lazy">
          <h3 class="title-imovel-home font1">Vestido Amarelo</h3>
        </div>
      </a>
  
      <a href="confirma-compra.php?id=<?php echo $idOculosSol; ?>" class="product-home">
        <div class="around-product">
          <img class="images-home" src="images/oculosdesol-min.jpg" loading="lazy">
          <h3 class="title-imovel-home font1">Óculos de Sol</h3>
        </div>
      </a>
 
      </div>


      <div class="div-block-1">

        <a href="confirma-compra.php?id=<?php echo $idVestidoEstampado; ?>" class="product-home">
        <div class="around-product">
          <img class="images-home" src="images/vestido4-min.jpg" loading="lazy">
          <h3 class="title-imovel-home font1">Vestido Estampado</h3>
        </div>
      </a>
  
      </div>

    <div class="div-rodape1">

      <div>
        <a class="div-block-4 logo" href="/">Roupas</a>
      </div>

      <div class="item-rodape">
        <a class="div-block-5" href="/">Início</a>
        <a class="div-block-5" href="/">Sobre</a>
        <a class="div-block-5" href="/">Projeto</a>
      </div>

    </div>

    <script src="web-script.js"></script>
  </body>
</html>

