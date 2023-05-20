<?php
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
	if ( !isset($_POST["arabic_name"]) || !isset($_POST["english_name"]) || !isset($_POST["type"]) || !isset($_POST["district"]) || !isset($_POST["area"]) || !isset($_POST["description"]) || !isset($_POST["category"]) || !isset($_POST["site"]) || !isset($_POST["station_type"]) || !isset($_POST["station_code"]) || !isset($_POST["station_name"]) || !isset($_POST["code_id"]) || !isset($_POST["shape_length"]) || !isset($_POST["shape_area"]) ) {
	    $output = json_encode(array('type' => 'error', 'text' => 'Input fields are empty!'));
	    die($output);
	}

	//Sanitize input data using PHP filter_var().
	$arabic_name = filter_var(trim($_POST["arabic_name"]), FILTER_SANITIZE_STRING);
	$english_name = filter_var(trim($_POST["english_name"]), FILTER_SANITIZE_STRING);
	$type = filter_var(trim($_POST["type"]), FILTER_SANITIZE_STRING);
	$district = filter_var(trim($_POST["district"]), FILTER_SANITIZE_STRING);
	$area = filter_var(trim($_POST["area"]), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
	$description = filter_var(trim($_POST["description"]), FILTER_SANITIZE_STRING);
	$category = filter_var(trim($_POST["category"]), FILTER_SANITIZE_STRING);
	$site = filter_var(trim($_POST["site"]), FILTER_SANITIZE_STRING);
	$station_type = filter_var(trim($_POST["station_type"]), FILTER_SANITIZE_NUMBER_INT);
	$station_code = filter_var(trim($_POST["station_code"]), FILTER_SANITIZE_NUMBER_INT);
	$station_name = filter_var(trim($_POST["station_name"]), FILTER_SANITIZE_STRING);
	$code_id = filter_var(trim($_POST["code_id"]), FILTER_SANITIZE_STRING);
	$shape_length = filter_var(trim($_POST["shape_length"]), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
	$shape_area = filter_var(trim($_POST["shape_area"]), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

	//$output = json_encode(array('type' => 'message', 'text' => 'Success'));
	//die($output);

	//additional php validation
	// if (strlen($username) < 4) { // If length is less than 4 it will throw an HTTP error.
	//     $output = json_encode(array('type' => 'error', 'text' => 'Name is too short!'));
	//     die($output);
	// }
	// if (!filter_var($useremail, FILTER_VALIDATE_EMAIL)) { //email validation
	//     $output = json_encode(array('type' => 'error', 'text' => 'Please enter a valid email!'));
	//     die($output);
	// }
	// if (strlen($message) < 5) { //check emtpy message
	//     $output = json_encode(array('type' => 'error', 'text' => 'Too short message!'));
	//     die($output);
	// }

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
	$collection = $db->geofence;

	$coordinates = array(
		[
          39.82919461800003,
          21.417006041000036
        ],
        [
          39.829213999000046,
          21.416674484000055
        ],
        [
          39.829155531000026,
          21.41669224700007
        ],
        [
          39.82910253800003,
          21.41670425700005
        ],
        [
          39.82891650000005,
          21.416780982000034
        ],
        [
          39.828925678000076,
          21.41683616800003
        ],
        [
          39.828925954000056,
          21.417023612000037
        ],
        [
          39.828977663000046,
          21.41702448600006
        ],
        [
          39.82919461800003,
          21.417006041000036
        ]
	);

	$document = array( 
	  "attributes" => array(
	        "OBJECTID" => 0,
	        "Arabic_Name" => $arabic_name,
	        "English_Name" => $english_name,
	        "Type" => $type,
	        "District" => $district,
	        "Area" => (float)$area,
	        "Description" => $description,
	        "Category" => $category,
	        "Site" => $site,
	        "Station_type" => (int)$station_type,
	        "Station_Code" => (int)$station_code,
	        "Station_Name" => $station_name,
	        "Code_ID" => $code_id,
	        "SHAPE_Length" => (float)$shape_length,
	        "SHAPE_Area" => (float)$shape_area
	    ), 
	  "geometry" => array(
	        "type" => "Polygon", 
	        "coordinates" => array(
	        	$coordinates
	        )
	    )
	 );
	$collection->insertOne($document);
	$output = json_encode(array('type' => 'message', 'text' => 'Polygon Area Save Successfully'));
	die($output);
}else{
	header("Location: ../index.php");
}

