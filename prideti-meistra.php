<?php

include_once "database.php";

if(isset($_POST["vardaspavarde"])){
    $vardaspavarde = $_POST["vardaspavarde"];
    $informacija = $_POST["informacija"];
    $nuotrauka = $_POST["nuotrauka"];
    $patinka = $_POST["patinka"];
    $nepatinka = "";
    $sukurta = "";
    $atnaujina = "";
    $statusas = $_POST["statusas"];

    if ($vardaspavarde && $informacija){
        $sql = "INSERT INTO posts (`title`, `content`, `image`, `like_num`, `dislike_num`, `created`, `modified`, `status`) VALUES (?,?,?,?,?,?,?,?)";
        $stmt= $dbh->prepare($sql)->execute([$vardaspavarde, $informacija, $nuotrauka, $patinka, $nepatinka, $sukurta, $atnaujina, $statusas]);

        header('Location: index.php');
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
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/style.css">

    <title>Pridėti meistra</title>
</head>

<div class="prideti">
<div class="row">
  <div class="col-md-9 ml-md-auto">
    <form method="POST" action="prideti-meistra.php">
    <div class="form-group">
        <input type="text" class="form-control" name="vardaspavarde" placeholder="Meistro Vardas Pavarde" required>
    </div>
    <div class="form-group">
        <textarea style="border-radius: 4px;"name="informacija" rows="6" cols="105" placeholder="Meistro informacija (Specilizacija, serviso pavadinimas, miestas)"></textarea>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="nuotrauka" placeholder="Nuotrauka">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="patinka" placeholder=" Patiktukai. Irasykite 0">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="statusas" placeholder="Ivertinimas aktyvus = irasykite - 1. Neaktyvus - 0">
    </div>
    <button type="submit" class="btn btn-primary">Pridėti meistra</button>
    </form>
  </div>
</div>
</div>