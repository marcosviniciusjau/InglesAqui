<?php
namespace App\Model;
use App\DAO\ProductsDAO;

class ProductsModel extends Model
{
    public $id, $name;
    public $price, $stock,$sold, $image;

    public function getByCartIds($ids){
            $dao = new ProductsDAO();
        
            $this->rows = $dao->getByCartIds($ids);
            
            return $this->rows;
    }
}