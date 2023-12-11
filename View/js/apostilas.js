/// carrinho.js
document
  .querySelectorAll(".botao[data-botao='vermais']")
  .forEach(function (button) {
    button.addEventListener("click", function (event) {
      const apostila = event.target.dataset.campo.split(";");
      adicionarAoCarrinho(apostila);
    });
  });

function adicionarAoCarrinho(apostila) {
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "carrinho.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  const data = "apostila=" + JSON.stringify(apostila);

  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {

      if (xhr.status === 200) {
        window.location.href = "/apostilas/carrinho";
      } else {
        console.error("Erro na requisição AJAX");
      }
    }
  };

  xhr.send(data);
}
