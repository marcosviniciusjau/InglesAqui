<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  
    <title>Inglês Aqui - Atualizar Apostilas</title>
    <link rel="icon" href="/View/Imagens/icon.png" type="image/icon type">
 
</head>
<body>
<?php include PATH_VIEW . 'includes/header_adm.php' ?>
  <div class="container">
  <main>
  <form method="post" action="/product/form/update" enctype="multipart/form-data" class="form-horizontal">
  <input id="id" name="id" type="hidden" value="<?= $model->id ?>" placeholder="ID do Produto" class="form-control input-md">
    
      <fieldset>
      <h4 class="mb-3">Atualizar Apostila</h4>
        <div class="row g-3">
            <div class="col-sm-6">
              <label class="form-label" for="nome">Nome</label>  
              <input id="name" name="name" type="text" value="<?= $model->name ?>" placeholder="Nome do Produto" class="form-control input-md">
        </div>
            </div>

      <div class="row g-3">
        <div class="col-sm-6">
          <label class="col-md-4 control-label" for="Valor">Valor</label>  
          <input id="price" name="price" value="<?= $model->price ?>" placeholder="Valor" class="form-control input-md">  
    </div>
        </div>

      <div class="row g-3">
        <div class="col-sm-6">
          <label class="col-md-4 control-label" for="description">Descrição</label>  
          <input id="description" name="description"   value="<?= $model->description ?>" placeholder="Descriçao" class="form-control input-md">
      </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label" for="arquivo_up">Foto</label>
        <div class="col-md-4">
        <input id="arquivo_up" name="arquivo_up"  value="<?=  $model->image  ?>" class="input-file" type="file" >
        
          <?php
          if ($model->image != null) {
            echo '
            <img class="img-fluid" width="200" height="300" src="/View/Uploads/' . $model->image . '" alt="Booklet">
            <input type="hidden" id="image" name="image" value="' . $model->image . '">
            ';
          }
          ?>
          </div>
      </div>
       
         <hr class="my-4">
         <button class="botao" type="submit">Cadastrar</button>
  </div>
</div>
          </fieldset>
        </form>
                       
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
 
</body>

</html>

<style type="text/css">
  @import url('https://fonts.googleapis.com/css2?family=Forum&display=swap');
  .botao{
  padding-top: 15%;
  padding-bottom:15%;
  padding: 10px 24px;
  border-radius: 20px;
  color:#ffffff;
  border:none;
  cursor:pointer;
  transition: filter 0.2s;
  font-family: 'Forum', cursive;
  font-size: large;
  background-color: #020D2B;
  }
   
.img-fluid { 
top:-50px; 
left:-35px; 
display:block; 
z-index:999; 
cursor: pointer; 
} 

/*change the number below to scale to the appropriate size*/ 
.img-fluid:hover { 
transform: scale(1.1); 

}
.botao:hover {
  background-color: #008CBA;
  color: white;
    }
</style>