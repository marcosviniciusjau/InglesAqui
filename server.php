<?php

require_once __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();

try {
 
    $response = $client->request('POST', 'https://api.pagar.me/core/v5/tokens?appId=', [

        'body' => json_encode([
            'type' => 'card',
            'card' => [
                'number' => $_POST['cardNumber'],
                'holder_name' => $_POST['cardHolderName'] ?? '',
                'exp_month' => $_POST['expMonth'] ?? '',
                'exp_year' => $_POST['expYear'] ?? '',
                'cvv' => $_POST['cvv'] ?? '',
            ],
        ]),
        'headers' => [
            'accept' => 'application/json',
            'content-type' => 'application/json',
        ],
    ]);


    echo $response->getBody();

    

} catch (\Exception $exception) {
    echo json_encode(['error' => $exception->getMessage()]);
}
