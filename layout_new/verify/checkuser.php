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

if(isset($_GET['logout'])){
  setcookie($cookie_name, $cookie_value, time() + (-7200), "/");
  header('Location: login.php');
}

if (isset($_POST["submitLogin"])) {

  if ( !isset($_POST["emailId"]) || !isset($_POST["password"]) || 
       empty($_POST["emailId"]) || empty($_POST["password"]) ||
       (!filter_var($_POST["emailId"], FILTER_VALIDATE_EMAIL)) ) 
  {
    $error = "You have entered either the Email and/or Password incorrectly";
  }else{
    $emailId = $_POST['emailId'];
    $userPassword = $_POST['password'];

    $db = $client->selectDatabase(DB_NAME);
    $collection = $db->users;

    $cursor = $collection->find(array('email' => $emailId));
    $data_arry = $cursor->toArray();
    $countdata = count($data_arry);

    if($countdata == 1){

      //print_r($data_arry);

      $db_email = $data_arry[0]['email'];
      $db_password = $data_arry[0]['password'];
      $db_emailactive = (bool) $data_arry[0]['emailactive'];
      $db_accountstatus = (bool) $data_arry[0]['accountstatus'];

      if (password_verify($userPassword, $db_password)) { 
        if ($db_emailactive) {
          if($db_accountstatus){
            //setcookie($cookie_name, $cookie_value, time() + ($cookie_time), "/");
            //header('Location: index.php');
            echo 'asdasdsa';
          }else{
            $error = "Your account activation request in proccess, please contact your admin, thanks";
          }

        }else{
          $error = "You need to verify your email to continue, check your email";
        }

      } else {
          $error = "You have entered invalid Password";
      }

    }else{
      $error = "You have entered the invalid email";
    }

    
  }
}



?>