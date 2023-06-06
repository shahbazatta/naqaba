<?php 
require_once("localizedStrings.php");
use noknowliblocalelocalizedStrings\LocalizedStrings;

$localizedStrings = new LocalizedStrings();

$lang_type = 'ar';
$lang_cookie = 'language_json';

//setcookie($lang_cookie, '', time() - (86400 * 30), "/");  

if(isset($_GET['lang'])) {
    if($_GET['lang']=='ar'){
      setcookie($lang_cookie, 'ar', time() + (86400 * 30), "/");  
      $lang_type = 'ar';
    }else{
      setcookie($lang_cookie, 'en', time() + (86400 * 30), "/");
      $lang_type = 'en';
    }
} else {
    if(isset($_COOKIE[$lang_cookie])) {
      if($_COOKIE[$lang_cookie] == 'ar'){
        $lang_type = 'ar';
      }else{
        $lang_type = 'en';
      }
    }else{
      setcookie($lang_cookie, 'ar', time() + (86400 * 30), "/");
      $lang_type = 'ar';  
    }
}

$json_lang = 'lang/'.$lang_type.'.json';

$localizedStrings->AddLocalizedJsonFile($localizedStrings::LC_EN, $json_lang);	



//echo $localizedStrings->String($localizedStrings::LC_EN, 'naqabahTrackerSystemv1');

?>