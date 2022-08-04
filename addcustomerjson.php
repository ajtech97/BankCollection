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

// $count=$_REQUEST['val'];
// $_SESSION['display']=$_SESSION['display']+$count;
$data='{
	"records": [';
//$counter=1;
$query=mysqli_query($link,"select * from customer where cust_display_or_not like 'YES' order by (CurrDateTime)");
while($row=mysqli_fetch_array($query))
{

    $custid=$row['CId'];
    $fname= $row['FName'];
    $lname= $row['LName'];
    $amount= $row['Amount'];
    $paid= $row['Paid'];
    $address=preg_replace( "/\r|\n/"," ",$row["Address"]);
//    $address= $row["Address"];
    $mobile= $row["Mobile"];
    $mobile2= $row["Mobile2"];
    if($mobile2==0)
    {
      $mobile2="";
    }
    $emailid= $row['Emailid'];
    $city= $row["City"];

    $currdate=date("d-m-Y h:i:s A",strtotime($row['CurrDateTime']));

    $data.= '{"CustID":"'.$custid.'","fname":"'.ucwords($fname).'","lname":"'.ucwords($lname).'","amount":"'.$amount.'","paid":"'.$paid.'","add":"'.$address.'","mob1":"'.$mobile.'","mob2":"'.$mobile2.'","email":"'.$emailid.'","city":"'.$city.'","date":"'.$currdate.'","currdate":"'.$currdate.'"},';
//    $counter++;
}
$data.=']}';
$data=str_replace( '},]}', '}]}',$data);
echo $data;
}
?>
