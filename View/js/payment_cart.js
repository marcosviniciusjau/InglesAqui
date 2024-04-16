

function updateTotalPrice() {
  const totals = parseFloat(document.getElementById("totais").dataset.totais)
  console.log(totals)

  const select = document.getElementById("installments")
  select.innerHTML = ""


  const optionVista = document.createElement("option")
  optionVista.value = 1
  optionVista.textContent = "À vista - R$" + totals.toFixed(2)
  select.appendChild(optionVista)
  for (let i = 2; i <= 6; i++) {
    const option = document.createElement("option")
    option.value = i
    option.textContent = `${i}x R$ ${(totals / i).toFixed(2).replace('.', ',')}`
    select.appendChild(option)
  }
  // Atualiza o preço total na interface do usuário
  const totalPriceElement = document.getElementById('total_values');
  if (totalPriceElement) {
    totalPriceElement.textContent = `R$ ${totals.toFixed(2).replace('.', ',')}`;
  } else {
    console.error('Erro: Elemento do preço total não encontrado.');
  }
}
updateTotalPrice()
const select = document.getElementById("installments")
const expMonth = document.getElementById("expMonth").value
const expYear = document.getElementById("expYear").value
const cvv = document.getElementById("cvv").value
const zip_code= document.getElementById("zip_code").value
const nome = document.getElementById("nome").value

document.getElementById("cardHolderName").addEventListener("input",nameUppercase)

function nameUppercase(){
  const inputElement = document.getElementById("cardHolderName")
  uppercase = document.getElementById("cardHolderName").value.toUpperCase()
  inputElement.value= uppercase

}
function nameUppercaseDebitCard() {
  const inputElement = document.getElementById("cardHolderNameDebitCard")
  uppercase = document
    .getElementById("cardHolderNameDebitCard")
    .value.toUpperCase()
  inputElement.value = uppercase
}

function validateNumericInput(inputId, errorId) {
  const inputElement = document.getElementById(inputId)
  const inputValue = inputElement.value
  const numericValue = inputValue.replace(/[^0-9]/g, "")

  inputElement.value = numericValue

  let errorElement = document.getElementById(errorId)
  if (inputValue !== numericValue) {
    errorElement.textContent = "Ops! Só números, por favor! 🚀"
  } else {
    errorElement.textContent = ""
  }
}
function validateNumericInputDebit(inputId, errorId) {
  const inputElement = document.getElementById(inputId)
  const inputValue = inputElement.value
  const numericValue = inputValue.replace(/[^0-9]/g, "")

  inputElement.value = numericValue

  let errorElement = document.getElementById(errorId)
  if (inputValue !== numericValue) {
    errorElement.textContent = "Ops! Só números, por favor! 🚀"
  } else {
    errorElement.textContent = ""
  }
}

function formatPhoneNumber(inputId) {
  let inputElement = document.getElementById(inputId)

  let formattedValue = inputElement.value.replace(/\D/g, "")

  if (formattedValue.length >= 9) {
    formattedValue = formattedValue.replace(/(\d{4,5})(\d{4})/, "$1-$2")
  }
  inputElement.value = formattedValue
}

function toggleVisibility(selectedElement,customPrice) {
  let elements = document.querySelectorAll("#credit_card, #debit_card, #boleto, #pix")

  elements.forEach(function (element) {
    if (element.id === selectedElement) {
      element.classList.remove("hidden")
    } else {
      element.classList.add("hidden")
    }
  })
   let elementsBoleto = document.querySelectorAll("#boleto,.boleto_icon")
   let errorBoleto = document.getElementById("errorBoleto")
   elementsBoleto.forEach(function (elementBoleto) {
     if (customPrice > 40) {
       elementBoleto.classList.remove("hidden")
     } else {
       elementBoleto.classList.add("hidden")
       errorBoleto.textContent =
         "Ops! Devido a politíca do Melhor Envio só fretes a partir de R$ 40,00 são permitidos para boletos! 🚀"
     }
   })

}

function consultaCEP() {
  let cep = document.getElementById("zip_code").value

  cep = cep.replace(/\D/g, "")

  if (cep.length === 8) {
    let url = "https://viacep.com.br/ws/" + cep + "/json/"

    let xhr = new XMLHttpRequest()
    xhr.open("GET", url, true)

    xhr.onload = function () {
      if (xhr.status === 200) {
        let endereco = JSON.parse(xhr.responseText)

        document.getElementById("endereco").value =
          endereco.logradouro + " ," + endereco.bairro
        document.getElementById("cidade").value = endereco.localidade
        document.getElementById("estado").value = endereco.uf

      } 
      
     else {
        alert("Erro ao consultar o CEP. Verifique se o CEP é válido.")
      }
    }

    xhr.send()
  } 
}

