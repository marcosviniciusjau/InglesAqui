<?php

namespace App\Controller;

use App\Model\ProdutoModel;

use \Exception;
use App\DAO\{ProdutoDAO,CategoriaDAO};

class ProdutoController extends Controller
{


    public static function index()
    {    
        parent::isProtected();

        $model = new ProdutoModel();
       
        $model->getAllRows();
        
       parent::render('Produto/ListaProduto', $model);
    }

    
    public static function form(ProdutoModel $_model = null)
    {
        parent::isProtected();

        $model = ($_model == null) ? new ProdutoModel() : $_model;

        include PATH_VIEW . 'modules/Produto/FormProduto.php';
       
    }
   
public static function save()
{
    try {
        $model = new ProdutoModel();

        $model->id = $_POST['id'];
        $model->nome = $_POST['nome'];
        $model->valor = $_POST['valor'];
        $model->descricao = $_POST['descricao'];

        $arquivo = $_FILES['arquivo_up'];

        // Valida o arquivo
        if ($arquivo['size'] > 1000000) {
            throw new Exception("O arquivo é muito grande. O tamanho máximo permitido é 10MB.");
        }

        if (!in_array($arquivo['type'], ['image/jpeg', 'image/png'])) {
            throw new Exception("O arquivo deve ser uma imagem.");
        }

        if (is_executable($arquivo['tmp_name'])) {
            throw new Exception("Arquivos executáveis não são permitidos.");
        }

        // Gera um nome único para o arquivo
        $nome_unico = uniqid() . '.' . pathinfo($arquivo['name'], PATHINFO_EXTENSION);

        // Carrega o arquivo
        $imagem = imagecreatefrompng($arquivo['tmp_name']);

        // Salva a imagem redimensionada
        imagepng($imagem, UPLOADS . $nome_unico);

        $model->imagem = $nome_unico;

        $model->save();
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    header('Location: /produto');
}


    public static function ver()
    {
        parent::isProtected();
        try {
            if (isset($_GET['id'])) {
                $model = new ProdutoModel();

                $dados = $model->getById((int) $_GET['id']);

                self::form($dados);
            } else {
                header("location: /produto");
            }
        } catch (Exception $e) {

            self::form($model);
        }
    }

    public static function delete()
    { 
        parent::isProtected();

        $model = new ProdutoModel();

        $model->delete((int) $_GET['id']); 
        
        header("Location: /produto");
    }
}
