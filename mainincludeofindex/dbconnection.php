<?php
$server="localhost";
$username="root";
$password="";
$database="imd";

$conn = mysqli_connect($server,$username,$password,$database);

if(!$conn)
{
    die('<br>we failed to connect'. mysqli_connect_error());
}
?>

