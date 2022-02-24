<?php

include_once "database.php";

if(isset($_POST["admin"])){
    $slapyvardis = $_POST["admin"];
    $data = date("Y-m-d");
    $pass = $_POST["passw"];
    
    $pass = password_hash($_POST["passw"], PASSWORD_BCRYPT, array("cost" => 10));

    
    if ($slapyvardis && $pass)
    {
        $sql = "INSERT INTO `admin` (admin_name, admin_password, admin_created) VALUES (?, ?, ?)";
        $stmt= $dbh->prepare($sql)->execute([$slapyvardis, $pass, $data]);

        header('Location: admin-control.php');
        die();
    }
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "icon" href = "./assets/joystick-logo.png" type = "image/x-icon">
    <link rel="stylesheet" href="css/admin.css">

    <title>Sukurti tinklapio administratorių</title>
</head>

<div class="prideti">
    <div class="row">
        <div class="col-md-9 ml-md-auto">
            <form method="POST" action="pridetiadmin.php">
            <div class="form-group">
                <input type="text" class="form-control" name="admin" placeholder="Administratoriaus slapyvardis" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="passw" placeholder="Slaptažodis" required>
            </div>
                <button type="submit" class="btn btn-primary">Sukurti administratoriaus paskyrą</button>
            </form>
        </div>
    </div>
</div>