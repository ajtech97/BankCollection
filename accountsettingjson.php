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

$data='{
	"records": [';

$query1=mysqli_query($link,"select * from users");
while($row=mysqli_fetch_array($query1))
{
    $uid=$row["uid"];
    $name=$row["name"];
    // $uname=$row['uname'];
    $mobileno=$row['mobileno'];
    $anomobileno=$row['anothermobileno'];
    $address=$row['address'];
    $emailid=$row['emailid'];

    $data.= '{"userid":"'.$uid.'","name":"'.ucwords($name).'","mobno":"'.$mobileno.'","anomobno":"'.$anomobileno.'","address":"'.$address.'","emailid":"'.$emailid.'"},';
}


$data.=']}';
$data=str_replace( '},]}', '}]}',$data);
echo $data;
}
?>
