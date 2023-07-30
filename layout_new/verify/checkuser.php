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

$error = "";

if(isset($_GET['logout'])){
  setcookie($cookie_name, $cookie_value, time() + (-7200), "/");
  header('Location: login.php');
}

if (isset($_POST["submitLogin"])) {

  if ( !isset($_POST["userId"]) || !isset($_POST["password"]) || 
       empty($_POST["userId"]) || empty($_POST["password"]) ) 
  {
    $error = "You have entered either the Username and/or Password incorrectly";
  }else{
    $userId = $_POST['userId'];
    $userPassword = $_POST['password'];

    $db = $client->selectDatabase(DB_NAME);
    $collection = $db->users;

    $cursor = $collection->find(array('username' => $userId));
    $data_arry = $cursor->toArray();
    $countdata = count($data_arry);

    if($countdata ==1){

      print_r($data_arry);

      $db_username = $data_arry[0]['username'];
      $db_password = $data_arry[0]['password'];

      if (password_verify($userPassword, $db_password)) {

          setcookie($cookie_name, $cookie_value, time() + ($cookie_time), "/");
          header('Location: index.php');
          
      } else {
          $error = "You have entered invalid Password";
      }

    }else{
      $error = "You have entered the invalid username";
    }

    
  }
}

?>