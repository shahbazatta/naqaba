<?php 

$cookie_name = "login_string";
$cookie_value = "5fe69c95ed70a9869d9f9af7d8400a6673bb9ce9";
$cookie_time = 60 * 1000; //10 minutes

$error = "";

if(isset($_GET['logout'])){
  setcookie($cookie_name, $cookie_value, time() + (-7200), "/");
  header('Location: login.php');
}

if (isset($_POST["submitLogin"])) {

  if ( !isset($_POST["userId"]) || !isset($_POST["password"]) || 
       empty($_POST["password"]) || empty($_POST["password"]) ) 
  {
    $error = "You have entered either the Username and/or Password incorrectly";
  }else{
    $userId = $_POST['userId'];
    $userPassword = $_POST['password'];

    if ($userId == "admin" && $userPassword == "Naqabah92"){

      setcookie($cookie_name, $cookie_value, time() + ($cookie_time), "/");
      header('Location: index.php');

    }else{
      $error = "You have entered either the Username and/or Password incorrectly";
    }
  }
}

if(basename($_SERVER['PHP_SELF']) == 'login.php'){
  if (isset($_COOKIE[$cookie_name]) && $_COOKIE[$cookie_name] == $cookie_value) {
    header('Location: index.php');
  }
}elseif (basename($_SERVER['PHP_SELF']) == 'index.php'){
  if (isset($_COOKIE[$cookie_name]) && $_COOKIE[$cookie_name] == $cookie_value) {
    setcookie($cookie_name, $cookie_value, time() + ($cookie_time), "/");
  }else{
    header('Location: login.php');
  }
}


?>