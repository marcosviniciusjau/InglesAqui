<?php

require_once __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Client;
$tokenPagarMe= getenv("TOKEN_PAGAR_ME");
$melhorEnvioToken= getenv('MELHOR_ENVIO_TOKEN');

try {
    $client = new \GuzzleHttp\Client();

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

    $responseToken = $client->request('POST', 'https://api.pagar.me/core/v5/tokens?appId=', [
        'body' => json_encode([
            'type' => 'card',
            'customer' => [
                'name' => $name,
                'email' => $email,
            ],
            "items" => [
                'amount' => (float)$valor,
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
    
    function typeVerify($type) {
        global $document_type;
            if ($document_type === 'CPF') {
                $type = 'individual';
            } else {
                $type = 'company';
            }
}
    function paymentVerify($payment_method, $number, $name, $valor, $installments, $tokenId){
        if ($payment_method === 'boleto') {
        $payment_data = [
            'boleto' => [
                'instructions' => "Pagar",
                'due_at' => "$vencimento->format('Y-m-d H:i:s')",
                'document_number' => $number,
                'type' => 'DM',
                'payment_method' => 'boleto',
            ],
        ];
        } elseif ($payment_method === 'pix') {
            $payment_data = [
                'pix' => [
                    'expires_at' => $vencimento->format('Y-m-d H:i:s'),
                    'additional_information' => [
                        'Name' => $name,
                        'Value' => $valor,
                    ],
                    'payment_method' => 'pix', 
                ],
            ];
        } else {
            $payment_data = [
                'credit_card' => [
                    'installments' => $installments,
                    'card_token' => $tokenId,
                    'payment_method' => 'credit_card',
                ],
            ];
        }

    }
  
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
                    'amount' => (float)$valor * 100,
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
                            'line_2'=> 'Nao te interessa',
                ],
                ],
                ],
                'payment_method' => 'credit_card',
            ],
            ],
            
        ]),
            'headers' => [
                'accept' => 'application/json',
                'authorization' => 'Basic' . $tokenPagarMe, 
                'content-type' => 'application/json',
            ],
        ]);

        echo $responseOrder->getBody();
        $order = explode(",", $responseOrder->getBody());

        $id = array_shift($order);
        //if ($responseOrder->getStatusCode() == 200) {
        //header('Location: /pagamento/sucesso');
        //exit; 
       // } else {
        //    echo "Erro ao processar a solicitação.";
        //}

        if ($result) {
            echo 'E-mail enviado com sucesso!';
        } else {
            echo 'Erro ao enviar o e-mail.';
        }   

  $responseShipping = $client->request('POST', 'https://sandbox.melhorenvio.com.br/api/v2/me/shipments/calculate', [
     'body' => json_encode([
      'from' => [
      'postal_code' => "84145000",   
    ], 'to' => [
      'postal_code' => $zip_code,   
    ],  
    'products' => [
       [  
         'id' => $id,
         'width' => 23,
         'height'=> 26,
         'weight'=> 0.3,
         'insurance_value'=> $valor,
         'quantity'=>1,  
       ],
    ], 
]),
     'headers' => [
    'Accept' => 'application/json',
    'Authorization' => 'Bearer' . $melhorEnvioToken,
    'Content-Type' => 'application/json',
  ],
]);
echo $responseShipping->getBody();


} catch (\Exception $exception) {
    echo json_encode(['error' => $exception->getMessage()]);
}