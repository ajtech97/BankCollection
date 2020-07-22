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

  $cid=$_REQUEST["cid"];

$data='{
	"records": [';

  $query2=mysqli_query($link,"select SUM(Amount) as amo from customerpayment where CId='$cid'");
  $row2=mysqli_fetch_array($query2);
  $totalamount=$row2['amo'];


    $data.= '{"totalamount":"'.$totalamount.'"},';

$data.=']}';
$data=str_replace( '},]}', '}]}',$data);
echo $data;
}
?>
