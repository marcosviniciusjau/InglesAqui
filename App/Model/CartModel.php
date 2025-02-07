<?php
namespace App\Model;
use App\DAO\BookletsDAO;

class BookletsModel extends Model
{
    public $id, $name;
    public $price, $stock,$sold, $image;

    public function getByCartIds($ids){
            $dao = new BookletsDAO();
        
            $this->rows = $dao->getByCartIds($ids);
            
            return $this->rows;
    }
}