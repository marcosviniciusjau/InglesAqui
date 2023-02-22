<?php

namespace App\Model;

use App\DAO\AvaliacoesDAO;

use \Exception;

class AvaliacoesModel extends Model
{
    public $id, $qtde_estrelas ;
  
    public function save()
    {
        $dao = new AvaliacoesDAO(); 


        if(empty($this->id))
        {
           
            $dao->insert($this);

        } else {

            $dao->update($this); 
        }        
    }
}
