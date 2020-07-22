<?php session_start();?>
<?php
error_reporting(0);
if(isset($_REQUEST['login']))
{
   $username=$_REQUEST['username'];
   $password=md5($_REQUEST['password']);

    if($username!="" && $password!="")
    {
        include("classes/mainfunctions.php");
        $obj=new maindbfunctions();
        $obj->connect();

        $ip=$obj->ipaddress();
        $curdate=date('Y-m-d');
        $curtime=date('H:i:s');

        $ans=$obj->userlogin($username,$password);

        if($ans!="no")
        {
            $_SESSION['username']=$username;
            $usern=$_SESSION['username'];

            $obj->insertdb("adminlogs","adminid","1","username",$usern,"LoginDateTime",$curdate." ".$curtime,"ipaddress",$ip);
            header("location:loading.php");
        }
        else
        {
            echo "<script>alert('Username or Password is wrong.');window.location.href='login.php';</script>";
        }
    }
    else
    {
        header("location:login.php");
    }
}
else
{
    header("location:login.php");
}

?>
