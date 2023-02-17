<?php

use App\Controller\{HomeController,ApostilasController,ProdutoController,Avaliacoes1Controller};

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

        case 'cadastroavaliacoes1':
            Avaliacoes1Controller::save();
            break;


        default:

        echo "Erro 404";
        break;
}
