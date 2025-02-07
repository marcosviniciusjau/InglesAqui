<?php

use App\Controller\{HomeController,BookletsController,CartController,ProductController,
    ContactController,LoginADMController,TelaADMController,CadastrosController,ADMScreenController};

    $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

      switch ($url) 
{
        case '/':
            HomeController::index();
        break;
            
        case '/apostilas':
            BookletsController::index();
        break;

        case '/apostilas/pesquisar':
            BookletsController::getBooklets();
        break;

        case '/apostilas/carrinho':
            CartController::getCart();
        break;

        case '/apostilas/carrinho/adicionar':
            CartController::addCart();
        break;

        case '/apostilas/carrinho/excluir':
            CartController::deleteCartItem();
        break;

        case '/apostilas/carrinho/pagamento':
            CartController::paymentCart();
        break;
       
        case '/apostilas/categoria/viagem':
            BookletsController::categoryTrip();
        break;

        case '/apostilas/categoria/negocios':
            BookletsController::categoryBusiness();
        break;

        case '/apostilas/categoria/educacao':
            BookletsController::categoryLearn();
        break;

        case '/apostilas_desc':
            BookletsController::see();
        break;

         case '/pagamento':
            BookletsController::payment();
        break;

        case '/pagamento/cartao_credito':
            BookletsController::pagamentoCreditCard();
        break;

         case '/pagamento/cartao_debito':
            BookletsController::pagamentoDebitCard();
        break;

          case '/pagamento/boleto':
            BookletsController::pagamentoBoleto();
        break;

         case '/pagamento/pix':
            BookletsController::pagamentoPix();
        break;

         case '/pagamento/sucesso':
            BookletsController::enviarPagamentoSucesso();
        break;

        case '/pagamento/enviar':
            BookletsController::enviarPagamento();
            break;

        case '/product':
            ProductController::index();
        break;
    
        case '/product/form':
            ProductController::form();
        break;
    
        case '/product/form/save':
            ProductController::save();
        break;
        
        case '/product/form/update':
            ProductController::update();
        break;

        case '/product/getById':
            ProductController::getById();                       
        break;

        case '/product/delete':
            ProductController::delete();
        break;
        
        case '/adm-screen/my-data-adm':
            ADMScreenController::meusDados();
        break;

        case '/adm-screen/my-data-adm/salvar':
            ADMScreenController::meusDadosSalvar();
        break;
        
        case '/adm-screen':
            ADMScreenController::index();
        break;

        case '/cadastros':
            CadastrosController::index();
        break;
        case '/adm-screen/my-data-adm':
            ADMScreenController::meusDados();
        break;

        case '/adm-screen/my-data-adm/salvar':
            ADMScreenController::meusDadosSalvar();
        break;

        case '/login_adm':
            LoginADMController::index();
             break;
     
        case '/login_adm/autenticar':
            LoginADMController::autenticar();
        break;
         
        case '/logout':
            LoginADMController::logout();
        break;
     
        case '/esqueci-a-senha':
            LoginADMController::esqueciSenha();
        break;

        case '/contato':
            ContactController::index();
        break;

        case '/avaliacoes/form/save':
            AvaliacoesController::save();
        break;

        default:
        HomeController::error();
        break;
    
}