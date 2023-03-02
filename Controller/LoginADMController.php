<?php

namespace App\Controller;
use App\DAO\LoginADMDAO;
use Exception;
class LoginADMController extends Controller
{
    public static function index()
    {
        parent::render('LoginADM/login_adm');

    }
    
    public static function esqueciSenha() 
    {

        parent::render('LoginADM/esqueci-senha');
    }


  

   

    public static function autenticar()
    {
        $email_adm = $_POST["email_adm"];
        $senha_adm   = $_POST["senha_adm"];

        $login_dao = new LoginADMDAO();

        $resultado = $login_dao->getByEmailAndSenha($email_adm, $senha_adm);

        if($resultado !== false)
        {
            $_SESSION["adm_logado"] = (array) $resultado;
                               

            //var_dump($_SESSION["usuario_logado"]);

            header("Location: /tela-adm");

        } else
         echo"<script language='javascript' type='text/javascript'>
        alert('Dados Incorretos');window.location.href='/login_adm';</script>"; 
              
    }

    public static function logout()
    {
        
        
        unset($_SESSION["adm_logado"]);
        parent::isprotected();
        header("Location:/login_adm");
    
    }

    
    public static function getEmalOfCurrentUser()
    {
        return $_SESSION['adm_logado']['email_adm'];
    }


    public static function updateNameOfCurrentUser($email_adm)
    {
        $_SESSION['adm_logado']['email_adm'] = $email_adm;
    }

    
    public static function getIdOfCurrentUser()
    {
        return $_SESSION['adm_logado']['id'];
    }
    

}