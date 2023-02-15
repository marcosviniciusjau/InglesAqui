<?php

namespace App\Controller;

use App\Model\AvaliacoesModel;

use \Exception;
use App\DAO\AvaliacoesDAO;

class AvaliacoesController extends Controller
{

public static function save()
    {
     
        
        $model = new AvaliacoModel();

        $model->id =  $_POST['id'];
        $model->nome = $_POST['nome'];
        $model->valor = $_POST['valor'];
        $model->descricao = $_POST['descricao'];
        $model->id_hotmart = $_POST['id_hotmart'];

        $model->save(); 

        header("Location: /avaliacao");
    }
}