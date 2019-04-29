<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <title>Sign In</title>
    <link rel="stylesheet" href="/PoTr/public/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<nav class = "nav1">
    <a class = "a1" href = "/PoTr/app/views/home/index.php"> Poem translater </a>
    <a href = "index.php" class = "sign-in-up-position"> SIGN IN </a>
    <a href = "/PoTr/app/views/sign_up/index.php" class = "sign-in-up-position"> SIGN UP </a>
</nav>

<nav class = "menu-bar">
    <a href = "/PoTr/app/views/poems/index.php"> POEMS! </a>
    <a href = "/PoTr/app/views/community/index.php"> COMMUNITY </a>
    <a href = "/PoTr/app/views/about/index.php"> ABOUT US! </a>
</nav>
<div class="table">
    <h1>Sign In</h1>
    <form>
        <p> Username:</p>
        <input type="text" name="username" placeholder="Enter Username" class ="block-sign-in">
        <p> Password: </p>
        <input type="password" name="password" placeholder="Enter Password"
               class ="block-sign-in">
        <input type="submit" value="Sign In"
               class = "button-sign-in"/><br>
        <a href="/PoTr/app/views/reset_pass/index.php"> I forgot my password </a><br>
        <a href="/PoTr/app/views/sign_up/index.php"> I don't have an account </a><br>
    </form>
</div>
</body>

</html>
