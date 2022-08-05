<?php
session_start();
error_reporting(0);
if($_SESSION['username']=="")
{
  header("location:login.php");
}
else {
  include("classes/mainfunctions.php");
  $obj=new maindbfunctions();
  $obj->connect();

  $ip=$obj->ipaddress();
  $curdate=date('Y-m-d');
  $curtime=date('H:i:s');

  $CId=$_REQUEST["cid"];

  if(isset($_REQUEST['submit']))
  {
    $amount=$_REQUEST["amount"];
    $paymentdate=addslashes($_REQUEST["paymentdate"]);

$tablename="customerpayment";

  $ans=$obj->insertdb("customerpayment","CId",$CId,"Amount",$amount,"PaymentDate",$paymentdate,"PaymentTime",$curtime,"CurrDateTime",$curdate." ".$curtime,"IPAddress",$ip);
  $ans1=mysqli_query($link,"update customer set Paid='Yes' where CId=$CId");
  if($ans=="yes" and $ans1==1)
  {
    echo "<script>alert('Payment Done Successfully')</script>";
    echo "<script>window.location='index.php'</script>";
  }
  else
  {
      echo "<script>alert('Payment Failed');</script>";
      echo "<script>window.location='index.php';</script>";
  }
  }
}
?>
