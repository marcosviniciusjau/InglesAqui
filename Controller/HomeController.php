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

    public static function css()
    {
        include PATH_VIEW . 'modules/Home/home.css';
       
    }
    
}