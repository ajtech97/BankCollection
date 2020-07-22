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
?>
<!doctype html>
<html ng-app="myapp" ng-controller="myctrl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Account Setting</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" href="images/headerimg.png">
    <link rel="stylesheet" href="css/index.css" type="text/css">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">



    <!-- <link rel="icon" sizes="192x192" href="images/login.png"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.cyan-light_blue.min.css">

      <link rel="stylesheet" href="css/materialblue.css">
      <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/my.css">
    <link rel="stylesheet" href="css/scrollbar.css">
    <script src="js/angular.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/loadermain.js"></script>


       <script>
        function checkpass() {
            var pass = document.getElementById("npass").value;
            var repass = document.getElementById("rnpass").value;
            var count = pass.localeCompare(repass);

            if (count != 0) {
               document.getElementById("pass").innerHTML="*Enter Same Password";
                return false;
            }
            else
            {
                document.getElementById("pass").innerHTML="";
            }
        }

        function valid()
		{

            var name = document.getElementById("adminname").value;
            var mobno = document.getElementById("adminmob").value;
            var address = document.getElementById("address").value;
            var username = document.getElementById("username").value;
            var ppass = document.getElementById("ppass").value;
            var npass = document.getElementById("npass").value;
            var rnpass = document.getElementById("rnpass").value;

        if(name=="")
            {
                alert("Please Enter Name");
                document.getElementById("adminname").focus();
			    return false;
            }
        if(mobno.length!=10)
            {
                alert("Please Enter 10 Digit MobileNo");
                document.getElementById("adminmob").focus();
			    return false;
            }
        if(address=="")
            {
                alert("Please Enter Address");
                document.getElementById("address").focus();
			    return false;
            }
        if(ppass=="")
            {
                alert("Please Enter Previous Password");
                document.getElementById("ppass").focus();
			    return false;
            }
       if(npass=="")
            {
                alert("Please Enter New Password");
                 document.getElementById("npass").focus();
			    return false;
            }
        if(npass.length<6)
		{
			alert("Please Enter Minimum 6 Digits Password");
            document.getElementById("npass").focus();
			return false;
		}
        if(rnpass=="")
            {
                alert("Please Re-Enter New Password");
                document.getElementById("rnpass").focus();
			    return false;
            }
        }

//        function previouspass()
//           {
//               var ppass = document.getElementById("ppass").value;
//               if(ppass=="")
//            {
//                document.getElementById("preerror").innerHTML="*Please Enter Previous Password";
//                document.getElementById("ppass").focus();
//			    return false;
//            }
//            else
//                   {
//                        document.getElementById("preerror").innerHTML="";
//                   }
//          }

    </script>
</head>

<body>
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
        <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
            <div class="mdl-layout__header-row">
                <center><span class="mdl-layout-title headtitle">Account Setting</span></center>
            </div>
        </header>


        <?php include "nav.php";?>

        <main class="mdl-layout__content mdl-color--grey-100">

            <form action="accountsettingupdatedata.php" method="post" onsubmit="return valid()" >

                <div class="mdl-grid" style="background-color:white;" ng-repeat="x in con">

                                    <div class="mdl-cell mdl-cell--4-col">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" id="adminname" name="adminname" placeholder="" value="{{x.name}}" required>
                                        <label class="mdl-textfield__label" for="adminname">Name*</label>
                                    </div>
                                    </div>

                                     <div class="mdl-cell mdl-cell--4-col">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" id="adminmob" name="adminmob" placeholder="" value="{{x.mobno}}" maxlength="10" onkeypress='return event.charCode >=48 && event.charCode<=57' onkeyup="mobvalid()" required>
                                        <label class="mdl-textfield__label" for="adminmob">MobileNo*</label>
                                    </div>
                                    </div>

                                    <div class="mdl-cell mdl-cell--4-col">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input class="mdl-textfield__input" type="text" name="anomobno" id="anomobno" placeholder="Eg - 8652691949 , 9969717142" value="{{x.anomobno}}">
                                            <label class="mdl-textfield__label" for="anomobno">Another Mobile Number</label>
                                        </div>
                                    </div>

                                     <div class="mdl-cell mdl-cell--4-col">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input class="mdl-textfield__input" type="email" name="email" id="email" placeholder="" value="{{x.emailid}}">
                                            <label class="mdl-textfield__label" for="email">Email</label>
                                        </div>
                                    </div>

                                    <div class="mdl-cell mdl-cell--4-col">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <textarea class="mdl-textfield__input" id="address" name="address" placeholder="" rows="1.5" cols="100" required>{{x.address}}</textarea>
                                            <label class="mdl-textfield__label" for="address">Address*</label>
                                        </div>
                                    </div>

                                    <div class="mdl-cell mdl-cell--4-col">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                          <!-- style="text-transform:lowercase;" -->
                                            <input class="mdl-textfield__input" type="text" id="username" name="username" placeholder="" value="{{x.name}}" required  >
                                            <label class="mdl-textfield__label" for="username">Username*</label>
                                        </div>
                                    </div>

                                    <div class="mdl-cell mdl-cell--4-col">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="password" id="ppass" name="ppass" placeholder="" required>
                                        <label class="mdl-textfield__label" for="ppass">Previous Password*</label>
                                    </div>
                                    </div>

                                    <div class="mdl-cell mdl-cell--4-col">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="password" id="npass" name="npass" placeholder="" required>
                                        <label class="mdl-textfield__label" for="npass">New Password*</label>
                                    </div>
                                    </div>

                                    <div class="mdl-cell mdl-cell--4-col">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="password" id="rnpass" onkeyup="return checkpass()" name="rnpass" placeholder="" required>
                                        <label class="mdl-textfield__label" for="rnpass">Re-Enter New Password*</label>
                                    </div>
                                        <i id="pass" style="color:red;"></i>
                                    </div>

                </div>

                <div class="mdl-grid" style="background-color:white;">
                    <div class="mdl-cell mdl-cell--5-col"></div>
                                    <input type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" value="Update Information" id="changepass" name="sub" onclick="return checkpass()"style="color:white;" >
                </div>

                <div class="mdl-grid" style="background-color:white;">

                </div>

  </form>

        </main>
    </div>

    <script>

                var cont = 0;
                var x = angular.module("myapp", []);
                x.controller("myctrl", function($scope, $http, $interval) {

                     $scope.getData = function() {

                        $http.post("accountsettingjson.php").then(function success(response){
                        $scope.con=response.data.records;

                        },function error(response){
                                $scope.con=response.statusText;
                            });
                    };

                    $scope.getData();
                });
    </script>

      <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</body>

</html>
<?php }?>
