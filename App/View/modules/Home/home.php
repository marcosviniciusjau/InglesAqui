<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Inglês Aqui</title>
    <link rel="icon" href="/View/Images/Home/icon.webp" type="image/icon type">
    <link rel="stylesheet" href="/View/css/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>

    <?php include PATH_VIEW . '/includes/header_home.php' ?>
   </head>
  <body>
   <main>
  <img src="/View/Images/Home/background.webp" id="fundo_img" width="100%">
  <div class="assistente">
  <ion-icon name="chatbubble-ellipses-outline" id="assistente" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"></ion-icon>
  </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div id="tabela">
          <div class="modal-content">
            <div class="modal-header"> 
            <img src="/View/Images/icon.png" id="img-assist-header">
              <h1 class="modal-title">Paige Assistente Virtual - Inglês Aqui</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
       
      <div class="card mb-3">
        <div id="message-text-enter">
        <img src="/View/Images/icon.png" id="img-assist">

    <div class="col-md-8">
    <div class="options-container" ng-app="myApp" ng-controller="myCtrl">
                 
    <p class="welcome-text">Olá! Sou a Paige, sua assistente virtual no mundo do Inglês Aqui. Estou aqui para tornar sua jornada de aprendizado incrível. Como posso contribuir hoje?</p>
    
    <hr>
    <script>         
    var app = angular.module('myApp', []);
    app.controller('myCtrl', function($scope) {
      $scope.theTime = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
    
      });
</script>

<div id="app">
    <div>
      <button class="options" data-option="Como solicitar um reembolso?">Como solicitar um reembolso?</button>
      <button class="options" data-option="Me fale sobre a política de devolução.">Me fale sobre a política de devolução.</button>
      <button class="options" data-option="Posso cancelar meu pedido?">Posso cancelar meu pedido?</button>
      <p id="time">{{theTime}}</p>
    </div>
      </div>
        </label>
          </div>
            </div>
              </div>
      <div id="comment-list"></div>
      <p></p>
    </div>
      <form id="comment-form">
       <div class="message-input-container">
        <textarea id="message-text" class="form-control" name="userInput" placeholder="Digite sua pergunta" required></textarea>
     
        <button type="submit">
        <ion-icon name="send-outline" class="custom-icon"></ion-icon>
      </button>
      </div>
    </form>
  </div>
        </div>
      </div>
    </div>
  </div>
 <div class="d-md-flex flex-md-equal" id="guias1">
     <div id="guias">
       <div class="my-5 py-5">
        <h1 class="display-5">Os guias</h1>
        <h2 class="lead" >PARA TODOS</h2>
        <p class="lead">Apostilas com diversos temas e com diferentes intuitos na aprendizado da língua inglesa</p>      
        <a href="/apostilas"><button class="botao" >Ver mais</button></a>
   </div>
     </div>
        <span class="booklets">
        <a href="/apostilas_desc?id=1"><img class="booklets_img" src="View/Images/Booklets/booklet1.webp"/></a>
        </span>
        <span class="booklets">
        <a href="/apostilas_desc?id=7"><img class="booklets_img"  src="View/Images/Booklets/booklet2.webp"/></a>
        </span>
        <span class="booklets"> 
        <a href="/apostilas_desc?id=3"><img class="booklets_img"  src="View/Images/Booklets/booklet3.webp"/></a>
        </span>
        <span class="booklets"> 
        <a href="/apostilas_desc?id=6"><img class="booklets_img"  src="View/Images/Booklets/booklet5.webp" id="img_booklet"/></a>
        </span>
    </div>
<div class="d-md-flex flex-md-equal  w-100">
  
  <img src="View/Images/Home/about.webp" class="imgs" id="azul">
      <div id="sobre">
        <div class="my-5 py-5">
         <h1 class="display-5">Sobre</h1>
         <h2 class="lead">INGLÊS PARA TODOS!</h2>
         <p class="lead">Ferramentas para facilitar a vida dos professores, alunos, autodidatas e muito mais</p>
</div>
     </div>
       </div>
  
  <div class="d-md-flex flex-md-equal" class="azul">
    <div id="mensagem">
    <h2 class="display-4" id="titulo_mensagem">Aprender inglês pode te levar para onde você  quiser!</h2> 
    </div> 
    <img src="View/Images/Home/world.webp" id="mundo_img" class="mundo_img"/>
  </div>
  </div>
  </div>

  <div class="d-md-flex flex-md-equal  w-100" id="contato">
    <div  class="my-4 py-4" id="contato_img">
      <label class="display-4" id="titulo_contato">CONTATOS:</label>
      <p id="rede_social">@teacherschay</p>
      <p class="lead" >Siga nas redes sociais e vem falar com a gente!</p>
      <br>
      <a href="/contato"><button class="botao">Ver mais</button></a>
   </div>
      <img src="View/Images/Home/contact.webp" id="contato_imagem" class="img">
  </div>
     


</body>
</main>
</html>

