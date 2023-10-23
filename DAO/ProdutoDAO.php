<?php

namespace App\DAO;

use App\Model\ProdutoModel;
use \PDO;
use \PDOException;
use \Exception;

class ProdutoDAO  extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert(ProdutoModel $model)
    {
        $sql = "INSERT INTO apostilas (nome, valor,descricao,id_hotmart, imagem) VALUES (?, ?, ?, ?,?) ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->valor);
        $stmt->bindValue(3, $model->descricao);
        $stmt->bindValue(4, $model->id_hotmart);
        $stmt->bindValue(5, $model->imagem);
        $stmt->execute();
    }

    public function update(ProdutoModel $model)
    {
        $sql = "UPDATE apostilas SET nome=?,valor=?,descricao=?,id_hotmart=?, imagem=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->valor);
        $stmt->bindValue(3, $model->descricao);
        $stmt->bindValue(4, $model->id_hotmart);
        $stmt->bindValue(5, $model->imagem);
        $stmt->bindValue(6, $model->id);
        $stmt->execute();
    }

    public function select()
    {
        $sql = "SELECT * FROM apostilas";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function getAllRowsId($id)
    {
        $sql = "SELECT * FROM apostilas WHERE id<> ? and valor > 30";
        $stmt = $this->conexao->prepare($sql);
       
        $stmt->bindValue(1,$id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function getById($id)
    {
        try {
            $stmt = $this->conexao->prepare("SELECT * FROM apostilas WHERE id = ?");
            $stmt->bindValue(1, $id);
            $stmt->execute();
            return $stmt->fetchObject('App\Model\ProdutoModel');
            
        } catch (PDOException $e) {

            throw new Exception("Erro ao obter o produto no banco de dados.");
        }
    }
    public function getByCategoryTrip($id)
    {
        try {
            $stmt = $this->conexao->prepare("SELECT * FROM apostilas WHERE id in (1,3,5,6)");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS,'App\Model\ProdutoModel');
            
        } catch (PDOException $e) {
         throw new Exception("Erro ao obter o produto no banco de dados.");
        }
    }

      public function getByCategoryBusiness($id)
    {
        try {
            $stmt = $this->conexao->prepare("SELECT * FROM apostilas WHERE id = 7");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS,'App\Model\ProdutoModel');
            
        } catch (PDOException $e) {
         throw new Exception("Erro ao obter o produto no banco de dados.");
        }
    }

  public function getByCategoryLearn($id)
    {
        try {
            $stmt = $this->conexao->prepare("SELECT * FROM apostilas WHERE id in (2,4)");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS,'App\Model\ProdutoModel');
            
        } catch (PDOException $e) {
         throw new Exception("Erro ao obter o produto no banco de dados.");
        }
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM apostilas WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }


}
