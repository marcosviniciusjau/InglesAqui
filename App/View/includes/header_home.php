<link rel="stylesheet" href="\View\css\headers.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
<nav class="navbar navbar-expand-lg " id="navbar">
  <div class="container-fluid">
    <a class="navbar-brand" href="/"><img src="/View/Images/Home/logo.webp" class="navbar-brand" width="150" height="60" id="logo_nav"></a>

      <form class="d-flex" role="search" method="GET" action="/apostilas/pesquisar">
        <div class="autocomplete">
          <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Search" id="search" name="search" required>
          <button class="btn btn-outline-search" type="submit"><ion-icon name="search-outline"></ion-icon></button>
          <ul class= "list-group" id="searchResults"></ul>
      </div>
      </form>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
         
        </li>
      </ul>
    <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="navbar-brand" href="/apostilas">Apostilas</a>
                </li>

                <li class="nav-item">
                    <a class="navbar-brand" href="/contato" >Contato</a>
                </li>

                <li class="nav-item">
                   <a class="navbar-brand" href="/#sobre" >Sobre</a>
                </li>
                   
                <li class="nav-item">
                  <a href="/apostilas/carrinho" id="cart">
                  <ion-icon name="cart-outline"></ion-icon></a>
                </li>
               
            </ul>
    </div>
  </div>
</nav>
   
  <script src="\View\js\header.js"></script>