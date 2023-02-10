<?php
namespace App\Model;
use App\DAO\HomeDAO;
use App\DAO\ComentariosDAO;
use \PDO;
use \PDOException;

class ApostilasModel extends Model
{
    public $id, $nome;
    public $valor,$quantidade, $imagem;
    public $arr_produtos;

public function getAllRows()
    {      

        $dao = new HomeDAO();
      
        $this->rows = $dao->getAllRows();
       
    }
    public function getAllRowsId(int $id)
    {
     
        
          $dao = new ProdutoDAO();
         $this->arr_produtos = $dao->getAllRowsId($id);
    }
}