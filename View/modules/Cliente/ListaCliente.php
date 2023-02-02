<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  <title>GL - Listar Produto</title>
  <link rel="icon" href="/View/Imagens/Icone/leaf.png" type="image/icon type">

</head>

<body>

  <?php include PATH_VIEW . 'includes/cabecalho.php' ?>

  <br>
  <br>
  <br>


  <br>
 
  <center>
    <h1>
      <font style="font-family: Corbel">Clientes Cadastrados</font>
    </h1>
  </center>
  <br>

  <div class="m-5">

    <table class="table success">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Nome</th>
      
          <th scope="col">CPF</th>
          <th scope="col">Email</th>
   
          <th scope="col">Telefone</th>
        </tr>
      </thead>
      <tbody>

      </tbody>

      <?php foreach ($model->rows as $item) : ?>
        <tr>

          <td><?= $item->id ?></td>

          <td><?= $item->nome ?></td>
        
       
          <td><?= $item->cpf ?></td>
          <td><?= $item->email ?></td>
          <td><?= $item->telefone ?></td>
          <td><a class='btn btn-sm btn-primary' href="/produto/ver?id=<?= $item->id ?>">
              <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z' />
              </svg>
            </a></td>
          <td><a class='btn btn-sm btn-danger' href="/produto/delete?id=<?= $item->id ?>">
              <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z' />
                <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z' />
              </svg>
            </a></td>
        </tr>
      <?php endforeach ?>





    </table>
    <a href="/tela-adm" class='btn btn-sm btn-danger'>VOLTAR</a>
    <a href="/produto/form" class='btn btn-sm btn-success'>ADICIONAR</a>


</body>

</html>

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
    position: absolute;
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
    background: #023418;
    height: 50vh;
    text-align: center;
    font-size: 22px;
    font-weight: 700;
    text-decoration: underline;
  }

  .footer-distributed {
    background: #023418;
    box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.12);
    box-sizing: border-box;
    width: 100%;
    text-align: left;
    font: bold 16px sans-serif;
    padding: 55px 50px;
  }

  .footer-distributed .footer-left,
  .footer-distributed .footer-center,
  .footer-distributed .footer-right {
    display: inline-block;
    vertical-align: top;
  }

  /* Footer left */

  .footer-distributed .footer-left {
    width: 40%;
  }

  /* The company logo */

  .footer-distributed h3 {
    color: #ffffff;
    font: normal 36px 'Open Sans', cursive;
    margin: 0;
  }

  .footer-distributed h3 span {
    color: lightseagreen;
  }

  /* Footer links */

  .footer-distributed .footer-links {
    color: #ffffff;
    margin: 20px 0 12px;
    padding: 0;
  }

  .footer-distributed .footer-links a {
    display: inline-block;
    line-height: 1.8;
    font-weight: 400;
    text-decoration: none;
    color: inherit;
  }

  .footer-distributed .footer-company-name {
    color: white;
    font-size: 14px;
    font-weight: normal;
    margin: 0;
  }

  /* Footer Center */

  .footer-distributed .footer-center {
    width: 35%;
  }

  .footer-distributed .footer-center i {
    background-color: #33383b;
    color: #ffffff;
    font-size: 25px;
    width: 38px;
    height: 38px;
    border-radius: 50%;
    text-align: center;
    line-height: 42px;
    margin: 10px 15px;
    vertical-align: middle;
  }

  .footer-distributed .footer-center i.fa-envelope {
    font-size: 17px;
    line-height: 38px;
  }

  .footer-distributed .footer-center p {
    display: inline-block;
    color: #ffffff;
    font-weight: 400;
    vertical-align: middle;
    margin: 0;
  }

  .footer-distributed .footer-center p span {
    display: block;
    font-weight: normal;
    font-size: 14px;
    line-height: 2;
  }

  .footer-distributed .footer-center p a {
    color: lightseagreen;
    text-decoration: none;
    ;
  }

  .footer-distributed .footer-links a:before {
    content: "|";
    font-weight: 300;
    font-size: 20px;
    left: 0;
    color: #fff;
    display: inline-block;
    padding-right: 5px;
  }

  .footer-distributed .footer-links .link-1:before {
    content: none;
  }

  /* Footer Right */

  .footer-distributed .footer-right {
    width: 20%;
  }

  .footer-distributed .footer-company-about {
    line-height: 20px;
    color: #92999f;
    font-size: 13px;
    font-weight: normal;
    margin: 0;
  }

  .footer-distributed .footer-company-about span {
    display: block;
    color: #ffffff;
    font-size: 14px;
    font-weight: bold;
    margin-bottom: 20px;
  }

  .footer-distributed .footer-icons {
    margin-top: 25px;
  }

  .footer-distributed .footer-icons a {
    display: inline-block;
    width: 35px;
    height: 35px;
    cursor: pointer;
    background-color: #33383b;
    border-radius: 2px;

    font-size: 20px;
    color: #ffffff;
    text-align: center;
    line-height: 35px;

    margin-right: 3px;
    margin-bottom: 5px;
  }

  /* If you don't want the footer to be responsive, remove these media queries */

  @media (max-width: 880px) {

    .footer-distributed {
      font: bold 14px sans-serif;
    }

    .footer-distributed .footer-left,
    .footer-distributed .footer-center,
    .footer-distributed .footer-right {
      display: block;
      width: 100%;
      margin-bottom: 40px;
      text-align: center;
    }

    .footer-distributed .footer-center i {
      margin-left: 0;
    }

  }

  #wpp {
    position: absolute;
    top: 23px;
    left: 1155px;
  }

  #fb {
    position: absolute;
    top: 23px;
    left: 1217px;
  }

  #ig {
    position: absolute;
    top: 23px;
    left: 1262px;
  }

  #tel {
    position: absolute;
    top: 23px;
    left: 1307px;
  }

  #email {
    position: absolute;
    top: 23px;
    left: 1352px;
  }
</style>