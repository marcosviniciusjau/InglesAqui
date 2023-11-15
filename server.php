<?php

require_once __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();
print_r($name);
$name= $_POST['holder-name'] ?? '';
$email= $_POST['email'] ?? '';
$valor= $_POST['valor'] ?? '';
$description= $_POST['nome'] ?? '';
$code= $_POST['id'] ?? '';
try {
 
    $response = $client->request('POST', 'https://api.pagar.me/core/v5/tokens?appId=', [

        'body' => json_encode([
            'type' => 'card',
            'customer'=>[
                'name'=>$_POST['holder-name'] ?? '',
                'email'=>$_POST['email'] ?? ''
            ],
            "items"=>[
                "amount"=>$_POST['valor'] ?? '',
                "description"=>$_POST['nome'] ?? '',
                "code"=>$_POST['id'] ?? ''
                ]
            ,
            'card' => [
                'number' => $_POST['card-number'],
                'holder_name' => $_POST['holder-name'] ?? '',
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

    $responseBody = $response->getBody()->getContents();

    $responseData = json_decode($responseBody, true);

    $tokenId = $responseData['id'];

     $response = $client->request('POST', 'https://api.pagar.me/core/v5/orders', [

        'body' => json_encode([
         'customer'=>[
                'name'=> $_POST['holder-name'] ?? '',
                'email'=> $_POST['email'] ?? ''
            ],
        'items'=>[
                'amount'=> $valor,
                'description'=> $_POST['nome'] ?? '',
                'code'=> $_POST['id'] ?? ''
                ]
            ,
        'payments' => [
                'payment-method' => 'credit_card',
            ],

        'credit_card' => [
                'card_token' => $tokenId,
            ],

]),
      'headers' => [
            'accept' => 'application/json',
            'authorization' => 'Basic ',
            'content-type' => 'application/json',
        ],
     ]);

    echo $response->getBody();

    
} catch (\Exception $exception) {
    echo json_encode(['error' => $exception->getMessage()]);
}
