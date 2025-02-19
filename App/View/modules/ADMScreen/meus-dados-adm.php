<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Meus Dados</title>
    <link rel="icon" href="/View/Images/icon.png" type="image/icon type">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>

<style type="text/css">
  
    body {
    margin: 0;
    padding: 0;
    height: 100vh;
    widows: 100vw;
  }

  .content {
    height: 520px;
    width: 1100px;
    overflow: hidden;
    position:  absolute;
    top: 70%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

  .navigation {
    position: absolute;
    bottom: 20px;
    left: 50%;
    transform: translate(-50%);
    display: flex;
  }

  .bar {
    width: 20px;
    height: 20px;
    border: 2px solid #fff;
    margin: 6px;
    border-radius: 100px;
    cursor: pointer;
    transition: .4s;
  }

  .bar:hover {
    background-color: white;
  }

  input {
    display: none;
  }

  .content {
    position: absolute;
    top: 470px;
  }

  section {
  width: 100%;
  display: inline-block;
  background: #020d2b;
  height: 50vh;
  text-align: center;
  font-size: 22px;
  font-weight: 700;
  text-decoration: underline;
}



 #card {
    width: 50%;
    border: 4px solid #198754;
    border-radius: 50%;
    margin: 0 auto;
    box-shadow: 0 0 10px rgba(0, 0, 0, .2);
  }
  #card2 {
    padding: 1.5em .5em .5em;
    text-align: justify;
  }

  </style>

<?php include PATH_VIEW . 'includes/header_adm.php' ?>
  <br><br><br>
<body>
<body>
<div id="global">
<main class="container mt-3">
    <h4>
        Meus Dados
    </h4>

    <?php if (isset($retorno['positivo'])) : ?>
        <div class="alert alert-success" role="alert">
            <?= $retorno['positivo'] ?>
        </div>
    <?php endif ?>

    <?php if (isset($retorno['senha_incorreta'])) : ?>
        <div class="alert alert-danger" role="alert">
            <?= $retorno['senha_incorreta'] ?>
        </div>
    <?php endif ?>

    <?php if (isset($retorno['senha_confirmacao_incorreta'])) : ?>
        <div class="alert alert-danger" role="alert">
            <?= $retorno['senha_confirmacao_incorreta'] ?>
        </div>
    <?php endif ?>

    <form method="post" action="/adm/my-data-adm/salvar" enctype="multipart/form-data">
    
        <div class="form-row">
            <div class="form-group col-md-6">    
            <div class="form-group col-md-6">
                <label for="email">E-mail: </label>
                <input name="email" class="form-control" value="<?= $my_data->email ?>" type="email" required />
            </div>
        </div>
<br>
        <fieldset class="border rounded p-3 mb-3">
            <legend class="form-label col-auto">Trocar a Senha: </legend>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nova_senha">Nova Senha: </label>
                    <input name="password" class="form-control" type="password" placeholder="Alteração de senha é opcional" />
                </div>
                <div class="form-group col-md-6">
                    <label for="confirm_password">Confirme a Nova Senha: </label>
                    <input name="confirm_password" class="form-control" type="password" />
                </div>
            </div>
        </fieldset>

        <fieldset class="border rounded p-2 mb-2 bg-light">
            <legend class="form-label col-auto bg-light">Senha Atual: </legend>

            <div class="form-group border border-danger p-2 p-2 mb-2 rounded">
                <input name="senha_atual" class="form-control" type="password" placeholder="Informe sua senha atual para realizar alterações no seu cadastro:" required />
            </div>
        </fieldset>

        

        <button type="submit" class="btn btn-success">Salvar</button>
            </form>
        </main>

    
    </div>
</body>

</html>