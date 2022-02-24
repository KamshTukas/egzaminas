<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servisai.LT - Meistru valdymas</title>

    <link rel="stylesheet" href="https://pro.font5awesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="css/style.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>
<body>
    
</body>
</html>

<?php

$vardaspavarde = "";
$informacija = "";
$nuotrauka = "";
$patinka = "";
$nepatinka = "";
$sukurta = "";
$atnaujina = "";
$statusas = "";
$id = "";

$laikinas = 0;

include_once "database.php";

if(isset($_POST["istrinti"])){
    $laikinas = $_POST['istrinti'];

    $sth = $dbh->prepare('DELETE FROM posts WHERE id = ?;');
    $sth->execute(array($laikinas));
    $laikinas=null;

    header('Location: admin-control.php?valdymas-irasu');
    die();
}
if(isset($_POST["pakeisti"])){
    $vardaspavarde = $_POST["vardaspavarde"];
    $informacija = $_POST["informacija"];
    $nuotrauka = $_POST["nuotrauka"];
    $patinka = $_POST["patinka"];
    $nepatinka = "";
    $sukurta = "";
    $atnaujina = "";
    $statusas = $_POST["statusas"];
    $id = $_POST["id"];

    if($vardaspavarde && $informacija){
      $sql = $dbh->prepare('UPDATE `posts` SET title = ? , content = ?, image = ?, like_num = ?, dislike_num = ?, created = ?, modified = ?, status = ?  WHERE id = ?;');
      $sql->execute(array($vardaspavarde, $informacija, $nuotrauka, $patinka, $nepatinka, $sukurta, $atnaujina, $statusas, $id));
      
      $laikinas=null;
      header('Location: admin-control.php?valdymas-irasu');
      die();
    }

}

if(isset($_POST["redaguoti"])) {
    $laikinas = $_POST['redaguoti'];

    $sth = $dbh->query('SELECT * FROM posts WHERE id ='. $laikinas .'');
    // $sql->execute(array($laikinas));
    $row = $sth->fetch(PDO::FETCH_ASSOC);
    $vardaspavarde = $row["title"];
    $informacija = $row["content"];
    $nuotrauka = $row["image"];
    $patinka = $row["like_num"];
    $nepatinka = "";
    $sukurta = "";
    $atnaujina = "";
    $statusas = $row["status"];
    $id = $row["id"];

    echo '<div class="prideti">
      <div class="row">
        <div class="col-md-9 ml-md-auto">
          <form method="POST" action="valdymas.php">
           <input type="hidden" name="id" value="'. $laikinas . '">
          <div class="form-group">
              <input type="text" class="form-control" name="vardaspavarde" value="'. $vardaspavarde .'">
          </div>
          <div class="form-group">
              <textarea style="border-radius: 4px;"name="informacija" rows="6" cols="105">'. $informacija .'</textarea>
          </div>
          <div class="form-group">
              <input type="text" class="form-control" name="nuotrauka" value="'. $nuotrauka .'">
          </div>
          <div class="form-group">
              <input type="text" class="form-control" name="patinka" value="'. $patinka .'">
          </div>
          <div class="form-group">
          <input type="text" class="form-control" name="statusas" value="'. $statusas .'">
          </div>
              <button type="submit" name="pakeisti" class="btn btn-primary value="'. $laikinas .'">Pakeisti</button>

          </form>
        </div>
      </div>
      </div>';
    
    }

    
    $sth = $dbh->query('SELECT * FROM posts');
        while ($naujiena = $sth->fetch(PDO::FETCH_ASSOC)) {
            $vardaspavarde = $naujiena["title"];
            $informacija = $naujiena["content"];
            $nuotrauka = $naujiena["image"];
            $patinka = $naujiena["like_num"];
            $nepatinka = "";
            $sukurta = "";
            $atnaujina = "";
            $statusas = $naujiena["status"];
            $id = $naujiena["id"];


            echo '<div class="card" style="margin-left:20%; width:50%;"> 
            <h2 style="color:#707CA0" >' . $vardaspavarde . ' </h2>
            <br><p>' . $informacija . '</p>
            <form style="text-align: center; margin-top:6px;" method="POST">
                <button class="w-20 btn btn-success" type="submit" name="redaguoti" value='. $id .'>Redaguoti naujieną</button>
                <button class="w-20 btn btn-danger" type="submit" name="istrinti" value='. $id .'>Ištrinti naujieną</button>
            </form>
            <br>
        
        </div></div></div></div>
            ';

        }
    


?>