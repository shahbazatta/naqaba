<?php
//header("Content-Type: application/json");
require_once("../config/config.php");
require_once '../vendor/autoload.php';
require_once("get_avlDevicesDataAll.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //var_dump($_POST);

    $loadedNumber = $_POST['loaded'];
    $limit = $_POST['limit'];

    $devicesData = new GetAvlDevicesData();

    $devicesData->getBusesEmieData((int)$limit, (int)$loadedNumber);
    //var_dump($devicesData->avl_Bus_data);
    $data = $devicesData->avl_Bus_emie_data;
//    $new_data = array();
//    //$imei = $cursor[0]['imei'];
//
//
//    foreach ($data as $key => $item) {
//        //$new_data[$key]['_id'] = $item['_id'];
//        $new_data[$key]['imei'] = $item['imei'];
//        //$new_data[$key]['bus_oper_no'] = $item['device']['bus_oper_no'];
//    }

    echo json_encode($data);

} else {
    // Handle non-POST requests or errors
    http_response_code(400); // Set an appropriate error code
    echo json_encode(["error" => "Invalid request"]);
}
