<?php

namespace App\Controller;
use \Exception;

class HomeController extends Controller
{
    public static function index()
    {
        parent::render('Home/home' );
    }
    
}