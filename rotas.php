<?php

use App\Controller\{HomeController,ApostilasController,ClienteController,
                    ProdutoController};

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($url) 
{
        case '/':
            HomeController::index();
        break;
         
        case'home_css':
            HomeController::css();
            
        case '/apostilas':
            ApostilasController::index();
            break;

       case'/cadCliente':
           ClienteController::cadCliente();
          break;

          case'/saveCliente':
            ClienteController::saveCliente();
           break;
           
           case'/status':
            ClienteController::status();
           
          case'/cliente':
            ClienteController::index();
      

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
        
        case '/produto/ordenar':
            ProdutoController::ordenar();
            break;

        case '/produto/ver':
            ProdutoController::ver();                       
        break;
        case '/produto/delete':
        ProdutoController::delete();
        break;

        default:
        echo "Erro 404";
        break;
}
