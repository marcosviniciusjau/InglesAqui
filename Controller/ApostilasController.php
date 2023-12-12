<?php

namespace App\Controller;

use App\Model\ApostilasModel;
use App\Model\ProdutoModel;

use GuzzleHttp\Client;
use React\EventLoop\Factory;
error_reporting(0);
ini_set('display_errors', 0);

class ApostilasController extends Controller
{
    public static function index()
    {
        $model = new ApostilasModel();
        $model->getAllRows();

        parent::render('Apostilas/apostilas',$model);
    }

    public static function ver()
    {    
        try {
            if (isset($_GET['id'])) {
                $model = new ProdutoModel();

                $dados = $model->getById((int) $_GET['id']);
              
                self::desc($dados);
            } 
        } catch (Exception $e) {  

        }
    }

    public static function desc(ProdutoModel $_model = null)
    {
        $model = ($_model == null) ? new ProdutoModel() : $_model;
       
        $model->getAllRowsId((int) $_GET['id']);

        parent::render('Apostilas/apostilas_desc' ,$model);

    }
 public static function carrinho()
    {
        parent::render('Apostilas/carrinho' );
    }
    
    public static function pagamento()
    {
        try {
            if (isset($_GET['id'])) {
                $model = new ProdutoModel();

                $dados = $model->getById((int) $_GET['id']);
              
                parent::render('Apostilas/pagamento' ,$dados);
        } 
        } catch (Exception $e) {  
         parent::render('Home/erro');
        }
    }

