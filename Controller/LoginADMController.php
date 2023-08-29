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
        $email_adm = filter_input(INPUT_POST, 'email_adm', FILTER_VALIDATE_EMAIL);
        $senha_adm = filter_input(INPUT_POST, 'senha_adm');

        if ($email_adm && $senha_adm) {
            $login_dao = new LoginADMDAO();
            $resultado = $login_dao->getByEmailAndSenha($email_adm, $senha_adm);

            if ($resultado !== false) {
                $_SESSION["adm_logado"] = (array) $resultado;
                header("Location: /tela-adm");
                exit();
            } else {
                echo "<script language='javascript' type='text/javascript'>
                    alert('Dados Incorretos');
                    window.location.href='/login_adm';
                </script>";
                exit();
            }
        } else {
            echo "<script language='javascript' type='text/javascript'>
                alert('Dados inválidos');
                window.location.href='/login_adm';
            </script>";
            exit();
        }
    }

    public static function logout()
    {
        unset($_SESSION["adm_logado"]);
        parent::isprotected();
        header("Location:/login_adm");
        exit();
    }

    public static function getEmalOfCurrentUser()
    {
        return htmlspecialchars($_SESSION['adm_logado']['email_adm']);
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
