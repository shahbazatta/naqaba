<?php
require_once '../vendor/autoload.php';

use MongoDB\Exception;
use MongoDB\Client;

class GetAvlDevicesData
{
	public $messages = array();
    public $avl_Bus_data = array();
    public $geofence_data = array();
    public $current_language = "";
    public $db;

    public $tracking_com = array();
    public $transpotation_com = array();
    public $tracking_devices = array();


    public function __construct()
    {
    	$this->connectDbB();
    	$this->getBusesData();
    	$this->getGeofenceData();

    	$this->getTrackingCompaniesData();
    	$this->getTransportationCompaniesData();
    	$this->getTrackingDevicesData();
    }

    private function connectDbB()
    {
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

		$this->db = $client->selectDatabase(DB_NAME);
    }

    private function getBusesData()
    {
		$collection = $this->db->avlDevices;
		$cursor = $collection->find(array(), array('projection' => array('_id' => 1, 'imei' => 1, 'plate_no' => 1, 'engplate_no' => 1, 'bus_oper_no' => 1)))->toArray();
		$this->avl_Bus_data = $cursor;
		//print_r($this->avl_Bus_data);
    }
    private function getGeofenceData()
    {

		$collection2 = $this->db->geofence;
		$cursor2 = $collection2->find(array(), array('projection' => array('_id' => 1, 'attributes.ArabicName' => 1, 'attributes.EnglishName' => 1, 'attributes.Geofence_Type' => 1, 'attributes.Season' => 1, 'attributes.Description' => 1, 'attributes.Code_ID' => 1)))->toArray();
		$this->geofence_data = $cursor2;
		//print_r($cursor2);

		// foreach ($this->geofence_data as $output) {
		// 	if(isset($output['attributes']['English_Name'])){
	 //        	echo $output['attributes']['English_Name'];
		// 	}
	        
	 //        //print_r($output);
	 //      }
		//print_r($cursor);
		//print_r($this->geofence_data);
		
		//foreach ($this->avl_Bus_data as $output) {
	    //    echo (int)$output['imei'];
        //}
		
		//print_r($cursor);
		//foreach ($cursor as $record){
		//	echo (int)$record['imei'];
		//}
			
    }


    private function getTrackingCompaniesData()
    {	
    	if($this->current_language == ""){
    		$lang_cookie = 'language_json';
			if(isset($_GET['lang'])) {
			    if($_GET['lang']=='ar'){
			      $this->current_language = 'ar';
			    }else{
			      $this->current_language = 'en';
			    }
			} else {
			    if(isset($_COOKIE[$lang_cookie])) {
			      if($_COOKIE[$lang_cookie] == 'ar'){
			        $this->current_language = 'ar';
			      }else{
			        $this->current_language = 'en';
			      }
			    }else{
			      $this->current_language = 'ar';  
			    }
			}
    	}

    	$collection = $this->db->avlDevices;

    	if($this->current_language == 'en'){
  			$cursor = $collection->distinct('avl_comp');	
		}else{
		  	$cursor = $collection->distinct('avl_comp_ar');
		}

		$this->tracking_com = $cursor;
    }


    private function getTransportationCompaniesData()
    {
    	if($this->current_language == ""){
    		$lang_cookie = 'language_json';
			if(isset($_GET['lang'])) {
			    if($_GET['lang']=='ar'){
			      $this->current_language = 'ar';
			    }else{
			      $this->current_language = 'en';
			    }
			} else {
			    if(isset($_COOKIE[$lang_cookie])) {
			      if($_COOKIE[$lang_cookie] == 'ar'){
			        $this->current_language = 'ar';
			      }else{
			        $this->current_language = 'en';
			      }
			    }else{
			      $this->current_language = 'ar';  
			    }
			}
    	}

    	$collection = $this->db->avlDevices;

    	if($this->current_language == 'en'){
  			$cursor = $collection->distinct('trnspt_comp');	
		}else{
		  	$cursor = $collection->distinct('trnspt_comp_ar');
		}

		$this->transpotation_com = $cursor;
    }


    private function getTrackingDevicesData()
    {
    	$collection = $this->db->avlDevices;
  		$cursor = $collection->distinct('device_comp');
		$this->tracking_devices = $cursor;
    }

}

?>