    public static function pagamentoCreditCard(){

    require_once  './vendor/autoload.php';
    $tokenPagarMe= getenv("TOKEN_PAGAR_ME");
    $brassPressToken= getenv('MELHOR_ENVIO_TOKEN');
 
    try {
        $client = new \GuzzleHttp\Client();
        $fullName = $_POST['name'] ?? '';
        $name = $_POST['holder-name'] ?? '';
        $document_type= $_POST['document_type'];
        $email = $_POST['email'] ?? ''; 
        $country_code= $_POST['country_code'] ?? '';
        $area_code= $_POST['area_code'] ?? '';
        $number= $_POST['number'] ?? '';
        $document= $_POST['document'] ?? '';
        $service= $_POST['transportadoras'];
        $valor= $_POST['valor'] ?? '';
        $totalCompra= $service + $valor;
        $description = $_POST['nome'] ?? '';
        $installments= $_POST['installments'] ?? '';
        $code = $_POST['id'] ?? '';
        $payment_method= $_POST['visibility'];
        $descricao= $_POST['descricao'];
        $country= $_POST['country'];
        $state= $_POST['state'];
        $city= $_POST['city'];
        $zip_code= $_POST['zip_code'];
        $line_1= $_POST['line_1'];

        $responseToken = $client->request('POST', 'https://api.pagar.me/core/v5/tokens?appId=', [
            'body' => json_encode([
                'type' => 'card',
                'customer' => [
                    'name' => $fullName,
                    'email' => $email,
                ],
                "items" => [
                    'amount' => (float)$totalCompra,
                    'description' => $description,
                    'code' => $code,
                ],
                'card' => [
                    'number' => $_POST['card-number'],
                    'holder_name' => $name,
                    'exp_month' => $_POST['card-exp-month'] ?? '',
                    'exp_year' => $_POST['card-exp-year'] ?? '',
                    'cvv' => $_POST['cvv'] ?? '',
                ],
            ]),
            'headers' => [
                'accept' => 'application/json',
                'content-type' => 'application/json',
            ],
        ]);
        
        $responseBodyToken = $responseToken->getBody()->getContents();
        $responseDataToken = json_decode($responseBodyToken, true);
        $tokenId = $responseDataToken['id'];
        
    $responseOrder = $client->request('POST', 'https://api.pagar.me/core/v5/orders', [
        'body' => json_encode([
            'customer' => [
                'name' => $name,
                'type' => 'individual',
                'document_type' => $document_type,
                'email' => $email,
                'phones' => [
                    'mobile_phone' => [
                        'country_code' => $country_code,
                        'area_code' => $area_code,
                        'number' => $number,
                    ],
                ],
                'document' => $document,
            ],
                
            'items' => [
                [
                    'amount' => (float)$totalCompra * 100,
                    'description'=> $description,
                    'quantity' => 1,
                    'code' => $code,
                ],
            ],
            
            'payments' => [
                [
                    'credit_card' => [
                        'installments' => $installments,
                        'card_token' => $tokenId,
            
                'card'=>[
                    'billing_address'=>[
                            'country'=> $country,
                            'state'=> $state,
                            'city'=> $city,
                            'zip_code'=> $zip_code,
                            'line_1'=> $line_1,
                            'line_2'=> $complemento,
                ],
                ],
                ],
                'payment_method' => 'credit_card',
            ],
            ],
            
        ]),
            'headers' => [
                'accept' => 'application/json',
                'authorization' => 'Basic =', 
                'content-type' => 'application/json',
            ],
        ]);

        $responseOrder->getBody();
       $responseBodyOrder = $responseOrder->getBody()->getContents();
       $responseDataOrder = json_decode($responseBodyOrder, true);
       
    $produtos = [
                "products" => [
                    [
                        "name" => $name,
                        "quantity" => 1,
                        "unitary_value" => $valor,
                    ],
                ],
        ];
        
        $responseMelhorEnvio = $client->request('POST', 'https://sandbox.melhorenvio.com.br/api/v2/me/cart', [
            'body' => json_encode(["service"=> 1,
            "from"=>
            ["name"=>"Marcos Vinicius","phone"=>"",
                "email"=>"","document"=>"","address"=>"","city"=>"Jaú",
                "country_id"=>"BR","postal_code"=>"","state_abbr"=>"SP"],
                "to"=>["name"=>$name,"phone"=>$number,"email"=>$email,"document"=>$document, "address"=>$line_1,"number"=>$numero_casa,"city"=>$city,"country_id"=>$country,"postal_code"=>$zip_code,"state_abbr"=>$state],
                $produtos,
                "volumes"=>(["height"=>23,"width"=>26,"length"=>5,"weight"=>0.3]),

            ]),

  'headers' => [
    'Accept' => 'application/json',
    'Authorization' => 'Bearer ',
    'Content-Type' => 'application/json',
    'User-Agent' => 'Aplicação (email para contato técnico)',
    ],
]);  

    function renderDeliveryMin($responseDataMelhorEnvio)
    {
        $delivery_min = $responseDataMelhorEnvio['delivery_min'];

        return $delivery_min . ' dias';
    }

    function renderDeliveryMax($responseDataMelhorEnvio)
    {
        $delivery_max = $responseDataMelhorEnvio['delivery_max'];

        return $delivery_max . ' dias';
    }

       $responseBodyMelhorEnvio = $responseMelhorEnvio->getBody()->getContents();
       $responseDataMelhorEnvio = json_decode($responseBodyMelhorEnvio, true);
       $id= array_shift($responseDataMelhorEnvio);
       $model = renderDeliveryMin($responseDataMelhorEnvio);
    
        $max = renderDeliveryMax($responseDataMelhorEnvio);

        require_once  './email.php';
       
        parent::render('Apostilas/sucesso', $id,$model,$max);
    
     
       
    }
     catch (\Exception $exception) {
     echo json_encode(['error' => $exception->getMessage()]);
    }   
}

