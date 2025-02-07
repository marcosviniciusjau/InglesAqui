const id= document.getElementById("id").dataset.id

document.getElementById('form_quantity').addEventListener('submit', function(event) {
  event.preventDefault(); 
  var selectedOption = document.getElementById('selected_quantity').value;
  localStorage.setItem('selectedOption', selectedOption);
  href= "/pagamento?id=" + id
  window.location.href = href
});