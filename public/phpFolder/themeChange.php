<?php

$q = $_REQUEST["q"];
$r = $_REQUEST["r"];

$servername = "localhost";
$username = "root";
$password = "";

$val="";

try {
    $conn = new PDO("mysql:host=$servername;dbname=hotel_db", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "UPDATE user_info SET theme_id=? WHERE user_id =?";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(1,$r);
    $stmt->bindParam(2,$q);
    $stmt->execute();
    $val="Success";
}
catch(PDOException $e)
{
    $val="Fail";
    //= "Connection failed: " . $e->getMessage();
}
echo $val;



?>