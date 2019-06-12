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

<?php Session::init(); ?>
<body>
<nav class = "nav1">
    <a class = "a1" href = "index"> Poem translater </a>
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
    <a href = "poems/authorsPoem/1" > POEMS! </a>
    <a href = "index.php" > COMMUNITY </a>
    <a href = "aboutus"> ABOUT US! </a>
    <a href = "scholarly"> SCHOLARLY </a>
</nav>

<h2 class = "h2">Active users</h2>
<div class="table-active-users">
    <span></span>
    <span><strong>Username</strong></span>
    <span><strong>Translations</strong></span>
    <?php
    $cnt=1;
    foreach($this->userData as $var){
        echo '<span>'.$cnt.' </span>';
        echo '<span>'.$var['nume'].'</span>';
        echo '<span>'.$var['count(s.id_user)'].'</span>';
        $cnt++;
    }
    ?>
</div>
<h3 class="h3">Most comment</h3>
<div class="table-most-comment">
    <span></span>
    <span><strong>Title</strong></span>
    <span><strong>Author</strong></span>
    <span><strong>#Comments</strong></span>
    <?php
     $cnt=1;
     foreach ($this->commentData as $var){
         echo '<span>' .$cnt. '</span>';
         echo '<span>'.$var['titlu'].'</span>';
         echo '<span>'.$var['nume'].'</span>';
         echo '<span>'.$var['comments'].'</span>';
         $cnt++;
     }
    ?>
</div>
</body>
</html>