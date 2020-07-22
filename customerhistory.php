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

  $customerlist=$obj->getcustomerlist();
?>
<!doctype html>
<html lang="en" ng-app="myapp" ng-controller="myctrl">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Bank Collection</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/bankicon.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="images/bankicon.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="images/bankicon.png">

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

    <style>
            .menu3 {
                        background-color: #00BCD4;
                    }

            .menuname3 {
                        color: #37474F;

                    }

                    table{
                         width: 100%;
                        table-layout: fixed;
                    }

                    .tbl-content{
                  height:auto;
                  width: 100%;
                  max-height:343px;
                  overflow-x:auto;
                  margin-top: 0px;
                  background-color: #64B5F6;
                }


    </style>
    <script>
                  function Delete_Cust_History(val)
                  {
                    if(confirm("If you want to delete then press 'Ok'..!"))
                    {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function()
                    {
                      if (this.readyState == 4 && this.status == 200)
                      {
                        if(this.responseText)
                        {
                          alert("Delete successfully");
                          // window.location='customerhistory.php';
                        }
                        else
                        {
                          alert("Try again...");
                          // window.location='customerhistory.php';
                        }
                      }
                    };
                    xmlhttp.open("GET", "Delete_Customer_Payment.php?val="+val, true);
                    xmlhttp.send();
                  }
                }
    </script>
  </head>
  <body>

    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">

      <!-- header -->


          <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
                          <div class="mdl-layout__header-row">
                              <center><span class="mdl-layout-title headtitle">Customer History</span></center>
                          </div>
          </header>

      <!-- Nav  -->
      <?php include("nav.php");?>

      <!-- Main   -->
      <main class="mdl-layout__content mdl-color--grey-100">

        <!-- Grid -->
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--4-col"></div>

            <div class="mdl-cell mdl-cell--4-col" id="searchbar">
              <center>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select__fix-height">
                         <p style="color:#00BCD4;">Customer Name*</p>
                      <select class="mdl-textfield__input" name="custlist" id="custlist">
                         <?php

                             echo '<option value=""></option>';
                             echo $customerlist;

                         ?>
                     </select>
                </div>

                                     <button  class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored forwhitecolor" value="show" name="showdata" ng-click="showData();TotalAmount()">
                                         <i class="material-icons forwhitecolor">send</i> Show
                                     </button>
                </center>
            </div>
        </div>

        <!-- Empty Data Msg -->
        <center>
           <h4 class="custnotfound">Oops... No Data Found!</h4>
        </center>

        <!-- Table -->
        <br>
        <br>
        <br>
        <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="width:100%;">

            <thead>

                <tr>
                                           <th class="mdl-data-table__cell--non-numeric">Sr No</th>
                                           <th class="mdl-data-table__cell--non-numeric">Cust Name</th>
                                           <th class="mdl-data-table__cell--non-numeric">Date</th>
                                           <th class="mdl-data-table__cell--non-numeric">Amount</th>
                                           <th class="mdl-data-table__cell--non-numeric">Delete</th>

               </tr>

           </thead>

       </table>

   <div class="tbl-content">

       <table  class="mdl-data-table mdl-js-data-table mdl-shadow--2dp newcallstable" style="width:100%;">

       <tbody>

                       <tr ng-repeat="x in con  | filter:search "  class="ng-scope" ng-model="search">

                                   <td data-label="Cust Id" class="mdl-data-table__cell--non-numeric ng-binding">{{$index + 1}}</td>
                                   <td data-label="Cust Name" class="mdl-data-table__cell--non-numeric ng-binding">{{x.fname+" "+x.lname}}</td>
                                   <td data-label="Date" class="mdl-data-table__cell--non-numeric ng-binding">{{x.paymentdate}}</td>
                                   <td data-label="Amount" class="mdl-data-table__cell--non-numeric ng-binding">{{x.amount}}</td>

                                           <td data-label="Delete" class="mdl-data-table__cell--non-numeric ng-binding">
                                              <button class="mdl-button mdl-js-button mdl-button--fab  mdl-button--colored asssignbtn" title="Delete" onclick='Delete_Cust_History(this.id)' id="{{x.cpid}}" for="kkk">
                                                  <div class="mdl-tooltip mdl-tooltip--large" for="kkk">Delete</div>
                                                  <i class="material-icons" id="kkk" style="outline:none">delete</i>
                                               </button>
                                           </td>
                       </tr>

       </tbody>

       </table>

   </div>


      <div class="tbl-content">

          <table  class="mdl-data-table mdl-js-data-table mdl-shadow--2dp newcallstable" style="width:100%;">

          <tbody>

                          <tr ng-repeat="y in conn  | filter:search "  class="ng-scope" ng-model="search">

                                      <td data-label="" class="mdl-data-table__cell--non-numeric ng-binding"><b>Total : {{y.totalamount}}</b></td>
                          </tr>

          </tbody>

          </table>

      </div>

  </main>
</div>

    <script>


              var cont = 0;
              var x = angular.module("myapp", []);
              x.controller("myctrl", function($scope, $http, $interval) {
                  $scope.showData = function() {
                      var cid=document.getElementById("custlist").value;
                    $http.post("customerhistoryjson.php?cid="+cid).then(function success(response) {
                              $scope.con = response.data.records;

                              if (response.data.records == "") {
                                  $(".newcallstable").fadeOut();
                                  $(".custnotfound").fadeIn();


                              } else {
                                  $(".newcallstable").fadeIn();
                                  $(".custnotfound").fadeOut();
                              }
                          }, function error(response) {
                              $scope.con = response.statusText;
                          });
                   };

                   $scope.TotalAmount = function() {
                       var cid=document.getElementById("custlist").value;
                     $http.post("customertotalamountjson.php?cid="+cid).then(function success(response) {
                               $scope.conn = response.data.records;
                           }, function error(response) {
                               $scope.con = response.statusText;
                           });
                    };
                       $scope.intervalFunction = function() {
                           $interval(function() {
                               $scope.showData();
                               $scope.TotalAmount();

                           }, 5000)
                       };
                  $scope.showData();
                  $scope.TotalAmount();
                  $scope.intervalFunction();

              });
    </script>


    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  </body>
</html>
<?php } ?>
