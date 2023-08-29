<?php

/**
 * This function registers with PHP the function (in the code below,
 * an anonymous function) responsible for searching and including the
 * required classes and HTML files during script execution. The anonymous
 * function takes a parameter that is the name of the requested resource.
 */
spl_autoload_register(function ($class_name) {
    $class_file = BASEDIR . '/' . str_replace('\\', '/', $class_name) . '.php';
    
    if (file_exists($class_file)) {
        include $class_file;
    }
        else {
            exit('Classe não encontrada: ' . $class_file . "<br />");
        }

    }

);