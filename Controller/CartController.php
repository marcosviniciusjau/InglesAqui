<?php

namespace App\Controller;

use App\Model\BookletsModel;

use GuzzleHttp\Client;
use React\EventLoop\Factory;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$key = $_ENV['ENCRYPTION_KEY'];

error_reporting(0);
ini_set('display_errors', 0);

class CartController extends Controller
{
    public static function encrypt($data, $key) {
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $ciphertext = openssl_encrypt(serialize($data), 'aes-256-cbc', $key, 0, $iv);
        return base64_encode($iv . $ciphertext);
    }
    
    public static function decrypt($encryptedData, $key) {
        $ciphertext_dec = base64_decode($encryptedData);
        $iv_size = openssl_cipher_iv_length('aes-256-cbc');
        $iv_dec = substr($ciphertext_dec, 0, $iv_size);
        $ciphertext_dec = substr($ciphertext_dec, $iv_size);
        return unserialize(openssl_decrypt($ciphertext_dec, 'aes-256-cbc', $key, 0, $iv_dec));
    }

    public static function addCart(){
    try {
        if (isset($_GET['id'])) {
            if (isset($_COOKIE['cart'])) {
                $cart = self::decrypt($_COOKIE['cart'], $key);
                foreach ($cart as $item) {
                    if ($item['id'] === $_GET['id']) {
                        echo 'Este item já está no carrinho.';
                        return;
                    }
                }
            } else {
                $cart = [];
            }

            $cart[] = array(
                'id' => $_GET['id'],
            );

            $cookie_duration = time() + (30 * 24 * 60 * 60);

            $encryptedCart = self::encrypt($cart, $key);
            setcookie('cart', $encryptedCart, $cookie_duration);

            header('Location: /apostilas/carrinho');
            
        } else {
            echo 'O parâmetro "id" não está definido.';
        }
    } catch (Exception $e) {
        parent::render('Home/error');
    }
    }


    private static function renderEmptyCartPage() {
        // Renderiza a página do carrinho vazio
        echo '<?php
            session_start();
            ?>
            
            <!DOCTYPE html>
            <html lang="pt-br">
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link href="https://fonts.googleapis.com/css2?family=Forum&family=Montserrat:wght@300&display=swap" rel="stylesheet">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
                <link rel="stylesheet" href="\View\css\sucesso.css">
                <link rel="stylesheet" href="\View\css\cart.css">
                <script src="https://sdk.mercadopago.com/js/v2"></script>
                <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
                <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
            
                <script type="text/javascript" src="\View\js\cart.js" defer></script>
            
                <link rel="preconnect" href="https://fonts.googleapis.com">
                <title>Inglês Aqui Carrinho</title>
                <link rel="icon" href="/View/Imagens/icon.png" type="image/icon type">
            </head>
            
            <body>
            <link rel="stylesheet" href="\View\css\cabecalhos.css">

            <nav id= "nav" class="navbar navbar-expand-md navbar-dark ">
                <div class="container-fluid">
                
                <a href="/"><img src="/View/Imagens/logo.png" class="navbar-brand" width="150" height="60"></a>
                    <a class="navbar-brand" href="/apostilas">Apostilas</a>
                    <a class="navbar-brand" href="/contato">Contato</a>
                    <a class="navbar-brand" href="/#sobre">Sobre</a>
            
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                
                </button>
                
                </div>
            </nav>
            <div class="container">
                <ion-icon name="cart-outline" id="cart-icon"></ion-icon>
                <h1 id="cart-title">Seu carrinho está vazio</h1>
                <p>Que tal começar pelas apostilas de viagem?</p>
                <a href="/apostilas_category/trip"><button class="botao" data-bs-toggle="modal" data-bs-target="#exampleModal" id="cart-button">Comprar</button></a>
            </div>
            </body>
            </html>';
    }

