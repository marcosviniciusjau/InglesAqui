<?php

namespace App\Controller;


class TelaADMController extends Controller
{
    public static function index()
    {
        parent::isProtected();
        
        parent::render('TelaADM/tela-adm');

    }
    public static function logout()
    {
        
        
        unset($_SESSION["adm_logado"]);
        header("Location:/login_adm");
        parent::isProtected();
    
    }
}