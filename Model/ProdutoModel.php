<?php

namespace App\Model;

use App\DAO\ProdutoDAO;

use \Exception;

class ProdutoModel extends Model
{
    public $id, $nome ;
    public $valor,$descricao,$id_hotmart, $imagem;
    
    public $array_produtos;

    public function save()
    {
        $dao = new ProdutoDAO(); 


        if(empty($this->id))
        {
           
            $dao->insert($this);

        } else {

            $dao->update($this); 
        }        
    }
    public function getAll()
    {
        try 
        {
            $dao = new ProdutoDAO();

            $arr_produtos = $dao->select();

            if(is_array($arr_produtos))
                return $arr_produtos;
            else 
                throw new Exception("Erro ao obter a lista de produtos.");

        } catch (Exception $e) {

            $this->validaton_erros[] = $e->getMessage();

            throw new Exception("Erro ao obter a lista de produtos.");
        }

    }
    public function getAllRows()
    {
         $dao = new ProdutoDAO();
         $this->rows = $dao->select();
    }

   public function getByCategoryTrip(int $id)
    { 
          $dao = new ProdutoDAO();
         $this->rows = $dao->getByCategoryTrip($id);
   
    
    }

     public function getByCategoryBusiness(int $id)
    {
         $dao = new ProdutoDAO();
         $this->rows = $dao->getByCategoryBusiness($id);
    }

      public function getByCategoryLearn(int $id)
    {
         $dao = new ProdutoDAO();
         $this->rows = $dao->getByCategoryLearn($id);
    }


    public function getAllRowsId()
    {
         $dao = new ProdutoDAO();
          $model= new ProdutoModel();
         $this->array_produtos = $dao->getAllRowsId((int) $_GET['id']);
    }

    public function getById(int $id)
    {
        try 
        {
            $dao = new ProdutoDAO();

            $dados_produto = $dao->getById($id);

            if(is_object($dados_produto))
                return $dados_produto;
            else 
                throw new Exception("Produto não encontrado.");

        } catch (Exception $e) {

            $this->validaton_erros[] = $e->getMessage();

            throw new Exception("Erro na camada DAO.");
        }   
    
    }

    public function delete(int $id)
    {
        $dao = new ProdutoDAO();

        $dao->delete($id);
    }

 
  
}
