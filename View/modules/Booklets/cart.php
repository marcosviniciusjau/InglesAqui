<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Forum&family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="\View\css\sucesso.css">
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


     <link rel="preconnect" href="https://fonts.googleapis.com">
    <title>Inglês Aqui Carrinho</title>
    <link rel="icon" href="/View/Imagens/icon.png" type="image/icon type">
  </head>
  
  <?php include PATH_VIEW . 'includes/cabecalho_home.php' ?>
<body>

<h1>Carrinho de Compras</h1>

<?php
if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {
    $somaTotal = 0;

    foreach ($_SESSION['carrinho'] as $index => $item) {
        echo '<div>';
        echo '<h3>Apostila ' . ($index + 1) . ':</h3>';
        
        echo '<p>Dados: ' . implode(', ', $item['dados']) . '</p>';
        
        
        $somaTotal += $item['soma'];
        
        echo '</div>';
    }

    echo '<h2>Soma Total: ' . $somaTotal . '</h2>';
    echo '<a href="/pagar_carrinho.php"><button class="botao" data-bs-toggle="modal" data-bs-target="#exampleModal">Comprar</button></a>';
} else {
    echo '<p>O carrinho está vazio.</p>';
}

?>

  <?php include PATH_VIEW . 'includes/rodape.php' ?>
</body>
</html>
