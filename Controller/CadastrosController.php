<?php

namespace App\Controller;


class CadastrosController extends Controller
{
    public static function index()
    {
        parent::isProtected();
        
        parent::render('TelaADM/cadastros');

    }
}