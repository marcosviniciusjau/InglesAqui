<?php

namespace App\Controller;

class ADMScreenController extends Controller
{
    public static function index()
    {
        parent::isProtected();
        parent::render('ADMScreen/adm-screen');
    }

    public static function logout()
    {
        parent::isProtected();
        if (isset($_SESSION["adm_logado"])) {
            unset($_SESSION["adm_logado"]);
        }
        session_regenerate_id(true); // Regenera o ID da sessão

        header("Location: /login_adm");
        exit();
    }
}
