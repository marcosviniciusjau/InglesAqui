<?php

namespace App\DAO;
use App\Model\ADMModel;
class ADMDAO extends DAO
{
    /**
     * Cria uma novo objeto para fazer o CRUD dos Usuário
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Retorna um registro específico da tabela Grupo de Usuário
     */
     
    public function getById($id)
    {
        try 
        {
            $stmt = $this->conexao->prepare("SELECT * FROM adm WHERE id = ?");
            $stmt->bindValue(1, $id);
            $stmt->execute();

            return $stmt->fetchObject('App\Model\ADMModel');

        } catch (PDOException $e) {
            
            throw new Exception("Erro ao obter o produto no banco de dados.");
        }
    }

    public function update(ADMModel $model)
    {
        $sql = "UPDATE adm SET  email_adm=?,senha_adm=sha1(?) where id=?";
        $stmt = $this->conexao->prepare($sql);
    
        $stmt->bindValue(1, $model->email_adm);
        $stmt->bindValue(2, $model->senha_adm);
        $stmt->bindValue(3, $model->id);
        $stmt->execute();
    }

    public function getAllRows() 
    {
        $sql = "SELECT id, email_adm , senha_adm FROM adm";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_CLASS);
    }

    /**
     * Método que insere uma categoria na tabela Categoria.
     */
    public function insert(ADMModel $model)
   
    {
        $sql = "INSERT INTO adm ( email_adm, senha_adm) VALUES (?, sha1(?))";


        // com o MySQL, via operador seta "->". Isso significa que o prepare "está dentro"
        // da propriedade $conexao e recebe nossa string sql com os devidor marcadores.

  $stmt = $this->conexao->prepare($sql);



    
        $stmt->bindValue(1, $model->email_adm);
        $stmt->bindValue(2, $model->senha_adm);
       
      
        $stmt->execute();
   
    }


    /**
     * Remove um registro da tabela Categoria.
     */
    public function delete($id) 
    {
        $sql = "DELETE FROM adm WHERE id = ? ";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }


    /**
     * Retorna um usuário específico
     */
    public function getMyUserById($id) 
    {
        $stmt = $this->conexao->prepare("SELECT id, email_adm, senha_adm FROM adm WHERE id = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject();            
    }

    public function checkUserByIdAndPassword($id, $senha)
    {
        $stmt = $this->conexao->prepare("SELECT id FROM adm WHERE id = ? AND senha = sha1(?)");
        $stmt->bindValue(1, $id);
        $stmt->bindValue(2, $senha);
        $stmt->execute();

        return $stmt->fetchObject();
    }


    public function checkDuplicateEmail($email, $id_adm)
    {
        $stmt = $this->conexao->prepare("SELECT id FROM _adm WHERE email = ?");
        $stmt->bindValue(1, $email);
        $stmt->execute();

        $dados = $stmt->fetchObject();

        // Caso retorne um id, verificar se o id pertence ao proprio usuário que
        // está sendo editado. Se pertencer a outro usuário, acusará email já
        // vinculado a outro usuário.
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