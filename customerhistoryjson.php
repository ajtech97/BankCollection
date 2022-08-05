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
// where CId='$cid' order by (CurrDateTime)"
$query=mysqli_query($link,"select * from customerpayment where CId='$cid' order by PaymentDate asc");

//Names
$query1=mysqli_query($link,"select FName,LName from customer where CId='$cid'");
$row1=mysqli_fetch_array($query1);

// $totalamount="";
while($row=mysqli_fetch_array($query))
{

    $cpid=$row['CPId'];
    $custid=$row['CId'];
    $fname= $row1['FName'];
    $lname= $row1['LName'];
    $amount=$row['Amount'];
    $paymentdate= $row['PaymentDate'];

    // $currdate=date("d-m-Y h:i:s A",strtotime($row['CurrDateTime']));

    $data.= '{"CustID":"'.$custid.'","cpid":"'.$cpid.'","totalamount":"'.$totalamount.'","fname":"'.ucwords($fname).'","lname":"'.ucwords($lname).'","amount":"'.$amount.'","paymentdate":"'.$paymentdate.'"},';

}
$data.=']}';
$data=str_replace( '},]}', '}]}',$data);
echo $data;
}
?>
