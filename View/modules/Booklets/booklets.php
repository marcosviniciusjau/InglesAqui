<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inglês Aqui- Apostilas</title>
    <link rel="icon" href="/View/Images/Home/icon.webp" type="image/icon type">
    <link rel="stylesheet" href="\View\css\booklets.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    </head>
  <body>
  
  <?php include PATH_VIEW . 'includes/header_booklets.php' ?>
 
  <div class="content">
    <div class="slides">
      <input type="radio" name="radio" id="slide1" checked>
      <input type="radio" name="radio" id="slide2">
      <input type="radio" name="radio" id="slide3">
      <input type="radio" name="radio" id="slide4">
      <input type="radio" name="radio" id="slide5">


      <div class="slide s1">
        <a href="#"><img src="/View/Images/Booklets/banner_ingles_aqui.webp" class="banner"></a>
      </div>

      <div class="slide">
        <img src="/View/Images/Booklets/aupairbanner.webp" class="banner">
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
                <a href="/apostilas/categoria/viagem"><img class="categorias" src="/View/Images/Booklets/viagem.webp"></a>
                <br>
                <font size="5" style="font-family: Corbel">VIAGEM</font>
              </div>

              <div class="col">
                <a href="/apostilas/categoria/negocios"><img class="categorias" src="/View/Images/Booklets/negocios.webp"></a>
                <br>
                <font size="5" style="font-family: Corbel">NEGÓCIOS</font>
              </div>

              <div class="col">
                <a href="/apostilas/categoria/educacao"><img class="categorias" src="/View/Images/Booklets/estudos.webp"></a>
                <br>
                <font size="5" style="font-family: Corbel">ESTUDOS</font>
              </div>
              
            </div>
        </div>

  <h1 class="display-5" id="titulo">── Apostilas ──</h1>
  
  <div class="alert alert-{alert}" role="alert" id="alert">
</div>
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

      <button class="botao"  onClick="window.location.href='/apostilas/carrinho/adicionar?id=<?= $item->id ?>'">Adicionar ao carrinho</button></button>
     
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
