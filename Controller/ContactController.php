<?php

namespace App\Controller;
use \Exception;

class ContatoController extends Controller
{
    public static function index()
    {
        parent::render('Contato/contato' );
    }
    
}