 public static function pagamentoDebitCard(){

    require_once  './vendor/autoload.php';
    $tokenPagarMe= getenv("TOKEN_PAGAR_ME");
    $brassPressToken= getenv('MELHOR_ENVIO_TOKEN');

    try {
        $client = new \GuzzleHttp\Client();
        
        $fullName = $_POST['name'] ?? '';
        $name = $_POST['holder-name-debit'] ?? '';
        $document_type= $_POST['document_type'];
        $email = $_POST['email'] ?? ''; 
        $country_code= $_POST['country_code'] ?? '';
        $area_code= $_POST['area_code'] ?? '';
        $number= $_POST['number'] ?? '';
        $firstSixDigits = substr($cardNumber, 0, 6);
        $lastFourDigits = substr($cardNumber, -4);
        $document= $_POST['document'] ?? '';
        $valor = $_POST['totalCompraDebit'] ?? '';
        $description = $_POST['nome'] ?? '';
        $installments= $_POST['installments'] ?? '';
        $code = $_POST['id'] ?? '';
        $payment_method= $_POST['visibility'];
        $descricao= $_POST['descricao'];
        $country= $_POST['country'];
        $state= $_POST['state'];
        $city= $_POST['city'];
        $zip_code= $_POST['zip_code'];
        $line_1= $_POST['line_1'];

        $responseTokenDebit = $client->request('POST', 'https://api.pagar.me/core/v5/tokens?appId=', [
            'body' => json_encode([
                'type' => 'card',
                'customer' => [
                    'name' => $fullName,
                    'email' => $email,
                ],
                "items" => [
                    'amount' => (float)$valor * 100,
                    'description' => $description,
                    'code' => $code,
                ],
                'card' => [
                    'number' => $_POST['card-number-debit'],
                    'holder_name' => $name,
                    'exp_month' => $_POST['card-exp-month-debit'] ?? '',
                    'exp_year' => $_POST['card-exp-year-debit'] ?? '',
                    'cvv' => $_POST['cvv-debit'] ?? '',
                ],
            ]),
            'headers' => [
                'accept' => 'application/json',
                'content-type' => 'application/json',
            ],
        ]);
        $responseBodyTokenDebit = $responseTokenDebit->getBody()->getContents();
        $responseDataTokenDebit = json_decode($responseBodyTokenDebit, true);
        $tokenIdDebit = $responseDataTokenDebit['id'];
        
        function typeVerify($type) {
            global $document_type;
                if ($document_type === 'CPF') {
                    $type = 'individual';
                } else {
                    $type = 'company';
                }
    }

    $responseOrderDebit = $client->request('POST', 'https://api.pagar.me/core/v5/orders', [
        'body' => json_encode([
            'customer' => [
                'name' => $name,
                'type' => 'individual',
                'document_type' => $document_type,
                'email' => $email,
                'phones' => [
                    'mobile_phone' => [
                        'country_code' => $country_code,
                        'area_code' => $area_code,
                        'number' => $number,
                    ],
                ],
                'document' => $document,
            ],
                
            'items' => [
                [
                    'amount' => (float)$valor * 100,
                    'description'=> $description,
                    'quantity' => 1,
                    'code' => $code,
                ],
            ],
            
            'payments' => [
                [
                    'debit_card' => [
                   'card_token'=> $tokenIdDebit,
                    'billing_address'=>[
                            'country'=> $country,
                            'state'=> $state,
                            'city'=> $city,
                            'zip_code'=> $zip_code,
                            'line_1'=> $line_1,
                            'line_2'=> $complemento,
                ],
                ],
                'payment_method' => 'debit_card',
            ],
            ],
            
        ]),
            'headers' => [
                'accept' => 'application/json',
                'authorization' => 'Basic =', 
                'content-type' => 'application/json',
            ],
        ]);
  
        $produtos = [
                "products" => [
                    [
                        "name" => $name,
                        "quantity" => 1,
                        "unitary_value" => $valor,
                    ],
                ],
        ];

        $responseMelhorEnvio = $client->request('POST', 'https://sandbox.melhorenvio.com.br/api/v2/me/cart', [
            'body' => json_encode(["service"=> 1,
            "from"=>
            ["name"=>"Marcos Vinicius","phone"=>"",
                "email"=>"","document"=>"","address"=>"","city"=>"Jaú",
                "country_id"=>"BR","postal_code"=>"","state_abbr"=>"SP"],
                "to"=>["name"=>$name,"phone"=>$number,"email"=>$email,"document"=>$document, "address"=>$line_1,"number"=>$numero_casa,"city"=>$city,"country_id"=>$country,"postal_code"=>$zip_code,"state_abbr"=>$state],
                $produtos,
                "volumes"=>(["height"=>23,"width"=>26,"length"=>5,"weight"=>0.3]),

            ]),

  'headers' => [
    'Accept' => 'application/json',
    'Authorization' => 'Bearer ',
    'Content-Type' => 'application/json',
    'User-Agent' => 'Aplicação (email para contato técnico)',
    ],
]);  

    function renderDeliveryMin($responseDataMelhorEnvio)
    {
        $delivery_min = $responseDataMelhorEnvio['delivery_min'];

        return $delivery_min . ' dias';
    }

    function renderDeliveryMax($responseDataMelhorEnvio)
    {
        $delivery_max = $responseDataMelhorEnvio['delivery_max'];

        return $delivery_max . ' dias';
    }

       //$responseMelhorEnvio->getBody();
       
       $responseBodyMelhorEnvio = $responseMelhorEnvio->getBody()->getContents();
       $responseDataMelhorEnvio = json_decode($responseBodyMelhorEnvio, true);
       $id= array_shift($responseDataMelhorEnvio);
        $model = renderDeliveryMin($responseDataMelhorEnvio);
    
        $max = renderDeliveryMax($responseDataMelhorEnvio);
        require_once  './email.php';
        parent::render('Apostilas/sucesso', $id,$model,$max);
  
    }
     catch (\Exception $exception) {
    echo json_encode(['error' => $exception->getMessage()]);
}
}

