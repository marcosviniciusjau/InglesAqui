<?php
namespace App\Model;
use App\DAO\ProductsDAO;

class ProductsModel extends Model
{
    public $id, $name;
    public $price, $stock,$sold, $image;
    public $arr_products;

    public function save()
    {
        $dao = new ProductsDAO(); 

        $dao->insert($this);
    }

    public function update()
    {
        $dao = new ProductsDAO(); 

        $dao->update($this);  
    }

    public function getAll()
    {
        try {
            $dao = new ProductsDAO();
            $arr_products = $dao->select();

            if (is_array($arr_products))
                return $arr_products;
            else
                throw new Exception("Error retrieving the list of products.");
        } catch (Exception $e) {
            $this->validation_errors[] = $e->getMessage();
            throw new Exception("Error retrieving the list of products.");
        }
    }

    public function getAllRows()
    {
        $dao = new ProductsDAO();
        $this->rows = $dao->select();
    }

    public function getByCategoryTrip(int $id)
    {
        $dao = new ProductsDAO();
        $this->rows = $dao->getByCategoryTrip($id);
    }

    public function getByCategoryBusiness(int $id)
    {
        $dao = new ProductsDAO();
        $this->rows = $dao->getByCategoryBusiness($id);
    }

    public function getByCategoryLearn(int $id)
    {
        $dao = new ProductsDAO();
        $this->rows = $dao->getByCategoryLearn($id);
    }

    public function getAllRowsId()
    {
        $dao = new ProductsDAO();
        $model = new ProductsModel();
        $this->array_products = $dao->getAllRowsId((int)$_GET['id']);
    }

    public function getByCartIds($ids)
    {
        $dao = new ProductsDAO();
    
        $this->rows = $dao->getByCartIds($ids);
        
        return $this->rows;
    }
    
    public function getById(int $id)
    {
        try {
            $dao = new ProductsDAO();
            $data_product = $dao->getById($id);

            if (is_object($data_product))
                return $data_product;
            else
                throw new Exception("Product not found.");
        } catch (Exception $e) {
            $this->validation_errors[] = $e->getMessage();
            throw new Exception("Error in the DAO layer.");
        }
    }

    public $booklets = [];
    public function getBookletsByName($search) {
        $dao = new ProductsDAO();
        $this->booklets = $dao->getBookletsByName($search);
    }

    public $number_results = 0;
    public function getNumberOfResults($search) {
        $dao = new ProductsDAO();
        $this->number_results = $dao->getNumberOfResults($search);
    }

    public function delete(int $id)
    {
        $dao = new ProductsDAO();
        $dao->delete($id);
    }

    public function getAllRowsHome()
    {      
        $dao = new HomeDAO();
        $this->rows = $dao->getAllRows(); 
    }


}
