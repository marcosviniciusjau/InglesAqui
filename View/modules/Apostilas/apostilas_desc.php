<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
     
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css2?family=Forum&family=Montserrat:wght@300&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
 
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <title>Inglês Aqui Livros</title>
    <link rel="icon" href="/View/Imagens/icon.png" type="image/icon type">

  </head>
  <body>
  
  <style>
     @import url('https://fonts.googleapis.com/css2?family=Forum&display=swap');
     @import url('https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap');

     #valor{
      font-family: 'Montserrat', sans-serif;
         font-size:25px; 
            color:black
            

            ;
        }
        #texto{  
    font-family: 'Montserrat', sans-serif;
      font-size: 20px;
      color:black;
      
  }
        #titulo{    
    font-family: 'Forum', cursive;
    color:black;
   
    font-size:25px;
    }
    #sobre{
      padding-left: 8%;
          
    
  }
    #contato{
            padding-left: 8%;
         
    }
    
        .botao{
    padding-top: 15%;
    padding: 20px 24px;
    border-radius: 20px;
    color:#ffffff;
    font-family: 'Forum', cursive;
    font-size: large;
    background-color: #020D2B;}

    
    
    .botao1{


    border-radius: 5px;
    color:#ffffff;
    font-family: 'Forum', cursive;
    font-size: large;
    background-color: #020D2B;
    }
    </style>

  <?php include PATH_VIEW . 'includes/cabecalho.php' ?>
  <body>
    <br>
    <br>
 
    <input type="hidden" value="<?= $model->id ?>" name="id" />
   
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
   <BR>
<!--- Required script --->
<script src="https://checkout.hotmart.com/lib/hotmart-checkout-elements.js"></script>

<!--- Your button --->
<button class="botao" id="payment_button">Comprar</button>

<!--- Configuration --->
<script>
const elements = checkoutElements.init('overlayCheckout', {
    offer: '<?= $model->id_hotmart ?>'
})

elements.attach('#payment_button')
</script>
     </div>

    </div>
    
  </div>
  <br>
  <br>
  <hr>
  
  <center><h1  id="titulo" class="display-5">Avaliar</h1>
 <!-- Button trigger modal -->
<img src= "View\Imagens\star1.png "data-bs-toggle="modal" data-bs-target="#exampleModal">
<img src= "View\Imagens\star1.png "data-bs-toggle="modal" data-bs-target="#exampleModal">
<img src= "View\Imagens\star1.png "data-bs-toggle="modal" data-bs-target="#exampleModal">
<img src= "View\Imagens\star1.png "data-bs-toggle="modal" data-bs-target="#exampleModal">
<img src= "View\Imagens\star1.png "data-bs-toggle="modal" data-bs-target="#exampleModal">
</center>

<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Opiniões do Produto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    
      <div class="modal-body">
      <div class="container-fluid">
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4 ms-auto"></div>
    </div>
      <img src= "View\Imagens\star1.png "data-bs-toggle="modal" data-bs-target="#exampleModal">
<img src= "View\Imagens\star1.png "data-bs-toggle="modal" data-bs-target="#exampleModal">
<img src= "View\Imagens\star1.png "data-bs-toggle="modal" data-bs-target="#exampleModal">
<img src= "View\Imagens\star1.png "data-bs-toggle="modal" data-bs-target="#exampleModal">
<img src= "View\Imagens\star1.png "data-bs-toggle="modal" data-bs-target="#exampleModal">
<br>
        <form>
          <div class="col-md-4">
            <label for="recipient-name" class="col-form-label">Digite seu comentário:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <br>
          <div class="mb-3">
          <button class="botao1" type="submit" onclick="gravar()">Enviar</button></center>
          </div>
        </form>
      
      
      </div>
     
    </div>
  </div>
</div>
</div>
<br>
<br>

</form>
<br>
<br>

<hr>
  <center><h1  id="titulo" class="display-5">Você também pode gostar</h1></center>
  
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
        <p class="card-text" id="texto">  R$ <?=number_format($item1->valor,2, ',', '.') ?></p>
      
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
  
  <style type="text/css">
    
     .botao{
      padding-top: 15%;
      transition-duration: 0.4s;
      padding: 10px 24px;
      border-radius: 20px;
      color:#ffffff;
      font-family: 'Forum', cursive;
      font-size: large;
      background-color: #020D2B;
    }
      body {
      margin: 0;
      padding: 0;
      height: 100vh;
      widows: 100vw;
    }
  
    .content {
      height: 520px;
      width: 1100px;
      overflow: hidden;
      position:  absolute;
      top: 70%;
      left: 50%;
      transform: translate(-50%, -50%);
    }
  
    #card {
      width: 50%;
      border: 4px solid #198754;
      border-radius: 50%;
      margin: 0 auto;
      box-shadow: 0 0 10px rgba(0, 0, 0, .2);
    }
  
    #card2 {
      padding: 1.5em .5em .5em;
      text-align: justify;
    }
  
    .navigation {
      position: absolute;
      bottom: 20px;
      left: 50%;
      transform: translate(-50%);
      display: flex;
    }
  
    .thumbnail { 
      top:-50px; 
      left:-35px; 
      display:block; 
      z-index:999; 
      cursor: pointer; 
      -webkit-transition-property: all; 
      -webkit-transition-duration: 0.3s; 
      -webkit-transition-timing-function: ease; 
    } 
  
    .bar {
      width: 20px;
      height: 20px;
      border: 2px solid #fff;
      margin: 6px;
      border-radius: 100px;
      cursor: pointer;
      transition: .4s;
    }
  
    .bar:hover {
      background-color: white;
    }
  
    input {
      display: none;
    }
  
    .content {
      position: absolute;
      top: 470px;
    }
  
    /*change the number below to scale to the appropriate size*/ 
    .thumbnail:hover { 
      transform: scale(1.1); 
  
    }
  
    section {
    width: 100%;
    display: inline-block;
    background: #023418;
    height: 50vh;
    text-align: center;
    font-size: 22px;
    font-weight: 700;
    text-decoration: underline;
  }
  
  .footer-distributed{
    background: #023418;
    box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.12);
    box-sizing: border-box;
    width: 100%;
    text-align: left;
    font: bold 16px sans-serif;
    padding: 55px 50px;
  }
  
  .footer-distributed .footer-left,
  .footer-distributed .footer-center,
  .footer-distributed .footer-right{
    display: inline-block;
    vertical-align: top;
  }
  
  /* Footer left */
  
  .footer-distributed .footer-left{
    width: 40%;
  }
  
  /* The company logo */
  
  .footer-distributed h3{
    color:  #ffffff;
    font: normal 36px 'Open Sans', cursive;
    margin: 0;
  }
  
  .footer-distributed h3 span{
    color:  lightseagreen;
  }
  
  /* Footer links */
  
  .footer-distributed .footer-links{
    color:  #ffffff;
    margin: 20px 0 12px;
    padding: 0;
  }
  
  .footer-distributed .footer-links a{
    display:inline-block;
    line-height: 1.8;
    font-weight:400;
    text-decoration: none;
    color:  inherit;
  }
  
  .footer-distributed .footer-company-name{
    color:  white;
    font-size: 14px;
    font-weight: normal;
    margin: 0;
  }
  
  /* Footer Center */
  
  .footer-distributed .footer-center{
    width: 35%;
  }
  
  .footer-distributed .footer-center i{
    background-color:  #33383b;
    color: #ffffff;
    font-size: 25px;
    width: 38px;
    height: 38px;
    border-radius: 50%;
    text-align: center;
    line-height: 42px;
    margin: 10px 15px;
    vertical-align: middle;
  }
  
  .footer-distributed .footer-center i.fa-envelope{
    font-size: 17px;
    line-height: 38px;
  }
  
  .footer-distributed .footer-center p{
    display: inline-block;
    color: #ffffff;
    font-weight:400;
    vertical-align: middle;
    margin:0;
  }
  
  .footer-distributed .footer-center p span{
    display:block;
    font-weight: normal;
    font-size:14px;
    line-height:2;
  }
  
  .footer-distributed .footer-center p a{
    color:  lightseagreen;
    text-decoration: none;;
  }
  
  .footer-distributed .footer-links a:before {
    content: "|";
    font-weight:300;
    font-size: 20px;
    left: 0;
    color: #fff;
    display: inline-block;
    padding-right: 5px;
  }
  
  .footer-distributed .footer-links .link-1:before {
    content: none;
  }
  
  /* Footer Right */
  
  .footer-distributed .footer-right{
    width: 20%;
  }
  
  .footer-distributed .footer-company-about{
    line-height: 20px;
    color:  #92999f;
    font-size: 13px;
    font-weight: normal;
    margin: 0;
  }
  
  .footer-distributed .footer-company-about span{
    display: block;
    color:  #ffffff;
    font-size: 14px;
    font-weight: bold;
    margin-bottom: 20px;
  }
  
  .footer-distributed .footer-icons{
    margin-top: 25px;
  }
  
  .footer-distributed .footer-icons a{
    display: inline-block;
    width: 35px;
    height: 35px;
    cursor: pointer;
    background-color:  #33383b;
    border-radius: 2px;
  
    font-size: 20px;
    color: #ffffff;
    text-align: center;
    line-height: 35px;
  
    margin-right: 3px;
    margin-bottom: 5px;
  }
  
  /* If you don't want the footer to be responsive, remove these media queries */
  
  @media (max-width: 880px) {
  
    .footer-distributed{
      font: bold 14px sans-serif;
    }
  
    .footer-distributed .footer-left,
    .footer-distributed .footer-center,
    .footer-distributed .footer-right{
      display: block;
      width: 100%;
      margin-bottom: 40px;
      text-align: center;
    }
  
    .footer-distributed .footer-center i{
      margin-left: 0;
    }
  
  }
  
    </style>
  
</body>
</html>