    public static function getCart()
{
    $model = new BookletsModel();

    if (isset($_COOKIE['cart'])) {
        $encryptedCart = $_COOKIE["cart"];
        $cart = self::decrypt($encryptedCart, $key);

        if ($cart === null || !is_array($cart)) {
            echo 'Erro ao decodificar o carrinho.';
            self::renderEmptyCartPage();
            return;
        }

        $ids = array_column($cart, 'id');
        if (!empty($ids)) {
            $model->getByCartIds($ids);
            parent::render('Booklets/cart', $model);
        } else {
            self::renderEmptyCartPage();
        }
    } else {
        self::renderEmptyCartPage();
    }
}

public static function paymentCart()
{
    $model = new BookletsModel();

    // Verifique se o cookie 'cart' está definido
    if (isset($_COOKIE['cart'])) {
        $encryptedCart = $_COOKIE["cart"];
        $cart = self::decrypt($encryptedCart, $key);

        if (is_string($cart)) {
            echo 'Erro ao decodificar o carrinho.';
            return;
        }

        // Verifique se o parâmetro 'quantityArray' foi enviado
        if (isset($_POST['quantityArray'])) {
            $quantityArrayJSON = $_POST['quantityArray'];
            $quantityArray = json_decode($quantityArrayJSON, true);
        
            foreach ($quantityArray as $item) {
                $id = $item['id'];
                $name = $item['name'];
                $price = $item['price'];
                $image= $item['img'];
                $quantity = $item['quantity'];

                $totalQuantity = $quantity;
                $totalPrice = $price;
                $total= $totalPrice * $totalQuantity;
                $totais+= $total;
                $updatedCart[] = ['id' => $id, 'quantity' => $quantity, 'name' => $name, 'price' => $price, 'img' => $image, 'totalQuantity' => $totalQuantity, 'totalPrice' => $totalPrice, 'total' => $total,'totais' => $totais];
            }
        
        
            $cookie_duration = time() + (30 * 24 * 60 * 60);
            $encryptedUpdatedCart = self::encrypt($updatedCart, $key);
            setcookie('cart', $encryptedUpdatedCart, $cookie_duration);
            $updatedCartJSON = json_encode($updatedCart);
            
            $model->updatedCartJSON = $updatedCartJSON;
            $model->quantities = $quantities;
            $model->totalPrice= $totalPrice;
            parent::render('Booklets/payment_cart', $model);
} else {
            echo 'O parâmetro "quantityArray" não foi definido.';
        }
    } else {
        echo 'O cookie não foi definido.';
        self::renderEmptyCartPage();
    }
}


public static function updateCartFromQuantityArray(&$cart, $quantityArrayJSON)
{
    $quantityArray = json_decode($quantityArrayJSON, true);

    if ($quantityArray === null) {
        echo 'Erro ao decodificar o quantityArray JSON.';
        return;
    }

    // Percorra o carrinho e atualize as quantidades
    foreach ($cart as &$item) {
        $id = $item['id'];
        
        // Verifique se o ID existe no quantityArray
        if (isset($quantityArray[$id])) {
            // Atualize a quantidade no carrinho
            $item['quantity'] = $quantityArray[$id];
        }
    }

    // Criptografe o carrinho atualizado
    $encryptedCart = self::encrypt($cart, $key);
    
    // Defina o cookie atualizado
    $cookie_duration = time() + (30 * 24 * 60 * 60);
    setcookie('cart', $encryptedCart, $cookie_duration);
}

   

    public static function deleteCartItem()
    {
        try {
            if (isset($_GET['id'])) {
                if (isset($_COOKIE['cart'])) {
                    $cart = self::decrypt($_COOKIE['cart'], $key);

                    $index = array_search($_GET['id'], array_column($cart, 'id'));
                    
                    if ($index !== false) {
                        unset($cart[$index]);
                    } else {
                        echo 'O item não está no carrinho.';
                        return;
                    }
                    
                    $cookie_duration = time() + (30 * 24 * 60 * 60);
                    $encryptedCart = self::encrypt($cart, $key);
                    setcookie('cart', $encryptedCart, $cookie_duration);

                    header('Location: /apostilas/carrinho');
                    exit();
                
                } else {
                self::renderEmptyCartPage();
                    exit();
                }
            } else {
                // Se o parâmetro 'id' não estiver definido, exibe a página do carrinho vazio
                self::renderEmptyCartPage();
                exit();
            }
        } catch (Exception $e) {
            // Lidar com erros adequadamente
            echo 'Ocorreu um erro ao remover o item do carrinho.';
            return;
        }
    }

   


}