<?php

require_once __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Client;

$client = new \GuzzleHttp\Client();

try {
    $contents = json_decode(file_get_contents('php://input'), true);
    $parsed_request = $request->withParsedBody($contents);
    $parsed_body = $parsed_request->getParsedBody();

    $request = [
        'installments' => $parsed_body['installments'],
        'items' => [
            [
                'amount' => '',
                'description' => '',
            ],
        ],
        'payments' => [
            [
                'payment_method_id' => $parsed_body['paymentMethodId'],
                'credit_card' => [
                    'installments' => 1,
                    'card_token' => $parsed_body['paymentMethodId'],
                ],
            ],
        ],
        'headers' => [
            'accept' => 'application/json',
            'content-type' => 'application/json',
        ],
    ];

    $response = $client->request('POST', 'https://api.pagar.me/core/v5/orders', $request);

    return $response->getBody()->getContents();
} catch (\Exception $exception) {
    return json_encode(['error' => $exception->getMessage()]);
}
