<?php 
require_once("verify/verify.php");
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
      <div class="message"><?php echo $error; ?></div>
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
        <button type="submit" class="signInBtn" name="submitLogin"><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'signIn'); ?></button>
      </div>
      <div class="textRow createNew">
        <?php echo $localizedStrings->String($localizedStrings::LC_EN, 'dontHaveAccount'); ?> <a href=""><?php echo $localizedStrings->String($localizedStrings::LC_EN, 'createNew'); ?></a>
      </div>
    </form>
  </div>



</body>
</html>