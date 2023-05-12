<?php 
require_once("lang/language.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  $userId = $_POST['userId'];
  $userPassword = $_POST['userPassword'];
  
  if (empty($userId) || empty($userPassword)) {
    // echo "UserName or Password is empty";
  } elseif($userId == "admin" && $userPassword == "admin"){
    
    header('Location: index.php');
  }

}

?>
<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->
<html>

<head>

<!-- Basic -->
<meta charset="utf-8">
<title><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'naqabahTrackerSystem'); ?></title>

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="assets/css/style.css" type="text/css" media="screen" /><!-- jQuery -->
<script src="assets/js/jquery-1.11.2.min.js"></script>
<script type="text/javascript">
/* <![CDATA[ */
$(document).ready(function(){
	
	$('.footer').hide();
	
	function setCookie(cname, cvalue, exdays) {
	    var d = new Date();
	    d.setTime(d.getTime() + (exdays*24*60*60*1000));
	    var expires = "expires="+d.toUTCString();
	    document.cookie = cname + "=" + cvalue + "; " + expires;
	}
	
	function getCookie(cname) {
	    var name = cname + "=";
	    var ca = document.cookie.split(';');
	    for(var i=0; i<ca.length; i++) {
	        var c = ca[i];
	        while (c.charAt(0)==' ') c = c.substring(1);
	        if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
	    }
	    return "";
	}
	
	function checkCookie() {
	    var user = getCookie("username");
	    var pass = getCookie("password");
	    if (user != "") {
	        //alert("Welcome again " + user + " & Your password is " + pass);
	        $('#userId').val(user);
	        $('#userPassword').val(pass);
	    }
	}
	
	checkCookie();
	
   //submission scripts
  $('.loginFormMain').submit( function(){

	  var name = $.trim($('#userId').val());
	  var pass = $.trim($('#userPassword').val());
		
	  if (name === "") {
			$('#userId').addClass('red');
		} else {$('#userId').removeClass('red');}	
	  if (pass === "") {
			$('#userPassword').addClass('red');
		} else {$('#userPassword').removeClass('red');}	
		
		if ((name === "") || (pass === "")){
			return false;
		} 
		
		if ((name != "") || (pass != "")){

			setCookie("username", name, 365);
			setCookie("password", pass, 365);
			
		} 
		
  });
	
});
/* ]]> */
 function LetMeLogin(){
		var flag = false;		
		var uName;
		var uPwd;
		uName = document.getElementById("userId");
		uPwd = document.getElementById("userPassword");
		if (uName.value==''){
			alert('Enter your User Name to proceed.');
			uName.focus();
		}else{
			if (uPwd.value==''){
				alert('Enter your Password to proceed.');
				uPwd.focus();
			}else
				flag = true;
		}
		if(flag){
			var form=document.getElementById("loginForm");
			form.submit();	
		}				
	}

function sendCredentials()
{
	var mailId=document.getElementById("fuserId").value;
	if(mailId=="")
		{
		alert("Email Id field is empty");
		return;
		}
var params={
		"mailId":mailId
	};
		jQuery.ajax({
			type : 'POST',
			url : 'forgetPassword.htm',
			data : params,
			success : function(data) {
				document.getElementById("fuserId").value=""; //reset forgrt password input text field					
				alert(data);												
			}
		});
}
 
 
 $(document).ready(function() {
	    $('#forgotBtn').click(function() {
            $('.formLogin').hide();
            $('.formForgotPassword').show();
	    });
	    $('#forgotBackBtn').click(function() {
            $('.formForgotPassword').hide();
            $('.formLogin').show();
	    });
	    $('#registerBtn').click(function() {
            $('.formLogin').hide();
            $('.formNewUser').show();
	    });
	    $('#newUserBackBtn').click(function() {
            $('.formNewUser').hide();
            $('.formLogin').show();
	    });
	});
</script> 
</head>
<body>

<div  id="loginBg">
<!--==========Start Loading Box==========-->
<div class="loginBoxMain">
    <!-- Logo -->
    <a href="javascript:void(0)" title="Logo" id="loginLogoTCM" class="toolTip"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'logo'); ?></a>
    <!-- Logo -->
    <div class="formLogin">
    	<!-- <form method="post" action="login.htm" class="loginFormMain" commandName="userBeanCmdObj">  -->
    		<form method="post" id="loginForm" commandName="userBeanCmdObj" action="login.php" class="loginFormMain"> 
    		<div class="username">
			   <!--  <input type="text" class="text" name="username" id="username" placeholder="Usename"/> -->
			    <input type="text" placeholder="Usename"  id="userId" name="userId" size="15" class="text" tabindex="1" maxlength="25"/>	
			</div>
			<div class="password">
			   <!--  <input type="password" class="text" name="password" id="password" placeholder="Password"/> -->
			    <input type="password" placeholder="Password" id="userPassword" name="userPassword" size="15" tabindex="2" maxlength="25" class="text" />
			</div>
			<div class="remember">
			    <input type="checkbox" class="checkBox" checked="checked" name="remember" id="remember" /> <span><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'rememberPassword'); ?> | <a href="#" id="registerBtn"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'register'); ?></a></span>
				<div class="clear"></div>
			</div>
			<div><input type="submit" name="login" class="loginBtn" value="Login" onclick="LetMeLogin()"><span class="forgot"> <?php echo $localizedStrings->String($localizedStrings::LC_EN, 'or'); ?> <a href="#" id="forgotBtn"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'forgotPassword'); ?></a></span></div>
			</form>
    </div>
     <div class="formForgotPassword">
    	 <form method="post" action="" class="loginFormMain" > 
    		
    		<div class="username">
			    <input id="fuserId" type="text" size="15" class="text" placeholder="Email Address" tabindex="1" maxlength="25"/>	
			</div>		
			<div><input type="button" name="login" class="loginBtn" value="Send Credentials" onclick="sendCredentials()"><span class="forgot"> <?php echo $localizedStrings->String($localizedStrings::LC_EN, 'or'); ?> <a href="#" id="forgotBackBtn"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'back'); ?></a></span></div>
		 </form> 
    	
    </div>
    <div class="formNewUser">
    	<form method="post" action="registerNewUser.htm" class="loginFormMain"  commandName="userBeanCmdObj"  >
    		
    		<div class="username">
			  <!--   <input id="nusername" type="text" size="15" class="text" placeholder=<spring:message code="label.username"></spring:message> tabindex="1" maxlength="25"/> -->	
			 <input id="userId" placeholder="Username" size="15" class="text" tabindex="1" maxlength="25"/>	
			</div>
    		
    		<div class="email">
			 	<!-- <input id="nemail" size="15" class="text" tabindex="2" maxlength="25"/> 	 -->
			    <input id="nusername" placeholder="Email" type="text" size="15" class="text" placeholder="" tabindex="1" maxlength="25"/> 
			</div>
    		
    		<div class="repassword">	
			    <input type="password" placeholder="Password" id="npswd" class="text" tabindex="1" maxlength="25"/> 
			</div>
    		<div class="repassword">
			      <input type="password" placeholder="Confirm Password" id="npswd2"  class="text" tabindex="1" maxlength="25"/>	
			</div>		
			<div><input type="submit" name="login" class="loginBtn" value="Register User"><span class="forgot"> <?php echo $localizedStrings->String($localizedStrings::LC_EN, 'or'); ?> <a href="#" id="newUserBackBtn"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'back'); ?></a></span></div>
		</form>
    	
    </div>
    <!-- Bottom Bar -->
    <div class="bottomBar1"></div>
</div>
<!--==========End Loading Box==========-->

</div>

</body>
</html>