    public static function pagamentoBoleto(){
        
    require_once  './vendor/autoload.php';
    
    try {
        $client = new \GuzzleHttp\Client();

        $fullName = $_POST['name'] ?? '';
        $document_type= $_POST['document_type'];
        $email = $_POST['email'] ?? ''; 
        $country_code= $_POST['country_code'] ?? '';
        $area_code= $_POST['area_code'] ?? '';
        $number= $_POST['number'] ?? '';
        $document= $_POST['document'] ?? '';
        $valor = $_POST['totalCompraBoleto'] ?? '' ;
        $service= $_POST['transportadoras'];
        $description = $_POST['nome'] ?? '';
        $installments= $_POST['installments'] ?? '';
        $code = $_POST['id'] ?? '';
        $payment_method= $_POST['visibility'];
        $descricao= $_POST['descricao'];
        $country= $_POST['country'];
        $state= $_POST['state'];
        $city= $_POST['city'];
        $zip_code= $_POST['zip_code'];
        $numero_casa= $_POST['numero_casa'];
        $line_1= $_POST['line_1'];
        $complemento= $_POST['complemento'];
        $dataAtual = new \DateTime();
        $dataFutura = $dataAtual->add(new \DateInterval('P3D'));

        $dataFormatada = $dataFutura->format('Y-m-d\TH:i:s\Z');

        function adicionarDiasUteis($dataInicial, $diasUteis) {
    $dataAtual = new \DateTime($dataInicial);

    for ($i = 0; $i < $diasUteis; $i++) {
        $dataAtual->add(new \DateInterval('P1D'));

        // Verificar se o dia adicionado é um fim de semana (sábado ou domingo)
        while ($dataAtual->format('N') >= 6) {
            $dataAtual->add(new \DateInterval('P1D'));
        }
    }

    return $dataAtual->format('Y-m-d');
}
$diasUteis = adicionarDiasUteis($dataAtual->format('Y-m-d'), 3);

     $responseBoleto = $client->request('POST', 'https://api.pagar.me/core/v5/orders', [
        'body' => json_encode([
            'customer' => [
                'address'=>[
                            'country'=> $country,
                            'state'=> $state,
                            'city'=> $city,
                            'zip_code'=> $zip_code,
                            'line_1'=> $line_1,
                            'line_2'=> $complemento,
                ],
                'name' => $fullName,
                'type' => 'individual',
                'document_type' => $document_type,
                'email' => $email,
                'phones' => [
                    'mobile_phone' => [
                        'country_code' => $country_code,
                        'area_code' => $area_code,
                        'number' => $number,
                    ],
                ],
                'document' => $document,
            ],
                
            'items' => [
                [
                    'amount' => (float)$valor * 100,
                    'description'=> $description,
                    'quantity' => 1,
                    'code' => $code,
                ],
            ],
            
            'payments' => [
                [
                    
                'payment_method' => 'boleto',
                'boleto' => [
                'instructions' => "O código de barras é esse no canto superior direito. Mas se não achar fique tranquilo, que foi enviado ao seu email",
                'due_at' => $dataFormatada,
                'document_number' => $number,
                'type' => 'DM',
                'payment_method' => 'boleto',
                
            ],
             
            ],
            ],
           
        ]),
            'headers' => [
                'accept' => 'application/json',
                 'authorization' => 'Basic =',
                'content-type' => 'application/json',
            ],
        ]);
           $responseBoleto->getBody();
        $responseBodyBoleto = $responseBoleto->getBody()->getContents();
        $responseDataBoleto = json_decode($responseBodyBoleto, true);
        $model = $responseDataBoleto['charges'][0]['last_transaction']['pdf'];
        $id = $responseDataBoleto['charges'][0]['last_transaction']['line'];

                      
      /*  $responseMelhorEnvio = $client->request('POST', 'https://sandbox.melhorenvio.com.br/api/v2/me/cart', [
            'body' => json_encode(["service"=> 1,
            "from"=>
            ["name"=>"Marcos Vinicius","phone"=>"",
                "email"=>"","document"=>"","address"=>"","city"=>"Jaú",
                "country_id"=>"BR","postal_code"=>"","state_abbr"=>"SP"],
                "to"=>["name"=>$fullName,"phone"=>$number,"email"=>$email,"document"=>$document, "address"=>$line_1,"number"=>$numero_casa,"city"=>$city,"country_id"=>$country,"postal_code"=>$zip_code,"state_abbr"=>$state],
                $produtos,
                "volumes"=>(["height"=>23,"width"=>26,"length"=>5,"weight"=>0.3]),

            ]),

            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ',
                'Content-Type' => 'application/json',
                'User-Agent' => 'Aplicação (email para contato técnico)',
                ],
]);  
    
      
        function renderDeliveryMin($responseDataMelhorEnvio)
        {
            $delivery_min = $responseDataMelhorEnvio['delivery_min'];

            return $delivery_min . ' dias';
        }

        function renderDeliveryMax($responseDataMelhorEnvio)
        {
            $delivery_max = $responseDataMelhorEnvio['delivery_max'];

            return $delivery_max . ' dias';
        }

  
        //echo $responseMelhorEnvio->getBody();
           $responseBodyMelhorEnvio = $responseMelhorEnvio->getBody()->getContents();
       $responseDataMelhorEnvio = json_decode($responseBodyMelhorEnvio, true);
       $id= array_shift($responseDataMelhorEnvio);
        //$model = renderDeliveryMin($responseDataMelhorEnvio);
    
        $max = renderDeliveryMax($responseDataMelhorEnvio);
/** */
        require_once  './email_boleto.php';
        parent::render('Apostilas/boleto', $model, $id);
     
       
    }

     catch (\Exception $exception) {
    echo json_encode(['error' => $exception->getMessage()]);
    }
    }

