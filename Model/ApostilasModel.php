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

public function getAllRows()
    {      

        $dao = new HomeDAO();
      
        $this->rows = $dao->getAllRows();
       
    }
}