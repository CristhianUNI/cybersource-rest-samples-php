<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . '../../vendor/autoload.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . '../../Resources/ExternalConfiguration.php';

function VoidCapture($id)
{
	$clientReferenceInformationArr = [
			"code" => "test_void"
	];
	$clientReferenceInformation = new CyberSource\Model\Ptsv2paymentsidreversalsClientReferenceInformation($clientReferenceInformationArr);

	$requestObjArr = [
			"clientReferenceInformation" => $clientReferenceInformation
	];
	$requestObj = new CyberSource\Model\VoidCaptureRequest($requestObjArr);


	$commonElement = new CyberSource\ExternalConfiguration();
	$config = $commonElement->ConnectionHost();
	$merchantConfig = $commonElement->merchantConfigObject();

	$api_client = new CyberSource\ApiClient($config, $merchantConfig);
	$api_instance = new CyberSource\Api\VoidApi($api_client);

	try {
		$apiResponse = $api_instance->voidCapture($requestObj, $id);
		print_r(PHP_EOL);
		print_r($apiResponse);

		return $apiResponse;
	} catch (Cybersource\ApiException $e) {
		print_r($e->getResponseBody());
		print_r($e->getMessage());
	}
}

if(!defined('DO_NOT_RUN_SAMPLES')){
	echo "\nVoidCapture Sample Code is Running..." . PHP_EOL;
	echo "\nInput missing path parameter <id>: ";
	$id = trim(fgets(STDIN));
	VoidCapture($id);
}
?>
