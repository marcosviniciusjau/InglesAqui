<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  
    <title>GL - Cadastrar Produto</title>
    <link rel="icon" href="/View/Imagens/icon.png" type="image/icon type">
 
   
</head>
<body>
   

<?php include PATH_VIEW . 'includes/cabecalho.php' ?>
  <br>
  <br>
  <br>
  <div class="container">
  <main>
  <form method="post" action="/produto/form/save" enctype="multipart/form-data" class="form-horizontal">

      <input type="hidden" value="<?= $model->id ?>" name="id" />

      <fieldset>
      <h4 class="mb-3">Cadastrar Novas Apostilas</h4>
        <div class="row g-3">
            <div class="col-sm-6">
  <label class="form-label" for="nome">Nome</label>  
  <input id="nome" name="nome" type="text" value="<?= $model->nome ?>" placeholder="Nome do Produto" class="form-control input-md">
  </div>
            </div>
     <br>
            <div class="row g-3">
            <div class="col-sm-6">
     <label class="col-md-4 control-label" for="Valor">Valor</label>  

  <input id="valor" name="valor" value="<?= $model->valor ?>" placeholder="Valor" class="form-control input-md">
    
  </div>
</div>
<br>
<div class="row g-3">
            <div class="col-sm-6">
  <label class="col-md-4 control-label" for="descricao">Descrição</label>  

  <input id="descricao" name="descricao"   value="<?= $model->descricao ?>" placeholder="Descriçao" class="form-control input-md">
 </div>
</div>
<br>

<div class="row g-3">
            <div class="col-sm-6">
  <label class="col-md-4 control-label" for="id_hotmart">Id Hotmart</label>  

  <input id="id_hotmart" name="id_hotmart" type="text" value="<?= $model->id_hotmart ?>" placeholder="Id Hotmart" class="form-control input-md">
    
  </div>
</div>
<br>

<div class="form-group">
  <label class="col-md-4 control-label" for="arquivo_up">Foto</label>
  <div class="col-md-4">  
    <input id="arquivo_up" name="arquivo_up"  value="<?=  $model->imagem  ?>" class="input-file" type="file" >
  </div>
</div>
       
         <br>
         <br>
         <hr class="my-4">

  <button class="w-50 btn btn-primary btn-lg" type="submit">Cadastrar</button>
  </div>
</div>
          </fieldset>
        </form>
                       
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
 
</body>

</html>


<style type="text/css">
  
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

</style>