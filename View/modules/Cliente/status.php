<?php

$AsaasToken=getenv('$aact_YTU5YTE0M2M2N2I4MTliNzk0YTI5N2U5MzdjNWZmNDQ6OjAwMDAwMDAwMDAwMDAyNjM3MTY6OiRhYWNoXzk3ZjViMTUzLTg4ODYtNDgyNC1iYzZmLTZiNjI0OWUwYTlmYg==');
$url= 'https://www.asaas.com/api/v3/customers';
$url= $_GET['referencia'];
$url= '/status';

$ch= curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER,[
    'Content-Type:application/json',
    'X-Asaas-Token' . $AsaasToken

]);
$result= curl_exec($ch);
curl_close($ch);
$response= json_decode($result);

var_dump($response);