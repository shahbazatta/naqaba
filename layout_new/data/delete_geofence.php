<?php
require_once("../config/config.php");
require_once '../vendor/autoload.php';



use MongoDB\Exception;
use MongoDB\Client;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	//check if its an ajax request, exit if not
	if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {

	    //exit script outputting json data
	    $output = json_encode(
	            array(
	                'type' => 'error',
	                'text' => 'Request must come from Ajax'
	    ));

	    die($output);
	    header("Location: ../index.php");
	}


	//check $_POST vars are set, exit if any missing
	if ( !isset($_POST["geofence_id"]) ) {
	    $output = json_encode(array('type' => 'error', 'text' => 'Wrong geofence id'));
	    die($output);
	}

	//Sanitize input data using PHP filter_var().
	$geofence_id = filter_var(trim($_POST["geofence_id"]), FILTER_SANITIZE_STRING);


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
	$collection = $db->geofence;

	$deleteResult = $collection->deleteOne(array( '_id' => new MongoDB\BSON\ObjectId ($geofence_id )));
	
	$output = json_encode(array('type' => 'message', 'text' => 'Selected Geofense Deleted Successfully '));
	die($output);

}else{
	header("Location: ../index.php");
}


