<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Poems</title>
    <link rel="stylesheet" href="/assets/style.css">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<?php Session::init() ?>

<body>
<nav class="nav1">
    <a class="a1" href="../../../index"> Poem translater </a>
    <?php
    if (Session::get('loggedIn') == true): ?>
        <a href="<?php echo URL; ?>../../dashboard/logout" class="sign-in-up-position"> SIGN OUT </a>
        <a href="../../profile" class = "sign-in-up-position"> <?php echo Session::get('username') ?> </a>
        <img src="../../<?php echo Session::get('photo') ?>" alt="" id="profile-picture"/>
    <?php else: ?>
        <a href="../../signin" class="sign-in-up-position"> SIGN IN </a>
        <a href="../../signup" class="sign-in-up-position"> SIGN UP </a>
    <?php endif; ?>
</nav>

<nav class="menu-bar">
    <a href="../../poems/authorsPoem/1"> POEMS! </a>
    <a href="../../community"> COMMUNITY </a>
    <a href="../../aboutus"> ABOUT US! </a>
    <a href = "../../scholarly"> SCHOLARLY </a>
</nav>

<div class="table-summary">
    <?php
    foreach ($this->authorData as $var) {
        echo "<a href='../../poems/authorsPoem/" . $var['id'] . "'> " . $var['nume'] . " </a>";
    }
    ?>
</div>

<div class="table-poems">
    <p>#</p>
    <?php
    foreach ($this->poemData as  $var) {
        echo '<p>' . $var['nume'] . '</p>';
        break;
    }
    ?>
    <?php
    $cnt=1;
    foreach ($this->poemData as  $val){
        echo '<span>'.$cnt.' </span>';
        echo '<a href="../../poem/poezie/'.$var['id_autor'].'/'.$val['titlu'].'/english">'. $val['titlu'] .'</a>';
        $cnt++;
    }
    ?>

</div>
</body>
</html>