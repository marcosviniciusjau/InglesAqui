<?php
foreach ($model->rows as $item) : ?>
  <tr>

    <td><?= $item->id ?></td>
    <td><?= $item->nome ?></td>
    <td><?= $item->cpf ?></td>
    <td><?= $item->email ?></td>
    <td><?= $item->telefone ;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.asaas.com/api/v3/customers");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_POST, TRUE);

curl_setopt($ch, CURLOPT_POSTFIELDS, "{
  \"name\": \"$item->nome\",
  \"email\": \"$item->email\",
  \"phone\": \"$item->telefone\",
  \"cpfCnpj\": \"$item->cpf\",
  \"externalReference\": \"$item->id\",

}");

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json",
  "access_token:api_key"
));

$response = curl_exec($ch);
curl_close($ch);

var_dump($response);

?>
<?php endforeach ?>

  
           