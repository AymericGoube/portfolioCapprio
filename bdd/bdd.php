<?php
$host="localhost";
$dbname="bdd_capprio";
$username="root";
$pwd="simplon";
$bdd = new PDO('mysql:host='.$host.';dbname='.$dbname.'',''.$username.'',''.$pwd.'');
$bdd->exec("SET CHARACTER SET utf8");

?>
