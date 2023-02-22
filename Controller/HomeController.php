<?php

namespace App\Controller;
use App\Model\HomeModel;
use App\Model\ComentariosModel;
use \Exception;

class HomeController extends Controller
{
    public static function index()
    {
        parent::render('Home/home' );
    }
    
}