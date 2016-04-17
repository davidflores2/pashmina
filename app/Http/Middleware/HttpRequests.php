<?php

$time = time();
$url = "https://sandbox.api.visa.com/visadirect/fundstransfer/v1/pullfundstransactions";
$certificatePath = __DIR__."/myapp_keyAndCertBundle.p12";
//$privateKey = __DIR__."/privateKey.pem";
$userId = "09OCJGOXGXRHB0XXS17S21NJGgiS76eITIyzP2fCPN_EHUYUs";
$password = "A5UFEAnD1O7LfbBPzkEmoZMedfKgI5UcTyqB8";
$requestBodyString = json_encode([
  'acquirerCountryCode' => '840',
  'acquiringBin' => '408999',
  'amount' => '124.02',
  'businessApplicationId' => 'AA',
  'cardAcceptor' => [
    'address' => [
      'country' => 'USA',
      'county' => 'San Mateo',
      'state' => 'CA',
      'zipCode' => '94404'
    ],
    'idCode' => 'ABCD1234ABCD123',
	  'name' => 'Acceptor 1',
	  'terminalId' => '365539',
  ],
  'cavv' => '0000010926000071934977253000000000000000',
  //'foreignExchangeFeeTransaction' => '11.99',
  'localTransactionDateTime' => '2016-04-16T23:59:40',
  'retrievalReferenceNumber' => '330000550000',
  'senderCardExpiryDate' => '2020-03',
  'senderCurrencyCode' => 'USD',
  'senderPrimaryAccountNumber' => '4005520000011126',
  //'surcharge' => '11.99',
  'systemsTraceAuditNumber' => '451000'
] );
$authString = $userId.":".$password;
$authStringBytes = utf8_encode($authString);
$authloginString = base64_encode($authStringBytes);
$authHeader = "Authorization:Basic ".$authloginString;
echo "<strong>URL:</strong><br>".$url. "<br><br>";
$header = (array("Accept: application/json", "Content-Type: application/json", $authHeader));
       
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $requestBodyString); 
curl_setopt($ch, CURLOPT_SSLCERT, $certificatePath);
//curl_setopt($ch, CURLOPT_SSLKEY, $privateKey);
curl_setopt($ch, CURLOPT_SSLCERTPASSWD, 'onward');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//getting response from server
$response = curl_exec($ch);
if(!$response) {
    die('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
}
echo "<strong>HTTP Status:</strong> <br>".curl_getinfo($ch, CURLINFO_HTTP_CODE)."<br><br>";
curl_close($ch);
$json = json_decode($response);
$json = json_encode($json, JSON_PRETTY_PRINT);
printf("<pre>%s</pre>", $json);
exit();
?>