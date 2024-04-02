<?php

use App\Controller\{HomeController,BookletsController,ProductController,
    ContactController,LoginADMController,TelaADMController,CadastrosController,ADMController};

    $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

      switch ($url) 
{
        case '/':
            HomeController::index();
        break;
            
        case '/apostilas':
            BookletsController::index();
        break;

        case '/apostilas/carrinho':
            BookletsController::cart();
        break;

        case '/apostilas/pagamento':
            BookletsController::paymentCart();
        break;
       
        
        case '/apostilas_category/trip':
            BookletsController::categoryTrip();
        break;

        case '/apostilas_category/business':
            BookletsController::categoryBusiness();
        break;

        case '/apostilas_category/learn':
            BookletsController::categoryLearn();
        break;

        case '/apostilas_desc':
            BookletsController::see();
        break;

         case '/pagamento':
            BookletsController::payment();
        break;

        case '/pagamento/credit_card':
            BookletsController::pagamentoCreditCard();
        break;
         case '/pagamento/debit_card':
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

        case '/produto':
            ProductController::index();
        break;
    
        case '/produto/form':
            ProductController::form();
        break;
    
        case '/produto/form/save':
            ProductController::save();
        break;

        case '/produto/ver':
            ProductController::ver();                       
        break;

        case '/produto/delete':
            ProductController::delete();
        break;
        
        case '/tela-adm/meus-dados-adm':
            ADMController::meusDados();
        break;

        case '/tela-adm/meus-dados-adm/salvar':
            ADMController::meusDadosSalvar();
        break;
        
        case '/tela-adm':
            TelaADMController::index();
        break;

        case '/cadastros':
            CadastrosController::index();
        break;
        case '/tela-adm/meus-dados-adm':
            ADMController::meusDados();
        break;

        case '/tela-adm/meus-dados-adm/salvar':
            ADMController::meusDadosSalvar();
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
        case '/422':
            HomeController::error();
            break;
}