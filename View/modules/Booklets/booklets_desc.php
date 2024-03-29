
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Forum&family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="\View\css\apostilas_desc.css">
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <title><?= $model->nome ?></title>
    <link rel="icon" href="/View/Imagens/icon.png" type="image/icon type">
  </head>
  <body>


  <?php include PATH_VIEW . 'includes/cabecalho_home.php' ?>

    <br>
    <br>
    <div class="d-md-flex flex-md-equal">
      <div id="contato">
        <div class="my">
          <img src="/View/Uploads/<?= $model->image ?>" width="250" height="450"/>
         </div>
      </div>

      <div id="sobre">
        <h2 id="nome" class="display-5" data-nome="<?= $model->name ?>"> <?= $model->name ?></h2>
        <p id="valor" data-valor="<?= $model->price ?>">R$ <?=number_format($model->price,2, ',', '.') ?></p>
        <p id="titulo">Descrição:</p>
        <p id="descricao" data-descricao="<?= $model->description ?>"><?= $model->description ?></p>
   <br>


   <a href="/pagamento?id=<?= $model->id ?>"><button class="botao" data-bs-toggle="modal" data-bs-target="#exampleModal">Comprar</button></a>
   
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
     
  
      <?php include PATH_VIEW . 'includes/rodape.php' ?>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
  </html>
</body>
</html>