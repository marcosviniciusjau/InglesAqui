<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Forum&family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="\View\css\pagamento.css">
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script type="text/javascript" src="\View\js\pagamento.js" defer></script>

     <link rel="preconnect" href="https://fonts.googleapis.com">
    <title>Inglês Aqui Apostilas</title>
    <link rel="icon" href="/View/Imagens/icon.png" type="image/icon type">
  </head>
  <body>
    
<main>
  <?php include PATH_VIEW . 'includes/cabecalho_home.php' ?>
  <div class="container">
    <div class="d-md-flex flex-md-equal" id="division">
     <div id="contato">
        <div class="my">
          <img src="/View/Uploads/<?= $model->imagem ?>" width="150" height="200"/>
         </div>
      </div>
      <div id="sobre">
        <h2 id="titulo" class="display-5"> <?= $model->nome ?></h2>
        <p id="valor" data-valor="<?= $model->valor ?>">R$ <?=number_format($model->valor,2, ',', '.') ?></p>
       </div>
      
</div>
<div class="container__form">
  <form id="form-checkout">
   
          <div class="row g-3">
            <div class="col-md-5">
              <label  class="form-label">CPF</label>
           <select id="form-checkout__identificationType" class="form-select" ></select>
            </div>

            <div class="col-md-5" id="cpf">
              <label for="lastName" class="form-label">Número do CPF/CNPJ</label>
              <input id="form-checkout__identificationNumber"  class="form-control"  type="text" required/>    
            </div>

          <div class="row g-3">
            <div class="col-md-5">
              <label  class="form-label">Nome do Titular</label>
              <input id="form-checkout__cardholderName" class="form-control" type="text"  required/>
          </div>

          <div class="col-md-5" id="col">
            <label for="lastName" class="form-label">Número do Cartão</label>
             <div id="form-checkout__cardNumber"  class="form-control" type="text">
             </div>
            </div>

          <div class="row g-3" id="date">
            <div class="col-md-5">
              <label  class="form-label">Data de Expiração</label>
              <div id="form-checkout__expirationDate" class="form-control" type="text">
</div>
          </div>

          <div class="col-sm-6" id="col">
            <label for="lastName" class="form-label">CVV</label>
             <div id="form-checkout__securityCode"  class="form-control">
</div>
            </div>          
           
          <select id="form-checkout__issuer" class="form-select" name="issuer" ></select>

        <div class="row g-3">
          <div class="col-md-5">
            <label  class="form-label">Parcelas</label>
            <select id="form-checkout__installments" class="form-select" name="installments"></select>
        </div>

        <div class="col-sm-6" id="col">
            <label for="lastName" class="form-label">Email</label>
             <input id="form-checkout__cardholderEmail" class="form-control"  type="email"  required/> 
        </div> 

      <br>
      </form>
   <button class="botao" id="form-checkout__submit">Pagar</button>
  
<progress value="0" class="progress-bar">Carregando...</progress>
  
  </div>

<div class="container container__resultado">
  <div id="falha">
    <p>Alguma coisa deu errado!</p>
    <p id="compra-erro"></p>
</div>

</div>
</div>
</main>
</body>
</html>