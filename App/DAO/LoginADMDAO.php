<?php

namespace App\DAO;
use \PDO;

class LoginADMDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();       
    }

    public function setNewPasswordForUserByEmail($email, $newpassword)
    {
        $sql = "UPDATE adm SET password = :password WHERE email = :email";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':password', password_hash($newpassword, PASSWORD_DEFAULT));
        $stmt->bindValue(':email', $email);
        $stmt->execute();
    }
    
    public function getByEmailAndPassword($email, $password)
    {
        $sql = "SELECT id, email, password
                FROM adm
                WHERE email = :email";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();

        $user_data = $stmt->fetchObject();

        if ($user_data && password_verify($password, $user_data->password)) {
            return $user_data;
        } else {
            return null; 
        }
}

}
