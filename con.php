<?php
define('BASEURL','http://divakar.live/');
$hostname='localhost';
$username='root';
//I'm changing password here, pls change it when you access this code.
$password='';
$database='divakar';
$conn=mysqli_connect($hostname,$username,$password,$database);

if(!$conn){
echo "There is an error while connecting to the database.";
}

//displaying all errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>
