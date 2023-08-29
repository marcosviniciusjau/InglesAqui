<?php

namespace App\DAO;
use \PDO;

class LoginADMDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();       
    }

    public function setNewPasswordForUserByEmail($email_adm, $novasenha_adm)
    {
        $sql = "UPDATE adm SET senha_adm = :senha_adm WHERE email_adm = :email_adm";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':senha_adm', password_hash($novasenha_adm, PASSWORD_DEFAULT));
        $stmt->bindValue(':email_adm', $email_adm);
        $stmt->execute();
    }
    
    public function getByEmailAndSenha($email_adm, $senha_adm)
    {
        $sql = "SELECT id, email_adm, senha_adm
        FROM adm
        WHERE email_adm = :email_adm AND senha_adm = :senha_adm";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':email_adm', $email_adm);
        $stmt->bindValue(':senha_adm', $senha_adm);
        $stmt->execute();

        $dados_usuario = $stmt->fetchObject();

        return $dados_usuario;
    }
}
