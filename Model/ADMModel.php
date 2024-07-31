<?php

namespace App\Model;

use App\DAO\ADMDAO;

class ADMModel extends Model
{
    public $id, $email, $password;

    public function save()
    {
        $dao = new ADMDAO(); 

        if(empty($this->id))
        {
           
            $dao->insert($this);

        } else {

            $dao->update($this); 
        }        
    }

    public function getAllRows()
    { 
        $dao = new ADMDAO();

        $this->rows = $dao->getAllRows();
    }

    
    public function getById(int $id)
    {
        try 
        {
            $dao = new ADMDAO();

            $dados_adm = $dao->getById($id);

            if(is_object($dados_adm))
                return $dados_adm;
            else 
                throw new Exception("User not found.");

        } catch (Exception $e) {

            $this->validaton_erros[] = $e->getMessage();

            throw new Exception("Erro na camada DAO.");
        }  
     }
}
