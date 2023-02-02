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
        $sql = "INSERT INTO livro (nome, valor,descricao, imagem) VALUES (?, ?, ?, ?) ";

        $stmt = $this->conexao->prepare($sql);


        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->valor);
        $stmt->bindValue(3, $model->descricao);
        $stmt->bindValue(4, $model->imagem);
        $stmt->execute();
    }



    public function update(ProdutoModel $model)
    {
        $sql = "UPDATE livro SET nome=?,  valor=?,descricao=?, imagem=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->valor);
        $stmt->bindValue(3, $model->descricao);
        $stmt->bindValue(4, $model->imagem);
        $stmt->bindValue(5, $model->id);
        $stmt->execute();
    }


    public function select()
    {
        $sql = "SELECT * FROM livro ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

   

    public function getById($id)
    {
        try {
            $stmt = $this->conexao->prepare("SELECT * FROM livro WHERE id = ?");
            $stmt->bindValue(1, $id);
            $stmt->execute();

            return $stmt->fetchObject('App\Model\ProdutoModel');
        } catch (PDOException $e) {

            throw new Exception("Erro ao obter o produto no banco de dados.");
        }
    }


    public function delete(int $id)
    {
        $sql = "DELETE FROM livro WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}