function address(){
  
 let errorElement = document.getElementById("enderecoError")
  if(document.getElementById("endereco").value === " ,"){
   errorElement.textContent = "Preencha o endereço corretamente, com o nome da rua e bairro para chegar tudo certinho! 🚀"
  } 

else{
    let cep_correio = document.getElementById("zip_code").value

    let formData = new FormData()
    formData.append("zip_code", cep_correio)

    let xhr = new XMLHttpRequest()
    xhr.open("POST", "server.php", true)
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        let response = JSON.parse(xhr.responseText)
        updateCard(response)
      }
    }

    xhr.send(formData)
  }

}

document.getElementById("zip_code").addEventListener("input", consultaCEP)

document.getElementById("numero_casa").addEventListener("input", address)

function updateCard(data) {
  let cardBody = document.getElementById("card-body")
  cardBody.innerHTML = ""

  if (Array.isArray(data)) {
    for (let i = 0; i < data.length; i++) {
      let option = data[i]

      if (
        option &&
        option.name &&
        option.price &&
        option.company.name === "Correios"
      ) {
        let cardElement = document.createElement("div")
        cardElement.className = "card"
        cardElement.dataset.optionName = option.name

         let idElement = document.createElement("p")
         idElement.className = "card-text"
         idElement.textContent= option.id
         idElement.value = option.id  

        let inputRadio = document.createElement("input")
        inputRadio.type = "radio"
        inputRadio.name = "transportadoras"
        inputRadio.id = "radio"

        let customPrice = price

        let customPriceElement = document.createElement("h1")
        customPriceElement.className = "card-text"
        customPriceElement.id = "texto"
        customPriceElement.textContent = "Preço: R$ " + customPrice.toFixed(2)

        let imgElement = document.createElement("img")
        imgElement.src = option.company.picture

        let nameElement = document.createElement("h2")
        nameElement.className = "card-title"
        nameElement.id = "titulo"
        nameElement.textContent = "Modo de envio: " + option.name

        let deliveryElement = document.createElement("h3")
        deliveryElement.className = "card-text"
        deliveryElement.id = "texto"
        deliveryElement.textContent =
          "Tempo de entrega: " + option.custom_delivery_time + " dias"

        cardElement.appendChild(inputRadio)
        cardElement.appendChild(imgElement)
        cardElement.appendChild(nameElement)
        cardElement.appendChild(idElement)
        cardElement.appendChild(customPriceElement)
        cardElement.appendChild(deliveryElement)
        cardBody.appendChild(cardElement)
        

        cardElement.addEventListener("click", function () {
          handleOptionSelection(option.name, customPrice)
        })
      } else if (option && option.error) {
        let errorElement = document.createElement("div")
        cardBody.appendChild(errorElement)
      }
    }
  } else {
    console.error("Os dados fornecidos não contêm a estrutura esperada.")
  }
}

function pagarCreditCard() {
  const form = document.getElementById("form_pagamento")
  
   const idSpan = document.getElementById("id")

   const idInput = document.createElement("input")
   idInput.type = "hidden"
   idInput.name = "id"
   idInput.value = idSpan.idElement
   form.appendChild(idInput)

    form.action = "/pagamento/credit_card"
    form.submit()

}

function pagarDebitCard() {
  const form = document.getElementById("form_pagamento")
  const totalCompraDebitSpan = document.getElementById("totalCompraDebit")

    const totalCompraDebitInput = document.createElement("input")
    totalCompraDebitInput.type = "hidden"
    totalCompraDebitInput.name = "totalCompraDebit" 
    totalCompraDebitInput.value = totalCompraDebitSpan.textContent.trim() 
    form.appendChild(totalCompraDebitInput)

    form.action = "/pagamento/debit_card"
    form.submit()

    form.removeChild(totalCompraDebitInput)
 
}


function pagarBoleto() {
 const form = document.getElementById("form_pagamento")
 const totalCompraBoletoSpan = document.getElementById("totalCompraBoleto")

 const totalCompraInputBoleto = document.createElement("input")
 totalCompraInputBoleto.type = "hidden"
 totalCompraInputBoleto.name = "totalCompraBoleto"
 totalCompraInputBoleto.value = totalCompraBoletoSpan.textContent.trim()
 form.appendChild(totalCompraInputBoleto)

 form.action = "/pagamento/boleto"
 form.submit()

 form.removeChild(totalCompraInputBoleto)
 

}

function pagarPix() {
const form = document.getElementById("form_pagamento")
const totalCompraPixSpan = document.getElementById("totalCompraPix")

const totalCompraInputPix = document.createElement("input")
totalCompraInputPix.type = "hidden"
totalCompraInputPix.name = "totalCompraPix"
totalCompraInputPix.value = totalCompraPixSpan.textContent.trim()
form.appendChild(totalCompraInputPix)

form.action = "/pagamento/pix"
form.submit()

form.removeChild(totalCompraInputPix)
 


}