    public static function pagamentoPix(){

    require_once  './vendor/autoload.php';
    try {
        $client = new \GuzzleHttp\Client();

        $fullName = $_POST['name'] ?? '';
        $document_type= $_POST['document_type'];
        $email = $_POST['email'] ?? ''; 
        $country_code= $_POST['country_code'] ?? '';
        $area_code= $_POST['area_code'] ?? '';
        $number= $_POST['number'] ?? '';
        $document= $_POST['document'] ?? '';
        $valor = $_POST['totalCompraPix'] ?? '';
        $description = $_POST['nome'] ?? '';
        $installments= $_POST['installments'] ?? '';
        $code = $_POST['id'] ?? '';
        $payment_method= $_POST['visibility'];
        $descricao= $_POST['descricao'];
        $country= $_POST['country'];
        $state= $_POST['state'];
        $city= $_POST['city'];
        $zip_code= $_POST['zip_code'];
        $numero_casa= $_POST['numero_casa'];
        $line_1= implode(',', [$_POST['numero_casa'], $_POST['line_1']]) ;
        $dataAtual = new \DateTime();
        $dataFutura = $dataAtual->add(new \DateInterval('P3D'));
        $dataFormatada = $dataFutura->format('Y-m-d\TH:i:s\Z');

     $responsePix = $client->request('POST', 'https://api.pagar.me/core/v5/orders', [
        'body' => json_encode([
            'customer' => [
                'address'=>[
                            'country'=> $country,
                            'state'=> $state,
                            'city'=> $city,
                            'zip_code'=> $zip_code,
                            'line_1'=> $line_1,
                            'line_2'=> $complemento,
                ],
                'name' => $fullName,
                'type' => 'individual',
                'document_type' => $document_type,
                'email' => $email,
                'phones' => [
                    'mobile_phone' => [
                        'country_code' => $country_code,
                        'area_code' => $area_code,
                        'number' => $number,
                    ],
                ],
                'document' => $document,
            ],
                
            'items' => [
                [
                    'amount' => (float)$valor * 100,
                    'description'=> $description,
                    'quantity' => 1,
                    'code' => $code,
                ],
            ],
            
            'payments' => [
                [
                    
                'payment_method' => 'pix',
                 'pix' => [
                    'expires_at' =>  $dataFormatada,
                
                
            ],
            ],
        ],
        'last_transaction'=>[
                'description'=> $description
            ]
       
        ]),
            'headers' => [
                'accept' => 'application/json',
                'authorization' => 'Basic =', 
                'content-type' => 'application/json',
            ],

        ]);
         $responsePix->getBody();
        $responseBodyPix = $responsePix->getBody()->getContents();
        $responseDataPix = json_decode($responseBodyPix, true);
        $model = $responseDataPix['charges'][0]['last_transaction']['qr_code_url'];
        $id= $responseDataPix['charges'][0]['last_transaction']['qr_code'];
        require_once  './email_pix.php';
        parent::render("Apostilas/codigo_pix", $model,$id);

        $responseMelhorEnvio = $client->request('POST', 'https://sandbox.melhorenvio.com.br/api/v2/me/cart', [
            'body' => json_encode(["service"=> 1,
            "from"=>
            ["name"=>"Marcos Vinicius","phone"=>"",
                "email"=>"","document"=>"","address"=>"","city"=>"Jaú",
                "country_id"=>"BR","postal_code"=>"","state_abbr"=>"SP"],
                "to"=>["name"=>$fullName,"phone"=>$number,"email"=>$email,"document"=>$document, "address"=>$line_1,"number"=>$numero_casa,"city"=>$city,"country_id"=>$country,"postal_code"=>$zip_code,"state_abbr"=>$state],
                $produtos,
                "volumes"=>(["height"=>23,"width"=>26,"length"=>5,"weight"=>0.3]),

            ]),

  'headers' => [
    'Accept' => 'application/json',
    'Authorization' =>  'Bearer ',
    'Content-Type' => 'application/json',
    'User-Agent' => 'Aplicação (email para contato técnico)',
    ],
]);  
        $responseBodyMelhorEnvio = $responseMelhorEnvio->getBody()->getContents();
       $responseDataMelhorEnvio = json_decode($responseBodyMelhorEnvio, true);
       $id= array_shift($responseDataMelhorEnvio);
        $model = renderDeliveryMin($responseDataMelhorEnvio);
    
        $max = renderDeliveryMax($responseDataMelhorEnvio);

        $delivery_max= $responseDataMelhorEnvio['delivery_max'];
    }
     catch (\Exception $exception) {
    echo json_encode(['error' => $exception->getMessage()]);
    parent::render("Home/erro");
    }
    }
    public static function enviarPagamentoSucesso(){
    
       parent::render('Apostilas/sucesso', $orderId);
    }
  
    
    public static function categoryTrip()
    {
        $model =  new ProdutoModel();
       
        $model->getByCategoryTrip((int) $_GET['id']);

        parent::render('Apostilas/apostilas',$model);
    }

    public static function categoryBusiness()
    {
        $model =  new ProdutoModel();
        $model->getByCategoryBusiness((int) $_GET['id']);

        parent::render('Apostilas/apostilas',$model);
    }

    public static function categoryLearn()
    {
        $model =  new ProdutoModel();
        $model->getByCategoryLearn((int) $_GET['id']);

        parent::render('Apostilas/apostilas',$model);
    }
    

}