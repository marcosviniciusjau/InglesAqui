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
      <script type="text/javascript" src="\View\js\carrinho.js" defer></script>
    <link rel="stylesheet" href="\View\css\pagamento.css">
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <title>Inglês Aqui Carrinho</title>
    <link rel="icon" href="/View/Imagens/icon.png" type="image/icon type">
  </head>
  
<body>

<h1>Carrinho de Compras</h1>

<?php
if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {
    $somaTotal = 0;

    foreach ($_SESSION['carrinho'] as $index => $item) {
        echo '<div>';
        echo '<h3>Apostila ' . ($index + 1) . ':</h3>';
        
        echo '<p>Dados: ' . implode(', ', $item['dados']) . '</p>';
        
        $data=$item['dados'];
        
        $somaTotal += $item['soma'];
        
        echo '</div>';
    }

    echo '<h2>Soma Total: ' . $somaTotal . '</h2>';
    } else {
    echo '<p>O carrinho está vazio.</p>';
}

?>
<div class="container__form">
  
  <input type="hidden" data-soma="<?= $somaTotal ?>" name="somaTotal" value="<?= $somaTotal ?>" id="soma">
  <input type="hidden" data-soma="<?= $data ?>" name="somaTotal" value="<?= $data ?>" id="soma">
  <form method="POST" data-pagarmecheckout-form enctype="multipart/form-data" id="form_pagamento">

 <div class="row g-3">
            <div class="col-md-5">
              <label class="form-label">CPF</label>
           <select
              id="form-checkout__identificationType"
              class="form-select"
              name="document_type"
              data-pagarmecheckout-element="document_type">
           <option value="CPF">CPF</option>
           <option value="CNPJ">CNPJ</option>
           </select>
            </div>

           <div class="col-md-5" id="col">
            <label class="form-label">Número do Documento (CPF, CNPJ)</label>
             <input
                id="documentNumber"
                class="form-control"
                type="text"
                name="document"
                data-pagarmecheckout-element="number"
                placeholder="Número do jeito que está no documento"
                pattern="[0-9]{11,}"
                maxlength="11"
                minlength="11"
                oninput="validateNumericInput('documentNumber', 'documentNumberError')" 
                required
                >
             <span id="documentNumberError"></span>
             </div>
            </div>

          <div class="row g-3">
            <div class="col-md-5">
              <label  class="form-label">Nome Completo</label>
              <input
                class="form-control"
                type="text"
                name="name"
                data-pagarmecheckout-element="name"
                id="name"
                placeholder="Seu nome completo"
                required/>
          </div>

           <div class="col-md-5" id="col">
            <label  class="form-label">Email</label>
              <input
                class="form-control"
                name="email"
                id="email"
                type="email"
                data-pagarmecheckout-element="email"
                placeholder=" Seu e-mail para ficarmos amigos. 😁"
                required>
             </div>
             
            <div class="col-md-5">
               <label  class="form-label">Celular</label>
               <div id="phone_div">
                 <input
                    type="text"
                    class="form-control"
                    name="country_code"
                    data-pagarmecheckout-element="country_code" 
                    id="country_code" 
                    placeholder="BR +55"  
                    maxlength="2" 
                    minlenght="2"
                    oninput="validateNumericInput('country_code', 'phoneNumberErrors')"  
                    value="55">
                 <input
                    type="text"
                    class="form-control"
                    name="area_code"
                    placeholder="99"
                    data-pagarmecheckout-element="area_code"
                    id="area_code"
                    maxlength="2"
                    minlenght="2"
                    oninput="validateNumericInput('area_code', 'phoneNumberErrors')" 
                    >
                  <input
                    id="number"
                    class="form-control"
                    type="text"
                    name="number"
                    data-pagarmecheckout-element="number" 
                    placeholder="Número de telefone"
                    maxlength="13"
                    minlength="9"
                    oninput="validateNumericInput('number', 'phoneNumberErrors')" 
                    required>
         
              </div>
            <span id="phoneNumberErrors"/>
              </div>
            </div>
            <br>
               <p class="form-label">Seus dados estão seguros com <img src="https://files.readme.io/6e60e35-logo.svg" id="pagar_me"></p>
     <div class="row g-3">
        <div class="col-md-5">
          <label  class="form-label">CEP</label>
          <input
           class="form-control"
           name="country" 
           data-pagarmecheckout-element="country"
           value="BR"
           type="hidden">
          <input class="form-control" id="zip_code" type="text" name="zip_code" data-pagarmecheckout-element="zip_code"  placeholder="Seu CEP"  oninput="validateNumericInput('zip_code', 'zipCodeError')"  required> 
     <span id="zipCodeError">
      </div>

       <div class="col-md-5" id="col">
              <label class="form-label">Estado</label>
              <label class="form-label" id="city">Cidade</label>
              <div id="date">
                <input type="text" id="estado" placeholder="SP" class="form-control" name="state" data-pagarmecheckout-element="state"   maxlength="2" minlenght="2" required>
                <input type="text" id="cidade" class="form-control" placeholder="Sua cidade" name="city" data-pagarmecheckout-element="city" required>
             </div>
        </div>
        </div>
  
     <div class="row g-3" id="enderecos">
          <div class="col-md-5">
            <label  class="form-label">Endereço</label>
               <div id="phone_div">
                <input class="form-control" name="line_1" id="endereco" data-pagarmecheckout-element="line_1"  placeholder="Seu endereço"  required>
                  <input type="text" id="numero_casa" placeholder="N" class="form-control" name="numero_casa" data-pagarmecheckout-element="numero_casa"   maxlength="10" minlenght="1" required  oninput="validateNumericInput('numero_casa', 'numeroCasaError')" 
              >
              </div>
              <span id="enderecoError"></span>
              <span id="numeroCasaError"></span>
              </div>

           <div class="col-md-5" id="col">
            <label  class="form-label">Complemento</label>
              <input
                class="form-control"
                name="complemento"
                id="complemento"
                data-pagarmecheckout-element="complemento"
                placeholder="Complemento"
                >
             </div>
              </div>
            <div class="card" id="card-body">
      </div>
  <div id="app">
    <div>
    <p class="form-label">Seus dados estão seguros com <img src="https://files.readme.io/6ae63e9-small-Logo_DOCS.png" id="pagar_me"></p>
      
              <span id="errorBoleto"></span>
            <div id="pagamentos">
              <div class="cartao_icon">
                <input type="radio" id="checkbox" name="visibility" onclick="toggleVisibility('credit_card')" value="credit_card"> 
                <img src="View/Imagens/credit_card.svg" id="icones">
                <h1 class="form-label">Cartão de Crédito</h1>
            </div>
     <div class="cartao_icon">
                <input type="radio" id="checkbox" name="visibility" onclick="toggleVisibility('debit_card')" value="debit_card"> 
               <img src="View/Imagens/credit_card.svg" id="icones">
                <h1 class="form-label">Cartão de Débito</h1>
            </div>

            <div class="boleto_icon">
              <input type="radio" id="checkbox"  name="visibility" onclick="toggleVisibility('boleto')" value="boleto">    
               <img src="View/Imagens/boleto.png" id="icones" alt="iconGoodWare">
              <h1 class="form-label">Boleto</h1>
            </div>
  
            <div class="pix_icon">  
              <input type="radio" id="checkbox" name="visibility" onclick="toggleVisibility('pix')" value="pix">  
              <img src="View/Imagens/pix.svg" id="icones">
              <h1 class="form-label">Pix</h1>
            </div>
          </div>

    <div id="credit_card" class="hidden">
      <div class="row g-3">
        <div class="col-md-5">
            <label  class="form-label">Nome do Titular</label>
            <input class="form-control"
                type="text"
                name="holder-name"
                data-pagarmecheckout-element="holder_name"
                id="cardHolderName"
                placeholder="Seu nome brilhando no cartão."
                oninput="nameUppercase('holder_name')"
                required>
      </div>
        </div>
      <div class="row g-3">
        <div class="col-md-5">
            <label  class="form-label">Número do Cartão</label>
            <input
             id="cardNumber"
             class="form-control"
            type="text" name="card-number" data-pagarmecheckout-element="number"
            placeholder="Número do jeito que está no cartão" pattern="[0-9]{16,}" title="Informe um número de cartão válido com 16 digitos"  maxlength="16" minlength="16" oninput="validateNumericInput('cardNumber', 'cardNumberError')" >
            <span id="cardNumberError"></span>
      </div>

        <div class="col-md-5" id="col">
              <label  class="form-label">Data de Expiração</label>
              <div id="date">
                 <input type="text" class="form-control" name="card-exp-month" data-pagarmecheckout-element="exp_month" id="expMonth" placeholder="MM"  maxlength="2" minlenght="2"  oninput="validateNumericInput('expMonth', 'dateError')">
                 <input type="text" class="form-control" name="card-exp-year" data-pagarmecheckout-element="exp_year" id="expYear" placeholder="AA"  maxlength="2" minlength="2" oninput="validateNumericInput('expYear', 'dateError')">
             </div>
             
              <span id="dateError"></span> 
        </div>
        </div>

          <div class="row g-3">
            <div class="col-md-5">
                <label class="form-label">Escolha o número de parcelas:</label>
                <select id="installments" class="form-select">
                <option id="vista"> </option>
              </select>
              </div>

          <div class="col-sm-6" id="col">
              <label for="lastName" class="form-label">CVV</label>
              <input  class="form-control" id="cvv" name="cvv" data-pagarmecheckout-element="cvv" placeholder="CVV" maxlength="4" minlength="3"  oninput="validateNumericInput('cvv', 'cvvError')">
              <span id="cvvError"></span>    
          </div>
          </div>
          <br>
        <h4>Valor Total da Compra: <span id="totalCompra"></span></h4>
        <button class="botao" type="submit" onClick="pagarCreditCard()">Pagar</button>
    </div>

     <div id="debit_card" class="hidden">
         <div class="row g-3">
        <div class="col-md-5">
            <label  class="form-label">Nome do Titular</label>
            <input class="form-control"
                type="text"
                name="holder-name-debit"
                data-pagarmecheckout-element="holder_name"
                id="cardHolderNameDebitCard"
                placeholder="Seu nome brilhando no cartão."
                oninput="nameUppercaseDebitCard('holder_name')"
                >
      </div>
        </div>
      <div class="row g-3">
        <div class="col-md-5">
            <label  class="form-label">Número do Cartão</label>
            <input id="cardNumberDebit"
             class="form-control"
              type="text"
               name="card-number-debit" data-pagarmecheckout-element="number"
            placeholder="Número do jeito que está no cartão" pattern="[0-9]{16,}" title="Informe um número de cartão válido com 16 digitos"  maxlength="16" minlength="16" oninput="validateNumericInputDebit('cardNumberDebit', 'cardNumberDebitError')" >
            <span id="cardNumberDebitError"></span>
      </div>

        <div class="col-md-5" id="col">
              <label  class="form-label">Data de Expiração</label>
              <div id="date">
                 <input type="text" class="form-control" name="card-exp-month-debit" data-pagarmecheckout-element="exp_month" id="expMonthDebit" placeholder="MM"  maxlength="2" minlenght="2"  oninput="validateNumericInputDebit('expMonthDebit', 'dateError')">
                 <input type="text" class="form-control" name="card-exp-year-debit" data-pagarmecheckout-element="exp_year" id="expYearDebit" placeholder="AA"  maxlength="2" minlength="2" oninput="validateNumericInputDebit('expYearDebit', 'dateErrorDebit')">
             </div>
             
              <span id="dateErrorDebit"></span> 
        </div>
        </div>

          <div class="row g-3">
          <div class="col-sm-6">
              <label for="lastName" class="form-label">CVV</label>
              <input  class="form-control" id="cvvDebit" name="cvv-debit" data-pagarmecheckout-element="cvv" placeholder="CVV" maxlength="4" minlength="3"  oninput="validateNumericInputDebit('cvvDebit', 'cvvErrorDebit')">
              <span id="cvvErrorDebit"></span>    
          </div>
          </div>
         <h4>Valor Total da Compra: <span id="totalCompraDebit"></span></h4>
        
        <button class="botao" type="submit" onClick="pagarDebitCard()">Pagar</button>
    
        </div>
 
    <div id="boleto" class="hidden row g-3">  
       <h1 id="boleto-card" class="form-label">🌍 Descomplicado: Simplificamos o processo. Basta imprimir e pagar, sem senhas complicadas.</h1>
      <h2 id="boleto-card" class="form-label">
       💸 Sem Surpresas: O boleto é como um mapa do tesouro transparente, mostrando exatamente seus investimentos sem taxas escondidas.
      </h2>    
      <h3 id="boleto-card" class="form-label">🤑 Boleto = Ticket Espacial: Pagar com boleto reserva seu lugar na viagem do conhecimento. Assim que confirmado, sua apostila é enviada diretamente para sua nave (ou e-mail).</h3>
      
          <br>
        <h4>Valor Total da Compra: <span id="totalCompraBoleto"></span></h4>
        
        <button class="botao" type="submit" onClick="pagarBoleto()">Gerar Boleto</button>
    </div>

    <div id="pix" class="hidden row g-3">
        <h1 id="boleto-card" class="form-label">⚡️ Instantâneo: PIX é como um relâmpago! Transações acontecem instantaneamente, sem demoras no caminho para a aprendizagem.</h1>
        <h2 id="boleto-card" class="form-label">🔒 Seguro e Eficiente: PIX é como a guarda costeira da segurança. Suas transações são protegidas.</h2>
        <h3 id="boleto-card" class="form-label">🌐 Conveniência Digital: Sem papel, sem impressão. PIX é o caminho digital, permitindo que você pague e aterrize no mundo das apostilas em inglês sem complicação.</h3>
        
          <br>
        <h4>Valor Total da Compra: <span id="totalCompraPix"></span></h4>

        <button class="botao" type="submit" onClick="pagarPix()">Gerar Pix</button>
    </div>
  </div>
      </form>
</div>

</body>
</html>
