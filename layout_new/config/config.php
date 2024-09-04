<?php
// THIS FILE CONTENT THE VARIABLES OF THE TEMPLATE
// You just have to edit variables...

// Get current page url
	$protocol		= isset($_SERVER['HTTPS']) == 'on' ? 'https' : 'http';
	$host     		= $_SERVER['HTTP_HOST'];
	$script   		= $_SERVER['SCRIPT_NAME'];
	$params   		= empty($_SERVER['QUERY_STRING']) ? '' : '?'. $_SERVER['QUERY_STRING'];
	
	$currentUrl		= $protocol . '://' . $host . $script . $params;

	//echo "Host: " . $host;

	if($host == "localhost"){
		$siteUrl =	$protocol . '://localhost/Naqaba/naqaba/layout_new/';
	}else{
		$siteUrl =	$protocol . '://20.46.146.117/';
	}

	define("SITE_URL", $siteUrl);

/**
 * Configuration for: Database Connection
 */

define("DB_NAME", "admin");
//define("DB_USER_NAME", "shahbaz");
//define("DB_PASS_NAME", "Islam786ian");
define("DB_SERVER_URL", "mongodb://myAdminUsername:Islam786ian@localhost:27017/");

$cookie_name = "login_string";
$cookie_value = "5fe69c95ed70a9869d9f9af7d8400a6673bb9ce9";
$cookie_time = 20 * 1000; //10 minutes

?>