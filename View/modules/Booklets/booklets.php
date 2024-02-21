<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inglês Aqui- Apostilas</title>
    <link rel="icon" href="/View/Imagens/icon.png" type="image/icon type">
    <link href="https://fonts.googleapis.com/css2?family=Forum&family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="\View\css\apostilas.css">
    <link href="https://fonts.googleapis.com/css2?family=Forum&family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <script type="text/javascript" src="\View\js\apostilas.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </head>
  <body>
  
  <?php include PATH_VIEW . 'includes/cabecalho.php' ?>
 
    <div class="content">
    <div class="slides">
      <input type="radio" name="radio" id="slide1" checked>
      <input type="radio" name="radio" id="slide2">
      <input type="radio" name="radio" id="slide3">
      <input type="radio" name="radio" id="slide4">
      <input type="radio" name="radio" id="slide5">


      <div class="slide s1">
        <a href ="consulta"><img src="View/Imagens/banner_ingles_aqui.png"></a>
      </div>
      <div class="slide">
        <img src="View/Imagens/aupairbanner.png">
      </div>
  
    </div>

      <div class="navigation">
         <label class="bar" for="slide1"></label>
         <label class="bar" for="slide2"></label>
      </div>
       </div>
</div>
</div>
<br><br><br><br><br><br><br><br><br><br><br>
<br><br>
  <div class="container text-center">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">

              <div class="col">
                <a href="alimentacao"><img class="categorias" src="View/Imagens/viagem.png"></a>
                <br>
                <font size="5" style="font-family: Corbel">VIAGEM</font>
              </div>

              <div class="col">
                <a href="vestuario"><img class="categorias" src="View/Imagens/negocios.jpg"></a>
                <br>
                <font size="5" style="font-family: Corbel">NEGÓCIOS</font>
              </div>

              <div class="col">
                <a href="higiene"><img class="categorias" src="View/Imagens/estudos.jpg"></a>
                <br>
                <font size="5" style="font-family: Corbel">ESTUDOS</font>
              </div>


            </div>
        </div>

  <h1 class="display-5" id="titulo">── Apostilas ──</h1>
<div class="container ">
    <div class="row">
    <?php foreach($model->rows as $item): ?>
      <div class="col">
  <div class="thumbnail">  
  <div class="card" style="width: 12rem;">
   <img  src="/View/Uploads/<?= $item->image ?>" class="card"   width="100%" height="100%">
   
      <div class="card-body">
      <h1 class="card-title" id="texto" data-name="<?= $item->name ?>" value="<?= $item->name ?>"><?= $item->name ?></h1>
      <p class="card-text" id="valor" data-price="<?= $item->price ?>">  R$ <?=number_format($item->price,2, ',', '.') ?></p>
      <a href="/apostilas_desc?id=<?= $item->id ?>"><button class="botao">Ver mais</button></a></button>
     
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
