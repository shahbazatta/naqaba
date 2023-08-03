<?php 
require_once("config/config.php");
require_once("verify/verify.php");
require_once("verify/forgetuser.php");
require_once("lang/language.php");
?>
<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->

<?php if ($lang_type == 'ar'){ ?>
<html lang="ar" dir="rtl" data-textdirection="rtl">
<?php } else { ?>
<html lang="en" dir="ltr" data-textdirection="ltr">
<?php } ?>

<head>
<!-- Basic -->
<meta charset="utf-8">
<title><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'naqabahTrackerSystem'); ?></title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic&display=swap" rel="stylesheet">

<!-- jQuery -->
<script src="assets/js/jquery-1.11.2.min.js"></script>

<!-- Styling -->
<link rel="stylesheet" href="assets/css/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="assets/css/style.css" type="text/css" media="screen" />

<?php if ($lang_type == 'ar'){ ?>
<link rel="stylesheet" href="assets/css/style_arabic.css" type="text/css" media="screen" />
<?php } ?>

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
      <div class="message"><?php echo $message; ?></div>
      <div class="error"><?php echo $error; ?></div>

      <?php if(isset($_POST["submitNewPassword"])){?>

      <?php  }elseif(isset($_POST['submitEmailForget'])){?>

      <?php  }elseif(isset($_GET['passcode']) && isset($_GET['email'])){?>

      <div class="formRow">
        <img src="assets/images/icons/lock.svg">
        <input type="password" id="password" name="password" placeholder="<?php echo $localizedStrings->String($localizedStrings::LC_EN, 'password'); ?>" class="text" tabindex="3" maxlength="16">
      </div>
      <div class="formRow">
        <img src="assets/images/icons/lock.svg">
        <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" class="text" tabindex="4" maxlength="16">
      </div>

      <input type="hidden" value="<?php echo $_GET['passcode']; ?>" name="passcode">
      <input type="hidden" value="<?php echo $_GET['email']; ?>" name="emailId">

      <div class="buttonRow">
        <button type="submit" class="signInBtn" name="submitNewPassword">Save New Password</button>
      </div>
      <?php } else{ ?> 
      <div class="formRow">
        <img src="assets/images/icons/message.svg">
        <input type="text" id="emailId" name="emailId" placeholder="<?php echo $localizedStrings->String($localizedStrings::LC_EN, 'email'); ?>" class="text" tabindex="1" maxlength="35">
      </div>
      <div class="buttonRow">
        <button type="submit" class="signInBtn" name="submitEmailForget"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'SendEmail'); ?></button>
      </div>
      <?php } ?>
      <div class="textRow createNew">
        Go back for <a href="login.php">Sign In</a>
      </div>
    </form>
  </div>



</body>
</html>