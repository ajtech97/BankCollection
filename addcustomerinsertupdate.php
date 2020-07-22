<?php session_start();?>
    <?php error_reporting(0);

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

    $CId=$_REQUEST["cid"];

    if(isset($_REQUEST["submit"]))
    {
        $fname=addslashes($_REQUEST["fname"]);
        $lname=addslashes($_REQUEST["lname"]);
        $amount=$_REQUEST["amount"];
        $custfullname=$_REQUEST["fname"]."".$_REQUEST["lname"];
        $custfn=str_replace(' ','',$custfullname);
        $email=addslashes($_REQUEST["email"]);
        $city=addslashes($_REQUEST["city"]);
        $address=addslashes($_REQUEST["address"]);
        $mobno=$_REQUEST["mobno"];
        $anomobno=addslashes($_REQUEST["anomobno"]);
        $state=addslashes($_REQUEST["state"]);
        $collectionstartdate=$_REQUEST["collectionstartdate"];

$tablename="customer";
$colmob="Mobile";

$mobnoc=$obj->checkmobnoarepresentornotcustomer($tablename,$colmob,$mobno);

if($mobnoc=="no")
{

   $ans=$obj->insertdb("customer","FName",$fname,"LName",$lname,"FullName",$custfn,"Amount",$amount,"Paid","","Address",$address,"City",$city,"Emailid",$email,"Mobile",$mobno,"Mobile2",$anomobno,"State",$state,"cust_display_or_not","YES",
   "CollectionStartDate",$collectionstartdate,"CurrDateTime",$curdate." ".$curtime,"IPAddress",$ip);
}
else
{
    echo "<script>alert('Mobile No Already Exist');</script>";
}

    if($ans=="yes")
    {
        echo "<script>alert('Customer Added Successfully');</script>";
        echo "<script>window.location='addcustomer.php';</script>";
    }
    else
    {
        echo "<script>alert('Customer Add Failed');</script>";
        echo "<script>window.location='addcustomer.php';</script>";
    }
    }



if(isset($_REQUEST["updatedata"]))
    {
      $fname=addslashes($_REQUEST["fname"]);
      $lname=addslashes($_REQUEST["lname"]);
      $amount=$_REQUEST["amount"];
      $custfullname=$_REQUEST["fname"]."".$_REQUEST["lname"];
      $custfn=str_replace(' ','',$custfullname);
      $email=addslashes($_REQUEST["email"]);
      $city=addslashes($_REQUEST["city"]);
      $address=addslashes($_REQUEST["address"]);
      $mobno=$_REQUEST["mobno"];
      $anomobno=addslashes($_REQUEST["anomobno"]);
      $state=addslashes($_REQUEST["state"]);
      $collectionstartdate=$_REQUEST["collectionstartdate"];


$tablename="customer";
//$columnname="Emailid";
$colmob="Mobile";
//$colmob2="Mobile2";


//$em=$obj->checkemailarepresentornot($tablename,$columnname,$email);
$mobnoc=$obj->checkcustmobnoarepresentornot($tablename,$colmob,$mobno,$CId);
//   $em=="no" and
if($mobnoc=="no")
{
    $ans=$obj->updatecustomerdata($tablename,$fname,$lname,$amount,$custfn,$email,$city,$address,$mobno,$anomobno,$state,$collectionstartdate,$CId);
}
else
{
     echo "<script>alert('Mobile No Already Exist');</script>";
}
    if($ans==1)
    {
        echo "<script>alert('Customer Updated Successfully');</script>";
        echo "<script>window.location='addcustomer.php';</script>";
    }
    else
    {
        echo "<script>alert('Customer Update Failed');</script>";
        echo "<script>window.location='addcustomer.php';</script>";
    }
}
}
    ?>
