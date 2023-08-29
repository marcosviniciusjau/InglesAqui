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
        if (isset($_SESSION["adm_logado"])) {
            unset($_SESSION["adm_logado"]);
        }
        session_regenerate_id(true); // Regenera o ID da sessão

        header("Location: /login_adm");
        exit();
    }
}
