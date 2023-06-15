<?php
require_once '../vendor/autoload.php';

use MongoDB\Exception;
use MongoDB\Client;

class GetAvlDevicesData
{
	public $messages = array();
    public $avl_Bus_data = array();
    public $geofence_data = array();
    public $db;

    public function __construct()
    {
    	$this->connectDbB();
    	$this->getBusesData();
    	$this->getGeofenceData();
    }

    private function connectDbB()
    {
    	//Atlas connection string
		$uri = 'mongodb://shahbaz:Islam786ian@64.227.118.83:27017/';

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

		$this->db = $client->selectDatabase('naqaba');
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
		$cursor2 = $collection2->find(array(), array('projection' => array('_id' => 1, 'attributes.Arabic_Name' => 1, 'attributes.English_Name' => 1, 'attributes.Description' => 1, 'attributes.Type' => 1, 'attributes.Station_Name' => 1, 'attributes.Station_Code' => 1)))->toArray();
		$this->geofence_data = $cursor2;

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

}

?>
