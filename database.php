<?php

$user = "sql11475052";
$pass = "rTr2Mvjqgz";
$db_name = "sql11475052";
$host  = "sql11.freemysqlhosting.net";

try {
    $dbh = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>