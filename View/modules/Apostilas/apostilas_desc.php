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

  <?php include PATH_VIEW . 'includes/cabecalho_home.php' ?>
  <body>
    <br>
    <br>

    <div class="d-md-flex flex-md-equal">
      <div id="contato">
        <div class="my">
          <img src="/View/Uploads/<?= $model->imagem ?>" width="250" height="450"/>
         </div>
      </div>

      <div id="sobre">
        <h2 id="titulo" class="display-5"> <?= $model->nome ?></h2>
        <p id="valor">R$ <?=number_format($model->valor,2, ',', '.') ?></p>
        <p id="titulo">Descrição:</p>
        <p id="texto"><?= $model->descricao ?></p>
   <br>

<div class="assistente">
  <ion-icon name="chatbubble-ellipses-outline" id="assistente" type="button" ></ion-icon>
  </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div id="tabela">
          <div class="modal-content">
            <div class="modal-header"> 
            <img src="/View/Imagens/icon.png" id="img-assist-header">
              <h1 class="modal-title">Pagamento</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
       
      <div class="card mb-3">
        <div id="message-text-enter">
       
    <div class="col-md-8">
 <div class="container">
  <main>
    <div class="py-5 text-center">
      <p class="lead">Digite as informações de pagamento </p>
    </div>

    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Seu produto</span>
          <span class="badge bg-primary rounded-pill">3</span>
        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0"><?= $model->nome ?></h6>
              </div>
           </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <span class="text-body-secondary">R$ <?=number_format($model->valor,2, ',', '.') ?></</span>
          </li>
        </li>
        
        </ul>

        <form class="card p-2">
        
        </form>
      </div>
      <div class="col-md-7 col-lg-8">
         <form class="needs-validation" novalidate>
          <div class="row g-3">
            <div class="col-sm-6">
               <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-6">
             
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

            <div class="col-12">
               <div class="input-group has-validation">
                    <div class="invalid-feedback">
                  Your username is required.
                </div>
              </div>
            </div>

            <div class="col-12">
                  <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="col-12">
               
            </div>

          </div>

          <h4 class="mb-3">Payment</h4>

          <div class="my-3">
            <div class="form-check">
              <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
              <label class="form-check-label" for="credit">Cartão de crédito</label>
            </div>
            <div class="form-check">
              <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="debit">Cartão de débito</label>
            </div>
          </div>

          <div class="row gy-3">
            <div class="col-md-6">
              <label for="cc-name" class="form-label">Nome no cartão</label>
              <input type="text" class="form-control" id="cc-name" placeholder="" required>
              <div class="invalid-feedback">
                Nome no cartão é obrigatório!
              </div>
            </div>

            <div class="col-md-6">
              <label for="cc-number" class="form-label">Número do cartão</label>
              <input type="text" class="form-control" id="cc-number" placeholder="" required>
              <div class="invalid-feedback">
                Número é obrigatório!
              </div>
            </div>

            <div class="col-md-4">
              <label for="cc-expiration" class="form-label">Data de Expirar</label>
              <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
              <div class="invalid-feedback">
               Data de Expiração é obrigatório!
              </div>
            </div>

            <div class="col-md-4">
              <label for="cc-cvv" class="form-label">CVV</label>
              <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
              <div class="invalid-feedback">
                CVV é obrigatório
              </div>
            </div>
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
        </form>
      </div>
    </div>
</div>
</div>
</div>
  </div>
  </div>
</div>
</div>
</div>
   <button class="botao" data-bs-toggle="modal" data-bs-target="#exampleModal">Comprar</button>

  </div>
      </div>

  <hr>
  <h1 id="recomend" class="display-5">Você também pode gostar</h1>
 
  <div class="container ">
    <div class="row">
     <?php foreach($model->array_produtos as $item1): ?>

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
    </div>     
        </div>
        <?php endforeach ?>
        </div>
    </div>
      
      <?php include PATH_VIEW . 'includes/rodape.php' ?>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
  </html>
</body>
</html>