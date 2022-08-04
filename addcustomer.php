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
            .menu1 {
                        background-color: #00BCD4;
                    }

            .menuname1 {
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
                  function deletecust(val)
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
                          // window.location='addcustomer.php';
                        }
                        else
                        {
                          alert("Try again...");
                          // window.location='addcustomer.php';
                        }
                      }
                    };
                    xmlhttp.open("GET", "Delete_Customer.php?val="+val, true);
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
                              <center><span class="mdl-layout-title headtitle">Add Customer</span></center>
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
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" id="searchbox" ng-model="search">
                    <label class="mdl-textfield__label" for="searchbox">Search by Customer Name</label>
                </div>
               <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored asssignbtn" onclick='openopup(this.id,"insert")' for="cust" id="addpurbtn">
                   <i class=" material-icons" id="cust" style="align:center;outline:none;">person_add</i>
                     <div class="mdl-tooltip mdl-tooltip--large" for="cust">Add Customer</div>
               </button>
            </div>
          </center>
              <div class="mdl-cell mdl-cell--4-col"></div>
        </div>

        <!-- Empty Data Msg -->
        <center>
           <h4 class="custnotfound">Oops... No Customer Found!</h4>
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
                                           <th class="mdl-data-table__cell--non-numeric">Cust Mob No</th>
                                           <th class="mdl-data-table__cell--non-numeric">Amount</th>
                                           <th class="mdl-data-table__cell--non-numeric">Edit/View</th>
                                           <th class="mdl-data-table__cell--non-numeric">Delete</th>

               </tr>

           </thead>

       </table>

   <div class="tbl-content">
       <table  class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="width:100%;">

       <tbody>

                       <tr ng-repeat="x in con  | filter:search "  class="ng-scope" ng-model="search">

                           <input type="hidden" id="tblcid{{x.CustID}}" value="{{x.CustID}}">
                           <input type="hidden" id="tblfname{{x.CustID}}" value="{{x.fname}}">
                           <input type="hidden" id="tbllname{{x.CustID}}" value="{{x.lname}}">
                           <input type="hidden" id="tblamount{{x.CustID}}" value="{{x.amount}}">
                           <input type="hidden" id="tblcity{{x.CustID}}" value="{{x.city}}">
                           <input type="hidden" id="tblemail{{x.CustID}}" value="{{x.email}}">
                           <input type="hidden" id="tbladdress{{x.CustID}}" value="{{x.add}}">
                           <input type="hidden" id="tblmobile1{{x.CustID}}" value="{{x.mob1}}">
                           <input type="hidden" id="tblmobile2{{x.CustID}}" value="{{x.mob2}}">

                                   <td data-label="Cust Id" class="mdl-data-table__cell--non-numeric ng-binding">{{$index + 1}}</td>
                                   <td data-label="Cust Name" class="mdl-data-table__cell--non-numeric ng-binding">{{x.fname+" "+x.lname}}</td>
                                   <td data-label="Cust Mob No" class="mdl-data-table__cell--non-numeric ng-binding">{{x.mob1}}</td>
                                   <td data-label="Amount" class="mdl-data-table__cell--non-numeric ng-binding">{{x.amount}}</td>

                                           <td data-label="Edit/View" class="mdl-data-table__cell--non-numeric ng-binding">
                                              <button class="mdl-button mdl-js-button mdl-button--fab  mdl-button--colored asssignbtn" title="Edit/View Customer" onclick='editdata(this.id,"update")' id="{{x.CustID}}" for="kkk">
                                                  <div class="mdl-tooltip mdl-tooltip--large" for="kkk">Edit/View Customer</div>
                                                  <i class="material-icons" id="kkk" style="outline:none">edit</i>
                                               </button>
                                           </td>

                                            <td data-label="Delete" class="mdl-data-table__cell--non-numeric ng-binding">
                                              <button class="mdl-button mdl-js-button mdl-button--fab  mdl-button--colored asssignbtn" title="Delete Customer" onclick='deletecust(this.id)' id="{{x.CustID}}" for="deletecust">
                                                  <div class="mdl-tooltip mdl-tooltip--large" for="deletecust">Delete Customer</div>
                                                  <i class="material-icons" id="deletecust" style="outline:none;">delete</i>
                                               </button>
                                           </td>
                       </tr>

       </tbody>

       </table>

   </div>
             <!-- Dialog Form -->

             <dialog class="mdl-dialog">
                 <form method="post" action="addcustomerinsertupdate.php" onsubmit="return valid();" enctype="multipart/form-data">

                     <h4 id="custregname">Add Customer</h4>
                     <hr>
                      <input type="hidden" name="cid" id="cid">

                     <div class="mdl-grid">

                         <div class="mdl-cell mdl-cell--4-col">
                             <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">

                                 <input class="mdl-textfield__input" type="text" name="fname" id="firstname" placeholder="" required>
                                 <label class="mdl-textfield__label" for="firstname">First Name*</label>

                             </div>
                         </div>

                         <div class="mdl-cell mdl-cell--4-col">
                             <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">

                                 <input class="mdl-textfield__input" type="text" name="lname" id="lastname" placeholder="" >
                                 <label class="mdl-textfield__label" for="lastname">Last Name</label>

                             </div>
                         </div>

                         <div class="mdl-cell mdl-cell--4-col">
                             <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">

                                 <input class="mdl-textfield__input" type="text" name="amount" id="amount" placeholder="" onkeypress='return event.charCode >=48 && event.charCode<=57' required>
                                 <label class="mdl-textfield__label" for="amount">Amount*</label>

                             </div>
                         </div>

                    </div>

                     <div class="mdl-grid">

                       <div class="mdl-cell mdl-cell--4-col">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">

                                          <input class="mdl-textfield__input" type="date" id="collectionstartdate" name="collectionstartdate" placeholder="" value="<?php echo date("Y-m-d");?>" required>
                                          <label class="mdl-textfield__label" for="collectionstartdate">Collection Start Date*</label>

                                       </div>
                        </div>

                          <div class="mdl-cell mdl-cell--4-col">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">

                                    <input class="mdl-textfield__input" type="text" name="city" id="city" placeholder="" required>
                                    <label class="mdl-textfield__label" for="city">City*</label>

                                </div>
                          </div>

                         <div class="mdl-cell mdl-cell--4-col">
                             <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">

                                 <input class="mdl-textfield__input" type="email" name="email" id="email" placeholder="">
                                 <label class="mdl-textfield__label" for="email">Email</label>

                             </div>
                         </div>

                     </div>

                     <div class="mdl-grid">


                    <div class="mdl-cell mdl-cell--4-col">

                              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">

                              <textarea class="mdl-textfield__input" id="address" name="address" placeholder="" required rows="1.5" cols="100" required></textarea>
                              <label class="mdl-textfield__label" for="address">Address*</label>

                            </div>
                  </div>

                         <div class="mdl-cell mdl-cell--4-col">
                                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">

                                    <input class="mdl-textfield__input" type="text" name="mobno" id="mobileno1" placeholder="" maxlength="10" onkeypress='return event.charCode >=48 && event.charCode<=57' onkeyup="mobvalid()" required>
                                    <label class="mdl-textfield__label" for="mobileno">Mobile Number*</label>

                                    </div>

                          </div>

                         <div class="mdl-cell mdl-cell--4-col">
                               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">

                                 <input class="mdl-textfield__input" type="text" name="anomobno" id="mobileno2" placeholder="Eg - 8652691949 , 9969717142">
                                 <label class="mdl-textfield__label" for="anomobno">Another Mobile Number</label>

                               </div>
                         </div>

                    </div>

                    <div class="mdl-grid">
                                             <div class="mdl-cell mdl-cell--4-col">
                                             <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">

                                                 <input class="mdl-textfield__input" type="text" name="state" id="state" placeholder="" required value="Maharashtra">
                                                 <label class="mdl-textfield__label" for="state">State*</label>

                                             </div>
                                             </div>
                  </div>



                     <hr>

                     <div class="mdl-dialog__actions" id="btnaction">

                         <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored forwhitecolor" onclick="colsepup()" type="button" id="closepopup">
                             <i class="material-icons forwhitecolor">close</i> Close
                         </button>


                         <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored forwhitecolor" type="submit" value="submit" id="insertdata"  name="submit">
                             <i class="material-icons forwhitecolor">send</i>Add
                         </button>

                         <button  class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored forwhitecolor" type="submit" value="update" id="updatedata" name="updatedata">
                             <i class="material-icons forwhitecolor">send</i>Update
                         </button>

                     </div>

                 </form>
             </dialog>
      </main>
    </div>

    <script>

         function colsepup()
         {
            dialog.close();
            document.getElementById("cid").value = "";
            document.getElementById("firstname").value = "";
            document.getElementById("lastname").value ="";
            document.getElementById("amount").value ="";
            document.getElementById("city").value =  "";
            document.getElementById("email").value =  "";
            document.getElementById("address").value = "";
            document.getElementById("mobileno1").value = "";
            document.getElementById("mobileno2").value =  "";

            document.getElementById("insertdata").style.visibility = "visible";
            document.getElementById("updatedata").style.visibility = "visible";

             document.getElementById("custregname").innerHTML = document.getElementById("custregname").innerHTML.replace('Update Customer', 'Add Customer');
         }

         function openopup(val,val2) {
             if(val2=="insert")
                 {
                     dialog.showModal();
                     document.getElementById("updatedata").style.visibility = "hidden";
                 }
         }

          var dialog = document.querySelector('dialog');
                                     var showDialogButton = document.querySelector('#show-dialog');
                                     if (!dialog.showModal) {
                                         dialogPolyfill.registerDialog(dialog);
                                     }
                                     showDialogButton.addEventListener('click', function() {
                                         dialog.showModal();
                                     });
                                     dialog.querySelector('.close').addEventListener('click', function() {
                                         dialog.close();
                                     });


    function editdata(val,val1) {
      if(val1=="update")
      {

          dialog.showModal();
          fillvalues(val);
          document.getElementById("insertdata").style.visibility = "hidden";
          document.getElementById("custregname").innerHTML = document.getElementById("custregname").innerHTML.replace('Add Customer', 'Update Customer');

      }
    }

    function fillvalues(val)
    {
        id = val;
        document.getElementById("cid").value = document.getElementById("tblcid" + id).value;
        document.getElementById("firstname").value = document.getElementById("tblfname" + id).value;
        document.getElementById("lastname").value = document.getElementById("tbllname" + id).value;
        document.getElementById("amount").value = document.getElementById("tblamount" + id).value;
        document.getElementById("mobileno1").value = document.getElementById("tblmobile1" + id).value;
        document.getElementById("mobileno2").value = document.getElementById("tblmobile2" + id).value;
        document.getElementById("address").value = document.getElementById("tbladdress" + id).value;
        document.getElementById("city").value = document.getElementById("tblcity" + id).value;
        document.getElementById("email").value = document.getElementById("tblemail" + id).value;
    }
    </script>

    <script>


              var cont = 0;
              var x = angular.module("myapp", []);
              x.controller("myctrl", function($scope, $http, $interval) {
                  $scope.getData = function() {
                      $http.get('addcustomerjson.php').success(function(data) {

                          $scope.con = data.records;


                          if (data.records == "") {
                              $("#newcallstable").fadeOut();
                              $(".custnotfound").fadeIn();


                          } else {
                              $("#newcallstable").fadeIn();
                              $(".custnotfound").fadeOut();
                          }
                          console.log(data.records);
                      });
                  };


                       $scope.intervalFunction = function() {
                           $interval(function() {
                               $scope.getData();

                           }, 5000)
                       };

                  $scope.getData();
                  $scope.intervalFunction();

              });
    </script>

      <!-- <script src="js/main.js"></script> -->
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
      <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
  </body>
</html>
<?php } ?>
