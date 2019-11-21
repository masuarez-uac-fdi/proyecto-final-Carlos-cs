<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventario";
try{
$con = new PDO('mysql:host=localhost;dbname='.$dbname,$username,$password);
}catch(PDOException $e){
    echo "error".$e->getMessage();
}

?>