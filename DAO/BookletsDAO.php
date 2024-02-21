<?php

namespace App\DAO;

use App\Model\BookletsModel;
use \PDO;
use \PDOException;
use \Exception;

class BookletsDAO  extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert(BookletsModel $model)
    {
        $sql = "INSERT INTO booklets (name, price,description, image) VALUES (?, ?, ?, ?) ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->name);
        $stmt->bindValue(2, $model->price);
        $stmt->bindValue(3, $model->description);
        $stmt->bindValue(4, $model->image);
        $stmt->execute();
    }

    public function update(BookletsModel $model)
    {
        $sql = "UPDATE booklets SET name=?,price=?,description=?, image=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->name);
        $stmt->bindValue(2, $model->price);
        $stmt->bindValue(3, $model->description);
        $stmt->bindValue(4, $model->image);
        $stmt->bindValue(5, $model->id);
        $stmt->execute();
    }

    public function select()
    {
        $sql = "SELECT * FROM booklets";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function getAllRowsId($id)
    {
        $sql = "SELECT * FROM booklets WHERE id<> ? and price > 30";
        $stmt = $this->conexao->prepare($sql);
       
        $stmt->bindValue(1,$id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function getById($id)
    {
        try {
            $stmt = $this->conexao->prepare("SELECT * FROM booklets WHERE id = ?");
            $stmt->bindValue(1, $id);
            $stmt->execute();
            return $stmt->fetchObject('App\Model\BookletsModel');
            
        } catch (PDOException $e) {

            throw new Exception("Erro ao obter o produto no banco de dados.");
        }
    }
    public function getByCategoryTrip($id)
    {
        try {
            $stmt = $this->conexao->prepare("SELECT * FROM booklets WHERE id in (1,3,5,6)");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS,'App\Model\BookletsModel');
            
        } catch (PDOException $e) {
         throw new Exception("Erro ao obter o produto no banco de dados.");
        }
    }

      public function getByCategoryBusiness($id)
    {
        try {
            $stmt = $this->conexao->prepare("SELECT * FROM booklets WHERE id = 7");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS,'App\Model\BookletsModel');
            
        } catch (PDOException $e) {
         throw new Exception("Erro ao obter o produto no banco de dados.");
        }
    }

  public function getByCategoryLearn($id)
    {
        try {
            $stmt = $this->conexao->prepare("SELECT * FROM booklets WHERE id in (2,4)");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS,'App\Model\BookletesModel');
            
        } catch (PDOException $e) {
         throw new Exception("Erro ao obter o produto no banco de dados.");
        }
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM booklets WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }


}
