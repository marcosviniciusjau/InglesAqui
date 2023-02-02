<?php
//As classes DAO são responsáveis por executar o SQL em conjunto com o banco de dados.
namespace App\DAO;

use App\Model\ClienteModel;

use \PDO;
use \PDOException;
use \Exception;

class ClienteDAO  extends DAO
{
    // Propriedade da classe que  armazenará o link de conexão com o banco de dados.



    public function __construct()
    {
        parent::__construct();
    }


    public function insert(ClienteModel $model)
    {
        $sql = "INSERT INTO clientes (nome, cpf,email, telefone) VALUES (?, ?, ?, ?) ";

        $stmt = $this->conexao->prepare($sql);


        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->cpf);
        $stmt->bindValue(3, $model->email);
        $stmt->bindValue(4, $model->telefone);
        $stmt->execute();
    }



    public function update(ClienteModel $model)
    {
        $sql = "UPDATE clientes SET nome=?,  cpf=?,email=?, telefone=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->cpf);
        $stmt->bindValue(3, $model->email);
        $stmt->bindValue(4, $model->telefone);
        $stmt->bindValue(5, $model->id);
        $stmt->execute();
    }


    public function select()
    {
        $sql = "SELECT * FROM clientes where id=1";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

   
    public function selectById($id)
    {


        $sql = "SELECT * FROM clientes WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS); 
    }


    public function delete(int $id)
    {
        $sql = "DELETE FROM livro WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}
