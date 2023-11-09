<?php

use MercadoPago\Client\Payment\PaymentClient;
use MercadoPago\MercadoPagoConfig;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require_once __DIR__  . '/vendor/autoload.php';

$app = AppFactory::create();

MercadoPagoConfig::setAccessToken(getenv("MERCADO_PAGO_SAMPLE_ACCESS_TOKEN"));
$app->post('/process_payment', function (Request $request, Response $response, $args) {
    try {
        $contents = json_decode(file_get_contents('php://input'), true);
        $parsed_request = $request->withParsedBody($contents);
        $parsed_body = $parsed_request->getParsedBody();

        $client = new PaymentClient();
        $request = [
            "transaction_amount" => $parsed_body['transactionAmount'],
            "token" => $parsed_body['token'],
            "description" => $parsed_body['description'],
            "installments" => $parsed_body['installments'],
            "payment_method_id" => $parsed_body['paymentMethodId'],
            "issuer_id" => $parsed_body['issuerId'],
            "payer" => [
                "email" => $parsed_body['payer']['email'],
                "identification" => [
                    "type" => $parsed_body['payer']['identification']['type'],
                    "number" => $parsed_body['payer']['identification']['number'],
                ]
            ]
        ];
        $payment = $client->create($request);

        validate_payment_result($payment);

        $response_fields = array(
            'id' => $payment->id,
            'status' => $payment->status,
            'detail' => $payment->status_detail
        );

        $response_body = json_encode($response_fields, JSON_PRETTY_PRINT);

        $response->getBody()->write($response_body);
    
        return $response->withHeader('Content-Type', 'application/json')->withStatus(201);
        
    } catch (Exception $exception) {
        $response_fields = array('error_message' => $exception->getMessage());

        $response_body = json_encode($response_fields);
        $response->getBody()->write($response_body);

        return $response->withHeader('Content-Type', 'application/json')->withStatus(400);
    }
});
function validate_payment_result($payment)
{
    if ($payment->id === null) {
        $error_message = 'Unknown error cause';

        if ($payment->error !== null) {
            $sdk_error_message = $payment->error->message;
            $error_message = $sdk_error_message !== null ? $sdk_error_message : $error_message;
        }

        throw new Exception($error_message);
    }
}

?>