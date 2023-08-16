<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inglês Aqui</title>
    <link rel="icon" href="/View/Imagens/icon.png" type="image/icon type">
    <link rel="stylesheet" href="/View/css/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

<script>
  const myModal = document.getElementById('myModal')
const myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', () => {
  myInput.focus()
})
</script>
    <img src="/View/Imagens/fundo.png" width="100%" height="50%">
    
  <!-- Button trigger modal -->
  <div class="assistente">
  <ion-icon name="chatbubble-ellipses-outline" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"></ion-icon>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title">Paige Assistente Virtual- Inglês Aqui</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form>
          <div class="mb-3">
          
          </div>
          <div class="mb-3">
        
       
          </div>
        </form>
      </div>
      <div class="modal-footer">
      <textarea class="form-control" id="message-text" placeholder="Como posso te ajudar hoje?"></textarea>
        <ion-icon name="send-outline"></ion-icon>
      </div>
      </div>
   
    </div>
  </div>
</div>
</div>
<div class="d-md-flex flex-md-equal  w-100" class="azul">
       <img src="View/Imagens/sobre.png" class="imgs">
      
      <div id="sobre">
        <!-- Button trigger modal -->

       <div class="my-5 py-5">
        <h1 class="display-5">Sobre</h1>
        <h2 class="lead">INGLÊS PARA TODOS!</h2>
        <p class="lead">Ferramentas para facilitar a vida dos professores, alunos, autodidatas e muito mais</p>
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
        <span class="livros">
        <a href="/apostilas_desc?id=1"><img class="apostilas" src="View/Imagens/livro1.png"  class="thumbnail" /></a>
        </span>
        <span class="livros">
        <a href="/apostilas_desc?id=7"><img class="apostilas"  src="View/Imagens/livro2.png"  class="thumbnail" /></a>
        </span>
        <span class="livros"> 
        <a href="/apostilas_desc?id=3"><img class="apostilas"  src="View/Imagens/livro3.png"  class="thumbnail" /></a>
        <br> <br>
        <br> <br>
        </span>
       
    </div>

  <div class="d-md-flex flex-md-equal" class="azul">
      <img src="View\Imagens/mundo.png" id="mundo_img" class="imgs"/>
    <div  id="mensagem">
      <div class="my-4 py-4">
        <h2 class="display-4" id="titulo_mensagem">Aprender inglês pode te levar para onde você  quiser!</h2>     
      </div>
    </div>
  </div>

  <div class="d-md-flex flex-md-equal  w-100" id="contato">
    <div  class="my-4 py-4" id="contato_img">
      <label class="display-4" id="titulo_contato">CONTATOS:</label>
      <p  id="rede_social">@teacherschay</p>
      <p class="lead" >Siga nas redes sociais e vem falar com a gente!</p>
      <br>
        <a href="/contato"><button class="botao">Ver mais</button></a>
   </div>
      <img src="View/Imagens/contato.png" id="contato_imagem" class="imgs">
  </div>
     
</main>

</body>
</html>