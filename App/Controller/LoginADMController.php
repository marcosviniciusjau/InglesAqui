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
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');

        if ($email && $password) {
            $login_dao = new LoginADMDAO();
            $resultado = $login_dao->getByEmailAndPassword($email, $password);

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
        return htmlspecialchars($_SESSION['adm_logado']['email']);
    }

    public static function updateNameOfCurrentUser($email)
    {
        $_SESSION['adm_logado']['email'] = $email;
    }

    public static function getIdOfCurrentUser()
    {
        return $_SESSION['adm_logado']['id'];
    }
}
