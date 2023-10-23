<?php

namespace App\Controller;
use App\Model\ApostilasModel;
use App\Model\ProdutoModel;
class ApostilasController extends Controller
{
    public static function index()
    {
        $model = new ApostilasModel();
        $model->getAllRows();

        parent::render('Apostilas/apostilas',$model);
    }

    public static function ver()
    {    
        try {
            if (isset($_GET['id'])) {
                $model = new ProdutoModel();

                $dados = $model->getById((int) $_GET['id']);
              
                self::desc($dados);
            } 
        } catch (Exception $e) {  

        }
    }

    public static function desc(ProdutoModel $_model = null)
    {
    
        $model = ($_model == null) ? new ProdutoModel() : $_model;
       
        $model->getAllRowsId((int) $_GET['id']);

        parent::render('Apostilas/apostilas_desc' ,$model);

    }

    public static function categoryTrip()
    {
        $model =  new ProdutoModel();
       
        $model->getByCategoryTrip((int) $_GET['id']);

        parent::render('Apostilas/apostilas',$model);
    }

    public static function categoryBusiness()
    {
        $model =  new ProdutoModel();
        $model->getByCategoryBusiness((int) $_GET['id']);

        parent::render('Apostilas/apostilas',$model);
    }

    public static function categoryLearn()
    {
        $model =  new ProdutoModel();
        $model->getByCategoryLearn((int) $_GET['id']);

        parent::render('Apostilas/apostilas',$model);
    }
    

}