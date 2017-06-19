<?php
$host="127.0.0.1";
$user="mrgostepz";
$password="";
$database="ps";
$dbconnection = mysqli_connect($host,$user,$password,$database);

if(!$dbconnection){
    echo "connection error!";
}
?>