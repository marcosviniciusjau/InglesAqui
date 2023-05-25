<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/View/Imagens/icon.png" type="image/icon type">
    <link href="https://fonts.googleapis.com/css2?family=Forum&family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="\View\css\apostilas.css">
    <link href="https://fonts.googleapis.com/css2?family=Forum&family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </head>
  <body>
  
  <?php include PATH_VIEW . 'includes/cabecalho.php' ?>
 
  <h1 class="display-5" id="titulo">── Apostilas ──</h1>
<div class="container ">
    <div class="row">
    <?php foreach($model->rows as $item): ?>
      <div class="col">
  
  <div class="thumbnail">  
  <div class="card" style="width: 12rem;">
   <img  src="/View/Uploads/<?= $item->imagem ?>" class="card"   width="100%" height="100%">
   
      <div class="card-body">
      <h1 class="card-title" id="texto"><?= $item->nome ?></h1>
      <p class="card-text" id="valor">  R$ <?=number_format($item->valor,2, ',', '.') ?></p>
      <a href="/apostilas_desc?id=<?= $item->id ?>"><button class="botao">Ver mais</button></a>
     </div>
  </div>

  </div> 
   
      </div>
      <?php endforeach ?>
      </div>
  </div>

    <?php include PATH_VIEW . 'includes/rodape.php' ?>

  </body>
</html>
