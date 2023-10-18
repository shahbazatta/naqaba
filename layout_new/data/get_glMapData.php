<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once("../config/config.php");
require_once '../vendor/autoload.php';

//use MongoDB\Exception;
//use MongoDB\BSON\UTCDateTime;
use MongoDB\Client;
use ClickHouseDB\Exception;

if (isset($_POST["api_key"]) && isset($_POST["imei_no"]) && isset($_POST["start_date"]) && isset($_POST["end_date"])) {
    if (empty($_POST["api_key"]) || empty($_POST["imei_no"]) || empty($_POST["start_date"]) || empty($_POST["end_date"]) || $_POST["api_key"] != 'becdf4fbbbf49dbc') {

        echo '{"Error":"Invalid or wrong value"}';
    } else {

        //Atlas connection string
        //$uri = 'mongodb://shahbaz:Islam786ian@209.38.216.19:27017/';

        $config = [
            'host' => '209.38.216.19',
            'port' => '8123',
            'username' => 'default',
            'password' => 'Islam786ian'
        ];

        // Create a new client and connect to the server
        $client = new ClickHouseDB\Client($config);
        //$db = $client->database(DB_NAME);

        try {
            // Send a ping to confirm a successful connection
            $client->database(DB_NAME);
            //$client->ping(true);
            //echo "Pinged your deployment. You successfully connected to CLick House! <br>";
        } catch (Exception $e) {
            printf($e->getMessage());
        }


        $imei_rec = (int)trim($_POST["imei_no"]);
        $start_date = new DateTime(trim($_POST["start_date"]), new DateTimeZone('UTC'));
        $end_date = new DateTime(trim($_POST["end_date"]), new DateTimeZone('UTC'));

        $gt_date = $start_date->format('Y-m-d H:i:s');
        $lt_date = $end_date->format('Y-m-d H:i:s');


        $db = $client->database(DB_NAME);
        //$collection = $db->gpsHistorical;
        // $cursor = $collection->find(array('imei' => $imei_rec));
//        $cursor = $collection->find(
//            array(
//                'avltm' => array('$gte' => (int)$gt_date2, '$lte' => (int)$lt_date2),
//                'spd' => array('$gt' => 0),
//                'imei' => $imei_rec
//            ), ['sort' => ['avltm' => 1], 'limit' => 1000]);

        //$cursor = $db->select("SELECT * FROM gpsHistorical WHERE avltm >= '$gt_date' AND avltm <= '$lt_date' AND spd > 0 AND imei = '$imei_rec' ORDER BY avltm DESC LIMIT 5");
        $cursor = $db->select("SELECT * FROM naqaba.gpsHistorical WHERE imei = '$imei_rec' AND avltm >= '$gt_date' AND avltm <= '$lt_date' ORDER BY avltm DESC LIMIT 1000");

//        print_r($cursor);
//        exit;

        $json_data = null;
        $cursor = iterator_to_array($cursor);

        $new_cursor = array();
        $times = [];
        $coordinates = [];
        $arrCounter = 0;
        $imei = $cursor[0]['imei'];


        foreach ($cursor as $key => $item) {
//            $new_cursor['coordinates'] = $item['location']['coordinates'];
//            $new_cursor['times'] = $item['avltm'];
            $coordinates[$key] = $item['location'];
            $times[$key] = $item['avltm'];
            $arrCounter++; // increment
        }

        // Step 1: Convert timestamps to Unix timestamps (seconds since epoch)
        $timestampObjects = array_map(function ($timestamp) {
            return strtotime($timestamp);
        }, $times);

        // Step 2: Calculate time differences in seconds
        $timeDifferences = array_map(function ($timestamp, $firstTimestamp) {
            return $timestamp - $firstTimestamp;
        }, $timestampObjects, [$timestampObjects[0]]);

        // Step 3: Convert time differences to minutes
        $minutesDifferences = array_map(function ($timeDifference) {
            return floor($timeDifference / 60);
        }, $timeDifferences);

        // Optionally, you can generate the timesArr array with a specified interval
        $interval = 6; // Set your desired interval in minutes
        $timesArr = range(0, (count($times) - 1) * $interval, $interval);

        $new_cursor = ['coordinates' => $coordinates, 'relTimes' => $timesArr, 'avltm' => $times, 'arrCounter' => $arrCounter, 'imei' => $imei];

//        print_r($new_cursor);
//        exit;

        echo $json_data = json_encode($new_cursor, JSON_UNESCAPED_UNICODE);
    }

} else {
    header("Location: ../index.php");
}
