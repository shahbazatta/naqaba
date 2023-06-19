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
	if ( !isset($_POST["arabic_name"]) 
    || !isset($_POST["english_name"]) 
    || !isset($_POST["type"]) 
    || !isset($_POST["district"]) 
    || !isset($_POST["description"]) 
    || !isset($_POST["category"]) 
    || !isset($_POST["site"]) 
    || !isset($_POST["station_type"]) 
    || !isset($_POST["station_code"]) 
    || !isset($_POST["station_name"]) 
    || !isset($_POST["code_id"]) 
    || !isset($_POST["generic_name"]) 
    || !isset($_POST["geofence_type"]) 
    || !isset($_POST["season"])
    || !isset($_POST["geofence_update_id"]) ) {

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
	//$shape_area = filter_var(trim($_POST["shape_area"]), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
	//$coordinates_array = trim($_POST["coordinates"]);
	$geofence_id = trim($_POST["geofence_update_id"]);

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
	
	// var typecode = '';
	// if ($geo_type == "مركز تفويج")
	// 	typecode = "TC";
	// elseif($geo_type == "محطة  نقل")
	// 	typecode = "S"
	// elseif($geo_type == "موقف سيارات")
	// 	typecode = "P"
	// elseif($geo_type == "مخزن حافلات")
	// 	typecode = "BD"
	// elseif($geo_type == "صالة")
	// 	typecode = "T"
	// elseif($geo_type == "ميقات")
	// 	typecode = "L"
	// elseif($geo_type == "مركز ترجيب")
	// 	typecode = "WC"
	// elseif($geo_type == "مركز اسناد")
	// 	typecode = "EC"
	// elseif($geo_type == "مسار")
	// 	typecode = "M"
	// elseif($geo_type == "حي")
	// 	typecode = "D"



	$db = $client->selectDatabase(DB_NAME);
	$collection = $db->geofence;

	$updateResult = $collection->updateOne(
	   ['_id' => new \MongoDB\BSON\ObjectID($geofence_id)],
	   [ '$set' => [ 
	   	'attributes.ArabicName' => $arabic_name, 
	   	'attributes.EnglishName' => $english_name, 
	   	'attributes.Type' => $type, 
	   	'attributes.District' => $district, 
	   	'attributes.Description' => $description, 
	   	'attributes.Category' => $category, 
	   	'attributes.Site' => $site, 
	   	'attributes.Station_type' => (int)$station_type, 
	   	'attributes.Station_Code' => (int)$station_code, 
	   	'attributes.Station_Name' => $station_name, 
	   	'attributes.Code_ID' => $code_id,  
	   	'attributes.Description' => $generic_name,
	   	'attributes.Geofence_Type' => $geofence_type, 
	   	'attributes.Season' => $season 
	   ] ]
	);

	$uresult = ("Matched ".$updateResult->getMatchedCount()." document(s)");
	$uresult .= (" Modified ".$updateResult->getModifiedCount()." document(s)");

	/*
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
	*/

	$output = json_encode(array('type' => 'message', 'text' => 'Update Geofense Successfully: '.$uresult));
	die($output);

}else{
	header("Location: ../index.php");
}


