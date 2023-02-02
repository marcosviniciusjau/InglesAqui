<?php
namespace App\Model;
use App\DAO\HomeDAO;
use App\DAO\ComentariosDAO;
use \PDO;
use \PDOException;

class HomeModel extends Model
{
    public $id, $nome;
    public $valor,$quantidade, $imagem, $comentarios;

    public $arr_comentarios;

   
    

    public function getById(int $id)
    {
        $dao = new HomeDAO();

        $obj = $dao->selectById($id); 

      
        return ($obj) ? $obj : new HomeModel(); 
    }

    public function getAllRows()
    {      

        $dao = new HomeDAO();
      
        $this->rows = $dao->getAllRows();
       
    }
   
 
}