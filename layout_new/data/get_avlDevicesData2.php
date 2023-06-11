<?php
require_once '../vendor/autoload.php';

use MongoDB\Exception;
use MongoDB\Client;



		//Atlas connection string
		$uri = 'mongodb://64.227.118.83:27017/';

		// Create a new client and connect to the server
		$client = new \MongoDB\Client($uri);
		//$client = new \MongoDB\Client(CONNECTION_STRING );

		try {
		    // Send a ping to confirm a successful connection
		    $client->selectDatabase('local')->command(['ping' => 1]);
		    //echo "Pinged your deployment. You successfully connected to MongoDB! <br>";
		} catch (Exception $e) {
		    printf($e->getMessage());
		}

		$db = $client->selectDatabase('local');
		$collection = $db->avlDevices;

		$cursor = $collection->find();
		$json_data = null;
		//print_r($cursor);
		 
		echo $json_data = json_encode(iterator_to_array($cursor), JSON_UNESCAPED_UNICODE);

