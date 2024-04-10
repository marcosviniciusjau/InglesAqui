<link rel="stylesheet" href="\View\css\headers.css">
<nav id= "nav" class="navbar navbar-expand-md navbar-dark ">
    <div class="container-fluid">
      <a href="/"><img src="/View/Images/Home/logo.webp" class="navbar-brand" width="150" height="60"></a>
      <a class="navbar-brand" href="/apostilas/categoria/viagem">Viagem</a>
      
      <a class="navbar-brand" href="/apostilas/categoria/negocios">Negócios</a>
  
      <a class="navbar-brand" href="/apostilas/categoria/educacao">Estudo</a>

      <form class="d-flex" role="search" method="GET" action="/apostilas/pesquisar">
        <div class="autocomplete">
          <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Search" id="search" name="search" required>
          <button class="btn btn-outline-search" type="submit"><ion-icon name="search-outline"></ion-icon></button>
          <ul class= "list-group" id="searchResults"></ul>
      </div>
      </form>

      <a class="navbar-brand" href="/apostilas/carrinho">
        <ion-icon name="cart-outline"></ion-icon>
          <span id="cartQuantity" class="quantity_array"></span>
          <span id="cart">Carrinho</span></a>
  
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
    </div>
  </nav>
  
  <script src="\View\js\header.js"></script>