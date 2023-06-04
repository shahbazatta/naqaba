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

<style>
.Rectangle-1 {
  width: auto;
  height: auto;
  flex-grow: 0;
  padding: 188px 443px 187px;
  background-color: rgba(240, 240, 240, 0.48);
  background-image: url(assets/images/map_bg.jpg);

}

.Frame-300 {
  width: 554px;
  height: 649px;
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: flex-start;
  gap: 10px;
  padding: 48px;
  border-radius: 16px;
  box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.25);
  background-color: #fff;
}

.Frame-301 {
  width: 458px;
  height: 553px;
  flex-grow: 0;
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
  align-items: center;
  gap: 48px;
  padding: 0;
}

.Mapsicle-Map {
  width: 1440px;
  height: 1024px;
  flex-grow: 0;
  padding: 188px 443px 187px;
  -webkit-filter: blur(16px);
  filter: blur(16px);
}

.-Signin {
  width: 1440px;
  height: 1024px;
  padding: 188px 443px 187px;
  background-color: #000;
}

img.image-27 {
  width: 214px;
  height: 113px;
  flex-grow: 0;
  object-fit: contain;
}

.Welcome-to-Naqabah-Tracking-System {
  height: 32px;
  align-self: stretch;
  flex-grow: 0;
  font-family: AvenirNext;
  font-size: 24px;
  font-weight: bold;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.33;
  letter-spacing: normal;
  text-align: center;
  color: #000;
}

.Controls-Text-Field-Floating-Label {
  height: 30px;
  align-self: stretch;
  flex-grow: 0;
  padding: 12px 16px 12px 12px;
  border-radius: 16px;
  box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.25);
  background-color: #fff;
}
img.Left-Actionable {
  width: 24px;
  height: 24px;
  margin: 0 12px 0 0;
  object-fit: contain;
}
._Partials-Text-Field-Floating-Label {
  width: 394px;
  height: 16px;
  margin: 4px 0 4px 12px;
}

.Text {
  width: 394px;
  height: 16px;
  margin: 4px 0 4px 12px;
  font-family: AvenirNext;
  font-size: 16px;
  font-weight: 500;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  text-align: left;
  color: #000;
}

.Forgot-password {
  height: 24px;
  align-self: stretch;
  flex-grow: 0;
  font-family: AvenirNext;
  font-size: 16px;
  font-weight: 500;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  text-align: left;
  color: #000;
}

.Controls {
  height: 56px;
  align-self: stretch;
  flex-grow: 0;
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  gap: 10px;
  padding: 16px 32px;
  border-radius: 8px;
  background-color: #000;
}

.Controls .Text {
  height: 24px;
  flex-grow: 1;
  font-family: AvenirNext;
  margin: 0 0 0;
  font-size: 16px;
  font-weight: 600;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  text-align: center;
  color: #fff;
}

.Text {
  width: 458px;
  height: 24px;
  flex-grow: 0;
  margin: 0 0 0;
  font-family: AvenirNext;
  font-size: 16px;
  font-weight: 500;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.5;
  letter-spacing: normal;
  text-align: center;
  color: #000;
}

.Text .text-style-1 {
  font-weight: bold;
}
</style>
</head>
<body>

<div class="Rectangle-1">


<div class="Frame-300">

<div class="Frame-301">

    <!-- png -->

<img src="assets/images/image 27.webp"
     srcset="img/image-27@2x.png 2x,
             img/image-27@3x.png 3x"
     class="image-27">

     <span class="Welcome-to-Naqabah-Tracking-System">
      <?php echo $localizedStrings->String($localizedStrings::LC_EN, 'naqabahTrackerSystem'); ?>
    </span>

<div class="Controls-Text-Field-Floating-Label">

     <div class="_Partials-Text-Field-Floating-Label">
        <img src="assets/images/Left Actionable.png"
            srcset="img/left-actionable@2x.webp 2x,
                    img/left-actionable@3x.webp 3x"
            class="Left-Actionable">
            <span class="Text">
              <?php echo $localizedStrings->String($localizedStrings::LC_EN, 'email_username'); ?>
            </span>
            <input type="text" placeholder="Usename"  id="userId" name="userId" size="15" class="text" tabindex="1" maxlength="25"/>	
     </div>
</div>

<div class="Controls-Text-Field-Floating-Label">

     <div class="_Partials-Text-Field-Floating-Label">
        <img src="assets/images/Left Actionable.png"
            srcset="img/left-actionable@2x.webp 2x,
                    img/left-actionable@3x.webp 3x"
            class="Left-Actionable">
            <span class="Text">
              <?php echo $localizedStrings->String($localizedStrings::LC_EN, 'password'); ?>
            </span>
            <input type="password" placeholder="Password" id="userPassword" name="userPassword" size="15" tabindex="2" maxlength="25" class="text" />
     </div>
</div>

<span class="Forgot-password">
  <?php echo $localizedStrings->String($localizedStrings::LC_EN, 'forgotPassword'); ?>
</span>

<div class="Controls">
  <span class="Text">
    <?php echo $localizedStrings->String($localizedStrings::LC_EN, 'signIn'); ?> 
  </span>
</div>

<span class="Text">
  <?php echo $localizedStrings->String($localizedStrings::LC_EN, 'dontHaveAccount'); ?>
  <span class="text-style-1"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'createNew'); ?></span>
</span>

</div>


</div>

</div>




</body>
</html>