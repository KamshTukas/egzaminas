<?php
include_once "database.php";

if(isset($_POST["pavadinimas"])){
  $pavadinimas = $_POST["pavadinimas"];
  $tekstas = $_POST["tekstas"];
  $data = date("Y-m-d");

  if ($pavadinimas && $tekstas){
    $sql = "UPDATE info SET pavadinimas='$pavadinimas', tekstas='$tekstas',data_paskutine='$data'  WHERE id=1";
    $sth = $dbh->prepare($sql)->execute();
    
    header('Location: index.php');
    die();
  }
} 
?>

<div class="info" style="margin-top:5%">
<div class="row">
  <div class="col-md-9 ml-md-auto">
    <form method="POST">
    <div class="form-group">
        <input type="text" class="form-control" name="pavadinimas" placeholder="Įrašykite informacijos pavadinimą" required>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="tekstas" placeholder="Įrašykite informacijos tekstą" required>
    </div>
    <button type="submit" class="btn btn-primary">Pakeisti</button>
    </form>
  </div>
</div>
</div>