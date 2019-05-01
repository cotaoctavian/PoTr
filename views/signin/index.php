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

<body>
<nav class = "nav1">
    <a class = "a1" href = "index"> Poem translater </a>
    <a href = "signin" class = "sign-in-up-position"> SIGN IN </a>
    <a href = "signup" class = "sign-in-up-position"> SIGN UP </a>
</nav>

<nav class = "menu-bar">
    <a href = "poems"> POEMS! </a>
    <a href = "community"> COMMUNITY </a>
    <a href = "aboutus"> ABOUT US! </a>
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
        <a href="reset"> I forgot my password </a><br>
        <a href="signup"> I don't have an account </a><br>
    </form>
</div>
</body>

</html>
