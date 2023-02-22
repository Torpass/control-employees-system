<?php
$server = 'localhost';
$db = 'complex_project';
$user= 'root'; 
$password = '';
try{
    $connection = new PDO("mysql:host=$server;dbname=$db;",$user,$password);
}catch(PDOException $e){
    echo $e->getMessage();
} 
?>

