<?php
error_reporting(0);
ini_set('display_errors', 0);
require_once __DIR__ . '/vendor/autoload.php';

    
        $client = new \GuzzleHttp\Client();    
        $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';

        $name = $_POST['holder-name'] ?? '';
        $document_type= $_POST['document_type'];
        $email = $_POST['email'] ?? ''; 
        $country_code= $_POST['country_code'] ?? '';
        $area_code= $_POST['area_code'] ?? '';
        $number= $_POST['number'] ?? '';
        $document= $_POST['document'] ?? '';
        $valor = $_POST['valor'] ?? '';
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

$responseShipping = $client->request('POST', 'https://sandbox.melhorenvio.com.br/api/v2/me/shipment/calculate', [
  'body' => json_encode([
    "from"=>["postal_code"=>""],
      "to"=>["postal_code"=>$zip_code],
      "products"=>[
        ["id"=>$name,"width"=>23,"height"=>26,"weight"=>0.3,
        "insurance_value"=>$valor,"quantity"=>1]
        ]
      ]
    ),
  'headers' => [
    'Accept' => 'application/json',
    'Authorization' => 'Bearer ',
    'Content-Type' => 'application/json',
    'User-Agent' => 'Aplicação (email para contato técnico)',
  ],
]);

        echo $responseShipping->getBody();
