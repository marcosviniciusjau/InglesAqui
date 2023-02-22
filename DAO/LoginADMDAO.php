<?php

namespace App\DAO;
use \PDO;

class LoginADMDAO extends DAO
{
  
    public function __construct()
    {
       
        parent::__construct();       
    }

    public function setNewPassWordForUserByEmail($email_adm, $novasenha_adm)
    {
        $sql = "UPDATE adm SET senha_adm= sha1(?) WHERE email_adm=?";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $novasenha_adm);
        $stmt->bindValue(2, $email);
        $stmt->execute();
    }
    
    public function getByEmailAndSenha($email_adm, $senha_adm)
    {
        $sql = "SELECT a.id, a.email_adm,a.senha_adm

        FROM adm a WHERE a.email_adm=? AND a.senha_adm = sha1(?) ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $email_adm);
        $stmt->bindValue(2, $senha_adm);
        $stmt->execute();

        $dados_usuario = $stmt->fetchObject();

      
         return $dados_usuario;
    }


    
}