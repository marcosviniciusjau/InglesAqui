document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('selected_quantity').addEventListener('change', function(event) {
      event.preventDefault(); 
      const selectedQuantity = document.getElementById('selected_quantity').value;
      const preco = parseFloat(document.getElementById("price").dataset.price)
      const total= preco * selectedQuantity
      var totalPrices = document.getElementById('total_prices');
      if(selectedQuantity == 1){
        totalPrices.innerText= "Valor Total: R$" + preco
      }
      else if (totalPrices) {
          totalPrices.innerText= "Valor Total: R$" + total.toFixed(2);
            
      } else {
          console.error("Element with ID 'selected_option' not found.");
      }
    });
  });
     
function salvarCarrinhoNoCookie(carrinho) {
  let carrinhoJSON = JSON.stringify(carrinho);

  document.cookie = `carrinho=${carrinhoJSON}; expires=${getCookieExpiration()}; path=/`;
}

function getCookieExpiration() {
  let dataExpiracao = new Date();
  dataExpiracao.setDate(dataExpiracao.getDate() + 30);
  return dataExpiracao.toUTCString();
}

function addCart(id) {
  let carrinho = getCarrinhoFromCookie() || [];

  let itemJaAdicionado = carrinho.some(item => item.id === id);

  if (itemJaAdicionado) {
      alert('Item já foi adicionado ao carrinho');
  } else {
      carrinho.push({ id: id });

      salvarCarrinhoNoCookie(carrinho);

      window.location.href = '/apostilas/carrinho';
  }
}

function getCarrinhoFromCookie() {
  let cookies = document.cookie.split(';').map(cookie => cookie.trim());
  let carrinhoCookie = cookies.find(cookie => cookie.startsWith('carrinho='));

  if (carrinhoCookie) {
      return JSON.parse(carrinhoCookie.split('=')[1]);
  }

  return null;
}


function deleteCartItem(id) {
  const cookieValue = document.cookie
    .split("; ")
    .find((row) => row.startsWith('carrinho='));
  
  if (cookieValue) {
    const cartItems = JSON.parse(cookieValue.split("=")[1]);
    
    const updatedCartItems = cartItems.filter((item) => item.id !== id);

    if (updatedCartItems.length > 0) {
      document.cookie = `carrinho=${JSON.stringify(updatedCartItems)}; path=/`;
      document.getElementById("alert").style.display = "block";
      document.getElementById("alert").textContent = "Item removido com sucesso!";
      setTimeout(function(){ 
        document.getElementById("alert").style.display = "none"; 
        window.location.reload();
      }, 1000);
    } else {
      document.cookie = `carrinho=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/`;
      window.location.reload();
    }
  } else {
    console.warn("No carrinho cookie found.");
    window.location.reload();
  }
}
