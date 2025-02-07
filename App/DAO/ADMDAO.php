<?php

namespace App\DAO;
use App\Model\ADMModel;
class ADMDAO extends DAO
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getById($id)
    {
        try 
        {
            $stmt = $this->conn->prepare("SELECT * FROM adm WHERE id = ?");
            $stmt->bindValue(1, $id);
            $stmt->execute();

            return $stmt->fetchObject('App\Model\ADMModel');

        } catch (PDOException $e) {
            
            throw new Exception("Erro ao obter o produto no banco de dados.");
        }
    }

    public function update(ADMModel $model)
    {
        $sql = "UPDATE adm SET  email=?,password=sha2(?) where id=?";
        $stmt = $this->conn->prepare($sql);
    
        $stmt->bindValue(1, $model->email);
        $stmt->bindValue(2, $model->password);
        $stmt->bindValue(3, $model->id);
        $stmt->execute();
    }

    public function getAllRows() 
    {
        $sql = "SELECT id,email,password FROM adm";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_CLASS);
    }

 
    public function delete($id) 
    {
        $sql = "DELETE FROM adm WHERE id = ? ";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }


    public function getMyUserById($id) 
    {
        $stmt = $this->conn->prepare("SELECT id, email, password FROM adm WHERE id = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject();            
    }

    public function checkUserByIdAndPassword($id, $password)
    {
        $stmt = $this->conn->prepare("SELECT id FROM adm WHERE id = ? AND password = sha2(?)");
        $stmt->bindValue(1, $id);
        $stmt->bindValue(2, $password);
        $stmt->execute();

        return $stmt->fetchObject();
    }


    public function checkDuplicateEmail($email, $id_adm)
    {
        $stmt = $this->conn->prepare("SELECT id FROM _adm WHERE email = ?");
        $stmt->bindValue(1, $email);
        $stmt->execute();

        $dados = $stmt->fetchObject();

        if(is_object($dados))
        {
            if($id_usuario == $dados->id)
                return false;
            else  
                return true;
        } else
            return false;
    }

    
}