<?php

session_start();

if (!isset($_SESSION["user"])){ # patikrinimas ar prisijungęs
    header("location: admin-login.php");
}

else if (isset($_GET["keisti_info"])){
    include_once "topnews.php"; # keičiama TOP naujienų dalis.
}
else if (isset($_GET["prideti-meistra"])){
    include_once "prideti-meistra.php"; # pridedam meistra.
}
else if (isset($_GET["valdymas-irasu"])){
    include_once "valdymas.php"; # valdoma naujienų dalis.
}
else if (isset($_GET["prideti-admin"])){
    include_once "prideti-admin.php"; # kuriame admin paskyras
}
else if (isset($_GET["atsijungti"])){
    # atsijungimas iš administratorių pulto

    session_destroy();  
    
    header("location: admin-login.php");  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="./css/admin.css">
    <link rel = "icon" href = "./assets/joystick-logo.png" type = "image/x-icon">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <title>SERVISAI.LT - Admin puslapis</title>
</head>
<body>

    <div class="sidebar">
        <?php

            echo ' <div class="useris"> <i class="far fa-user"></i>&nbsp;&nbsp;
             '. $_SESSION['user'] .'
            </div> <br>';
            
            echo '<a href="?atsijungti" class="button2">Atsijungti nuo paskyros</a>';
            echo '<hr class="bruksnys">'
        ?>
        <a href="index.php" class="button1"><i class="fa fa-fw fa-home"></i> &nbsp; Pagrindinis</a>
        <a href="?prideti-meistra" class="button1"><i class="fas fa-plus"></i> &nbsp; Pridėti meistra</a>
        <a href="?valdymas-irasu" class="button1"><i class="far fa-edit"></i> &nbsp; Įrašų valdymas</a>
        <a href="?keisti_info" class="button1"><i class="fas fa-exchange-alt"></i> &nbsp; Keisti svarbią info</a>
        <a href="?prideti-admin" class="button1"><i class="fas fa-user-plus"></i> &nbsp; Sukurti (A) paskyrą</a>
        <hr>
    </div>

</body>
</html>