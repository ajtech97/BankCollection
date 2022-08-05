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

    $ip=$obj->ipaddress();
    $curdate=date('Y-m-d');
    $curtime=date('H:i:s');

    $usern=$_SESSION['username'];

    $query=mysqli_query($link,"select logid from adminlogs where username='$usern' and logoutdatetime is NULL order by logid desc limit 1");
    $row=mysqli_fetch_array($query);
    $logid=$row["logid"];

    mysqli_query($link,"UPDATE `adminlogs` SET `logoutdatetime`='$curdate $curtime' where logid=$logid") ;

    unset($_SESSION['username']);
    header("location:login.php");
}
?>
