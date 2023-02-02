<?php

namespace App\Controller;
use App\Model\ApostilasModel;
use App\Model\ProdutoModel;
class ApostilasController extends Controller
{
    public static function index()
    {
        parent::isProtected();
        $model = new ApostilasModel();
        $model->getAllRows();
        parent::render('Apostilas/apostilas',$model);

    }
    public static function ver()
    {
        parent::isProtected();

        try {
            if (isset($_GET['id'])) {
                $model = new ProdutoModel();

                $dados = $model->getById((int) $_GET['id']);

                self::desc($dados);
            } 
        } catch (Exception $e) {

         
        }
    }
    public static function ver1()
    {
        parent::isProtected();

        
            if (isset($_GET['id'])) {
                $model = new ProdutoModel();

                $dado = $model->getById((int) $_GET['id']);

                self::cadCliente($dado);
            }
            
        

         
        }
    public static function cadCliente(ProdutoModel $_model = null)
    {

        $model = ($_model == null) ? new ProdutoModel() : $_model;

        parent::render('Apostilas/FormCliente', $model);

    }

    public static function desc(ProdutoModel $_model = null)
    {
        
        parent::isProtected();

        $model = ($_model == null) ? new ProdutoModel() : $_model;

       
      
      
        parent::render('Apostilas/apostilas_desc' ,$model);

    }
}