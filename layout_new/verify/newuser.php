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

$userName = "";
$userEmail = "";
$password = "";
$confirmPassword = "";

if (isset($_POST["submitSignup"])) {

  if( !isset($_POST["userName"]) || empty($_POST["userName"]) ){
    $error = "You have entered the Username incorrectly";
  }elseif ( !isset($_POST["userEmail"]) || empty($_POST["userEmail"]) ) {
    $error = "You have entered the email incorrectly";
  }elseif (!filter_var($_POST["userEmail"], FILTER_VALIDATE_EMAIL)) {
    $error = "You have entered the email incorrectly";
  }elseif ( !isset($_POST["password"]) || empty($_POST["password"]) ) {
    $error = "You have entered the password incorrectly";
  }elseif ( !isset($_POST["confirmPassword"]) || empty($_POST["confirmPassword"]) ) {
    $error = "You have entered the confirm Password incorrectly";
  }elseif ( isset($_POST["password"]) != isset($_POST["confirmPassword"]) ) {
    $error = "Password and confirm password doesnt match";
  }else{

    

    $userName = $_POST['userName'];
    $userEmail = $_POST['userEmail'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    

    $hash_password = password_hash($confirmPassword, PASSWORD_DEFAULT);
    

    $passwordforget = 0;
    $pasforgetCode = "null";
    $emailactive = 0;
    $accountstatus = 0;
    $emailactiveCode = getRandomString(25);
    $createdon = date('Y-m-d H:i:s');

    $db = $client->selectDatabase(DB_NAME);
    $collection = $db->users;

    $cursor = $collection->find(array('email' => $userEmail));
    
    $countdata = count($cursor->toArray());

    if($countdata>0){

      $error = "Email already exist. " . $countdata;

    }else{

      $document = array( 
        "username" => $userName, 
        "email" => $userEmail, 
        "emailactive" => $emailactive, 
        "emailactivecode" => $emailactiveCode, 
        "password" => $hash_password,  
        "pasforgetCode" => $pasforgetCode, 
        "accountstatus" => $accountstatus, 
        "createdon" => $createdon
      );

      $collection->insertOne($document);
      sendEmail($userEmail, $emailactiveCode, 'emailVerification');
      $message = "User successfully added";
    }
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



// if(basename($_SERVER['PHP_SELF']) == 'login.php'){
//   if (isset($_COOKIE[$cookie_name]) && $_COOKIE[$cookie_name] == $cookie_value) {
//     header('Location: index.php');
//   }
// }elseif (basename($_SERVER['PHP_SELF']) == 'index.php'){
//   if (isset($_COOKIE[$cookie_name]) && $_COOKIE[$cookie_name] == $cookie_value) {
//     setcookie($cookie_name, $cookie_value, time() + ($cookie_time), "/");
//   }else{
//     header('Location: login.php');
//   }
// }


?>