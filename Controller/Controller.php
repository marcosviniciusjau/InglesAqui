<?php

/**
 * Definição do namespace da controller. Veja que temos o namespace chamado "App"
 * e dentro do namespace App temos o subnamespace "Controller". Também é importante
 * observar que eles são o mesmo caminho de diretórios e usamos barra invertida
 * para definir os namespaces.
 * Leia mais sobre namespaces => http://www.diogomatheus.com.br/blog/php/entendendo-namespaces-no-php/
 * Namespaces no manual => https://www.php.net/manual/pt_BR/language.namespaces.rationale.php
 */
namespace App\Controller;

use App\Model\ProdutoModel;
abstract class Controller 
{
    protected $id_categoria; 
    protected $validation_errors = array();
    public function setCategoria(int $_id_categoria)
    {
        if (!empty($_id_categoria)) {
            $this->id_categoria = $_id_categoria;
        } else {
            $this->validation_errors[] = "Desculpe, selecione a categoria.";
        }
    }

    protected static function render($view, $model = null, $orders= null)
    {
        $arquivo_view = VIEWS . $view . ".html";
        $arquivo_view_php = VIEWS . $view . ".php";
    
        if (file_exists($arquivo_view)) {
            include $arquivo_view;
        } elseif (file_exists($arquivo_view_php)) {
            include $arquivo_view_php;
        } else {
            exit('Arquivo da View não encontrado. Arquivo: ' . $view);
        }
    }

    protected static function isProtected()
    {
        if (!isset($_SESSION['adm_logado'])) {
            header("location: /login_adm");
            exit(); 
        }
    }
}
