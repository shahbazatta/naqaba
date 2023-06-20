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
	if ( !isset($_POST["arabic_name"]) || !isset($_POST["english_name"]) || !isset($_POST["type"]) || !isset($_POST["district"]) || !isset($_POST["description"]) || !isset($_POST["category"]) || !isset($_POST["site"]) || !isset($_POST["station_type"]) || !isset($_POST["station_code"]) || !isset($_POST["station_name"]) || !isset($_POST["code_id"]) || !isset($_POST["generic_name"]) || !isset($_POST["geofence_type"]) || !isset($_POST["season"])|| !isset($_POST["coordinates"]) ) {
	    $output = json_encode(array('type' => 'error', 'text' => 'Input fields are empty!'));
	    die($output);
	}

	//Sanitize input data using PHP filter_var().
	$arabic_name = filter_var(trim($_POST["arabic_name"]), FILTER_SANITIZE_STRING);
	$english_name = filter_var(trim($_POST["english_name"]), FILTER_SANITIZE_STRING);
	$type = filter_var(trim($_POST["type"]), FILTER_SANITIZE_STRING);
	$district = filter_var(trim($_POST["district"]), FILTER_SANITIZE_STRING);
	$description = filter_var(trim($_POST["description"]), FILTER_SANITIZE_STRING);
	$category = filter_var(trim($_POST["category"]), FILTER_SANITIZE_STRING);
	$site = filter_var(trim($_POST["site"]), FILTER_SANITIZE_STRING);
	$station_type = filter_var(trim($_POST["station_type"]), FILTER_SANITIZE_NUMBER_INT);
	$station_code = filter_var(trim($_POST["station_code"]), FILTER_SANITIZE_NUMBER_INT);
	$station_name = filter_var(trim($_POST["station_name"]), FILTER_SANITIZE_STRING);
	$code_id = filter_var(trim($_POST["code_id"]), FILTER_SANITIZE_STRING);
	$generic_name = filter_var(trim($_POST["generic_name"]), FILTER_SANITIZE_STRING);
	$geofence_type = filter_var(trim($_POST["geofence_type"]), FILTER_SANITIZE_STRING);
	$season = filter_var(trim($_POST["season"]), FILTER_SANITIZE_STRING);


	$coordinates_array = trim($_POST["coordinates"]);
	//$output = json_encode(array('type' => 'message', 'text' => 'Success2 ' . $coordinates_array));
	//die($output);

	$type_code = "";
	if($type == "مركز ترحيب"){
		$type_code = "WC";
	}elseif ($type == "مخازن حافلات") {
		$type_code = "K";
	}else{

	}
	
	$arrr = explode(",",$coordinates_array);
	$array_set = array();
	$coordinates = array();
	$kk = 0;

	for($i = 0; $i < count($arrr); $i++) {
    	$kk++;
    	array_push($array_set,(float)$arrr[$i]);
      	if($kk == 2){
        	array_push($coordinates,$array_set);
        	$kk = 0;
        	$array_set = array();
      	}
	}
	
	//$output = json_encode(array('type' => 'message', 'text' => 'Success ' . $array_set));
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

	$document = array( 
	  "attributes" => array(
	        "OBJECTID" => 0,
	        "ArabicName" => $arabic_name,
	        "EnglishName" => $english_name,
	        "Type" => $type,
	        "TypeCode" => $type_code,
	        "District" => $district,
	        "Description" => $description,
	        "Category" => $category,
	        "Site" => $site,
	        "Station_type" => (int)$station_type,
	        "Station_Code" => (int)$station_code,
	        "Station_Name" => $station_name,
	        "Code_ID" => $code_id,
	        "Name" => $generic_name,
	        "Geofence_Type" => $geofence_type,
	        "Season" => $season
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


