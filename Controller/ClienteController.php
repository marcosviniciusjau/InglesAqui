<?php

namespace App\Controller;
use App\Model\ClienteModel;
use App\Model\ProdutoModel;
class ClienteController extends Controller

{   
    public static function index()
    {
        
        parent::isProtected();
        
        $model = new ClienteModel();
       
     
        $model->getAllRows();
        
        
      
       parent::render('Cliente/ListaCliente', $model);
    }
    public static function ver()
    {
        parent::isProtected();

        
            if (isset($_GET['id'])) {
                $model = new ProdutoModel();

                $dados = $model->getById((int) $_GET['id']);

                self::cadCliente($dados);
            }
            
        

         
        }
    
    
    public static function cadCliente(ClienteModel $_model = null)
    {

        $model = ($_model == null) ? new ClienteModel() : $_model;

        include PATH_VIEW . 'modules/Cliente/FormCliente.php';
     

    }
public static function saveCliente(){
    $model = new ClienteModel();
    $model->id =  $_POST['id'];
    $model->nome = $_POST['nome'];
    $model->cpf = $_POST['cpf'];
    $model->email = $_POST['email'];
    $model->telefone = $_POST['telefone'];

    $model->save(); 
    $model-> getAllRows();
    parent::render('Cliente/SaveCliente', $model);
     
}
    public static function save()
    {  
        $model = new ClienteModel();

        $model->id =  $_POST['id'];
        $model->nome = $_POST['nome'];
        $model->cpf = $_POST['cpf'];
        $model->email = $_POST['email'];
        $model->telefone = $_POST['telefone'];
   
        $model->save(); 

        header("Location: /cliente");
    }
    
    public static function status(){

        parent::render('Cliente/status');

    }
}