<?php
require_once("../config/config.php");
require_once '../vendor/autoload.php';

use MongoDB\Exception;
use MongoDB\Client;

if( isset($_POST["api_key"]) && isset($_POST["imei_no"]) && isset($_POST["start_date"]) && isset($_POST["end_date"]) ) {
	if (empty($_POST["api_key"]) || empty($_POST["imei_no"]) || empty($_POST["start_date"]) || empty($_POST["end_date"]) || $_POST["api_key"] != 'becdf4fbbbf49dbc') {
	    
	    echo '{"Error":"Invalid or wrong value"}';
	}
	else{

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

		$imei_rec = (int)trim($_POST["imei_no"]);
		$start_date = trim($_POST["start_date"]);
		$end_date = trim($_POST["end_date"]);

		$gt_date = new \MongoDB\BSON\UTCDateTime(strtotime($start_date) * 1000);
		$lt_date = new \MongoDB\BSON\UTCDateTime(strtotime($end_date) * 1000);

		$gt_date2 = (string) $gt_date;
		$lt_date2 = (string) $lt_date;


		$db = $client->selectDatabase(DB_NAME);
		$collection = $db->gpsHistorical;
		// $cursor = $collection->find(array('imei' => $imei_rec));
		$cursor = $collection->find(array('avltm'=>array ('$gte'=> (int) $gt_date2, '$lte' => (int) $lt_date2 ),'spd'=>array ('$gt'=> 0), 'imei' => $imei_rec), ['sort' => ['avltm' => 1], 'limit' => 1000] );

		$json_data = null;

		//print_r($cursor);
		 
		echo $json_data = json_encode(iterator_to_array($cursor), JSON_UNESCAPED_UNICODE);
	}

}else{
	 header("Location: ../index.php");
}
