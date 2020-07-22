<?php session_start();?>
<?php
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
                date_default_timezone_set('Asia/kolkata');
                $curdate=date('Y-m-d');
                $curtime=date('H:i:s');

        if(isset($_REQUEST['sub']))
        {
            $name=addslashes($_REQUEST["adminname"]);
            $mob=$_REQUEST["adminmob"];
            $anomob=$_REQUEST["anomobno"];
            $email=addslashes($_REQUEST["email"]);
            $address=addslashes($_REQUEST["address"]);
            $username=addslashes($_REQUEST["username"]);

            $ppass=md5($_REQUEST['ppass']);
            $npass=md5($_REQUEST['npass']);
            $rnpass=md5($_REQUEST['rnpass']);

            $tablename="users";
            $columnname="pass";


            if($npass!=$rnpass)
            {
                 echo "<script>alert('Enter Same password.');window.location.href='accountsetting.php';</script>";
            }

            $ans=$obj->checkrecorsarepresentornot($tablename,$columnname,$ppass);

            if($ans=="yes")
            {
                $ans=$obj->updatepass($tablename,$name,$rnpass,$mob,$anomob,$email,$address,$curdate,$curtime,$ip);
                if($ans=="yes")
                {
                     echo "<script>alert('Password Updated Successfully.');window.location.href='accountsetting.php';</script>";
                }
            }
            else
            {
                echo "<script>alert('Please Enter Correct Previous Password.');window.location.href='accountsetting.php';</script>";
            }
        }
}
?>
