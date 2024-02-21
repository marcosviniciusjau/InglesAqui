<?php
namespace App\DAO;
use App\Model\HomeModel;
use \PDO;

class HomeDAO extends DAO
{


    public function __construct()
    {
        parent::__construct();   
     }
     
     public function getAllRows() {
        
        $stmt = $this->conexao->prepare("SELECT * FROM booklets");
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_CLASS);
    }
}