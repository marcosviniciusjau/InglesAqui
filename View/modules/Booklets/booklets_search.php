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
 

  <h1 class="display-5" id="titulo">── Resultados da pesquisa: ──</h1>
  
  <div class="alert alert-{alert}" role="alert" id="alert">
</div>
<div class="container">
    <div class="row">
        <?php if (!empty($model->booklets)): ?>
            <?php foreach ($model->booklets as $booklet): ?>
                
               <div class="col">
                    <div class="thumbnail">  
                        <div class="card" style="width: 12rem;">
                            <img src="/View/Uploads/<?= $booklet['image'] ?>" class="card" width="100%" height="100%">
                            <div class="card-body">
                            <h1 class="card-title" id="texto"><?= $booklet['name'] ?></h1>
                            <p class="card-text" id="valor">R$ <?= number_format($booklet['price'], 2, ',', '.') ?></p>
                                <a href="/apostilas_desc?id=<?= $booklet['id'] ?>"><button class="botao">Ver mais</button></a>
                                <button class="botao" onClick="window.location.href='/apostilas/carrinho/adicionar?id=<?= $booklet['id'] ?>'">Adicionar ao carrinho</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col">
                <p class="card-text" id="valor">Nenhum resultado encontrado.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

  </div>

    <?php include PATH_VIEW . 'includes/footer.php' ?>

  </body>
</html>
