<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
     
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
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

     #texto{
            
            font-family: 'Playfair Display', serif;
            
            color:black
            

            ;
        }
      #titulo{
            
            font-family: 'Forum',cursive;
            color:black;
          
            }

    #sobre{
      padding-left: 8%;
          
    
  }
    #contato{
            padding-left: 8%;
         
            ;
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
   
    <h2 id="titulo" class="display-5"><b><font size="6" color="black" style="font-family: Corbel"> <?= $model->nome ?></h2></font></b>
    
    <p id="texto"><font size="5">R$ <?= $model->valor ?></p></font>
    
    <p id="titulo"><font size="5" color="black">Descrição:</p></font>
  
    <p id="texto"><?= $model->descricao ?></p>
   <BR>

   <a class='btn btn-sm btn-primary' href="/cadCliente"><center><b>Comprar</b></center></a>
   <br>
<a class='btn btn-sm btn-primary' style="background-color: #020D2B"><center><b>Adicionar ao carrinho</b></center></a><br>

      </div>

    </div>
  </div>
    

      </div>
