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
    <a href = "scholarly"> SCHOLARLY </a>
</nav>

<div id = "profile-container">

    <h3> Setează-ți poza de profil! </h3>
    <form action="profile/upload" method="POST" enctype="multipart/form-data">
        <input type="file" name="image" />
        <input type="submit"/>
    </form>

    <h3> Resetare parolă: </h3>
    <div class="table-profile">
        <form action="profile/changePass" method="post">
            <p> Password: </p>
            <input type="password" name="parola" placeholder="Enter Password" class = "fields">
            <p> Repetă parola: </p>
            <input type="password"  name="pass" placeholder="Enter Password"  class = "fields">
            <input type="submit" value="Reset password"  class = "button-profile-pass"/><br>
        </form>
    </div>

    <h3> Adaugă o descriere! </h3>
    <form action = "profile/description" method="POST" class = "comment-main">
        <h1 class = "comment-title"> <img src = "/assets/images/comm-icon.png" class = "comment-profile-icon" alt = ""> Bio! </h1>
        <input type="text" name="descriere" class ="block-bio">
        <input type = "submit" value = 'Finalizează' class = "comm-button"/>
        <?php if(Session::get('bio')): ?>
            <div class = "bio-section">
                <p> <?php echo Session::get('bio'); ?> </p>
            </div>
        <?php else: ?>
            <div class = "bio-section">
                <br />
            </div>
        <?php endif; ?>
    </form>



</div>


</body>
</html>