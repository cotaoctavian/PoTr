<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <title>Sign In</title>
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
    <a href = "community" > COMMUNITY </a>
    <a href = "aboutus"> ABOUT US! </a>
    <a href = "scholarly"> SCHOLARLY </a>
</nav>

<div id = "about-us-container">
    <h1> <img src = "/assets/images/mission.png" id = "mission-img"> Misiunea noastră! </h1>
    <p> A asigura cele mai bune traduceri pentru iubitorii de literatură! </p>
    <h3> <img src = "/assets/images/about-us.png" id = "about-img"> Despre </h3>
    <p> Poem Translater este o platforma care se ocupa cu traducerea poemelor in diferite limbi. <br> Fiecare poem are posibilitatea de a detine una sau mai multe traduceri provenite de la mai multi utilizatori care depun timp in aducerea constanta de noi traduceri.
        Traducerile primesc rating pentru calitatea versurilor traduse, iar cele mai bune traduceri vor fi afisate in prezentarea unui poem. In privinta celorlalte traduceri va exista posibilitatea de a le vizualiza in subsolul fiecarei strofe alaturi de comentariile si adnotarile aferente. </p>

    <h3><img src = "/assets/images/contact.png" id = "about-img"> Contact! </h3>
    <div id = "contact">
        <p> <img src = "/assets/images/mail.png" id = "mail-img"> octavian_cota@yahoo.com </p>

        <p> <img src = "/assets/images/phone.png" id = "phone-img"> 0753485821</p>

        <p> <img src = "/assets/images/mail.png" id = "mail-img"> biancabacaoanu@yahoo.com</p>

        <p> <img src = "/assets/images/phone.png" id = "phone-img"> 0758104472 </p>
    </div>

    <h6> Copyright &copy; 2019 Coța Ștefan-Octavian, Băcăoanu Adriana-Bianca.</h6>
</div>



</body>

</html>