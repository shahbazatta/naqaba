<?php 
require_once("vendor/autoload.php");
require_once("mail.php");

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

$codeLenght = 25;

if (isset($_POST["submitEmailForget"])) {

  if ( !isset($_POST["emailId"]) || empty($_POST["emailId"]) || !filter_var($_POST["emailId"], FILTER_VALIDATE_EMAIL) ) 
  {
    $error = "You have entered the email incorrectly";
  }else{
    $emailId = $_POST['emailId'];

    $db = $client->selectDatabase(DB_NAME);
    $collection = $db->users;

    $cursor = $collection->find(array('email' => $emailId));
    $data_arry = $cursor->toArray();
    $countdata = count($data_arry);

    if($countdata == 1){

      $user_id = $data_arry[0]['_id'];
      $db_email = $data_arry[0]['email'];
      $db_emailactive = (bool) $data_arry[0]['emailactive'];
      //$db_accountstatus = (bool) $data_arry[0]['accountstatus'];

      $pasforgetCode = getRandomString($codeLenght);

      if($db_emailactive){

        $updateResult = $collection->updateOne(
           ['_id' => new \MongoDB\BSON\ObjectID($user_id)],
           [ '$set' => [ 
            'pasforgetCode' => $pasforgetCode, 
           ] ]
        );

        sendEmail($db_email, $pasforgetCode, 'forgetPassword');
        $message = "Forget password link send on your email check your inbox, thanks!";

      }else{
        $error = "You have entered the unverified email, please verify your email first, thanks!";
      }

    }else{
      $error = "Reset password failed email not found in database";
    }

    
  }
}

if (isset($_POST["submitNewPassword"])) {
  
  if ( !isset($_POST["password"]) || empty($_POST["password"]) ) {
    $error = "You have entered the password incorrectly";
  }elseif ( !isset($_POST["confirmPassword"]) || empty($_POST["confirmPassword"]) ) {
    $error = "You have entered the confirm Password incorrectly";
  }elseif ( isset($_POST["password"]) != isset($_POST["confirmPassword"]) ) {
    $error = "Password and confirm password doesnt match";
  }elseif ( !isset($_POST["passcode"]) || empty($_POST["passcode"]) ) {
    $error = "Verification code is not valid";
  }elseif ( !isset($_POST["emailId"]) || empty($_POST["emailId"]) ) {
    $error = "You have entered the email incorrectly";
  }elseif (!filter_var($_POST["emailId"], FILTER_VALIDATE_EMAIL)) {
    $error = "You have entered the email incorrectly";
  }else{

    $passcode = $_POST['passcode'];
    $getEmail = $_POST['emailId'];
    $confirmPassword = $_POST['confirmPassword'];

    $hash_password = password_hash($confirmPassword, PASSWORD_DEFAULT);

    $db = $client->selectDatabase(DB_NAME);
    $collection = $db->users;

    $cursor = $collection->find(array('email' => $getEmail));
    $data_arry = $cursor->toArray();
    $countdata = count($data_arry);
    //print_r($data_arry);
    if($countdata == 1){

      $pasforgetCode = $data_arry[0]['pasforgetCode'];
      $user_id = $data_arry[0]['_id'];

      if($passcode == $pasforgetCode && $pasforgetCode != 'null'){
        $updateResult = $collection->updateOne(
           ['_id' => new \MongoDB\BSON\ObjectID($user_id)],
           [ '$set' => [ 
            'pasforgetCode' => 'null',
            'password' => $hash_password, 
           ] ]
        );
        
        //echo (" Modified ".$updateResult->getModifiedCount()." document(s)");
        $message = 'Your have sucessfully update your password, thanks';

      }

    }

  }
}
if(isset($_GET['passcode']) && isset($_GET['email'])){
  if(empty(trim($_GET["passcode"])) || empty(trim($_GET["email"])) || !(filter_var($_GET["email"], FILTER_VALIDATE_EMAIL)) ||  $_GET["passcode"] == 'null' || strlen($_GET["passcode"]) != $codeLenght){

    header('Location: index.php');

  }
}

function getRandomString($n)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }

    return $randomString;
}

?>