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
  <center>
  <form method="post" action="/saveCliente" enctype="multipart/form-data" class="form-horizontal">

      <input type="hidden" value="<?= $model->id ?>" name="id" />

      <fieldset>
        <legend>Cadastro de Clientes</legend>
        <div class="form-group">
  <label class="col-md-4 control-label" for="nome">Nome:</label>  
  <div class="col-md-4">
  <input id="nome" name="nome" type="text" value="<?= $model->nome ?>" placeholder="Nome como está no CPF" class="form-control input-md">
    
  </div>
</div>
     

     <label class="col-md-4 control-label" for="Valor">CPF:</label>  
  <div class="col-md-4">
  <input id="cpf" name="cpf" value="<?= $model->cpf ?>" placeholder="CPF" class="form-control input-md">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Email:</label>  
  <div class="col-md-4">
  <input id="email" type="email" name="email" class="form-control"   value="<?= $model->email ?>" placeholder="Email" class="form-control input-md">
 </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="telefone">Telefone:</label>  
  <div class="col-md-4">
  <input id="telefone" name="telefone"   value="<?= $model->telefone ?>" placeholder="Telefone" class="form-control input-md">
 </div>
</div>

       
         <br>
         <br>
         <div class="form-group">
  <label class="col-md-4 control-label" for="cosbotao"></label>
  <div class="col-md-4">
    <button type="submit" id="submit" name="submit" class="btn btn-primary">Cadastrar</button>
  </div>
</div>
          </fieldset>
        </form>
                        </center>
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