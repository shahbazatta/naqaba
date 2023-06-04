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

<html lang="en" dir="ltr" data-textdirection="ltr">

<head>
<!-- Basic -->
<meta charset="utf-8">
<title><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'naqabahTrackerSystem'); ?></title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

<!-- jQuery -->
<script src="assets/js/jquery-1.11.2.min.js"></script>

<!-- Styling -->
<link rel="stylesheet" href="assets/css/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="assets/css/style.css" type="text/css" media="screen" />

<!--[if lt IE 9]>
  <script src="assets/js/html5.js"></script>
  <link rel="stylesheet" href="assets/css/ie.css">
<![endif]-->

</head>
<body class="login">

  <div class="loginBox">
    <div class="logo">
      <img src="assets/images/naqabah_tracker_system.png">
    </div>
    <h1>Welcome to Naqabah Tracking System</h1>
    <form method="post" class="loginForm">
      <div class="formRow">
        <img src="assets/images/icons/message.svg">
        <input type="text" id="userId" name="userId" placeholder="<?php echo $localizedStrings->String($localizedStrings::LC_EN, 'email_username'); ?>" class="text" tabindex="1" maxlength="35">
      </div>
      <div class="formRow">
        <img src="assets/images/icons/lock.svg">
        <input type="password" id="password" name="password" placeholder="<?php echo $localizedStrings->String($localizedStrings::LC_EN, 'password'); ?>" class="text" tabindex="2" maxlength="16">
      </div>
      <div class="textRow">
        <a href=""><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'forgotPassword'); ?></a>
      </div>
      <div class="buttonRow">
        <input type="submit" class="signInBtn" value="<?php echo $localizedStrings->String($localizedStrings::LC_EN, 'signIn'); ?>">
      </div>
      <div class="textRow createNew">
        <?php echo $localizedStrings->String($localizedStrings::LC_EN, 'dontHaveAccount'); ?> <a href=""><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'createNew'); ?></a>
      </div>
    </form>
  </div>


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
 
</script> 

</body>
</html>