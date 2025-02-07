<?php

namespace App\Controller;

use App\Model\ProductsModel;

use \Exception;
use App\DAO\{ProductsDAO,CategoriaDAO};

class ProductController extends Controller
{
    public static function index()
    {     
        parent::isProtected();
        $model = new ProductsModel();
       
        $model->getAllRows();
        
       parent::render('Product/ListProduct', $model);
    }

    
    public static function form(ProductsModel $_model = null)
    {
        parent::isProtected();
        $model = ($_model == null) ? new ProductsModel() : $_model;
        include PATH_VIEW . '/modules/Product/FormProduct.php';
    }

    public static function updateForm(ProductsModel $_model = null)
    {
        parent::isProtected();
        $model = ($_model == null) ? new ProductsModel() : $_model;
        include PATH_VIEW . '/modules/Product/FormUpdateProduct.php';
    }
   
    public static function save()
    {
        parent::isProtected();
        try {
            $model = new ProductsModel();

            $model->name = $_POST['name'];
            $model->price = $_POST['price'];
            $model->description = $_POST['description'];
    
            $arquivo = $_FILES['arquivo_up'];
    
            if ($arquivo['size'] > 1000000) {
                throw new Exception("O arquivo é muito grande. O tamanho máximo permitido é 10MB.");
            }
    
            if (!in_array($arquivo['type'], ['image/webp'])) {
                throw new Exception("O arquivo deve ser uma imagem.");
            }
    
            if (is_executable($arquivo['tmp_name'])) {
                throw new Exception("Arquivos executáveis não são permitidos.");
            }

            $unique_name = 'booklet' . uniqid() . '.' . pathinfo($arquivo['name'], PATHINFO_EXTENSION);
        
            $image = imagecreatefromwebp($arquivo['tmp_name']);

            if ($image === false) {
                throw new Exception("Falha ao carregar a imagem.");
            }

            if (imagepng($image, UPLOADS . $unique_name) === false) {
                throw new Exception("Falha ao salvar a imagem.");
            }

            imagedestroy($image);

            $model->image = $unique_name;

            $model->save();

        } catch (Exception $e) {
            echo $e->getMessage();
        }
        header('Location: /product');
    }

    public static function update()
    {
        parent::isProtected();
        try {
            echo('chegou aqui?');
            $model = new ProductsModel();
            $model->id= $_POST['id'];
            $model->name = $_POST['name'];
            $model->name = $_POST['name'];
            $model->price = $_POST['price'];
            $model->description = $_POST['description'];
            
            $arquivo = $_FILES['arquivo_up'];
            $image = $_POST['image'];
        
            if ($arquivo['size'] === 0) {
                $model->image = $_POST['image'];
                
                $model->update();
                
                header('Location: /product');
            }
            if ($arquivo['size'] > 1000000) {
                throw new Exception("O arquivo é muito grande. O tamanho máximo permitido é 10MB.");
            }
    
            if (is_executable($arquivo['tmp_name'])) {
                throw new Exception("Arquivos executáveis não são permitidos.");
            }

            $unique_name = 'booklet' . uniqid() . '.' . pathinfo($arquivo['name'], PATHINFO_EXTENSION);
        
            $image = imagecreatefromwebp($arquivo['tmp_name']);
            if($image) {
                $model->update();
            }
            if (imagepng($image, UPLOADS . $unique_name) === false) {
                throw new Exception("Falha ao salvar a imagem.");
            }
            imagedestroy($image);

            $model->image = $unique_name;
            $model->update();

            header('Location: /product');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public static function getById()
    {  
        parent::isProtected();
        try {
            if (isset($_GET['id'])) {
                $model = new ProductsModel();

                $data = $model->getById((int) $_GET['id']);

                self::updateForm($data);
            } else {
                header("location: /product");
            }
        } catch (Exception $e) {
            self::updateForm($model);
        }
    }

    public static function delete()
    { 
        parent::isProtected();
        $model = new ProductsModel();

        $model->delete((int) $_GET['id']); 
        
        header("Location: /product");
    }
}