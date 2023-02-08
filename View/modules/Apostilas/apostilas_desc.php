<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
     
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css2?family=Forum&family=Montserrat:wght@300&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="greenlife.css" />
<link rel="stylesheet" type="text/css" href="produto.css" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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
      font-size: 13px;
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
    transition-duration: 0.4s;
    padding: 10px 24px;
    border-radius: 20px;
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
    
    <p id="valor">R$ <?= $model->valor ?></p>
    
    <p id="titulo">Descrição:</p>
  
    <p id="texto"><?= $model->descricao ?></p>
   <BR>

   <a href="/apostilas"><button class="botao">Comprar</button></a>
      </div>

    </div>
  </div>
    

      </div>
