<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Forum&family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="\View\css\pix.css">
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


     <link rel="preconnect" href="https://fonts.googleapis.com">
    <title>Inglês Aqui Pagamento de Boleto</title>
    <link rel="icon" href="/View/Imagens/icon.png" type="image/icon type">
  </head>
  
  <?php include PATH_VIEW . 'includes/cabecalho_home.php' ?>
  <body>
    
<main>
  <div class="container">
  <ion-icon name="book-outline"></ion-icon>
  <h1 class="title"> <p>Visualize o seu boleto aqui!</p></h1>
  <a href="<?=$model?>">Clique aqui</a>
<br>
<h2 class="valor"> Ou digite daqui mesmo o codigo de barras:</h2>
<p class="valor"><?=$id?></p>
<h3>Assim o pagamento foi confirmado será enviado um email com detalhes do envio!</p>

</div>
</main>
</body>

  <?php include PATH_VIEW . 'includes/rodape.php' ?>
  <html>