<?php 
$servername = "localhost";
$username = "ayush";
$password = "kumar";
$myDB = 'fitnessportal';
$port_no = 3306;
try{ 
$conn = new PDO("mysql:host = $servername; port=$port_no, dbname= $myDB", $username, $password);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// echo "Connection successfully";
} catch(PDOException $e){
 echo "Connection failed : ". $e->getMessage();
} ?>

       