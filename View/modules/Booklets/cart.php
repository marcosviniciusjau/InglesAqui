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
    <link rel="stylesheet" href="\View\css\cart.css">

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


     <link rel="preconnect" href="https://fonts.googleapis.com">
    <title>Inglês Aqui Carrinho</title>
    <link rel="icon" href="/View/Imagens/icon.png" type="image/icon type">
  </head>
  
  <?php include PATH_VIEW . 'includes/header_home.php' ?>
<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
   
<h1>Carrinho de Compras</h1>
<div class="alert alert-success" role="alert" id="alert">
</div>
<div class="container ">
    <div class="row">
    <?php foreach($model->rows as $item): ?>
      <div class="col">
  <div class="thumbnail">  
  <div class="card" style="width: 10rem;">
   <img  src="/View/Uploads/<?= $item->image ?>" class="card" id="image" data-img="<?= $item->image ?>" width="50%" height="50%">

   <form id="form_quantity" method="post" action="/apostilas/carrinho/pagamento">
      <div class="card-body">
        <input type="hidden" name="id" value="<?= $item->id ?>">
   
      <h1 class="card-title" id="texto" data-name="<?= $item->name ?>" value="<?= $item->name ?>"><?= $item->name ?></h1>
      <div class="row g-3">
          <select class="form-select" id="selected_quantity">
            <option value="1" >1</option>
            <option value="2">2</option>
            <option value="3 ">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option> 
          </select>
        </div>
        <p class="card-text" id="price" data-price="<?= $item->price ?>" value="<?= $item->price ?>">  R$ <?=number_format($item->price,2, ',', '.') ?></p>
      </div>

     <td><a class='btn btn-sm btn-danger' onClick="window.location.href='/apostilas/carrinho/excluir?id=<?= $item->id ?>'">
              <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z' />
                <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z' />
              </svg>
            </a></td>
  </div>

  </div> 
   
      </div>
      <?php endforeach ?>
      </div>
      
      <p id="total_values" class="prices"></p>
        <button class="botao" type="submit">Comprar</button></a>
    </form>
  </div>
  <?php include PATH_VIEW . 'includes/footer.php' ?>
</body>
</html>
<script>
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

        const itemTotalPrice = selectedQuantity * price;
        
        totalPrice += itemTotalPrice;
        
        quantityArray.push({ id: name, quantity: selectedQuantity, price:price, img:img });
        console.log(quantityArray)
    });
    
    const totalPrices = document.getElementById('total_values');
    totalPrices.textContent = "Total: R$" + totalPrice.toFixed(2);
}

document.getElementById('form_quantity').addEventListener('submit', function(event) {
        event.preventDefault();
        const quantityArrayJSON = JSON.stringify(quantityArray);

     
        localStorage.setItem('quantityArray', JSON.stringify(quantityArray))

        href= "/apostilas/carrinho/pagamento"
        window.location.href = href
});
      

</script>