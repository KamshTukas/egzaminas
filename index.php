<?php 

include_once "database.php";

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servisai.LT</title>

    
    
    <link rel="stylesheet" href="https://pro.font5awesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="css/style.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="#">SERVISAI.LT </a>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php"> Pagrindinis &nbsp;&nbsp; <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin-control.php"> ADMIN-CONTROL </a>
      </li>
    </ul>
  </div>
</nav>

    <div class="main">
            <div class="news">
                <?php
                    $sth = $dbh->query('SELECT * FROM info;');
                    while ($info = $sth->fetch(PDO::FETCH_ASSOC)) {
                        $pavadinimas = $info["pavadinimas"];
                        $tekstas = $info["tekstas"];
                        $data = $info["data_paskutine"];
                    } 
                ?>
                <h2><?php echo $pavadinimas ?></h2>
                <p><?php echo $tekstas ?></p>
                <br>
                <p><h6>Paskutinį kartą redaguota: <?php echo $data ?></h6></p>
                <br>
                <hr class="hr1">
    </div>

<script>
/** 
 * @param id 
 * @param type 
 * @param target 
 */
function cwRating(id,type,target){
    $.ajax({
        type:'POST',
        url:'rating.php',
        data:'id='+id+'&type='+type,
        success:function(msg){
            if(msg == 'err'){
                alert('Some problem occured, please try again.');
            }else{
                $('#'+target).html(msg);
            }
        }
    });
}
</script>


<?php
// paleidziama post klase
require_once 'Post.class.php';
$post = new Post();

// Gauna duomenis is duomenu bazes
$posts = $post->getRows();
?>

<div class="row">
    <?php if(!empty($posts)){ foreach($posts as $row){ ?>
    <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
            <img src="<?php echo 'images/'.$row['image']; ?>" />
            <div class="caption">
                <h4><?php echo $row['title']; ?></h4>
                <p><?php echo $row['content']; ?></p>
            </div>
            <div class="ratings">
                <p class="pull-right"></p>
                <p>
                    <!-- Sirdutes  mygtukas -->
                    <span class="glyphicon glyphicon-heart" style="font-size:25px; position:absolute; color:red; top:10px; right:50px; padding-right:2% " onClick="cwRating(<?php echo $row['id']; ?>, 1, 'like_count<?php echo $row['id']; ?>')"></span>&nbsp;
                    <!-- Sirduciu skaicius -->
                    <span class="counter" style="font-size:25px; color:black; position:absolute; top:5px; right:30px; " id="like_count<?php echo $row['id']; ?>"><?php echo $row['like_num']; ?></span>&nbsp;&nbsp;&nbsp;
                
                </p>
            </div>
            <p> Paskutini karta atnaujinta - <?php echo $row['modified']; ?></p>
        </div>
    </div>
    <?php } } ?>
</div>
    
<script src="js/navscript.js"></script>

</body>
</html>