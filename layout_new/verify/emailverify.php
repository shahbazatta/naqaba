<?php 
require_once("vendor/autoload.php");

use MongoDB\Exception;
use MongoDB\Client;

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

$message = "";
$error = "";

if(isset($_GET['activation']) && isset($_GET['email'])){
  if(empty(trim($_GET["activation"])) || empty(trim($_GET["email"])) || !(filter_var($_GET["email"], FILTER_VALIDATE_EMAIL)) ){

    $error = "Your activation request is not valid, please contact with your admin for your account activation, thanks!";

  }else{

    $getActivationCode = trim($_GET["activation"]);
    $getEmail = trim($_GET["email"]);

    $db = $client->selectDatabase(DB_NAME);
    $collection = $db->users;

    $cursor = $collection->find(array('email' => $getEmail));
    $data_arry = $cursor->toArray();
    $countdata = count($data_arry);
    //print_r($data_arry);
    if($countdata == 1){
      $emailactivecode = $data_arry[0]['emailactivecode'];
      $user_id = $data_arry[0]['_id'];
      if($emailactivecode == $getActivationCode){

        $updateResult = $collection->updateOne(
           ['_id' => new \MongoDB\BSON\ObjectID($user_id)],
           [ '$set' => [ 
            'emailactive' => 1,
            'emailactivecode' => 1, 
           ] ]
        );
        
        //echo (" Modified ".$updateResult->getModifiedCount()." document(s)");

        $message = 'Your account activation request is received, we will inform you in next 24 hours, thanks';
      }elseif($emailactivecode == 1){
        $message = 'Your account activation request in proccess, we will inform you soon, thanks';
      }else{
        $error = "Your activation code is not valid, please contact with your admin for your account activation, thanks!";
      }
    }

  }
}else{
  header('Location: login.php');
}




?>