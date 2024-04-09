
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/View/Images/Home/icon.webp" type="image/icon type">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
   <link rel="stylesheet" href="\View\css\booklets_desc.css">
    <script type="text/javascript" src="\View\js\booklets_desc.js" defer></script>

    <title><?= $model->nome ?></title>
   </head>
  <body>
  <?php include PATH_VIEW . 'includes/header_home.php' ?>

    <br>
    <br>
    <div class="d-md-flex flex-md-equal">
      <div id="contato">
        <div class="my">
          <img src="/View/Uploads/<?= $model->image ?>" width="250" height="450"/>
         </div>
      </div>

      <div id="sobre">
        <input type="hidden" id="id" value="<?= $model->id ?>" name="id" data-id="<?= $model->id ?>"/>
        <h2 id="name" class="display-5" data-nome="<?= $model->name ?>"> <?= $model->name ?></h2>
        <p id="price" data-valor="<?= $model->price ?>">R$ <?=number_format($model->price,2, ',', '.') ?></p>
        <p id="title">Descrição:</p>
        <p id="description" data-descricao="<?= $model->description ?>"><?= $model->description ?></p>
   <br>
  <form id="form_quantity" method="post" action="/pagamento?id=<?= $model->id ?>">
    <div class="row g-3">
      <div class="col-md-2">
          <label class="form-label">Escolha a quantidade:</label>
          <select class="form-select" id="selected_quantity">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3 ">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option> 
          </select>
        </div>
        <label class="form-label">Quantidade disponível:<span id="quantity" class="display-5" data-quantity="<?= $model->stock ?>"> <?=number_format($model->stock,0, ',', '.') ?></span>
    </div>
  <button class="botao" type="submit">Comprar</button>
  </form>
  
  </div>
      </div>

  <hr>
  <h1 id="recomend" class="display-5">Você também pode gostar</h1>
 
  <div class="container ">
    <div class="row">
     <?php foreach($model->array_products as $item1): ?>

      <input type="hidden" id="id" value="<?= $item1->id ?>" name="id" data-id="<?= $item1->id ?>"/>
        <div class="col">
          <div class="thumbnail">  
           <div class="card" style="width: 13rem;">
            <img  src="/View/Uploads/<?= $item1->image ?>" class="card-img-top"  alt="...">
     
         <div class="card-body">
           <h1 class="card-title" id="nome_1"  data-nome_1="<?= $model->nome_1 ?>"><?= $item1->name ?></h1>
             <p class="card-text" id="valor_1"  data-valor_1="<?= $model->valor_1 ?>">  R$ <?=number_format($item1->price,2, ',', '.') ?></p>
      
             <a href="/apostilas_desc?id=<?= $item1->id ?>"><button class="botao" onClick="adicionarArray()">Ver mais</button></a>
       
            </div>
    </div>
    </div>     
        </div>
        <?php endforeach ?>
        </div>
    </div>
     
  
      <?php include PATH_VIEW . 'includes/footer.php' ?>
     </body>
  </html>
</body>
</html>
