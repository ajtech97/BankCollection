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

$Cust_Id=$_REQUEST['val'];
$query="DELETE FROM `customerpayment` WHERE CPId=$Cust_Id";
$ans=mysqli_query($link,$query);
echo $ans;
}
?>
