<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
     
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css2?family=Forum&family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script  src="\View\modules\Apostilas\funcoes.js"></script>
    <link rel="stylesheet" href="\View\css\apostilas_desc.css">
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <title>Inglês Aqui Apostilas</title>
    <link rel="icon" href="/View/Imagens/icon.png" type="image/icon type">

  </head>
  <body>

  <?php include PATH_VIEW . 'includes/cabecalho.php' ?>
  <body>
    <br>
    <br>
 
    <div class="d-md-flex flex-md-equal  ">
      <div id="contato">
        <div  class="my">
          <img src="/View/Uploads/<?= $model->imagem ?>" width="250" height="450"/>
         </div>
      </div>

    <div  id="sobre" >
     <h2 id="titulo" class="display-5"> <?= $model->nome ?></h2>
     <p id="valor">R$ <?=number_format($model->valor,2, ',', '.') ?></p>
     <p id="titulo">Descrição:</p>
     <p id="texto"><?= $model->descricao ?></p>
   <br>

<script src="https://checkout.hotmart.com/lib/hotmart-checkout-elements.js"></script>

     <button class="botao" id="payment_button">Comprar</button>

<script>
const elements = checkoutElements.init('overlayCheckout', {
    offer: '<?= $model->id_hotmart ?>'
})

elements.attach('#payment_button')
</script>
     </div>
    </div>  

  <br>
  <br>
<hr>
  <center><h1  id="valor" class="display-5">Você também pode gostar</h1></center>
  
  <br>
  <div class="container ">
      <div class="row">
     
      <?php
     foreach($model->array_produtos as $item1): ?>
       
    <input type="hidden" value="<?= $item1->id ?>" name="id" />
   
        <div class="col">
    
    <div class="thumbnail">  
   
    <div class="card" style="width: 13rem;">
      
     <img  src="/View/Uploads/<?= $item1->imagem ?>" class="card-img-top"  alt="...">
     
        <div class="card-body">
        <h1 class="card-title" id="texto"><?= $item1->nome ?></h1>
        <p class="card-text" id="valor">  R$ <?=number_format($item1->valor,2, ',', '.') ?></p>
      
        <a href="/apostilas_desc?id=<?= $item1->id ?>"><button class="botao">Ver mais</button></a>

       </div>
    </div>
    </center>
    </div>     
      <br>
        </div>
        <?php endforeach ?>
        </div>
    </div>
  
      <br><br><br>
      <?php include PATH_VIEW . 'includes/rodape.php' ?>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
  </html>
</body>
</html>