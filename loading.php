<?php session_start();?>
<?php error_reporting(0);
if($_SESSION['username']=="")
{
    header("location:login.php");
}
else
{
?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <title>Loading...</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="shortcut icon" href="images/headerimg.jpg">

    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/materialblue.css">
    <link rel="stylesheet" href="css/my.css">
    <link rel="stylesheet" href="css/scrollbar.css">

     <script src="js/loadermain.js"></script>

    <script>
    setInterval(function(){ window.location.href="customerpayment.php"; }, 3000);
    </script>

</head>
<body>
<!-- MDL Progress Bar with Indeterminate Progress -->
   <br><br><br><br>
   <br><br><br><br>
   <br><br><br><br>
   <br><br><br><br>
   <br><br><br><br>
    <center><div id="p2" class="mdl-progress mdl-js-progress mdl-progress__indeterminate"></div></center>
</body>
</html>
<?php }?>
