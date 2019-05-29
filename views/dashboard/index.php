<!DOCTYPE html>
<html lang = "ro">
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
        <a href="<?php echo URL ;?>dashboard/logout" class = "sign-in-up-position"> SIGN OUT </a>
        <a href = "profile" class = "sign-in-up-position"> <?php echo Session::get('username') ?> </a>
        <img src = "<?php echo Session::get('photo') ?>" alt ="" id = "profile-picture" />
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
        <?php
        $doc=new DomDocument;
        $doc->load('rss.xml');
        $title = $doc->getElementsByTagName('titlu');
        $utilizator=$doc->getElementsByTagName('utilizator');
        $auth = $doc->getElementsByTagName('nume');
        $dat = $doc->getElementsByTagName('data');
        $seen = $doc->getElementsByTagName('vizualizari');
        $cnt=1;
        $k=0;
        for($k=0;$k<5;$k++) {
            echo ' <a id="line-table">';
            echo '<span><strong>' . $cnt . '</strong> </span>';
            echo '<div id="two-lines">';
            echo '<span><strong>' . $title->item($k)->nodeValue . '</strong> </span>';
            echo '<span>' . $auth->item($k)->nodeValue . '</span>';
            echo ' </div>';
            echo '<span>' . $utilizator->item($k)->nodeValue . '</span>';
            echo '<span> <img src="/assets/images/time.png" class="main-img" alt="">' . $dat->item($k)->nodeValue . ' </span>';
            echo '<span><img src="/assets/images/seen.png" class="main-img" alt="">' . $seen->item($k)->nodeValue . ' </span>';
            $cnt++;
            echo '</a>';
        }
        ?>
    </div>
</div>
</body>
</html>

