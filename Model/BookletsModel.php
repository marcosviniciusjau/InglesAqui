<?php
namespace App\Model;
use App\DAO\BookletsDAO;

class BookletsModel extends Model
{
    public $id, $name;
    public $price, $stock,$sold, $image;
    public $arr_products;

    public function save()
    {
        $dao = new BookletsDAO();

        if (empty($this->id)) {
            $dao->insert($this);
        } else {
            $dao->update($this);
        }
    }

    public function getAll()
    {
        try {
            $dao = new BookletsDAO();
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
        $dao = new BookletsDAO();
        $this->rows = $dao->select();
    }

    public function getByCategoryTrip(int $id)
    {
        $dao = new BookletsDAO();
        $this->rows = $dao->getByCategoryTrip($id);
    }

    public function getByCategoryBusiness(int $id)
    {
        $dao = new BookletsDAO();
        $this->rows = $dao->getByCategoryBusiness($id);
    }

    public function getByCategoryLearn(int $id)
    {
        $dao = new BookletsDAO();
        $this->rows = $dao->getByCategoryLearn($id);
    }

    public function getAllRowsId()
    {
        $dao = new BookletsDAO();
        $model = new BookletsModel();
        $this->array_products = $dao->getAllRowsId((int)$_GET['id']);
    }

    public function getByCartIds($ids)
    {
        // Criar uma instância do DAO
        $dao = new BookletsDAO();
    
        // Chamar a função do DAO e passar os IDs do carrinho
        $this->rows = $dao->getByCartIds($ids);
        
        // Retorna os resultados, se necessário
        return $this->rows;
    }
    

    public function getById(int $id)
    {
        try {
            $dao = new BookletsDAO();
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

    public function delete(int $id)
    {
        $dao = new BookletsDAO();
        $dao->delete($id);
    }

    public function getAllRowsHome()
    {      
        $dao = new HomeDAO();
        $this->rows = $dao->getAllRows(); 
    }


}
