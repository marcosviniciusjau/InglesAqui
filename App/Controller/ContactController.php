<?php

namespace App\Controller;
use \Exception;

class ContactController extends Controller
{
    public static function index()
    {
        parent::render('Contact/contact' );
    }
    
}