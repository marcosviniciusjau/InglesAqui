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
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
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
              <label  class="form-label">CPF</label>
           <select id="form-checkout__identificationType" class="form-select" >
           <option>CPF</option>
           <option>CNPJ</option>
           </select>
            </div>

           <div class="col-md-5" id="col">
            <label  class="form-label">Número do Documento (CPF, CNPJ)</label>
             <input id="cardNumber" class="form-control" type="text" name="card-number" data-pagarmecheckout-element="number"
             placeholder="Número do jeito que está no documento" pattern="[0-9]{11,}" title="Informe um número de documento válido com 11 digitos" required maxlength="11" minlength="11" oninput="validateNumericInput('cardNumber', 'cardNumberError')">
             <span id="cardNumberError"></span>
             </div>
            </div>

          <div class="row g-3">
            <div class="col-md-5">
              <label  class="form-label">Nome do Titular</label>
              <input class="form-control" type="text" name="holder-name" data-pagarmecheckout-element="holder_name" id="cardHolderName" placeholder="Seu nome brilhando no cartão." required/>
              
          </div>
          <div class="row g-3">
            <div class="col-md-5" id="pagamentos">
            <div class="cartao" v-on:click="item.credit_card=!item.credit_card">
            <ion-icon name="card-outline" id="icones"></ion-icon>
            <h1 class="form-label">Cartão</h1>
            </div>
            <div class="boleto" v-on:click="item.boleto=!item.boleto">
            <ion-icon name="barcode-outline" id="icones"></ion-icon>
            <h1 class="form-label">Boleto</h1>
            </div>
            <div class="pix" v-on:click="item.pix=!item.pix">
            <img src="View/Imagens/pix.svg" id="icones">
            <h1 class="form-label">Pix</h1>
            </div>
          </div>
         <div id="credit_card" v-show="item.credit_card">
          <div class="row g-3">
            <div class="col-md-5">
              <label  class="form-label">Número do Cartão</label>
             <input id="cardNumber" class="form-control" type="text" name="card-number" data-pagarmecheckout-element="number"
             placeholder="Número do jeito que está no cartão" pattern="[0-9]{16,}" title="Informe um número de cartão válido com 16 digitos" required maxlength="16" minlength="16" oninput="validateNumericInput('cardNumber', 'cardNumberError')">
             <span id="cardNumberError"></span>
          </div>
           <div class="row g-3">
            <div class="col-md-5">
                <label  class="form-label">Data de Expiração</label>
              <div id="date">
                 <input type="text" class="form-control" name="card-exp-month" data-pagarmecheckout-element="exp_month" id="expMonth" placeholder="MM" required maxlength="2" minlenght="2">

                 <input type="text" class="form-control" name="card-exp-year" data-pagarmecheckout-element="exp_year" id="expYear" placeholder="AA" required maxlength="2" minlength="2" >
                 
                 </div>    
              </div>

          <div class="col-md-5" id="col">
            <label  class="form-label">CVV</label>
             <input  class="form-control" id="cvv" name="cvv" data-pagarmecheckout-element="cvv" placeholder="O código secreto atrás do cartão 🤐" maxlength="3" minlength="3" required oninput="validateNumericInput('cvv', 'cvvError')">
             
             <span id="cvvError"></span>

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
              <input class="form-control" name="email"  id="email" type="email" data-pagarmecheckout-element="email"  placeholder=" Seu e-mail para ficarmos amigos. 😁" required >
             </div>
            </div>
            </div>
            <div id="boleto">
            <h1 id="boleto-card" class="form-label">🌍 Descomplicado: Simplificamos o processo. Basta imprimir e pagar, sem senhas complicadas.</h1>
            <h2 id="boleto-card" class="form-label">
            💸 Sem Surpresas: O boleto é como um mapa do tesouro transparente, mostrando exatamente seus investimentos sem taxas escondidas.
            </h2>
            <h3 id="boleto-card" class="form-label">🤑 Boleto = Ticket Espacial: Pagar com boleto reserva seu lugar na viagem do conhecimento. Assim que confirmado, sua apostila é enviada diretamente para sua nave (ou e-mail).</h3>
            </div>

            <div id="pix">
            <h1 id="boleto-card" class="form-label">⚡️ Instantâneo: PIX é como um relâmpago! Transações acontecem instantaneamente, sem demoras no caminho para a aprendizagem.
            <h2 id="boleto-card" class="form-label">🔒 Seguro e Eficiente: PIX é como a guarda costeira da segurança. Suas transações são protegidas.</h2>
            <h3 id="boleto-card" class="form-label">🌐 Conveniência Digital: Sem papel, sem impressão. PIX é o caminho digital, permitindo que você pague e aterrize no mundo das apostilas em inglês sem complicação.</h3>
            </div>

            <input type="hidden" name="id" value="<?= $model->id ?>">
            <input type="hidden" name="nome" value="<?= $model->nome ?>">
            <input type="hidden" name="valor" value="<?= $model->valor ?>">

   <button class="botao" type="submit">Pagar</button>
      </form>
  

  </div>


</div>
</div>
</main>
</body>
</html>