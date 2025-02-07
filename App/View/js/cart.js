const quantityArray= []
document.addEventListener("DOMContentLoaded", function() {
  updateTotalPrice(); 
  
  document.querySelectorAll('.form-select').forEach(function(select) {
      select.addEventListener('change', function(event) {
          event.preventDefault(); 
          updateTotalPrice();
      });
  });
});
function updateTotalPrice() {

  quantityArray.length = 0
  let totalPrice = 0;
  
  document.querySelectorAll('.form-select').forEach(function(select) {
      const selectedQuantity = parseInt(select.value);
      const price = parseFloat(select.closest('.card-body').querySelector("#price").dataset.price);
      const name = select.closest('.card-body').querySelector("#texto").dataset.name;
      const img = select.closest('.card').querySelector("#image").dataset.img;
      const id = select.closest('.card').querySelector("#id").dataset.id;

      const itemTotalPrice = selectedQuantity * price;
      
      totalPrice += itemTotalPrice;
      
      quantityArray.push({ id: id,name: name, quantity: selectedQuantity, price:price, img:img });
     
  });
  
  const totalPrices = document.getElementById('total_values');
  totalPrices.textContent = "Total: R$" + totalPrice.toFixed(2);

  const quantityArrayJSON = JSON.stringify(quantityArray);
  document.getElementById('quantityArrayInput').value = quantityArrayJSON;
  updateCartQuantity();
}

function updateCartQuantity() {
  const cartQuantityElement = document.getElementById('cartQuantity');
  cartQuantityElement.textContent = quantityArray.length.toString();
}

document.getElementById('form_quantity').addEventListener('submit', function(event) {
  event.preventDefault();
  const quantityArrayJSON = JSON.stringify(quantityArray);
  document.getElementById('quantityArrayInput').value = quantityArrayJSON;
  this.submit();
});

