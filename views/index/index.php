<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Poems</title>
    <link rel="stylesheet" href="/assets/style.css">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<?php Session::init(); ?>

<body id="background">
<nav class = "nav1">
    <a class = "a1" href = "index" > Poem translater </a>
    <?php
    if(Session::get('loggedIn')==true):  ?>
        <?php ?>
        <a href="<?php echo URL ;?>dashboard/logout" class = "sign-in-up-position"> SIGN OUT
        <a href = "profile" class = "sign-in-up-position"> <?php echo Session::get('username') ?> </a>
        <img src = "<?php echo Session::get('photo') ?>" alt ="" id = "profile-picture"/>
    <?php else: ?>
        <a href = "signin" class = "sign-in-up-position"> SIGN IN </a>
        <a href = "signup" class = "sign-in-up-position"> SIGN UP </a>
    <?php endif; ?>
</nav>


<nav class = "menu-bar">
    <a href = "poems"> POEMS! </a>
    <a href = "community"> COMMUNITY </a>
    <a href = "aboutus"> ABOUT US! </a>
</nav>

<header id="banner"> Poem Translater</header>
<h5 id="h5"> Locul în care poetul vorbește în toate limbile </h5>
<div id="logo-poetry">
    <img src="/assets/images/poetry.png" class="poetry-img">
</div>
<hr class = "hr2">
<div id = "main-table">

    <div id="antet-table">
        <p><strong> #</strong></p>
        <p><strong>Title</strong> </p>
        <p>   </p>
    </div>

    <div id = "rss-table">
        <a id="line-table">
            <span><strong> 1.</strong> </span>
            <div id="two-lines">
                <span><strong>Floarea albastra</strong> </span>
                <span> Mihai Eminescu</span>
            </div>
            <span> <img src="/assets/images/time.png" class="main-img"> 23 minutes ago </span>
            <span><img src="/assets/images/seen.png" class="main-img"> 10k </span>
        </a>
        <a id="line-table">
            <span><strong> 2.</strong> </span>
            <div id=two-lines>
                <span><strong> Plumb</strong></span>
                <span>George Bacovia </span>
            </div>
            <span> <img src="/assets/images/time.png" class="main-img"> 2 hours ago </span>
            <span><img src="/assets/images/seen.png" class="main-img"> 100k </span>
        </a>
        <a id="line-table">
            <span> <strong>3.</strong></span>
            <div id="two-lines">
                <span><strong>Testament</strong></span>
                <span>Tudor Arghezi</span>
            </div>
            <span> <img src="/assets/images/time.png" class="main-img"> 17 hours ago </span>
            <span><img src="/assets/images/seen.png" class="main-img"> 490k </span>
        </a>
        <a id="line-table">
            <span> <strong>4.</strong> </span>
            <div id="two-lines">
                <span><strong>Flori de mucigai</strong></span>
                <span> Tudor Arghezi </span>
            </div>
            <span> <img src="/assets/images/time.png" class="main-img"> 2 days ago </span>
            <span><img src="/assets/images/seen.png" class="main-img"> 789k </span>
        </a>

    </div>

</div>
</body>
</html>

