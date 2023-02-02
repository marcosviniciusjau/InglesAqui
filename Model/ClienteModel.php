<?php

namespace App\Model;
use App\DAO\ClienteDAO;

class ClienteModel extends Model
{
    public $id, $nome, $email, $cpf, $telefone;
    public function save()
    {
        $dao = new ClienteDAO(); 


        if(empty($this->id))
        {
           
            $dao->insert($this);

        } else {

            $dao->update($this); 
        }        
    }
    public function getAllRows()
    {
     
        
          $dao = new ClienteDAO();
         $this->rows = $dao->select();
    }

    public function selectById(int $id)
    {
        $dao = new ClienteDAO();
        $this->rows = $dao->selectById($id);
    

      
    }
    public function getById(int $id)
    {
        try 
        {
            $dao = new ClienteDAO();

            $dados_cliente = $dao->getById($id);

            if(is_object($dados_cliente))
                return $dados_cliente;
            else 
                throw new Exception("Produto não encontrado.");

        } catch (Exception $e) {

            $this->validaton_erros[] = $e->getMessage();

            throw new Exception("Erro na camada DAO.");
        }   
    
    }
 
  
}


   