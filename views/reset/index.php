<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <title>Community</title>
    <link rel="stylesheet" href="/assets/style.css">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<?php Session::init() ?>

<body>
<nav class = "nav1">
    <a class = "a1" href = "index"> Poem translater </a>
    <?php
    if(Session::get('loggedIn')==true):  ?>
        <a href="<?php echo URL ;?>dashboard/logout" class = "sign-in-up-position"> SIGN OUT </a>
        <a href = "profile" class = "sign-in-up-position"> <?php echo Session::get('username') ?> </a>
        <img src = "<?php echo Session::get('photo') ?>" alt ="" id = "profile-picture"/>
    <?php else: ?>
        <a href = "signin" class = "sign-in-up-position"> SIGN IN </a>
        <a href = "signup" class = "sign-in-up-position"> SIGN UP </a>
    <?php endif; ?>
</nav>

<nav class = "menu-bar">
    <a href = "poems/authorsPoem/1"> POEMS! </a>
    <a href = "community"> COMMUNITY </a>
    <a href = "aboutus"> ABOUT US! </a>
</nav>
<div class="table">
    <form  action="reset/changePassword" method="post">
        <h1>Reset your password</h1>
        <p>E-mail:</p>
        <input type="text" name="email" placeholder="Enter E-mail" class = "block-reset-pass">
        <p> Password: </p>
        <input type="password"  name="parola" placeholder="Enter Password" class = "block-reset-pass">
        <p> Repeat your Password: </p>
        <input type="password"  name="pass" placeholder="Enter Password"   class = "block-reset-pass">
        <input type="submit" name="sendmail" value="Reset password"  class = "button-reset-pass"/><br>
    </form>
</div>


</body>
</html>