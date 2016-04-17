<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visa extends Model
{	
	public static function pullFunds($product, $amount){
		echo "You're buying ", $product, " for $", $amount;
		$time = time();
		$url = env('PULL_URL');
		$certificatePath = __DIR__."/Http/Middleware/myapp_keyAndCertBundle.p12";
		$userId = env('VISA_USER_ID');
		$password = env('VISA_USER_PASSWORD');
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
		  'localTransactionDateTime' => '2016-04-16T23:59:40',
		  'retrievalReferenceNumber' => '330000550000',
		  'senderCardExpiryDate' => '2020-03',
		  'senderCurrencyCode' => 'USD',
		  'senderPrimaryAccountNumber' => '4005520000011126',
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
	}

	public static function pushFunds($customer, $amount){
		echo "send money to ", $customer;
		$time = time();
		$url = env('PUSH_URL');
		$certificatePath = __DIR__."/Http/Middleware/myapp_keyAndCertBundle.p12";
		$userId = env('VISA_USER_ID');
		$password = env('VISA_USER_PASSWORD');
		$requestBodyString = json_encode([
		  "acquirerCountryCode" => "840",
		  "acquiringBin" => "408999",
		  "amount" => "124.05",
		  "businessApplicationId" => "AA",
		  "cardAcceptor" => [
		    "address" => [
		      "country" => "USA",
		      "county" => "San Mateo",
		      "state" => "CA",
		      "zipCode" => "94404"
		    ],
		    "idCode" => "CA-IDCode-77765",
		    "name" => "Visa Inc. USA-Foster City",
		    "terminalId" => "TID-9999"
		  ],
		  "localTransactionDateTime" => "2016-04-17T08:53:17",
		  "merchantCategoryCode" => "6012",
		  "pointOfServiceData" => [
		    "motoECIIndicator" => "0",
		    "panEntryMode" => "90",
		    "posConditionCode" => "00"
		  ],
		  "recipientName" => "rohan",
		  "recipientPrimaryAccountNumber" => "4957030420210496",
		  "retrievalReferenceNumber" => "412770451018",
		  "senderAccountNumber" => "4653459515756154",
		  "senderAddress" => "901 Metro Center Blvd",
		  "senderCity" => "Foster City",
		  "senderCountryCode" => "124",
		  "senderName" => "Mohammed Qasim",
		  "senderReference" => "",
		  "senderStateCode" => "CA",
		  "sourceOfFundsCode" => "05",
		  "systemsTraceAuditNumber" => "451018",
		  "transactionCurrencyCode" => "USD",
		  "transactionIdentifier" => "381228649430015"
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
	}

    public static function charge($x,$y){

		$time = time();
		$url = env('PULL_URL');
		$certificatePath = env('CERTIFICATE_PATH');
		$userId = env('VISA_USER_ID');
		$password = env('VISA_USER_PASSWORD');
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
		  'localTransactionDateTime' => '2016-04-16T23:59:40',
		  'retrievalReferenceNumber' => '330000550000',
		  'senderCardExpiryDate' => '2020-03',
		  'senderCurrencyCode' => 'USD',
		  'senderPrimaryAccountNumber' => '4005520000011126',
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
    }
}
