<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Forum&family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
    <script type="text/javascript" src="\View\js\pagamento.js" defer></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="\View\css\pagamento.css">

     <link rel="preconnect" href="https://fonts.googleapis.com">
    <title><?= $model->nome ?></title>
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
  <form action="server.php" method="POST" data-pagarmecheckout-form>

          <div class="row g-3">
            <div class="col-md-5">
              <label  class="form-label">Nome do Titular</label>
              <input class="form-control" type="text" data-pagarmecheckout-element="cardHolderName"  id="cardHolderName" placeholder="Seu nome brilhando no cartão." required/>
          </div>

          <div class="col-md-5" id="col">
            <label  class="form-label">Número do Cartão</label>
             <input id="cardNumber" class="form-control" type="text" data-pagarmecheckout-element="cardNumber" 
             placeholder="Número do jeito que está no cartão" pattern="[0-9]{16,}" title="Informe um número de cartão válido com 16 digitos" required maxlength="16" >
             </div>
            </div>

           <div class="row g-3">
            <div class="col-md-5">
                <label  class="form-label">Data de Expiração</label>
              <div id="date">
                 <input type="text" class="form-control" name="card-exp-month" data-pagarmecheckout-element="expMonth" id="expMonth" placeholder="MM" required maxlength="2" >

                 <input type="text" class="form-control" name="card-exp-year" data-pagarmecheckout-element="expYear" id="expYear" placeholder="AA" required maxlength="2" >
                 </div>    
              </div>

          <div class="col-md-5" id="col">
            <label  class="form-label">CVV</label>
             <input  class="form-control" id="cvv" data-pagarmecheckout-element="cvv" placeholder="O código secreto atrás do cartão 🤐" maxlength="3" required>
             </div>
            </div>

          <div class="row g-3" id="parcelas">
            <div class="col-md-5">
            <label class="form-label">Escolha o número de parcelas:</label>
              <select id="installments" class="form-select" required>
                <option value="1">À vista- R$ <?=number_format($model->valor,2, ',', '.') ?> </option>
              </select>
              </div>
        <div class="col-md-5" id="col">
            <label  class="form-label">Email</label>
              <input class="form-control" id="email" type="email" data-pagarmecheckout-element="email"  placeholder=" Seu e-mail para ficarmos amigos. 😁" required >
           
             </div>
            </div>


   <button class="botao" type="submit">Pagar</button>
      </form>
  

  </div>


</div>
</div>
</main>
</body>
<script src="https://checkout.pagar.me/v1/tokenizecard.js"
        data-pagarmecheckout-app-id="">
    </script>
</html>