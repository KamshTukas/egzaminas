<?php

session_start();

include_once "database.php";

if(isset($_POST['login'])){
    $user = $_POST['vardas'];
    $pass = $_POST['slaptazodis'];
    
    $sql = "SELECT `admin_name`, `admin_password` FROM `admin` WHERE `admin_name`=? ";
    $query = $dbh->prepare($sql);
    $query->execute(array($user));
    $row = $query->fetch(PDO::FETCH_ASSOC);
    
    $hash = $row['admin_password'];

    if($query->rowCount() > 0)
    {
        if(password_verify($pass, $hash))
        {
            $_SESSION['user'] = $user;
            header("location: admin-control.php");
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login-reg.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel = "icon" href = "./assets/joystick-logo.png" type = "image/x-icon">

    <title>Žaidimų naujienų puslapis</title>
</head>
<body>
    
    <nav class="navbar">    
        <div class="navbar__container">
            <div class="navbar__toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <ul class="navbar__menu">
                <li class="navbar__item">
                    <a href="index.php" class="navbar__links">Pagrindinis</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="login-page">
        <div class="form">
            <form class="login-form" action="admin-login.php" method="POST">
                <input type="text" name="vardas" placeholder="Slapyvardis"/>
                <input type="password" name="slaptazodis" placeholder="Slaptažodis"/>
                <input type="submit" name="login" value="Prisijungti">
            </form>
        </div>
    </div>    

    <script src="js/navscript.js"></script>
</body>
</html>