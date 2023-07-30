<?php 

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