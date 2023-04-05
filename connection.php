<?php 
$host = 'localhost';
$username = 'root';
$password ='';
$dbname = 'assignment_php';

try{
    $conn = new PDO("mysql:host=$host; port=3300;dbname=$dbname; charset=utf8", $username, $password);
    $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "OK";
}catch(PDOException $e){
    echo "ERROR CONNECTED <br/>" .$e->getMessage();
}
