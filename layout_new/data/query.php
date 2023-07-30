<?php
require_once("../config/config.php");
require_once '../vendor/autoload.php';

use MongoDB\Exception;
use MongoDB\Client;



		//Atlas connection string
		//$uri = 'mongodb://shahbaz:Islam786ian@64.227.118.83:27017/';

		// Create a new client and connect to the server
		$client = new \MongoDB\Client(DB_SERVER_URL);
		//$client = new \MongoDB\Client(CONNECTION_STRING );

		try {
		    // Send a ping to confirm a successful connection
		    $client->selectDatabase(DB_NAME)->command(['ping' => 1]);
		    //echo "Pinged your deployment. You successfully connected to MongoDB! <br>";
		} catch (Exception $e) {
		    printf($e->getMessage());
		}

		$db = $client->selectDatabase(DB_NAME);

		$collection = $db->users;

		// $imei_rec = 867459045626108;

		// $gt_date = new \MongoDB\BSON\UTCDateTime(strtotime("-10 day") * 1000);
		// $lt_date = new \MongoDB\BSON\UTCDateTime(strtotime("0 day") * 1000);


		// //$gt_date = 1688130661000;
		// //$lt_date = 1688994661000;


		// $gt_date2 = (string) $gt_date;
		// $lt_date2 = (string) $lt_date;

		// $cursor2 = $collection2->find(array('avltm'=>array ('$gte'=> (int) $gt_date2, '$lte' => (int) $lt_date2 ), 'imei' => $imei_rec));
		
		// echo count($cursor2->toArray()) . "<br> Start Date: " . $gt_date2 . " End Date: " . $lt_date2 . "<br><br>";
		// print_r($cursor2);

		$document = array( 
	  "username" => "waqas", 
	  "email" => "waqas.siddiqui@gmail.com", 
	  "password" => "waqaswaqas"
	 );


	$collection->insertOne($document);
	print_r($collection);
	//$output = json_encode(array('type' => 'message', 'text' => 'Polygon Area Save Successfully'));

