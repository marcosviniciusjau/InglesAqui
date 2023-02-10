<?php
//As classes DAO são responsáveis por executar o SQL em conjunto com o banco de dados.
namespace App\DAO;

use App\Model\ProdutoModel;
use App\DAO\CategoriaDAO;
use \PDO;
use \PDOException;
use \Exception;

class ProdutoDAO  extends DAO
{
    // Propriedade da classe que  armazenará o link de conexão com o banco de dados.



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
        $sql = "SELECT * FROM apostilas ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function getAllRowsId($id)
    {
        try {
            $stmt = $this->conexao->prepare("SELECT * FROM apostilas  where id <> ? and valor > 30");
            $stmt->bindValue(1, $id);
            $stmt->execute();

            return $stmt->fetchObject('App\Model\ProdutoModel');
        } catch (PDOException $e) {

            throw new Exception("Erro ao obter o produto no banco de dados.");
        }
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


    public function delete(int $id)
    {
        $sql = "DELETE FROM apostilas WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}
