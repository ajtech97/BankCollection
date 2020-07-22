<?php
session_start();
error_reporting(0);
if($_SESSION['username']=="")
{
    header("location:login.php");
}
else{
include("classes/mainfunctions.php");
$obj=new maindbfunctions();
$obj->connect();

$query="UPDATE `customer` SET `Paid`=''";
$ans=mysqli_query($link,$query);
echo $ans;
}
?>
