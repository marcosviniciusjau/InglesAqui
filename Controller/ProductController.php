<?php

namespace App\Controller;

use App\Model\BookletsModel;

use \Exception;
use App\DAO\{BookletsDAO,CategoriaDAO};

class ProductController extends Controller
{


    public static function index()
    {    
        parent::isprotected();
        $model = new BookletsModel();
       
        $model->getAllRows();
        
       parent::render('Product/ListaProduct', $model);
    }

    
    public static function form(BookletsModel $_model = null)
    {
        parent::isprotected();
        $model = ($_model == null) ? new BookletsModel() : $_model;
        include PATH_VIEW . 'modules/Product/FormProduct.php';
    }
   
    public static function save()
    {
        parent::isprotected();
        try {
            $model = new BookletsModel();
    
            $model->id = $_POST['id'];
            $model->name = $_POST['name'];
            $model->price = $_POST['price'];
            $model->description = $_POST['description'];
    
            $arquivo = $_FILES['arquivo_up'];
    
            if ($arquivo['size'] > 1000000) {
                throw new Exception("O arquivo é muito grande. O tamanho máximo permitido é 10MB.");
            }
    
            if (!in_array($arquivo['type'], ['image/jpeg', 'image/png'])) {
                throw new Exception("O arquivo deve ser uma imagem.");
            }
    
            if (is_executable($arquivo['tmp_name'])) {
                throw new Exception("Arquivos executáveis não são permitidos.");
            }

            $nome_unico = uniqid() . '.' . pathinfo($arquivo['name'], PATHINFO_EXTENSION);
    
            $image = imagecreatefrompng($arquivo['tmp_name']);

            if ($image === false) {
                throw new Exception("Falha ao carregar a imagem.");
            }

            if (imagepng($image, UPLOADS . $nome_unico) === false) {
                throw new Exception("Falha ao salvar a imagem.");
            }

            imagedestroy($image);

            $model->image = $nome_unico;

            $model->save();

        } catch (Exception $e) {
            echo $e->getMessage();
        }
        header('Location: /produto');
    }

    public static function ver()
    { 
        parent::isprotected();
        try {
            if (isset($_GET['id'])) {
                $model = new BookletsModel();

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
        parent::isprotected();
        $model = new BookletsModel();

        $model->delete((int) $_GET['id']); 
        
        header("Location: /produto");
    }
}