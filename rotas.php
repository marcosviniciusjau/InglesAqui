<?php

use App\Controller\{HomeController,ApostilasController,ProdutoController,
    ContatoController,LoginADMController,TelaADMController,CadastrosController,ADMController};

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($url) 
{
        case '/':
            HomeController::index();
        break;
            
        case '/apostilas':
            ApostilasController::index();
        break;

        case '/apostilas_desc':
            ApostilasController::ver();
        break;

        case '/produto':
            ProdutoController::index();
        break;
    
        case '/produto/form':
            ProdutoController::form();
        break;
    
        case '/produto/form/save':
            ProdutoController::save();
        break;

        case '/produto/ver':
            ProdutoController::ver();                       
        break;

        case '/produto/delete':
            ProdutoController::delete();
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
            ContatoController::index();
            break;

            case '/avaliacoes/form/save':
                AvaliacoesController::save();
            break;

        default:

        echo "Erro 404";
        break;
}
