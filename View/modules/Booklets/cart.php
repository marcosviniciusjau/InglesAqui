<?php
session_start();
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Inglês Aqui- Carrinho</title>
    <link rel="icon" href="/View/Images/Home/icon.webp" type="image/icon type">
    <link rel="stylesheet" href="/View/css/success.css">
    <link rel="stylesheet" href="/View/css/cart.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    
    <script src="/View/js/cart.js"></script>
   <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  </head>
  <body>
  
    <?php include PATH_VIEW . '/includes/header_booklets.php' ?>
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
        <p class="card-text" id="id" data-id="<?= $item->id ?>" value="<?= $item->id ?>"></p>
      
   
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
        <input type="hidden" id="quantityArrayInput" name="quantityArray">

        <button class="botao" type="submit">Comprar</button></a>
    </form>
  </div>
  <?php include PATH_VIEW . 'includes/footer.php' ?>
</body>
</html>
